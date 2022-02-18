<?php $__env->startSection('sub-title'); ?>
| <?php echo e($title); ?>  Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Lista de ofertas</h2>
				</div>
			</div>
		</div>
		
        <!-- Recent Activity -->
    	<div class="row">
        	<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<h4><?php echo e($title); ?> Ofertas </h4>

					<ul>
					<?php $__currentLoopData = $AddList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $v = $data->CountImage()->first(); ?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php echo e(asset('public/images/'.$v->image)); ?>" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="<?php echo e(url('/preview-lists/'.$data->id.'/'.$data->slug)); ?>"><?php echo e($data->title); ?></a></h3>
										<span><?php echo e($data->short_desc); ?></span>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo e($data->reviews); ?> views)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<?php if($data->status != 2): ?>
								<a href="<?php echo e(url('/edit-list/'.$data->id.'/'.$data->slug)); ?>" class="button gray"><i class="fa fa-pencil"></i> Alterar</a>
								<?php endif; ?>

								<a href="<?php echo e(url('/delete-list/'.$data->id.'/'.$data->slug)); ?>" onclick="return checkDelete()" class="button red"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</ul>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>