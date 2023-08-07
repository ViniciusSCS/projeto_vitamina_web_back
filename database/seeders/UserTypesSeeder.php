<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type' => 'Vendedor'
            ],
            [
                'type' => 'Cliente'
            ]
        ];

        foreach ($types as $types) {
            UserTypes::UpdateOrCreate($types, $types);
        }
    }
}
