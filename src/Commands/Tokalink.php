<?php

namespace Tokalink\Starter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class Tokalink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokalink:install';

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

        // Ascii art random kata
        $this->comment("
          _______    ____    _  __             _        _____   _   _   _  __
         |__   __|  / __ \  | |/ /     /\     | |      |_   _| | \ | | | |/ /
            | |    | |  | | | ' /     /  \    | |        | |   |  \| | | ' / 
            | |    | |  | | |  <     / /\ \   | |        | |   | . ` | |  <  
            | |    | |__| | | . \   / ____ \  | |____   _| |_  | |\  | | . \ 
            |_|     \____/  |_|\_\ /_/    \_\ |______| |_____| |_| \_| |_|\_\
            
            Selamat datang di Tokalink, Mohon Setup dulu Database anda di .env
                                                                            
        "); // kosong

       // Buat pertanyaan yakin mau install atau tidak
        if (! $this->confirm('Yakin mau install Tokalink?')) {
            return;
        } 

        // info installing tokalink

        $this->info('Installing Tokalink...');

        $this->info('Publishing configuration...');
        // cek config tokalink jika ada tanya mau overwrite atau tidak
        if (file_exists(config_path('tokalink.php'))) {
            if ($this->confirm('The Tokalink configuration file already exists. Do you want to overwrite it?')) {
                $this->info('Overwriting configuration file...');
                $this->call('vendor:publish', [
                    '--provider' => "Tokalink\Starter\Providers\TokalinkProvider",
                    '--tag' => "tokalink-config",
                    '--force' => true,
                ]);
            }
            
        }else{
            $this->call('vendor:publish', [
                '--provider' => "Tokalink\Starter\Providers\TokalinkProvider",
                '--tag' => "tokalink-config",
            ]);
        }

       

        $this->info('Publishing assets...');

        $this->call('vendor:publish', [
            '--provider' => "Tokalink\Starter\Providers\TokalinkProvider",
            '--tag' => "tokalink-assets-admin/theme1",
        ]);

         
        // tanya hapus migration default laravel atau tidak, jika ya maka hapus semua table
        if ($this->confirm('Yakin mau hapus migration default laravel?')) {
            $this->info('Hapus migration default laravel...');
            $this->call('migrate:reset');
        }

        $this->info('Publishing migrations...');
        $this->call('vendor:publish', [
            '--provider' => "Tokalink\Starter\Providers\TokalinkProvider",
            '--tag' => "tokalink-migrations",
        ]);

        // cek table users jika belum ada maka buat table users maka run migration
        if (!Schema::hasTable('users')) {
            $this->info('Membuat table users...');
            $this->call('migrate');
        }

        $this->info('Migrating database...');
        $this->call('migrate', [
            '--path' => "vendor/tokalink/starter/src/database/migrations",
        ]);

        // Tanya jalanin seeder atau tidak
        if ($this->confirm('Yakin mau jalanin seeder?')) {
            $this->info('Seeding database...');
            $this->call('db:seed', [
                '--class' => "Tokalink\Starter\Seeders\add_user",
            ]);
            $this->call('db:seed', [
                '--class' => "Tokalink\Starter\Seeders\create_roles",
            ]);
        }
       
       

        $this->info('Installed Tokalink');
    }
}
