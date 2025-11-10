<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Giriş - Tanıtım Sitesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px 15px 0 0;
        }
    </style>
</head>
<body>
<div class="login-container d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header login-header text-white text-center py-4">
                        <i class="fas fa-lock fa-3x mb-3"></i>
                        <h2 class="fw-bold mb-1">Admin Girişi</h2>
                        <p class="mb-0 opacity-75">Tanıtım Sitesi Yönetim Paneli</p>
                    </div>
                    <div class="card-body p-5">

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><i class="fas fa-exclamation-circle me-2"></i><?php echo e($error); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-4">
                                <label for="email" class="form-label">E-posta</label>
                                <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                    <input type="email" class="form-control border-start-0"
                                           id="email" name="email"
                                           value="<?php echo e(old('email')); ?>"
                                           placeholder="admin@example.com"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Şifre</label>
                                <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                    <input type="password" class="form-control border-start-0"
                                           id="password" name="password"
                                           placeholder="Şifreniz" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg py-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Giriş Yap
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\waybross\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>