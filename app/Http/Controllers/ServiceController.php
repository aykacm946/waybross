<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = [
            [
                'icon' => 'fas fa-code',
                'title' => 'Web Geliştirme',
                'description' => 'Modern web teknolojileri ile responsive ve hızlı web siteleri geliştiriyoruz.',
                'features' => ['Laravel Development', 'Vue.js Integration', 'REST API', 'Database Design'],
                'price' => '₺5.000+',
                'duration' => '2-4 Hafta'
            ],
            [
                'icon' => 'fas fa-mobile-alt',
                'title' => 'Mobil Uygulama',
                'description' => 'iOS ve Android platformları için native ve hybrid mobil uygulamalar.',
                'features' => ['React Native', 'Flutter', 'iOS Development', 'Android Development'],
                'price' => '₺8.000+',
                'duration' => '4-8 Hafta'
            ],
            [
                'icon' => 'fas fa-shopping-cart',
                'title' => 'E-Ticaret',
                'description' => 'Güvenli ve ölçeklenebilir e-ticaret çözümleri sunuyoruz.',
                'features' => ['Payment Integration', 'Inventory Management', 'SEO Optimization', 'Security'],
                'price' => '₺10.000+',
                'duration' => '6-10 Hafta'
            ],
            [
                'icon' => 'fas fa-cloud',
                'title' => 'Bulut Çözümleri',
                'description' => 'AWS ve Azure üzerinde bulut mimarisi ve deployment hizmetleri.',
                'features' => ['AWS Services', 'Azure Cloud', 'Server Management', 'CI/CD Pipeline'],
                'price' => '₺3.000+',
                'duration' => '1-2 Hafta'
            ],
            [
                'icon' => 'fas fa-search',
                'title' => 'SEO Optimizasyon',
                'description' => 'Arama motorlarında üst sıralarda çıkmanız için profesyonel SEO hizmeti.',
                'features' => ['Keyword Research', 'Technical SEO', 'Content Strategy', 'Analytics'],
                'price' => '₺2.500+',
                'duration' => 'Sürekli'
            ],
            [
                'icon' => 'fas fa-palette',
                'title' => 'UI/UX Tasarım',
                'description' => 'Kullanıcı odaklı, modern ve estetik arayüz tasarımları.',
                'features' => ['User Research', 'Wireframing', 'Prototyping', 'Design Systems'],
                'price' => '₺4.000+',
                'duration' => '2-3 Hafta'
            ]
        ];

        $process = [
            [
                'step' => '01',
                'title' => 'Keşif ve Analiz',
                'description' => 'İhtiyaçlarınızı analiz ediyor ve proje gereksinimlerini belirliyoruz.',
                'icon' => 'fas fa-search'
            ],
            [
                'step' => '02',
                'title' => 'Tasarım ve Planlama',
                'description' => 'Kullanıcı deneyimi odaklı tasarımlar ve proje planı oluşturuyoruz.',
                'icon' => 'fas fa-pencil-ruler'
            ],
            [
                'step' => '03',
                'title' => 'Geliştirme',
                'description' => 'Modern teknolojilerle stabil ve ölçeklenebilir çözümler geliştiriyoruz.',
                'icon' => 'fas fa-code'
            ],
            [
                'step' => '04',
                'title' => 'Test ve Kalite',
                'description' => 'Kapsamlı testlerle ürün kalitesini garanti altına alıyoruz.',
                'icon' => 'fas fa-vial'
            ],
            [
                'step' => '05',
                'title' => 'Yayınlama',
                'description' => 'Güvenli deployment ile projeyi canlı ortama taşıyoruz.',
                'icon' => 'fas fa-rocket'
            ],
            [
                'step' => '06',
                'title' => 'Destek ve Bakım',
                'description' => 'Sürekli destek ve güncellemelerle yanınızdayız.',
                'icon' => 'fas fa-headset'
            ]
        ];

        return view('services', compact('services', 'process'));
    }
}
