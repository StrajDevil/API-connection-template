<?php

namespace Database\Seeders;

use App\Models\TypeField;
use Illuminate\Database\Seeder;

class TypeFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeField::upsert([
            [
                'name' => 'Select',
                'code' => 'select'
            ],
            [
                'name' => 'Input',
                'code' => 'input'
            ],
        ], 'code');
    }
}
