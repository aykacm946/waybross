@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            <span class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-calendar me-1"></i>{{ now()->format('d.m.Y') }}
            </span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Toplam Mesaj
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_contacts'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-primary opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Okunmamış Mesaj
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['unread_contacts'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-warning opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Son 7 Gün
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['recent_contacts'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-success opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Toplam Kullanıcı
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-clock me-2"></i>Son Mesajlar
                    </h5>
                    <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-list me-1"></i>Tümünü Gör
                    </a>
                </div>
                <div class="card-body">
                    @if($recentMessages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>E-posta</th>
                                    <th>Konu</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recentMessages as $message)
                                    <tr class="{{ $message->is_read ? '' : 'table-warning' }}">
                                        <td>
                                            <strong>{{ $message->name }}</strong>
                                            @if(!$message->is_read)
                                                <span class="badge bg-warning ms-1">Yeni</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($message->subject, 30) }}</td>
                                        <td>
                                            <small>{{ $message->created_at->format('d.m.Y') }}</small>
                                            <br>
                                            <small class="text-muted">{{ $message->created_at->format('H:i') }}</small>
                                        </td>
                                        <td>
                                            @if($message->is_read)
                                                <span class="badge bg-success">Okundu</span>
                                            @else
                                                <span class="badge bg-warning">Yeni</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contacts.show', $message->id) }}"
                                               class="btn btn-sm btn-primary" title="Görüntüle">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Henüz mesaj bulunmuyor</h4>
                            <p class="text-muted">İletişim formundan gelen mesajlar burada listelenecek.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
