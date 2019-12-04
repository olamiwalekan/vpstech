<?php

	

class PixzloRedux{



	function __construct(){

		define( 'PIXZLO_CORE_REDUX', plugin_dir_path(__FILE__) . 'admin/ReduxCore' );

	}

	

	function pixzloReduxInit(){

		require_once( PIXZLO_CORE_REDUX . '/framework.php' );

		require_once( PIXZLO_CORE_DIR . 'admin/theme-config/config.php' );

	}



}



$pixzlo_redux = new PixzloRedux();

$pixzlo_redux->pixzloReduxInit();