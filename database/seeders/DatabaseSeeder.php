<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
        // \App\Models\User::factory(10)->create();
        try {
            DB::beginTransaction();
            $this->call(UserSeeder::class);
            DB::commit();
            (new ConsoleOutput())->writeln('User successfully created');
        } catch (\Exception $e) {
            DB::rollback();
            dd("Exception: {$e->getMessage()}");
        }
    }
}
