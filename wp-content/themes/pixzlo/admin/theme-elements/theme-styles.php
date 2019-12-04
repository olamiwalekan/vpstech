<?php
if( !class_exists( "PixzloThemeStyles" ) ){
	require_once PIXZLO_INC . '/theme-class/theme-style-class.php';
}
$ats = new PixzloThemeStyles;
echo "
/*
 * Pixzlo theme custom style
 */\n\n";
$pixzlo_options = get_option( 'pixzlo_options' );
echo "\n/* General Styles */\n";
$ats->pixzlo_custom_font_check( 'body-typography' );
echo 'body{';
	$ats->pixzlo_typo_generate( 'body-typography' );
	$ats->pixzlo_bg_settings( 'body-background' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h1-typography' );
echo 'h1{';
	$ats->pixzlo_typo_generate( 'h1-typography' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h2-typography' );
echo 'h2{';
	$ats->pixzlo_typo_generate( 'h2-typography' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h3-typography' );
echo 'h3{';
	$ats->pixzlo_typo_generate( 'h3-typography' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h4-typography' );
echo 'h4{';
	$ats->pixzlo_typo_generate( 'h4-typography' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h5-typography' );
echo 'h5{';
	$ats->pixzlo_typo_generate( 'h5-typography' );
echo '
}';
$ats->pixzlo_custom_font_check( 'h6-typography' );
echo 'h6{';
	$ats->pixzlo_typo_generate( 'h6-typography' );
echo '
}';
$gen_link = $ats->pixzlo_theme_opt('theme-link-color');
if( $gen_link ):
echo 'a{';
	$ats->pixzlo_link_color( 'theme-link-color', 'regular' );
echo '
}';
echo 'a:hover{';
	$ats->pixzlo_link_color( 'theme-link-color', 'hover' );
echo '
}';
echo 'a:active{';
	$ats->pixzlo_link_color( 'theme-link-color', 'active' );
echo '
}';
endif;
echo "\n/* Widget Typography Styles */\n";
$ats->pixzlo_custom_font_check( 'widgets-content' );
echo '.widget{';
	$ats->pixzlo_typo_generate( 'widgets-content' );
echo '
}';

echo '
.header-inner .main-logo img{
    max-height: '. esc_attr( $ats->pixzlo_dimension_height('logo-height') ) .' ;
}';

echo '
.header-inner .sticky-logo img{
    max-height: '. esc_attr( $ats->pixzlo_dimension_height('sticky-logo-height') ) .' !important;
}';

echo '
.mobile-header .mobile-header-inner ul > li img ,
.mobile-bar-items .mobile-logo img {
    max-height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-logo-height') ) .' !important;
}';


$ats->pixzlo_custom_font_check( 'widgets-title' );
echo '.widget .widget-title{';
	$ats->pixzlo_typo_generate( 'widgets-title' );
echo '
}';
$page_loader = $ats->pixzlo_theme_opt('page-loader') && $ats->pixzlo_theme_opt('page-loader-img') != '' ? $pixzlo_options['page-loader-img']['url'] : '';
if( $page_loader ):
	echo ".page-loader {background: url('". esc_url( $page_loader ). "') 50% 50% no-repeat rgba(255,255,255, 1);}";
endif;
echo '.container, .boxed-container, .boxed-container .site-footer.footer-fixed, .custom-container {
	width: '. $ats->pixzlo_container_width() .';
}';
echo '.pixzlo-content > .pixzlo-content-inner{';
	$ats->pixzlo_padding_settings( 'page-content-padding' );
echo '
}';
echo "\n/* Header Styles */\n";
echo 'header.pixzlo-header {';
	$ats->pixzlo_bg_settings('header-background');
echo '}';
echo "\n/* Topbar Styles */\n";
$ats->pixzlo_custom_font_check( 'header-topbar-typography' );
echo '.topbar{';
	$ats->pixzlo_typo_generate( 'header-topbar-typography' );
	$ats->pixzlo_bg_rgba( 'header-topbar-background' );
	$ats->pixzlo_border_settings( 'header-topbar-border' );
echo '
}';
echo '.topbar .topbar-inner {';
	$ats->pixzlo_padding_settings( 'header-topbar-padding' );
echo '
}';
echo '.topbar a{';
	$ats->pixzlo_link_color( 'header-topbar-link-color', 'regular' );
echo '
}';
echo '.topbar a:hover {';
	$ats->pixzlo_link_color( 'header-topbar-link-color', 'hover' );
echo '
}';
echo '.topbar a:active,.topbar a:focus {';
	$ats->pixzlo_link_color( 'header-topbar-link-color', 'active' );
echo '
}';
echo '
.topbar-items > li{
    height: '. esc_attr( $ats->pixzlo_dimension_height('header-topbar-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-topbar-height') ) .' ;
}
.header-sticky .topbar-items > li,
.sticky-scroll.show-menu .topbar-items > li{
	height: '. esc_attr( $ats->pixzlo_dimension_height('header-topbar-sticky-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-topbar-sticky-height') ) .' ;
}';
echo '
.topbar-items > li img{
	max-height: '. esc_attr(  $ats->pixzlo_dimension_height('header-topbar-height') ) .' ;
}';
echo "\n/* Logobar Styles */\n";
$ats->pixzlo_custom_font_check( 'header-logobar-typography' );
echo '.logobar{';
	$ats->pixzlo_typo_generate( 'header-logobar-typography' );
	$ats->pixzlo_bg_rgba( 'header-logobar-background' );
	$ats->pixzlo_border_settings( 'header-logobar-border' );
echo '
}';
echo '.logobar .logobar-inner {';
	$ats->pixzlo_padding_settings( 'header-logobar-padding' );
echo '
}';
echo '.logobar a{';
	$ats->pixzlo_link_color( 'header-logobar-link-color', 'regular' );
echo '
}';
echo '.logobar a:hover{';
	$ats->pixzlo_link_color( 'header-logobar-link-color', 'hover' );
echo '
}';
echo '.logobar a:active,
.logobar a:focus, .logobar .pixzlo-main-menu > li.current-menu-item > a, .logobar .pixzlo-main-menu > li.current-menu-ancestor > a, .logobar a.active {';
	$ats->pixzlo_link_color( 'header-logobar-link-color', 'active' );
echo '
}';
echo '
.logobar-items > li{
    height: '. esc_attr( $ats->pixzlo_dimension_height('header-logobar-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-logobar-height') ) .' ;
}
.header-sticky .logobar-items > li,
.sticky-scroll.show-menu .logobar-items > li{
	height: '. esc_attr( $ats->pixzlo_dimension_height('header-logobar-sticky-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-logobar-sticky-height') ) .' ;
}';
echo '
.logobar-items > li img{
	max-height: '. esc_attr( $ats->pixzlo_dimension_height('header-logobar-height') ) .' ;
}';
echo "\n/* Logobar Sticky Styles */\n";
$color = $ats->pixzlo_theme_opt('sticky-header-logobar-color');
echo '.header-sticky .logobar, .sticky-scroll.show-menu .logobar{
	'. ( $color != '' ? 'color: '. $color .';' : '' );
	$ats->pixzlo_bg_rgba( 'sticky-header-logobar-background' );
	$ats->pixzlo_border_settings( 'sticky-header-logobar-border' );
	$ats->pixzlo_padding_settings( 'sticky-header-logobar-padding' );
echo '
}';
echo '.header-sticky .logobar a, .sticky-scroll.show-menu .logobar a{';
	$ats->pixzlo_link_color( 'sticky-header-logobar-link-color', 'regular' );
echo '
}';
echo '.header-sticky .logobar a:hover, .sticky-scroll.show-menu .logobar a:hover{';
	$ats->pixzlo_link_color( 'sticky-header-logobar-link-color', 'hover' );
