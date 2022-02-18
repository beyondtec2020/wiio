<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-table.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
    <section class="content-header">
    <h1>Subscribers</h1>
    	 <a href="<?php echo e(URL::to('downloadExcel/xls')); ?>" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download xls</b></a>

  <a href="<?php echo e(URL::to('downloadExcel/xlsx')); ?>" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download  xlsx</b></a>

  <a href="<?php echo e(URL::to('downloadExcel/csv')); ?>" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download CSV </b></a>

    </section>
    <section class="content">
    	
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <?php if($subscribers->count() !=0 ): ?>Total Subscriber :  <?php echo e($subscribers->count()); ?> <?php endif; ?>
              </h3>
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="Subscribers" data-sortable="true" >Subscribers</th><th data-field="date" data-sortable="true" >Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscribe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-center"></td>
                            <td class=""><?php echo e($subscribe->email); ?></td>
                            <td class=""><?php echo e($subscribe->created_at->toFormattedDateString()); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"></div>
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->


    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>
    	
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>