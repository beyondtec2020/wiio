<?php $__env->startSection('sub-title'); ?>
| change-password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .help-block{color: red;}
</style>
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>Nova Senha</h3>
	                
                      <?php if($errors->any()): ?>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <div class="alert alert-danger alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <?php echo $error; ?>

                              </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      
                    <form role="form" method="POST" action="<?php echo e(route('admin.password.request')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                        <div class="form-group has-feedback">
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Email" data-mask="email" required autofocus>
                        </div>

                        <div class="form-group  has-feedback">
                            <input type="password" name="password" class="form-control" value="" placeholder="Nova senha">
                        </div>

                        <div class="form-group ">
                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Confirme a Senha">
                            
                        </div>

                        <?php if(session('status')): ?>
                          <div class="alert alert-success">
                              <?php echo e(session('status')); ?>

                          </div>
                      <?php endif; ?>
                      <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <strong><?php echo e(session('error')); ?></strong>
                    </div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <strong><?php echo e(session('success')); ?></strong>
                    </div>
                    <?php endif; ?>
                      <?php if(session('message')): ?>
                          <div class="alert alert-<?php echo e(session('type')); ?>">
                              <?php echo e(session('message')); ?>

                          </div>
                      <?php endif; ?>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Atualizar senha">
                        </div>
                    </form>


                    <p>Voltar a  <a href="<?php echo e(url('/login')); ?>">Página de Login</a></p>
                    <div class="back_home"><a href="<?php echo e(url('/')); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> voltar a pagina inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('form.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>