echo '
}';
echo '.header-sticky .logobar a:active, .sticky-scroll.show-menu .logobar a:active,
.header-sticky .logobar .pixzlo-main-menu .current-menu-item > a, .header-sticky .logobar .pixzlo-main-menu .current-menu-ancestor > a,
.sticky-scroll.show-menu .logobar .pixzlo-main-menu .current-menu-item > a, .sticky-scroll.show-menu .logobar .pixzlo-main-menu .current-menu-ancestor > a ,
.header-sticky .logobar a.active, .sticky-scroll.show-menu .logobar a.active{';
	$ats->pixzlo_link_color( 'sticky-header-logobar-link-color', 'active' );
echo '
}';
echo "\n/* Navbar Styles */\n";
$ats->pixzlo_custom_font_check( 'header-navbar-typography' );
echo '.navbar{';
	$ats->pixzlo_typo_generate( 'header-navbar-typography' );
	$ats->pixzlo_bg_rgba( 'header-navbar-background' );
	$ats->pixzlo_border_settings( 'header-navbar-border' );
echo '
}';
echo '.navbar .navbar-inner {';
	$ats->pixzlo_padding_settings( 'header-navbar-padding' );
echo '
}';
echo '.navbar a{';
	$ats->pixzlo_link_color( 'header-navbar-link-color', 'regular' );
echo '
}';
echo '.navbar a:hover{';
	$ats->pixzlo_link_color( 'header-navbar-link-color', 'hover' );
echo '
}';
echo '.navbar a:active,.navbar a:focus, .navbar .pixzlo-main-menu > .current-menu-item > a, .navbar .pixzlo-main-menu > .current-menu-ancestor > a, .navbar a.active {';
	$ats->pixzlo_link_color( 'header-navbar-link-color', 'active' );
echo '
}';
$color = $ats->pixzlo_theme_opt( 'header-navbar-typography' );
$color = isset( $color['color'] ) && $color['color'] != '' ? $color['color'] : '';
$scolor = $ats->pixzlo_theme_opt( 'sticky-header-navbar-color' );
if( $color ):
echo '.navbar .secondary-space-toggle > span{
	background-color: '. esc_attr( $color ) .';
}';
endif;
if( $scolor ):
echo '.header-sticky .navbar .secondary-space-toggle > span,
.sticky-scroll.show-menu .navbar .secondary-space-toggle > span{
	background-color: '. esc_attr( $scolor ) .';
}';
endif;
echo '
.navbar-items > li,
.header-inner .navbar.floating-navbar .custom-container a.btn.pixzlo-btn {
    height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-height') ) .' ;
}
.header-sticky .navbar-items > li,
.sticky-scroll.show-menu .navbar-items > li,
.header-inner .header-sticky .navbar.floating-navbar .custom-container a.btn.pixzlo-btn{
	height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-sticky-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-sticky-height') ) .' ;
}';
echo '
.navbar-items > li img{
	max-height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-height') ) .' ;
}';
echo "\n/* Navbar Sticky Styles */\n";
$color = $ats->pixzlo_theme_opt('sticky-header-navbar-color');
echo '.header-sticky .navbar, .sticky-scroll.show-menu .navbar{
	'. ( $color != '' ? 'color: '. $color .';' : '' );
	$ats->pixzlo_bg_rgba( 'sticky-header-navbar-background' );
	$ats->pixzlo_border_settings( 'sticky-header-navbar-border' );
	$ats->pixzlo_padding_settings( 'sticky-header-navbar-padding' );
echo '
}';
echo '.header-sticky .navbar a, .sticky-scroll.show-menu .navbar a {';
	$ats->pixzlo_link_color( 'sticky-header-navbar-link-color', 'regular' );
echo '
}';
echo '.header-sticky .navbar a:hover, .sticky-scroll.show-menu .navbar a:hover {';
	$ats->pixzlo_link_color( 'sticky-header-navbar-link-color', 'hover' );
echo '
}';
/*echo '.header-sticky .navbar a:active, .sticky-scroll.show-menu .navbar a:active,
.header-sticky .navbar .pixzlo-main-menu .current-menu-item > a, .header-sticky .navbar .pixzlo-main-menu .current-menu-ancestor > a,
.sticky-scroll.show-menu .navbar .pixzlo-main-menu .current-menu-item > a, .sticky-scroll.show-menu .navbar .pixzlo-main-menu .current-menu-ancestor > a,
.header-sticky .navbar a.active, .sticky-scroll.show-menu .navbar a.active {';
	$ats->pixzlo_link_color( 'sticky-header-navbar-link-color', 'active' );
echo '
}';*/
echo '
.header-sticky .navbar img.custom-logo, .sticky-scroll.show-menu .navbar img.custom-logo{
	max-height: '. esc_attr( $ats->pixzlo_dimension_height('header-navbar-sticky-height') ) .' ;
}';
echo "\n/* Secondary Menu Space Styles */\n";
$sec_menu_type = $ats->pixzlo_theme_opt('secondary-menu-type');
$ats->pixzlo_custom_font_check( 'secondary-space-typography' );
echo '.secondary-menu-area {';
	echo 'width: '. esc_attr( $ats->pixzlo_dimension_width('secondary-menu-space-width') ) .' ;';
echo '}';
echo '.secondary-menu-area, .secondary-menu-area .widget {';
	$ats->pixzlo_border_settings( 'secondary-space-border' );
	$ats->pixzlo_typo_generate( 'secondary-space-typography' );
	$ats->pixzlo_bg_settings('secondary-space-background');
	if( $sec_menu_type == 'left-overlay' || $sec_menu_type == 'left-push' ){
		echo 'left: -' . esc_attr( $ats->pixzlo_dimension_width('secondary-menu-space-width') ) . ';';
	}elseif( $sec_menu_type == 'right-overlay' || $sec_menu_type == 'right-push' ){
		echo 'right: -' . esc_attr( $ats->pixzlo_dimension_width('secondary-menu-space-width') ) . ';';
	}
echo '
}';
echo '.secondary-menu-area.left-overlay, .secondary-menu-area.left-push{';
	if( $sec_menu_type == 'left-overlay' || $sec_menu_type == 'left-push' ){
		echo 'left: -' . esc_attr( $ats->pixzlo_dimension_width('secondary-menu-space-width') ) . ';';
	}
echo '
}';
echo '.secondary-menu-area.right-overlay, .secondary-menu-area.right-push{';
	if( $sec_menu_type == 'right-overlay' || $sec_menu_type == 'right-push' ){
		echo 'right: -' . esc_attr( $ats->pixzlo_dimension_width('secondary-menu-space-width') ) . ';';
	}
echo '
}';
echo '.secondary-menu-area .secondary-menu-area-inner{';
	$ats->pixzlo_padding_settings( 'secondary-space-padding' );
echo '
}';
echo '.secondary-menu-area a{';
	$ats->pixzlo_link_color( 'secondary-space-link-color', 'regular' );
echo '
}';
echo '.secondary-menu-area a:hover{';
	$ats->pixzlo_link_color( 'secondary-space-link-color', 'hover' );
echo '
}';
echo '.secondary-menu-area a:active{';
	$ats->pixzlo_link_color( 'secondary-space-link-color', 'active' );
echo '
}';
echo "\n/* Sticky Header Styles */\n";
if( $ats->pixzlo_theme_opt('header-type') != 'default' ):
$sticky_width = $ats->pixzlo_dimension_width('header-fixed-width');
echo '.sticky-header-space{
	width: '. esc_attr( $sticky_width ) .';
}';
	if( $ats->pixzlo_theme_opt('header-type') == 'left-sticky' ):
	echo 'body, .top-sliding-bar{
		padding-left: '. esc_attr( $sticky_width ) .';
	}';
	else:
	echo 'body, .top-sliding-bar{
		padding-right: '. esc_attr( $sticky_width ) .';
	}';
	endif;
endif;
$ats->pixzlo_custom_font_check( 'header-fixed-typography' );
echo '.sticky-header-space{';
	$ats->pixzlo_typo_generate( 'header-fixed-typography' );
	$ats->pixzlo_bg_settings( 'header-fixed-background' );
	$ats->pixzlo_border_settings( 'header-fixed-border' );
	$ats->pixzlo_padding_settings( 'header-fixed-padding' );
echo '
}';
echo '.sticky-header-space li a{';
	$ats->pixzlo_link_color( 'header-fixed-link-color', 'regular' );
echo '
}';
echo '.sticky-header-space li a:hover{';
	$ats->pixzlo_link_color( 'header-fixed-link-color', 'hover' );
echo '
}';
echo '.sticky-header-space li a:active{';
	$ats->pixzlo_link_color( 'header-fixed-link-color', 'active' );
