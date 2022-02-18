<?php $__env->startSection('sub-title'); ?>
| User Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Meu Cadastro</h2>
				</div>
			</div>
		</div>

		<div class="row">			
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
                	<div class="user_image">
                	<?php if($user->profile == null): ?>
                    	<img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" alt="img"> 
                    <?php else: ?>
                    <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" alt="img"> 
                    <?php endif; ?>
                        <div class="buttons-to-right">
                            <a href="<?php echo e(route('editUserProfile')); ?>" class="button gray"><i class="fa fa-pencil"></i> Alterar Meu Cadastro</a>
                        </div>
                    </div>
                    <div class="user_info">
                    	<ul>
                        	<li><span>Nome:</span> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></li>
                            <li><span>Email:</span> <?php echo e($user->email); ?></li>
                            <li><span>Telefone:</span> <?php echo e($user->phone); ?></li>
                        </ul>
                    </div>
                </div>
			</div>

		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>