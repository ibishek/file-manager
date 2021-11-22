<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FileProgress;

class FileProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $progress = array(
            array('stored'),
            array('tabulated'),
            array('closed')
        );

        array_walk(
            $progress,
            fn ($each) =>
            FileProgress::create([
                'progress' => array_shift($each)
            ])
        );
    }
}
