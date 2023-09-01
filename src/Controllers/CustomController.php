<?php

namespace Tokalink\Starter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomController extends Controller
{
    public function init($controller)
    {
        $data = $controller->init();
        $request = request();
        $table = $data->table ?? '';
        $cols = $data->col ?? [];
        $datatable = $data ?? DB::table($table)->select('*')->paginate(10);
        dd($data, $request->all(), $datatable);
        return view('AdminLayout::default.table', compact('data', 'table'));
    }

    public function initAjax($controller)
    {
        $data = $controller->init();
        $request = request();
        $table = $data->table ?? 'users';
        $cols = $data->col ?? [];
        // get col name
        
        // gabung col name dengan  ,
        $col = [];
        foreach ($cols as $key => $value) {
            $col[] = $value['name'];
        }
        $col = implode(',', $col);
        dd($cols, $col);
        $datatable = DB::table($table)->select('*');
        $datatable->get();
        $json_data = [
            'draw' => $request->draw,
            'recordsTotal' => $datatable->count(),
            'recordsFiltered' => $datatable->count(),
            'data' => $datatable,
        ];
        dd($data, $request->all(), $json_data);
    }
    
    public function index($menu, $id = null)
    {
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($menu) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($menu) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return ucfirst($menu)."Controller not found";
        }
        $controller = new $controller_path();
        $data = $this->init($controller);
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
            return ucfirst($menu)."Controller not found";
        }
        $controller = new $controller_path();
        $data = $this->initAjax($controller);
        return $data;
    }
}
