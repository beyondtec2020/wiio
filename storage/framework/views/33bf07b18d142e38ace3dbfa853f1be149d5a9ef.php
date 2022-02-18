<?php if(session()->has('flash_message')): ?>
    <script>
        swal({
            title: "<?php echo session('flash_message.title'); ?>",
            text:  "<?php echo session('flash_message.message'); ?>",
            type: "<?php echo e(session('flash_message.type')); ?>",
            timer: 2500,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?php if(session()->has('flash_message_overlay')): ?>
    <script>
        swal({
            title: "<?php echo e(session('flash_message_overlay.title')); ?>",
            text:  "<?php echo e(session('flash_message_overlay.message')); ?>",
            type: "<?php echo e(session('flash_message_overlay.type')); ?>",
            confirmButtonText: 'Ok'
        });
    </script>
<?php endif; ?>