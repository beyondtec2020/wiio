<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- <section class="content-header"><h1>Page Header</h1></section>
    <section class="content"></section> -->
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong><?php echo $GeneralSetting->footer; ?></strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('public/assets/admin/js/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/js/sweetalert.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/assets/admin/js/app.min.js')); ?>"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo e(asset('public/assets/js/custom.js')); ?>"></script>
<?php echo $__env->make('Alerts::alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
    $(".alert").delay(4000).slideUp(300, function() {
        $(this).alert('close');
    });

    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type','info')); ?>";
        var message = "<?php echo e(Session::get('message')); ?>";
        showMessage(message, type);
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
