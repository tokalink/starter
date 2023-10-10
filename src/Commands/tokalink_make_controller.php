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
    // param --table, --view
    protected $signature = 'tokalink:controller {name} {--table=} {--view=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller from Template Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        if (!$name) {
            $this->error('Please provide a name for the controller');
            return;
        }
        $table = $this->option('table') ?? $name;
        $view = $this->option('view');
        $this->info('Creating Controller...');

        if (!str_contains($name, 'Controller')) {
            $name = $name . 'Controller';
        }
        $this->copyController($name, $table);
    }

    public function copyController($name, $table)
    {
        $controller = file_get_contents(__DIR__ . '/../Controllers/TemplController.php');
        $controller = str_replace(" \$this->table = 'users';", " \$this->table = '$table';", $controller);
        $controller = str_replace("class TemplController extends CustomController", "class $name extends CustomController", $controller);

        if (!is_dir(app_path('Http/Controllers/Admin'))) {
            mkdir(app_path('Http/Controllers/Admin'));
        }

        file_put_contents(app_path("Http/Controllers/Admin/$name.php"), $controller);
        $this->info('Controller Created');

        // appen config menu
        $config = file_get_contents(config_path('tokalink.php'));
        $config = str_replace("]
    ];", "    '$table' => [
            'name' => '$table',
            'icon' => 'fa fa-circle-o',
            'route' => '$table',
            'controller' => '$name',
            'parent' => null,
            'order' => 0,
            'global_privilege' => 1,
            'menu' => [
                'index' => [
                    'name' => 'index',
                    'icon' => 'fa fa-circle-o',
                    'route' => '$table',
                    'controller' => '$name',
                    'parent' => '$table',
                    'order' => 0,
                    'global_privilege' => 1,
                ],
                'create' => [
                    'name' => 'create',
                    'icon' => 'fa fa-circle-o',
                    'route' => '$table/create',
                    'controller' => '$name',
                    'parent' => '$table',
                    'order' => 0,
                    'global_privilege' => 1,
                ],
                'edit' => [
                    'name' => 'edit',
                    'icon' => 'fa fa-circle-o',
                    'route' => '$table/{id}/edit',
                    'controller' => '$name',
                    'parent' => '$table',
                    'order' => 0,
                    'global_privilege' => 1,
                ],
                'show' => [
                    'name' => 'show',
                    'icon' => 'fa fa-circle-o',
                    'route' => '$table/{id}',
                    'controller' => '$name',
                    'parent' => '$table',
                    'order' => 0,
                    'global_privilege' => 1,
                ],
                'delete' => [
                    'name' => 'delete',
                    'icon' => 'fa fa-circle-o',
                    'route' => '$table/{id}',
                    'controller' => '$name',
                    'parent' => '$table',
                    'order' => 0,
                    'global_privilege' => 1,
                ],
            ]
        ],
];", $config);
        file_put_contents(config_path("tokalink.php"), $config);
        $this->info('Config Menu Updated');

       
    }
}
