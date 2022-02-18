<?php $__env->startSection('sub-title'); ?>
| Post reviews
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Avaliações</h2>
				</div>
			</div>
		</div>

		<div class="row">			
                <!-- Review-List -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box">
                        <ul>
                        <?php $userId = Sentinel::getUser()->id; ?>
                        <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($data->addlist->user_id == $userId): ?>
                            <li class="listing-reviews">
                                <div class="review_img">
                                    <?php $user = App\User::where('email', $data->email)->first();?>
                                    <?php if(!$user): ?>
                                    <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" alt="image">
                                    <?php elseif($user->profile == null): ?>
                                    <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" alt="image">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" alt="image">
                                    <?php endif; ?>

                                </div>
                                <div class="review_comments">
                                    <div class="comment-by">
                                    <?php if(!$user): ?>
                                    	<?php echo e($data->email); ?>

                                    <?php else: ?>
                                    	<?php echo e($user->first_name); ?>

                                    <?php endif; ?>
                                    
                                    <span> no </span>
                                    <a href="<?php echo e(url('/preview-lists/'.$data->addlist->id.'/'.$data->addlist->slug)); ?>"><?php echo e($data->addlist->title); ?></a>
                                        <div class="listing_review_info"> <p>
                                         <?php switch($data->rating):
                                                case (1): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (2): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>
                                                
                                                <?php case (3): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (4): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (5): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                <?php break; ?>

                                                <?php default: ?>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            <?php endswitch; ?>
                                            </p>
                                        </div>
                                     </div>
                                    <span class="date"><?php echo e($data->created_at->toFormattedDateString()); ?></span> 
                                    <div class="star-rating">
                                    </div>
                                    <p><?php echo e($data->description); ?></p>
                                </div>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php echo $review->links(); ?>

                </div>
    
            </div>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>