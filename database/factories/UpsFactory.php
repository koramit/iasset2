<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\location;
use App\Mobility;
use App\Section;
use App\Owner;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Upses;
use Faker\Generator as Faker;

$factory->define(Upses::class, function (Faker $faker) {
    return [
        'sapid' => '123456789012',
        'pid' => '11000800-I-7440-001-0001/55',
        'location_id' => 8,
        'mobility_id' => factory(App\Mobility::class),
        'response_person' => 'PP',
        'section_id' =>factory(App\Section::class),
        'tel_no'=>'9-7043#108',
        'owner_id'=>factory(App\Owner::class),
        'asset_status_id'=>factory(App\Asset_statuses::class),
        'asset_use_status_id'=>factory(App\Asset_use_statuses::class),
        'brand'=>'brand',
        'model'=>'model',
        'serial_no'=>'test',
        'form_factor'=> 2,
        'topology' => 2,
        'capacity' => 1,
        'is_modular' => 0,
        'battery_type'=> 1,
        'has_external_battery' => 0,
        'device_management_address' => $faker->localIpv4,
        'issues' => 'test',
        'remarks' => 'Fake Data NOT FOR PRODUCTION',
    ];
});
