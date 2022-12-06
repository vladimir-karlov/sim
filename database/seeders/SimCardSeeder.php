<?php

namespace Database\Seeders;

use App\Models\SimCard;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SimCard::create([
	        'id'=> 1,
            'account_id' => 1,
            'iccid' => '361024322434',
            'is_active' => 1,
            'notes' => 'Test Note'
        ]);
        
        SimCard::create([
	        'id'=> 2,	        
            'account_id' => 1,
            'iccid' => '361024322434',
            'is_active' => 0,
            'notes' => 'Test Note'
        ]);        
        
        SimCard::create([
	        'id'=> 3,	        
            'account_id' => 2,
            'iccid' => '361024322434',
            'is_active' => 0,
            'notes' => 'Test Note'
        ]);                

    }
}
