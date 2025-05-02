<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailAdditionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('email_additionals')->insert([
            [
                'company' => '6',
                'email' => 'cc1@example.com',
                'email_type' => 'cc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => '6',
                'email' => 'bcc1@example.com',
                'email_type' => 'bcc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => '6',
                'email' => 'cc2@example.com',
                'email_type' => 'cc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => '6',
                'email' => 'bcc2@example.com',
                'email_type' => 'bcc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => '6',
                'email' => 'cc3@example.com',
                'email_type' => 'cc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => '6',
                'email' => 'bcc3@example.com',
                'email_type' => 'bcc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
