/* global jQuery:false */
/* global SHAHA_STORAGE:false */

jQuery(document).ready(function() {
	"use strict";

	var theme_init_counter = 0;
	
	shaha_init_actions();
	
	// Theme init actions
	function shaha_init_actions() {

		if (SHAHA_STORAGE['vc_edit_mode'] && jQuery('.vc_empty-placeholder').length==0 && theme_init_counter++ < 30) {
			setTimeout(shaha_init_actions, 200);
			return;
		}

        // Check fullheight elements
        jQuery(document).on('action.init_hidden_elements', shaha_stretch_height);
        jQuery(document).on('action.init_shortcodes', shaha_stretch_height);
        jQuery(document).on('action.sc_layouts_row_fixed_off', shaha_stretch_height);
        jQuery(document).on('action.sc_layouts_row_fixed_on', shaha_stretch_height);

        // Add resize on VC action vc-full-width-row
		// But we emulate 'action.resize_vc_row_start' and 'action.resize_vc_row_end'
		// to correct resize sliders and video inside 'boxed' pages
        var vc_resize = false;
        jQuery(document).on('action.resize_vc_row_start', function(e, el) {
			vc_resize = true;
			shaha_resize_actions(el);
		});
	
		// Resize handlers
		jQuery(window).resize(function() {
			if (!vc_resize) {
			    shaha_resize_actions();
            }
		});
		
		// Scroll handlers
		jQuery(window).scroll(function() {
			shaha_scroll_actions();
		});
		
		// First call to init core actions
		shaha_ready_actions();
        shaha_resize_actions();
        shaha_scroll_actions();
		
		// Wait for logo load
		if (jQuery('body').hasClass('menu_style_side') && !shaha_check_images_complete(jQuery('.menu_side_wrap .sc_layouts_logo'))) {
			setTimeout(function() {
				shaha_stretch_sidemenu();
			}, 500);
		}
	}
	
	
	
	// Theme first load actions
	//==============================================
	function shaha_ready_actions() {
	
		// Add scheme class and js support
		//------------------------------------
		document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');
		if (document.documentElement.className.indexOf(SHAHA_STORAGE['site_scheme'])==-1)
			document.documentElement.className += ' ' + SHAHA_STORAGE['site_scheme'];

		// Init background video
		//------------------------------------
		// Use Bideo to play local video
		if (SHAHA_STORAGE['background_video'] && jQuery('.top_panel.with_bg_video').length > 0 && window.Bideo) {
			// Waiting 10ms after mejs init
			setTimeout(function() {
				jQuery('.top_panel.with_bg_video').prepend('<video id="background_video" loop muted></video>');
				var bv = new Bideo();
				bv.init({
					// Video element
					videoEl: document.querySelector('#background_video'),
					
					// Container element
					container: document.querySelector('.top_panel'),
					
					// Resize
					resize: true,
					
					// autoplay: false,
					
					isMobile: window.matchMedia('(max-width: 768px)').matches,
					
					playButton: document.querySelector('#background_video_play'),
					pauseButton: document.querySelector('#background_video_pause'),
					
					// Array of objects containing the src and type
					// of different video formats to add
					// For example:
					//	src: [
					//			{	src: 'night.mp4', type: 'video/mp4' }
					//			{	src: 'night.webm', type: 'video/webm;codecs="vp8, vorbis"' }
					//		]
					src: [
						{
							src: SHAHA_STORAGE['background_video'],
							type: 'video/'+shaha_get_file_ext(SHAHA_STORAGE['background_video'])
						}
					],
					
					// What to do once video loads (initial frame)
					onLoad: function () {
						//document.querySelector('#background_video_cover').style.display = 'none';
					}
				});
			}, 10);
		
		// Use Tubular to play video from Youtube
		} else if (jQuery.fn.tubular) {
			jQuery('div#background_video').each(function() {
				var youtube_code = jQuery(this).data('youtube-code');
				if (youtube_code) {
					jQuery(this).tubular({videoId: youtube_code});
					jQuery('#tubular-player').appendTo(jQuery(this)).show();
					jQuery('#tubular-container,#tubular-shield').remove();
				}
			});
		}

		// Remove Give Plugin class from Tooltips
		jQuery('.trx_addons_tooltip').removeClass('hint--top');
		jQuery('.trx_addons_tooltip').hover(function(e) {
			jQuery(this).removeClass('hint--top');
			e.preventDefault();
			return false;
		});

	
		// Tabs
		//------------------------------------
		if (jQuery('.shaha_tabs:not(.inited)').length > 0 && jQuery.ui && jQuery.ui.tabs) {
			jQuery('.shaha_tabs:not(.inited)').each(function () {
				// Get initially opened tab
				var init = jQuery(this).data('active');
				if (isNaN(init)) {
					init = 0;
					var active = jQuery(this).find('> ul > li[data-active="true"]').eq(0);
					if (active.length > 0) {
						init = active.index();
						if (isNaN(init) || init < 0) init = 0;
					}
				} else {
					init = Math.max(0, init);
				}
				// Init tabs
				jQuery(this).addClass('inited').tabs({
					active: init,
					show: {
						effect: 'fadeIn',
						duration: 300
					},
					hide: {
						effect: 'fadeOut',
						duration: 300
					},
					create: function( event, ui ) {
						if (ui.panel.length > 0) jQuery(document).trigger('action.init_hidden_elements', [ui.panel]);
					},
					activate: function( event, ui ) {
						if (ui.newPanel.length > 0) jQuery(document).trigger('action.init_hidden_elements', [ui.newPanel]);
					}
				});
			});
		}
		// AJAX loader for the tabs
		jQuery('.shaha_tabs_ajax').on( "tabsbeforeactivate", function( event, ui ) {
			if (ui.newPanel.data('need-content')) shaha_tabs_ajax_content_loader(ui.newPanel, 1, ui.oldPanel);
		});
		// AJAX loader for the pages in the tabs
		jQuery('.shaha_tabs_ajax').on( "click", '.nav-links a', function(e) {
			var panel = jQuery(this).parents('.shaha_tabs_content');
			var page = 1;
			var href = jQuery(this).attr('href');
			var pos = -1;
			if ((pos = href.lastIndexOf('/page/')) != -1 ) {
				page = Number(href.substr(pos+6).replace("/", ""));
				if (!isNaN(page)) page = Math.max(1, page);
			}
			shaha_tabs_ajax_content_loader(panel, page);
			e.preventDefault();
			return false;
		});
	
		// Menu
		//----------------------------------------------
	
		// Add TOC in the side menu
		if (jQuery('.menu_side_inner').length > 0 && jQuery('#toc_menu').length > 0)
			jQuery('#toc_menu').appendTo('.menu_side_inner');
	
		// Open/Close side menu
		jQuery('.menu_side_button').on('click', function(e){
			jQuery(this).parent().toggleClass('opened');
			e.preventDefault();
			return false;
		});

		// Add images to the menu items with classes image-xxx
		jQuery('.sc_layouts_menu li[class*="image-"]').each(function() {
			var classes = jQuery(this).attr('class').split(' ');
			var icon = '';
			for (var i=0; i < classes.length; i++) {
				if (classes[i].indexOf('image-') >= 0) {
					icon = classes[i].replace('image-', '');
					break;
				}
			}
			if (icon) jQuery(this).find('>a').css('background-image', 'url('+SHAHA_STORAGE['theme_url']+'/trx_addons/css/icons.png/'+icon+'.png');
		});
	
		// Add arrows to the mobile menu
		jQuery('.menu_mobile .menu-item-has-children > a').append('<span class="open_child_menu"></span>');
	
		// Open/Close mobile menu
		jQuery('.sc_layouts_menu_mobile_button > a,.menu_mobile_button,.menu_mobile_description').on('click', function(e) {
			if (jQuery(this).parent().hasClass('sc_layouts_menu_mobile_button_burger') && jQuery(this).next().hasClass('sc_layouts_menu_popup')) return;
			jQuery('.menu_mobile_overlay').fadeIn();
			jQuery('.menu_mobile').addClass('opened');
			jQuery(document).trigger('action.stop_wheel_handlers');
			e.preventDefault();
			return false;
		});
		jQuery(document).on('keypress', function(e) {
			if (e.keyCode == 27) {
				if (jQuery('.menu_mobile.opened').length == 1) {
					jQuery('.menu_mobile_overlay').fadeOut();
					jQuery('.menu_mobile').removeClass('opened');
					jQuery(document).trigger('action.start_wheel_handlers');
					e.preventDefault();
					return false;
				}
			}
		});;
		jQuery('.menu_mobile_close, .menu_mobile_overlay').on('click', function(e){
			jQuery('.menu_mobile_overlay').fadeOut();
			jQuery('.menu_mobile').removeClass('opened');
			jQuery(document).trigger('action.start_wheel_handlers');
			e.preventDefault();
			return false;
		});
	
		// Open/Close mobile submenu
		jQuery('.menu_mobile').on('click', 'li a, li a .open_child_menu', function(e) {
			var $a = jQuery(this).hasClass('open_child_menu') ? jQuery(this).parent() : jQuery(this);
			if ($a.parent().hasClass('menu-item-has-children')) {
				if ($a.attr('href')=='#' || jQuery(this).hasClass('open_child_menu')) {
					if ($a.siblings('ul:visible').length > 0)
						$a.siblings('ul').slideUp().parent().removeClass('opened');
					else {
						jQuery(this).parents('li').siblings('li').find('ul:visible').slideUp().parent().removeClass('opened');
						$a.siblings('ul').slideDown().parent().addClass('opened');
					}
				}
			}
			if (!jQuery(this).hasClass('open_child_menu') && shaha_is_local_link($a.attr('href')))
				jQuery('.menu_mobile_close').trigger('click');
			if (jQuery(this).hasClass('open_child_menu') || $a.attr('href')=='#') {
				e.preventDefault();
				return false;
			}
		});
	
		if (!SHAHA_STORAGE['trx_addons_exist'] || jQuery('.top_panel.top_panel_default .sc_layouts_menu_default').length > 0) {
			// Init superfish menus
			shaha_init_sfmenu('.sc_layouts_menu:not(.inited) > ul:not(.inited)');
			// Show menu		
			jQuery('.sc_layouts_menu:not(.inited)').each(function() {
				if (jQuery(this).find('>ul.inited').length == 1) jQuery(this).addClass('inited');
			});
			// Generate 'scroll' event after the menu is showed
			jQuery(window).trigger('scroll');
		}

		
		// Forms
		//----------------------------------------------
	
		// Wrap select with .select_container
		jQuery('select:not(.esg-sorting-select):not([class*="trx_addons_attrib_"])').each(function() {
			var s = jQuery(this);
			if (s.css('display') != 'none' && !s.next().hasClass('select2') && !s.hasClass('select2-hidden-accessible'))
				s.wrap('<div class="select_container"></div>');
		});
	
		// Comment form
		jQuery("form#commentform").submit(function(e) {
			var rez = shaha_comments_validate(jQuery(this));
			if (!rez)
				e.preventDefault();
			return rez;
		});
	
		jQuery("form").on('keypress', '.error_field', function() {
			if (jQuery(this).val() != '')
				jQuery(this).removeClass('error_field');
		});
	
	
		// Blocks with stretch width
		//----------------------------------------------
		// Action to prepare stretch blocks in the third-party plugins
		jQuery(document).trigger('action.prepare_stretch_width');
		// Wrap stretch blocks
		jQuery('.trx-stretch-width').wrap('<div class="trx-stretch-width-wrap"></div>');
		jQuery('.trx-stretch-width').after('<div class="trx-stretch-width-original"></div>');
		shaha_stretch_width();
			
	
		// Pagination
		//------------------------------------
	
		// Load more
		jQuery('.nav-links-more a').on('click', function(e) {
			if (SHAHA_STORAGE['load_more_link_busy']) return;
			SHAHA_STORAGE['load_more_link_busy'] = true;
			var more = jQuery(this);
			var page = Number(more.data('page'));
			var max_page = Number(more.data('max-page'));
			if (page >= max_page) {
				more.parent().hide();
				return;
			}
			more.parent().addClass('loading');
			var panel = more.parents('.shaha_tabs_content');
			if (panel.length == 0) {															// Load simple page content
				jQuery.get(location.href, {
					paged: page+1
				}).done(function(response) {
					// Get inline styles and add to the page styles
					var selector = 'shaha-inline-styles-inline-css';
					var p1 = response.indexOf(selector);
					if (p1 < 0) {
						selector = 'trx_addons-inline-styles-inline-css';
						p1 = response.indexOf(selector);
					}
					if (p1 > 0) {
						p1 = response.indexOf('>', p1) + 1;
						var p2 = response.indexOf('</style>', p1);
						var inline_css_add = response.substring(p1, p2);
						var inline_css = jQuery('#'+selector);
						if (inline_css.length == 0)
							jQuery('body').append('<style id="'+selector+'" type="text/css">' + inline_css_add + '</style>');
						else
							inline_css.append(inline_css_add);
					}
					// Get new posts and append to the .posts_container
					shaha_loadmore_add_items(jQuery('.content .posts_container').eq(0),
											   jQuery(response).find('.content .posts_container > article,'
											   						+'.content .posts_container > div[class*="column-"],'
																	+'.content .posts_container > .masonry_item')
												);
				});
			} else {																			// Load tab's panel content
				jQuery.post(SHAHA_STORAGE['ajax_url'], {
					nonce: SHAHA_STORAGE['ajax_nonce'],
					action: 'shaha_ajax_get_posts',
					blog_template: panel.data('blog-template'),
					blog_style: panel.data('blog-style'),
					posts_per_page: panel.data('posts-per-page'),
					cat: panel.data('cat'),
					parent_cat: panel.data('parent-cat'),
					post_type: panel.data('post-type'),
					taxonomy: panel.data('taxonomy'),
					page: page+1
				}).done(function(response) {
					var rez = {};
					try {
						rez = JSON.parse(response);
					} catch (e) {
						rez = { error: SHAHA_STORAGE['strings']['ajax_error'] };
						console.log(response);
					}
					if (rez.error !== '') {
						panel.html('<div class="shaha_error">'+rez.error+'</div>');
					} else {
						shaha_loadmore_add_items(panel.find('.posts_container'), jQuery(rez.data).find('article'));
					}
				});
			}
			// Append items to the container
			function shaha_loadmore_add_items(container, items) {
				if (container.length > 0 && items.length > 0) {
					container.append(items);
					if (container.hasClass('portfolio_wrap') || container.hasClass('masonry_wrap')) {
						container.masonry( 'appended', items ).masonry();
						if (container.hasClass('gallery_wrap')) {
							SHAHA_STORAGE['GalleryFx'][container.attr('id')].appendItems();
						}
					}
					more.data('page', page+1).parent().removeClass('loading');
					// Remove TOC if exists (rebuild on init_shortcodes)
					jQuery('#toc_menu').remove();
					// Trigger actions to init new elements
					SHAHA_STORAGE['init_all_mediaelements'] = true;
					jQuery(document).trigger('action.init_shortcodes', [container.parent()]);
					jQuery(document).trigger('action.init_hidden_elements', [container.parent()]);
				}
				if (page+1 >= max_page)
					more.parent().hide();
				else
					SHAHA_STORAGE['load_more_link_busy'] = false;
				// Fire 'window.scroll' after clearing busy state
				jQuery(window).trigger('scroll');

				// Fire 'window.resize'
				jQuery( window ).trigger( 'resize' );
			}
			e.preventDefault();
			return false;
		});
	
		// Infinite scroll
		jQuery(document).on('action.scroll_shaha', function(e) {
			if (SHAHA_STORAGE['load_more_link_busy']) return;
			var container = jQuery('.content > .posts_container').eq(0);
			var inf = jQuery('.nav-links-infinite');
			if (inf.length == 0) return;
			if (container.offset().top + container.height() < jQuery(window).scrollTop() + jQuery(window).height()*1.5)
				inf.find('a').trigger('click');
		});

		// Comments
		//------------------------------------

		// Checkbox with "I agree..."
		if (jQuery('input[type="checkbox"][name="i_agree_privacy_policy"]:not(.inited),input[type="checkbox"][name="gdpr_terms"]:not(.inited),input[type="checkbox"][name="wpgdprc"]:not(.inited)').length > 0) {
			jQuery('input[type="checkbox"][name="i_agree_privacy_policy"]:not(.inited),input[type="checkbox"][name="gdpr_terms"]:not(.inited),input[type="checkbox"][name="wpgdprc"]:not(.inited)')
				.addClass('inited')
				.on('change', function(e) {
					if (jQuery(this).get(0).checked)
						jQuery(this).parents('form').find('button,input[type="submit"]').removeAttr('disabled');
					else
						jQuery(this).parents('form').find('button,input[type="submit"]').attr('disabled', 'disabled');
				}).trigger('change');
		}



		// Other settings
		//------------------------------------
	
		jQuery(document).trigger('action.ready_shaha');
	
		// Init post format specific scripts
		jQuery(document).on('action.init_hidden_elements', shaha_init_post_formats);
	
		// Init hidden elements (if exists)
		jQuery(document).trigger('action.init_hidden_elements', [jQuery('body').eq(0)]);
		
	} //end ready
	
	
	
	
	// Scroll actions
	//==============================================
	
	// Do actions when page scrolled
	function shaha_scroll_actions() {

		var scroll_offset = jQuery(window).scrollTop();
		var adminbar_height = Math.max(0, jQuery('#wpadminbar').height());
	
		// Call theme/plugins specific action (if exists)
		//----------------------------------------------
		jQuery(document).trigger('action.scroll_shaha');
		
		// Fix/unfix sidebar
		shaha_fix_sidebar();
	
		// Shift top and footer panels when header position equal to 'Under content'
		if (jQuery('body').hasClass('header_position_under') && !shaha_browser_is_mobile()) {
			var delta = 50;
			var adminbar = jQuery('#wpadminbar');
			var adminbar_height = adminbar.length == 0 && adminbar.css('position') == 'fixed' ? 0 : adminbar.height();
			var header = jQuery('.top_panel');
			var header_height = header.height();
			var mask = header.find('.top_panel_mask');
			if (mask.length==0) {
				header.append('<div class="top_panel_mask"></div>');
				mask = header.find('.top_panel_mask');
			}
			if (scroll_offset > adminbar_height) {
				var offset = scroll_offset - adminbar_height;
				if (offset <= header_height) {
					var mask_opacity = Math.max(0, Math.min(0.8, (offset-delta)/header_height));
					// Don't shift header with Revolution slider in Chrome
					if ( !(/Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor)) || header.find('.slider_engine_revo').length == 0 )
						header.css('top', Math.round(offset/1.2)+'px');
					mask.css({
						'opacity': mask_opacity,
						'display': offset==0 ? 'none' : 'block'
					});
				} else if (parseInt(header.css('top')) != 0) {
					header.css('top', Math.round(offset/1.2)+'px');
				}
			} else if (parseInt(header.css('top')) != 0 || mask.css('display')!='none') {
				header.css('top', '0px');
				mask.css({
					'opacity': 0,
					'display': 'none'
				});
			}
			var footer = jQuery('.footer_wrap');
			var footer_height = Math.min(footer.height(), jQuery(window).height());
			var footer_visible = (scroll_offset + jQuery(window).height()) - (header.outerHeight() + jQuery('.page_content_wrap').outerHeight());
			if (footer_visible > 0) {
				mask = footer.find('.top_panel_mask');
				if (mask.length==0) {
					footer.append('<div class="top_panel_mask"></div>');
					mask = footer.find('.top_panel_mask');
				}
				if (footer_visible <= footer_height) {
					var mask_opacity = Math.max(0, Math.min(0.8, (footer_height - footer_visible)/footer_height));
					// Don't shift header with Revolution slider in Chrome
					if ( !(/Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor)) || footer.find('.slider_engine_revo').length == 0 )
						footer.css('top', -Math.round((footer_height - footer_visible)/1.2)+'px');
					mask.css({
						'opacity': mask_opacity,
						'display': footer_height - footer_visible <= 0 ? 'none' : 'block'
					});
				} else if (parseInt(footer.css('top')) != 0 || mask.css('display')!='none') {
					footer.css('top', 0);
					mask.css({
						'opacity': 0,
						'display': 'none'
					});
				}
			}
		}
	}
	
	
	// Resize actions
	//==============================================
	
	// Do actions when page scrolled
	function shaha_resize_actions(cont) {
		shaha_check_layout();
		shaha_fix_sidebar();
		shaha_fix_footer();
		shaha_stretch_width(cont);
		shaha_stretch_height(null, cont);
		shaha_stretch_bg_video();
                shaha_resize_video( cont );
		shaha_vc_row_fullwidth_to_boxed(cont);
		if (SHAHA_STORAGE['menu_side_stretch']) shaha_stretch_sidemenu();
	
		// Call theme/plugins specific action (if exists)
		//----------------------------------------------
		jQuery(document).trigger('action.resize_shaha', [cont]);
	}
	
	// Stretch sidemenu (if present)
	function shaha_stretch_sidemenu() {
		var toc_items = jQuery('.menu_side_wrap.menu_side_icons .toc_menu_item');
		if (toc_items.length < 5) return;
		var toc_items_height = jQuery(window).height() 
								- shaha_fixed_rows_height(true, false) 
								- jQuery('.menu_side_wrap .sc_layouts_logo').outerHeight() 
								- toc_items.length;
		var th = Math.floor(toc_items_height / toc_items.length);
		var th_add = toc_items_height - th*toc_items.length;
		toc_items.find(".toc_menu_description,.toc_menu_icon").css({
			'height': th+'px',
			'lineHeight': th+'px'
		});
		toc_items.eq(0).find(".toc_menu_description,.toc_menu_icon").css({
			'height': (th+th_add)+'px',
			'lineHeight': (th+th_add)+'px'
		});
	}

    // Check for mobile layout
    function shaha_check_layout() {
        var resize = true;
        if (jQuery('body').hasClass('no_layout')) {
            jQuery('body').removeClass('no_layout');
            resize = false;
        }
        var w = window.innerWidth;
        if (w == undefined)
            w = jQuery(window).width()+(jQuery(window).height() < jQuery(document).height() || jQuery(window).scrollTop() > 0 ? 16 : 0);
        if (SHAHA_STORAGE['mobile_layout_width'] >= w) {
            if (!jQuery('body').hasClass('mobile_layout')) {
                jQuery('body').removeClass('desktop_layout').addClass('mobile_layout');
                if (resize) jQuery(window).trigger('resize');
            }
        } else {
            if (!jQuery('body').hasClass('desktop_layout')) {
                jQuery('body').removeClass('mobile_layout').addClass('desktop_layout');
                jQuery('.menu_mobile').removeClass('opened');
                jQuery('.menu_mobile_overlay').hide();
                if (resize) jQuery(window).trigger('resize');
            }
        }
        if (SHAHA_STORAGE['mobile_device'] || shaha_browser_is_mobile())
            jQuery('body').addClass('mobile_device');
    }
	
	// Stretch area to full window width
	function shaha_stretch_width(cont) {
		if (cont===undefined) cont = jQuery('body');
		cont.find('.trx-stretch-width').each(function() {
			var $el = jQuery(this);
			var $el_cont = $el.parents('.page_wrap');
			var $el_cont_offset = 0;
			if ($el_cont.length == 0) 
				$el_cont = jQuery(window);
			else
				$el_cont_offset = $el_cont.offset().left;
			var $el_full = $el.next('.trx-stretch-width-original');
			var el_margin_left = parseInt( $el.css( 'margin-left' ), 10 );
			var el_margin_right = parseInt( $el.css( 'margin-right' ), 10 );
			var offset = $el_cont_offset - $el_full.offset().left - el_margin_left;
			var width = $el_cont.width();
			if (!$el.hasClass('inited')) {
				$el.addClass('inited invisible');
				$el.css({
					'position': 'relative',
					'box-sizing': 'border-box'
				});
			}
			$el.css({
				'left': offset,
				'width': $el_cont.width()
			});
			if ( !$el.hasClass('trx-stretch-content') ) {
				var padding = Math.max(0, -1*offset);
				var paddingRight = Math.max(0, width - padding - $el_full.width() + el_margin_left + el_margin_right);
				$el.css( { 'padding-left': padding + 'px', 'padding-right': paddingRight + 'px' } );
			}
			$el.removeClass('invisible');
		});
	}
	
	// Stretch area to the full window height
	function shaha_stretch_height(e, cont) {
		if (cont===undefined) cont = jQuery('body');
		cont.find('.shaha-full-height').each(function () {
			var fullheight_item = jQuery(this);
			// If item now invisible
			if (jQuery(this).parents('div:hidden,section:hidden,article:hidden').length > 0) {
				return;
			}
			var fullheight_row = jQuery(this).parents('.vc_row-o-full-height');
			if (fullheight_row.length > 0)
				fullheight_item.height(fullheight_row.height());
			else {
				var fh = shaha_fixed_rows_height();
				var wh = jQuery(window).width() >= 960
							? jQuery(window).height() - fh
							: 'auto';
				if (wh > 0) {
					if (fullheight_item.data('display') != fullheight_item.css('display'))
						fullheight_item.css('display', fullheight_item.data('display'));
					fullheight_item.css('height', wh);
				} else if (wh=='auto' && fullheight_item.css('height')!='auto') {
					if (fullheight_item.data('display')==undefined)
						fullheight_item.attr('data-display', fullheight_item.css('display'));
					fullheight_item.css({'height': wh, 'display': 'block'});
				}
			}
		});
	}
	
	// Stretch background video
	function shaha_stretch_bg_video() {
		var video_wrap = jQuery('div#background_video');
		if (video_wrap.length == 0) return;
		var video = video_wrap.find('>iframe,>video'),
			w = video_wrap.width(),
			h = video_wrap.height();
		if (w/h < 16/9)
			w = h/9*16;
		else
			h = w/16*9;
		video
			.attr({'width': w, 'height': h})
			.css({'width': w, 'height': h});
	}

	function shaha_vc_row_fullwidth_to_boxed(row) {
		if (jQuery('body').hasClass('body_style_boxed') || jQuery('body').hasClass('menu_style_side') || jQuery('body').hasClass('rtl')) {
			if (row === undefined || !row.hasClass('.vc_row') || !row.data('vc-full-width'))
				row = jQuery('.vc_row[data-vc-full-width="true"]');
			var width_content = jQuery('.page_wrap').width();
			var width_content_wrap = jQuery('.page_content_wrap .content_wrap').width();
			var indent = ( width_content - width_content_wrap ) / 2;
			var rtl = jQuery('html').attr('dir') == 'rtl';
			row.each( function() {
				var mrg = parseInt(jQuery(this).css('marginLeft'));
				var stretch_content = jQuery(this).attr('data-vc-stretch-content');
				var in_content = jQuery(this).parents('.content_wrap').length > 0;
				jQuery(this).css({
					'width': width_content,
					'left': rtl ? 'auto' : (in_content ? -indent : 0) - mrg,
					'right': !rtl ? 'auto' : ((in_content ? -indent : 0) - mrg) * (-1),
					// 'left': rtl ? ((in_content ? -indent : 0) - mrg) * (-1) : 'auto',
					// 'right': rtl ? 'auto' : ((in_content ? -indent : 0) - mrg) * (-1),
					'padding-left': stretch_content ? 0 : indent + mrg,
					'padding-right': stretch_content ? 0 : indent + mrg
				});
			});
			if (jQuery('body').hasClass('body_style_boxed')) {
				row.each( function() {
					var mrg = parseInt(jQuery(this).css('marginLeft'));
					var stretch_content = jQuery(this).attr('data-vc-stretch-content');
					var in_content = jQuery(this).parents('.content_wrap').length > 0;
					jQuery(this).css({
						'width': width_content,
						// 'left': rtl ? 'auto' : (in_content ? -indent : 0) - mrg,
						// 'right': !rtl ? 'auto' : ((in_content ? -indent : 0) - mrg) * (-1),
						'left': rtl ? ((in_content ? -indent : 0) - mrg) * (-1) : 'auto',
						'right': rtl ? 'auto' : ((in_content ? -indent : 0) - mrg) * (-1),
						'padding-left': stretch_content ? 0 : indent + mrg,
						'padding-right': stretch_content ? 0 : indent + mrg
					});
				});

			}
		}
	}
	
	
	// Fix/unfix footer
	function shaha_fix_footer() {
		if (jQuery('body').hasClass('header_position_under') && !shaha_browser_is_mobile()) {
			var ft = jQuery('.footer_wrap');
			if (ft.length > 0) {
				var ft_height = ft.outerHeight(false),
					pc = jQuery('.page_content_wrap'),
					pc_offset = pc.offset().top,
					pc_height = pc.height();
				if (pc_offset + pc_height + ft_height < jQuery(window).height()) {
					if (ft.css('position')!='absolute') {
						ft.css({
							'position': 'absolute',
							'left': 0,
							'bottom': 0,
							'width' :'100%'
						});
					}
				} else {
					if (ft.css('position')!='relative') {
						ft.css({
							'position': 'relative',
							'left': 'auto',
							'bottom': 'auto'
						});
					}
				}
			}
		}
	}
	
	
	// Fix/unfix sidebar
	function shaha_fix_sidebar() {
		var sb = jQuery('.sidebar');
		var content = sb.siblings('.content');
		if (sb.length > 0) {
	
			// Unfix when sidebar is under content
			if (content.css('float') == 'none') {

				var old_style = sb.data('old_style');
				if (old_style !== undefined) sb.attr('style', old_style).removeAttr('data-old_style');
	
			} else {
	
				var sb_height = sb.outerHeight();
				var content_height = content.outerHeight();
				var content_top = content.offset().top;
				var scroll_offset = jQuery(window).scrollTop();
				
				var top_panel_fixed_height = shaha_fixed_rows_height();
				
				// If sidebar shorter then content and page scrolled below the content's top
				if (sb_height < content_height && scroll_offset + top_panel_fixed_height > content_top) {
					
					var sb_init = {
							'position': 'undefined',
							'float': 'none',
							'top': 'auto',
							'bottom' : 'auto'
							};
					
					if (typeof SHAHA_STORAGE['scroll_offset_last'] == 'undefined') {
						SHAHA_STORAGE['sb_top_last'] = content_top;
						SHAHA_STORAGE['scroll_offset_last'] = scroll_offset;
						SHAHA_STORAGE['scroll_dir_last'] = 1;
					}
					var scroll_dir = scroll_offset - SHAHA_STORAGE['scroll_offset_last'];
					if (scroll_dir == 0)
						scroll_dir = SHAHA_STORAGE['scroll_dir_last'];
					else
						scroll_dir = scroll_dir > 0 ? 1 : -1;
					
					var sb_big = sb_height + 30 >= jQuery(window).height() - top_panel_fixed_height,
						sb_top = sb.offset().top;
						
					if (sb_top < 0) sb_top = SHAHA_STORAGE['sb_top_last'];

					// If sidebar height greater then window height
					if (sb_big) {
	
						// If change scrolling dir
						if (scroll_dir != SHAHA_STORAGE['scroll_dir_last'] && sb.css('position') == 'fixed') {
							sb_init.top = sb_top - content_top;
							sb_init.position = 'absolute';
	
						// If scrolling down
						} else if (scroll_dir > 0) {
							if (scroll_offset + jQuery(window).height() >= content_top + content_height + 30) {
								sb_init.bottom = 0;
								sb_init.position = 'absolute';
							} else if (scroll_offset + jQuery(window).height() >= (sb.css('position') == 'absolute' ? sb_top : content_top) + sb_height + 30) {
								
								sb_init.bottom = 30;
								sb_init.position = 'fixed';
							}
						
						// If scrolling up
						} else {
							if (scroll_offset + top_panel_fixed_height <= sb_top) {
								sb_init.top = top_panel_fixed_height;
								sb_init.position = 'fixed';
							}
						}
					
					// If sidebar height less then window height
					} else {
						if (scroll_offset + top_panel_fixed_height >= content_top + content_height - sb_height) {
							sb_init.bottom = 0;
							sb_init.position = 'absolute';
						} else {
							sb_init.top = top_panel_fixed_height;
							sb_init.position = 'fixed';
						}
					}
					
					if (sb_init.position != 'undefined') {
						// Detect horizontal position when resize
						var pos = 0;
						if (sb_init.position == 'fixed' || (!jQuery('body').hasClass('body_style_wide') && !jQuery('body').hasClass('body_style_boxed'))) {
							var sb_parent = sb.parent();
							pos = sb_parent.position();
							pos = pos.left + Math.max(0, parseInt(sb_parent.css('paddingLeft'), 10)) 
											+ Math.max(0, parseInt(sb_parent.css('marginLeft'), 10))
											+ (jQuery('body').hasClass('menu_style_right')
												? Math.max(0, parseInt(jQuery('body').css('marginRight'), 10))
												: 0);
						}
						if (sb.hasClass('right'))	sb_init.right = pos;
						else						sb_init.left = pos;
						
						// Set position
						if (sb.css('position') != sb_init.position || SHAHA_STORAGE['scroll_dir_last'] != scroll_dir) {
							if (sb.data('old_style') === undefined) {
								var style = sb.attr('style');
								if (!style) style = '';
								sb.attr('data-old_style', style);
							}
							sb.css(sb_init);
						}
					}

					SHAHA_STORAGE['sb_top_last'] = sb_top;
					SHAHA_STORAGE['scroll_offset_last'] = scroll_offset;
					SHAHA_STORAGE['scroll_dir_last'] = scroll_dir;
	
				} else {
	
					// Unfix when page scrolling to top
					var old_style = sb.data('old_style');
					if (old_style !== undefined)
						sb.attr('style', old_style).removeAttr('data-old_style');
	
				}
			}
		}
	}
	
	
	
	
	
	// Navigation
	//==============================================
	
	// Init Superfish menu
	function shaha_init_sfmenu(selector) {
		jQuery(selector).show().each(function() {
			var animation_in = jQuery(this).parent().data('animation_in');
			if (animation_in == undefined) animation_in = "none";
			var animation_out = jQuery(this).parent().data('animation_out');
			if (animation_out == undefined) animation_out = "none";
			jQuery(this).addClass('inited').superfish({
				delay: 500,
				animation: {
					opacity: 'show'
				},
				animationOut: {
					opacity: 'hide'
				},
				speed: 		animation_in!='none' ? 500 : 200,
				speedOut:	animation_out!='none' ? 500 : 200,
				autoArrows: false,
				dropShadows: false,
				onBeforeShow: function(ul) {
					if (jQuery(this).parents("ul").length > 1){
						var w = jQuery('.page_wrap').width();  
						var par_offset = jQuery(this).parents("ul").offset().left;
						var par_width  = jQuery(this).parents("ul").outerWidth();
						var ul_width   = jQuery(this).outerWidth();
						if (par_offset+par_width+ul_width > w-20 && par_offset-ul_width > 0)
							jQuery(this).addClass('submenu_left');
						else
							jQuery(this).removeClass('submenu_left');
					}
					if (animation_in!='none') {
						jQuery(this).removeClass('animated fast '+animation_out);
						jQuery(this).addClass('animated fast '+animation_in);
					}
				},
				onBeforeHide: function(ul) {
					if (animation_out!='none') {
						jQuery(this).removeClass('animated fast '+animation_in);
						jQuery(this).addClass('animated fast '+animation_out);
					}
				}
			});
		});
	}
	
	
	
	
	// Post formats init
	//=====================================================
	
	function shaha_init_post_formats(e, cont) {
	
		// MediaElement init
		shaha_init_media_elements(cont);
		
		// Video play button
		cont.find('.format-video .post_featured.with_thumb .post_video_hover:not(.inited)')
			.addClass('inited')
			.on('click', function(e) {
				jQuery(this).parents('.post_featured')
					.addClass('post_video_play')
					.find('.post_video').html(jQuery(this).data('video'));
				jQuery(window).trigger('resize');
				e.preventDefault();
				return false;
			});
	}
	
	
	function shaha_init_media_elements(cont) {
		if (SHAHA_STORAGE['use_mediaelements'] && cont.find('audio:not(.inited),video:not(.inited)').length > 0) {
			if (window.mejs) {
                if (window.mejs.MepDefaults) window.mejs.MepDefaults.enableAutosize = true;
                if (window.mejs.MediaElementDefaults) window.mejs.MediaElementDefaults.enableAutosize = true;
				cont.find('audio:not(.inited),video:not(.inited)').each(function() {
					// If item now invisible
					if (jQuery(this).parents('div:hidden,section:hidden,article:hidden').length > 0) {
						return;
					}
					if (jQuery(this).parents('.mejs-mediaelement').length == 0
						&& jQuery( this ).parents( '.wp-block-video' ).length === 0
						&& !jQuery( this ).hasClass( 'wp-block-cover__video-background' )
						&& jQuery( this ).parents( '.elementor-background-video-container' ).length === 0
						&& (SHAHA_STORAGE['init_all_mediaelements']
								|| (!jQuery(this).hasClass('wp-audio-shortcode') 
									&& !jQuery(this).hasClass('wp-video-shortcode') 
									&& !jQuery(this).parent().hasClass('wp-playlist')))) {
						var media_tag = jQuery(this);
						var settings = {
							enableAutosize: true,
							videoWidth: -1,		// if set, overrides <video width>
							videoHeight: -1,	// if set, overrides <video height>
							audioWidth: '100%',	// width of audio player
							audioHeight: 30,	// height of audio player
							success: function(mejs) {
								var autoplay, loop;
								if ( 'flash' === mejs.pluginType ) {
									autoplay = mejs.attributes.autoplay && 'false' !== mejs.attributes.autoplay;
									loop = mejs.attributes.loop && 'false' !== mejs.attributes.loop;
									autoplay && mejs.addEventListener( 'canplay', function () {
										mejs.play();
									}, false );
									loop && mejs.addEventListener( 'ended', function () {
										mejs.play();
									}, false );
								}
							}
						};
						jQuery(this).mediaelementplayer(settings);
					}
				});
			} else
				setTimeout(function() { shaha_init_media_elements(cont); }, 400);
		}
	}

	// Fit video frames to document width
	function shaha_resize_video(cont) {
		if (cont === undefined) {
			cont = jQuery( 'body' );
		}
		cont.find( 'video' ).each(
			function() {
				// If item now invisible
				if (jQuery( this ).hasClass( 'trx_addons_resize' ) || jQuery( this ).parents( 'div:hidden,section:hidden,article:hidden' ).length > 0) {
					return;
				}
				var video     = jQuery( this ).addClass( 'shaha_resize' ).eq( 0 );
				var ratio     = (video.data( 'ratio' ) !== undefined ? video.data( 'ratio' ).split( ':' ) : [16,9]);
				ratio         = ratio.length != 2 || ratio[0] == 0 || ratio[1] == 0 ? 16 / 9 : ratio[0] / ratio[1];
				var mejs_cont = video.parents( '.mejs-video' ).eq(0);
				var w_attr    = video.data( 'width' );
				var h_attr    = video.data( 'height' );
				if ( ! w_attr || ! h_attr) {
					w_attr = video.attr( 'width' );
					h_attr = video.attr( 'height' );
					if ( ! w_attr || ! h_attr) {
						return;
					}
					video.data( {'width': w_attr, 'height': h_attr} );
				}
				var percent = ('' + w_attr).substr( -1 ) == '%';
				w_attr      = parseInt( w_attr, 10 );
				h_attr      = parseInt( h_attr, 10 );
				var w_real  = Math.round(
						mejs_cont.length > 0
							? Math.min( percent ? 10000 : w_attr, mejs_cont.parents( 'div,article' ).eq(0).width() )
							: Math.min( percent ? 10000 : w_attr, video.parents( 'div,article' ).eq(0).width() )
					),
					h_real      = Math.round( percent ? w_real / ratio : w_real / w_attr * h_attr );
				if (parseInt( video.attr( 'data-last-width' ), 10 ) == w_real) {
					return;
				}
				if (percent) {
					video.height( h_real );
				} else if (video.parents( '.wp-video-playlist' ).length > 0) {
					if (mejs_cont.length === 0) {
						video.attr( {'width': w_real, 'height': h_real} );
					}
				} else {
					video.attr( {'width': w_real, 'height': h_real} ).css( {'width': w_real + 'px', 'height': h_real + 'px'} );
					if (mejs_cont.length > 0) {
						shaha_set_mejs_player_dimensions( video, w_real, h_real );
					}
				}
				video.attr( 'data-last-width', w_real );
			}
		);
		cont.find( '.video_frame iframe, iframe' ).each(
			function() {
				// If item now invisible
				if (jQuery( this ).hasClass( 'trx_addons_resize' ) || jQuery( this ).addClass( 'shaha_resize' ).parents( 'div:hidden,section:hidden,article:hidden' ).length > 0) {
					return;
				}
				var iframe = jQuery( this ).eq( 0 );
				if (iframe.length == 0 || iframe.attr( 'src' ) === undefined || iframe.attr( 'src' ).indexOf( 'soundcloud' ) > 0) {
					return;
				}
				var ratio  = (iframe.data( 'ratio' ) !== undefined
						? iframe.data( 'ratio' ).split( ':' )
						: (iframe.parent().data( 'ratio' ) !== undefined
							? iframe.parent().data( 'ratio' ).split( ':' )
							: (iframe.find( '[data-ratio]' ).length > 0
								? iframe.find( '[data-ratio]' ).data( 'ratio' ).split( ':' )
								: [16,9]
						)
					)
				);
				ratio      = ratio.length != 2 || ratio[0] == 0 || ratio[1] == 0 ? 16 / 9 : ratio[0] / ratio[1];
				var w_attr = iframe.attr( 'width' );
				var h_attr = iframe.attr( 'height' );
				if ( ! w_attr || ! h_attr) {
					return;
				}
				var percent = ('' + w_attr).substr( -1 ) == '%';
				w_attr      = parseInt( w_attr, 10 );
				h_attr      = parseInt( h_attr, 10 );
				var par     = iframe.parents( 'div,section' ).eq(0),
					pw          = par.width(),
					ph          = par.height(),
					w_real      = pw,
					h_real      = Math.round( percent ? w_real / ratio : w_real / w_attr * h_attr );
				if (par.css( 'position' ) == 'absolute' && h_real > ph) {
					h_real = ph;
					w_real = Math.round( percent ? h_real * ratio : h_real * w_attr / h_attr )
				}
				if (parseInt( iframe.attr( 'data-last-width' ), 10 ) == w_real) {
					return;
				}
				iframe.css( {'width': w_real + 'px', 'height': h_real + 'px'} );
				iframe.attr( 'data-last-width', w_real );
			}
		);
	}

	// Set Media Elements player dimensions
	function shaha_set_mejs_player_dimensions(video, w, h) {
		if (mejs) {
			for (var pl in mejs.players) {
				if (mejs.players[pl].media.src == video.attr( 'src' )) {
					if (mejs.players[pl].media.setVideoSize) {
						mejs.players[pl].media.setVideoSize( w, h );
					} else if (mejs.players[pl].media.setSize) {
						mejs.players[pl].media.setSize( w, h );
					}
					mejs.players[pl].setPlayerSize( w, h );
					mejs.players[pl].setControlsSize();
				}
			}
		}
	}
	
	
	// Load the tab's content
	function shaha_tabs_ajax_content_loader(panel, page, oldPanel) {
		if (panel.html().replace(/\s/g, '')=='') {
			var height = oldPanel === undefined ? panel.height() : oldPanel.height();
			if (isNaN(height) || height < 100) height = 100;
			panel.html('<div class="shaha_tab_holder" style="min-height:'+height+'px;"></div>');
		} else
			panel.find('> *').addClass('shaha_tab_content_remove');
		panel.data('need-content', false).addClass('shaha_loading');
		jQuery.post(SHAHA_STORAGE['ajax_url'], {
			nonce: SHAHA_STORAGE['ajax_nonce'],
			action: 'shaha_ajax_get_posts',
			blog_template: panel.data('blog-template'),
			blog_style: panel.data('blog-style'),
			posts_per_page: panel.data('posts-per-page'),
			cat: panel.data('cat'),
			parent_cat: panel.data('parent-cat'),
			post_type: panel.data('post-type'),
			taxonomy: panel.data('taxonomy'),
			page: page
		}).done(function(response) {
			panel.removeClass('shaha_loading');
			var rez = {};
			try {
				rez = JSON.parse(response);
			} catch (e) {
				rez = { error: SHAHA_STORAGE['strings']['ajax_error'] };
				console.log(response);
			}
			if (rez.error !== '') {
				panel.html('<div class="shaha_error">'+rez.error+'</div>');
			} else {
				panel.prepend(rez.data).fadeIn(function() {
					jQuery(document).trigger('action.init_shortcodes', [panel]);
					jQuery(document).trigger('action.init_hidden_elements', [panel]);
					jQuery(window).trigger('scroll');
					setTimeout(function() {
						panel.find('.shaha_tab_holder,.shaha_tab_content_remove').remove();
						jQuery(window).trigger('scroll');
					}, 600);
				});
			}
		});
	}
	
	
	// Forms validation
	//-------------------------------------------------------
	
	// Comments form
	function shaha_comments_validate(form) {
		form.find('input').removeClass('error_field');
		var comments_args = {
			error_message_text: SHAHA_STORAGE['strings']['error_global'],	// Global error message text (if don't write in checked field)
			error_message_show: true,									// Display or not error message
			error_message_time: 4000,									// Error message display time
			error_message_class: 'shaha_messagebox shaha_messagebox_style_error',	// Class appended to error message block
			error_fields_class: 'error_field',							// Class appended to error fields
			exit_after_first_error: false,								// Cancel validation and exit after first error
			rules: [
				{
					field: 'comment',
					min_length: { value: 1, message: SHAHA_STORAGE['strings']['text_empty'] },
					max_length: { value: SHAHA_STORAGE['comment_maxlength'], message: SHAHA_STORAGE['strings']['text_long']}
				}
			]
		};
		if (form.find('.comments_author input[aria-required="true"]').length > 0) {
			comments_args.rules.push(
				{
					field: 'author',
					min_length: { value: 1, message: SHAHA_STORAGE['strings']['name_empty']},
					max_length: { value: 60, message: SHAHA_STORAGE['strings']['name_long']}
				}
			);
		}
		if (form.find('.comments_email input[aria-required="true"]').length > 0) {
			comments_args.rules.push(
				{
					field: 'email',
					min_length: { value: 1, message: SHAHA_STORAGE['strings']['email_empty']},
					max_length: { value: 60, message: SHAHA_STORAGE['strings']['email_long']},
					mask: { value: SHAHA_STORAGE['email_mask'], message: SHAHA_STORAGE['strings']['email_not_valid']}
				}
			);
		}
		var error = shaha_form_validate(form, comments_args);
		return !error;
	}

	// Bubble submit() up for widget "Categories"
	var s = jQuery("select:not(.esg-sorting-select)");

	if ( s.parents( '.widget_categories' ).length > 0 ) {

		s.parent().each( function (ind, item) { 
			jQuery(item).get(0).submit = function() {
				jQuery(item).closest('form').submit();

			}; 
		}); 
	}

	//Open new windows in new tab
	jQuery('a').filter(function() {
		"use strict";
		return this.hostname && this.hostname !== location.hostname;
	}).attr('target','_blank');

});