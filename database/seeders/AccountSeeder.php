<?php

namespace Database\Seeders;

use App\Models\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'name' => 'Test',
            'email' => 'test@test.com',
        ]);

        Account::create([
            'name' => 'Test',
            'email' => 'test1@test.com',
        ]);        
    }
}
