<?php

namespace Tokalink\Starter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CustomController extends Controller
{
    public $table,$paginate,$datatable, $title_field, $limit, $orderby, $global_privilege, $button_table_action, $button_bulk_action, $button_action_style, $button_add, $button_edit, $button_delete, $button_detail, $button_show, $button_filter, $button_import, $button_export, $col;
    public $col_name = [];



    public function Loader($controller)
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
                "data" => $col['data']
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
        return view('AdminLayout::default.'.config('tokalink.theme').'.datatable', compact('init', 'table', 'columns', 'cols'));
    }

    public function initAjax($controller)
    {

        $controller->init();
        $initdata = $controller;
        $request = request();
        $url = str_replace('/ajax', '', $request->url());
        $table = $initdata->table;
        return DataTables::of(DB::table($table))
        ->addColumn('action', function ($row) use ($url, $controller) {
            $btn = '<a href="' . url($url.'/edit/' . $row->id) . '" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit"></i></a>';
            $btn .= '<a href="' . url($url.'/detail/' . $row->id) . '" class="btn btn-sm btn-icon btn-info"><i class="fa fa-eye"></i></a>';
            // delete confirm yes no
            $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger" onclick="confirmDelete(' . $row->id . ')"><i class="fa fa-trash"></i></a>';
            return $btn;
        })
        ->toJson();
        // dd($table, $request, $controller);
    }

    public function index($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        $data = $this->Loader($controller);
        return $data;
    }

    // ajax
    public function ajax($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu) . "Controller not found";
        }
        $controller = new $controller_path();
        $data = $this->initAjax($controller);
        return $data;
    }

    // custom
    public function custom($menu, $id = null)
    {
        echo "custom";
    }

    // remove
    public function remove($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($menu) . 'Controller';
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
}
