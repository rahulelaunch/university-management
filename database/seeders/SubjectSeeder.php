<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('subjects')->truncate();

        $data = [
            [
                'name' => 'Mathematics',
                'code' => '041',
                'status' => '1',
            ],
            [
                'name' => 'Physics',
                'code' => '042',
                'status' => '1',
            ],
            [
                'name' => 'Chemistry',
                'code' => '043',
                'status' => '1',
            ],
            [
                'name' => 'Biology',
                'code' => '044',
                'status' => '1',
            ],
            [
                'name' => 'Gujarati',
                'code' => '001',
                'status' => '1',
            ],
            [
                'name' => 'English',
                'code' => '001',
                'status' => '1',
            ],
        ];
        Subject::insert($data);
    }
}
