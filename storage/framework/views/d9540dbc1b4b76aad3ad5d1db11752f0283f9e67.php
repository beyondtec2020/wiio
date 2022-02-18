<?php $__env->startSection('sub-title'); ?>
| booksmarks
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<!--<h2>My <?php echo e($title); ?></h2> -->
					<h2>Meus Favoritos</h2>
				</div>
			</div>
		</div>
		
        <!-- Recent Activity -->
    	<div class="row">
        	<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<!--<h4><?php echo e($title); ?> Listings </h4> -->
                   <h4>Lista dos meus Favoritos </h4> 
					<ul>
					<?php $__currentLoopData = $Bookmark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php echo e(asset('public/images/'.$data->AddList->CountImage()->first()->image)); ?>" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="<?php echo e(url('/single-post/'.$data->AddList->id.'/'.$data->AddList->slug)); ?>">
										<?php echo e($data->AddList->title); ?></a></h3>
										<span><?php echo e($data->AddList->short_desc); ?></span>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo e($data->AddList->review()->count('addlist_id')); ?> reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="<?php echo e(url('del-to-favourite/'.$data->id)); ?>" onclick="return checkDelete()" class="button red"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>