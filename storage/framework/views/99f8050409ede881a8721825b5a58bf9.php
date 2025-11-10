<?php $__env->startSection('title', 'İletişim Mesajları'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">
            <i class="fas fa-envelope me-2"></i>İletişim Mesajları
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary">
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
                            <a href="<?php echo e(route('admin.contacts')); ?>"
                               class="btn btn-<?php echo e(!request('filter') ? '' : 'outline-'); ?>primary w-100">
                                <i class="fas fa-list me-1"></i>Tümü
                                <span class="badge bg-secondary ms-1"><?php echo e(\App\Models\Contact::count()); ?></span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?php echo e(route('admin.contacts', ['filter' => 'unread'])); ?>"
                               class="btn btn-<?php echo e(request('filter') == 'unread' ? '' : 'outline-'); ?>warning w-100">
                                <i class="fas fa-envelope me-1"></i>Okunmamış
                                <span class="badge bg-danger ms-1"><?php echo e(\App\Models\Contact::where('is_read', false)->count()); ?></span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?php echo e(route('admin.contacts', ['filter' => 'read'])); ?>"
                               class="btn btn-<?php echo e(request('filter') == 'read' ? '' : 'outline-'); ?>success w-100">
                                <i class="fas fa-envelope-open me-1"></i>Okunmuş
                                <span class="badge bg-success ms-1"><?php echo e(\App\Models\Contact::where('is_read', true)->count()); ?></span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?php echo e(route('admin.contacts', ['filter' => 'today'])); ?>"
                               class="btn btn-<?php echo e(request('filter') == 'today' ? '' : 'outline-'); ?>info w-100">
                                <i class="fas fa-calendar-day me-1"></i>Bugün
                                <span class="badge bg-info ms-1"><?php echo e(\App\Models\Contact::whereDate('created_at', today())->count()); ?></span>
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
                    <form action="<?php echo e(route('admin.contacts')); ?>" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   placeholder="İsim, e-posta veya konu ara..."
                                   value="<?php echo e(request('search')); ?>">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <?php if(request('search')): ?>
                                <a href="<?php echo e(route('admin.contacts')); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            <?php endif; ?>
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
                            <h5 class="text-primary mb-1"><?php echo e($contacts->total()); ?></h5>
                            <small class="text-muted">Toplam</small>
                        </div>
                        <div class="col-6">
                            <h5 class="text-warning mb-1"><?php echo e($contacts->where('is_read', false)->count()); ?></h5>
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
            <?php if($contacts->count() > 0): ?>
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
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($contact->is_read ? '' : 'bg-light'); ?>">
                                <td>
                                    <strong><?php echo e($contact->id); ?></strong>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                             style="width: 40px; height: 40px;">
                                            <?php echo e(strtoupper(substr($contact->name, 0, 1))); ?>

                                        </div>
                                        <div>
                                            <strong class="d-block"><?php echo e($contact->name); ?></strong>
                                            <small class="text-muted">
                                                <?php echo e($contact->created_at->diffForHumans()); ?>

                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="mailto:<?php echo e($contact->email); ?>" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1 text-muted"></i>
                                            <?php echo e($contact->email); ?>

                                        </a>
                                    </div>
                                    <?php if($contact->phone): ?>
                                        <div class="mt-1">
                                            <a href="tel:<?php echo e($contact->phone); ?>" class="text-decoration-none">
                                                <i class="fas fa-phone me-1 text-muted"></i>
                                                <?php echo e($contact->phone); ?>

                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-1"><?php echo e($contact->subject); ?></div>
                                    <div class="text-muted small">
                                        <?php echo e(\Illuminate\Support\Str::limit($contact->message, 80)); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="text-dark"><?php echo e($contact->created_at->format('d.m.Y')); ?></div>
                                        <div class="text-muted"><?php echo e($contact->created_at->format('H:i')); ?></div>
                                    </div>
                                </td>
                                <td>
                                    <?php if($contact->is_read): ?>
                                        <span class="badge bg-success">
                                <i class="fas fa-check me-1"></i>Okundu
                            </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">
                                <i class="fas fa-clock me-1"></i>Yeni
                            </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(route('admin.contacts.show', $contact->id)); ?>"
                                           class="btn btn-primary"
                                           title="Mesajı Görüntüle"
                                           data-bs-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <?php if(!$contact->is_read): ?>
                                            <form action="<?php echo e(route('admin.contacts.mark-read', $contact->id)); ?>"
                                                  method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-warning"
                                                        title="Okundu İşaretle"
                                                        data-bs-toggle="tooltip">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                        <form action="<?php echo e(route('admin.contacts.delete', $contact->id)); ?>"
                                              method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- Sayfalama -->
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            Toplam <?php echo e($contacts->total()); ?> mesajdan <?php echo e($contacts->firstItem()); ?> - <?php echo e($contacts->lastItem()); ?> arası gösteriliyor
                        </div>
                        <div>
                            <?php echo e($contacts->links()); ?>

                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-inbox fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted">Henüz mesaj bulunmuyor</h4>
                        <p class="text-muted mb-4">İletişim formundan gelen mesajlar burada listelenecek.</p>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Dashboard'a Dön
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\waybross\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>