echo '
}';
echo "\n/* Mobile Header Styles */\n";
echo '
.mobile-header-items > li{
    height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-height') ) .' ;
}
.mobile-header .mobile-header-inner ul > li img {
	max-height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-height') ) .' ;
}
.mobile-header{';
	$ats->pixzlo_bg_rgba('mobile-header-background');
echo '
}';
echo '.mobile-header-items li a{';
	$ats->pixzlo_link_color( 'mobile-header-link-color', 'regular' );
echo '
}';
echo '.mobile-header-items li a:hover{';
	$ats->pixzlo_link_color( 'mobile-header-link-color', 'hover' );
echo '
}';
echo '.mobile-header-items li a:active{';
	$ats->pixzlo_link_color( 'mobile-header-link-color', 'active' );
echo '
}';
echo '
.header-sticky .mobile-header-items > li, .show-menu .mobile-header-items > li{
    height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-sticky-height') ) .' ;
    line-height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-sticky-height') ) .' ;
}
.header-sticky .mobile-header-items > li .mobile-logo img, .show-menu .mobile-header-items > li .mobile-logo img{
	max-height: '. esc_attr( $ats->pixzlo_dimension_height('mobile-header-sticky-height') ) .' ;
}
.mobile-header .header-sticky, .mobile-header .show-menu{';
	$ats->pixzlo_bg_rgba('mobile-header-sticky-background');
echo '}';
echo '.header-sticky .mobile-header-items li a, .show-menu .mobile-header-items li a{';
	$ats->pixzlo_link_color( 'mobile-header-sticky-link-color', 'regular' );
echo '
}';
echo '.header-sticky .mobile-header-items li a:hover, .show-menu .mobile-header-items li a:hover{';
	$ats->pixzlo_link_color( 'mobile-header-sticky-link-color', 'hover' );
echo '
}';
echo '.header-sticky .mobile-header-items li a:hover, .show-menu .mobile-header-items li a:hover{';
	$ats->pixzlo_link_color( 'mobile-header-sticky-link-color', 'active' );
echo '
}';
$mm_max = $ats->pixzlo_dimension_width( 'mobile-menu-max-width' );
if( $mm_max ):
echo '.mobile-bar, .mobile-bar .container{
	max-width: '. $mm_max .';
}';
endif;
echo "\n/* Mobile Bar Styles */\n";
$ats->pixzlo_custom_font_check( 'mobile-menu-typography' );
echo '.mobile-bar{';
	$ats->pixzlo_typo_generate( 'mobile-menu-typography' );
	$ats->pixzlo_bg_settings( 'mobile-menu-background' );
	$ats->pixzlo_border_settings( 'mobile-menu-border' );
	$ats->pixzlo_padding_settings( 'mobile-menu-padding' );
echo '
}';
echo '.mobile-bar li a{';
	$ats->pixzlo_link_color( 'mobile-menu-link-color', 'regular' );
echo '
}';
echo '.mobile-bar li a:hover{';
	$ats->pixzlo_link_color( 'mobile-menu-link-color', 'hover' );
echo '
}';
echo '.mobile-bar li a:active, ul > li.current-menu-item > a, 
ul > li.current-menu-parent > a, ul > li.current-menu-ancestor > a,
.pixzlo-mobile-menu li.menu-item a.active {';
	$ats->pixzlo_link_color( 'mobile-menu-link-color', 'active' );
echo '
}';
echo "\n/* Top Sliding Bar Styles */\n";
$ats->pixzlo_custom_font_check( 'top-sliding-typography' );
if( $ats->pixzlo_theme_opt( 'header-top-sliding-switch' ) ):
echo '.top-sliding-bar-inner{';
	$ats->pixzlo_typo_generate( 'top-sliding-typography' );
	$ats->pixzlo_bg_rgba( 'top-sliding-background' );
	$ats->pixzlo_border_settings( 'top-sliding-border' );
	$ats->pixzlo_padding_settings( 'top-sliding-padding' );
echo '
}';
$ts_bg = $ats->pixzlo_theme_opt( 'top-sliding-background' );
echo '.top-sliding-toggle{
	'. ( $ts_bg != '' ? 'border-top-color: '. $ts_bg['rgba'] . ';' : '' ) .'
}';
echo '.top-sliding-bar-inner li a{';
	$ats->pixzlo_link_color( 'top-sliding-link-color', 'regular' );
echo '
}';
echo '.top-sliding-bar-inner li a:hover{';
	$ats->pixzlo_link_color( 'top-sliding-link-color', 'hover' );
echo '
}';
echo '.top-sliding-bar-inner li a:active{';
	$ats->pixzlo_link_color( 'top-sliding-link-color', 'active' );
echo '
}';
endif;
echo "\n/* General Menu Styles */\n";
echo '.menu-tag-hot{
	background-color: '. $ats->pixzlo_theme_opt( 'menu-tag-hot-bg' ) .';
}';
echo '.menu-tag-new{
	background-color: '. $ats->pixzlo_theme_opt( 'menu-tag-new-bg' ) .';
}';
echo '.menu-tag-trend{
	background-color: '. $ats->pixzlo_theme_opt( 'menu-tag-trend-bg' ) .';
}';
echo "\n/* Main Menu Styles */\n";
$ats->pixzlo_custom_font_check( 'main-menu-typography' );
echo 'ul.pixzlo-main-menu > li > a,
ul.pixzlo-main-menu > li > .main-logo{';
	$ats->pixzlo_typo_generate( 'main-menu-typography' );
echo '
}';
echo "\n/* Dropdown Menu Styles */\n";
echo 'ul.dropdown-menu{';
	$ats->pixzlo_bg_rgba( 'dropdown-menu-background' );
	$ats->pixzlo_border_settings( 'dropdown-menu-border' );
echo '
}';
$ats->pixzlo_custom_font_check( 'dropdown-menu-typography' );
echo 'ul.dropdown-menu > li{';
	$ats->pixzlo_typo_generate( 'dropdown-menu-typography' );
