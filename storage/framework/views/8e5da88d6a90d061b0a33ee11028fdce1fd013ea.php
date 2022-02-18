<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<section class="content-header"><h1> <i class="fa fa-user"></i> Edit User </h1>
<a href="<?php echo e(route('staffs')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<?php if(Session::get('error')): ?>
  <div class="alert alert-error">
    <?php echo e(Session::get('error')); ?>

  </div>
<?php endif; ?>

<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit"></i> Edit Information</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" name="editStaff" action="<?php echo e(route('updatestaffs')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name *</label>
                  <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Last Name *</label>
                  <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Staff Email *</label>
                  <div class="col-sm-9">
                    <input type="email" value="<?php echo e($user->email); ?>" name="email" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Staff Phone *</label>
                  <div class="col-sm-9">
                    <input type="tel"  name="phone" value="<?php echo e($user->phone); ?>" class="form-control">
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <button class="btn btn-lg btn-primary btn-block " type="submit">
                        <i class="fa fa-paper-plane"></i> <strong>  Update Information </strong>
                    </button>
                  </div>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </section>




<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit"></i> Edit Role</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(route('updateRole')); ?>" method="post" role="form" class="form-horizontal" name="editRole" >
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                 <div class="form-group<?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                  <label class="col-sm-2 control-label">Select Role *</label>
                  <div class="col-sm-9">
                    <select name="role" class="form-control" >
                    <option value="">Select Role</option>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                     <?php echo $errors->first('role', '<p class="help-block" style="color: red">:message</p>'); ?>

                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <button class="btn btn-lg btn-primary btn-block " type="submit">
                        <i class="fa fa-paper-plane"></i> <strong>  Update Role </strong>
                    </button>
                  </div>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </section>




<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit"></i> Change Password</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(route('updatePassw')); ?>" method="post" role="form" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Password *</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Confirm Password *</label>
                  <div class="col-sm-9">
                    <input type="password"  name="password_confirmation" class="form-control" >
                  </div>
                </div>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <button class="btn btn-lg btn-primary btn-block " type="submit">
                        <i class="fa fa-paper-plane"></i> <strong>  Change Password </strong>
                    </button>
                  </div>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </section>

<script type="text/javascript">
  // document.forms['editRole'].elements['role'].value=
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>