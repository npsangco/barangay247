<?php

namespace Database\Seeders;

use App\Models\Households;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Households::create([
            'household_head' => 'Denise Bunyi',
            'address' => 'Quezon City',
            'contact_information' => '09123456789',
            'number_of_members' => '5'
        ]);
    }
}