<?php
/* Pixzlo Page Options */
$prefix = 'pixzlo_post_';
$fields = array(
	array( 
		'label'	=> esc_html__( 'Post General Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are single post general settings.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Post Layout', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post single view.', 'pixzlo-core' ), 
		'id'	=> $prefix.'layout',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
			'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )			
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Content Padding Option', 'pixzlo-core' ),
		'id'	=> $prefix.'content_padding_opt',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Content Padding', 'pixzlo-core' ), 
		'desc'	=> esc_html__( 'Set the top/right/bottom/left padding of post content.', 'pixzlo-core' ),
		'id'	=> $prefix.'content_padding',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'space',
		'required'	=> array( $prefix.'content_padding_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Template Option', 'pixzlo-core' ),
		'id'	=> $prefix.'template_opt',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Template', 'pixzlo-core' ),
		'id'	=> $prefix.'template',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'no-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/1.png' ), 
			'right-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/2.png' ), 
			'left-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/3.png' ), 
			'both-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/4.png' ), 
		),
		'default'	=> 'right-sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Left Sidebar', 'pixzlo-core' ),
		'id'	=> $prefix.'left_sidebar',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Right Sidebar', 'pixzlo-core' ),
		'id'	=> $prefix.'right_sidebar',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Sidebar On Mobile', 'pixzlo-core' ),
		'id'	=> $prefix.'sidebar_mobile',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Show', 'pixzlo-core' ),
			'0' => esc_html__( 'Hide', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Featured Slider', 'pixzlo-core' ),
		'id'	=> $prefix.'featured_slider',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Full Width Wrap', 'pixzlo-core' ),
		'id'	=> $prefix.'full_wrap',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Items Option', 'pixzlo-core' ),
		'id'	=> $prefix.'items_opt',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Needed single post items drag from disabled and put enabled part.', 'pixzlo-core' ),
		'id'	=> $prefix.'items',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'dragdrop',
		'options' => array ( 
			'all' => array( 'title', 'top-meta', 'thumb', 'content', 'bottom-meta' ),
			'items' => array( 
				'title' 	=> esc_html__( 'Title', 'pixzlo-core' ),
				'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
				'thumb' 	=> esc_html__( 'Thumbnail', 'pixzlo-core' ),
				'content' 	=> esc_html__( 'Content', 'pixzlo-core' ),
				'bottom-meta'		=> esc_html__( 'Bottom Meta', 'pixzlo-core' )
			)
		),
		'default'	=> 'title,top-meta,thumb,content,bottom-meta',
		'required'	=> array( $prefix.'items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Overlay', 'pixzlo-core' ),
		'id'	=> $prefix.'overlay_opt',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Overlay Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Needed overlay post items drag from disabled and put enabled part.', 'pixzlo-core' ),
		'id'	=> $prefix.'overlay_items',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'dragdrop',
		'options' => array ( 
			'all' => array( 'title', 'top-meta', 'bottom-meta' ),
			'items' => array( 
				'title' 	=> esc_html__( 'Title', 'pixzlo-core' ),
				'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
				'bottom-meta'		=> esc_html__( 'Bottom Meta', 'pixzlo-core' )
			)
		),
		'default'	=> 'title',
		'required'	=> array( $prefix.'overlay_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Page Items Option', 'pixzlo-core' ),
		'id'	=> $prefix.'page_items_opt',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Page Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Needed post page items drag from disabled and put enabled part.', 'pixzlo-core' ),
		'id'	=> $prefix.'page_items',
		'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
		'type'	=> 'dragdrop',
		'options' => array ( 
			'all' => array( 'post-items', 'author-info', 'related-slider', 'post-nav', 'comment' ),
			'items' => array( 
				'post-items' 	=> esc_html__( 'Post Items', 'pixzlo-core' ),
				'author-info'	=> esc_html__( 'Author Info', 'pixzlo-core' ),
				'related-slider'=> esc_html__( 'Related Slider', 'pixzlo-core' ),
				'post-nav' 	=> esc_html__( 'Post Nav', 'pixzlo-core' ),
				'comment' 	=> esc_html__( 'Comment', 'pixzlo-core' )
			)
		),
		'default'	=> 'post-items,author-info,related-slider,post-nav,comment',
		'required'	=> array( $prefix.'page_items_opt', 'custom' )
	),
	//Header
	array( 
		'label'	=> esc_html__( 'Header General Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header general settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Layout', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post header layout.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_layout',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
			'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Type', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post header type.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_type',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'default' => esc_html__( 'Default', 'pixzlo-core' ),
			'left-sticky' => esc_html__( 'Left Sticky', 'pixzlo-core' ),
			'right-sticky' => esc_html__( 'Right Sticky', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Background Image', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header background image for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'image',
		'id'	=> $prefix.'header_bg_img',
		'required'	=> array( $prefix.'header_type', 'default' )
	),
	array( 
		'label'	=> esc_html__( 'Header Items Options', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header general items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_items',
		'dd_fields' => array ( 
			'Normal' => array( 
				'header-topbar' 	=> esc_html__( 'Topbar', 'pixzlo-core' ),
				'header-logo'	=> esc_html__( 'Logo Bar', 'pixzlo-core' )
			),
			'Sticky' => array( 
				'header-nav' 	=> esc_html__( 'Navbar', 'pixzlo-core' )
			),
			'disabled' => array()
		),
		'required'	=> array( $prefix.'header_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Absolute Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header absolute to change header look transparent.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_absolute_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header sticky options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_sticky_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'sticky' => esc_html__( 'Header Sticky Part', 'pixzlo-core' ),
			'sticky-scroll' => esc_html__( 'Sticky Scroll Up', 'pixzlo-core' ),
			'none' => esc_html__( 'None', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Options', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_topbar_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_topbar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar sticky height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_topbar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header topbar skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header topbar skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_topbar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_topbar_font',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_topbar_bg',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_topbar_link',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_topbar_border',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_topbar_padding',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header top barsticky skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_topbar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header top barsticky font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_topbar_sticky_font',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header top barsticky background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_topbar_sticky_bg',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header top barsticky link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_topbar_sticky_link',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header top barsticky border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_topbar_sticky_border',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header top barsticky padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_topbar_sticky_padding',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header topbar items enable options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_topbar_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header topbar items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_topbar_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'header-topbar-date' => esc_html__( 'Date', 'pixzlo-core' ),						
			),
			'Center' => array(),
			'Right' => array(),
			'disabled' => array(
				'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
				'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
				'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'pixzlo-core' ),
				'header-topbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
				'header-topbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
				'header-phone'   		=> esc_html__( 'Phone Number', 'pixzlo-core' ),
				'header-address'  		=> esc_html__( 'Address Text', 'pixzlo-core' ),
				'header-email'   		=> esc_html__( 'Email', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'header_topbar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Options', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_logo_bar_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_logo_bar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_logo_bar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header logo bar skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_logo_bar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_logo_bar_font',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_logo_bar_bg',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_logo_bar_link',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_logo_bar_border',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_logo_bar_padding',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar sticky skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_logobar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_logobar_sticky_font',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_logobar_sticky_bg',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_logobar_sticky_link',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_logobar_sticky_border',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_logobar_sticky_padding',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar items enable options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_logo_bar_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_logo_bar_items',
		'dd_fields' => array ( 
			'Left'  => array(),
			'Center' => array(
				'header-logobar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),
			),
			'Right' => array(),
			'disabled' => array(
				'header-logobar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
				'header-logobar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
				'header-logobar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
				'header-logobar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
				'header-logobar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
				'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),
				'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' ),
				'header-cart'   		=> esc_html__( 'Cart', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'header_logo_bar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Floating Navbar', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This option only for default header not for absolute header.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_navbar_floating',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enabled', 'pixzlo-core' ),
			'0' => esc_html__( 'Disabled', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Options', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_navbar_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_navbar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Height', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky height for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_navbar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header navbar skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header navbar skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_navbar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_navbar_font',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_navbar_bg',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_navbar_link',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_navbar_border',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_navbar_padding',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header navbar sticky skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_navbar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_navbar_sticky_font',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_navbar_sticky_bg',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_navbar_sticky_link',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_navbar_sticky_border',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_navbar_sticky_padding',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header navbar items enable options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_navbar_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header navbar items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_navbar_items',
		'dd_fields' => array ( 
			'Left'  => array(											
				'header-navbar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
			),
			'Center' => array(
			),
			'Right' => array(
				'header-navbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
			),
			'disabled' => array(
				'header-navbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
				'header-navbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
				'header-navbar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),
				'header-navbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
				'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),
				'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' ),

				'header-navbar-sticky-logo'	=> esc_html__( 'Sticky Logo', 'pixzlo-core' ),

				'header-cart'   		=> esc_html__( 'Cart', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'header_navbar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Options', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header sticky part option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_stikcy_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Width', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy part width for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_stikcy_width',
		'property' => 'width',
		'required'	=> array( $prefix.'header_stikcy_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header stikcy skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header stikcy skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_stikcy_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_stikcy_font',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_stikcy_bg',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_stikcy_link',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_stikcy_border',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_stikcy_padding',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose header stikcy items enable options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_stikcy_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are header stikcy items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_stikcy_items',
		'dd_fields' => array ( 
			'Top'  => array(
				'header-fixed-logo' => esc_html__( 'Logo', 'pixzlo-core' )
			),
			'Middle'  => array(
				'header-fixed-menu'	=> esc_html__( 'Menu', 'pixzlo-core' )					
			),
			'Bottom'  => array(
				'header-fixed-social'	=> esc_html__( 'Social', 'pixzlo-core' )					
			),
			'disabled' => array(
				'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
				'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
				'header-fixed-search'	=> esc_html__( 'Search Form', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'header_stikcy_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title bar settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Post Title Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post title enable or disable.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Title Text', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'If this post title is empty, then showing current post default title.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_text',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Description', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter post title description.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_desc',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'textarea',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Parallax', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post title background parallax.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_parallax',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Video Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post title background video option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_video_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Video', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter youtube video ID. Example: ZSt9tm3RoUU.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_post_title_video',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_video_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post title bar items option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'post_title_items_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title bar items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'post_title_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'title' => esc_html__( 'Post Title Text', 'pixzlo-core' ),
			),
			'Center'  => array(
				
			),
			'Right'  => array(
				'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
			),
			'disabled' => array()
		),
		'required'	=> array( $prefix.'post_title_items_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are post title skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'label',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose post title skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'post_title_skin_opt',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'post_title_font',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'post_title_bg',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Image', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter post title background image url.', 'pixzlo-core' ), 
		'id'	=> $prefix.'post_title_bg_img',
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'url',
		'default'	=> '',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'post_title_link',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'post_title_border',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'post_title_padding',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Overlay', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are post title overlay color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'post_title_overlay',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	//Footer
	array( 
		'label'	=> 'Footer General',
		'desc'	=> esc_html__( 'These all are header footer settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer layout for current post.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_layout',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
			'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Hidden Footer', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose hidden footer option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'hidden_footer',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are footer skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Skin Settings', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer skin settings options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_font',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Image', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer background image for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'image',
		'id'	=> $prefix.'footer_bg_img',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_bg',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Overlay', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer background overlay color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_bg_overlay',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_link',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_border',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_padding',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer items enable options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_items_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'footer_items',
		'dd_fields' => array ( 
			'Enabled'  => array(
				'footer-bottom'	=> esc_html__( 'Footer Bottom', 'pixzlo-core' )
			),
			'disabled' => array(
				'footer-top' => esc_html__( 'Footer Top', 'pixzlo-core' ),
				'footer-middle'	=> esc_html__( 'Footer Middle', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'footer_items_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Top',
		'desc'	=> esc_html__( 'These all are footer top settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Skin', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer top skin options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_top_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer top font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_top_font',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_top_bg',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer top link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_top_link',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer top border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_top_border',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer top padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_top_padding',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Top Columns and Sidebars Settings',
		'desc'	=> esc_html__( 'These all are footer top columns and sidebar settings.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer layout option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_top_layout_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_top_layout',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'3-3-3-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-1.png', 
			'4-4-4'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-2.png', 
			'3-6-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-3.png', 
			'6-6'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-4.png', 
			'9-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-5.png', 
			'3-9'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-6.png', 
			'12'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-7.png'
		),
		'default'	=> '4-4-4',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer First Column',
		'desc'	=> esc_html__( 'Select footer first column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_top_sidebar_1',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Second Column',
		'desc'	=> esc_html__( 'Select footer second column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_top_sidebar_2',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Third Column',
		'desc'	=> esc_html__( 'Select footer third column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_top_sidebar_3',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Fourth Column',
		'desc'	=> esc_html__( 'Select footer fourth column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_top_sidebar_4',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Middle',
		'desc'	=> esc_html__( 'These all are footer middle settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Skin', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer middle skin options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_middle_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer middle font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_middle_font',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_middle_bg',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer middle link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_middle_link',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer middle border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_middle_border',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer middle padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_middle_padding',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Middle Columns and Sidebars Settings',
		'desc'	=> esc_html__( 'These all are footer middle columns and sidebar settings.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer layout option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_middle_layout_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_middle_layout',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'3-3-3-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-1.png', 
			'4-4-4'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-2.png', 
			'3-6-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-3.png', 
			'6-6'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-4.png', 
			'9-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-5.png', 
			'3-9'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-6.png', 
			'12'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-7.png'
		),
		'default'	=> '4-4-4',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer First Column',
		'desc'	=> esc_html__( 'Select footer first column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_1',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Second Column',
		'desc'	=> esc_html__( 'Select footer second column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_2',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Third Column',
		'desc'	=> esc_html__( 'Select footer third column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_3',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Fourth Column',
		'desc'	=> esc_html__( 'Select footer fourth column widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_4',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Bottom',
		'desc'	=> esc_html__( 'These all are footer bottom settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Fixed', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom fixed option.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_bottom_fixed',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'1' => esc_html__( 'Enable', 'pixzlo-core' ),
			'0' => esc_html__( 'Disable', 'pixzlo-core' )			
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are footer bottom skin settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Skin', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom skin options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_bottom_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Font Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom font color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_bottom_font',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Background', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom background color for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_bottom_bg',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Link Color', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom link color settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_bottom_link',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Border', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom border settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_bottom_border',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Padding', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom padding settings for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_bottom_padding',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Widget Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom widget options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_bottom_widget_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> 'Footer Bottom Widget',
		'desc'	=> esc_html__( 'Select footer bottom widget.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'id'	=> $prefix.'footer_bottom_widget',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_bottom_widget_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Items Option', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom items options.', 'pixzlo-core' ), 
		'id'	=> $prefix.'footer_bottom_items_opt',
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Items', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom items for currrent post.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'footer_bottom_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'copyright' => esc_html__( 'Copyright Text', 'pixzlo-core' )
			),
			'Center'  => array(
				'menu'	=> esc_html__( 'Footer Menu', 'pixzlo-core' )
			),
			'Right'  => array(),
			'disabled' => array(
				'social'	=> esc_html__( 'Footer Social Links', 'pixzlo-core' ),
				'widget'	=> esc_html__( 'Custom Widget', 'pixzlo-core' )
			)
		),
		'required'	=> array( $prefix.'footer_bottom_items_opt', 'custom' )
	),
	//Header Slider
	array( 
		'label'	=> esc_html__( 'Slider', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This header slider settings.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Slider Option', 'pixzlo-core' ),
		'id'	=> $prefix.'header_slider_opt',
		'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'bottom' => esc_html__( 'Below Header', 'pixzlo-core' ),
			'top' => esc_html__( 'Above Header', 'pixzlo-core' ),
			'none' => esc_html__( 'None', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Slider Shortcode', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This is the place for enter slider shortcode. Example revolution slider shortcodes.', 'pixzlo-core' ), 
		'id'	=> $prefix.'header_slider',
		'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
		'type'	=> 'textarea',
		'default'	=> ''
	),
	//Post Format
	array( 
		'label'	=> esc_html__( 'Video', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed video format, then you must choose video type and give video id.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Video Modal', 'pixzlo-core' ),
		'id'	=> $prefix.'video_modal',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'onclick' => esc_html__( 'On Click Run Video', 'pixzlo-core' ),
			'overlay' => esc_html__( 'Modal Box Video', 'pixzlo-core' ),
			'direct' => esc_html__( 'Direct Video', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Video Type', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose video type.', 'pixzlo-core' ), 
		'id'	=> $prefix.'video_type',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'' => esc_html__( 'None', 'pixzlo-core' ),
			'youtube' => esc_html__( 'Youtube', 'pixzlo-core' ),
			'vimeo' => esc_html__( 'Vimeo', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom Video', 'pixzlo-core' )
		),
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Video ID', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter Video ID Example: ZSt9tm3RoUU. If you choose custom video type then you enter custom video url and video must be mp4 format.', 'pixzlo-core' ), 
		'id'	=> $prefix.'video_id',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	array( 
		'label'	=> esc_html__( 'Audio', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed audio format, then you must give audio id.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Audio Type', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Choose audio type.', 'pixzlo-core' ), 
		'id'	=> $prefix.'audio_type',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'' => esc_html__( 'None', 'pixzlo-core' ),
			'soundcloud' => esc_html__( 'Soundcloud', 'pixzlo-core' ),
			'custom' => esc_html__( 'Custom Audio', 'pixzlo-core' )
		),
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Audio ID', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter soundcloud audio ID. Example: 315307209.', 'pixzlo-core' ), 
		'id'	=> $prefix.'audio_id',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	array( 
		'label'	=> esc_html__( 'Gallery', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed gallery format, then you must choose gallery images here.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Gallery Modal', 'pixzlo-core' ),
		'id'	=> $prefix.'gallery_modal',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'default' => esc_html__( 'Default Gallery', 'pixzlo-core' ),
			'popup' => esc_html__( 'Popup Gallery', 'pixzlo-core' ),
			'grid' => esc_html__( 'Grid Popup Gallery', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Choose Gallery Images', 'pixzlo-core' ),
		'id'	=> $prefix.'gallery',
		'type'	=> 'gallery',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	array( 
		'label'	=> esc_html__( 'Quote', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed quote format, then you must fill the quote text and author name box.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Quote Modal', 'pixzlo-core' ),
		'id'	=> $prefix.'quote_modal',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
			'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
			'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
			'none' => esc_html__( 'None', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Quote Text', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter quote text.', 'pixzlo-core' ), 
		'id'	=> $prefix.'quote_text',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'textarea',
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Quote Author', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter quote author name.', 'pixzlo-core' ), 
		'id'	=> $prefix.'quote_author',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	array( 
		'label'	=> esc_html__( 'Link', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed link format, then you must fill the external link box.', 'pixzlo-core' ), 
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Link Modal', 'pixzlo-core' ),
		'id'	=> $prefix.'link_modal',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
			'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
			'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
			'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
			'none' => esc_html__( 'None', 'pixzlo-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Link Text', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter link text to show.', 'pixzlo-core' ), 
		'id'	=> $prefix.'link_text',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'External Link', 'pixzlo-core' ),
		'desc'	=> esc_html__( 'Enter external link.', 'pixzlo-core' ), 
		'id'	=> $prefix.'extrenal_link',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
		'type'	=> 'url',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
	),
	
);
/**
 * Instantiate the class with all variables to create a meta box
 * var $id string meta box id
 * var $title string title
 * var $fields array fields
 * var $page string|array post type to add meta box to
 * var $js bool including javascript or not
 */
 
$post_box = new Custom_Add_Meta_Box( 'pixzlo_post_metabox', esc_html__( 'Pixzlo Post Options', 'pixzlo-core' ), $fields, 'post', true );
/* Pixzlo Page Options */
//$prefix = 'pixzlo_page_';
function pixzloMetaboxFields( $prefix ){
	
	$pixzlo_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	$pixzlo_nav_menus = array( "none" => esc_html__( "None", "pixzlo" ) );
	foreach( $pixzlo_menus as $menu ){
		$pixzlo_nav_menus[$menu->slug] = $menu->name;
	}
			
	$fields = array(
		array( 
			'label'	=> esc_html__( 'Page General Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page general settings.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Page Layout', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current post single view.', 'pixzlo-core' ), 
			'id'	=> $prefix.'layout',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )			
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Page Content Padding Option', 'pixzlo-core' ),
			'id'	=> $prefix.'content_padding_opt',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Page Content Padding', 'pixzlo-core' ), 
			'desc'	=> esc_html__( 'Set the top/right/bottom/left padding of page content.', 'pixzlo-core' ),
			'id'	=> $prefix.'content_padding',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'space',
			'required'	=> array( $prefix.'content_padding_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Background Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose color setting for current page background.', 'pixzlo-core' ),
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'main_bg_color'
		),
		array( 
				'label'	=> esc_html__( 'Page Background Image', 'pixzlo-core' ),
				'desc'	=> esc_html__( 'Choose custom logo image for current page.', 'pixzlo-core' ), 
				'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
				'type'	=> 'image',
				'id'	=> $prefix.'main_bg_image'
			),
		array( 
			'label'	=> esc_html__( 'Page Margin', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are margin settings for current page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'main_margin'
		),
		array( 
			'label'	=> esc_html__( 'Page Template Option', 'pixzlo-core' ),
			'id'	=> $prefix.'template_opt',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Page Template', 'pixzlo-core' ),
			'id'	=> $prefix.'template',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'no-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/1.png' ), 
				'right-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/2.png' ), 
				'left-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/3.png' ), 
				'both-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/4.png' ), 
			),
			'default'	=> 'right-sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Left Sidebar', 'pixzlo-core' ),
			'id'	=> $prefix.'left_sidebar',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Right Sidebar', 'pixzlo-core' ),
			'id'	=> $prefix.'right_sidebar',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Sidebar On Mobile', 'pixzlo-core' ),
			'id'	=> $prefix.'sidebar_mobile',
			'tab'	=> esc_html__( 'General', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Show', 'pixzlo-core' ),
				'0' => esc_html__( 'Hide', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header General Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header general settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Layout', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current page header layout.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_layout',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Type', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current page header type.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_type',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'default' => esc_html__( 'Default', 'pixzlo-core' ),
				'left-sticky' => esc_html__( 'Left Sticky', 'pixzlo-core' ),
				'right-sticky' => esc_html__( 'Right Sticky', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Background Image', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header background image for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'header_bg_img',
			'required'	=> array( $prefix.'header_type', 'default' )
		),
		array( 
			'label'	=> esc_html__( 'Header Items Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header general items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_items',
			'dd_fields' => array ( 
				'Normal' => array( 
					'header-topbar' 	=> esc_html__( 'Topbar', 'pixzlo-core' ),
					'header-logo'	=> esc_html__( 'Logo Bar', 'pixzlo-core' )
				),
				'Sticky' => array( 
					'header-nav' 	=> esc_html__( 'Navbar', 'pixzlo-core' )
				),
				'disabled' => array()
			),
			'required'	=> array( $prefix.'header_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Absolute Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header absolute to change header look transparent.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_absolute_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header sticky options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_sticky_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'sticky' => esc_html__( 'Header Sticky Part', 'pixzlo-core' ),
				'sticky-scroll' => esc_html__( 'Sticky Scroll Up', 'pixzlo-core' ),
				'none' => esc_html__( 'None', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose secondary space option for enable secondary menu space for current page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_secondary_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'enable' => esc_html__( 'Enable', 'pixzlo-core' ),
				'disable' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Animate Type', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose secondary space option animate type for current page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_secondary_animate',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array(
				'left-push'		=> esc_html__( 'Left Push', 'pixzlo-core' ),
				'left-overlay'	=> esc_html__( 'Left Overlay', 'pixzlo-core' ),
				'right-push'	=> esc_html__( 'Right Push', 'pixzlo-core' ),
				'right-overlay'	=> esc_html__( 'Right Overlay', 'pixzlo-core' ),
				'full-overlay'	=> esc_html__( 'Full Page Overlay', 'pixzlo-core' ),
			),
			'default'	=> 'left-push',
			'required'	=> array( $prefix.'header_secondary_opt', 'enable' )
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Width', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Set secondary space width for current page. Example 300', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_secondary_width',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_secondary_opt', 'enable' )
		),
		array( 
			'label'	=> esc_html__( 'Custom Logo', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose custom logo image for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'custom_logo',
		),
		array( 
			'label'	=> esc_html__( 'Custom Sticky Logo', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose custom sticky logo image for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'custom_sticky_logo',
		),
		array( 
			'label'	=> esc_html__( 'Select Navigation Menu', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose navigation menu for current page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'nav_menu',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => $pixzlo_nav_menus
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_topbar_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_topbar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar sticky height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_topbar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header topbar skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header topbar skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_topbar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_topbar_font',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_topbar_bg',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_topbar_link',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_topbar_border',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_topbar_padding',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header top barsticky skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_topbar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header top barsticky font color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_topbar_sticky_font',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header top barsticky background color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_topbar_sticky_bg',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header top barsticky link color settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_topbar_sticky_link',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header top barsticky border settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_topbar_sticky_border',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header top barsticky padding settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_topbar_sticky_padding',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header topbar items enable options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_topbar_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header topbar items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_topbar_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'header-topbar-date' => esc_html__( 'Date', 'pixzlo-core' ),						
				),
				'Center' => array(),
				'Right' => array(),
				'disabled' => array(
					'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'pixzlo-core' ),
					'header-topbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-topbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
					'header-phone'   		=> esc_html__( 'Phone Number', 'pixzlo-core' ),
					'header-address'  		=> esc_html__( 'Address Text', 'pixzlo-core' ),
					'header-email'   		=> esc_html__( 'Email', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'header_topbar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_logo_bar_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_logo_bar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_logo_bar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header logo bar skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_logo_bar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_logo_bar_font',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_logo_bar_bg',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_logo_bar_link',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_logo_bar_border',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_logo_bar_padding',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar sticky skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_logobar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky font color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_logobar_sticky_font',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky background color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_logobar_sticky_bg',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky link color settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_logobar_sticky_link',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky border settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_logobar_sticky_border',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky padding settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_logobar_sticky_padding',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar items enable options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_logo_bar_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_logo_bar_items',
			'dd_fields' => array ( 
				'Left'  => array(),
				'Center' => array(
					'header-logobar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),
				),
				'Right' => array(),
				'disabled' => array(
					'header-logobar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-logobar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-logobar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
					'header-logobar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-logobar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
					'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),
					'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' ),
					'header-cart'   		=> esc_html__( 'Cart', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'header_logo_bar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Floating Navbar', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This option only for default header not for absolute header.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_navbar_floating',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enabled', 'pixzlo-core' ),
				'0' => esc_html__( 'Disabled', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_navbar_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_navbar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky height for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_navbar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header navbar skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header navbar skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_navbar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_navbar_font',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_navbar_bg',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_navbar_link',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_navbar_border',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_navbar_padding',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header navbar sticky skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_navbar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky font color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_navbar_sticky_font',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky background color for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_navbar_sticky_bg',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky link color settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_navbar_sticky_link',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky border settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_navbar_sticky_border',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky padding settings for currrent post.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_navbar_sticky_padding',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header navbar items enable options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_navbar_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header navbar items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_navbar_items',
			'dd_fields' => array ( 
				'Left'  => array(											
					'header-navbar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
				),
				'Center' => array(
				),
				'Right' => array(
					'header-navbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
				),
				'disabled' => array(
					'header-navbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-navbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-navbar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),
					'header-navbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),
					'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' ),

					'header-navbar-sticky-logo'	=> esc_html__( 'Sticky Logo', 'pixzlo-core' ),

					'header-cart'   		=> esc_html__( 'Cart', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'header_navbar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header sticky part option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_stikcy_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Width', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy part width for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_stikcy_width',
			'property' => 'width',
			'required'	=> array( $prefix.'header_stikcy_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header stikcy skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header stikcy skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_stikcy_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_stikcy_font',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_stikcy_bg',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_stikcy_link',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_stikcy_border',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_stikcy_padding',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose header stikcy items enable options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_stikcy_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are header stikcy items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_stikcy_items',
			'dd_fields' => array ( 
				'Top'  => array(
					'header-fixed-logo' => esc_html__( 'Logo', 'pixzlo-core' )
				),
				'Middle'  => array(
					'header-fixed-menu'	=> esc_html__( 'Menu', 'pixzlo-core' )					
				),
				'Bottom'  => array(
					'header-fixed-social'	=> esc_html__( 'Social', 'pixzlo-core' )					
				),
				'disabled' => array(
					'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-fixed-search'	=> esc_html__( 'Search Form', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'header_stikcy_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title bar settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Page Title Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page title enable or disable.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Page Title Text', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'If this page title is empty, then showing current page default title.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_text',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Description', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter page title description.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_desc',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Parallax', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page title background parallax.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_parallax',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Video Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page title background video option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_video_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Video', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter youtube video ID. Example: ZSt9tm3RoUU.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_page_title_video',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_video_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page title bar items option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'page_title_items_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title bar items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'page_title_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'title' => esc_html__( 'Page Title Text', 'pixzlo-core' ),
				),
				'Center'  => array(
					
				),
				'Right'  => array(
					'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
				),
				'disabled' => array(
					'description' => esc_html__( 'Page Title Description', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'page_title_items_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are page title skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'label',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose page title skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'page_title_skin_opt',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'page_title_font',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'page_title_bg',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Image', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter page title background image url.', 'pixzlo-core' ), 
			'id'	=> $prefix.'page_title_bg_img',
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> '',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'page_title_link',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'page_title_border',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'page_title_padding',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Overlay', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are page title overlay color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Header', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'page_title_overlay',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer General',
			'desc'	=> esc_html__( 'These all are header footer settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer layout for current page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_layout',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'wide' => esc_html__( 'Wide', 'pixzlo-core' ),
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Hidden Footer', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose hidden footer option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'hidden_footer',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are footer skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Skin Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer skin settings options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_font',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Image', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer background image for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'footer_bg_img',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_bg',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Overlay', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer background overlay color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_bg_overlay',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_link',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_border',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_padding',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer items enable options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_items_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'footer_items',
			'dd_fields' => array ( 
				'Enabled'  => array(
					'footer-bottom'	=> esc_html__( 'Footer Bottom', 'pixzlo-core' )
				),
				'disabled' => array(
					'footer-top' => esc_html__( 'Footer Top', 'pixzlo-core' ),
					'footer-middle'	=> esc_html__( 'Footer Middle', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'footer_items_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Top',
			'desc'	=> esc_html__( 'These all are footer top settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Skin', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer top skin options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_top_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer top font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_top_font',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_top_bg',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer top link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_top_link',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer top border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_top_border',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer top padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_top_padding',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Top Columns and Sidebars Settings',
			'desc'	=> esc_html__( 'These all are footer top columns and sidebar settings.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer layout option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_top_layout_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_top_layout',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'3-3-3-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-1.png', 
				'4-4-4'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-2.png', 
				'3-6-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-3.png', 
				'6-6'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-4.png', 
				'9-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-5.png', 
				'3-9'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-6.png', 
				'12'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-7.png'
			),
			'default'	=> '4-4-4',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer First Column',
			'desc'	=> esc_html__( 'Select footer first column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_top_sidebar_1',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Second Column',
			'desc'	=> esc_html__( 'Select footer second column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_top_sidebar_2',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Third Column',
			'desc'	=> esc_html__( 'Select footer third column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_top_sidebar_3',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Fourth Column',
			'desc'	=> esc_html__( 'Select footer fourth column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_top_sidebar_4',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Middle',
			'desc'	=> esc_html__( 'These all are footer middle settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Skin', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer middle skin options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_middle_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer middle font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_middle_font',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_middle_bg',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer middle link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_middle_link',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer middle border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_middle_border',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer middle padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_middle_padding',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Middle Columns and Sidebars Settings',
			'desc'	=> esc_html__( 'These all are footer middle columns and sidebar settings.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer layout option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_middle_layout_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_middle_layout',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'3-3-3-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-1.png', 
				'4-4-4'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-2.png', 
				'3-6-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-3.png', 
				'6-6'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-4.png', 
				'9-3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-5.png', 
				'3-9'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-6.png', 
				'12'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/footer-layouts/footer-7.png'
			),
			'default'	=> '4-4-4',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer First Column',
			'desc'	=> esc_html__( 'Select footer first column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_1',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Second Column',
			'desc'	=> esc_html__( 'Select footer second column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_2',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Third Column',
			'desc'	=> esc_html__( 'Select footer third column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_3',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Fourth Column',
			'desc'	=> esc_html__( 'Select footer fourth column widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_4',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Bottom',
			'desc'	=> esc_html__( 'These all are footer bottom settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Fixed', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom fixed option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_bottom_fixed',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'1' => esc_html__( 'Enable', 'pixzlo-core' ),
				'0' => esc_html__( 'Disable', 'pixzlo-core' )			
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are footer bottom skin settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Skin', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom skin options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_bottom_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Font Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom font color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_bottom_font',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Background', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom background color for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_bottom_bg',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Link Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom link color settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_bottom_link',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Border', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom border settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_bottom_border',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Padding', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom padding settings for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_bottom_padding',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Widget Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom widget options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_bottom_widget_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> 'Footer Bottom Widget',
			'desc'	=> esc_html__( 'Select footer bottom widget.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'id'	=> $prefix.'footer_bottom_widget',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_bottom_widget_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Items Option', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom items options.', 'pixzlo-core' ), 
			'id'	=> $prefix.'footer_bottom_items_opt',
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom items for currrent page.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Footer', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'footer_bottom_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'copyright' => esc_html__( 'Copyright Text', 'pixzlo-core' )
				),
				'Center'  => array(
					'menu'	=> esc_html__( 'Footer Menu', 'pixzlo-core' )
				),
				'Right'  => array(),
				'disabled' => array(
					'social'	=> esc_html__( 'Footer Social Links', 'pixzlo-core' ),
					'widget'	=> esc_html__( 'Custom Widget', 'pixzlo-core' )
				)
			),
			'required'	=> array( $prefix.'footer_bottom_items_opt', 'custom' )
		),
		//Header Slider
		array( 
			'label'	=> esc_html__( 'Slider', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This header slider settings.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Slider Option', 'pixzlo-core' ),
			'id'	=> $prefix.'header_slider_opt',
			'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'bottom' => esc_html__( 'Below Header', 'pixzlo-core' ),
				'top' => esc_html__( 'Above Header', 'pixzlo-core' ),
				'none' => esc_html__( 'None', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Slider Shortcode', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This is the place for enter slider shortcode. Example revolution slider shortcodes.', 'pixzlo-core' ), 
			'id'	=> $prefix.'header_slider',
			'tab'	=> esc_html__( 'Slider', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
	);
	return $fields;
}
$page_fields = pixzloMetaboxFields( 'pixzlo_page_' );
$page_box = new Custom_Add_Meta_Box( 'pixzlo_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'page', true );
/* Custom Post Type Options */
$pixzlo_option = get_option( 'pixzlo_options' );
// Portfolio Options
if( isset( $pixzlo_option['cpt-opts'] ) && is_array( $pixzlo_option['cpt-opts'] ) && in_array( "portfolio", $pixzlo_option['cpt-opts'] ) ){
	
	// CPT Portfolio Metabox
	$prefix = 'pixzlo_portfolio_';
	$portfolio_fields = array(
		array( 
			'label'	=> esc_html__( 'Portfolio General Settings', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are single portfolio general settings.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Icon', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter portfolio icon class with <i> tag. This icon will show on backside of title with light faded. Icons fonts should be font awesome or simple line icons. Example <i class="fa fa-heart"></i>', 'pixzlo-core' ), 
			'id'	=> $prefix.'title_icon',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'allowed_html'	=> true,
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Primary Portfolio Color', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This option for portfolio overlay and some current portfolio elements primary colors.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'primary_color'
		),				
		array( 
			'label'	=> esc_html__( 'Portfolio Layout Option', 'pixzlo-core' ),
			'id'	=> $prefix.'layout_opt',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Layout', 'pixzlo-core' ),
			'id'	=> $prefix.'layout',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'1'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/portfolio-layouts/1.png', 
				'2'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/portfolio-layouts/2.png',
				'3'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/portfolio-layouts/3.png',
				'4'	=> PIXZLO_CORE_URL . '/admin/ReduxCore/assets/img/portfolio-layouts/4.png'
	
			),
			'default'	=> '1',
			'required'	=> array( $prefix.'layout_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Sticky Column', 'pixzlo-core' ),
			'id'	=> $prefix.'sticky',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'none' => esc_html__( 'None', 'pixzlo-core' ),
				'right' => esc_html__( 'Right Column', 'pixzlo-core' ),
				'left' => esc_html__( 'Left Column', 'pixzlo-core' )
			),
			'default'	=> 'none'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Format', 'pixzlo-core' ),
			'id'	=> $prefix.'format',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'pixzlo-core' ),
				'video' => esc_html__( 'Video', 'pixzlo-core' ),
				'audio' => esc_html__( 'Audio', 'pixzlo-core' ),
				'gallery' => esc_html__( 'Gallery', 'pixzlo-core' ),
				'gmap' => esc_html__( 'Google Map', 'pixzlo-core' )
			),
			'default'	=> 'standard'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Meta Items Options', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose portfolio meta items option.', 'pixzlo-core' ), 
			'id'	=> $prefix.'items_opt',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom', 'pixzlo-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Meta Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'These all are meta items for portfolio. drag and drop needed items from disabled part to enabled.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'items',
			'dd_fields' => array ( 
				'Enabled'  => array(
					'type'		=> esc_html__( 'Type', 'pixzlo-core' ),
					'date'		=> esc_html__( 'Date', 'pixzlo-core' ),
					'client'	=> esc_html__( 'Client', 'pixzlo-core' ),
					'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
					'share'		=> esc_html__( 'Share', 'pixzlo-core' ),
				),
				'disabled' => array(
					'tag'		=> esc_html__( 'Tags', 'pixzlo-core' ),
					'duration'	=> esc_html__( 'Duration', 'pixzlo-core' ),
					'url'		=> esc_html__( 'URL', 'pixzlo-core' ),
					'place'		=> esc_html__( 'Place', 'pixzlo-core' ),
					'estimation'=> esc_html__( 'Estimation', 'pixzlo-core' ),
				)
			),
			'required'	=> array( $prefix.'items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Custom Redirect URL', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter url for custom webpage redirection. This link only for portfolio archive layout not for single portfolio.', 'pixzlo-core' ), 
			'id'	=> $prefix.'custom_url',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Redirect URL Target', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose custom url page navigate to blank or same page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'custom_url_target',
			'tab'	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'Blank', 'pixzlo-core' ),
				'_self' => esc_html__( 'Self', 'pixzlo-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Type', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose/Enter portfolio type.', 'pixzlo-core' ), 
			'id'	=> $prefix.'type',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Date', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose/Enter portfolio date.', 'pixzlo-core' ), 
			'id'	=> $prefix.'date',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Date Format', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter date format to show selcted portfolio date. Example: F j, Y', 'pixzlo-core' ), 
			'id'	=> $prefix.'date_format',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> 'F j, Y'
		),
		array( 
			'label'	=> esc_html__( 'Client Name', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter client name.', 'pixzlo-core' ), 
			'id'	=> $prefix.'client_name',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Duration', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter duration years or months.', 'pixzlo-core' ), 
			'id'	=> $prefix.'duration',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Estimation', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter project estimation.', 'pixzlo-core' ), 
			'id'	=> $prefix.'estimation',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Place', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter project place.', 'pixzlo-core' ), 
			'id'	=> $prefix.'place',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'URL', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter project URL.', 'pixzlo-core' ), 
			'id'	=> $prefix.'url',
			'tab'	=> esc_html__( 'Info', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		//Portfolio Format
		array( 
			'label'	=> esc_html__( 'Video', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed video format, then you must choose video type and give video id.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Video Modal', 'pixzlo-core' ),
			'id'	=> $prefix.'video_modal',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'onclick' => esc_html__( 'On Click Run Video', 'pixzlo-core' ),
				'overlay' => esc_html__( 'Modal Box Video', 'pixzlo-core' ),
				'direct' => esc_html__( 'Direct Video', 'pixzlo-core' )
			),
			'default'	=> 'direct'
		),
		array( 
			'label'	=> esc_html__( 'Video Type', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose video type.', 'pixzlo-core' ), 
			'id'	=> $prefix.'video_type',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'' => esc_html__( 'None', 'pixzlo-core' ),
				'youtube' => esc_html__( 'Youtube', 'pixzlo-core' ),
				'vimeo' => esc_html__( 'Vimeo', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom Video', 'pixzlo-core' )
			),
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Video ID', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter Video ID Example: ZSt9tm3RoUU. If you choose custom video type then you enter custom video url and video must be mp4 format.', 'pixzlo-core' ), 
			'id'	=> $prefix.'video_id',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
		),
		array( 
			'label'	=> esc_html__( 'Audio', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed audio format, then you must give audio id.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Audio Type', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose audio type.', 'pixzlo-core' ), 
			'id'	=> $prefix.'audio_type',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'' => esc_html__( 'None', 'pixzlo-core' ),
				'soundcloud' => esc_html__( 'Soundcloud', 'pixzlo-core' ),
				'custom' => esc_html__( 'Custom Audio', 'pixzlo-core' )
			),
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Audio ID', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter soundcloud audio ID. Example: 315307209.', 'pixzlo-core' ), 
			'id'	=> $prefix.'audio_id',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
		),
		array( 
			'label'	=> esc_html__( 'Gallery', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed gallery format, then you must choose gallery images here.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Gallery Modal', 'pixzlo-core' ),
			'id'	=> $prefix.'gallery_modal',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'default' => esc_html__( 'Default Gallery', 'pixzlo-core' ),
				'normal' => esc_html__( 'Normal Gallery', 'pixzlo-core' ),
				'grid' => esc_html__( 'Grid/Masonry Gallery', 'pixzlo-core' )
			),
			'default'	=> 'default'
		),
		array( 
			'label'	=> esc_html__( 'Grid Gutter Size', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter gallery grid gutter size. Example 20', 'pixzlo-core' ), 
			'id'	=> $prefix.'grid_gutter',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'gallery_modal', 'grid' )
		),
		array( 
			'label'	=> esc_html__( 'Grid Columns', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter gallery grid columns count. Example 2', 'pixzlo-core' ), 
			'id'	=> $prefix.'grid_cols',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'gallery_modal', 'grid' )
		),
		array( 
			'label'	=> esc_html__( 'Choose Gallery Images', 'pixzlo-core' ),
			'id'	=> $prefix.'gallery',
			'type'	=> 'gallery',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
		),
		array( 
			'label'	=> esc_html__( 'Google Map', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed google map format, then you must give google map lat, lang and map style.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Google Map Latitude', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter google latitude.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_latitude',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Longitude', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter google longitude.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_longitude',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Marker URL', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter google map custom marker url.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_marker',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Style', 'pixzlo-core' ),
			'id'	=> $prefix.'gmap_style',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'pixzlo-core' ),
				'silver' => esc_html__( 'Silver', 'pixzlo-core' ),
				'retro' => esc_html__( 'Retro', 'pixzlo-core' ),
				'dark' => esc_html__( 'Dark', 'pixzlo-core' ),
				'night' => esc_html__( 'Night', 'pixzlo-core' ),
				'aubergine' => esc_html__( 'Aubergine', 'pixzlo-core' )
			),
			'default'	=> 'standard'
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'pixzlo-core' )
		),
	);
	// CPT Portfolio Options
	$portfolio_box = new Custom_Add_Meta_Box( 'pixzlo_portfolio_metabox', esc_html__( 'Pixzlo Portfolio Options', 'pixzlo-core' ), $portfolio_fields, 'pixzlo-portfolio', true );
	
	// CPT Portfolio Page Options
	$portfolio_page_box = new Custom_Add_Meta_Box( 'pixzlo_portfolio_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'pixzlo-portfolio', true );
} // In theme option CPT option if portfolio exists
// Testimonial Options
if( isset( $pixzlo_option['cpt-opts'] ) && is_array( $pixzlo_option['cpt-opts'] ) && in_array( "testimonial", $pixzlo_option['cpt-opts'] ) ){
	
	$prefix = 'pixzlo_testimonial_';
	$testimonial_fields = array(	
		array( 
			'label'	=> esc_html__( 'Author Name', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter author name.', 'pixzlo-core' ), 
			'id'	=> $prefix.'name',
			'tab'	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Author Designation', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter author designation.', 'pixzlo-core' ), 
			'id'	=> $prefix.'designation',
			'tab'	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Company Name', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter company name.', 'pixzlo-core' ), 
			'id'	=> $prefix.'company_name',
			'tab'	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Company URL', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter company URL.', 'pixzlo-core' ), 
			'id'	=> $prefix.'company_url',
			'tab'	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Rating', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Set user rating.', 'pixzlo-core' ), 
			'id'	=> $prefix.'rating',
			'tab'	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
			'type'	=> 'rating',
			'default'	=> ''
		)
	);
	
	// CPT Testimonial Options
	$testimonial_box = new Custom_Add_Meta_Box( 'pixzlo_testimonial_metabox', esc_html__( 'Pixzlo Testimonial Options', 'pixzlo-core' ), $testimonial_fields, 'pixzlo-testimonial', true );
	
	// CPT Testimonial Page Options
	$testimonial_page_box = new Custom_Add_Meta_Box( 'pixzlo_testimonial_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'pixzlo-testimonial', true );
	
} // In theme option CPT option if testimonial exists
// Team Options
if( isset( $pixzlo_option['cpt-opts'] ) && is_array( $pixzlo_option['cpt-opts'] ) && in_array( "team", $pixzlo_option['cpt-opts'] ) ){
	
	$prefix = 'pixzlo_team_';
	$team_fields = array(	
		array( 
			'label'	=> esc_html__( 'Member Designation', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter member designation.', 'pixzlo-core' ), 
			'id'	=> $prefix.'designation',
			'tab'	=> esc_html__( 'Team', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Member Email', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter member email.', 'pixzlo-core' ), 
			'id'	=> $prefix.'email',
			'tab'	=> esc_html__( 'Team', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Phone Number', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter Phone Number.', 'pixzlo-core' ), 
			'id'	=> $prefix.'phone',
			'tab'	=> esc_html__( 'Team', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Link Target', 'pixzlo-core' ),
			'id'	=> $prefix.'link_target',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'New Window', 'pixzlo-core' ),
				'_self' => esc_html__( 'Self Window', 'pixzlo-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Facebook', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Facebook profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'facebook',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Twitter', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Twitter profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'twitter',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Instagram', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Instagram profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'instagram',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Linkedin', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Linkedin profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'linkedin',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Pinterest', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Pinterest profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'pinterest',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Dribbble', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Dribbble profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'dribbble',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Flickr', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Flickr profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'flickr',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Youtube', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Youtube profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'youtube',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Vimeo', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Vimeo profile link.', 'pixzlo-core' ), 
			'id'	=> $prefix.'vimeo',
			'tab'	=> esc_html__( 'Social', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		)
	);
	
	// CPT Team Options
	$team_box = new Custom_Add_Meta_Box( 'pixzlo_team_metabox', esc_html__( 'Pixzlo Team Options', 'pixzlo-core' ), $team_fields, 'pixzlo-team', true );
	
	// CPT Team Page Options
	$team_page_box = new Custom_Add_Meta_Box( 'pixzlo_team_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'pixzlo-team', true );
	
} // In theme option CPT option if team exists
// Event Options
if( isset( $pixzlo_option['cpt-opts'] ) && is_array( $pixzlo_option['cpt-opts'] ) && in_array( "event", $pixzlo_option['cpt-opts'] ) ){
	
	$prefix = 'pixzlo_event_';
	$event_fields = array(	
		array( 
			'label'	=> esc_html__( 'Event Organiser Name', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event organiser name.', 'pixzlo-core' ), 
			'id'	=> $prefix.'organiser_name',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Organiser Designation', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event organiser designation.', 'pixzlo-core' ), 
			'id'	=> $prefix.'organiser_designation',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Start Date', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event start date.', 'pixzlo-core' ), 
			'id'	=> $prefix.'start_date',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event End Date', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event end date.', 'pixzlo-core' ), 
			'id'	=> $prefix.'end_date',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Date Format', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter date format to show selcted event date. Example: F j, Y', 'pixzlo-core' ), 
			'id'	=> $prefix.'date_format',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> 'F j, Y'
		),
		array( 
			'label'	=> esc_html__( 'Event Start Time', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event start time.', 'pixzlo-core' ), 
			'id'	=> $prefix.'time',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Cost', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event cost.', 'pixzlo-core' ), 
			'id'	=> $prefix.'cost',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Link for Event Item', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter custom link to redirect custom event page.', 'pixzlo-core' ), 
			'id'	=> $prefix.'link',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Link Target', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Choose custom link target to new window or self window.', 'pixzlo-core' ), 
			'id'	=> $prefix.'link_target',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'New Window', 'pixzlo-core' ),
				'_self' => esc_html__( 'Self Window', 'pixzlo-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Custom Link Button Text', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter custom link buttom text: Example More About Event.', 'pixzlo-core' ), 
			'id'	=> $prefix.'link_text',
			'tab'	=> esc_html__( 'Events', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Venue Name', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event venue name.', 'pixzlo-core' ), 
			'id'	=> $prefix.'venue_name',
			'tab'	=> esc_html__( 'Address', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Venue Address', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event venue address.', 'pixzlo-core' ), 
			'id'	=> $prefix.'venue_address',
			'tab'	=> esc_html__( 'Address', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'E-mail', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter email id for clarification about event.', 'pixzlo-core' ), 
			'id'	=> $prefix.'email',
			'tab'	=> esc_html__( 'Address', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Phone', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter phone number for contact about event.', 'pixzlo-core' ), 
			'id'	=> $prefix.'phone',
			'tab'	=> esc_html__( 'Address', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Website', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter event website.', 'pixzlo-core' ), 
			'id'	=> $prefix.'website',
			'tab'	=> esc_html__( 'Address', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Latitude', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter map latitude.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_latitude',
			'tab'	=> esc_html__( 'GMap', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Longitude', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter map longitude.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_longitude',
			'tab'	=> esc_html__( 'GMap', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Marker URL', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter google map custom marker url.', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_marker',
			'tab'	=> esc_html__( 'GMap', 'pixzlo-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Style', 'pixzlo-core' ),
			'id'	=> $prefix.'gmap_style',
			'tab'	=> esc_html__( 'GMap', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'pixzlo-core' ),
				'silver' => esc_html__( 'Silver', 'pixzlo-core' ),
				'retro' => esc_html__( 'Retro', 'pixzlo-core' ),
				'dark' => esc_html__( 'Dark', 'pixzlo-core' ),
				'night' => esc_html__( 'Night', 'pixzlo-core' ),
				'aubergine' => esc_html__( 'Aubergine', 'pixzlo-core' )
			),
			'default'	=> 'standard'
		),
		array( 
			'label'	=> esc_html__( 'Google Map Height', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter map height in values. Example 400', 'pixzlo-core' ), 
			'id'	=> $prefix.'gmap_height',
			'tab'	=> esc_html__( 'GMap', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '400'
		),
		array( 
			'label'	=> esc_html__( 'Contact Form', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Contact form shortcode here.', 'pixzlo-core' ), 
			'id'	=> $prefix.'contact_form',
			'tab'	=> esc_html__( 'Contact', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Info Columns', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter column division values like given format. Example 3-3-6', 'pixzlo-core' ), 
			'id'	=> $prefix.'col_layout',
			'tab'	=> esc_html__( 'Layout', 'pixzlo-core' ),
			'type'	=> 'text',
			'default'	=> '3-3-6'
		),
		array( 
			'label'	=> esc_html__( 'Event Detail Items', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'This is layout settings for event.', 'pixzlo-core' ), 
			'tab'	=> esc_html__( 'Layout', 'pixzlo-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'event_info_items',
			'dd_fields' => array ( 
				'Enable'  => array(
					'event-details' => esc_html__( 'Event Details', 'pixzlo-core' ),
					'event-venue' => esc_html__( 'Event Venue', 'pixzlo-core' ),
					'event-map' => esc_html__( 'Event Map', 'pixzlo-core' )
				),
				'disabled' => array(
					'event-form'	=> esc_html__( 'Event Form', 'pixzlo-core' ),
				)
			),
		),
		array( 
			'label'	=> esc_html__( 'Navigation', 'pixzlo-core' ),
			'id'	=> $prefix.'nav_position',
			'tab'	=> esc_html__( 'Layout', 'pixzlo-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'top' => esc_html__( 'Top', 'pixzlo-core' ),
				'bottom' => esc_html__( 'Bottom', 'pixzlo-core' )
			),
			'default'	=> 'top'
		),
	);
	
	// CPT Events Options
	$event_box = new Custom_Add_Meta_Box( 'pixzlo_event_metabox', esc_html__( 'Pixzlo Event Options', 'pixzlo-core' ), $event_fields, 'pixzlo-event', true );
	
	// CPT Events Page Options
	$event_page_box = new Custom_Add_Meta_Box( 'pixzlo_event_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'pixzlo-event', true );
	
} // In theme option CPT option if event exists
// Service Options
if( isset( $pixzlo_option['cpt-opts'] ) && is_array( $pixzlo_option['cpt-opts'] ) && in_array( "service", $pixzlo_option['cpt-opts'] ) ){
	
	$prefix = 'pixzlo_service_';
	
	$service_fields = array(	
		array( 
			'label'	=> esc_html__( 'Service Icon', 'pixzlo-core' ),
			'desc'	=> esc_html__( 'Enter service icon class with <i> tag. This icon will show on backside of title with light faded. Icons fonts should be font awesome or simple line icons. Example <i class="fa fa-heart"></i>', 'pixzlo-core' ), 
			'id'	=> $prefix.'title_icon',
			'tab'	=> esc_html__( 'Services', 'pixzlo-core' ),
			'type'	=> 'textarea',
			'allowed_html'	=> true,
			'default'	=> ''
		)
	);
	
	// CPT Service Options
	$service_box = new Custom_Add_Meta_Box( 'pixzlo_service_metabox', esc_html__( 'Pixzlo Service Options', 'pixzlo-core' ), $service_fields, 'pixzlo-service', true );
	
	// CPT Events Page Options
	$service_page_box = new Custom_Add_Meta_Box( 'pixzlo_service_page_metabox', esc_html__( 'Pixzlo Page Options', 'pixzlo-core' ), $page_fields, 'pixzlo-service', true );
	
}