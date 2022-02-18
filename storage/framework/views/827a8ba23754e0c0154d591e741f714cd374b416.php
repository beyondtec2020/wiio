<?php $__env->startSection('sub-title'); ?>
| login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
    $redirect_to = Request::get('redirect_to');
    $redirect_to = ($redirect_to) ? '?redirect_to=' . urlencode($redirect_to) : '';
?>

<section class="primary-bg">
    <div class="container">
        <div id="login_signup">
            <div class="form_wrap_m">
                <div class="white_box">
                    <h3>Bem vindo de volta!!</h3>

                    <form action="<?php echo e(url('/login') . $redirect_to); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <input type="password" name="password" class="form-control" placeholder="Senha">
                            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Login">
                        </div>
                    </form>
                    <p>Não tem uma conta? <a href="<?php echo e(url('/register')); ?>">Assine</a></p>
                    <p><a href="<?php echo e(url('/admin-password/reset')); ?>">Esqueceu sua senha?</a></p>
                    <div class="back_home"><a href="<?php echo e(url('/')); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Voltar à página inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('form.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>