echo '
}';
echo 'ul.dropdown-menu > li a,
ul.mega-child-dropdown-menu > li a,
.header-sticky ul.dropdown-menu > li a, .sticky-scroll.show-menu ul.dropdown-menu > li a,
.header-sticky ul.mega-child-dropdown-menu > li a, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a {';
	$ats->pixzlo_link_color( 'dropdown-menu-link-color', 'regular' );
echo '
}';
echo 'ul.dropdown-menu > li a:hover,
ul.mega-child-dropdown-menu > li a:hover,
.header-sticky ul.dropdown-menu > li a:hover, .sticky-scroll.show-menu ul.dropdown-menu > li a:hover,
.header-sticky ul.mega-child-dropdown-menu > li a:hover, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a:hover {';
	$ats->pixzlo_link_color( 'dropdown-menu-link-color', 'hover' );
echo '
}';
echo 'ul.dropdown-menu > li a:active,
ul.mega-child-dropdown-menu > li a:active,
.header-sticky ul.dropdown-menu > li a:active, .sticky-scroll.show-menu ul.dropdown-menu > li a:active,
.header-sticky ul.mega-child-dropdown-menu > li a:active, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a:active,
ul.dropdown-menu > li.current-menu-item > a, ul.dropdown-menu > li.current-menu-parent > a, ul.dropdown-menu > li.current-menu-ancestor > a,
ul.mega-child-dropdown-menu > li.current-menu-item > a {';
	$ats->pixzlo_link_color( 'dropdown-menu-link-color', 'active' );
echo '
}';
/* Template Page Title Styles */
echo "\n/* Template Page Title Styles */\n";
pixzloPostTitileStyle( 'single-post' );
pixzloPostTitileStyle( 'blog' );
pixzloPostTitileStyle( 'page' );
$actived_tmplt = $ats->pixzlo_theme_opt('theme-templates');
if( !empty( $actived_tmplt ) && is_array( $actived_tmplt ) ){
	foreach( $actived_tmplt as $template ){
		pixzloPostTitileStyle( $template );
	}
}
$actived_cat_tmplt = $ats->pixzlo_theme_opt('theme-categories');
if( !empty( $actived_cat_tmplt ) && is_array( $actived_cat_tmplt ) ){
	foreach( $actived_cat_tmplt as $template ){
		pixzloPostTitileStyle( $template );
	}
}
function pixzloPostTitileStyle( $field ){
	$ats = new PixzloThemeStyles; 
	echo '.pixzlo-'. $field .' .page-title-wrap-inner {
		color: '. $ats->pixzlo_theme_opt( 'template-'. $field .'-color' ) .';';
		$ats->pixzlo_bg_settings( 'template-'. $field .'-background-all' );
		$ats->pixzlo_border_settings( 'template-'. $field .'-border' );
		$ats->pixzlo_padding_settings( 'template-'. $field .'-padding' );
	echo '
	}';
	$padding_bottom_opt = $ats->pixzlo_theme_opt('template-'. $field .'-padding');
	$padding_bottom = isset( $padding_bottom_opt['padding-bottom'] ) && $padding_bottom_opt['padding-bottom'] != '' ? $padding_bottom_opt['padding-bottom'] : '';
	if( $padding_bottom ){
		$padding_bottom = absint( str_replace("px","", $padding_bottom) );
		$padding_bottom += 0;
		echo '.pixzlo-'. $field .' .page-title-inner .breadcrumb-wrap { bottom: -'. esc_attr( $padding_bottom ) .'px; }';
	}
	echo '.pixzlo-'. $field .' .page-title-wrap a{';
		$ats->pixzlo_link_color( 'template-'. $field .'-link-color', 'regular' );
	echo '
	}';
	echo '.pixzlo-'. $field .' .page-title-wrap a:hover{';
		$ats->pixzlo_link_color( 'template-'. $field .'-link-color', 'hover' );
	echo '
	}';
	echo '.pixzlo-'. $field .' .page-title-wrap a:active{';
		$ats->pixzlo_link_color( 'template-'. $field .'-link-color', 'active' );
	echo '
	}';
	echo '.pixzlo-'. $field .' .page-title-wrap-inner > .page-title-overlay{';
		$ats->pixzlo_bg_rgba( $field .'-page-title-overlay' );
	echo '
	}';
}
/* Template Article Styles */
echo "\n/* Template Article Styles */\n";
pixzloPostArticleStyle( 'single-post' );
pixzloPostArticleStyle( 'blog' );
$actived_tmplt = $ats->pixzlo_theme_opt('theme-templates');
if( !empty( $actived_tmplt ) && is_array( $actived_tmplt ) ){
	foreach( $actived_tmplt as $template ){
		pixzloPostArticleStyle( $template );
	}
}
$actived_cat_tmplt = $ats->pixzlo_theme_opt('theme-categories');
if( !empty( $actived_cat_tmplt ) && is_array( $actived_cat_tmplt ) ){
	foreach( $actived_cat_tmplt as $template ){
		pixzloPostArticleStyle( $template );
	}
}
function pixzloPostArticleStyle( $field ){
	$ats = new PixzloThemeStyles; 
	echo '.'. $field .'-template article.post{
		color: '. $ats->pixzlo_theme_opt( $field .'-article-color' ) .';';
		$ats->pixzlo_bg_rgba( $field .'-article-background' );
		$ats->pixzlo_border_settings( $field .'-article-border' );
		$ats->pixzlo_padding_settings( $field .'-article-padding' );
	echo '
	}';
	echo '.'. $field .'-template article.post a{';
		$ats->pixzlo_link_color( $field .'-article-link-color', 'regular' );
	echo '
	}';
	echo '.'. $field .'-template article.post a:hover{';
		$ats->pixzlo_link_color( $field .'-article-link-color', 'hover' );
	echo '
	}';
	echo '.'. $field .'-template article.post a:active{';
		$ats->pixzlo_link_color( $field .'-article-link-color', 'active' );
	echo '
	}';
	$post_thumb_margin = $ats->pixzlo_theme_opt( $field .'-article-padding' );
	if( $post_thumb_margin ):
		echo '.'. $field .'-template .post-format-wrap{
			'. ( isset( $post_thumb_margin['padding-left'] ) && $post_thumb_margin['padding-left'] != '' ? 'margin-left: -' . $post_thumb_margin['padding-left'] .';' : '' ) .'
			'. ( isset( $post_thumb_margin['padding-right'] ) && $post_thumb_margin['padding-right'] != '' ? 'margin-right: -' . $post_thumb_margin['padding-right'] .';' : '' ) .'
		}';
		echo '.'. $field .'-template .post-quote-wrap > .blockquote, .'. $field .'-template .post-link-inner, .'. $field .'-template .post-format-wrap .post-audio-wrap{
			'. ( isset( $post_thumb_margin['padding-left'] ) && $post_thumb_margin['padding-left'] != '' ? 'padding-left: ' . $post_thumb_margin['padding-left'] .';' : '' ) .'
			'. ( isset( $post_thumb_margin['padding-right'] ) && $post_thumb_margin['padding-right'] != '' ? 'padding-right: ' . $post_thumb_margin['padding-right'] .';' : '' ) .'
		}';
	endif;
}
$theme_color = $ats->pixzloThemeColor();
$secondary_color = $ats->pixzloSecondaryColor();
echo "\n/* Blockquote / Audio / Link Styles */\n";
echo '.post-quote-wrap > .blockquote{
	border-left-color: '. esc_attr( $theme_color ) .';
}';
$rgba_08 = $ats->pixzlo_hex2rgba( $theme_color, '0.8' );
// Single Post Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'single-post-quote-format' );
pixzloQuoteDynamicStyle( 'single-post', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Blog Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'blog-quote-format' );
pixzloQuoteDynamicStyle( 'blog', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Archive Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'archive-quote-format' );
pixzloQuoteDynamicStyle( 'archive', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Tag Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'tag-quote-format' );
pixzloQuoteDynamicStyle( 'tag', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Search Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'search-quote-format' );
pixzloQuoteDynamicStyle( 'search', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Author Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'author-quote-format' );
pixzloQuoteDynamicStyle( 'author', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Category Blockquote
$blockquote_bg_opt = $ats->pixzlo_theme_opt( 'category-quote-format' );
pixzloQuoteDynamicStyle( 'category', $blockquote_bg_opt, $theme_color, $rgba_08 );
// All Category Blockquote
$actived_cat_tmplt = $ats->pixzlo_theme_opt('theme-categories');
if( !empty( $actived_cat_tmplt ) && is_array( $actived_cat_tmplt ) ){
	foreach( $actived_cat_tmplt as $template ){
		$blockquote_bg_opt = $ats->pixzlo_theme_opt( $template.'-quote-format' );
		pixzloQuoteDynamicStyle( $template, $blockquote_bg_opt, $theme_color, $rgba_08 );
	}
}
function pixzloQuoteDynamicStyle( $field, $value, $theme_color, $rgba_08 ){
	if( $value == 'none' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: #333;
		}';
	elseif( $value == 'theme' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: '. $theme_color .';
			border-left-color: #333;
		}';
	elseif( $value == 'theme-overlay' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: '. $rgba_08 .';
		}';
	elseif( $value == 'featured' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: rgba(0, 0, 0, 0.7);
		}';
	endif;
}
/* Single Post Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'single-post-link-format' );
pixzloLinkDynamicStyle( 'single-post', $link_bg_opt, $theme_color, $rgba_08 );
/* Blog Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'blog-link-format' );
pixzloLinkDynamicStyle( 'blog', $link_bg_opt, $theme_color, $rgba_08 );
/* Archive Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'archive-link-format' );
pixzloLinkDynamicStyle( 'archive', $link_bg_opt, $theme_color, $rgba_08 );
/* Tag Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'tag-link-format' );
pixzloLinkDynamicStyle( 'tag', $link_bg_opt, $theme_color, $rgba_08 );
/* Author Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'author-link-format' );
pixzloLinkDynamicStyle( 'author', $link_bg_opt, $theme_color, $rgba_08 );
/* Search Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'search-link-format' );
pixzloLinkDynamicStyle( 'search', $link_bg_opt, $theme_color, $rgba_08 );
/* Catgeory Link */
$link_bg_opt = $ats->pixzlo_theme_opt( 'category-link-format' );
pixzloLinkDynamicStyle( 'category', $link_bg_opt, $theme_color, $rgba_08 );
// All Category Link
$actived_cat_tmplt = $ats->pixzlo_theme_opt('theme-categories');
if( !empty( $actived_cat_tmplt ) && is_array( $actived_cat_tmplt ) ){
	foreach( $actived_cat_tmplt as $template ){
		$link_bg_opt = $ats->pixzlo_theme_opt( $template.'-link-format' );
		pixzloLinkDynamicStyle( $template, $link_bg_opt, $theme_color, $rgba_08 );
	}
}
function pixzloLinkDynamicStyle( $field, $value, $theme_color, $rgba_08 ){
	if( $value == 'none' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: #333;
		}';
	elseif( $value == 'theme' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: '. $theme_color .';
		}';
	elseif( $value == 'theme-overlay' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: '. $rgba_08 .';
		}';
	elseif( $value == 'featured' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: rgba(0, 0, 0, 0.7);
		}';
	endif;
}
echo "\n/* Post Item Overlay Styles */\n";
echo '.post-overlay-items{
	color: '. $ats->pixzlo_theme_opt( 'single-post-article-overlay-color' ) .';';
	$ats->pixzlo_bg_rgba( 'single-post-article-overlay-background' );
	$ats->pixzlo_border_settings( 'single-post-article-overlay-border' );
	$ats->pixzlo_padding_settings( 'single-post-article-overlay-padding' );
	$ats->pixzlo_margin_settings( 'single-post-article-overlay-margin' );
	
echo '
}';
echo '.post-overlay-items a{';
	$ats->pixzlo_link_color( 'single-post-article-overlay-link-color', 'regular' );
