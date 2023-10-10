<?php
namespace Tokalink\Starter\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TokaHelper{
    public static function getAdminPrefix(){
        return config('tokalink.admin_prefix');
    }

    // get username
    public static function myUsername(){
        return Auth::user()->username;
    }

    // get user id
    public static function myId(){
        return Auth::user()->id;
    }

    // role name
    public static function myRoleName(){
        $role = DB::table('roles')->where('id', Auth::user()->role_id)->first();
        return $role->name ?? '';
    }

    // role id
    public static function myRoleId(){
        return Auth::user()->role_id;
    }

    // is Admin
    public static function isAdmin(){
        return Auth::user()->role_id == 1 ? true : false;
    }
}