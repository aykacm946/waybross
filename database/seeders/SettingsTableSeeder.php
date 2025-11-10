<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        // Önce tüm ayarları temizle
        DB::table('settings')->truncate();

        $settings = [
            // Genel Ayarlar
            [
                'key' => 'site_title',
                'value' => 'Tanıtım Sitesi',
                'type' => 'string',
                'group' => 'general',
                'description' => 'Site başlığı (title)'
            ],
            [
                'key' => 'site_description',
                'value' => 'Profesyonel web çözümleri sunuyoruz.',
                'type' => 'text',
                'group' => 'general',
                'description' => 'Site açıklaması (meta description)'
            ],
            [
                'key' => 'site_keywords',
                'value' => 'web tasarım, laravel, php, mysql',
                'type' => 'string',
                'group' => 'general',
                'description' => 'Site anahtar kelimeleri'
            ],
            [
                'key' => 'site_logo',
                'value' => '',
                'type' => 'string',
                'group' => 'general',
                'description' => 'Site logosu URL'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'general',
                'description' => 'Bakım modu'
            ],

            // İletişim Ayarları
            [
                'key' => 'contact_email',
                'value' => 'info@tanitimsitesi.com',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'İletişim email adresi'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+90 (212) 123 45 67',
                'type' => 'string',
                'group' => 'contact',
                'description' => 'İletişim telefonu'
            ],
            [
                'key' => 'contact_address',
                'value' => '1234 Teknoloji Sokak No:1 İstanbul, Türkiye',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'İletişim adresi'
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
            ],
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

            // Konum Ayarları
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
            ],

            // Sosyal Medya
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/tanitimsitesi',
                'type' => 'string',
                'group' => 'social',
                'description' => 'Facebook sayfası URL'
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/tanitimsitesi',
                'type' => 'string',
                'group' => 'social',
                'description' => 'Twitter hesabı URL'
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/tanitimsitesi',
                'type' => 'string',
                'group' => 'social',
                'description' => 'Instagram hesabı URL'
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/tanitimsitesi',
                'type' => 'string',
                'group' => 'social',
                'description' => 'LinkedIn sayfası URL'
            ],
            [
                'key' => 'social_github',
                'value' => 'https://github.com/tanitimsitesi',
                'type' => 'string',
                'group' => 'social',
                'description' => 'GitHub hesabı URL'
            ],

            // SEO Ayarları
            [
                'key' => 'seo_google_analytics',
                'value' => '',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Google Analytics Tracking ID'
            ],
            [
                'key' => 'seo_meta_author',
                'value' => 'Tanıtım Sitesi',
                'type' => 'string',
                'group' => 'seo',
                'description' => 'Meta author'
            ],
            [
                'key' => 'seo_meta_robots',
                'value' => 'index, follow',
                'type' => 'string',
                'group' => 'seo',
                'description' => 'Meta robots'
            ],

            // Email Ayarları
            [
                'key' => 'email_from_name',
                'value' => 'Tanıtım Sitesi',
                'type' => 'string',
                'group' => 'email',
                'description' => 'Gönderen adı'
            ],
            [
                'key' => 'email_from_address',
                'value' => 'noreply@tanitimsitesi.com',
                'type' => 'string',
                'group' => 'email',
                'description' => 'Gönderen email adresi'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        $this->command->info('Tüm site ayarları başarıyla oluşturuldu! Toplam: ' . count($settings) . ' ayar');
    }
}
