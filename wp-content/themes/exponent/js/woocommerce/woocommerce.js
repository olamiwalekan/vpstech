( function($) {
    "use strict";
    var body = document.body,  
        $win = jQuery(window),
        productGalleryLightboxObj,
        doc = jQuery(document),
        quantity = function() {
            doc.on( 'click', '.exp-wc-qty-plus, .exp-wc-qty-minus', function() {
                var curEle = jQuery(this),
                    inputEle = curEle.siblings( '.qty' ),
                    min = parseInt( inputEle.attr( 'min' ) ),
                    max = parseInt( inputEle.attr( 'max' ) ),
                    inputVal = parseInt( inputEle.val() );
                if( curEle.hasClass( 'exp-wc-qty-plus' ) ) {
                    if( isNaN( max ) || max > inputVal ) {
                        inputEle.val( parseInt( inputVal ) + 1 );
                    }
                }else if( curEle.hasClass( 'exp-wc-qty-minus' ) ) {
                    if( isNaN( min ) || min < inputVal ) {
                        inputEle.val( parseInt( inputVal ) - 1 );
                    }
                }   
            } );
        },
        call_ajax_add_to_wishlist = function( ev ) {
            ev.preventDefault();
            var el = jQuery( this ),
                addToWishlistHeart = el.find( '.exp-add-to-wishlist-icon' ),
                productId = el.attr( 'data-product-id' ),
                productType = el.attr( 'data-product-type' ),
                data = {
                    add_to_wishlist : productId,
                    product_type : productType,
                    action : yith_wcwl_l10n.actions.add_to_wishlist_action
                };
            $.ajax({
                type : 'POST',
                url: yith_wcwl_l10n.ajax_url,
                data: data,
                dataType: 'json',
                beforeSend: function(){
                    el.addClass( 'exp-show-loader' );
                },
                complete : function() {
                    el.removeClass( 'exp-show-loader' );
                },
                success : function( response ) {
                    var responseResult = response.result,
                        addToWishlistText;
                    if( responseResult == 'true' ) {
                        if( 0 < el.find( '.exp-add-to-wishlist-text' ).length ) {
                            addToWishlistText = el.find( '.exp-add-to-wishlist-text' );
                            if( 0 < addToWishlistText.length ) {
                                addToWishlistText.text( 'Browse Wishlist' );
                            }
                        }
                        el.removeClass( 'exp-show-loader, exp-wc-trigger-add-to-wishlist' );
                        el.attr( 'href', response.wishlist_url );
                        addToWishlistHeart.remove();
                        el.addClass( 'exp-already-in-wishlist' );
                    }
                }
                
            });
        },
        showCartSlidebar = (function(){
            var cartSlidebar = jQuery( '.exp-wc-cart-slidebar-wrap' ),
                cartSlidebarCloseElements = cartSlidebar.find( '.exp-wc-cart-widget-overlay, .exp-wc-mini-cart-close-icon' );
            cartSlidebarCloseElements.on( 'click', function() {
                cartSlidebar.removeClass( 'exp-wc-slidebar-visible' );
            } );
            return function() {
                if( 0 < cartSlidebar.length ) {
                    cartSlidebar.addClass( 'exp-wc-slidebar-visible' );
                }
            }
        })(),
        cartWidget = function() {
            var widgetEle = jQuery( '.exponent-cart' );
            if( 0 < widgetEle.length ) {
                widgetEle.on( 'click', function(e) {
                    e.preventDefault();
                    showCartSlidebar();
                });
            }
        },
        updateCartIcon = function() {
            var updateCartWrapper = jQuery( '.woocommerce-cart-form .exp-wc-update-cart' ),
                updateCartButton = jQuery( '.woocommerce-cart-form :input[name="update_cart"]' );
            updateCartWrapper.addClass('enabled');
            if( updateCartButton.prop( 'disabled' ) ) {
                updateCartButton.prop( 'disabled', false );
            }
        },
        setUpWooEvents = function() {
            jQuery( body ).on( 'adding_to_cart', function( e, addToCartButton, data ) {
                if( 0 < addToCartButton.length ) {
                    addToCartButton.parent().addClass( 'exp-show-loader' );
                }
            } );
            jQuery( body ).on( 'added_to_cart', function( e, fragments, cartHash, addToCartButton ) {
                if( 0 < addToCartButton.length ) {
                    addToCartButton.parent().removeClass( 'exp-show-loader' );
                }
                miniCart();
                showCartSlidebar();
            } );
            jQuery( body ).on( 'removed_from_cart', function( e, fragments, cartHash ) {
                miniCart();
            });
            jQuery( body ).on( 'wc_cart_button_updated', function( e, addToCartButton ) {
                if( 0 < addToCartButton.length ) {
                    addToCartButton.parent().find( '.added_to_cart' ).remove();
                }
            } );
            jQuery( '.variations_form .single_variation' ).on( 'show_variation', fixedProductTemplate.recalc );
            jQuery( '.variations_form .single_variation' ).on( 'hide_variation', fixedProductTemplate.recalc );
            jQuery( '.variations_form' ).on( 'found_variation', updateVariationImages );
            jQuery( document ).on( 'change input', '.woocommerce-cart-form .cart_item :input', updateCartIcon);
            jQuery( document ).on( 'click', '.woocommerce-cart-form .exp-wc-qty-plus, .woocommerce-cart-form .exp-wc-qty-minus', updateCartIcon);
            jQuery(document).on( 'click', '.exp-wc-trigger-add-to-wishlist', call_ajax_add_to_wishlist );
            jQuery('.exp-wc-main-slider .be-slide-inner').on( 'click', function(e) {
                e.stopPropagation();
            }); 
            jQuery('.exp-wc-main-slider').on( 'staticClick.flickity', function(event, pointer, cellElement, cellIndex) {
                if(!cellElement) {
                    return;
                }
                if( null != productGalleryLightboxObj ) {
                    productGalleryLightboxObj.open( 'product-gallery', cellIndex );
                }
            });
        },
        productGalleryLightbox = function() {
            asyncloader.require( 'modulobox', function() {
                productGalleryLightboxObj = new ModuloBox({
                    mediaSelector : '.product-gallery-lightbox',
                    thumbnails : false
                });    
                productGalleryLightboxObj.init();
            });
        },
        productGalleryZoom = (function() {
            var mainSlider = jQuery( '.exp-wc-main-slider' ),
                zoomTargets,
                sliderWidth,
                sliderHeight,
                zoomEnabled = jQuery.isFunction( jQuery.fn.zoom ) && 'undefined' != typeof wc_single_product_params && wc_single_product_params.zoom_enabled,
                triggerZoom = function( target ) {
                    if( 0 < mainSlider.length && 1024 < $win.width() && zoomEnabled ) {
                        zoomTargets = null == target ? mainSlider.find( '.exp-wc-main-slider__image' ) : target;
                        sliderWidth = mainSlider.width();
                        sliderHeight = mainSlider.height();
                        zoomTargets.each(function() {
                            var curTarget = jQuery(this),
                                image = curTarget.find( 'img' );
                            if ( image.attr( 'data-large_image_width' ) > sliderWidth && image.attr( 'data-large_image_height' ) > sliderHeight ) {
                                var zoom_options = jQuery.extend( {
                                    url : image.attr( 'data-large_image' ),
                                    callback : function() {
                                        var curImg = $(this);
                                        curImg.on('click', function(e) {
                                            e.stopPropagation();
                                        });
                                    },
                                    touch: false
                                }, wc_single_product_params.zoom_options );
                                if ( 'ontouchstart' in document.documentElement ) {
                                    zoom_options.on = 'click';
                                }
                                curTarget.trigger( 'zoom.destroy' );
                                curTarget.zoom( zoom_options );
                            }else {
                                curTarget.trigger( 'zoom.destroy' );
                            }
                        });
                    }  
                };
            return triggerZoom;
        })(),
        miniCart = function() {
            var cartItemsContainer = jQuery( '.exp-wc-cart-contents-wrap' ),
                miniCartContainer = jQuery( '.woocommerce-mini-cart' );
            if( 0 < cartItemsContainer.length && 0 < miniCartContainer.length ) {
                if( cartItemsContainer.outerHeight() > miniCartContainer.height() ) {
                    asyncloader.require( 'perfectScrollbar', function() {
                        new PerfectScrollbar( miniCartContainer[0] );
                    } );
                }
            }
        },
        loadQuickView = function( productId, quickViewButton ) {
            if( null != exponentThemeConfig ) {
                jQuery.post( exponentThemeConfig.ajaxurl, 
                    { action : 'exponent_quickview', product : productId }, function(response){
                        jQuery( body ).append( response );
                        var quickViewWrap = jQuery( '.exp-wc-quickview-wrap' ),
                            quickviewSlider,
                            variationForms,
                            productInfo;
                        if( 0 < quickViewWrap.length ) {
                            quickViewWrap.find( '.exp-wc-close-quickview, .exp-wc-quickview-overlay' ).on( 'click', function( e ) {
                                quickViewWrap.removeClass( 'exp-wc-quickview-animate' );
                                setTimeout( function() {
                                    quickViewWrap.remove();
                                }, 500 );
                            } );
                            quickviewSlider = quickViewWrap.find( '.exp-quickview-slider' );  
                            variationForms = quickViewWrap.find( '.variations_form' );  
                            productInfo = quickViewWrap.find( '.exp-wc-product-info' );
                            asyncloader.require( [ 'flickity', 'perfectScrollbar' ], function() {
                                if( 0 < quickviewSlider.length ) {
                                    quickviewSlider.flickity({
                                        contain : true,
                                        lazyLoad : '1' == quickviewSlider.attr( 'data-lazy-load' ) ? true : false,
                                        pageDots : '1' == quickviewSlider.attr('data-dots') && 1 < quickviewSlider.find('.be-slide').length ? true : false,
                                        prevNextButtons : '1' == quickviewSlider.attr('data-arrows') && 1 < quickviewSlider.find('.be-slide').length ? true : false,
                                    });
                                }
                                if( 0 < productInfo.length ) {
                                    new PerfectScrollbar( productInfo[0] );
                                }
                                if( 0 < variationForms.length ) {
                                    variationForms.wc_variation_form();
                                    variationForms.on( 'found_variation', updateVariationImagesQuickView );
                                }
                                setTimeout( function() {
                                    quickViewButton.removeClass( 'exp-show-loader' );
                                    quickViewWrap.addClass( 'exp-wc-quickview-animate' );
                                }, 50);
                            });
                        }
                    });
            }
        },
        quickView = function() {
            var quickViewEle = jQuery('.exp-quick-view');
            if( 0 < quickViewEle.length ) {
                quickViewEle.on( 'click', function( e ) {
                    var curEle = jQuery( this ),
                        productId = curEle.attr( 'data-product-id' );
                    if( null != productId ) {
                        curEle.addClass( 'exp-show-loader' );
                        loadQuickView( productId, curEle );
                    }
                } );
            }
        },
        updateVariationImages = function(e, variation) {
            var variationForm = jQuery(this),
                product          = variationForm.closest( '.product' ),
                galleryHasImage,
                targetImageSrc,
                imagesToReplace,
                mainSlider,
                productGallery,
                thumbSlider;
            if( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
                if( !jQuery( body ).hasClass( 'product-template-product_fixed' ) ) {
                    mainSlider = jQuery( '.exp-wc-main-slider' );
                    thumbSlider = jQuery( '.exp-wc-thumb-slider' );
                    if( 0 < mainSlider.length ) {
                        mainSlider = product.find('.exp-wc-main-slider' );
                        thumbSlider = product.find( '.exp-wc-thumb-slider' );
                        galleryHasImage = 0 < mainSlider.length ? mainSlider.find( '.be-slide img[src = "' + variation.image.src + '"]'  ).length > 0 : false;
                        if( galleryHasImage ) {
                            mainSlider.flickity( 'selectCell', mainSlider.find( '.be-slide img[src = "' + variation.image.src + '"]'  ).closest( '.be-slide' ).index() );
                        }else {
                            [mainSlider, thumbSlider].forEach( function( curSlider ) {
                                if( 0 < curSlider.length ) {
                                    targetImageSrc = curSlider.find('.be-slide').eq(0).find( 'img' ).attr( 'src' ) || curSlider.find('.be-slide').eq(0).find( 'img' ).attr( 'data-src' );
                                    imagesToReplace = curSlider.find( 'img[src = "' + targetImageSrc + '"]' );
                                    imagesToReplace.each(function() {
                                        var curImage = jQuery(this),
                                            curSlide = curImage.closest( '.be-slide' );
                                        if( curSlider.hasClass( 'exp-wc-main-slider' ) ) {
                                            curSlide.attr( 'data-src', variation.image.full_src );
                                            curSlide.attr( 'data-thumb', variation.image.gallery_thumbnail_src );
                                            
                                            curImage.attr( 'data-large_image', variation.image.full_src );
                                            curImage.attr( 'data-large_image_width', variation.image.full_src_w );
                                            curImage.attr( 'data-large_image_height', variation.image.full_src_h );
                                            if( null != productGalleryLightboxObj ) {
                                                productGalleryLightboxObj.getGalleries();
                                            }
                                            productGalleryZoom( curSlide );
                                        }
                                        if( null != curImage.attr( 'src' ) ) {
                                            curImage.attr( 'src', curSlider.hasClass( 'exp-wc-main-slider' ) ? variation.image.src : variation.image.gallery_thumbnail_src );
                                        }else if( null != curImage.attr( 'data-src' ) ) {
                                            curImage.attr( 'data-src', curSlider.hasClass( 'exp-wc-main-slider' ) ? variation.image.src : variation.image.gallery_thumbnail_src );
                                        }
                                    });
                                }
                            } );
                            mainSlider.flickity( 'selectCell', 0 );
                        }
                    }
                }else {
                    productGallery = jQuery( '.woocommerce-product-fixed-gallery' );
                    if( 0 < productGallery.length ) {
                        galleryHasImage = productGallery.find( 'img[src = "' + variation.image.full_src + '"]' ).length > 0;
                        if( galleryHasImage ) {
                            jQuery("html, body").animate({ scrollTop: productGallery.find( 'img[src = "' + variation.image.full_src + '"]' ).closest( '.woocommerce-product-gallery__image' ).offset().top }, 600);
                        }else {
                            targetImageSrc = productGallery.eq(0).find( 'img' ).attr( 'src' ) || productGallery.eq(0).find( 'img' ).attr( 'data-src' );
                            imagesToReplace = productGallery.find( 'img[src = "' + targetImageSrc + '"], img[data-src = "' + targetImageSrc + '"]' );
                            imagesToReplace.each(function() {
                                var curImage = jQuery(this);
                                if( null != curImage.attr( 'src' ) ) {
                                    curImage.attr( 'src', variation.image.full_src );
                                }else if( null != curImage.attr( 'data-src' ) ) {
                                    curImage.attr( 'data-src', variation.image.full_src );
                                }
                            });
                            jQuery("html, body").animate({ scrollTop: imagesToReplace.eq(0).closest( '.woocommerce-product-gallery__image' ).offset().top }, 600);
                        }
                    }
                }
            }
        },
        updateVariationImagesQuickView = function(e, variation) {
            var variationForm = jQuery(this),
                quickView     = variationForm.closest( '.exp-wc-quickview' ),
                galleryHasImage,
                targetSlideImgSrc,
                moveToIndex,
                imagesToReplace,
                quickViewSlider = quickView.find('.exp-quickview-slider' );
            if( 0 < quickViewSlider.length && variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
                galleryHasImage = quickViewSlider.find( '.be-slide img[src = "' + variation.image.src + '"]'  ).length > 0;
                if( galleryHasImage ) {
                    moveToIndex = quickViewSlider.find( '.be-slide img[src = "' + variation.image.src + '"]'  ).closest( '.be-slide' ).index();
                    quickViewSlider.flickity( 'selectCell', moveToIndex );
                }else {
                    targetSlideImgSrc = quickViewSlider.find( '.be-slide' ).eq(0).find( 'img' ).attr( 'src' ) || quickViewSlider.find( '.be-slide' ).eq(0).find( 'img' ).attr( 'data-src' );
                    imagesToReplace = quickViewSlider.find( 'img[src = "' + targetSlideImgSrc + '"]' );
                    imagesToReplace.each(function() {
                        var curImage = jQuery(this);
                        if( null != curImage.attr( 'src' ) ) {
                            curImage.attr( 'src', variation.image.src );
                        }else if( null != curImage.attr( 'data-src' ) ) {
                            curImage.attr( 'data-src', variation.image.src );
                        }
                    });
                    quickViewSlider.flickity( 'selectCell', 0 );
                }
            }
        },
        rating = function() {
            var hollowStar = '<svg class="exp-hollow-star" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"><polygon fill="none" stroke="#979797" points="1189 6866 1190.9 6871.348 1196 6871.348 1191.838 6874.488 1193.327 6880 1189 6876.695 1184.675 6880 1186.162 6874.488 1182 6871.348 1187.1 6871.348" transform="translate(-1182 -6866)"/></svg>',
                filledStar = '<svg class="exp-filled-star" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><polygon fill="#4C4D4D" points="1170 6866 1171.9 6871.348 1177 6871.348 1172.838 6874.488 1174.327 6880 1170 6876.695 1165.675 6880 1167.162 6874.488 1163 6871.348 1168.1 6871.348" transform="translate(-1163 -6866)"/></svg>',
                commentFormStars = jQuery( '.comment-form-rating .stars a' );
            if( 0 < commentFormStars.length ) {
                var starWrap = jQuery( '<div class="exp-star-wrap">' + filledStar + hollowStar + '</div>' );
                commentFormStars.append( starWrap );
                commentFormStars.on( 'mouseenter', function( e ) {
                    var curEle = jQuery( this );
                    curEle.addClass( 'exp-hovered' );
                    curEle.prevAll().addClass( 'exp-hovered' );
                } );
                commentFormStars.on( 'mouseleave', function( e ) {
                    var curEle = jQuery( this );
                    curEle.removeClass( 'exp-hovered' );
                    curEle.prevAll().removeClass( 'exp-hovered' );

                } );
                commentFormStars.on( 'click', function( e ) {
                    var curEle = jQuery( this );
                    curEle.siblings().removeClass( 'active' );
                    curEle.addClass( 'active' );
                    setTimeout( function() {
                        curEle.prevAll().addClass( 'active' );
                    }, 0 );
                } );
            }
        },
        fixedProductTemplate = (function() {
            var pageTemplate = jQuery( body ).attr( 'data-be-page-template' ) || '',
                stickyElements,
                initialized = false,
                stickyElementTop,
                stickyParent,
                init = function() {
                    if( 'product_fixed' === pageTemplate && 1023 < window.innerWidth ) {
                        asyncloader.require('sticky-kit', function(){
                            if( 0 < stickyElements.length && 0 < stickyParent.length && !initialized ) {
                                stickyElements.stick_in_parent({
                                    parent : stickyParent,
                                    offset_top : stickyElementTop
                                });
                                initialized = true;
                            }
                        });
                    }
                },
                recalc = function() {
                    if( 'product_fixed' === pageTemplate && 0 < stickyElements.length ) {
                        setTimeout(function() {
                            stickyElements.trigger('sticky_kit:recalc');
                        }, 200 );
                    }
                };
            if( 'product_fixed' === pageTemplate ) {
                stickyElements = jQuery( '.exp-wc-product-info-inner,.exp-wc-product-gallery-inner-wrap' );
                stickyElementTop = jQuery( body ).hasClass( 'admin-bar' ) ? 72 : 0;
                stickyParent = stickyElements.closest( '.be-row' );
                $win.on( 'resize', function( e ) {
                    if( 0 < stickyElements.length && 0 < stickyParent.length ) {
                        if( window.innerWidth < 1024 && initialized ) {
                            stickyElements.trigger("sticky_kit:detach");
                            initialized = false;
                        }else if( window.innerWidth >= 1024 && !initialized ) {
                            asyncloader.require( 'sticky-kit', function() {
                                stickyElements.stick_in_parent({
                                    parent : stickyParent,
                                    offset_top : stickyElementTop
                                });
                                initialized = true;
                            });
                        }
                    }
                } );
            }
            return {
                init : init,
                recalc : recalc,
            }
        })();
    $(function(){
        quantity();
        miniCart();
        cartWidget();
        setUpWooEvents();
        quickView();
        rating();
        productGalleryLightbox();
        productGalleryZoom();
        fixedProductTemplate.init();
    });
} )(jQuery);
