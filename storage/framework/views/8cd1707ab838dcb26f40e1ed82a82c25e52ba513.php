<?php $__env->startSection('sub-title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/search.css')); ?>" type="text/css">
<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->search_bg)); ?>);
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="intro_text white-text div_zindex carousel-search-form">
            <div class="search_form">
                <form action="<?php echo e(url('/search-listing')); ?>" method="get">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group select">
                        <select class="form-control chosen" name="category" required="">
                            <option value="">O que você está procurando?</option>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group select ">
                         <select class="form-control chosen" name="city" required="" style="">
                            <option value="">Cidade</option>
                            <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->slug); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group search_btn">
                        <input type="submit" value="Pesquisar" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    <div class="dark-overlay"></div>
</section>

<section id="" class="section-padding">
	<div class="container">
        <div class="row">
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
            	<div class="post_wrap">
                    <div class="text-center">
                        <h6><a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>"><?php echo e(str_limit($data->title,25,'..')); ?></a></h6>
                    </div>
                    <div class="post_img">
                        <div class="listing_cate">
                            <span class="cate_icon">
                                <a href="<?php echo e(url('/single-category/'.$data->cat->id.'/'.$data->cat->slug)); ?>">
                                <img src="<?php echo e(asset('public/images/'.$data->cat->cat_image)); ?>" alt="icon-img"></a>
                            </span>
                        </div>
                        <a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>">
                        <img src="<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>" alt="image"></a>
                        <div class="text-center selo">
                            <div class="selo-content">
                                <span class="selo-text"><?php echo e(abs(round(100 - ($data->max_price* 100) / $data->min_price))); ?>%</span>
                            </div>
                        </div>
                    </div>
                    <div class="post_info">
                        <p style="margin-bottom: 0px"><?php echo e(str_limit($data->short_desc,60,'..')); ?></p>
                        <div class="row product-time">
                            <div class="col-xs-6 text-right">
                                <span><del>de:R$<?php echo e($data->min_price); ?></del></span>
                            </div>
                            <div class="col-xs-6 text-left">
                                <span class="">por:R$<?php echo e($data->max_price); ?></span>
                            </div>
                        </div>
                        <div class="row product-time">
                            <div class="col-sm-6 col-sm-offset-6 text-right">
                                <a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>" class="btn btn-oferta btn-sm text-right">Ver Detalhes</a>
                            </div>
                        </div>
                        <div class="post_meta">
                            
                            <?php
                            if ($data->review()->where('addlist_id', '=', $data->id)->first()) {
                                
                                $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
                                $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
                                
                                if ( $ratingCount == 0) { 
                                $ratingCount = 1; 
                                }
                                $totalRating = ($ratingSum / $ratingCount);   
                            }else{
                                $totalRating = 0;
                            }
                            
                        ?>

                        <?php switch(number_format( $totalRating,0)):
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
                            <p class="listing_map_m pull-right"><i class="fa fa-map-marker"></i> <?php echo e($data->city->name); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
        </div>

            <div class="col-md-8 col-md-offset-2" style="padding: 10px 0px;">
                    <?php $__currentLoopData = $A970X90; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank"> 
                      <?php if($v->advert_type == 1): ?>
                      <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>" alt="" />
                      <?php else: ?>
                          <?php echo $v->val; ?>

                      <?php endif; ?>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
            </div>
		
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(".chosen").chosen();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>