<?php $__env->startSection('sub-title'); ?>
| User Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-edit"></i> Alterar Meu Cadastro</h2>

					<div class="buttons-to-right">
                        <a href="<?php echo e(route('viewUserProfile')); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
                    </div>
				</div>
			</div>
		</div>

	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
			<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	    	<div class="add_listing_info">
                <h6><strong>Alterar dados cadastrais</strong></h6>	

                 <form class="form-horizontal" action="<?php echo e(route('updateProfile')); ?>" method="post">
            	<?php echo e(csrf_field()); ?>			
	            	<input type="hidden" name="id" value="<?php echo e($user->id); ?>">

                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Primeiro Nome :</label>
                  <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>">
                        <?php echo $errors->first('first_name', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>

                <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>">
                    <?php echo $errors->first('last_name', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Email :</label>
                  <div class="col-sm-8">
                    <input type="email" value="<?php echo e($user->email); ?>" name="email" class="form-control" readonly disabled>
                  </div>
                </div>
                <div class="form-group<?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Telefone :</label>
                  <div class="col-sm-8">
                    <input type="tel"  name="phone" value="<?php echo e($user->phone); ?>" class="form-control">
                    <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>


                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Alterar  </button></div>
                	</div>
                </form>                   
            </div> 
        </div>
	</div>



	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
	    	<div class="add_listing_info">
                <h6><strong>  Alteração da foto </strong></h6>	
                 
        <form action="<?php echo e(route('profile')); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
            <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-3">
                  <?php if($user->profile): ?>
                    <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" class="img-circle" alt="User Image"><br>
                    <?php else: ?>

                    <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" class="img-circle" alt="User Image"><br>
                    <?php endif; ?>
                  </div>
            </div>
              <div class="form-group <?php echo e($errors->has('profile') ? 'has-error' : ''); ?>">
                  <div class="col-sm-5 col-sm-offset-3">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput" style="width: 191px;>
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Selecionar foto </span>
                       <span class="fileinput-exists bold uppercase"> Alterar </span>
                       <input type="file" name="profile" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>

                    <?php echo $errors->first('profile', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" style="min-width: 365px">Carregar foto  </button></div>
                	</div>

                </form>                   
            </div> 
        </div>
	</div>



	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
	    	<div class="add_listing_info">
                <h6><strong> Alteração da senha</strong></h6>	
                 
        <form action="<?php echo e(route('updatePass')); ?>" method="post" role="form" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">

              <div class="form-group <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Senha Atual </label>
                  <div class="col-sm-8">
                    <input type="text" name="old_password" class="form-control" >
                    <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>

                  </div>
              </div>
              <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nova Senha *</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" >
                    <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>

                  </div>
              </div>

              <div class="form-group <?php echo e($errors->has('password_confirmation')?'has-error':''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirma a nova senha *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" >
                    <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>

                  </div>
              </div>

                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Alterar </button></div>
                	</div>
                </form>                   
            </div> 
        </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>