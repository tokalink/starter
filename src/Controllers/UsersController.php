<?php

namespace Tokalink\Starter\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $table, $title_field, $limit, $orderby, $global_privilege, $button_table_action, $button_bulk_action, $button_action_style, $button_add, $button_edit, $button_delete, $button_detail, $button_show, $button_filter, $button_import, $button_export, $col;
    public function init()
    {
        $this->table = 'users';
        $this->title_field = "name";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = true;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = true;
        $this->button_detail = true;
        $this->button_show = true;
        $this->button_filter = true;
        $this->button_import = false;
        $this->button_export = false;

        $this->col = [];
        // gabung first_name & last_name
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Phone", "name" => "phone"];
        $this->col[] = ["label" => "Email", "name" => "email"];

        return $this;
    }
}
