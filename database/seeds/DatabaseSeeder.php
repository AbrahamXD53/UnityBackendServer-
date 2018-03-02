<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('db')->table('items')->insert([
            'icon' => 1,
            'points' => 0,
            'money' => 500,
            'currency' => 1,
            'cost' => 0
        ]);
    }
}
