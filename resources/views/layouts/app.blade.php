<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title') - {{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}
        @else
            {{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}
        @endif
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @stack('styles')
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services') }}">Hizmetler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer --><!-- Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5>{{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}</h5>
                <p>{{ \App\Models\Setting::getValue('site_description', 'Profesyonel web çözümleri sunuyoruz.') }}</p>

                <!-- Social Media Links -->
                <div class="social-links">
                    @php
                        $facebook = \App\Models\Setting::getValue('social_facebook');
                        $twitter = \App\Models\Setting::getValue('social_twitter');
                        $instagram = \App\Models\Setting::getValue('social_instagram');
                        $linkedin = \App\Models\Setting::getValue('social_linkedin');
                        $github = \App\Models\Setting::getValue('social_github');
                    @endphp

                    @if($facebook)
                        <a href="{{ $facebook }}" class="text-white me-3" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                    @if($twitter)
                        <a href="{{ $twitter }}" class="text-white me-3" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif

                    @if($instagram)
                        <a href="{{ $instagram }}" class="text-white me-3" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    @if($linkedin)
                        <a href="{{ $linkedin }}" class="text-white me-3" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif

                    @if($github)
                        <a href="{{ $github }}" class="text-white me-3" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 text-end">
                <p>
                    <i class="fas fa-phone me-2"></i>
                    {{ \App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67') }}
                </p>
                <p>
                    <i class="fas fa-envelope me-2"></i>
                    {{ \App\Models\Setting::getValue('contact_email', 'info@tanitimsitesi.com') }}
                </p>
                <p>
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ \App\Models\Setting::getValue('contact_address', '1234 Sokak No:1 İstanbul, Türkiye') }}
                </p>
                <p>&copy; {{ date('Y') }} {{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
