<?php

namespace Database\Seeders;

use App\Models\Project; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'project_name' => 'Flood Control Project',
            'project_description' => 'To help with floods',
            'start_date' => '2025-10-25',
            'end_date' => '2026-10-25',
            'project_status' => 'Pending: Project has not been started',
        ]);

        Project::create([
            'project_name' => 'Barangay Health Information System',
            'project_description' => 'A digital record-keeping system for patient data and medical services within the barangay.',
            'start_date' => '2025-11-01',
            'end_date' => '2026-03-30',
            'project_status' => 'Ongoing: Development and testing phase',
        ]);

        Project::create([
            'project_name' => 'Smart Waste Management Program',
            'project_description' => 'Implementation of IoT-enabled bins to monitor and optimize garbage collection schedules.',
            'start_date' => '2025-09-15',
            'end_date' => '2026-02-15',
            'project_status' => 'Pending: Awaiting approval from city officials',
        ]);

        Project::create([
            'project_name' => 'Community Wi-Fi Expansion',
            'project_description' => 'Providing free public Wi-Fi access to underserved barangay areas through mesh networking.',
            'start_date' => '2025-10-10',
            'end_date' => '2026-04-10',
            'project_status' => 'Completed: Fully deployed and operational',
        ]);

        Project::create([
            'project_name' => 'Disaster Response Mobile App',
            'project_description' => 'An app for real-time reporting and coordination during natural disasters.',
            'start_date' => '2025-08-01',
            'end_date' => '2026-01-15',
            'project_status' => 'Ongoing: User testing and feedback collection phase',
        ]);

        Project::create([
            'project_name' => 'Sustainable Urban Gardening Initiative',
            'project_description' => 'Encouraging residents to grow food in small spaces using vertical gardening techniques.',
            'start_date' => '2025-07-20',
            'end_date' => '2026-06-20',
            'project_status' => 'Pending: Project has not been started',
        ]);


    }
}
