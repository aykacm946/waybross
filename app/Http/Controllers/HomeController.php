<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $features = [
            [
                'icon' => 'fas fa-rocket',
                'title' => 'Hızlı Çözümler',
                'description' => 'Modern teknolojilerle hızlı ve etkili çözümler sunuyoruz.'
            ],
            [
                'icon' => 'fas fa-shield-alt',
                'title' => 'Güvenli Yapı',
                'description' => 'Güvenlik odaklı geliştirme ile projelerinizi güvende tutuyoruz.'
            ],
            [
                'icon' => 'fas fa-mobile-alt',
                'title' => 'Mobil Uyumlu',
                'description' => 'Tüm cihazlarda mükemmel çalışan responsive tasarımlar.'
            ]
        ];

        return view('home', compact('features'));
    }
}
