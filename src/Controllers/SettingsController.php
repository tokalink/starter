<?php

namespace Tokalink\Starter\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends CustomController
{
    public function init()
    {
        $this->table = 'settings';
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
        $this->title = "Settings";

        $this->col = [];
        $this->col[] = ["label" => "Aplication Name", "data" => "app_name"];
        $this->col[] = ["label" => "Logo", "data" => "logo", "image" => true];
        $this->col[] = ["label" => "Favicon", "data" => "favicon", "image" => true];

        $this->form = [];
        $this->form[] = ["label" => "Aplication Name", "name" => "app_name", "type" => "text", "placeholder" => "Aplication Name", "required" => true];
        // logo
        $this->form[] = ["label" => "Logo", "name" => "logo", "type" => "file", "placeholder" => "Logo", "required" => false];
        // favicon
        $this->form[] = ["label" => "Favicon", "name" => "favicon", "type" => "file", "placeholder" => "Favicon", "required" => false];
    }
}
