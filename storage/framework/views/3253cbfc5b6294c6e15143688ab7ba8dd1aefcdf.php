<?php $__env->startSection('sub-title'); ?>
 <?php echo e($subTitle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1>Menu </h1>
<a href="<?php echo e(url('/menu')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-edit"></i><strong> Edit Menu</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2"><?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>

             <form action="<?php echo e(url('/update-menu')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="editCategoryForm">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                <div class="form-group">
                  <label for="" class="col-md-1 control-label">
                    Name :</label>
                  <div class="col-sm-11">
                  <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e($category->name); ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-1 control-label">
                    Details :</label>
                  <div class="col-sm-11">
                  <textarea id="editor4" name="description" rows="12"  class="form-control"><?php echo e($category->description); ?>

                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-1 control-label">Status :</label>
                  <div class="col-sm-11">
                    <select name="status" id="status" class="form-control has-error" required="" >
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-11 col-md-offset-1">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh"></i> <strong>  Update Menu </strong>
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
  document.forms['editCategoryForm'].elements['status'].value=<?php echo e($category->status); ?>

</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?php $__env->stopSection(); ?>
    	
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>