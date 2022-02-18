<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-table.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<section class="content-header"><h1><i class="fa fa-user"></i> Users </h1>
<a href="<?php echo e(route('addstaffs')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add User </b> </a>
</section>
<section class="content">
    
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="Name" data-sortable="true" >Staff Name</th>
                            <th data-field="email" data-sortable="true">Staff Email </th>
                            <th data-field="phone" data-sortable="true">Phone</th>
                            <th data-field="Role" data-sortable="true">Role </th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-center"></td>
                            <td class=""><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> </td>
                         <td class=""><?php echo e($user->email); ?></td>
                         <td class=""><?php echo e($user->phone); ?></td>
                         <td class="">
                         <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($role->name); ?>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </td>
                            <td class="">
                              <?php if($user->status == 1): ?>
                              <span class="label label-success">Active </span>
                              <?php else: ?>
                              <span class="label label-danger">Deactive </span>
                              <?php endif; ?>
                            
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="<?php echo e(url('/edit-staffs/'.$user->id)); ?>">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                              </a>
                              
                              
                              <?php if($user->id != 1): ?>
                              <?php if($user->status == 1): ?>
                                <a class="btn btn-warning btn-xs" href="<?php echo e(url('/upb-staff/'.$user->id)); ?>">
                                    <span class="glyphicon glyphicon-remove"></span>  Not Allow
                                </a>
                              <?php else: ?>
                              <a class="btn btn-success btn-xs" href="<?php echo e(url('/pb-staff/'.$user->id)); ?>">
                                    <span class="glyphicon glyphicon-ok"></span>  Allow Access
                                </a>
                              <?php endif; ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
</div>
<!-- /.row -->
</section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>