<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Field::upsert([
            [
                'name' => 'Type',
                'code' => 'type'
            ],
            [
                'name' => 'Number',
                'code' => 'number'
            ],
            [
                'name' => 'Month',
                'code' => 'month'
            ],
            [
                'name' => 'Year',
                'code' => 'year'
            ],
        ], 'code');
    }
}
