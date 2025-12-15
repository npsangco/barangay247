<?php

namespace Database\Seeders;

use App\Models\Incident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Incident::create([
            'resident_id' => 1,
            'official_id' => 1,
            'incident_type' => 'Noise Complaint',
            'incident_details' => 'Loud music and shouting reported from unit 10B after 11 PM.',
            'date_reported' => Carbon::parse('2025-10-25')->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Incident::create([
            'resident_id' => 2,
            'official_id' => 2,
            'incident_type' => 'Petty Theft',
            'incident_details' => 'Missing package from the front porch. Delivery confirmed via CCTV.',
            'date_reported' => Carbon::parse('2025-10-27')->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Incident::create([
            'resident_id' => 3,
            'official_id' => 3,
            'incident_type' => 'Vandalism',
            'incident_details' => 'Graffiti found on the wall of the community park playground.',
            'date_reported' => Carbon::parse('2025-10-28')->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Incident::create([
            'resident_id' => 4,
            'official_id' => 1,
            'incident_type' => 'Road Hazard',
            'incident_details' => 'Large, deep pothole developed near the intersection of Elm and Oak Street.',
            'date_reported' => Carbon::parse('2025-10-31')->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Incident::create([
            'resident_id' => 5,
            'official_id' => 2,
            'incident_type' => 'Suspicious Activity',
            'incident_details' => 'An unmarked van was seen driving slowly and taking photos of houses for over an hour.',
            'date_reported' => Carbon::parse('2025-11-01')->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
