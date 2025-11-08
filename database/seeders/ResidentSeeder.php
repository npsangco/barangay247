<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resident::create([
            'resident_name' => 'Maria Santos',
            'date_of_birth' => Carbon::parse('1990-05-15')->toDateString(),
            'gender' => 'Female',
            'contact_information' => 9171234567, 
            'address' => '123 Pineapple St, Brgy. Central',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Resident::create([
            'resident_name' => 'Juan Dela Cruz',
            'date_of_birth' => Carbon::parse('1985-01-20')->toDateString(),
            'gender' => 'Male',
            'contact_information' => 9187654321,
            'address' => '456 Mango Ave, Brgy. East',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),  
        ]);
        Resident::create([
            'resident_name' => 'Sofia Reyes',
            'date_of_birth' => Carbon::parse('2000-11-03')->toDateString(),
            'gender' => 'Female',
            'contact_information' => 9192233445,
            'address' => '789 Sampaguita Ln, Brgy. West',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Resident::create([
            'resident_name' => 'Elias Panganiban',
            'date_of_birth' => Carbon::parse('1972-07-28')->toDateString(),
            'gender' => 'Male',
            'contact_information' => 9987766554,
            'address' => '321 Acacia Dr, Brgy. North',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Resident::create([
            'resident_name' => 'Luzviminda Diaz',
            'date_of_birth' => Carbon::parse('1965-03-10')->toDateString(),
            'gender' => 'Female',
            'contact_information' => 9991122330,
            'address' => '654 Narra Road, Brgy. South',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