echo '
}';
echo '.post-overlay-items a:hover{';
	$ats->pixzlo_link_color( 'single-post-article-overlay-link-color', 'hover' );
echo '
}';
echo '.post-overlay-items a:hover{';
	$ats->pixzlo_link_color( 'single-post-article-overlay-link-color', 'active' );
echo '
}';
/* Extra Styles */
echo "\n/* Footer Styles */\n";
echo '.site-footer{';
	$ats->pixzlo_typo_generate( 'footer-typography' );
	$ats->pixzlo_bg_settings( 'footer-background' );
	$ats->pixzlo_border_settings( 'footer-border' );
	$ats->pixzlo_padding_settings( 'footer-padding' );
echo '
}';
echo '.site-footer .widget{';
	$ats->pixzlo_typo_generate( 'footer-typography' );
echo '
}';
$bg_overlay = $ats->pixzlo_theme_opt( 'footer-background-overlay' );
if( !empty( $bg_overlay ) && isset( $bg_overlay['rgba'] ) ):
echo '
footer.site-footer:before {
	position: absolute;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	content: "";
	background-color: '. esc_attr( $bg_overlay['rgba'] ) .';
}';
endif;
echo '.site-footer a{';
	$ats->pixzlo_link_color( 'footer-link-color', 'regular' );
echo '
}';
echo '.site-footer a:hover{';
	$ats->pixzlo_link_color( 'footer-link-color', 'hover' );
echo '
}';
echo '.site-footer a:hover{';
	$ats->pixzlo_link_color( 'footer-link-color', 'active' );
echo '
}';
echo "\n/* Footer Top Styles */\n";
$ats->pixzlo_custom_font_check( 'footer-top-typography' );
echo '.footer-top-wrap{';
	$ats->pixzlo_typo_generate( 'footer-top-typography' );
	$ats->pixzlo_bg_rgba( 'footer-top-background' );
	$ats->pixzlo_border_settings( 'footer-top-border' );
	$ats->pixzlo_padding_settings( 'footer-top-padding' );
	$ats->pixzlo_margin_settings( 'footer-top-margin' );
echo '
}';
echo '.footer-top-wrap .widget{';
	$ats->pixzlo_typo_generate( 'footer-top-typography' );
echo '
}';
echo '.footer-top-wrap a{';
	$ats->pixzlo_link_color( 'footer-top-link-color', 'regular' );
echo '
}';
echo '.footer-top-wrap a:hover{';
	$ats->pixzlo_link_color( 'footer-top-link-color', 'hover' );
echo '
}';
echo '.footer-top-wrap a:hover{';
	$ats->pixzlo_link_color( 'footer-top-link-color', 'active' );
echo '
}';
echo '.footer-top-wrap .widget .widget-title {
	color: '. esc_attr( $ats->pixzlo_theme_opt( 'footer-top-title-color' ) ) .';
}';
echo "\n/* Footer Middle Styles */\n";
$ats->pixzlo_custom_font_check( 'footer-middle-typography' );
echo '.footer-middle-wrap{';
	$ats->pixzlo_typo_generate( 'footer-middle-typography' );
	$ats->pixzlo_bg_rgba( 'footer-middle-background' );
	$ats->pixzlo_border_settings( 'footer-middle-border' );
	$ats->pixzlo_padding_settings( 'footer-middle-padding' );
	$ats->pixzlo_margin_settings( 'footer-middle-margin' );
echo '
}';
echo '.footer-middle-wrap .widget{';
	$ats->pixzlo_typo_generate( 'footer-middle-typography' );
echo '
}';
echo '.footer-middle-wrap a{';
	$ats->pixzlo_link_color( 'footer-middle-link-color', 'regular' );
echo '
}';
echo '.footer-middle-wrap a:hover{';
	$ats->pixzlo_link_color( 'footer-middle-link-color', 'hover' );
echo '
}';
echo '.footer-middle-wrap a:active{';
	$ats->pixzlo_link_color( 'footer-middle-link-color', 'active' );
echo '
}';
echo '.footer-middle-wrap .widget .widget-title {
	color: '. esc_attr( $ats->pixzlo_theme_opt( 'footer-middle-title-color' ) ) .';
}';
echo "\n/* Footer Bottom Styles */\n";
$ats->pixzlo_custom_font_check( 'footer-bottom-typography' );
echo '.footer-bottom{';
	$ats->pixzlo_typo_generate( 'footer-bottom-typography' );
	$ats->pixzlo_bg_rgba( 'footer-bottom-background' );
	$ats->pixzlo_border_settings( 'footer-bottom-border' );
	$ats->pixzlo_padding_settings( 'footer-bottom-padding' );
	$ats->pixzlo_margin_settings( 'footer-bottom-margin' );
echo '
}';
echo '.footer-bottom .widget{';
	$ats->pixzlo_typo_generate( 'footer-bottom-typography' );
echo '
}';
echo '.footer-bottom a{';
	$ats->pixzlo_link_color( 'footer-bottom-link-color', 'regular' );
echo '
}';
echo '.footer-bottom a:hover{';
	$ats->pixzlo_link_color( 'footer-bottom-link-color', 'hover' );
echo '
}';
echo '.footer-bottom a:active{';
	$ats->pixzlo_link_color( 'footer-bottom-link-color', 'active' );
echo '
}';
echo '.footer-bottom-wrap .widget .widget-title {
	color: '. esc_attr( $ats->pixzlo_theme_opt( 'footer-bottom-title-color' ) ) .';
}';
echo "\n/* Theme Extra Styles */\n";
//Here your code
$theme_link_color = $ats->pixzlo_get_link_color( 'theme-link-color', 'regular' );
$theme_link_hover = $ats->pixzlo_get_link_color( 'theme-link-color', 'hover' );
$theme_link_active = $ats->pixzlo_get_link_color( 'theme-link-color', 'active' );
$rgb = $ats->pixzlo_hex2rgba( $theme_color, 'none' );
$secondary_rgb = $ats->pixzlo_hex2rgba( $secondary_color, 'none' );
/*
 * Theme Color -> $theme_color
 * Secondary Color -> $secondary_color
 * Theme RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $rgb ) .', 0.5); }';
 * Theme Secondary RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $secondary_rgb ) .', 0.5); }';
 * Link Colors -> $theme_link_color, $theme_link_hover, $theme_link_active
 */
echo '.theme-color {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.default-color {
	color: '. esc_attr( $theme_color ) .' !important;
}';

echo '.float-video-wrap .float-video-left-part:after {
	background: rgba('. esc_attr( $secondary_rgb ) .', 0.5);
}';
echo '.float-video-right-part.video-content {
	background: '. esc_attr( $theme_color ) .';
}';






