<?php $__env->startSection('sub-title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1>My Listing</h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong> <?php echo e($title); ?>-Listing</strong></h3>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <?php $__currentLoopData = $AddList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="timeline-item">
                    <div class="col-md-3">
                    <a href="<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>">
                    <img src="<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>" alt="<?php echo e($data->title); ?>" class="img-responsive"></a>
                    </div>

                      <h3 class="timeline-header"><a href="<?php echo e(url('/preview-list/'.$data->id.'/'.$data->slug)); ?>"><?php echo e($data->title); ?></a> </h3>
                      <div class="timeline-body"><?php echo e($data->short_desc); ?></div>
                      <div class="timeline-footer">
                      <p>(<?php echo e($data->review()->count('addlist_id')); ?> reviews)</p>

                      <a href="<?php echo e(url('/edit-listing/'.$data->id.'/'.$data->slug)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="<?php echo e(url('/delete-listing/'.$data->id.'/'.$data->slug)); ?>" onclick="return checkDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
                      </div>
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer"></div> -->

            <?php echo e($AddList->render()); ?>

        </div>
      </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>