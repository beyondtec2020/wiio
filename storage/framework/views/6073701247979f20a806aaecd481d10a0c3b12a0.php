<?php $__env->startSection('sub-title'); ?>
| password-reset
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>Esqueceu a senha</h3>
                <form  role="form" method="POST" action="<?php echo e(route('admin.password.email')); ?>">
                <?php echo csrf_field(); ?>



            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback">
                <input type="email" name="email" id="email" class="form-control"  placeholder="Email" data-mask="email" required>
                <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

            </div>
            
          <?php if($errors->any()): ?>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $error; ?>

                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
            <div class="form-group">
                <input type="submit" class="btn btn-block" value="Enviar código">
            </div>
        </form>


                    <p>Voltar a  <a href="<?php echo e(url('/login')); ?>">Página de Login</a></p>
                    <div class="back_home"><a href="<?php echo e(url('/')); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Voltar a página inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('form.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>