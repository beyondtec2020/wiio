<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-table.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<section class="content-header">
		<h1>Testimonial</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong><i class="fa fa-eye"></i> View All</strong></h3>
              <div class="box-tools pull-right">
              <a href="<?php echo e(url('/add-testimonial')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Testimonial </b> </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="sl"  >SL.</th>
                            <th data-field="Name" data-sortable="true" >Name</th>
                            <th data-field="Message" data-sortable="true" >Message </th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-center"></td>
                          <td><?php echo e(++$k); ?></td>
                            <td class="text-center">
                            <img src="<?php echo e(asset('public/images/'.$v->image)); ?>" class="img-circle" style="width: 100%">
                              <h3><?php echo $v->name; ?></h3>
                              <p><?php echo $v->designation; ?></p>
                            </td>
                            <td class=""><?php echo $v->description; ?></td>
                           
                            <td class="text-center">
                            <?php if($v->status == 1): ?> 
                              <span class="label label-success">Active</span>
                              <?php else: ?>
                              <span class="label label-warning">Deactive</span>
                              <?php endif; ?>
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="<?php echo e(url('/edit-testimonial/'.$v->id)); ?>">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                
                                <a class="btn btn-danger btn-xs" href="<?php echo e(url('/delete-testimonial/'.$v->id)); ?>" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
        </div>
      </div>
    </div>

	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>