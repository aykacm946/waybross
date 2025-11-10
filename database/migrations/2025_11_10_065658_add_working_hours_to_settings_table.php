<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up()
    {
        // Çalışma saatleri için eksik ayarları ekleyelim
        $settings = [
            [
                'key' => 'contact_working_days',
                'value' => 'Pazartesi - Cuma',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'Çalışma günleri'
            ],
            [
                'key' => 'contact_working_hours_weekdays',
                'value' => '09:00 - 18:00',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'Hafta içi çalışma saatleri'
            ],
            [
                'key' => 'contact_working_hours_saturday',
                'value' => '10:00 - 16:00',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'Cumartesi çalışma saatleri'
            ],
            [
                'key' => 'contact_closed_days',
                'value' => 'Pazar',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'Kapalı olduğu günler'
            ],
            [
                'key' => 'contact_phone1',
                'value' => '+90 (555) 123 45 67',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'ilk telefon numarası'
            ],
            [
                'key' => 'contact_email1',
                'value' => 'destek@tanitimsitesi.com',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'ilk email adresi'
            ],
            [
                'key' => 'contact_phone2',
                'value' => '+90 (555) 123 45 67',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'İkinci telefon numarası'
            ],
            [
                'key' => 'contact_email2',
                'value' => 'destek@tanitimsitesi.com',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'İkinci email adresi'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }

    public function down()
    {
        Setting::whereIn('key', [
            'contact_working_days',
            'contact_working_hours_weekdays',
            'contact_working_hours_saturday',
            'contact_closed_days',
            'contact_phone1',
            'contact_email1',
            'contact_phone2',
            'contact_email2'
        ])->delete();
    }
};
