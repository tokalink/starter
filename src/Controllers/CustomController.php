<?php

namespace Tokalink\Starter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use PgSql\Lob;
use Illuminate\Support\Facades\Log;

class CustomController extends Controller
{
    public $table, $upload_path, $filter_by, $html, $title, $button_print, $form, $paginate, $data_where, $title_field, $limit, $orderby, $global_privilege, $button_table_action, $button_bulk_action, $button_action_style, $button_add, $button_edit, $button_delete, $button_detail, $button_show, $button_filter, $button_import, $button_export, $col, $datatable;
    public $col_name = [];

    public function Loader($controller, $menu)
    {
        $controller->init();
        $init = $controller;
        $request = request();
        $table = $init->table;
        $cols = $init->col;
        $columns = [];
        foreach ($cols as $col) {
            $columns[] = [
                "label" => $col['label'],
                "image" => isset($col['image']) ? true : false,
                "data" => $col['data'],
                "callback" => isset($col['callback']) ? $col['callback'] : null,
            ];
        }
        // add action
        $columns[] = [
            "label" => "Action",
            "data" => "action",
            "orderable" => false,
            "searchable" => false
        ];
        $columns = json_encode($columns);
        return view('AdminLayout::datatable', compact('init', 'table', 'columns', 'cols', 'menu'));
    }

