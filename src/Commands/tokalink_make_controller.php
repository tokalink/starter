<?php

namespace Tokalink\Starter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class tokalink_make_controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'tokalink:controller {name} {table?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //  create controller from templController replace name, table  
        $name = $this->argument('name');
        $table = $this->argument('table');
        $this->info('Creating Controller...');
        // copy controller from Tokalink\\Starter\\Controllers\\TemplController.php to  templController to App\Http\Controllers\\$name.php
        $this->copyController($name, $table);
    }

    public function copyController($name, $table)
    {
        $controller = file_get_contents(__DIR__ . '/../Controllers/TemplController.php');
        $controller = str_replace(" \$this->table = 'users';", " \$this->table = '$table';", $controller);
        $controller = str_replace("class TemplController extends CustomController", "class $name extends CustomController", $controller);
        // save controller to App\Http\Controllers\\$name.php
        file_put_contents(app_path("Http/Controllers/$name.php"), $controller);
        $this->info('Controller Created');

    }


}
