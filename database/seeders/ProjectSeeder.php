<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Website Redesign',
                'description' => 'Redesigning the company website for a modern look.',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Developing a mobile application for iOS and Android platforms.',
            ],
            [
                'name' => 'Marketing Campaign - Summer Sale',
                'description' => 'Planning and executing a summer sale marketing campaign.',
            ],
            [
                'name' => 'Product Launch - XYZ Widget',
                'description' => 'Introducing a new product, the XYZ Widget, to the market.',
            ],
            [
                'name' => 'Customer Loyalty Program',
                'description' => 'Implementing a customer loyalty program to reward loyal customers.',
            ],
            [
                'name' => 'Social Media Engagement Boost',
                'description' => 'Increasing social media presence and engagement through targeted strategies.',
            ],
            [
                'name' => 'Employee Training Platform',
                'description' => 'Developing an online platform for employee training and development.',
            ],
            [
                'name' => 'Sustainability Initiative',
                'description' => 'Launching a company-wide sustainability program to reduce environmental impact.',
            ],
            [
                'name' => 'IT Infrastructure Upgrade',
                'description' => 'Upgrading the companys IT infrastructure for improved efficiency and security.',
            ],
            [
                'name' => 'International Expansion',
                'description' => 'Planning and executing strategies for the companys international expansion.',
            ],
            [
                'name' => 'Customer Feedback System',
                'description' => 'Implementing a robust system to collect and analyze customer feedback for continuous improvement.',
            ],
            
        ];
        

        DB::table('projects')->insert($projects);
    }
}