echo "\n/*----------- General Style----------- */\n";
echo '::selection {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.breadcrumb span.current {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.secondary-space-toggle > span {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.top-sliding-toggle.fa-minus {
	border-top-color : '. esc_attr( $theme_color ) .';
}';
echo '.owl-dot.active span {
	background : '. esc_attr( $theme_color ) .';
	border-color : '. esc_attr( $theme_color ) .';
}';

echo "\n/*----------- Header Logobar ----------- */\n";
echo '.header-inner .logobar-inner .media i {
	color : '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Menu----------- */\n";
echo '.is-style-outline .wp-block-button__link  {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Search Style----------- */\n";
echo 'input[type="submit"], .search-form .input-group .btn {
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Button Style----------- */\n";
echo '.btn, button , .btn.bordered:hover, .contact-form-grey .wpcf7 input[type="submit"],
.wp-block-button__link {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.btn.classic:hover,
.post-comments-wrapper p.form-submit input:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.post-comments-wrapper p.form-submit input:hover,
input[type="submit"]:hover, .search-form .input-group .btn:hover {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.btn.link,.blog-wrapper .bottom-meta .post-more a.read-more {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.btn.bordered {
	border-color: '. esc_attr( $theme_color ) .';
	color: '. esc_attr( $theme_color ) .';
}';
echo '.site-footer .cta-btn a.btn:hover {
	border-color: '. esc_attr( $secondary_color ) .';
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.header-slider-wrapper .btn.btn-outline:hover {
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';

echo "\n/* -----------Pagination Style----------- */\n";
echo '.nav.pagination > li.nav-item a,
.page-links .page-number,.post-comments .page-numbers {
	background-color: rgba('. esc_attr( $rgb ) .', 0.14);
}';
echo '.nav.pagination > li.nav-item a:hover,
.nav.pagination > li.nav-item.active a, 
.nav.pagination > li.nav-item.active span,
.page-links > .page-number,
.page-links .page-number:hover,
.post-comments .page-numbers.current {
	background: '. esc_attr( $theme_color ) .';
}';

echo "\n/*----------- Select Style ----------- */\n";
echo 'select:focus {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Header Styles---------------- */\n";
echo '.close:before, .close:after { 
	background: '. esc_attr( $theme_color ) .';
}';

echo '.header-phone span, .header-email span, .header-address span,.full-overlay .widget_nav_menu .zmm-dropdown-toggle { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.nav-link:focus, .nav-link:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo 'ul li.theme-color a {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*----------- Post Style----------- */\n";
echo '.top-meta ul li a:hover, 
.bottom-meta ul li a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Post Navigation ---------*/\n";
echo '.post-navigation .nav-links .nav-next a, .post-navigation .nav-links .nav-previous a {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation .nav-links .nav-next a:hover, .post-navigation .nav-links .nav-previous a:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.custom-post-nav > .prev-nav-link > .post-nav-text, .custom-post-nav > .next-nav-link > .post-nav-text {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation .custom-post-nav > div > a {
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*----------- Calender---------------- */\n";
echo '.calendar_wrap th ,tfoot td { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.widget_calendar caption {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Archive---------------- */\n";
echo '.widget_archive li:before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.comments-wrap > * i,
.comment-text span.reply a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Instagram widget---------------- */\n";
echo '.null-instagram-feed p a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Service Menu---------------- */\n";
echo '.widget .menu-item-object-pixzlo-service.current-menu-item a,.widget .menu-item-object-pixzlo-service a:hover,
.widget .menu-item-object-pixzlo-service a:before, .widget_categories ul li a:before,
.widget-area .widget_categories > ul > li.current-cat a,span.menu-icon { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.widget-area .testimonial-wrapper .testimonial-inner { 
	background : rgba('. esc_attr( $secondary_rgb ) .', 0.9);
}';




echo "\n/*----------- Post Nav---------------- */\n";
echo '.zozo_advance_tab_post_widget .nav-tabs .nav-item.show .nav-link, .widget .nav-tabs .nav-link.active { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Back to top---------------- */\n";
/*echo '.back-to-top > i { 
	background: '. esc_attr( $theme_color ) .';
}';*/
echo "\n/*----------- Shortcodes---------------- */\n";
echo '.entry-title a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.title-separator.separator-border { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Twitter---------------- */\n";
echo '.twitter-3 .tweet-info { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.twitter-wrapper.twitter-dark a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Pricing table---------------- */\n";
echo '.price-text,
.pricing-style-1 ul.pricing-features-list > li:before,
.pricing-style-1 .pricing-table-info > .price-after { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-3 .pricing-inner-wrapper,.pricing-table-wrapper .btn:hover { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-2 .pricing-inner-wrapper { 
	background: '. esc_attr( $theme_color ) .';
}';



echo '.pricing-style-3 .pricing-title::before,
.pricing-style-3 .pricing-title::after { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-3 ul.pricing-features-list > li {
	box-shadow: 0 7px 10px -9px rgba('. esc_attr( $rgb ) .', 0.8);
}';
echo "\n/*-----------Call To Action ---------------- */\n";
echo '.theme-gradient-bg {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%) !important;
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%) !important;
}';

echo "\n/*-----------Compare Pricing table---------------- */\n";
echo '.compare-pricing-wrapper .pricing-table-head, .compare-features-wrap { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.compare-pricing-style-3.compare-pricing-wrapper .btn:hover { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Counter Style---------------- */\n";
echo '.counter-wrapper.counter-style-2 .counter-value h3 { 
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}';
echo "\n/*-----------Testimonials---------------- */\n";
echo '.testimonial-wrapper.testimonial-1 .testimonial-excerpt { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-1 .testimonial-excerpt:after { 
	border-color: '. esc_attr( $theme_color ) .' transparent transparent;
}';
echo '.pixzlo-content .testimonial-2 .testimonial-inner:hover, .pixzlo-content .testimonial-2 .testimonial-inner:hover .testimonial-thumb img {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-2 .testimonial-inner:hover:after,.testimonial-2.testimonial-wrapper a.client-name {
	color: '. esc_attr( $theme_color ) .';
}';

echo '.testimonial-2 .testimonial-inner {
	-moz-box-shadow: 0 0 30px 1px rgba('. esc_attr( $rgb ) .', 0.4);
	-webkit-box-shadow: 0 0 30px 1px rgba('. esc_attr( $rgb ) .', 0.4);
	box-shadow: 0 0 30px 1px rgba('. esc_attr( $rgb ) .', 0.4);
}';

echo '.testimonial-wrapper.testimonial-1 .testimonial-inner:before, .testimonial-wrapper.testimonial-1 .testimonial-inner:after  {
	 background: rgba('. esc_attr( $rgb ) .', 0.4);
}';
echo '.testimonial-wrapper.testimonial-1 .testimonial-inner .testimonial-info-wrap:after {
	 color: rgba('. esc_attr( $rgb ) .', 0.1);
}';

echo '.testimonial-wrapper.testimonial-3 .testimonial-inner:before {
	 color: rgba('. esc_attr( $rgb ) .', 0.07);
}';

echo '.testimonial-wrapper.testimonial-3 .testimonial-inner .testimonial-excerpt:before {
	 color: '. esc_attr( $theme_color ) .';
}';






