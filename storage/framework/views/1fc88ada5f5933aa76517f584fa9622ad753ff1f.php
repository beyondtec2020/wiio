<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-colorpicker.min.css')); ?>">
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>	
	<section class="content-header">
		<h1>General Settings</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">

    <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Logo</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <form action="<?php echo e(route('logo')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website logo :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change Logo </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="logo"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Image Must be Type of PNG </code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  <?php if($GeneralSetting->logo == null): ?>
                  <h5 style="color: red; text-align: center;">there is no logo</h5>
                  <?php else: ?>
                  <img src="<?php echo e(asset('public/images/'.$GeneralSetting->logo)); ?>" height="70px" width="150px">
                  <?php endif; ?>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Logo </strong>
              </button>
            </div>
            </div>
            </div>
            </form>

            
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Preloader Gif</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('/update-Preloader')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Preloader Gif :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Gif </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="preloader"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code> Image Must be type of Gif</code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  <img src="<?php echo e(asset('public/assets/images/Preloader_2.gif')); ?>" class="img-responsive">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update favicon </strong>
              </button>
            </div>
            </div>
            </div>
            </form>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Favicon Icon</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(route('favico')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Favicon Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  favicon </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="favico_ico"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Favicon Image Must be type of PNG</code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  <?php if($GeneralSetting->favico_ico == null): ?>
                  <h5 style="color: red;text-align: center;">there is no favico.ico</h5>
                  <?php else: ?>
                  <img src="<?php echo e(asset('public/images/'.$GeneralSetting->favico_ico)); ?>" height="70px" width="150px">
                  <?php endif; ?>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update favicon </strong>
              </button>
            </div>
            </div>
            </div>
            </form>

        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Website Content</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
             <form action="<?php echo e(route('webContent')); ?>" method="post" class="form-horizontal">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website Title :</label>
                  <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e($GeneralSetting->title); ?>">
                  </div>
                </div>
                <div class="form-group <?php echo e($errors->has('short_bio') ? 'has-error' : ''); ?>">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Short Biography :</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="short_bio" rows="5"><?php echo e($GeneralSetting->short_bio); ?></textarea>
                  <span class="text-danger"><?php echo e($errors->first('short_bio')); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website Tag :</label>
                  <div class="col-sm-9">
                  <input type="text" data-role="tagsinput" name="metakeywords" class="form-control"  value="<?php echo e($GeneralSetting->metakeywords); ?>">
                  </div>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Office Address</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
              <form action="<?php echo e(route('address')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                     Address :</label>

                  <div class="col-sm-9">
                    <textarea id="editor1" name="address" rows="8" class="form-control">
                        <?php echo e($GeneralSetting->address); ?>

                    </textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Phone :</label>
                  <div class="col-sm-9">
                  <input type="tel" name="phone" class="form-control" placeholder="Phone" value="<?php echo e($GeneralSetting->phone); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Fax :</label>
                  <div class="col-sm-9">
                  <input type="text" name="fax" class="form-control" placeholder="Fax" value="<?php echo e($GeneralSetting->fax); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Email :</label>
                  <div class="col-sm-9">
                  <input type="email" name="office_email" class="form-control" placeholder="Email" value="<?php echo e($GeneralSetting->office_email); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Website base color :</label>
                  <div class="col-sm-9">
                  <input type="text" name="color"  value="<?php echo e($GeneralSetting->color); ?>" style="background-color: #<?php echo e($GeneralSetting->color); ?>;color:#fff" class="form-control my-colorpicker1 ">
                  </div>
                </div>
                
                    
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Office Address</strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Footer Text</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="<?php echo e(route('footer')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea id="editor2" name="footer" rows="2" class="form-control">
                        <?php echo e($GeneralSetting->footer); ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Footer text</strong>
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
              <h3 class="box-title "><strong>Google Location Embeded Code</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="<?php echo e(route('gmaps')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($GeneralSetting->id); ?>">
                    <textarea  name="gmaps" rows="10" class="form-control">
                        <?php echo $GeneralSetting->gmaps; ?>

                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Google Location</strong>
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
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-fileinput.js')); ?>"></script>
  <script src="<?php echo e(asset('public/assets/admin/js/bootstrap-colorpicker.js')); ?>"></script>

<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
   $(function () {
            $('.my-colorpicker1').colorpicker()
        });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>