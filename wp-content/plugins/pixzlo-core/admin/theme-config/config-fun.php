<?php
/* Pixzlo Config Repeated Code Class */
class PixzloConfigFun {
	private $pixzlo_options;
   
    function __construct() {
		$this->pixzlo_options = get_option( 'pixzlo_options' );
    }
	
	function pixzloGetAdminThemeOpt( $field ){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options[$field] ) && $pixzlo_options[$field] != '' ? $pixzlo_options[$field] : '';
	}
	
	function themeCategories(){
		$categories = get_categories( array(
			'orderby' => 'name',
			'order'   => 'ASC'
		) );
		$category_array = array();
		foreach ( $categories as $category ) {
			$category_array['category-'.$category->term_id] = $category->name;
		}
		return $category_array;
	}
	
	function themeMarginFields( $field ){
		
		$dimesin_array = array(
			'id'             => $field.'-margin',
			'type'           => 'spacing',
			'mode'           => 'margin',
			'units'          => array('px'),
			'units_extended' => 'false',
			'title'          => esc_html__('Margin Option', 'pixzlo-core'),
			'subtitle'       => esc_html__('Set margin top/right/bottom/left.', 'pixzlo-core'),
			'default'            => array(
				'margin-top'     => '', 
				'margin-right'   => '', 
				'margin-bottom'  => '', 
				'margin-left'    => '',
			)
		);
		
		return $dimesin_array;
		
	}
	
	function themeAdsList( $field, $template_name, $position = '' ){
		$ads_list = array(
			'id'       => $field.'-ads-list',
			'type'     => 'select',
			'title'    => sprintf( esc_html__( 'Ads List %1$s', 'pixzlo-core' ), $position ),
			'desc'     => sprintf( esc_html__( 'Choose ads list to show in %1$s.', 'pixzlo-core' ), $template_name ),
			'options'  => array(
				'header' => esc_html__( 'Header Ads', 'pixzlo-core' ),
				'footer' => esc_html__( 'Footer Ads', 'pixzlo-core' ),
				'sidebar' => esc_html__( 'Sidebar Ads', 'pixzlo-core' ),
				'artical-top' => esc_html__( 'Artical Top Ads', 'pixzlo-core' ),
				'artical-inline' => esc_html__( 'Artical Inline Ads', 'pixzlo-core' ),
				'artical-bottom' => esc_html__( 'Artical Bottom Ads', 'pixzlo-core' ),
				'custom1' => esc_html__( 'Custom 1 Ads', 'pixzlo-core' ),
				'custom2' => esc_html__( 'Custom 2 Ads', 'pixzlo-core' ),
				'custom3' => esc_html__( 'Custom 3 Ads', 'pixzlo-core' ),
				'custom4' => esc_html__( 'Custom 4 Ads', 'pixzlo-core' ),
				'custom5' => esc_html__( 'Custom 5 Ads', 'pixzlo-core' ),
			),
			'default'  => ''
		);
		return $ads_list;
	}
	
	function themeAdsFields( $field ){
		
		$ads = array(
				array(
					'id'       => $field.'-ads-text',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Adsense Code', 'pixzlo-core' ),
					'subtitle'     => esc_html__( 'Place your Google adsense code here or enter custom ad link code', 'pixzlo-core' ),
					'default'  => ''
				),
				array(
					'id'       => $field.'-ads-md',
					'type'     => 'button_set',
					'title'    => esc_html__( 'Enable on Desktop', 'pixzlo-core' ),
					'subtitle'     => esc_html__( 'choose yes to enable ads on desktop view.', 'pixzlo-core' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'pixzlo-core' ),
						'no'  => esc_html__( 'No', 'pixzlo-core' ),
					),
					'default'  => 'yes'
				),
				array(
					'id'       => $field.'-ads-sm',
					'type'     => 'button_set',
					'title'    => esc_html__( 'Enable on Tablet', 'pixzlo-core' ),
					'subtitle'     => esc_html__( 'choose yes to enable ads on tablet view.', 'pixzlo-core' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'pixzlo-core' ),
						'no'  => esc_html__( 'No', 'pixzlo-core' ),
					),
					'default'  => 'yes'
				),
				array(
					'id'       => $field.'-ads-xs',
					'type'     => 'button_set',
					'title'    => esc_html__( 'Enable on Mobile', 'pixzlo-core' ),
					'subtitle'     => esc_html__( 'choose yes to enable ads on mobile view.', 'pixzlo-core' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'pixzlo-core' ),
						'no'  => esc_html__( 'No', 'pixzlo-core' ),
					),
					'default'  => 'yes'
				),
			);
		return $ads;
	}
	
	function themeSkinSettings($field, $extras = array()){
	
		$line_height = isset( $extras['line_height'] ) ? $extras['line_height'] : false;
		
		$theme_skin_set = array(
			array(
                'id'       => $field.'-typography',
                'type'     => 'typography',
                'title'    => __( 'Typography', 'pixzlo-core' ),
                'subtitle' => __( 'Specify the font properties.', 'pixzlo-core' ),
                'google'   => true,
				'letter-spacing'=> true,
				'line-height'=> $line_height,
				'text-transform' => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => '',
                ),
            ),
			array(
                'id'       => $field.'-background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background', 'pixzlo-core' ),
                'subtitle' => esc_html__( 'Choose background color.', 'pixzlo-core' ),
                'default'  => array(
                    'color' => '',
                    'alpha' => ''
                ),
                'mode'     => 'background',
            ),
			array(
                'id'       => $field.'-link-color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Links Color', 'pixzlo-core' ),
                'subtitle' => esc_html__( 'Choose link color options.', 'pixzlo-core' ),
                'default'  => array(
                    'regular' => '',
                    'hover'   => '',
                    'active'  => '',
                )
            ),
			array(
                'id'       => $field.'-border',
                'type'     => 'border',
                'title'    => esc_html__( 'Border', 'pixzlo-core' ),
                'subtitle' => esc_html__( 'Set border option.', 'pixzlo-core' ),
				'all'      => false,
                'default'  => array(
                    'border-color'  => '',
                    'border-style'  => 'none',
                    'border-top'    => '',
                    'border-right'  => '',
                    'border-bottom' => '',
                    'border-left'   => ''
                )
            ),
			array(
				'id'             => $field.'-padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array('px'),
				'units_extended' => 'false',
				'title'          => __('Padding Option', 'pixzlo-core'),
				'subtitle'       => __('Set padding for this bar.', 'pixzlo-core'),
				'default'            => array(
					'pading-top'     => '', 
					'pading-right'   => '', 
					'pading-bottom'  => '', 
					'pading-left'    => '',
				)
			),
			array(
                'id'       => $field.'-background-all',
                'type'     => 'background',
                'title'    => esc_html__( 'Background Settings', 'pixzlo-core' ),
                'subtitle' => esc_html__( 'This is settings for background.', 'pixzlo-core' ),
                'default'   => '',
            ),
			array(
				'id'             => $field.'-margin',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array('px'),
				'units_extended' => 'false',
				'title'          => __('Margin Option', 'pixzlo-core'),
				'subtitle'       => __('Set margin for this bar.', 'pixzlo-core'),
				'default'            => array(
					'margin-top'     => '', 
					'margin-right'   => '', 
					'margin-bottom'  => '', 
					'margin-left'    => '',
				)
			),
		);
		return $theme_skin_set;
	}
	
	function themeSidebarsList( $field, $extras ){
	
		$default = isset( $extras['default'] ) ? $extras['default'] : '';
		$title = isset( $extras['title'] ) ? $extras['title'] : '';
	
		$sidebars_array = array(
			array(
                'id'       => $field.'-layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layouts', 'pixzlo-core' ),
                'desc'     => esc_html__( 'Choose your layouts.', 'pixzlo-core' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '3-3-3-3' => array(
                        'alt' => esc_html__( 'Layout 1', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-1.png'
                    ),
					'4-2-2-4' => array(
                        'alt' => esc_html__( 'Layout 2', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-8.png'
                    ),
                    '4-4-4' => array(
                        'alt' => esc_html__( 'Layout 3', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-2.png'
                    ),
                    '3-6-3' => array(
                        'alt' => esc_html__( 'Layout 4', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-3.png'
                    ),
					'6-6' => array(
                        'alt' => esc_html__( 'Layout 5', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-4.png'
                    ),
					'9-3' => array(
                        'alt' => esc_html__( 'Layout 6', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-5.png'
                    ),
					'3-9' => array(
                        'alt' => esc_html__( 'Layout 7', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-6.png'
                    ),
					'12' => array(
                        'alt' => esc_html__( 'Layout 8', 'pixzlo-core' ),
                        'img' => ReduxFramework::$_url . 'assets/img/footer-layouts/footer-7.png'
                    ),
                ),
                'default'  => '3-3-3-3'
            ),
			array(
                'id'       => $field.'-sidebar-1',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose First Column', 'pixzlo-core' ),
                'desc'     => esc_html__( 'Select widget area for showing first column.', 'pixzlo-core' ),
                'data'     => 'sidebars'
            ),
			array(
                'id'       => $field.'-sidebar-2',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose Second Column', 'pixzlo-core' ),
                'desc'     => esc_html__( 'Select widget area for showing second column.', 'pixzlo-core' ),
                'data'     => 'sidebars',
            ),
			array(
                'id'       => $field.'-sidebar-3',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose Third Column', 'pixzlo-core' ),
                'desc'     => esc_html__( 'Select widget area for showing third column.', 'pixzlo-core' ),
                'data'     => 'sidebars',
            ),
			array(
                'id'       => $field.'-sidebar-4',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose Fourth Column', 'pixzlo-core' ),
                'desc'     => esc_html__( 'Select widget area for showing fourth column.', 'pixzlo-core' ),
                'data'     => 'sidebars',
            )
		);
		
		return $sidebars_array;
	}
	
	function themeFontColor( $field ){
		$color_array = array(
			array(
				'id'      => $field.'-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Font Color', 'pixzlo-core' ),
				'desc'    => esc_html__( 'This is font color for current field.', 'pixzlo-core' ),
				'validate' => 'color',
			)
		);
		return $color_array;
	}
	
	function themePageTitleItems( $field ){
		$page_title_array = '';
		if( $field == 'template-blog' || $field == 'template-page' ){
			$page_title_array = array(
				array(
					'id'      => $field.'-pagetitle-items',
					'type'    => 'sorter',
					'title'   => esc_html__( 'Page Title Items', 'pixzlo-core' ),
					'desc'    => esc_html__( 'Needed page title items drag from disabled and put enabled.', 'pixzlo-core' ),
					'options' => array(
						'disabled' => array(
							'description' => esc_html__( 'Description', 'pixzlo-core' )
						),
						'Left'  => array(
							'title' => esc_html__( 'Page Title Text', 'pixzlo-core' ),
						),
						'Center'  => array(
							
						),
						'Right'  => array(
							'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
						)
					),
				)
			);
		}elseif( $field == 'template-author' ){
			$page_title_array = array(
				array(
					'id'      => $field.'-pagetitle-items',
					'type'    => 'sorter',
					'title'   => esc_html__( 'Page Title Items', 'pixzlo-core' ),
					'desc'    => esc_html__( 'Needed page title items drag from disabled and put enabled.', 'pixzlo-core' ),
					'options' => array(
						'disabled' => array(
						),
						'Left'  => array(
							'author-info' => esc_html__( 'Author Info', 'pixzlo-core' ),
						),
						'Center' => array(
						),
						'Right'  => array(
							'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
						)						
					),
				)
			);
		}elseif( strpos( $field, 'category' ) ){
			$page_title_array = array(
				array(
					'id'      => $field.'-pagetitle-items',
					'type'    => 'sorter',
					'title'   => esc_html__( 'Category Page Title Items', 'pixzlo-core' ),
					'desc'    => esc_html__( 'Needed page title items drag from disabled and put enabled.', 'pixzlo-core' ),
					'options' => array(
						'disabled' => array(
							'description' => esc_html__( 'Category Description', 'pixzlo-core' )
						),
						'Left'  => array(
							'title' => esc_html__( 'Category Title', 'pixzlo-core' ),
						),
						'Center'  => array(
							
						),
						'Right'  => array(
							'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
						)
					),
				)
			);
		}else{
			$page_title_array = array(
				array(
					'id'      => $field.'-pagetitle-items',
					'type'    => 'sorter',
					'title'   => esc_html__( 'Page Title Items', 'pixzlo-core' ),
					'desc'    => esc_html__( 'Needed page title items drag from disabled and put enabled.', 'pixzlo-core' ),
					'options' => array(
						'disabled' => array(
						),
						'Left'  => array(
							'title' => esc_html__( 'Page Title Text', 'pixzlo-core' ),
						),
						'Center' => array(
						),
						'Right'  => array(
							'breadcrumb'	=> esc_html__( 'Breadcrumb', 'pixzlo-core' )
						)						
					),
				)
			);
		}
		return $page_title_array;
	}
	
	function themeSliders( $slide ){
	
		$items = $margin = array();
		
		if( $slide == 'blog' ){
			$items = array(
				'id'       => $slide.'-slide-items',
				'type'     => 'text',
				'title'    => esc_html__( 'Items to Display', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter slider items to display', 'pixzlo-core' ),
				'default'  => '1'
			);
		}else{
			$items = array(
				'id'       => $slide.'-slide-items',
				'type'     => 'text',
				'title'    => esc_html__( 'Items to Display', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter slider items to display', 'pixzlo-core' ),
				'default'  => '3'
			);
		}
		
		if( $slide == 'related' ){
			$margin = array(
				'id'       => $slide.'-slide-margin',
				'type'     => 'text',
				'title'    => esc_html__( 'Margin', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter margin( item spacing )', 'pixzlo-core' ),
				'default'  => '10'
			);
		}else{
			$margin = array(
				'id'       => $slide.'-slide-margin',
				'type'     => 'text',
				'title'    => esc_html__( 'Margin', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter margin( item spacing )', 'pixzlo-core' ),
				'default'  => '0'
			);
		}
	
		$slider_array = array(
			$items,
			array(
				'id'       => $slide.'-slide-tab',
				'type'     => 'text',
				'title'    => esc_html__( 'Items to Display Tab', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter items to display tablet', 'pixzlo-core' ),
				'default'  => '1'
			),
			array(
				'id'       => $slide.'-slide-mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'Items to Display on Mobile', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter items to display on mobile view', 'pixzlo-core' ),
				'default'  => '1'
			),
			array(
				'id'       => $slide.'-slide-scrollby',
				'type'     => 'text',
				'title'    => esc_html__( 'Items Scrollby', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter slider items scrollby', 'pixzlo-core' ),
				'default'  => '1'
			),
			array(
				'id'       => $slide.'-slide-autoplay',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Slide Autoplay', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable slide autoplay', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'true'
			),
			array(
				'id'       => $slide.'-slide-center',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Slide Center', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable slide center', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'false'
			),
			array(
				'id'       => $slide.'-slide-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Slide Duration', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter slide duration for each (in Milli Seconds)', 'pixzlo-core' ),
				'default'  => '5000'
			),
			array(
				'id'       => $slide.'-slide-smartspeed',
				'type'     => 'text',
				'title'    => esc_html__( 'Slide Smart Speed', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Enter slide smart speed for each (in Milli Seconds)', 'pixzlo-core' ),
				'default'  => '250'
			),
			array(
				'id'       => $slide.'-slide-infinite',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Infinite Loop', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable infinite loop', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'false'
			),
			$margin,
			array(
				'id'       => $slide.'-slide-pagination',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Pagination', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable pagination', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'false'
			),
			array(
				'id'       => $slide.'-slide-navigation',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Navigation', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable navigation', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'false'
			),
			array(
				'id'       => $slide.'-slide-autoheight',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Auto Height', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable slide item auto height', 'pixzlo-core' ),
				'options' => array(
					'true' => esc_html__( 'Yes', 'pixzlo-core' ),
					'false'  => esc_html__( 'No', 'pixzlo-core' ),
				),
				'default'  => 'false'
			)
		);
		
		return $slider_array;
	}
	
	function pixzloThemeOptTemplate( $template, $template_cname, $template_sname ){
		$template_t = $this->themeSkinSettings('template-'.$template);
		$template_article = $this->themeSkinSettings($template.'-article');
		$page_title_items = $this->themePageTitleItems('template-'.$template);
		$color = $this->themeFontColor('template-'.$template);
		$template_article_color = $this->themeFontColor($template.'-article');
		
		$page_tit = $page_tit_desc = '';
		if( $template == 'blog' ){
			$page_tit = array(
				'id'       => $template.'-page-title',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Page Title', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'This is a title for %1$s page. HTML code allowed here.', 'pixzlo-core' ), $template_sname ),
				'default'  => esc_html__( 'Multiuse Theme', 'pixzlo-core' )
			);
			$page_tit_desc = array(
				'id'		=> $template.'-page-desc',
				'type'		=> 'textarea',
				'title'		=> sprintf( esc_html__( '%1$s Page Description', 'pixzlo-core' ), $template_cname ),
				'subtitle'	=> sprintf( esc_html__( 'This is description for %1$s page. HTML code allowed here.', 'pixzlo-core' ), $template_sname ),
				'default'	=> '',
			);
		}
		
		$template_array = array(
			array(
				'id'       => $template.'-page-title-opt',
				'type'     => 'switch',
				'title'    => sprintf( esc_html__( '%1$s Page Title', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title.', 'pixzlo-core' ), $template_sname ),
				'default'  => 1,
				'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			),
			array(
				'id'       => $template.'-pagetitle-settings-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Title Settings', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'This is page title style settings for this template', 'pixzlo-core' ),
				'indent'   => true, 
				'required' 		=> array($template.'-page-title-opt', '=', 1)
			),
			$color[0],
			$template_t[2],
			$template_t[3],
			$template_t[4],
			$template_t[5],
			array(
				'id'       => $template.'-page-title-parallax',
				'type'     => 'switch',
				'title'    => esc_html__( 'Background Parallax', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background parallax.', 'pixzlo-core' ), $template_sname ),
				'default'  => 0,
				'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			),
			array(
				'id'       => $template.'-page-title-bg',
				'type'     => 'switch',
				'title'    => esc_html__( 'Background Video', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background video.', 'pixzlo-core' ), $template_sname ),
				'default'  => 0,
				'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			),
			array(
				'id'       => $template.'-page-title-video',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Page Title Background Video', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'Set page title background video for %1$s page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'pixzlo-core' ), $template_sname ),
				'required' => array($template.'-page-title-bg', '=', 1),
				'default'  => ''
			),
			array(
                'id'       => $template.'-page-title-overlay',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Page Title Overlay', 'pixzlo-core' ),
                'subtitle' => esc_html__( 'Choose page title overlay rgba color.', 'pixzlo-core' ),
                'default'  => array(
                    'color' => '',
                    'alpha' => ''
                ),
                'mode'     => 'background',
            ),
			$page_tit,
			$page_tit_desc,
			$page_title_items[0],
			array(
				'id'     => $template.'-pagetitle-settings-end',
				'type'   => 'section',
				'indent' => false, 
			),
			array(
				'id'       => $template.'-featured-slider',
				'type'     => 'switch',
				'title'    => sprintf( esc_html__( '%1$s Featured Slider', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s featured slider.', 'pixzlo-core' ), $template_sname ),
				'default'  => 0,
				'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
			),
			array(
				'id'       => $template.'-article-style-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Article Style', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'This is layout style settings for each %1$s article', 'pixzlo-core' ), $template_sname ),
				'indent'   => true
			),
			array(
				'id'       => $template.'-article-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Article Style', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Choose %1$s article style.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'default' => esc_html__( 'Default', 'pixzlo-core' ),
					'1' => esc_html__( 'Style 1', 'pixzlo-core' ),
					'2' => esc_html__( 'Style 2', 'pixzlo-core' ),
					'3' => esc_html__( 'Style 3', 'pixzlo-core' )
				),
				'default'  => 'default'
			),
			array(
				'id'     => $template.'-article-style-end',
				'type'   => 'section',
				'indent' => false, 
			),
			array(
				'id'       => $template.'-article-settings-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Article Skin', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'This is skin settings for each %1$s article', 'pixzlo-core' ), $template_sname ),
				'indent'   => true
			),
			$template_article_color[0],
			$template_article[2],
			$template_article[3],
			$template_article[4],
			$template_article[1],
			array(
				'id'     => $template.'-article-settings-end',
				'type'   => 'section',
				'indent' => false, 
			),
			array(
				'id'       => $template.'-post-formats-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Post Format Settings', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'This is post format settings for %1$s', 'pixzlo-core' ), $template_sname ),
				'indent'   => true
			),
			array(
				'id'       => $template.'-video-format',
				'type'     => 'select',
				'title'    => esc_html__( 'Video Format', 'pixzlo-core' ),
				'desc'	   => sprintf( esc_html__( 'Choose %1$s page video post format settings.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'onclick' => esc_html__( 'On Click Run Video', 'pixzlo-core' ),
					'overlay' => esc_html__( 'Modal Box Video', 'pixzlo-core' ),
					'direct' => esc_html__( 'Direct Video', 'pixzlo-core' )
				),
				'default'  => 'onclick'
			),
			array(
				'id'       => $template.'-quote-format',
				'type'     => 'select',
				'title'    => esc_html__( 'Quote Format', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Choose %1$s page quote post format settings.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
					'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
					'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
					'none' => esc_html__( 'None', 'pixzlo-core' )
				),
				'default'  => 'featured'
			),
			array(
				'id'       => $template.'-link-format',
				'type'     => 'select',
				'title'    => esc_html__( 'Link Format', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Choose %1$s page link post format settings.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
					'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
					'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
					'none' => esc_html__( 'None', 'pixzlo-core' )
				),
				'default'  => 'featured'
			),
			array(
				'id'       => $template.'-gallery-format',
				'type'     => 'select',
				'title'    => esc_html__( 'Gallery Format', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Choose %1$s page gallery post format settings.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'default' => esc_html__( 'Default Gallery', 'pixzlo-core' ),
					'popup' => esc_html__( 'Popup Gallery', 'pixzlo-core' ),
					'grid' => esc_html__( 'Grid Popup Gallery', 'pixzlo-core' )
				),
				'default'  => 'default'
			),
			array(
				'id'     => $template.'-post-formats-end',
				'type'   => 'section',
				'indent' => false, 
			),
			array(
				'id'       => $template.'-settings-start',
				'type'     => 'section',
				'title'    => sprintf( esc_html__( '%1$s Settings', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'This is settings for %1$s', 'pixzlo-core' ), $template_sname ),
				'indent'   => true
			),
			array(
				'id'       => $template.'-page-template',
				'type'     => 'image_select',
				'title'    => sprintf( esc_html__( '%1$s Template', 'pixzlo-core' ), $template_cname ),
				'desc'     => sprintf( esc_html__( 'Choose your current %1$s page template.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'no-sidebar' => array(
						'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
					),
					'right-sidebar' => array(
						'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
					),
					'left-sidebar' => array(
						'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
					),
					'both-sidebar' => array(
						'alt' => esc_html__( 'Both Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/4.png'
					)
				),
				'default'  => 'right-sidebar'
			),
			array(
				'id'       => $template.'-left-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Left Sidebar', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s page on left sidebar.', 'pixzlo-core' ), $template_sname ),
				'data'     => 'sidebars',
				'required' 		=> array($template.'-page-template', '=', array( 'left-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => $template.'-right-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Right Sidebar', 'pixzlo-core' ),
				'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s page on right sidebar.', 'pixzlo-core' ), $template_sname ),
				'data'     => 'sidebars',
				'default'  => 'sidebar-1',
				'required' 		=> array($template.'-page-template', '=', array( 'right-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => $template.'-sidebar-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sidebar Sticky', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable sidebar sticky.', 'pixzlo-core' ),
				'default'  => 1,
				'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				'required' => array($template.'-page-template', '!=', 'no-sidebar')
			),
			array(
				'id'       => $template.'-page-hide-sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sidebar on Mobile', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'pixzlo-core' ),
				'default'  => 1,
				'on'       => esc_html__( 'Show', 'pixzlo-core' ),
				'off'      => esc_html__( 'Hide', 'pixzlo-core' ),
				'required' => array($template.'-page-template', '!=', 'no-sidebar')
			),
			array(
				'id'       => $template.'-post-template',
				'type'     => 'image_select',
				'title'    => sprintf( esc_html__( '%1$s Post Template', 'pixzlo-core' ), $template_cname ),
				'desc'     => sprintf( esc_html__( 'Choose your current %1$s post template.', 'pixzlo-core' ), $template_sname ),
				'options'  => array(
					'standard' => array(
						'alt' => esc_html__( 'Standard', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/post-layouts/1.png'
					),
					'grid' => array(
						'alt' => esc_html__( 'Grid', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/post-layouts/2.png'
					),
					'list' => array(
						'alt' => esc_html__( 'List', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/post-layouts/3.png'
					)
				),
				'default'  => 'standard'
			),
			array(
				'id'       => $template.'-top-standard-post',
				'type'     => 'switch',
				'title'    => esc_html__( 'Top Standard Post', 'pixzlo-core' ),
				'subtitle' => esc_html__( 'Enable/Disable to show top post layout standard others selected layout.', 'pixzlo-core' ),
				'default'  => 0,
				'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				'required' => array($template.'-post-template', '!=', 'standard')
			),
			array(
				'id'       => $template.'-grid-cols',
				'type'     => 'select',
				'title'    => esc_html__( 'Grid Columns', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select grid columns.', 'pixzlo-core' ),
				'options'  => array(
					'4'		=> esc_html__( '4 Columns', 'pixzlo-core' ),
					'3'		=> esc_html__( '3 Columns', 'pixzlo-core' ),
					'2'		=> esc_html__( '2 Columns', 'pixzlo-core' ),
				),
				'default'  => '2',
				'required' 		=> array($template.'-post-template', '=', 'grid')
			),
			array(
				'id'       => $template.'-grid-gutter',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Grid Gutter', 'pixzlo-core' ), $template_cname ),
				'subtitle' => esc_html__( 'Enter grid gutter size. Example 20.', 'pixzlo-core' ),
				'default'  => esc_html__( '20', 'pixzlo-core' ),
				'required' 		=> array($template.'-post-template', '=', 'grid')
			),
			array(
				'id'       => $template.'-grid-type',
				'type'     => 'select',
				'title'    => esc_html__( 'Grid Type', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select grid type normal or isotope.', 'pixzlo-core' ),
				'options'  => array(
					'normal'		=> esc_html__( 'Normal Grid', 'pixzlo-core' ),
					'isotope'		=> esc_html__( 'Isotope Grid', 'pixzlo-core' ),
				),
				'default'  => 'isotope',
				'required' 		=> array($template.'-post-template', '=', 'grid')
			),
			array(
				'id'       => $template.'-infinite-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Infinite Scroll', 'pixzlo-core' ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable infinite scroll for %1$s post.', 'pixzlo-core' ), $template_sname ),
				'default'  => 0,
				'on'       => esc_html__( 'On', 'pixzlo-core' ),
				'off'      => esc_html__( 'Off', 'pixzlo-core' ),
				'required' => array($template.'-grid-type', '=', 'isotope')
			),
			array(
				'id'       => $template.'-more-text',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Page Read More Text', 'pixzlo-core' ), $template_cname ),
				'default'  => esc_html__( 'Read More', 'pixzlo-core' )
			),
			array(
				'id'       => $template.'-excerpt',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Excerpt Length', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'This is excerpt length for %1$s layout.', 'pixzlo-core' ), $template_sname ),
				'default'  => esc_html__( '30', 'pixzlo-core' )
			),
			array(
				'id'       => $template.'-article-alignment',
				'type'     => 'select',
				'title'    => esc_html__( 'Article Alignment', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select article alignment left/center/right. If no one choose, then default option will be selected.', 'pixzlo-core' ),
				'options'  => array(
					'default'	=> '',
					'left'		=> esc_html__( 'Left', 'pixzlo-core' ),
					'center'		=> esc_html__( 'Center', 'pixzlo-core' ),
					'right'		=> esc_html__( 'Right', 'pixzlo-core' )
				),
				'default'  => ''
			),
			array(
				'id'      => $template.'-topmeta-items',
				'type'    => 'sorter',
				'title'   => sprintf( esc_html__( '%1$s Post Top Meta Items', 'pixzlo-core' ), $template_cname ),
				'desc'    => sprintf( esc_html__( 'Needed %1$s post top meta items drag from disabled and put enabled part. ie: Left or Right.', 'pixzlo-core' ), $template_sname ),
				'options' => array(
					'Left'  => array(
						'date'	=> esc_html__( 'Date', 'pixzlo-core' )
					),
					'Right'  => array(
						'category'	=> esc_html__( 'Category', 'pixzlo-core' )
					),
					'disabled' => array(
						'social'	=> esc_html__( 'Social Share', 'pixzlo-core' ),
						'comments'	=> esc_html__( 'Comments', 'pixzlo-core' ),
						'likes'	=> esc_html__( 'Likes', 'pixzlo-core' ),
						'author'	=> esc_html__( 'Author', 'pixzlo-core' ),
						'views'	=> esc_html__( 'Views', 'pixzlo-core' ),
						'more'	=> esc_html__( 'Read More', 'pixzlo-core' ),
						'favourite'	=> esc_html__( 'Favourite', 'pixzlo-core' )
					)
				),
			),
			array(
				'id'      => $template.'-bottommeta-items',
				'type'    => 'sorter',
				'title'   => sprintf( esc_html__( '%1$s Post Bottom Meta Items', 'pixzlo-core' ), $template_cname ),
				'desc'    => sprintf( esc_html__( 'Needed %1$s post bottom meta items drag from disabled and put enabled part. ie: Left or Right.', 'pixzlo-core' ), $template_sname ),
				'options' => array(
					'Left'  => array(
						'more'	=> esc_html__( 'Read More', 'pixzlo-core' ),
					),
					'Right'  => array(
					),
					'disabled' => array(
						'comments'	=> esc_html__( 'Comments', 'pixzlo-core' ),
						'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
						'social'	=> esc_html__( 'Social Share', 'pixzlo-core' ),
						'comments'	=> esc_html__( 'Comments', 'pixzlo-core' ),
						'likes'	=> esc_html__( 'Likes', 'pixzlo-core' ),
						'author'	=> esc_html__( 'Author', 'pixzlo-core' ),
						'views'	=> esc_html__( 'Views', 'pixzlo-core' ),
						'date'	=> esc_html__( 'Date', 'pixzlo-core' ),
						'favourite'	=> esc_html__( 'Favourite', 'pixzlo-core' )
					)
				),
			),
			array(
				'id'      => $template.'-items',
				'type'    => 'sorter',
				'title'   => sprintf( esc_html__( '%1$s Post Items', 'pixzlo-core' ), $template_cname ),
				'desc'    => sprintf( esc_html__( 'Needed %1$s post items drag from disabled and put enabled part. Thumbnail part covers the post format either image/audio/video/gallery/quote/link.', 'pixzlo-core' ), $template_sname ),
				'options' => array(
					'Enabled'  => array(
						'title'	=> esc_html__( 'Title', 'pixzlo-core' ),
						'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
						'thumb'	=> esc_html__( 'Thumbnail', 'pixzlo-core' ),
						'content'	=> esc_html__( 'Content', 'pixzlo-core' ),
						'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo-core' )
					),
					'disabled' => array(
						'more-icon'	=> esc_html__( 'Read More Icon', 'pixzlo-core' ),
					)
				),
			),
			array(
				'id'       => $template.'-overlay-opt',
				'type'     => 'switch',
				'title'    => sprintf( esc_html__( '%1$s Post Overlay', 'pixzlo-core' ), $template_cname ),
				'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s post overlay.', 'pixzlo-core' ), $template_sname ),
				'default'  => 0,
				'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
				'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			),
			array(
				'id'      => $template.'-overlay-items',
				'type'    => 'sorter',
				'title'   => sprintf( esc_html__( '%1$s Post Overlay Items', 'pixzlo-core' ), $template_cname ),
				'desc'    => sprintf( esc_html__( 'Needed %1$s post overlay items drag from disabled and put enabled part.', 'pixzlo-core' ), $template_sname ),
				'options' => array(
					'Enabled'  => array(
						'title'	=> esc_html__( 'Title', 'pixzlo-core' ),
					),
					'disabled' => array(
						'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
						'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo-core' )
					)
				),
				'required' 		=> array($template.'-overlay-opt', '=', 1)
			),
			array(
				'id'     => $template.'-settings-end',
				'type'   => 'section',
				'indent' => false, 
			),
		);
		
		return $template_array;
	}
	
	function pixzloThemeOptCPT( $field_name, $field_sname, $default ){
		$cpt_array = array(
			array(
				'id'       => 'cpt-'. esc_attr( $field_sname ) .'-slug',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Slug', 'pixzlo-core' ), $field_name ),
				'desc'     => sprintf( esc_html__( 'Enter %1$s slug for register custom post type.', 'pixzlo-core' ), $field_sname ),
				'default'  => $default['slug']
			),
			array(
				'id'       => 'cpt-'. esc_attr( $field_sname ) .'-category-slug',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Category Slug', 'pixzlo-core' ), $field_name ),
				'desc'     => sprintf( esc_html__( 'Enter category slug for %1$s custom post type.', 'pixzlo-core' ), $field_sname ),
				'default'  => $default['cat_slug']
			),
			array(
				'id'       => 'cpt-'. esc_attr( $field_sname ) .'-tag-slug',
				'type'     => 'text',
				'title'    => sprintf( esc_html__( '%1$s Tag Slug', 'pixzlo-core' ), $field_name ),
				'desc'     => sprintf( esc_html__( 'Enter %1$s slug for portfolio custom post type.', 'pixzlo-core' ), $field_sname ),
				'default'  => $default['tag_slug']
			)
		);
		
		return $cpt_array;
	}
	
	function pixzloGetThemeTemplatesKey(){
		$pixzlo_opt = $this->pixzlo_options;
		return isset( $pixzlo_opt['theme-templates'] ) ? $pixzlo_opt['theme-templates'] : array();
	}
}