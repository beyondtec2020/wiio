<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/owl/css/owl.carousel.min.css')); ?>" rel="stylesheet">
<style type="text/css" media="print">
    @media  print
{    
    .print,.btn
    {
        display: none !important;
    }
   @page  {
    size: auto;   /* auto is the initial value */
    margin: 0px auto;  /* this affects the margin in the printer settings */
}
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-eye"></i><strong> Preview </strong></h3>
              <a href="<?php echo e(URL::previous()); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              Title: <?php echo e($AddList->title); ?>

            <!-- <small>Date: <?php echo e($AddList->updated_at->toFormattedDateString()); ?></small> -->

            <div class="btn-group pull-right">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <?php if($AddList->status == 0): ?> 
                                <li><a href="<?php echo e(url('/active-list/'.$AddList->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$AddList->id)); ?>">Expired</a></li>
                                <?php elseif($AddList->status == 1): ?>
                                <li><a href="<?php echo e(url('/pending-list/'.$AddList->id)); ?>">Pending</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$AddList->id)); ?>">Expired</a></li>
                                <?php elseif($AddList->status == 2): ?>
                                <li><a href="<?php echo e(url('/active-list/'.$AddList->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/pending-list/'.$AddList->id)); ?>">Pending</a></li>
                                <?php endif; ?>

                              <?php if($AddList->is_featured == 0): ?> 
                              <li><a href="<?php echo e(url('/allow-fetured-list/'.$AddList->id)); ?>">Allow Fetured</a></li>
                              <?php else: ?>
                              <li><a href="<?php echo e(url('/disallow-fetured-list/'.$AddList->id)); ?>">Disallow Fetured</a></li>
                              <?php endif; ?>
                  </ul>
                </div>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Posted By
          <address>
            <strong><?php echo e($AddList->user->first_name); ?> <?php echo e($AddList->user->last_name); ?></strong><br><br>
            Phone: <?php echo e($AddList->user->phone); ?><br>
            Email: <?php echo e($AddList->user->email); ?>

          </address>
        </div>
        <div class="col-sm-2  invoice-col col-sm-offset-4">
          <?php if(!$AddList->user->profile): ?>
          <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" class="img-circle" alt="User Image"><br>
          <?php else: ?>
          <img src="<?php echo e(asset('public/images/'.$AddList->user->profile)); ?>" class="img-circle" alt="User Image"><br>
          <?php endif; ?>
        </div>
        <div class="col-md-2">
          <a href="<?php echo e(url('/preview-report/'.$AddList->id.'/'.$AddList->slug)); ?>" class="btn btn-info" title="Report"><i class="fa fa-flag"></i> <?php echo e($AddList->reports()->count()); ?></a>
          <a href="<?php echo e(url('/preview-review/'.$AddList->id.'/'.$AddList->slug)); ?>" class="btn btn-info" title="Review"><i class="fa fa-comment-o"></i> <?php echo e($AddList->report()->count()); ?></a>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-8">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <b>Short Lines:</b>  <?php echo e($AddList->short_desc); ?>

            </p>
        </div>
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <b>Category name:</b> <?php echo e($AddList->cat->name); ?>

          </p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-8">
            <p class="text-muted well well-sm no-shadow"><b> Address :</b> 
            <?php echo e($AddList->address); ?></p>
        </div>
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow" ><b>City name :</b> <?php echo e($AddList->city->name); ?></p>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow"><b> Zip-Code :</b>  <?php echo e($AddList->zip_code); ?></p>
        </div>
        <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" ><b>Phone Number :</b> <?php echo e($AddList->phone); ?></p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Email :</b> <?php echo e($AddList->email); ?></p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Website :</b> <?php echo e($AddList->website); ?></p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row"> 
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Facebook :</b> <?php echo e($AddList->facebook); ?></p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Linkdin :</b> <?php echo e($AddList->linkdin); ?></p>
        </div>
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Twitter :</b> <?php echo e($AddList->twitter); ?></p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Google Plus :</b> <?php echo e($AddList->google); ?></p>
        </div>
      </div>
      <!-- /.row -->

      <div class="row" > 
      <div class="text-center"> <h1>Gallery</h1></div>
      <div class="owl-carousel">
      <?php  $dd = $AddList->CountImage()->get(); ?>
        <?php $__currentLoopData = $dd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
        <div class="col-xs-12">
          <img src="<?php echo e(asset('public/images/'.$d->image)); ?>" class="img-responsive" alt="image">
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div><br>
      <!-- /.row -->
     <?php $vv = $AddList->totalAmenity()->get(); ?>

      <div class="row" > 
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow"><b>Max Price :</b> <?php echo e($AddList->max_price); ?></p>
        <p class="text-muted well well-sm no-shadow"><b>Min Price :</b> <?php echo e($AddList->max_price); ?></p>
        </div>
        <div class="col-xs-8">
          <?php echo $AddList->video; ?>

        </div>
      </div>


      <br><div class="row" > 
        <div class="col-xs-2">
          <b>Description :</b>
        </div>
        <div class="col-xs-10">
            <p class="text-muted well well-sm no-shadow"> <?php echo e($AddList->description); ?></p>
        </div>
      </div>
      <!-- /.row -->

      <br><div class="row" > 
        <div class="col-xs-2">
          <b>Amenities :</b>
        </div>
        <div class="col-xs-10">
            <div class="checkbox">
              <?php $i=1; $j=1; ?>
              <?php $__currentLoopData = $Amenity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p>
              <input type="checkbox" id="amenities<?php echo e(++$k); ?>"  value="<?php echo e($data->id); ?>"  disabled=true
              <?php $__currentLoopData = $vv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($v->amenities_id == $data->id ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >

              <label for="amenities<?php echo e($i++); ?>"><?php echo e($data->name); ?></label></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" onclick="myFunction()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            
        </div>
      </div>
    </div>


    
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/owl/js/owl.carousel.js')); ?>"></script>
  <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    </script>

<script>
function myFunction() {
    window.print();
}
</script>
<?php $__env->stopSection(); ?>
    	
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>