    public function index($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            // Arahkan ke ModuleController
            $controller_path = '\\Tokalink\\Starter\\Controllers\\ModuleController';
            $controller = new $controller_path();
            return $controller->getIndex($menu, $id);
        }
        $controller = new $controller_path();
        // cek jika ada method init maka jalankan method edit dari controller
        if (method_exists($controller, 'getIndex')) {
            return $controller->getIndex($menu, $id);
        }
        $data = $this->Loader($controller, $menu);
        return $data;
    }

    // ajax
    public function ajax($menu, $id = null)
    {
        try {
            $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
            if (!class_exists($controller_path)) {
                $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
            }
            if (!class_exists($controller_path)) {
                // Arahkan ke ModuleController
                $controller_path = '\\Tokalink\\Starter\\Controllers\\ModuleController';
                $controller = new $controller_path();
                return $controller->getAjax($menu, $id);
            }
            $controller = new $controller_path();
            $controller->init();
            $initdata = $controller;
            $request = request();
            $url = str_replace('/ajax', '', $request->url());
            $table = $initdata->table;
            $ajax_data = DB::table($table);
            if ($initdata->data_where) {
                $ajax_data = $ajax_data->whereRaw($initdata->data_where);
            }
            $ajax_data->orderBy('id', 'desc');

            $db = DataTables::of($ajax_data)
                ->addColumn('action', function ($row) use ($url, $controller) {
                    $btn = '';
                    if ($controller->button_edit) {
                        $btn .= '<a href="' . url($url . '/edit/' . $row->id) . '" class="btn btn-sm btn-icon btn-primary text-warning"><i class="fa fa-edit"></i></a>';
                    }
                    if ($controller->button_detail) {
                        $btn .= '<a href="' . url($url . '/detail/' . $row->id) . '" class="btn btn-sm btn-icon btn-warning text-dark"><i class="fa fa-eye"></i></a>';
                    }
                    if ($controller->button_show) {
                        $btn .= '<a class="btn btn-sm btn-icon btn-danger text-white" onclick="confirmDelete(' . $row->id . ')"><i class="fa fa-trash"></i></a>';
                    }
                    return $btn;
                });
            // ubah col format jika ada callback
            $col = $initdata->col;
            foreach ($col as $key => $c) {
                if (isset($c['callback'])) {
                    // each rows
                    $i = 0;
                    $db->editColumn($c['data'], function ($row) use ($c, $key, $i) {
                        $data = $row->{$c['data']};
                        $callback = $c['callback'];
                        return $callback($row);
                    });

                }

                
            }
            return $db->toJson();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


    // remove
    public function remove($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        $controller->init();
        $table = $controller->table;
        $data = DB::table($table)->where('id', $id)->delete();
        return $data;
    }

    // new 
    public function add($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        $controller->init();
        $init = $controller;
        $table = $controller->table;
        $form = $controller->form;
        $action = url(config('tokalink.admin_prefix') . '/' . $menu . '/store');
        $data = [];
        $title_form = "Add ";
        return view('AdminLayout::crud', compact('form', 'table', 'action', 'data', 'init', 'menu', 'title_form'));
    }

    //edit
    public function edit($menu, $id = null)
    {

        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        // cek jika ada method init maka jalankan method edit dari controller
        if (method_exists($controller, 'vEdit')) {
            return $controller->vEdit($id);
        }
        // dd($menu,$id,$controller);
        $controller->init();
        $table = $controller->table;
        $form = $controller->form;
        $init = $controller;
        $data = DB::table($table)->where('id', $id)->first();
        $action = url(config('tokalink.admin_prefix') . '/' . $menu . '/update/' . $id);
        $title_form = "Edit ";
        return view('AdminLayout::crud', compact('data', 'form', 'table', 'action', 'menu', 'title_form', 'init'));
    }

    public function detail($menu, $id = null)
    {

        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        // cek jika ada method init maka jalankan method edit dari controller
        if (method_exists($controller, 'vEdit')) {
            return $controller->edit($id);
        }
        // dd($menu,$id,$controller);
        $controller->init();
        $init = $controller;
        $table = $controller->table;
        $form = $controller->form;
        $data = DB::table($table)->where('id', $id)->first();
        $action = url(config('tokalink.admin_prefix') . '/' . $table . '/update/' . $id);
        $title_form = "Detail ";
        return view('AdminLayout::crud', compact('data', 'form', 'table', 'action', 'init', 'menu', 'title_form'));
    }

    // update
    public function update($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        if (method_exists($controller, 'postUpdate')) {
            return $controller->postUpdate($menu, $id);
        }
        $controller->init();
        $init = $controller;
        // dd($init,'update');
        $table = $controller->table;
        $form = $controller->form;
        $data = DB::table($table)->where('id', $id)->first();
        // /update
        $request = request();
        $data = $request->except('_token');
        // jika data berupa file maka upload
        foreach ($form as $f) {
            if ($f['type'] == 'file') {
                // upload file to storage.
                $file = $request->file($f['name']);
                if (!$file) continue;
                // random name
                $file_name = time() . '_' . preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
                if ($init->upload_path) {
                    // save on public/.$this->upload_path
                    $file_name = preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
                    $file_url =  Storage::disk('local')->putFileAs($init->upload_path, $file, $file_name);
                    // dd($file_url, $init->upload_path);
                } else {
                    $file_url =  Storage::disk('public')->putFileAs($table, $file, $file_name);
                }
                $data[$f['name']] = $file_url;
            }
        }
        // update_at
        $data['updated_at'] = date('Y-m-d H:i:s');
        DB::table($table)->where('id', $id)->update($data);
        if (method_exists($controller, 'AfterPostUpdate')) {
            return $controller->AfterPostUpdate($menu, $id);
        }
        return redirect(url(config('tokalink.admin_prefix') . '/' . $menu));
    }

    // store
    public function store($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\Admin\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }

        $controller = new $controller_path();
        if (method_exists($controller, 'postStore')) {
            return $controller->postStore($id);
        }
        $controller->init();
        $init = $controller;
        $table = $controller->table;
        $form = $controller->form;
        $data = DB::table($table)->where('id', $id)->first();
        // save data
        $request = request();
        $data = $request->except('_token');
        // jika data berupa file maka upload
        foreach ($form as $f) {
            if ($f['type'] == 'file') {
                // upload file to storage
                $file = $request->file($f['name']);
                if (!$file) continue;
                // random name
                $file_name = time() . '_' . preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
                if ($init->upload_path) {
                    // save on public.$this->upload_path
                    $file_name = preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
                    $file_url =  Storage::disk('local')->putFileAs($init->upload_path, $file, $file_name);
                } else {
                    $file_url =  Storage::disk('public')->putFileAs($table, $file, $file_name);
                }
                $data[$f['name']] = $file_url;
            }
        }
        // create_at
        $data['created_at'] = date('Y-m-d H:i:s');
        // $data['user_id'] = auth()->user()->id;
        $id = DB::table($table)->insertGetId($data);
        if (method_exists($controller, 'AfterPostStore')) {
            return $controller->AfterPostStore($menu, $id);
        }
        return redirect(url(config('tokalink.admin_prefix') . '/' . $menu));
    }
}
