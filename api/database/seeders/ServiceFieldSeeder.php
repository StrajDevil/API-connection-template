<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Service;
use App\Models\ServiceField;
use App\Models\TypeField;
use Illuminate\Database\Seeder;

class ServiceFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all()->pluck('id', 'code');
        $fields = Field::all()->pluck('id', 'code');
        $typeFields = TypeField::all()->pluck('id', 'code');
        ServiceField::upsert([
            [
                'serviceID' => $services['numbers'],
                'fieldID' => $fields['type'],
                'typeFieldID' => $typeFields['select']
            ],
            [
                'serviceID' => $services['numbers'],
                'fieldID' => $fields['number'],
                'typeFieldID' => $typeFields['input']
            ],
            [
                'serviceID' => $services['numbers'],
                'fieldID' => $fields['month'],
                'typeFieldID' => $typeFields['input']
            ],
            [
                'serviceID' => $services['numbers'],
                'fieldID' => $fields['year'],
                'typeFieldID' => $typeFields['input']
            ],
            [
                'serviceID' => $services['jservice'],
                'fieldID' => $fields['number'],
                'typeFieldID' => $typeFields['input']
            ],
        ], ['serviceID', 'fieldID', 'typeFieldID']);
    }
}
