@extends('layouts.app')

@section('title', 'Hizmetler')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-5 fw-bold">Hizmetlerimiz</h1>
                    <p class="lead">İşinizi büyütmek için ihtiyacınız olan tüm dijital çözümler</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm service-card">
                            <div class="card-body p-4">
                                <div class="service-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                     style="width: 60px; height: 60px;">
                                    <i class="{{ $service['icon'] }} text-white"></i>
                                </div>
                                <h5 class="card-title fw-bold">{{ $service['title'] }}</h5>
                                <p class="card-text text-muted mb-3">{{ $service['description'] }}</p>

                                <ul class="list-unstyled mb-3">
                                    @foreach($service['features'] as $feature)
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            <small class="text-muted">{{ $feature }}</small>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="service-meta d-flex justify-content-between align-items-center mt-auto">
                                    <div>
                                        <span class="fw-bold text-primary">{{ $service['price'] }}</span>
                                        <small class="text-muted d-block">Başlangıç</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="fw-bold text-dark">{{ $service['duration'] }}</span>
                                        <small class="text-muted d-block">Süre</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ route('contact') }}?service={{ urlencode($service['title']) }}"
                                   class="btn btn-outline-primary btn-sm w-100">
                                    <i class="fas fa-info-circle me-1"></i>Detaylı Bilgi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold">Çalışma Sürecimiz</h2>
                    <p class="text-muted">Projelerimizi nasıl yönetiyoruz?</p>
                </div>
            </div>
            <div class="row">
                @foreach($process as $step)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="process-card text-center p-4 h-100">
                            <div class="process-step bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                 style="width: 60px; height: 60px;">
                                <span class="fw-bold">{{ $step['step'] }}</span>
                            </div>
                            <div class="process-icon text-primary mb-3">
                                <i class="{{ $step['icon'] }} fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $step['title'] }}</h5>
                            <p class="text-muted mb-0">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="fw-bold mb-4">Neden Bizimle Çalışmalısınız?</h2>

                    <div class="feature-item d-flex mb-4">
                        <div class="feature-icon bg-primary rounded-circle d-flex align-items-center justify-content-center me-4"
                             style="width: 50px; height: 50px;">
                            <i class="fas fa-award text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Kalite Garantisi</h5>
                            <p class="text-muted mb-0">Tüm projelerimizde en yüksek kalite standartlarını uyguluyoruz.</p>
                        </div>
                    </div>

                    <div class="feature-item d-flex mb-4">
                        <div class="feature-icon bg-success rounded-circle d-flex align-items-center justify-content-center me-4"
                             style="width: 50px; height: 50px;">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Zamanında Teslim</h5>
                            <p class="text-muted mb-0">Projeleri belirlenen sürelerde teslim etme konusunda %98 başarı oranı.</p>
                        </div>
                    </div>

                    <div class="feature-item d-flex mb-4">
                        <div class="feature-icon bg-warning rounded-circle d-flex align-items-center justify-content-center me-4"
                             style="width: 50px; height: 50px;">
                            <i class="fas fa-headset text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">7/24 Destek</h5>
                            <p class="text-muted mb-0">Proje sonrası teknik destek ve bakım hizmeti sunuyoruz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="stats-card bg-primary text-white rounded p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-chart-line display-1"></i>
                        </div>

                        <div class="row text-center">
                            <div class="col-6 mb-4">
                                <h3 class="fw-bold display-6">50+</h3>
                                <p class="mb-0">Tamamlanan Proje</p>
                            </div>
                            <div class="col-6 mb-4">
                                <h3 class="fw-bold display-6">30+</h3>
                                <p class="mb-0">Mutlu Müşteri</p>
                            </div>
                            <div class="col-6">
                                <h3 class="fw-bold display-6">98%</h3>
                                <p class="mb-0">Memnuniyet Oranı</p>
                            </div>
                            <div class="col-6">
                                <h3 class="fw-bold display-6">5+</h3>
                                <p class="mb-0">Yıl Deneyim</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-center fw-bold mb-5">Sıkça Sorulan Sorular</h2>

                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Proje süreçleri ne kadar sürüyor?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Proje süreleri projenin karmaşıklığına göre değişiklik göstermektedir. Basit web siteleri 2-4 hafta,
                                    karmaşık e-ticaret sistemleri 6-10 hafta arasında tamamlanmaktadır.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Ödeme planınız nasıl işliyor?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Proje başlangıcında %50, teslimatta %50 olmak üzere iki taksit şeklinde ödeme alıyoruz.
                                    Büyük projelerde daha esnek ödeme planları sunuyoruz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Teslim sonrası destek sunuyor musunuz?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Evet, tüm projelerimizde 6 aylık ücretsiz teknik destek sunuyoruz.
                                    Sonrasında isteğe bağlı olarak yıllık bakım paketlerimiz mevcuttur.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Projeniz için doğru çözümü bulalım</h3>
                    <p class="mb-0">Ücretsiz danışmanlık için hemen iletişime geçin</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-paper-plane me-2"></i>Teklif Alın
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .service-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        }
        .service-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .process-card {
            background: white;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .process-card:hover {
            transform: translateY(-5px);
        }
        .process-step {
            font-size: 1.2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .feature-item {
            transition: transform 0.3s ease;
        }
        .feature-item:hover {
            transform: translateX(10px);
        }
        .accordion-button:not(.collapsed) {
            background-color: #667eea;
            color: white;
        }
    </style>
@endpush
