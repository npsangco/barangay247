<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Official::create([
            'official_name' => 'Hon. Roberto "Bert" Lopez',
            'position' => 'Barangay Captain',
            'contact_information' => 9175551234,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Official::create([
            'official_name' => 'Councilor Lisa Cruz',
            'position' => 'Barangay Kagawad (Peace & Order)',
            'contact_information' => 9187775678,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Official::create([
            'official_name' => 'Councilor David Ramos',
            'position' => 'Barangay Kagawad (Health)',
            'contact_information' => 9983339012,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Official::create([
            'official_name' => 'Secretary Anna Dela Rosa',
            'position' => 'Barangay Secretary',
            'contact_information' => 9991112233,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Official::create([
        'official_name' => 'Treasurer Mike Tan',
            'position' => 'Barangay Treasurer',
            'contact_information' => 9179998877,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
