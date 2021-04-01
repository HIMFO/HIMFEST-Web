<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Stefano Christian Wiryana',
            'email' => 'stefano.wiryana@binus.ac.id',
            'password' => HASH::make('himfo000'),
        ]);

        Admin::create([
            'name' => 'Leonardo Wijaya',
            'email' => 'leonardo.wijaya003@binus.ac.id',
            'password' => HASH::make('himfo003'),
        ]);
    }
}
