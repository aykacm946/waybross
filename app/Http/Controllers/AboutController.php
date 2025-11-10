<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = [
            [
                'name' => 'Ahmet Yılmaz',
                'position' => 'Kurucu & Geliştirici',
                'image' => 'https://via.placeholder.com/250x250',
                'social' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'github' => '#'
                ]
            ],
            [
                'name' => 'Mehmet Demir',
                'position' => 'UI/UX Tasarımcı',
                'image' => 'https://via.placeholder.com/250x250',
                'social' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'dribbble' => '#'
                ]
            ],
            [
                'name' => 'Ayşe Kaya',
                'position' => 'Proje Yöneticisi',
                'image' => 'https://via.placeholder.com/250x250',
                'social' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'instagram' => '#'
                ]
            ]
        ];

        $milestones = [
            ['year' => '2020', 'event' => 'Şirket Kuruluş', 'description' => 'Teknoloji odaklı çözümler sunmak için yola çıktık.'],
            ['year' => '2021', 'event' => '50+ Proje', 'description' => 'Başarılı projelerle sektörde yerimizi sağlamlaştırdık.'],
            ['year' => '2022', 'event' => 'Ekip Genişlemesi', 'description' => 'Uzman kadromuzu genişlettik ve hizmet yelpazemizi artırdık.'],
            ['year' => '2023', 'event' => 'Uluslararası Projeler', 'description' => 'Yurt dışı projelerle global çapta hizmet vermeye başladık.']
        ];

        return view('about', compact('teamMembers', 'milestones'));
    }
}
