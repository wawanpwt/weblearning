<?php
	
	/*---------------------------Highlight color-------------------*/

	$vw_education_academy_first_color = get_theme_mod('vw_education_academy_first_color');

	$vw_education_academy_custom_css = '';

	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='.search-box i, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #slider .view-more:hover, .view-more:hover, .footer .tagcloud a:hover, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .scrollup i, .footer-2, .home-page-header, .pagination span, .pagination a, .sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type="submit"], #comments input[type="submit"].submit, .main-navigation a:hover, #comments a.comment-reply-link, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button .wp-block-button__link:hover{';
			$vw_education_academy_custom_css .='background-color: '.esc_attr($vw_education_academy_first_color).';';
		$vw_education_academy_custom_css .='}';
	}
	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='a, .footer .custom-social-icons i:hover, .footer li a:hover, .post-main-box:hover h2, #about-section span i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_education_academy_custom_css .='color: '.esc_attr($vw_education_academy_first_color).';';
		$vw_education_academy_custom_css .='}';
	}
	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='#slider .view-more:hover, .view-more:hover, #comments input[type="submit"]:hover, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .wp-block-button .wp-block-button__link:hover{';
			$vw_education_academy_custom_css .='border-color: '.esc_attr($vw_education_academy_first_color).';';
		$vw_education_academy_custom_css .='}';
	}
	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='#about-section hr, .post-info hr, .main-navigation ul ul{';
			$vw_education_academy_custom_css .='border-top-color: '.esc_attr($vw_education_academy_first_color).';';
		$vw_education_academy_custom_css .='}';
	}
	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_education_academy_custom_css .='border-bottom-color: '.esc_attr($vw_education_academy_first_color).';';
		$vw_education_academy_custom_css .='}';
	}
	if($vw_education_academy_first_color != false){
		$vw_education_academy_custom_css .='.post-main-box, .sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_attr($vw_education_academy_first_color).';
		}';
	}

	$vw_education_academy_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_education_academy_first_color != false){
			$vw_education_academy_custom_css .='.main-navigation ul li a:hover{
			color:'.esc_attr($vw_education_academy_first_color).'!important;
			}';
		}
	$vw_education_academy_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$vw_education_academy_theme_lay = get_theme_mod( 'vw_education_academy_width_option','Full Width');
    if($vw_education_academy_theme_lay == 'Boxed'){
		$vw_education_academy_custom_css .='body{';
			$vw_education_academy_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='.custom-social-icons{';
			$vw_education_academy_custom_css .='text-align: left;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='#slider .carousel-caption{';
			$vw_education_academy_custom_css .='top: 55%;';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Wide Width'){
		$vw_education_academy_custom_css .='body{';
			$vw_education_academy_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='#slider .carousel-caption{';
			$vw_education_academy_custom_css .='top: 55%;';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Full Width'){
		$vw_education_academy_custom_css .='body{';
			$vw_education_academy_custom_css .='max-width: 100%;';
		$vw_education_academy_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_education_academy_theme_lay = get_theme_mod( 'vw_education_academy_slider_opacity_color','0.5');
	if($vw_education_academy_theme_lay == '0'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.1'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.1';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.2'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.2';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.3'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.3';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.4'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.4';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.5'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.5';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.6'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.6';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.7'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.7';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.8'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.8';
		$vw_education_academy_custom_css .='}';
		}else if($vw_education_academy_theme_lay == '0.9'){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='opacity:0.9';
		$vw_education_academy_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_education_academy_theme_lay = get_theme_mod( 'vw_education_academy_slider_content_option','Center');
    if($vw_education_academy_theme_lay == 'Left'){
		$vw_education_academy_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_academy_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Center'){
		$vw_education_academy_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_academy_custom_css .='text-align:center; left:25%; right:25%;';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Right'){
		$vw_education_academy_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_academy_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_education_academy_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_education_academy_slider_height = get_theme_mod('vw_education_academy_slider_height');
	if($vw_education_academy_slider_height != false){
		$vw_education_academy_custom_css .='#slider img{';
			$vw_education_academy_custom_css .='height: '.esc_attr($vw_education_academy_slider_height).';';
		$vw_education_academy_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_education_academy_slider = get_theme_mod('vw_education_academy_slider_hide_show');
	if($vw_education_academy_slider == false){
		$vw_education_academy_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_education_academy_custom_css .='position: static; background: #ffbc00; padding-bottom: 6em;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='.page-template-custom-home-page #about-section{';
			$vw_education_academy_custom_css .='padding: 0;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='#topbar{';
			$vw_education_academy_custom_css .='padding: 30px 0 35px;';
		$vw_education_academy_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_education_academy_theme_lay = get_theme_mod( 'vw_education_academy_blog_layout_option','Default');
    if($vw_education_academy_theme_lay == 'Default'){
		$vw_education_academy_custom_css .='.post-main-box{';
			$vw_education_academy_custom_css .='';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Center'){
		$vw_education_academy_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_education_academy_custom_css .='text-align:center;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='.post-info{';
			$vw_education_academy_custom_css .='margin-top:10px;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='.post-info hr{';
			$vw_education_academy_custom_css .='margin:15px auto;';
		$vw_education_academy_custom_css .='}';
	}else if($vw_education_academy_theme_lay == 'Left'){
		$vw_education_academy_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_education_academy_custom_css .='text-align:Left;';
		$vw_education_academy_custom_css .='}';
		$vw_education_academy_custom_css .='.post-info hr{';
			$vw_education_academy_custom_css .='margin-bottom:10px;';
		$vw_education_academy_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_education_academy_resp_slider = get_theme_mod( 'vw_education_academy_resp_slider_hide_show',false);
    if($vw_education_academy_resp_slider == true){
    	$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='#slider{';
			$vw_education_academy_custom_css .='display:block;';
		$vw_education_academy_custom_css .='} }';
	}else if($vw_education_academy_resp_slider == false){
		$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='#slider{';
			$vw_education_academy_custom_css .='display:none;';
		$vw_education_academy_custom_css .='} }';
	}

	$vw_education_academy_resp_metabox = get_theme_mod( 'vw_education_academy_metabox_hide_show',true);
    if($vw_education_academy_resp_metabox == true){
    	$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.post-info{';
			$vw_education_academy_custom_css .='display:block;';
		$vw_education_academy_custom_css .='} }';
	}else if($vw_education_academy_resp_metabox == false){
		$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.post-info{';
			$vw_education_academy_custom_css .='display:none;';
		$vw_education_academy_custom_css .='} }';
	}

	$vw_education_academy_resp_sidebar = get_theme_mod( 'vw_education_academy_sidebar_hide_show',true);
    if($vw_education_academy_resp_sidebar == true){
    	$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.sidebar{';
			$vw_education_academy_custom_css .='display:block;';
		$vw_education_academy_custom_css .='} }';
	}else if($vw_education_academy_resp_sidebar == false){
		$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.sidebar{';
			$vw_education_academy_custom_css .='display:none;';
		$vw_education_academy_custom_css .='} }';
	}

	$vw_education_academy_resp_scroll_top = get_theme_mod( 'vw_education_academy_resp_scroll_top_hide_show',true);
    if($vw_education_academy_resp_scroll_top == true){
    	$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='display:block;';
		$vw_education_academy_custom_css .='} }';
	}else if($vw_education_academy_resp_scroll_top == false){
		$vw_education_academy_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='display:none !important;';
		$vw_education_academy_custom_css .='} }';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_education_academy_search_padding_top_bottom = get_theme_mod('vw_education_academy_search_padding_top_bottom');
	$vw_education_academy_search_padding_left_right = get_theme_mod('vw_education_academy_search_padding_left_right');
	$vw_education_academy_search_font_size = get_theme_mod('vw_education_academy_search_font_size');
	$vw_education_academy_search_border_radius = get_theme_mod('vw_education_academy_search_border_radius');
	if($vw_education_academy_search_padding_top_bottom != false || $vw_education_academy_search_padding_left_right != false || $vw_education_academy_search_font_size != false || $vw_education_academy_search_border_radius != false){
		$vw_education_academy_custom_css .='.search-box i{';
			$vw_education_academy_custom_css .='padding-top: '.esc_attr($vw_education_academy_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_education_academy_search_padding_top_bottom).';padding-left: '.esc_attr($vw_education_academy_search_padding_left_right).';padding-right: '.esc_attr($vw_education_academy_search_padding_left_right).';font-size: '.esc_attr($vw_education_academy_search_font_size).';border-radius: '.esc_attr($vw_education_academy_search_border_radius).'px;';
		$vw_education_academy_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_education_academy_button_padding_top_bottom = get_theme_mod('vw_education_academy_button_padding_top_bottom');
	$vw_education_academy_button_padding_left_right = get_theme_mod('vw_education_academy_button_padding_left_right');
	if($vw_education_academy_button_padding_top_bottom != false || $vw_education_academy_button_padding_left_right != false){
		$vw_education_academy_custom_css .='.post-main-box .view-more{';
			$vw_education_academy_custom_css .='padding-top: '.esc_attr($vw_education_academy_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_education_academy_button_padding_top_bottom).';padding-left: '.esc_attr($vw_education_academy_button_padding_left_right).';padding-right: '.esc_attr($vw_education_academy_button_padding_left_right).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_button_border_radius = get_theme_mod('vw_education_academy_button_border_radius');
	if($vw_education_academy_button_border_radius != false){
		$vw_education_academy_custom_css .='.post-main-box .view-more{';
			$vw_education_academy_custom_css .='border-radius: '.esc_attr($vw_education_academy_button_border_radius).'px;';
		$vw_education_academy_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_education_academy_single_blog_post_navigation_show_hide = get_theme_mod('vw_education_academy_single_blog_post_navigation_show_hide',true);
	if($vw_education_academy_single_blog_post_navigation_show_hide != true){
		$vw_education_academy_custom_css .='.post-navigation{';
			$vw_education_academy_custom_css .='display: none;';
		$vw_education_academy_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_education_academy_copyright_alingment = get_theme_mod('vw_education_academy_copyright_alingment');
	if($vw_education_academy_copyright_alingment != false){
		$vw_education_academy_custom_css .='.copyright p{';
			$vw_education_academy_custom_css .='text-align: '.esc_attr($vw_education_academy_copyright_alingment).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_copyright_padding_top_bottom = get_theme_mod('vw_education_academy_copyright_padding_top_bottom');
	if($vw_education_academy_copyright_padding_top_bottom != false){
		$vw_education_academy_custom_css .='.footer-2{';
			$vw_education_academy_custom_css .='padding-top: '.esc_attr($vw_education_academy_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_education_academy_copyright_padding_top_bottom).';';
		$vw_education_academy_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_education_academy_scroll_to_top_font_size = get_theme_mod('vw_education_academy_scroll_to_top_font_size');
	if($vw_education_academy_scroll_to_top_font_size != false){
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='font-size: '.esc_attr($vw_education_academy_scroll_to_top_font_size).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_scroll_to_top_padding = get_theme_mod('vw_education_academy_scroll_to_top_padding');
	$vw_education_academy_scroll_to_top_padding = get_theme_mod('vw_education_academy_scroll_to_top_padding');
	if($vw_education_academy_scroll_to_top_padding != false){
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='padding-top: '.esc_attr($vw_education_academy_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_education_academy_scroll_to_top_padding).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_scroll_to_top_width = get_theme_mod('vw_education_academy_scroll_to_top_width');
	if($vw_education_academy_scroll_to_top_width != false){
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='width: '.esc_attr($vw_education_academy_scroll_to_top_width).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_scroll_to_top_height = get_theme_mod('vw_education_academy_scroll_to_top_height');
	if($vw_education_academy_scroll_to_top_height != false){
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='height: '.esc_attr($vw_education_academy_scroll_to_top_height).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_scroll_to_top_border_radius = get_theme_mod('vw_education_academy_scroll_to_top_border_radius');
	if($vw_education_academy_scroll_to_top_border_radius != false){
		$vw_education_academy_custom_css .='.scrollup i{';
			$vw_education_academy_custom_css .='border-radius: '.esc_attr($vw_education_academy_scroll_to_top_border_radius).'px;';
		$vw_education_academy_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_education_academy_social_icon_font_size = get_theme_mod('vw_education_academy_social_icon_font_size');
	if($vw_education_academy_social_icon_font_size != false){
		$vw_education_academy_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_education_academy_custom_css .='font-size: '.esc_attr($vw_education_academy_social_icon_font_size).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_social_icon_padding = get_theme_mod('vw_education_academy_social_icon_padding');
	if($vw_education_academy_social_icon_padding != false){
		$vw_education_academy_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_education_academy_custom_css .='padding: '.esc_attr($vw_education_academy_social_icon_padding).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_social_icon_width = get_theme_mod('vw_education_academy_social_icon_width');
	if($vw_education_academy_social_icon_width != false){
		$vw_education_academy_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_education_academy_custom_css .='width: '.esc_attr($vw_education_academy_social_icon_width).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_social_icon_height = get_theme_mod('vw_education_academy_social_icon_height');
	if($vw_education_academy_social_icon_height != false){
		$vw_education_academy_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_education_academy_custom_css .='height: '.esc_attr($vw_education_academy_social_icon_height).';';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_social_icon_border_radius = get_theme_mod('vw_education_academy_social_icon_border_radius');
	if($vw_education_academy_social_icon_border_radius != false){
		$vw_education_academy_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_education_academy_custom_css .='border-radius: '.esc_attr($vw_education_academy_social_icon_border_radius).'px;';
		$vw_education_academy_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_education_academy_related_product_show_hide = get_theme_mod('vw_education_academy_related_product_show_hide',true);
	if($vw_education_academy_related_product_show_hide != true){
		$vw_education_academy_custom_css .='.related.products{';
			$vw_education_academy_custom_css .='display: none;';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_products_padding_top_bottom = get_theme_mod('vw_education_academy_products_padding_top_bottom');
	if($vw_education_academy_products_padding_top_bottom != false){
		$vw_education_academy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_education_academy_custom_css .='padding-top: '.esc_attr($vw_education_academy_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_education_academy_products_padding_top_bottom).'!important;';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_products_padding_left_right = get_theme_mod('vw_education_academy_products_padding_left_right');
	if($vw_education_academy_products_padding_left_right != false){
		$vw_education_academy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_education_academy_custom_css .='padding-left: '.esc_attr($vw_education_academy_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_education_academy_products_padding_left_right).'!important;';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_products_box_shadow = get_theme_mod('vw_education_academy_products_box_shadow');
	if($vw_education_academy_products_box_shadow != false){
		$vw_education_academy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_education_academy_custom_css .='box-shadow: '.esc_attr($vw_education_academy_products_box_shadow).'px '.esc_attr($vw_education_academy_products_box_shadow).'px '.esc_attr($vw_education_academy_products_box_shadow).'px #ddd;';
		$vw_education_academy_custom_css .='}';
	}

	$vw_education_academy_products_border_radius = get_theme_mod('vw_education_academy_products_border_radius');
	if($vw_education_academy_products_border_radius != false){
		$vw_education_academy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_education_academy_custom_css .='border-radius: '.esc_attr($vw_education_academy_products_border_radius).'px;';
		$vw_education_academy_custom_css .='}';
	}