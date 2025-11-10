<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up()
    {
        // Konum bilgileri için yeni ayarlar ekleyelim
        $settings = [
            [
                'key' => 'location_latitude',
                'value' => '41.0082',
                'type' => 'string',
                'group' => 'location',
                'description' => 'Enlem (Latitude)'
            ],
            [
                'key' => 'location_longitude',
                'value' => '28.9784',
                'type' => 'string',
                'group' => 'location',
                'description' => 'Boylam (Longitude)'
            ],
            [
                'key' => 'location_address',
                'value' => '1234 Teknoloji Sokak No:1 İstanbul, Türkiye',
                'type' => 'text',
                'group' => 'location',
                'description' => 'Tam adres'
            ],
            [
                'key' => 'location_zoom',
                'value' => '15',
                'type' => 'string',
                'group' => 'location',
                'description' => 'Harita zoom seviyesi'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }

    public function down()
    {
        // Geri alma işlemi - konum ayarlarını sil
        Setting::where('group', 'location')->delete();
    }
};
