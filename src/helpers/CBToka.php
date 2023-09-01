<?php
namespace Tokalink\Starter\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CBToka  {
    // default index
    public $col_name = [];

    public static function index($data){
        // dd($data);
        $request = request();
        $table = $data->table ?? '';
        $cols = $data->col ?? [];
        $data = $data ?? DB::table($table)->select('*')->paginate(10);
        return view('AdminLayout::default.table', compact('data', 'table'));
    }

    // default ajax
    public static function ajax($data){
        $request = request();
        $table = $data->table ?? 'users';
        self::$col_name = $data->col ?? [];
        dd(self::$col_name);
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
}