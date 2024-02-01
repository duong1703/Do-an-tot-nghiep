<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunAllSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('ProductSeeder');
    }
}
