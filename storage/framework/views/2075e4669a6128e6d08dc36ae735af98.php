<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
            <?php echo $__env->yieldContent('title'); ?> - <?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?>

        <?php else: ?>
            <?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?>

        <?php endif; ?>
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('about')); ?>">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('services')); ?>">Hizmetler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('contact')); ?>">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>

<!-- Footer --><!-- Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5><?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?></h5>
                <p><?php echo e(\App\Models\Setting::getValue('site_description', 'Profesyonel web çözümleri sunuyoruz.')); ?></p>

                <!-- Social Media Links -->
                <div class="social-links">
                    <?php
                        $facebook = \App\Models\Setting::getValue('social_facebook');
                        $twitter = \App\Models\Setting::getValue('social_twitter');
                        $instagram = \App\Models\Setting::getValue('social_instagram');
                        $linkedin = \App\Models\Setting::getValue('social_linkedin');
                        $github = \App\Models\Setting::getValue('social_github');
                    ?>

                    <?php if($facebook): ?>
                        <a href="<?php echo e($facebook); ?>" class="text-white me-3" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($twitter): ?>
                        <a href="<?php echo e($twitter); ?>" class="text-white me-3" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($instagram): ?>
                        <a href="<?php echo e($instagram); ?>" class="text-white me-3" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($linkedin): ?>
                        <a href="<?php echo e($linkedin); ?>" class="text-white me-3" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($github): ?>
                        <a href="<?php echo e($github); ?>" class="text-white me-3" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <p>
                    <i class="fas fa-phone me-2"></i>
                    <?php echo e(\App\Models\Setting::getValue('contact_phone', '+90 (212) 123 45 67')); ?>

                </p>
                <p>
                    <i class="fas fa-envelope me-2"></i>
                    <?php echo e(\App\Models\Setting::getValue('contact_email', 'info@tanitimsitesi.com')); ?>

                </p>
                <p>
                    <i class="fas fa-map-marker-alt me-2"></i>
                    <?php echo e(\App\Models\Setting::getValue('contact_address', '1234 Sokak No:1 İstanbul, Türkiye')); ?>

                </p>
                <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(\App\Models\Setting::getValue('site_title', 'Tanıtım Sitesi')); ?>. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\waybross\resources\views/layouts/app.blade.php ENDPATH**/ ?>