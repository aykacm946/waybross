@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Profesyonel Web Çözümleri</h1>
                    <p class="lead">Modern, hızlı ve güvenilir web siteleri ile dijital varlığınızı güçlendirin.</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg mt-3">Hemen Başlayın</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/500x300" alt="Hero Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold">Neden Bizi Seçmelisiniz?</h2>
                    <p class="text-muted">Kaliteli hizmet ve müşteri memnuniyeti odaklı çalışıyoruz</p>
                </div>
            </div>
            <div class="row">
                @foreach($features as $feature)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                     style="width: 80px; height: 80px;">
                                    <i class="{{ $feature['icon'] }} text-white fa-2x"></i>
                                </div>
                                <h5 class="card-title fw-bold">{{ $feature['title'] }}</h5>
                                <p class="card-text text-muted">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <h3 class="fw-bold text-primary">50+</h3>
                    <p class="text-muted">Tamamlanan Proje</p>
                </div>
                <div class="col-md-3">
                    <h3 class="fw-bold text-primary">30+</h3>
                    <p class="text-muted">Mutlu Müşteri</p>
                </div>
                <div class="col-md-3">
                    <h3 class="fw-bold text-primary">5+</h3>
                    <p class="text-muted">Yıl Deneyim</p>
                </div>
                <div class="col-md-3">
                    <h3 class="fw-bold text-primary">7/24</h3>
                    <p class="text-muted">Destek</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .feature-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
@endpush
