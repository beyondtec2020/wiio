<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="">
    <meta name="description" content=" <?php echo e($data->short_desc); ?>">
    <meta property="og:title" content="<?php echo e($data->title); ?>"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <?php $metaimg = $data->CountImage()->get(); ?>
    <?php $__currentLoopData = $metaimg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:image" content="<?php echo e(asset('public/images/'.$v->image)); ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <meta name="description" content="<?php echo e($data->title); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/singlePost.css')); ?>" type="text/css">
    <style type="text/css">
        .style2_header {
            /*background-image:url(
        <?php echo e(asset('public/assets/images/listing_img2.jpg')); ?> );*/
            background-image: url(<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>);
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sub-title'); ?>
    | <?php echo e($data->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>

    <!-- Listing-detail-Header -->
    <section class="listing_detail_header style2_header parallex-bg" id="spost">
        <div class="container">
            <div class="div_zindex white-text">
                <div class="row">
                    <div class="col-md-7">
                        <h1><?php echo e($data->title); ?></h1>
                        <p><?php echo e($data->short_desc); ?></p>
                        <div class="listing_rating">
                            <p><span class="review_score">
                        <?php
                                    if ($data->review()->where('addlist_id', '=', $data->id)->first()) {

                                        $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
                                        $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
                                        if ($ratingCount == 0) {
                                            $ratingCount = 1;
                                        }
                                        $totalRating = ($ratingSum / $ratingCount);
                                    } else {
                                        $totalRating = 0;
                                    }

                                    ?> <?php echo e(number_format( $totalRating,1)); ?>/5</span>

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
               (<?php echo e($data->review()->count('id')); ?> Comentários) </p>
                            <!-- <p class="listing_like"><a href="#"><i class="fa fa-heart-o"></i> 5 Likes</a></p> -->
                            <form action="<?php echo e(url('/add-to-favourite')); ?>" method="post" style="display: inline-block;">
                                <?php echo e(csrf_field()); ?>

                                <p class="listing_favorites">
                                    <!-- <a href="" ><i class="fa fa-bookmark-o"></i> Add to favorites</a> -->
                                    <input type="hidden" name="postId" value="<?php echo e($data->id); ?>">
                                    <?php if(Sentinel::getUser()): ?>
                                        <input type="hidden" name="UserID" value="<?php echo e(Sentinel::getUser()->id); ?>">
                                    <?php endif; ?>
                                    <button type="submit" class="" style="background: transparent;border: transparent;">
                                        <i class="fa fa-bookmark-o"></i> Adicionar aos favoritos
                                    </button>
                                </p>
                            </form>


                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="pricing_info">
                            <p class="listing_price">
                                <span><del>deR$ </del></span>
                                <del><?php echo e(number_format($data->min_price, 2, ",","")); ?></del>
                                -
                                <span>porR$</span> <?php echo e(number_format($data->max_price, 2, ",", "")); ?>

                            </p>
                            <div class="listing_message">
                                <?php if(!Sentinel::getUser()): ?>
                                    <a href="<?php echo e(url('/login')); ?>?redirect_to=<?php echo e(urlencode(Request::url())); ?>" class="btn">
                                        <i class="fa fa-envelope-o"></i> Gerar Cupom
                                    </a>
                                <?php else: ?>
                                    
                                    <button class="btn" id="generateCoupon" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Please wait ...">
                                        <i class="fa fa-envelope-o"></i> Gerar Cupom
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>
    <!-- /Listing-detail-Header -->

    <!-- Listings -->
    <section class="listing_info_wrap listing_detail_2">
        <div class="container">
            <div class="sidebar_wrap listing_action_btn">
                <ul>
                    <li><a data-toggle="modal" data-target="#share_modal"><i class="fa fa-share-alt"></i>
                            Compartilhar</a></li>
                    <li><a data-toggle="modal" data-target="#email_friends_modal"><i class="fa fa-envelope-o"></i>Envie
                            para amigos</a></li>
                    <li><a href="#writereview" class="js-target-scroll"> <i class="fa fa-star"></i> Avaliações</a></li>
                    <?php if(Sentinel::getUser()): ?>
                        <?php  $checkReport = App\Report::where('user_id', Sentinel::getUser()->id)->where('addlist_id', $data->id)->first(); ?>
                        <?php if(!$checkReport): ?>
                            <li><a data-toggle="modal" data-target="#report_modal" bootstrap-modal-form-open><i
                                            class="fa fa-exclamation-triangle"></i> Reportar</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a data-toggle="modal" data-target="#report_modal_login" bootstrap-modal-form-open><i
                                        class="fa fa-exclamation-triangle"></i> Reportar</a></li>
                    <?php endif; ?>
                </ul>
            </div>


            <div class="row">
                <div class="col-md-8">

                    <div class="image_slider_wrap">
                        <div id="listing_img_slider2">
                            <div class="owl-carousel owl-theme">
                                <?php $__currentLoopData = $data->CountImage()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e(asset('public/images/'.$d->image)); ?>" alt="image">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php if($data->location != null): ?>
                            <div class="view_map">
                                <a href="#single_map" class="js-target-scroll"><i class="fa fa-map-marker"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>


                    <?php if($data->video != null): ?>
                        <div class="section-padding  ">
                            <div class="widget_title">
                                <h4>Watch Video</h4>
                            </div>
                            <div class="listing_video videoWrapper">
                                <?php echo $data->video; ?>

                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="listinghub_detail">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#description" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa  fa-file-text-o"></i> Detalhes da Oferta</a>
                                        </a>
                                    </h4>
                                </div>
                                <div id="description" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p><?php echo $data->description; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#amenities" aria-expanded="false"
                                           aria-controls="collapseTwo"><i class="fa fa-align-left"></i> Dias Da
                                            Semana</a>
                                    </h4>
                                </div>
                                <div id="amenities" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul>
                                            <?php $__currentLoopData = $data->totalAmenity()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php   $v = \App\Amenity::where('id', $d->amenities_id)->first(); ?>
                                                <?php if($v != null): ?>
                                                    <li><a href="#"> <i class="fa fa-check-square"></i> <?php echo e($v->name); ?>

                                                        </a></li><?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Listing-Map -->
                        <?php if($data->location != null ): ?>
                            <div id="single_map">
                                <div class="widget_title">
                                    <h4>Mapa</h4>
                                </div>
                                <div id="singleListingMap-container">
                                    <div class="map-responsive">
                                        <?php echo $data->location; ?>

                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                    <!-- /Listing-Map -->

                        <!-- Review-List -->
                        <div class="reviews_list">
                            <?php $count = $data->review()->count()?>
                            <?php if($count != 0): ?>
                                <div class="widget_title">
                                    <h4><span> <?php echo e($count); ?> Avaliações </span></h4>
                                </div>
                            <?php endif; ?>

                            <?php $reviews = $data->review()->paginate(2); ?>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="review_wrap">
                                    <div class="review_author">
                                        <?php $user = \App\User::where('id', $v->user_id)->first(); ?>

                                        <?php if($user->profile == null): ?>
                                            <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" alt="image">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" alt="image">
                                        <?php endif; ?>
                                        <figcaption>
                                            <h6><a style=""><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></h6>
                                        </figcaption>

                                    </div>
                                    <div class="review_detail">
                                        <h5><?php echo e($v->title); ?></h5>
                                        <p><?php echo e($v->description); ?></p>
                                        <div class="listing_rating">
                                            <p><span class="review_score">
                                        <?php if($v->rating ==null): ?>0
                                                    <?php else: ?>
                                                        <?php echo e($v->rating); ?>

                                                    <?php endif; ?>/ 5</span>
                                                <?php switch($v->rating):
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
                                            <p><i class="fa fa-clock-o"></i> <?php echo e($v->created_at->toDayDateTimeString()); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <!-- /Review-List -->

                        <!-- Review-Form -->
                        <div id="writereview" class="review_form">
                            <?php if(Sentinel::getUser()): ?>

                                <?php  $checkData = App\Review::where('user_id', Sentinel::getUser()->id)->where('addlist_id', $data->id)->first(); ?>

                                <?php if(!$checkData) {?>
                                <div class="widget_title">
                                    <h4>Faça uma avaliação </h4>
                                </div>
                                <form action="<?php echo e(url('/review-post')); ?>" method="post" data-toggle="validator"
                                      id="reviewForm">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="postId" value="<?php echo e($data->id); ?>">
                                    <div class="form-group">
                                        <label class="form-label">Sua avaliação para este anúncio</label>
                                        <div class="listing_rating">
                                            <input name="rating" id="rating-1" value="5" type="radio">
                                            <label for="rating-1" class="fa fa-star"></label>
                                            <input name="rating" id="rating-2" value="4" type="radio">
                                            <label for="rating-2" class="fa fa-star"></label>
                                            <input name="rating" id="rating-3" value="3" type="radio">
                                            <label for="rating-3" class="fa fa-star"></label>
                                            <input name="rating" id="rating-4" value="2" type="radio">
                                            <label for="rating-4" class="fa fa-star"></label>
                                            <input name="rating" id="rating-5" value="1" type="radio">
                                            <label for="rating-5" class="fa fa-star"></label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="userId" value="<?php echo e(Sentinel::getUser()->id); ?>">

                                    <div class="form-group <?php echo e($errors->has('title') ?'has-error':''); ?>">
                                        <label class="form-label">Título</label>
                                        <input name="title" type="text" placeholder="Título da sua avaliação"
                                               class="form-control" id="inputName" data-error="maximum of 80 characters"
                                               required>
                                        <div class="help-block with-errors"></div>
                                        <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Avaliação</label>
                                        <textarea name="review" cols="" rows="" class="form-control"
                                                  placeholder="Fala da sua experiência"
                                                  data-error="Please enter Your Experience." id="inputName"
                                                  required></textarea>

                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-block" value="Regitrar Avaliação">
                                    </div>
                                </form>
                                <?php } ?>
                            <?php else: ?>

                                <div class="panel panel-login">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="#" class="active" id="login-form-link">Entre com a sua
                                                    conta</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form id="login-form" action="<?php echo e(url('/login-review')); ?>" method="post"
                                                      role="form" style="display: block;" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                                        <input type="email" name="email" id="email" tabindex="1"
                                                               class="form-control" placeholder="Email">
                                                        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                                                    </div>
                                                    <div class="form-group<?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                                        <input type="password" name="password" id="password"
                                                               tabindex="2" class="form-control" placeholder="Senha">
                                                        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                                                    </div>
                                                    <?php if(session('error')): ?>
                                                        <div class="alert alert-danger">
                                                            <strong><?php echo e(session('error')); ?></strong>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">
                                                                <input type="submit" name="login-submit"
                                                                       id="login-submit" tabindex="4"
                                                                       class="form-control btn btn-login btn-block"
                                                                       value="Entrar">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-3"><a href="<?php echo e(url('/forgot-password')); ?>"
                                                                                     tabindex="5"
                                                                                     class="forgot-password">Esqueceu
                                                                    Senha?</a>
                                                            </div>
                                                            <div class="col-lg-6">Caso não tem uma conta?
                                                                <a href="<?php echo e(url('/register')); ?>" tabindex="5"
                                                                   class="forgot-password"> Cadastre-se</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Review-Form -->

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="listinghub_sidebar">
                        <div class="sidebar_wrap listing_contact_info">
                            <div class="widget_title">
                                <h6>Contato</h6>
                            </div>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><?php echo e($data->address); ?> <br>
                                    PO Box : <?php echo e($data->zip_code); ?>, <?php echo e($data->city->name); ?>

                                </li>
                                <li><i class="fa fa-phone"></i> <a href=""><?php echo e($data->phone); ?></a></li>
                                <?php if($data->email != null): ?>
                                    <li><i class="fa fa-envelope"></i> <a
                                                href="mailto:<?php echo e($data->email); ?>"><?php echo e($data->email); ?></a></li><?php endif; ?>

                                <?php if($data->website != null): ?>
                                    <li><i class="fa fa-link"></i> <a href="<?php echo e($data->website); ?>"
                                                                      target="_blank"><?php echo e($data->website); ?></a></li><?php endif; ?>
                            </ul>
                            <div class="social_links">
                                <?php if($data->facebook != null): ?>
                                    <a href="<?php echo e($data->facebook); ?>" class="facebook_link" target="_blank"><i
                                                class="fa fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if($data->linkdin != null): ?>
                                    <a href="<?php echo e($data->linkdin); ?>" class="linkedin_link" target="_blank"><i
                                                class="fa fa-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if($data->twitter != null): ?>
                                    <a href="<?php echo e($data->twitter); ?>" class="twitter_link" target="_blank"><i
                                                class="fa fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if($data->google != null): ?>
                                    <a href="<?php echo e($data->google); ?>" class="google_plus_link" target="_blank"><i
                                                class="fa fa-google-plus"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="" style="padding-bottom: 20px;">
                            <?php $__currentLoopData = $A300X250; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank">
                                    <?php if($v->advert_type == 1): ?>
                                        <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>"
                                             alt="" class="img-responsive"/>
                                    <?php else: ?>
                                        <?php echo $v->val; ?>

                                    <?php endif; ?>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="sidebar_wrap ">
                            <div class="widget_title">
                                <h4>Categorias</h4>
                            </div>
                            <div class="listing_video">
                                <ul>
                                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('/single-category/'.$dat->id.'/'.$dat->slug)); ?>"><?php echo e($dat->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <div class="" style="padding-bottom: 20px;">
                            <?php $__currentLoopData = $A970X250; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank">
                                    <?php if($v->advert_type == 1): ?>
                                        <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>"
                                             alt="" class="img-responsive"/>
                                    <?php else: ?>
                                        <?php echo $v->val; ?>

                                    <?php endif; ?>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="" style="padding-bottom: 0px">
                            <div class="widget_title">
                                <h4>Últimos Anúncios</h4>
                            </div>
                            <div id="latest_listing_slider">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="post_wrap">
                                            <div class="text-center">
                                                <h6>
                                                    <a href="<?php echo e(url('/single-post/'.$da->id.'/'.$da->slug)); ?>"><?php echo e(str_limit($da->title,25,'..')); ?></a>
                                                </h6>
                                            </div>
                                            <div class="post_img">
                                                <div class="listing_cate">
                                                    <span class="cate_icon">
                                                        <a href="<?php echo e(url('/single-category/'.$da->cat->id.'/'.$da->cat->slug)); ?>">
                                                        <img src="<?php echo e(asset('public/images/'.$da->cat->cat_image)); ?>"
                                                             alt="icon-img"></a>
                                                    </span>
                                                </div>
                                                <a href="<?php echo e(url('/single-post/'.$da->id.'/'.$da->slug)); ?>">
                                                    <img src="<?php echo e(asset('public/images/'.$da->CountImage()->first()->image)); ?>"
                                                         alt="image"></a>
                                                <div class="text-center selo">
                                                    <div class="selo-content">
                                                        <span class="selo-text"><?php echo e(abs(round(100 - ($da->max_price* 100) / $da->min_price))); ?>

                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_info">
                                                <p style="margin-bottom: 0px"><?php echo e(str_limit($da->short_desc,60,'..')); ?></p>
                                                <div class="row product-time">
                                                    <div class="col-sm-6 text-right">
                                                        <span><del>de:R$<?php echo e(round($da->min_price)); ?></del></span>
                                                    </div>
                                                    <div class="col-sm-6 text-left">
                                                        <span class="">por:R$<?php echo e(round($da->max_price)); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row product-time">
                                                    <div class="col-sm-6 col-sm-offset-6 text-right">
                                                        <a href="<?php echo e(url('/single-post/'.$da->id.'/'.$da->slug)); ?>"
                                                           class="btn btn-oferta btn-sm text-right">Ver Detalhes</a>
                                                    </div>
                                                </div>
                                                <div class="post_meta">

                                                    <?php
                                                    if ($da->review()->where('addlist_id', '=', $da->id)->first()) {

                                                        $ratingCount = $da->review()->where('rating', '!=', 0)->count('rating');
                                                        $ratingSum = $da->review()->where('rating', '!=', 0)->sum('rating');

                                                        if ($ratingCount == 0) {
                                                            $ratingCount = 1;
                                                        }
                                                        $totalRating = ($ratingSum / $ratingCount);
                                                    } else {
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
                                                    <p class="listing_map_m pull-right"><i
                                                                class="fa fa-map-marker"></i> <?php echo e($da->city->name); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="" style="padding-bottom: 20px;">
                            <?php $__currentLoopData = $A300X600; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank">
                                    <?php if($v->advert_type == 1): ?>
                                        <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>"
                                             alt="" class="img-responsive"/>
                                    <?php else: ?>
                                        <?php echo $v->val; ?>

                                    <?php endif; ?>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /Sidebar -->
        </div>
        </div>
    </section>
    <!-- /Listings -->


    <!-- Share-Listing -->
    <div id="share_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h3 class="modal-title">Share Listing</h3>
                </div>
                <div class="modal-body">
                    <div class="share_listing">
                        <div data-easyshare data-easyshare-url="<?php echo e(Request::fullUrl()); ?>">
                            <!-- Twitter -->
                            <a data-easyshare-button="twitter" data-easyshare-tweet-text="" style="cursor: pointer;"><i
                                        class="fa fa-twitter"></i></a>
                            <!-- Facebook -->
                            <a data-easyshare-button="facebook" style="cursor: pointer;"><i class="fa fa-facebook"></i></a>
                            <!-- Google+ -->
                            <a data-easyshare-button="google" style="cursor: pointer;"><i class="fa fa-google-plus"></i></a>
                            <!-- LinkedIn -->
                            <a data-easyshare-button="linkedin" style="cursor: pointer;"><i class="fa fa-linkedin"></i></a>
                            <div data-easyshare-loader>Loading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Share-Listing -->

    <!-- Email-to-Friends -->
    <div id="email_friends_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h3 class="modal-title">Email to Friend</h3>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('/share-with-email')); ?>" method="post" data-toggle="validator" role="form">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" name="name" placeholder="Your Name" type="text"
                                   data-error="Please enter name field." required="">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="ownEmail" placeholder="Your Email Address" type="email"
                                   required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="friendEmail" placeholder="Friend Email Address"
                                   type="email" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="url" value="<?php echo e(Request::fullUrl()); ?>">
                        <div class="form-group">
                            <textarea rows="4" class="form-control" name="message" placeholder="Message"
                                      required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input value="Submit" class="btn btn-block" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Email-to-Friends -->

    <!-- Report -->
    <div id="report_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h3 class="modal-title">Report This Listing</h3>
                    <p>Please indicate what problem has been found!</p>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('/report-post')); ?>" method="post" data-toggle="validator" role="form">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="postId" value="<?php echo e($data->id); ?>">
                        <?php if(Sentinel::getUser()): ?>
                            <input type="hidden" name="userId" value="<?php echo e(Sentinel::getUser()->id); ?>">
                        <?php endif; ?>
                        <div class="form-group ">
                            <div class="radio">
                                <input type="radio" name="report_type" value="1" id="RadioGroup1_0" checked>
                                <label for="RadioGroup1_0">Duplicate Listing</label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="report_type" value="2" id="RadioGroup1_1">
                                <label for="RadioGroup1_1">Wrong Contact Info </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="report_type" value="3" id="RadioGroup1_2">
                                <label for="RadioGroup1_2">Fake Listing</label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="report_type" value="4" id="RadioGroup1_2">
                                <label for="RadioGroup1_2">Other Problem</label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <textarea rows="4" name="problem_desc" id="inputName" data-error="Please enter your report"
                                      class="form-control" placeholder="Problem Description" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input value="Submit" class="btn btn-block" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Report -->

    <!-- Report -->
    <div id="report_modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h3 class="modal-title">Sign In</h3>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('/login-review')); ?>" method="post" data-toggle="validator">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                        </div>

                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <input type="password" name="password" class="form-control" placeholder="Senha">
                            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <input value="Submit" class="btn btn-block" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Report -->

    <!-- Send-Message -->
    <div id="message_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h3 class="modal-title">Enviar Mensagem</h3>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('/send-to-publisher')); ?>" method="post" data-toggle="validator" role="form">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="text" class="form-control" data-error="Please enter name field." name="name"
                                   placeholder="Nome" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="addId" value="<?php echo e($data->id); ?>">
                        <input type="hidden" name="url" value="<?php echo e(Request::fullUrl()); ?>">
                        <input type="hidden" name="userId" value="<?php echo e($data->user_id); ?>">
                        <div class="form-group">
                            <textarea rows="4" class="form-control" name="message" placeholder="Mensgaem"
                                      data-error="Please enter message field." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input value="Send Message" class="btn btn-block" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Send-Message -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="<?php echo e(asset('public/assets/js/jquery.kyco.easyshare.js')); ?>"></script>

    <script type="text/javascript">
        $('#spost').load('/single-post', function () {
            $(this).show();
            $("#listing_banner").hide();
        });

        $.each($('.advanced [data-easyshare-button-count] + [data-easyshare-loader]'), function (i, e) {
            var el = $(e);
            var done = false;
            var attr = el.prev().attr('data-easyshare-button-count')
            var target = document.querySelector('.advanced [data-easyshare-button-count="' + attr + '"] + [data-easyshare-loader]');
            var startDate = new Date().getTime() / 1000;
            var endDate;

            var observer = new MutationObserver(function (mutations) {
                if (!done) {
                    done = true;
                    endDate = new Date().getTime() / 1000;
                    el.after('Loaded in roughly ', (endDate - startDate).toFixed(2), 's');
                }
            });

            observer.observe(target, {
                attributes: true
            });
        });

        $(document).ready(function () {
            $("body").on("click", "#generateCoupon", generateCouponClickHandler);
        });

        function generateCouponClickHandler(e) {
            var $this = $(this);
            var ans = confirm("Confirma à geração do cupom?");

            if (ans) {
                $this.button('loading');
                $.ajax({
                    url: "<?php echo e(route('generate-coupon')); ?>",
                    type: "post",
                    data: {
                        'offer_id': "<?php echo e(Request::segment(2)); ?>"
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                        }

                        $this.button('reset');
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>