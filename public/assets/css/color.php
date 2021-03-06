<?php
header ("Content-Type:text/css");
$color = "#ff0000"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#" . $_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#ff0000";
}

?>


a, .outline-btn, .btn-link, .owl-nav > div:hover:after,
header .navbar-default .navbar-nav li.active a, header .navbar-default .navbar-nav li.active a:hover,header .navbar-default .navbar-nav li.active a:focus, 
header #navigation .navbar-default .navbar-nav li ul.sub-menu li a:hover, header #navigation .navbar-default .navbar-nav li ul.children li a:hover, 
.navbar.navbar-default #navigation .nav.navbar-nav li > a:hover, .listing_info a:hover, .post_category a, .post_info a:hover, .footer_nav ul li a:hover, .icon_div, .plan_price, .office_info_box a:hover, .meta_m .fa, .meta_m a:hover, .sidebar_widgets ul li a:hover, .entry-desc h3 a:hover, .info_m h6 a:hover, .comment-meta.commentmetadata a:hover, 
.listing_price span, p.listing_like .fa, .listing_favorites .fa, .listing_favorites a:hover, .listing_favorites a:focus, p.listing_favorites .fa, p.listing_favorites a:hover, p.listing_favorites a:focus, p.listing_like a:hover, p.listing_like a:focus, .city_panel .city_content i, .footer_contact ul li a:hover, .header_style3 .dashboard_menu > li > a:hover{
  color:<?php echo $color; ?> ;
  fill: <?php echo $color; ?> ;
}
a:hover, a:focus, #amenities ul li a:hover, .btn-link:focus, .btn-link:hover {
  color:#191919;
  fill: #191919
}
.btn, .primary-bg, .owl-dots .owl-dot.active span, .owl-dots .owl-dot:hover span, .header_solidbg .submit_listing .btn, #category_slider .item:hover, .review_score, .like_post:hover, .featured_label, .listing_cate span.listing_like, .post_category a:hover, .follow_us ul li a:hover, .category_listing_n, .layout-switcher a.active, .layout-switcher a:hover, .widget_title::after, .post_tag a:hover, #view_map:hover, .demo_changer .demo-icon, 
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover, .header_style2 .submit_listing .btn.outline-btn, .member_social_info ul li a:hover, .top_quote i, .bottom_quote i, .top_quote:before, .bottom_quote:before, .header_style3 .submit_listing .btn.outline-btn{
  background:<?php echo $color; ?> ;
  fill: <?php echo $color; ?> ;
}
.btn:hover, .btn:focus, .social_links a, .header_style2 .submit_listing .btn.outline-btn:hover, .header_style3 .submit_listing .btn.outline-btn:hover{
  background-color:#191919;
  fill: #191919;
}
.outline-btn, .owl-dots .owl-dot.active span, .owl-dots .owl-dot:hover span, .header_solidbg .submit_listing .btn, .post_category a, #view_map:hover:after, #view_map:hover:before, .listing_favorites .fa, p.listing_like .fa, .share_listing a, .submit_listing .btn:hover, .marker-container:hover .face.front, .clicked .marker-container .face.front, .header_style2 .submit_listing .btn.outline-btn, .city_panel .city_content i, .member_social_info ul li a:hover{
	border-color:<?php echo $color; ?> ;
}
.form-control:focus, form input:focus, form textarea:focus, form select:focus {
	outline-color:<?php echo $color; ?> ;
}
.post_category a {
  color:<?php echo $color; ?>  !important;
  fill: <?php echo $color; ?> ;
}
#category_slider p ,
.listing_header h5{
    color: <?php echo $color; ?>;
}
.primary-bg{
  
}
.marker-arrow {
	border-top-color:<?php echo $color; ?> ;
}
.timer-panel:hover .timer-panel-inner{
    background:<?php echo $color; ?>;
}
.bottom-line::after {
    border: 3px solid <?php echo $color; ?>;
}
.half-row .half-div.color {
    background-color: <?php echo $color; ?>;
}
.timer-panel:hover .timer-panel-inner{
	background:<?php echo $color; ?>;
}
.form-subscribe.alt .btn-submit {
  background-color:<?php echo $color; ?>;
}
.totop a {
background-color: <?php echo $color; ?>;
}
.totop a:hover {
background-color: #ef2727;
}