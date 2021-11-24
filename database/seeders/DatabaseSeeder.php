<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*-----------------------------------------------------------------------------------------------------------------
        /* Warn: Since here I am using db transaction method 'created_at' timestamp will be same for all rows when seeding
        /*-----------------------------------------------------------------------------------------------------------------*/
        try {
            DB::beginTransaction();
            $this->call(UserSeeder::class);
            $this->call(FileProgressSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(PermissionSeeder::class);
            $this->call(GiveUserPermissionSeeder::class);
            $this->call(AssignAdminRoleSeeder::class);
            DB::commit();
            (new ConsoleOutput())->writeln('User created successfully');
            (new ConsoleOutput())->writeln('Roles created successfully');
            (new ConsoleOutput())->writeln('Roles permissions created successfully');
            (new ConsoleOutput())->writeln('Use above is assigned as admin');
            (new ConsoleOutput())->writeln(Artisan::call('inspire'));
        } catch (\Exception $e) {
            DB::rollback();
            dd("Exception: {$e->getMessage()}");
        }
    }
}
