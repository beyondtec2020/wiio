<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<section class="content-header">
		<h1><i class="fa fa-user" ></i> Profile Setting</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong> Update Information</strong></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form class="form-horizontal" action="<?php echo e(route('updateProfile')); ?>" method="post">
            <?php echo e(csrf_field()); ?>


               <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">First Name :</label>
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
                  <label for="inputEmail3" class="col-sm-3 control-label"> Phone :</label>
                  <div class="col-sm-8">
                    <input type="text" name="phone" value="<?php echo e($user->phone); ?>" class="form-control">
                    <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary col-sm-8 col-sm-offset-3">Update  </button>
              </form>
            </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <strong> Profile</strong></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <form action="<?php echo e(route('profile')); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
              <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-5">
                  <?php if(!$user->profile): ?>
                    <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" class="img-circle" alt="User Image"><br>
                    <?php else: ?>
                    <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" class="img-circle" alt="User Image"><br>
                    <?php endif; ?>
                  </div>
            </div>
              <div class="form-group <?php echo e($errors->has('profile') ? 'has-error' : ''); ?>">
                  <div class="col-sm-8 col-sm-offset-3">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Select image </span>
                       <span class="fileinput-exists bold uppercase"> Change </span>
                       <input type="file" name="profile" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    <?php echo $errors->first('profile', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>
          </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary col-sm-8 col-sm-offset-3">Upload </button>
              </div>
            </form>

        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

        <form action="<?php echo e(route('updatePass')); ?>" method="post" role="form" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">

              <div class="form-group <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Old Password </label>
                  <div class="col-sm-8">
                    <input type="text" name="old_password" class="form-control" >
                    <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>

                  </div>
              </div>
              <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password *</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" >
                    <?php echo e($errors->has('old_password') ? 'has-error' : ''); ?>

                  </div>
              </div>

              <div class="form-group <?php echo e($errors->has('password_confirmation')?'has-error':''); ?>">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" >
                    <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>

                  </div>
              </div>
              
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary col-sm-8 col-sm-offset-3">Change Password </button>
          </div>
            </form>

        </div>
      </div>
    </div>


	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>