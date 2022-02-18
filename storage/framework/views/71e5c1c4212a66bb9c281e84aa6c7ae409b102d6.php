<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<section class="content-header">
		<h1> <i class="fa fa-cogs "></i> General Settings</h1>
	</section>
	<section class="content">

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>About Us </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class=" btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class=" btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="<?php echo e(route('about')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea id="editor1" name="about" rows="12" class="form-control">
                        <?php echo e($GeneralSetting->about); ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
              <i class="fa fa-refresh "></i> <strong> Update About Us</strong>
              </button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info ">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Privacy & Policy </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="<?php echo e(route('privacy')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              	<input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea id="editor2" name="privacy" rows="12" class="form-control">
                        <?php echo e($GeneralSetting->privacy); ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
              <i class="fa fa-refresh "></i> <strong> Update  Privacy & Policy </strong>
              </button>
            </div>
			</form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Site Map </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="<?php echo e(route('sitemap')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea id="editor3" name="sitemap" rows="12" class="form-control">
                        <?php echo e($GeneralSetting->sitemap); ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                <i class="fa fa-refresh "></i> <strong>  Update Sitemap</strong>
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Terms & Conditions </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="<?php echo e(route('terms')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              	<input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea id="editor4" name="terms" rows="12"  class="form-control">
                        <?php echo e($GeneralSetting->terms); ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
	            <div class="box-footer">
	              <button class="btn btn-lg btn-primary btn-block" type="submit">
	              <i class="fa fa-refresh "></i> <strong>  Update Terms & Conditions</strong>
	              </button>
	            </div>
            </form>
        </div>
      </div>
    </div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>