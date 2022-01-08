<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::create([
            'name' => 'University',
            'email' => 'admin@admin.com',
            'password' => Hash::make("admin@123"),
            'contact_no'=>'9999900909',
            'address'=>'surat'

        ]);
    }
}
