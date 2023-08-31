<?php
namespace Tokalink\Starter\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CBToka {
    // default index
    public static function index($data){
        // dd($data);
        $request = request();
        $table = $data->table ?? '';
        $cols = $data->col ?? [];
        $data = $data ?? DB::table($table)->select('*')->paginate(10);
        return view('tokalink::default.table', compact('data', 'table'));
    }
}