<?php

namespace Tokalink\Starter\Controllers;

use Illuminate\Http\Request;
use Tokalink\Starter\Controllers\CustomController;
use Illuminate\Support\Facades\DB;

class TemplController extends CustomController
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
        $this->col[] = ["label" => "Name", "data" => "name"];
        $this->col[] = ["label" => "Phone", "data" => "created_at"];
        $this->col[] = ["label" => "Email", "data" => "email"];
    }
}
