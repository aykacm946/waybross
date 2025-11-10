<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description'
    ];

    // Settings cache'ini temizleme
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            cache()->forget('settings');
        });

        static::deleted(function () {
            cache()->forget('settings');
        });
    }

    public static function getValue($key, $default = null)
    {
        // Cache kullanarak performansı artırma
        $settings = cache()->remember('settings', 3600, function () {
            return self::all()->pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }

    public static function setValue($key, $value)
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        // Cache'i temizle
        cache()->forget('settings');

        return $setting;
    }

    public static function updateSettings(array $data)
    {
        foreach ($data as $key => $value) {
            self::setValue($key, $value);
        }

        return true;
    }

    public static function getGroup($group)
    {
        return self::where('group', $group)->get();
    }
}
