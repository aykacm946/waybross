<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        $groups = $settings->keys();

        return view('admin.settings.index', compact('settings', 'groups'));
    }

    public function update(Request $request)
    {
        // Tüm form verilerini al
        $data = $request->except('_token');

        try {
            // Her bir ayarı güncelle
            foreach ($data as $key => $value) {
                // Checkbox değerlerini işle
                if ($value === '1' || $value === 'on') {
                    $value = '1';
                } elseif (empty($value) && $value !== '0') {
                    // Boş string değerleri için
                    $value = '';
                }

                // Ayarı güncelle
                Setting::setValue($key, $value);
            }

            // Cache'i temizle
            Cache::forget('settings');

            return redirect()->route('admin.settings')
                ->with('success', 'Ayarlar başarıyla güncellendi! Sayfayı yenilemeyi unutmayın.');

        } catch (\Exception $e) {
            return redirect()->route('admin.settings')
                ->with('error', 'Ayarlar güncellenirken hata: ' . $e->getMessage());
        }
    }
}
