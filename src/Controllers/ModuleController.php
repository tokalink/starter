<?php

namespace Tokalink\Starter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;

class ModuleController extends Controller
{

    public function index(Request $request)
    {
        $data = DB::table('modules')->get();
        return view('AdminLayout::module', compact('data'));
    }

    public function edit($id)
    {
        $module = DB::table('modules')->where('id', $id)->first();
        $action = url(config('tokalink.admin_prefix') . '/module/update/' . $id);
        // all table_name in database user
        $tables = DB::select('SHOW TABLES');
        // ambil nama table saja
        $tables = array_map('current', $tables);

        $table = $module->table;
        // get column & type data from table
        $columns = DB::select('SHOW COLUMNS FROM ' . $table);

        // remove type timestamp & auto_increment
        $columns = array_filter($columns, function ($column) {
            return $column->Field != 'created_at' && $column->Field != 'updated_at' && $column->Extra != 'auto_increment';
        });
        dd($columns);
        return view('AdminLayout::module_edit', compact('module', 'action', 'tables'));
    }

    public function update($id)
    {
        dd(request()->all());
    }


    public function getIndex($menu, $id = null)
    {
        $form = DB::table('modules')->where('slug', $menu)->first();
        if (!$form) {
            return ucfirst($menu) . "Controller not found";
        }
        $action = url(config('tokalink.admin_prefix') . '/' . $menu . '/store');
        $cols = json_decode($form->col, true);
        $columns = [];
        foreach ($cols as $col) {
            $columns[] = [
                "label" => $col['label'],
                "image" => isset($col['image']) ? true : false,
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
        return view('AdminLayout::datatable', compact('form', 'action', 'cols', 'columns'));
    }

    public function getAjax($menu, $id)
    {

        $module = DB::table('modules')->where('slug', $menu)->first();
        $table = $module->table;
        $url = str_replace('/ajax', '', request()->url());
        return DataTables::of(DB::table($table))
            ->addColumn('action', function ($row) use ($url) {
                $btn = '<a href="' . url($url . '/edit/' . $row->id) . '" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="' . url($url . '/detail/' . $row->id) . '" class="btn btn-sm btn-icon btn-info"><i class="fa fa-eye"></i></a>';
                // delete confirm yes no
                $btn .= '<a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger" onclick="confirmDelete(' . $row->id . ')"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->toJson();
    }
}
