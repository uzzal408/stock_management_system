<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'Team Cut Out Int.',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'Team Cut Out Int.',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'info@teamcutout.com',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  "Copyright © 2022 Team Cut Out Int., All Rights Reserved"
        ],

        [
            'key'                       =>  'mobile',
            'value'                     =>  '01788111408',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '01788111408',
        ],
        [
            'key'                       =>  'address_1',
            'value'                     =>  'Dhaka,',
        ],
        [
            'key'                       =>  'address_2',
            'value'                     =>  'Dhaka 1204, Bangladesh.',
        ],
    ];

    public function run()
    {
        foreach ($this->settings as $index=>$setting){
            $result = Setting::create($setting);
        }
    }
}
