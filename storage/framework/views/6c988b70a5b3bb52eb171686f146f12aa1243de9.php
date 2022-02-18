<?php $__env->startSection('style'); ?>
<style type="text/css">
    b{
        float: left;
        margin-right: 5px;
    }
    p{
        margin-top: -5px;
    }
    .fa{
        font-size: 15px;
    }
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-11">
					<h2 class="pull-left">Visualizar Oferta</h2>
                <a href="<?php echo e(URL::previous()); ?>" class=" btn-primary col-md-offset-3" style="background: #38ccff none repeat scroll 0 0;
    border: medium none;
    border-radius: 3px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 700;
    line-height: 30px;
    width: auto;
    padding: 8px 22px;"> <i class="fa fa-arrow-left"></i> Voltar</a>

      <a href="<?php echo e(url('/preview-user-report/'.$AddList->id.'/'.$AddList->slug)); ?>" class="btn btn-info" title="Report"><i class="fa fa-flag"></i> <?php echo e($AddList->reports()->count()); ?></a>
          <a href="<?php echo e(url('/preview-user-review/'.$AddList->id.'/'.$AddList->slug)); ?>" class="btn btn-info" title="Review"><i class="fa fa-comment-o"></i> <?php echo e($AddList->report()->count()); ?></a>
        
				</div>
			</div>
		</div>
     

    <div class="row">			
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Título da oferta : </b> <p><?php echo e($AddList->title); ?></p>
             </div>
        </div>
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Resumo da oferta : </b> <p><?php echo e($AddList->short_desc); ?></p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info">
                        
            <div class="image_slider_wrap">
                <div id="listing_img_slider">
                    <div class="owl-carousel owl-theme">
                       <?php $__currentLoopData = $AddList->CountImage()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="item"><img src="<?php echo e(asset('public/images/'.$d->image)); ?>" alt="image"/></div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>    
                </div>
            </div>
             </div>
        </div>
        


        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Categoria : </b> <p><?php echo e($AddList->cat->name); ?></p>
             </div>
             <div class="add_listing_info col-md-1">
             <b>Cidade :</b> <p><?php echo e($AddList->city->name); ?></p>
             </div>
             <div class="add_listing_info col-md-2">
             <b>CEP :</b> <p><?php echo e($AddList->zip_code); ?></p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Endereço :</b> <p><?php echo e($AddList->address); ?></p>
             </div>
             <div class="add_listing_info col-md-3">
             <b>Telefone :</b> <p><?php echo e($AddList->phone); ?></p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info">
             <b style="float: none;">Descrição :</b> <p style="margin-top: 5px;"><?php echo e($AddList->description); ?></p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2" >
             <b>Preço orginal :</b> <p><?php echo e($AddList->max_price); ?> </p>
             </div>

             <div class="add_listing_info col-md-3">
             <b>Preço da oferta :</b> <p><?php echo e($AddList->min_price); ?> </p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Email :</b> <p><?php echo e($AddList->email); ?> </p>
             </div>
        
             <div class="add_listing_info col-md-3">
             <b>Website :</b> <p><?php echo e($AddList->website); ?> </p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Facebook :</b> <p><?php echo e($AddList->facebook); ?> </p>
             </div> 
			  <div class="add_listing_info col-md-3">
             <b>Instagram :</b> <p><?php echo e($AddList->google); ?> </p>
             </div>
             <!--
			 <div class="add_listing_info col-md-3">
             <b>Linkdin :</b> <p><?php echo e($AddList->linkdin); ?> </p>
             </div>
			 -->
        </div>
        <!--
        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Twitter :</b> <p><?php echo e($AddList->twitter); ?> </p>
             </div>
             <div class="add_listing_info col-md-3">
             <b>Google :</b> <p><?php echo e($AddList->google); ?> </p>
             </div>
        </div>
        -->
        <div class="col-md-12">
            <h3>Dias da Semana </h3>
			<div class="add_listing_info">
             <?php $__currentLoopData = $AddList->totalAmenity()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php   $v = \App\Amenity::where('id',$d->amenities_id)->first(); ?>
                <i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo e($v->name); ?>  <br><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
		</div>
        <!--
        <?php if($AddList->video): ?>
        <div class="col-md-12">
             <div class="add_listing_info">
             <h3>Video</h3>
             <?php echo $AddList->video; ?> 
             </div>
        </div>
        <?php endif; ?>
		
        <div class="col-md-12">
             <div class="add_listing_info">
             <h3>Mapa</h3>
                <?php echo $AddList->location; ?> 
             </div>
        </div>
         -->
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>