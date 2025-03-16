<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'RCC Colab Solutions',
                'representative_name' => 'Kent Cortiguerra',
                'representative_email' => 'kent.cortiguerra@rcccolabsolutions.com',
                'representative_contact_number' => '09171234567',
                'sigin_code' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Tech Innovations Inc.',
                'representative_name' => 'Kent Cortiguerra',
                'representative_email' => 'kent.cortiguerra@rcccolabsolutions.com',
                'representative_contact_number' => '09179876543',
                'sigin_code' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Colab IT Solutions',
                'representative_name' => 'Kent Cortiguerra',
                'representative_email' => 'kent.cortiguerra@rcccolabsolutions.com',
                'representative_contact_number' => '09175678901',
                'sigin_code' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Global IT Hub',
                'representative_name' => 'Kent Cortiguerra',
                'representative_email' => 'kent.cortiguerra@rcccolabsolutions.com',
                'representative_contact_number' => '09173456789',
                'sigin_code' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'NextGen Tech Solutions',
                'representative_name' => 'Kent Cortiguerra',
                'representative_email' => 'kent.cortiguerra@rcccolabsolutions.com',
                'representative_contact_number' => '09172345678',
                'sigin_code' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('company_databases')->insert($companies);
    }
}
