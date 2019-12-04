<?php
$zozo_theme = wp_get_theme();
if($zozo_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $zozo_theme = wp_get_theme($template_dir);
}
$zozo_theme_version = $zozo_theme->get( 'Version' );
$zozo_theme_name = $zozo_theme->get('Name');
$zozothemes_url = 'http://zozothemes.com/';
$ins_demo_stat = get_theme_mod( 'pixzlo_demo_installed' );
$ins_demo_id = get_theme_mod( 'pixzlo_installed_demo_id' );
?>
<div class="wrap about-wrap welcome-wrap zozothemes-wrap">
	<h1 class="hide" style="display:none;"></h1>
	<div class="zozothemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "pixzlo" ) . ' ' . '<span>'. $zozo_theme_name .'</span>'; ?>
			<p class="theme-logo"><span class="theme-version"><?php echo esc_attr( $zozo_theme_version ); ?></span></p></h1>
			
			<div class="zozo-updated zozo-importer-notice importer-notice-success regenerate-thumb"><p><strong><?php echo esc_html__( "Demo data successfully imported. Now, please install and run", "pixzlo" ); ?> <a href="<?php echo admin_url();?>plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472" class="thickbox" title="<?php echo esc_attr__( "Regenerate Thumbnails", "pixzlo" ); ?>"><?php echo esc_html__( "Regenerate Thumbnails", "pixzlo" ); ?></a> <?php echo esc_html__( "plugin once", "pixzlo" ); ?>.</strong></p></div>
			
			<div class="about-text"><?php echo esc_html__( "Nice!", "pixzlo" ) . ' ' . esc_html( $zozo_theme_name ) . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "pixzlo" ); ?></div>
		</div>
		<h2 class="zozo-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=pixzlo' ),  esc_html__( "Support", "pixzlo" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Install Demos", "pixzlo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=zozothemes-plugins' ), esc_html__( "Plugins", "pixzlo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=system-status' ), esc_html__( "System Status", "pixzlo" ) );
			?>
		</h2>
	</div>
		
	 <div class="zozothemes-required-notices">
		<p class="notice-description warning-text"><?php echo esc_html__( "Installing a demo provides pages, posts, images, theme options, widgets and more. IMPORTANT: The required plugins need to be installed and activated before you install a demo.", "pixzlo" ); ?></p>
	</div>
	<div class="zozothemes-demo-title">
		<h3 class="one-page"><?php esc_html_e( 'Pixzlo Demos', 'pixzlo'); ?></h3>
	</div>
	<div class="zozothemes-demo-wrapper">
		<div class="features-section theme-demos theme-browser rendered">
			<?php 
				
				//Pixzlo Main
				$demo_array = array(
					'demo_id' 	=> 'demo',
					'demo_name' => esc_html__( 'Pixzlo', 'pixzlo' ),
					'demo_img'	=> 'demo-1.png',
					'demo_url'	=> 'http://demo.zozothemes.com/pixzlo/',
					'revslider'	=> '10'
				);
				pixzlo_demo_div_generater($demo_array, $ins_demo_stat, $ins_demo_id);
				
			?>
			
		</div>
	</div>
	
	<div class="zozothemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "pixzlo" ) . ' ' . $zozo_theme_name . '.'; ?></p>
    </div>
</div>
<?php
function pixzlo_demo_div_generater($demo_array, $ins_demo_stat, $ins_demo_id){
	$demo_class = '';
	if( $ins_demo_stat == 1 ){
		if( $ins_demo_id == $demo_array['demo_id'] ){
			$demo_class .= ' demo-actived';
		}else{
			$demo_class .= ' demo-inactive';
		}
	}else{
		$demo_class .= ' demo-active';
	}
	
	$revslider = isset( $demo_array['revslider'] ) && $demo_array['revslider'] != '' ? $demo_array['revslider'] : '';
	
?>
	<div class="theme zozothemes-demo-item<?php echo esc_attr( $demo_class ); ?>">
		<div class="demo-inner">
			<div class="theme-screenshot zozotheme-screenshot">
				<a href="<?php echo esc_url( $demo_array['demo_url'] ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/demo/' . $demo_array['demo_img'] ); ?>" /></a>
			</div>
			<h3 class="theme-name" id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><?php echo esc_attr( $demo_array['demo_name'] ); ?></h3>
			<div class="theme-actions theme-buttons">
				<a class="button button-primary button-install-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" data-revslider="<?php echo esc_attr( $revslider ); ?>" href="#">
				<?php esc_html_e( "Install", "pixzlo" ); ?>
				</a>
				<a class="button button-primary button-uninstall-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" href="#">
				<?php esc_html_e( "Uninstall", "pixzlo" ); ?>
				</a>
				<a class="button button-primary" target="_blank" href="<?php echo esc_url( $demo_array['demo_url'] ); ?>">
				<?php esc_html_e( "Preview", "pixzlo" ); ?>
				</a>
			</div>
			
			<div class="theme-requirements" data-requirements="<?php 
				printf( '<h2>%1$s</h2> <p>%2$s</p> <h3>%3$s</h3> <ol><li>%4$s</li></ol>', 
					esc_html__( 'WARNING:', 'pixzlo' ), 
					esc_html__( 'Importing demo content will give you pages, posts, theme options, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minutes to complete.', 'pixzlo' ),
					esc_html__( 'DEMO REQUIREMENTS:', 'pixzlo' ),
					esc_html__( 'Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.', 'pixzlo' )
				);
			?>">
			</div>
			<div class="zozo-demo-import-loader zozo-preview-<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><i class="dashicons dashicons-admin-generic"></i></div>
		</div>
		<div class="installation-progress">
			<p></p>
			<div class="progress" style="width:0%">
				<div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
			</div>
		</div>
	</div>
<?php
}