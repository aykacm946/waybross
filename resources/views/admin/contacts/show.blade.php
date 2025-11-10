@extends('admin.layouts.app')

@section('title', 'Mesaj Detayı')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">
            <i class="fas fa-eye me-2"></i>Mesaj Detayı
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Listeye Dön
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Mesaj Detayı -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary">
                        {{ $contact->subject }}
                        @if(!$contact->is_read)
                            <span class="badge bg-warning ms-2">
                        <i class="fas fa-clock me-1"></i>Yeni
                    </span>
                        @endif
                    </h5>
                    <div class="text-muted small">
                        {{ $contact->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
                <div class="card-body">
                    <!-- Gönderen Bilgileri -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="fw-bold text-muted small">Gönderen:</label>
                                <div class="d-flex align-items-center mt-1">
                                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                         style="width: 50px; height: 50px;">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $contact->name }}</h6>
                                        <a href="mailto:{{ $contact->email }}" class="text-muted small text-decoration-none">
                                            {{ $contact->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="fw-bold text-muted small">İletişim:</label>
                                <div class="mt-1">
                                    @if($contact->phone)
                                        <div class="mb-1">
                                            <i class="fas fa-phone me-2 text-muted"></i>
                                            <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                                {{ $contact->phone }}
                                            </a>
                                        </div>
                                    @endif
                                    <div>
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            {{ $contact->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mesaj İçeriği -->
                    <div class="message-content">
                        <label class="fw-bold text-muted small mb-2">Mesaj:</label>
                        <div class="border rounded p-4 bg-light">
                            <div class="message-text">
                                {!! nl2br(e($contact->message)) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="btn-group">
                        <a href="mailto:{{ $contact->email }}?subject=RE: {{ $contact->subject }}"
                           class="btn btn-primary" target="_blank">
                            <i class="fas fa-reply me-1"></i>E-posta ile Cevapla
                        </a>

                        @if(!$contact->is_read)
                            <form action="{{ route('admin.contacts.mark-read', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-check me-1"></i>Okundu İşaretle
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bu mesajı silmek istediğinizden emin misiniz?')">
                                <i class="fas fa-trash me-1"></i>Mesajı Sil
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- İstatistikler -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-bar me-2"></i>İstatistikler
                    </h6>
                </div>
                <div class="card-body">
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Toplam Mesaj</span>
                            <span class="fw-bold text-primary">{{ \App\Models\Contact::count() }}</span>
                        </div>
                    </div>
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Okunmamış</span>
                            <span class="fw-bold text-warning">{{ \App\Models\Contact::where('is_read', false)->count() }}</span>
                        </div>
                    </div>
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Bugünkü</span>
                            <span class="fw-bold text-info">{{ \App\Models\Contact::whereDate('created_at', today())->count() }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Bu Ay</span>
                            <span class="fw-bold text-success">
                            {{ \App\Models\Contact::whereMonth('created_at', now()->month)->count() }}
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hızlı İşlemler -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt me-2"></i>Hızlı İşlemler
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.contacts') }}" class="btn btn-outline-primary btn-sm text-start">
                            <i class="fas fa-list me-2"></i>Tüm Mesajlar
                        </a>
                        <a href="{{ route('admin.contacts', ['filter' => 'unread']) }}" class="btn btn-outline-warning btn-sm text-start">
                            <i class="fas fa-envelope me-2"></i>Okunmamışlar
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm text-start">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mesaj Bilgileri -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle me-2"></i>Mesaj Bilgileri
                    </h6>
                </div>
                <div class="card-body">
                    <div class="info-list">
                        <div class="info-item mb-2">
                            <small class="text-muted">Mesaj ID:</small>
                            <div class="fw-bold">#{{ $contact->id }}</div>
                        </div>
                        <div class="info-item mb-2">
                            <small class="text-muted">Gönderim Tarihi:</small>
                            <div class="fw-bold">{{ $contact->created_at->format('d.m.Y H:i') }}</div>
                        </div>
                        <div class="info-item mb-2">
                            <small class="text-muted">Durum:</small>
                            <div>
                                @if($contact->is_read)
                                    <span class="badge bg-success">Okundu</span>
                                @else
                                    <span class="badge bg-warning">Yeni</span>
                                @endif
                            </div>
                        </div>
                        <div class="info-item">
                            <small class="text-muted">IP Adresi:</small>
                            <div class="fw-bold text-muted">Kayıt edilmedi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .avatar {
            font-weight: bold;
            font-size: 18px;
        }
        .message-content {
            line-height: 1.6;
        }
        .info-item {
            padding: 8px 0;
        }
        .stat-item {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .stat-item:last-child {
            border-bottom: none;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
    </style>
@endpush