echo "\n/*-----------Events---------------- */\n";
echo '.events-date { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Team---------------- */\n";
echo '.team-wrapper.team-3 .team-inner > .team-thumb { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.team-wrapper.team-1 .team-social-wrap ul.social-icons > li > a:hover,
.team-wrapper.team-1 .team-inner:hover .team-name a,
.typo-white .client-name { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.team-wrapper.team-1 .team-inner .team-name a{ 
	color: '. esc_attr( $secondary_color ) .';
}';



echo "\n/*-----------Timeline---------------- */\n";
echo '.timeline-style-2 .timeline > li > .timeline-panel { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-style-2 .timeline > li > .timeline-panel:before { 
	border-left-color: '. esc_attr( $theme_color ) .';
	border-right-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-style-2 .timeline > li > .timeline-panel:after { 
	border-left-color: '. esc_attr( $theme_color ) .';
	border-right-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-style-3 .timeline > li > .timeline-sep-title { 
	background: -webkit-linear-gradient(56deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	background: linear-gradient(56deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
}';
echo '.cd-horizontal-timeline .filling-line { 
	background: '. esc_attr( $theme_color ) .';
}';


echo '.cd-horizontal-timeline .events-content em { 
	color: '. esc_attr( $theme_color ) .';
}';


echo '.cd-timeline-navigation a { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-timeline-navigation a:hover { 
	background: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------POPUP---------------- */\n";
echo '.modal-popup-wrapper .icon-wrap:after,
.modal-popup-wrapper .icon-wrap:before,
.modal-popup-wrapper .icon-wrap{
	background-color: '. esc_attr( $theme_color ) .';
}';




echo "\n/*-----------Portfolio---------------- */\n";
echo '.portfolio-masonry-layout .portfolio-angle .portfolio-title h4:after,
.portfolio-icons p a,
.portfolio-content-wrap .portfolio-categories > span{
	background-color: '. esc_attr( $theme_color ) .';
}';


echo '.portfolio-model-4 .portfolio-info .portfolio-meta .portfolio-meta-list > li > .entry-url {
	background-color: '. esc_attr( $secondary_color ) .';
}';

echo '.portfolio-model-4 .portfolio-info .portfolio-meta h6:before,
.portfolio-meta-list .entry-url.btn {
	color: '. esc_attr( $theme_color ) .';
}';

echo '.portfolio-single .custom-post-nav span.abs-title-icon {
	background-color: '. esc_attr( $theme_color ) .';
}';

echo '.service-info-wrap .custom-post-nav a,
.single-pixzlo-portfolio .custom-post-nav a {
	background-color: '. esc_attr( $theme_color ) .';
}';

echo '.portfolio-info .custom-post-nav .prev-nav-link > a,
 .portfolio-info .custom-post-nav .next-nav-link > a {
	background-color: '. esc_attr( $secondary_color ) .';
}';
 





/*CPT Filter Styles*/
echo '.portfolio-filter.filter-1 ul > li.active > a {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-masonry-layout .portfolio-classic .portfolio-content-wrap {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-2 .active a.portfolio-filter-item {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-2 li a:after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-slide .portfolio-content-wrap {
	background: '. esc_attr( $theme_color ) .';
}'; 
echo '.portfolio-minimal .portfolio-overlay-wrap:before,
.portfolio-minimal .portfolio-overlay-wrap:after { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-classic .portfolio-title a:before { 
	background: '. esc_attr( $theme_color ) .';
}';

echo '.portfolio-classic .portfolio-wrap:hover .portfolio-content-wrap { 
	background: '. esc_attr( $secondary_color ) .';
}';


echo '.portfolio-classic .portfolio-overlay-wrap:before {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-angle .portfolio-overlay-wrap:before { 
 background: linear-gradient(-45deg, rgba(0, 0, 0, 0.75) 0%, rgba('. esc_attr( $rgb ) .', 0.86) 100%);
 }';
echo '.portfolio-archive-title a:hover {
	color: '. esc_attr( $theme_color ) .';
}';

echo '.portfolio-model-4 .portfolio-info .portfolio-meta {
	border-color: '. esc_attr( $secondary_color ) .';
}';



echo "\n/*-----------Feature Box---------------- */\n";
echo 'span.feature-box-ribbon { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper.border-hover-color:hover {
    border-bottom-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.feature-box-wrapper.feature-box-style-1:hover .section-title > a,
.feature-box-style-3 h6.invisible-number,.feature-box-wrapper.theme-color-inv-number .invisible-number {
	color: '. esc_attr( $theme_color ) .';
}';

echo '.feature-box-wrapper.feature-box-style-1:hover {
    border-bottom-color: '. esc_attr( $theme_color ) .' !important;
}';

echo '.feature-list-2:hover {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.feature-box-style-3::before,.feature-box-style-2:hover,.feature-box-style-2.active {
    background-color: '. esc_attr( $theme_color ) .';
}';
if( $secondary_color ){
	echo '.feature-box-wrapper:hover .feature-box-icon.theme-hcolor-bg {
		background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
		background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	}';
}else{
	echo '.feature-box-wrapper:hover .feature-box-icon.theme-hcolor-bg {
		background-color: '. esc_attr( $theme_color ) .';
	}';
}
echo "\n/*-----------Section Title---------------- */\n";

echo '.section-title-wrapper .title-wrap > .section-title:before { 
	background: rgba('. esc_attr( $rgb ) .', 0.9);
}';
echo 'footer .widget-title:before { 
	background: rgba('. esc_attr( $rgb ) .', 0.5);
}';

echo "\n/*-----------Flipbox---------------- */\n";
echo "[class^='imghvr-shutter-out-']:before, [class*=' imghvr-shutter-out-']:before,
[class^='imghvr-shutter-in-']:after, [class^='imghvr-shutter-in-']:before, [class*=' imghvr-shutter-in-']:after, [class*=' imghvr-shutter-in-']:before,
[class^='imghvr-reveal-']:before, [class*=' imghvr-reveal-']:before {
	background-color: ". esc_attr( $theme_color ) .";
}";
echo "\n/*-----------Progress Bar---------------- */\n";
echo '.vc_progress_bar .vc_single_bar .vc_bar { 
	background: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Tabs---------------- */\n";
echo '.vc_toggle_round .vc_toggle_icon { 
	background: '. esc_attr( $theme_color ) .';
}';



echo "\n/*-----------Services---------------- */\n";
echo '.services-3 .services-inner > .services-thumb { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.services-read-more .read-more {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.services-wrapper.services-dark .services-title .entry-title:hover,
.services-wrapper.services-dark .services-read-more .read-more:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.custom-post-nav > div > a,
.services-wrapper .services-inner:hover .services-title a {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.services-wrapper.services-1 .abs-title-icon,
.pixzlo-pagination-carousel .service-icon-wrap {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.services-wrapper.services-1 .services-inner:hover {
    background-color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Blog---------------- */\n";

echo '.single-post-template .wp-post-image { 
	box-shadow: -25px 25px 0px 0'. esc_attr( $theme_color ) .';
}';

echo '.post-navigation-wrapper .nav-links.custom-post-nav > div:hover:after { 
	background: rgba('. esc_attr( $secondary_rgb ) .', 0.7);
}';

echo 'blockquote:before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation-wrapper .nav-links.custom-post-nav > div:hover:after { 
	background: rgba('. esc_attr( $rgb ) .', 1);
}';
echo '.post-navigation-wrapper .nav-links.custom-post-nav > div:after { 
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.blog .top-meta .post-meta ul li:before { 
	background: '. esc_attr( $theme_color ) .';
}';
echo 'span.post-nav-link-sub,.top-meta ul li i { 
	color: '. esc_attr( $theme_color ) .';
}';






echo '.blog-wrapper.blog-style-1 .blog-inner:hover a.post-title,
.blog-wrapper.blog-style-1 .post-author > a:hover,
article.post .article-inner:hover .entry-title a,
.widget_search .search-form .input-group .btn:hover { 
	color: '. esc_attr( $theme_color ) .';
}';	
echo '.blog-wrapper.blog-style-1 .blog-inner a.post-title:hover, .blog-wrapper .top-meta ul li .post-date a { 
	color: '. esc_attr( $theme_color ) .';
}';	

echo '.blog-wrapper .blog-inner:hover .post-thumb-overlay:before {
	border-color: rgba('. esc_attr( $rgb ) .', 0.9);
}';	



echo '.blog-style-3 .post-thumb { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.blog-inner .invisible-number { 
	color: '. esc_attr( $secondary_color ) .';
}';



echo '.blog-wrapper.blog-style-1 .blog-inner > .post-thumb::after {
    border-right-color: '. esc_attr( $theme_color ) .';
    border-left-color: '. esc_attr( $theme_color ) .';
}';
echo '.sticky-date .post-date,.post-meta > ul > li.nav-item .post-tags a:hover { 
	background-color: '. esc_attr( $theme_color ) .';
}';	
echo '.blog-style-1 .blog-inner:hover .post-thumb-overlay { 
	background-color: rgba('. esc_attr( $secondary_rgb ) .', 0.8); 
	
}';	
echo '.blog-list-layout .blog-inner .post-more a.read-more { 
	background-color: rgba('. esc_attr( $rgb ) .', 0.14);
	color: '. esc_attr( $theme_color ) .';
}';
echo '.blog-list-layout .blog-inner .post-more a.read-more:hover { 
	background-color: '. esc_attr( $theme_color ) .';	
}';
echo '.blog-list-layout .blog-inner:hover .entry-title .post-title,
.blog-classic-wrapper a.read-more { 
	color: '. esc_attr( $theme_color ) .';	
}';

