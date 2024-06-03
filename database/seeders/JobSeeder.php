<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Job::create([
            'title' => 'Director',
            'salary' => 'ksh 10000'
        ]);

        Job::create([
            'title' => 'Programmer',
            'salary' => 'ksh 50000'
        ]);

        Job::create([
            'title' => 'Teacher',
            'salary' => 'ksh 45000'
        ]);
    }
}
