@extends('admin.layouts.app')

@section('title', 'Site Ayarları')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">
            <i class="fas fa-cog me-2"></i>Site Ayarları
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Geri
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
            @foreach($groups as $group)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                            id="{{ $group }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#{{ $group }}"
                            type="button"
                            role="tab">
                        <i class="fas fa-{{ $group == 'general' ? 'cog' : ($group == 'contact' ? 'phone' : ($group == 'social' ? 'share-alt' : ($group == 'seo' ? 'search' : 'envelope'))) }} me-1"></i>
                        {{ ucfirst($group) }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Location tab content -->

        <div class="tab-content" id="settingsTabsContent">
            @foreach($settings as $group => $groupSettings)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                     id="{{ $group }}"
                     role="tabpanel"
                     aria-labelledby="{{ $group }}-tab">

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-primary">
                                <i class="fas fa-{{ $group == 'general' ? 'cog' : ($group == 'contact' ? 'phone' : ($group == 'social' ? 'share-alt' : ($group == 'seo' ? 'search' : 'envelope'))) }} me-2"></i>
                                {{ ucfirst($group) }} Ayarları
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach($groupSettings as $setting)
                                <div class="row mb-4 align-items-start">
                                    <div class="col-lg-4">
                                        <label for="setting-{{ $setting->key }}" class="form-label fw-bold">
                                            {{ $setting->description }}
                                        </label>
                                        @if($setting->description)
                                            <div class="form-text">{{ $setting->key }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-8">
                                        @if($setting->type === 'text')
                                            <textarea class="form-control"
                                                      id="setting-{{ $setting->key }}"
                                                      name="{{ $setting->key }}"
                                                      rows="4"
                                                      placeholder="{{ $setting->description }}">{{ old($setting->key, $setting->value) }}</textarea>

                                        @elseif($setting->type === 'boolean')
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       type="checkbox"
                                                       id="setting-{{ $setting->key }}"
                                                       name="{{ $setting->key }}"
                                                       value="1"
                                                    {{ old($setting->key, $setting->value) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="setting-{{ $setting->key }}">
                                                    {{ $setting->value ? 'Aktif' : 'Pasif' }}
                                                </label>
                                            </div>

                                        @else
                                            <input type="text"
                                                   class="form-control"
                                                   id="setting-{{ $setting->key }}"
                                                   name="{{ $setting->key }}"
                                                   value="{{ old($setting->key, $setting->value) }}"
                                                   placeholder="{{ $setting->description }}">
                                        @endif

                                        @error($setting->key)
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <hr class="my-4">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 p-4 bg-light rounded border">
            <div class="row">
                <div class="col-md-8">
                    <h6 class="mb-2">Ayarları Kaydet</h6>
                    <p class="text-muted small mb-0">
                        Değişiklikleri kaydettikten sonra sayfayı yenilemeniz gerekebilir.
                    </p>
                </div>
                <div class="col-md-4 text-end">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>Ayarları Kaydet
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">İptal</a>
                </div>
            </div>
        </div>
    </form>

    <!-- Ayarlar Önizleme -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-eye me-2"></i>Ayarlar Önizleme
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Genel Bilgiler</h6>
                            <ul class="list-unstyled">
                                <li><strong>Site Başlığı:</strong> {{ \App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi') }}</li>
                                <li><strong>Telefon:</strong> {{ \App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67') }}</li>
                                <li><strong>E-posta:</strong> {{ \App\Models\Setting::getValue('contact_email', 'info@tanitimsitesi.com') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Sosyal Medya</h6>
                            <div class="social-preview">
                                @php
                                    $socials = [
                                        'facebook' => \App\Models\Setting::getValue('social_facebook'),
                                        'twitter' => \App\Models\Setting::getValue('social_twitter'),
                                        'instagram' => \App\Models\Setting::getValue('social_instagram'),
                                        'linkedin' => \App\Models\Setting::getValue('social_linkedin')
                                    ];
                                @endphp
                                @foreach($socials as $platform => $url)
                                    @if($url)
                                        <a href="{{ $url }}" class="btn btn-outline-primary btn-sm me-2 mb-2" target="_blank">
                                            <i class="fab fa-{{ $platform }} me-1"></i>{{ ucfirst($platform) }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .nav-tabs .nav-link {
            color: #6c757d;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            color: #667eea;
            border-bottom: 2px solid #667eea;
        }
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        .social-preview a {
            text-decoration: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Boolean ayarlar için real-time update
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const label = this.parentElement.querySelector('.form-check-label');
                    label.textContent = this.checked ? 'Aktif' : 'Pasif';
                });
            });

            // Tab değişikliğinde URL hash güncelleme
            const settingsTabs = document.getElementById('settingsTabs');
            if (settingsTabs) {
                settingsTabs.addEventListener('click', function(e) {
                    if (e.target.classList.contains('nav-link')) {
                        const target = e.target.getAttribute('data-bs-target');
                        if (target) {
                            window.location.hash = target;
                        }
                    }
                });
            }

            // Sayfa yüklendiğinde hash kontrolü
            if (window.location.hash) {
                const hash = window.location.hash.replace('#', '');
                const tab = document.querySelector(`[data-bs-target="#${hash}"]`);
                if (tab) {
                    new bootstrap.Tab(tab).show();
                }
            }
        });
    </script>
@endpush