echo '.blog-classic-wrapper .top-meta .post-date a { 
	color: rgba('. esc_attr( $rgb ) .', 0.8);
}';
echo '.blog-classic-wrapper .blog-list  { 
	border-color: '. esc_attr( $theme_color ) .';	
}';

 





echo "\n/*-----------Blog Center---------------- */\n";
echo "\n/*-----------Tour---------------- */\n";
echo '.vc_tta-style-modern .vc_tta-tab.vc_active a{ 
	background-color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*-----------Tabs---------------- */\n";
echo '.vc_tta.vc_tta-tabs.vc_general.vc_tta-style-classic .vc_active > a {
    border-top-color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*-----------Accordin---------------- */\n";
echo '.vc_tta.vc_tta-accordion.vc_tta-style-flat .vc_active .vc_tta-controls-icon-position-left.vc_tta-panel-title > a > i {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*-----------Contact Info---------------- */\n";
echo '.contact-info-wrapper.contact-info-style-2 .contact-mail a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Mailchimp---------------- */\n";

echo "\n/*-----------Contact form 7---------------- */\n";
echo '.wpcf7 input[type="submit"] { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.wpcf7 input[type="submit"]:hover {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo "\n/*-----------Shape Arrow---------------- */\n";
echo '.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper, 
.shape-arrow .wpb_column:last-child .feature-box-wrapper { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.shape-arrow .wpb_column:first-child .feature-box-wrapper::before,
.shape-arrow .wpb_column:nth-child(3) .feature-box-wrapper::before { 
	border-top-color: '. esc_attr( $theme_color ) .';
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo '.shape-arrow .wpb_column .feature-box-wrapper::before,
.shape-arrow .wpb_column .feature-box-wrapper::after,
.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper::before,
.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper::after,
.shape-arrow .wpb_column:last-child .feature-box-wrapper::before, 
.shape-arrow .wpb_column:last-child .feature-box-wrapper::after { 
	border-left-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Woocommerce---------------- */\n";
echo '.woocommerce ul.products li.product .price,
.woocommerce .product .price,
.woocommerce.single  .product .price,
.woocommerce p.stars a { 
	color: '. esc_attr( $theme_color ) .';
}';

echo '.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover { 
	background-color: '. esc_attr( $theme_color ) .';
}';

echo '.woocommerce .product .onsale { 
	background-color: '. esc_attr( $theme_color ) .';
}';

echo '.woocommerce.single .quantity input { 
	border-color: '. esc_attr( $theme_color ) .';
}';



echo '.woocommerce ul.products li.product .woocommerce-loop-product__title:hover,
.woocommerce ul.products li.product:hover .woocommerce-loop-product__title {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .widget_price_filter .ui-slider .ui-slider-range { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover { 
	background-color: '. esc_attr( $secondary_color ) .';
}';

echo '.dropdown-menu.cart-dropdown-menu .mini-view-cart a { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce #content input.button, .woocommerce #respond input#submit, 
.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, 
.woocommerce-page #content input.button, .woocommerce-page #respond input#submit, 
.woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button,
.woocommerce input.button.alt, .woocommerce input.button.disabled, .woocommerce input.button:disabled[disabled],
.cart_totals .wc-proceed-to-checkout a.checkout-button {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.woocommerce-info,
.woocommerce-message {
	border-top-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce-info::before,
.woocommerce-message::before {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.form-control:focus {
	border-color: '. esc_attr( $theme_color ) .' !important;
}';

echo '.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li a:active, 
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li span.page-numbers.current:hover
{
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .product .button:hover, 
.woocommerce.single .product .button:hover, 
.woocommerce button.button:hover, 
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce ul.products li.product .woo-thumb-wrap .added_to_cart:hover,
.woocommerce-page .woocommerce-message .button:hover,
.woocommerce a.added_to_cart:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';

echo '.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li span.page-numbers.current,
.woocommerce a.added_to_cart {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce ul.products li.product .woo-thumb-wrap .added_to_cart,
.woocommerce .widget_product_search button:hover,
.woocommerce nav.woocommerce-pagination ul li a {
	background: rgba('. esc_attr( $rgb ) .', 0.14);
}';


echo '.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, .woocommerce button.button.alt,
.woocommerce input.button.alt, .woocommerce .related.products h2:before {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .star-rating span::before,
.woocommerce .star-rating::before {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.woocommerce .product .button:hover, 
.woocommerce.single .product .button:hover, 
.woocommerce button.button:hover, 
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce .quantity .btn:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .widget.widget_product_categories li a:hover,
.woocommerce ul.product_list_widget li a:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.woo-top-meta select {     background-image: url('. esc_url( PIXZLO_ASSETS . '/images/icon-select.png' ) .'); }';

echo "\n/*-----------Widget---------------- */\n";
echo '.widget.widget_recent_entries li a:hover,
.vc_row .widgettitle,.widget_meta li a:hover {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.widget .widget-title:after {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.widget-area .zozo_contact_info_widget {
	background : rgba('. esc_attr( $secondary_rgb ) .', 0.8);
}';
echo '.widget-area .zozo_contact_info_widget .widget-title {
	background : '. esc_attr( $theme_color ) .';
}';






echo "\n/*-----------Mailchimp Widget---------------- */\n";
echo '.zozo-mc.btn:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.zozo-mc.btn {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo "\n/*-----------Footer---------------- */\n";
echo '.widget .footer-info .media::before,.widget_recent_entries span.post-date {
	color : '. esc_attr( $theme_color ) .';
}';

echo '.current_page_item a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.mptt-shortcode-wrapper ul.mptt-menu.mptt-navigation-tabs li.active a, .mptt-shortcode-wrapper ul.mptt-menu.mptt-navigation-tabs li:hover a { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.err-content .btn:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.err-content .btn { 
	border-color: '. esc_attr( $theme_color ) .';
	color : '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Gutenberg ---------------- */\n";
echo '.wp-block-button__link,.wp-block-file .wp-block-file__button { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.wp-block-quote,blockquote.wp-block-quote.is-style-large,
.wp-block-quote[style*="text-align:right"], .wp-block-quote[style*="text-align: right"] { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.is-style-outline { 
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Social Widget---------------- */\n";

echo 'ul.social-icons.social-hbg-theme > li a:hover,
ul.social-icons.social-bg-light > li a:hover {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo 'ul.social-icons.social-bg-light > li a:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo 'ul.social-icons.social-theme > li a, 
ul.social-icons.social-h-theme > li a:hover,
.custom-post-nav ul.social-icons > li > a:hover,
.topbar-items ul.social-icons > li > a:hover,
.top-meta ul li a:hover i,
.bottom-meta ul li a:hover i { 
	color: '. esc_attr( $theme_color ) .';
}';



$font_family_h6 = isset( $pixzlo_options['h6-typography']['font-family'] ) && $pixzlo_options['h6-typography']['font-family'] != '' ?  'font-family: '. $pixzlo_options['h6-typography']['font-family'] .';' : '';
echo '.widget_categories ul li,
.widget.widget_archive ul li,
.widget-area .widget.widget_nav_menu ul > li > a {
	'. ( $font_family_h6 ) .';
}';


$field = 'template-single-post-background-all';
if( isset( $pixzlo_options[$field]['background-image'] ) && $pixzlo_options[$field]['background-image'] != '' ){
	echo '.pixzlo-single-post .float-video-left-part { background-image: url('. esc_url( $pixzlo_options[$field]['background-image'] ) .'); }';
} 
$field = 'template-page-background-all';
if( isset( $pixzlo_options[$field]['background-image'] ) && $pixzlo_options[$field]['background-image'] != '' ){
	echo '.pixzlo-page .float-video-left-part { background-image: url('. esc_url( $pixzlo_options[$field]['background-image'] ) .'); }';
} 