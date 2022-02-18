<?php $__env->startSection('sub-title'); ?>
| Users-dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style type="text/css">
	.dashboard-info-box {
    overflow: hidden;
    padding: 20px 76px 0px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Painel de Controle</h2>
				</div>
			</div>
		</div>

		<?php $userId = Sentinel::getUser()->id;?>
        <div class="row">
            <div class="dashboard-info-box">
                
                <div class="dashboard-info color-1">
                    <h4><?php echo e($AddList->where('user_id',$userId)->where('status',1)->count()); ?></h4> <span>Anúncios  Ativos</span>
                </div>
                <div class="dashboard-info color-2">
                    <h4><?php echo e($AddList->where('user_id',$userId)->where('status',0)->count()); ?></h4> <span>Anúncios Pendentes</span>
                </div>
                <div class="dashboard-info color-3">
                    <h4><?php echo e($AddList->where('user_id',$userId)->where('status',2)->count()); ?></h4> <span>Anúncios Vencidos</span>
                </div>
                
                <div class="dashboard-info color-5">
                    <h4><?php echo e($AddList->where('user_id',$userId)->sum('reviews')); ?></h4> <span>Número de visualizações</span>
                </div>
                <div class="dashboard-info color-6">
                <?php $c = App\Bookmark::where('user_id',$userId)->count(); ?>
                    <h4><?php echo e($c); ?></h4> 
                    <span>Meus Favoritos</span>
                </div>
            </div>
        </div>
        <!-- Recent Activity -->
        <div class="row">
			<div class="col-lg-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<!-- <h4>Recent Activities</h4>
					<ul>
						<li>
							<i class="list-box-icon fa fa-list"></i> Your listing <strong><a href="#">The Morning Hotel</a></strong> has been approved!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon fa fa-star-o"></i> Kathy Brown left a review on <strong>
                            <a href="#">The Morning Hotel</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon fa fa-bookmark-o"></i> Someone bookmarked your <strong><a href="#">Laisa Spa Center</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon fa fa-star-o"></i> Kathy Brown left a review on <strong>
                            <a href="#">Auto Repair Shop</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon fa fa-bookmark-o"></i> Someone bookmarked your <strong><a href="#">The Shelby Apartment</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul> -->
				</div>
			</div>
        </div>

        <div style="min-height: 120px;"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>