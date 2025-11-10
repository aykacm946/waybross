<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up()
    {
        // Çakışan ayarları temizle
        $duplicateKeys = [
            'contact_working_days',
            'contact_working_hours_weekdays',
            'contact_working_hours_saturday',
            'contact_closed_days',
            'contact_phone2',
            'contact_email2'
        ];

        foreach ($duplicateKeys as $key) {
            // Aynı key'den birden fazla varsa, en son eklenen dışındakileri sil
            $settings = Setting::where('key', $key)->orderBy('created_at', 'desc')->get();
            if ($settings->count() > 1) {
                for ($i = 1; $i < $settings->count(); $i++) {
                    $settings[$i]->delete();
                }
            }
        }
    }

    public function down()
    {
        // Geri alma gerekmez
    }
};
