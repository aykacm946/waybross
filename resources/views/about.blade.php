@extends('layouts.app')

@section('title', 'Hakkımızda')

@section('content')
    <!-- Page Header -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-5 fw-bold">Hakkımızda</h1>
                    <p class="lead text-muted">Kalite ve müşteri memnuniyeti odaklı çalışma prensibiyle hizmet veriyoruz.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Biz Kimiz?</h2>
                    <p class="text-muted mb-4">
                        2020 yılından bu yana, modern web teknolojileri kullanarak işletmelerin dijital dönüşümüne
                        katkı sağlıyoruz. Deneyimli ekibimizle her projeye özel çözümler üretiyoruz.
                    </p>
                    <p class="text-muted mb-4">
                        Müşteri memnuniyetini ön planda tutarak, uzun vadeli iş birlikleri kurmayı ve
                        sürdürülebilir başarı hikayeleri yazmayı hedefliyoruz.
                    </p>
                    <div class="d-flex gap-3">
                        <div class="text-center">
                            <h4 class="fw-bold text-primary">50+</h4>
                            <small class="text-muted">Proje</small>
                        </div>
                        <div class="text-center">
                            <h4 class="fw-bold text-primary">30+</h4>
                            <small class="text-muted">Müşteri</small>
                        </div>
                        <div class="text-center">
                            <h4 class="fw-bold text-primary">5+</h4>
                            <small class="text-muted">Yıl</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/500x300" alt="About Us" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-center fw-bold mb-5">Yolculuğumuz</h2>
                    <div class="timeline">
                        @foreach($milestones as $milestone)
                            <div class="timeline-item mb-4">
                                <div class="timeline-marker bg-primary rounded-circle"></div>
                                <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                    <h5 class="fw-bold text-primary">{{ $milestone['year'] }}</h5>
                                    <h6 class="fw-bold mb-2">{{ $milestone['event'] }}</h6>
                                    <p class="text-muted mb-0">{{ $milestone['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold">Ekibimiz</h2>
                    <p class="text-muted">Alanında uzman ekibimizle tanışın</p>
                </div>
            </div>
            <div class="row">
                @foreach($teamMembers as $member)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}"
                                     class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                <h5 class="card-title fw-bold">{{ $member['name'] }}</h5>
                                <p class="card-text text-muted">{{ $member['position'] }}</p>
                                <div class="social-links">
                                    @if(isset($member['social']['twitter']))
                                        <a href="{{ $member['social']['twitter'] }}" class="text-dark mx-2">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if(isset($member['social']['linkedin']))
                                        <a href="{{ $member['social']['linkedin'] }}" class="text-dark mx-2">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    @endif
                                    @if(isset($member['social']['github']))
                                        <a href="{{ $member['social']['github'] }}" class="text-dark mx-2">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    @endif
                                    @if(isset($member['social']['dribbble']))
                                        <a href="{{ $member['social']['dribbble'] }}" class="text-dark mx-2">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        .timeline-item {
            position: relative;
        }
        .timeline-marker {
            position: absolute;
            left: -45px;
            top: 20px;
            width: 20px;
            height: 20px;
            border: 3px solid white;
        }
        .timeline-content {
            margin-left: 20px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }
    </style>
@endpush
