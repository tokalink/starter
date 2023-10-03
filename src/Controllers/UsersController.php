<?php

namespace Tokalink\Starter\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends CustomController
{
    public function init()
    {
        $this->table = 'users';
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = true;
        $this->button_detail = true;
        $this->button_show = true;
        $this->button_filter = true;
        $this->button_import = false;
        $this->button_export = false;
        $this->paginate = 10;
        $this->datatable = false;

        $this->col = [];
        $this->col[] = ["label" => "Avatar", "data" => "avatar", "image" => true];
        $this->col[] = ["label" => "Name", "data" => "name"];
        $this->col[] = ["label" => "Phone", "data" => "created_at"];
        $this->col[] = ["label" => "Email", "data" => "email"];

        $this->form = [];
        $this->form[] = ["label" => "Name", "name" => "name", "type" => "text", "placeholder" => "Name", "required" => true];
        $this->form[] = ["label" => "Phone", "name" => "phone", "type" => "text", "placeholder" => "Phone", "required" => true];
        $this->form[] = ["label" => "Email", "name" => "email", "type" => "text", "placeholder" => "Email", "required" => true];
        // Avatar
        $this->form[] = ["label" => "Avatar", "name" => "avatar", "type" => "file", "placeholder" => "Avatar", "required" => false];
    }

}
