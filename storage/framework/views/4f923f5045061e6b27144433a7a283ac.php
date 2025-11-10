<?php $__env->startSection('title', 'Site Ayarları'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">
            <i class="fas fa-cog me-2"></i>Site Ayarları
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Geri
                </a>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>"
                            id="<?php echo e($group); ?>-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#<?php echo e($group); ?>"
                            type="button"
                            role="tab">
                        <i class="fas fa-<?php echo e($group == 'general' ? 'cog' : ($group == 'contact' ? 'phone' : ($group == 'social' ? 'share-alt' : ($group == 'seo' ? 'search' : 'envelope')))); ?> me-1"></i>
                        <?php echo e(ucfirst($group)); ?>

                    </button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <!-- Location tab content -->

        <div class="tab-content" id="settingsTabsContent">
            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $groupSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>"
                     id="<?php echo e($group); ?>"
                     role="tabpanel"
                     aria-labelledby="<?php echo e($group); ?>-tab">

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-primary">
                                <i class="fas fa-<?php echo e($group == 'general' ? 'cog' : ($group == 'contact' ? 'phone' : ($group == 'social' ? 'share-alt' : ($group == 'seo' ? 'search' : 'envelope')))); ?> me-2"></i>
                                <?php echo e(ucfirst($group)); ?> Ayarları
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $groupSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-4 align-items-start">
                                    <div class="col-lg-4">
                                        <label for="setting-<?php echo e($setting->key); ?>" class="form-label fw-bold">
                                            <?php echo e($setting->description); ?>

                                        </label>
                                        <?php if($setting->description): ?>
                                            <div class="form-text"><?php echo e($setting->key); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-8">
                                        <?php if($setting->type === 'text'): ?>
                                            <textarea class="form-control"
                                                      id="setting-<?php echo e($setting->key); ?>"
                                                      name="<?php echo e($setting->key); ?>"
                                                      rows="4"
                                                      placeholder="<?php echo e($setting->description); ?>"><?php echo e(old($setting->key, $setting->value)); ?></textarea>

                                        <?php elseif($setting->type === 'boolean'): ?>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       type="checkbox"
                                                       id="setting-<?php echo e($setting->key); ?>"
                                                       name="<?php echo e($setting->key); ?>"
                                                       value="1"
                                                    <?php echo e(old($setting->key, $setting->value) ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="setting-<?php echo e($setting->key); ?>">
                                                    <?php echo e($setting->value ? 'Aktif' : 'Pasif'); ?>

                                                </label>
                                            </div>

                                        <?php else: ?>
                                            <input type="text"
                                                   class="form-control"
                                                   id="setting-<?php echo e($setting->key); ?>"
                                                   name="<?php echo e($setting->key); ?>"
                                                   value="<?php echo e(old($setting->key, $setting->value)); ?>"
                                                   placeholder="<?php echo e($setting->description); ?>">
                                        <?php endif; ?>

                                        <?php $__errorArgs = [$setting->key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <?php if(!$loop->last): ?>
                                    <hr class="my-4">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-secondary btn-lg">İptal</a>
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
                                <li><strong>Site Başlığı:</strong> <?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?></li>
                                <li><strong>Telefon:</strong> <?php echo e(\App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67')); ?></li>
                                <li><strong>E-posta:</strong> <?php echo e(\App\Models\Setting::getValue('contact_email', 'info@tanitimsitesi.com')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Sosyal Medya</h6>
                            <div class="social-preview">
                                <?php
                                    $socials = [
                                        'facebook' => \App\Models\Setting::getValue('social_facebook'),
                                        'twitter' => \App\Models\Setting::getValue('social_twitter'),
                                        'instagram' => \App\Models\Setting::getValue('social_instagram'),
                                        'linkedin' => \App\Models\Setting::getValue('social_linkedin')
                                    ];
                                ?>
                                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($url): ?>
                                        <a href="<?php echo e($url); ?>" class="btn btn-outline-primary btn-sm me-2 mb-2" target="_blank">
                                            <i class="fab fa-<?php echo e($platform); ?> me-1"></i><?php echo e(ucfirst($platform)); ?>

                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\waybross\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>