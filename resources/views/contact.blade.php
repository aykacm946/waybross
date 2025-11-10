@extends('layouts.app')

@section('title', 'İletişim')

@section('content')
    <!-- Page Header -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-5 fw-bold text-primary">İletişim</h1>
                    <p class="lead text-muted">Projeleriniz hakkında bizimle iletişime geçin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                <div>
                                    <strong>Başarılı!</strong> {{ session('success') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h4 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Bize Ulaşın</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Ad Soyad <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Adınız ve soyadınız" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" value="{{ old('email') }}"
                                               placeholder="email@example.com" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ old('phone') }}"
                                           placeholder="+90 (5__) ___ __ __">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Konu <span class="text-danger">*</span></label>
                                    <select class="form-select @error('subject') is-invalid @enderror"
                                            id="subject" name="subject" required>
                                        <option value="">Konu seçiniz</option>
                                        <option value="Web Sitesi" {{ old('subject') == 'Web Sitesi' ? 'selected' : '' }}>Web Sitesi</option>
                                        <option value="Mobil Uygulama" {{ old('subject') == 'Mobil Uygulama' ? 'selected' : '' }}>Mobil Uygulama</option>
                                        <option value="E-Ticaret" {{ old('subject') == 'E-Ticaret' ? 'selected' : '' }}>E-Ticaret</option>
                                        <option value="SEO Hizmeti" {{ old('subject') == 'SEO Hizmeti' ? 'selected' : '' }}>SEO Hizmeti</option>
                                        <option value="Danışmanlık" {{ old('subject') == 'Danışmanlık' ? 'selected' : '' }}>Danışmanlık</option>
                                        <option value="Diğer" {{ old('subject') == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                                    </select>
                                    @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="form-label">Mesajınız <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                              id="message" name="message" rows="6"
                                              placeholder="Projeniz hakkında detaylı bilgi veriniz..."
                                              required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">En az 10 karakter giriniz.</div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Mesajı Gönder
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="contact-info p-4">
                        <div class="contact-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-map-marker-alt text-white fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Adres</h5>
                        <p class="text-muted mb-0">{{ \App\Models\Setting::getValue('contact_address', '1234 Sokak No:1 İstanbul, Türkiye') }}</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="contact-info p-4">
                        <div class="contact-icon bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-phone text-white fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Telefon</h5>
                        <p class="text-muted mb-2">{{ \App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67') }}</p>
                        <p class="text-muted mb-0">{{ \App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67') }}</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="contact-info p-4">
                        <div class="contact-icon bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-envelope text-white fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">E-posta</h5>
                        <p class="text-muted mb-2">{{ \App\Models\Setting::getValue('contact_email', 'info@tanitimsitesi.com') }}</p>
                        <p class="text-muted mb-0">destek@waybross.com</p>
                    </div>
                </div>
            </div>

            <!-- Working Hours -->
            <!-- Working Hours -->
            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-dark text-white text-center py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-clock me-2"></i>
                                Çalışma Saatleri
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-6 mb-3">
                                    <div class="working-hours-item">
                                        <i class="fas fa-calendar-day text-primary fa-2x mb-2"></i>
                                        <p class="mb-1">
                                            <strong>
                                                {{ \App\Models\Setting::getValue('contact_working_days', 'Pazartesi - Cuma') }}
                                            </strong>
                                        </p>
                                        <p class="text-muted mb-0">
                                            {{ \App\Models\Setting::getValue('contact_working_hours_weekdays', '09:00 - 18:00') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="working-hours-item">
                                        <i class="fas fa-calendar-alt text-success fa-2x mb-2"></i>
                                        <p class="mb-1"><strong>Cumartesi</strong></p>
                                        <p class="text-muted mb-0">
                                            {{ \App\Models\Setting::getValue('contact_working_hours_saturday', '10:00 - 16:00') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3 pt-3 border-top">
                                <i class="fas fa-door-closed text-muted me-2"></i>
                                <small class="text-muted">
                                    <strong>{{ \App\Models\Setting::getValue('contact_closed_days', 'Pazar') }}</strong> günü kapalıyız
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-map-marked-alt me-2"></i>Haritada Konumumuz
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div id="map" style="height: 500px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <style>
            #map {
                border-radius: 0 0 0.375rem 0.375rem;
            }
            .leaflet-popup-content-wrapper {
                border-radius: 8px;
            }
            .leaflet-popup-content {
                margin: 8px 12px;
            }
            .custom-marker-icon {
                background: #667eea;
                border: 3px solid white;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            }
        </style>
    @endpush

    @push('scripts')
        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Haritayı oluştur
                const map = L.map('map').setView([
                    {{ $mapLocation['lat'] }},
                    {{ $mapLocation['lng'] }}
                ], {{ $mapLocation['zoom'] }});

                // OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 18,
                }).addTo(map);

                // Özel marker ikonu
                const customIcon = L.divIcon({
                    className: 'custom-marker-icon',
                    iconSize: [20, 20],
                    iconAnchor: [10, 10],
                    popupAnchor: [0, -10]
                });

                // Marker ekle
                const marker = L.marker([
                    {{ $mapLocation['lat'] }},
                    {{ $mapLocation['lng'] }}
                ], {
                    icon: customIcon,
                    title: "{{ $mapLocation['marker_title'] }}"
                }).addTo(map);

                // Popup ekle
                marker.bindPopup(`{!! $mapLocation['popup_content'] !!}`);

                // Marker'a tıklanınca popup'ı aç
                marker.on('click', function() {
                    this.openPopup();
                });

                // Sayfa yüklendiğinde popup'ı otomatik aç
                setTimeout(() => {
                    marker.openPopup();
                }, 1000);

                // Harita kontrolleri
                map.addControl(L.control.zoom({ position: 'topright' }));

                console.log('OpenStreetMap haritası başarıyla yüklendi!');
            });

            // Harita yükleme hatası durumunda fallback
            window.addEventListener('load', function() {
                if (typeof L === 'undefined') {
                    document.getElementById('map').innerHTML = `
            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-muted fa-3x mb-3"></i>
                    <h5 class="text-muted">Harita yüklenemedi</h5>
                    <p class="text-muted">Lütfen internet bağlantınızı kontrol edin.</p>
                    <a href="https://www.openstreetmap.org/?mlat={{ $mapLocation['lat'] }}&mlon={{ $mapLocation['lng'] }}#map=15/{{ $mapLocation['lat'] }}/{{ $mapLocation['lng'] }}"
                       target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-external-link-alt me-1"></i>OpenStreetMap'te Görüntüle
                    </a>
                </div>
            </div>
        `;
                }
            });
        </script>
    @endpush
@endsection

@push('styles')
    <style>
        .contact-info {
            transition: transform 0.3s ease;
        }
        .contact-info:hover {
            transform: translateY(-5px);
        }
        .contact-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .map-placeholder {
            border-radius: 0 0 0.375rem 0.375rem;
        }
        .form-select:focus, .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Telefon numarası formatlama
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                value = '+90 (' + value.substring(0, 3) + ') ' + value.substring(3, 6) + ' ' + value.substring(6, 8) + ' ' + value.substring(8, 10);
            }
            e.target.value = value;
        });

        // Form gönderildiğinde loading state
        document.querySelector('form').addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Gönderiliyor...';
            btn.disabled = true;
        });

    </script>
@endpush
