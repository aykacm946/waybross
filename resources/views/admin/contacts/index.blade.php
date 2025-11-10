@extends('admin.layouts.app')

@section('title', 'İletişim Mesajları')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">
            <i class="fas fa-envelope me-2"></i>İletişim Mesajları
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Geri
                </a>
            </div>
        </div>
    </div>

    <!-- Filtreleme -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title mb-3">Filtrele:</h6>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.contacts') }}"
                               class="btn btn-{{ !request('filter') ? '' : 'outline-' }}primary w-100">
                                <i class="fas fa-list me-1"></i>Tümü
                                <span class="badge bg-secondary ms-1">{{ \App\Models\Contact::count() }}</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.contacts', ['filter' => 'unread']) }}"
                               class="btn btn-{{ request('filter') == 'unread' ? '' : 'outline-' }}warning w-100">
                                <i class="fas fa-envelope me-1"></i>Okunmamış
                                <span class="badge bg-danger ms-1">{{ \App\Models\Contact::where('is_read', false)->count() }}</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.contacts', ['filter' => 'read']) }}"
                               class="btn btn-{{ request('filter') == 'read' ? '' : 'outline-' }}success w-100">
                                <i class="fas fa-envelope-open me-1"></i>Okunmuş
                                <span class="badge bg-success ms-1">{{ \App\Models\Contact::where('is_read', true)->count() }}</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.contacts', ['filter' => 'today']) }}"
                               class="btn btn-{{ request('filter') == 'today' ? '' : 'outline-' }}info w-100">
                                <i class="fas fa-calendar-day me-1"></i>Bugün
                                <span class="badge bg-info ms-1">{{ \App\Models\Contact::whereDate('created_at', today())->count() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Arama ve İstatistikler -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.contacts') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   placeholder="İsim, e-posta veya konu ara..."
                                   value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="{{ route('admin.contacts') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-primary mb-1">{{ $contacts->total() }}</h5>
                            <small class="text-muted">Toplam</small>
                        </div>
                        <div class="col-6">
                            <h5 class="text-warning mb-1">{{ $contacts->where('is_read', false)->count() }}</h5>
                            <small class="text-muted">Yeni</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mesaj Listesi -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Gönderen</th>
                            <th>İletişim</th>
                            <th>Konu & Mesaj</th>
                            <th width="120">Tarih</th>
                            <th width="100">Durum</th>
                            <th width="120" class="text-center">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr class="{{ $contact->is_read ? '' : 'bg-light' }}">
                                <td>
                                    <strong>{{ $contact->id }}</strong>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                             style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong class="d-block">{{ $contact->name }}</strong>
                                            <small class="text-muted">
                                                {{ $contact->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1 text-muted"></i>
                                            {{ $contact->email }}
                                        </a>
                                    </div>
                                    @if($contact->phone)
                                        <div class="mt-1">
                                            <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                                <i class="fas fa-phone me-1 text-muted"></i>
                                                {{ $contact->phone }}
                                            </a>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-1">{{ $contact->subject }}</div>
                                    <div class="text-muted small">
                                        {{ \Illuminate\Support\Str::limit($contact->message, 80) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="text-dark">{{ $contact->created_at->format('d.m.Y') }}</div>
                                        <div class="text-muted">{{ $contact->created_at->format('H:i') }}</div>
                                    </div>
                                </td>
                                <td>
                                    @if($contact->is_read)
                                        <span class="badge bg-success">
                                <i class="fas fa-check me-1"></i>Okundu
                            </span>
                                    @else
                                        <span class="badge bg-warning">
                                <i class="fas fa-clock me-1"></i>Yeni
                            </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                           class="btn btn-primary"
                                           title="Mesajı Görüntüle"
                                           data-bs-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if(!$contact->is_read)
                                            <form action="{{ route('admin.contacts.mark-read', $contact->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning"
                                                        title="Okundu İşaretle"
                                                        data-bs-toggle="tooltip">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.contacts.delete', $contact->id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bu mesajı silmek istediğinizden emin misiniz?')"
                                                    title="Mesajı Sil"
                                                    data-bs-toggle="tooltip">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Sayfalama -->
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            Toplam {{ $contacts->total() }} mesajdan {{ $contacts->firstItem() }} - {{ $contacts->lastItem() }} arası gösteriliyor
                        </div>
                        <div>
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-inbox fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted">Henüz mesaj bulunmuyor</h4>
                        <p class="text-muted mb-4">İletişim formundan gelen mesajlar burada listelenecek.</p>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Dashboard'a Dön
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .avatar {
            font-weight: bold;
            font-size: 14px;
        }
        .table tbody tr:hover {
            background-color: rgba(0,0,0,0.02) !important;
        }
        .empty-state {
            max-width: 400px;
            margin: 0 auto;
        }
        .btn-group-sm > .btn {
            padding: 0.25rem 0.5rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Tooltip'leri aktif et
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Okundu işaretleme için AJAX
            const markReadForms = document.querySelectorAll('form[action*="mark-read"]');

            markReadForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const button = this.querySelector('button');
                    const originalHtml = button.innerHTML;

                    // Loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    button.disabled = true;

                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Sayfayı yenile
                                location.reload();
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            button.innerHTML = originalHtml;
                            button.disabled = false;
                            alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                        });
                });
            });
        });
    </script>
@endpush
