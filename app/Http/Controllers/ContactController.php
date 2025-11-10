<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting; // Doğru namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        // Dinamik konum bilgilerini settings'den al
        $mapLocation = [
            'lat' => Setting::getValue('location_latitude', 41.0082),
            'lng' => Setting::getValue('location_longitude', 28.9784),
            'zoom' => Setting::getValue('location_zoom', 15),
            'address' => Setting::getValue('location_address', '1234 Teknoloji Sokak No:1 İstanbul, Türkiye'),
            'marker_title' => 'Tanıtım Sitesi Ofisi',
            'popup_content' => '
                <div style="padding: 10px; max-width: 250px;">
                    <h6 style="margin: 0 0 5px 0; color: #667eea;">
                        <i class="fas fa-map-marker-alt"></i> Tanıtım Sitesi
                    </h6>
                    <p style="margin: 0; font-size: 14px; color: #666;">
                        ' . Setting::getValue('location_address', '1234 Teknoloji Sokak No:1 İstanbul, Türkiye') . '
                    </p>
                    <div style="margin-top: 8px;">
                        <small>
                            <i class="fas fa-phone"></i> ' . Setting::getValue('contact_phone', '+90 (212) 123 45 67') . '<br>
                            <i class="fas fa-envelope"></i> ' . Setting::getValue('contact_email', 'info@tanitimsitesi.com') . '
                        </small>
                    </div>
                    <div style="margin-top: 8px;">
                        <a href="https://www.openstreetmap.org/?mlat=' . Setting::getValue('location_latitude', 41.0082) . '&mlon=' . Setting::getValue('location_longitude', 28.9784) . '#map=15/' . Setting::getValue('location_latitude', 41.0082) . '/' . Setting::getValue('location_longitude', 28.9784) . '"
                           target="_blank"
                           style="color: #667eea; text-decoration: none; font-size: 12px;">
                            <i class="fas fa-directions"></i> Yol Tarifi Al
                        </a>
                    </div>
                </div>
            '
        ];

        return view('contact', compact('mapLocation'));
    }

    public function store(Request $request)
    {
        // Validation kuralları
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ], [
            'name.required' => 'Ad soyad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'subject.required' => 'Konu alanı zorunludur.',
            'message.required' => 'Mesaj alanı zorunludur.',
            'message.min' => 'Mesajınız en az 10 karakter olmalıdır.'
        ]);

        // Validation hatalarını kontrol et
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Veriyi database'e kaydet
        Contact::create($validator->validated());

        // Başarılı mesajı ile yönlendir
        return redirect()->back()
            ->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede sizinle iletişime geçeceğiz.');
    }
}
