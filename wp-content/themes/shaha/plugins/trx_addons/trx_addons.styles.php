<?php
// Add plugin-specific colors and fonts to the custom EOT
if (!function_exists('shaha_trx_addons_get_css')) {
	add_filter('shaha_filter_get_css', 'shaha_trx_addons_get_css', 10, 4);
	function shaha_trx_addons_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<EOT

.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title,
.sc_dishes_compact .sc_services_item_title,
.sc_services_iconed .sc_services_item_title {
	{$fonts['p_font-family']}
}
.toc_menu_item .toc_menu_description,
.sc_item_subtitle.sc_item_title_style_shadow,
.sc_icons_item_title,
.sc_price_item_title, .sc_price_item_price,
.sc_courses_default .sc_courses_item_price,
.sc_courses_default .trx_addons_hover_content .trx_addons_hover_links a,
.sc_promo_modern .sc_promo_link2 span+span,
.slider_container .slide_info.slide_info_large .slide_title,
.slider_style_modern .slider_controls_label span + span,
.slider_pagination_wrap,
.sc_slider_controller_info {
	{$fonts['h5_font-family']}
}
.sc_item_subtitle,
.sc_recent_news .post_item .post_meta,
.sc_action_item_description,
.sc_price_item_description,
.sc_price_item_details,
.sc_courses_default .sc_courses_item_date,
.courses_single .courses_page_meta,
.sc_promo_modern .sc_promo_link2 span,
.sc_skills_counter .sc_skills_item_title,
.slider_style_modern .slider_controls_label span,
.slider_titles_outside_wrap .slide_cats,
.slider_titles_outside_wrap .slide_subtitle,
.sc_team .sc_team_item_subtitle,
.sc_dishes .sc_dishes_item_subtitle,
.sc_services .sc_services_item_subtitle,
.team_member_page .team_member_brief_info_text,
.sc_testimonials_item_author_title,
.sc_testimonials_item_content:before {
	{$fonts['info_font-family']}
}
.sc_button,
.sc_button_simple,
.sc_form button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.sc_promo_modern .sc_promo_link2 {
	{$fonts['button_font-family']}
}

.sc_services_list .sc_services_item_title,
.sc_countdown_default .sc_countdown_digits,
.sc_blogger_default .sc_blogger_item_wrap_featured_event .sc_events_item_date .sc_events_item_day,
.sc_events_default .sc_events_item_day, .sc_events_default .sc_events_item_title,
.trx_addons_dropcap,
.sc_services_timeline .sc_services_item_title {
	{$fonts['h1_font-family']}
}
.sc_recent_news .post_item .post_footer .post_counters .post_counters_item,
.sc_recent_news_style_news-list .post_item .post_title,
.sc_blogger_plain .sc_blogger_item .sc_blogger_item_title,
.sc_testimonials_item_author_title {
	{$fonts['p_font-family']}
}

EOT;

			$rad = shaha_get_border_radius();
			$rad4 = ' '.$rad != ' 0' ? '4px' : 0;
			$rad50 = ' '.$rad != ' 0' ? '50%' : 0;
			$css['fonts'] .= <<<EOT

.properties_search_form .properties_search_basic,
.cars_search_form .cars_search_basic,
.sc_promo_modern .sc_promo_link2,
.sc_slider_controls .slider_controls_wrap > a,
.sc_slider_controls .slider_progress,
.sc_slider_controls .slider_progress_bar,
.slider_container.slider_controls_side .slider_controls_wrap > a,
.slider_outer_controls_side .slider_controls_wrap > a,
.slider_outer_controls_top .slider_controls_wrap > a,
.slider_outer_controls_bottom .slider_controls_wrap > a {
	-webkit-border-radius: {$rad4};
	    -ms-border-radius: {$rad4};
			border-radius: {$rad4};
}
.socials_wrap .social_item .social_icon,
.trx_addons_scroll_to_top,
.trx_addons_dropcap,
.sc_button,
.sc_form button,
.sc_matches_item_pair .sc_matches_item_player .post_featured > img {
	-webkit-border-radius: {$rad};
	    -ms-border-radius: {$rad};
			border-radius: {$rad};
}
.sc_matches_other .sc_matches_item_logo1 img,
.sc_matches_other .sc_matches_item_logo2 img,
.sc_points_table .sc_points_table_logo img {
	-webkit-border-radius: {$rad50};
	    -ms-border-radius: {$rad50};
			border-radius: {$rad50};
}

EOT;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<EOT


/* User styles
------------------------------------------ */
.trx_addons_accent,
.trx_addons_accent > a,
.trx_addons_accent > * {
	color: {$colors['text_link']};
}
.trx_addons_accent > a:hover {
	color: {$colors['text_dark']};
}
.sidebar .trx_addons_accent,
.scheme_self.sidebar .trx_addons_accent,
.sidebar .trx_addons_accent > a,
.scheme_self.sidebar .trx_addons_accent > a,
.sidebar .trx_addons_accent > *,
.scheme_self.sidebar .trx_addons_accent > *,
.footer_wrap .trx_addons_accent,
.scheme_self.footer_wrap .trx_addons_accent,
.footer_wrap .trx_addons_accent > a,
.scheme_self.footer_wrap .trx_addons_accent > a,
.footer_wrap .trx_addons_accent > *,
.scheme_self.footer_wrap .trx_addons_accent > * {
	color: {$colors['alter_link']};
}
.sidebar .trx_addons_accent > a:hover,
.scheme_self.sidebar .trx_addons_accent > a:hover,
.footer_wrap .trx_addons_accent > a:hover,
.scheme_self.footer_wrap .trx_addons_accent > a:hover {
	color: {$colors['alter_dark']};
}

.trx_addons_hover,
.trx_addons_hover > * {
	color: {$colors['text_hover']};
}
.trx_addons_accent_bg {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
.trx_addons_inverse {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.trx_addons_dark,
.trx_addons_dark > a {
	color: {$colors['text_dark']};
}
.trx_addons_dark > a:hover {
	color: {$colors['text_link']};
}

.trx_addons_inverse,
.trx_addons_inverse > a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.trx_addons_inverse > a:hover {
	color: {$colors['inverse_hover']};
}

.trx_addons_dropcap_style_1 {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_dropcap_style_2 {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_hover']};
}

ul[class*="trx_addons_list"] > li:before {
	color: {$colors['text_link']};
}
ul.trx_addons_list_custom > li:before {
	color: {$colors['text_hover2']};
}
ul.trx_addons_list_info > li:before {
	color: {$colors['text_hover']};
}
ul[class*="trx_addons_list"][class*="_circled"] > li:before {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_list_parameters > li + li {
	border-color: {$colors['bd_color']};
}

.trx_addons_tooltip {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.trx_addons_tooltip:before {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.trx_addons_tooltip:after {
	border-top-color: {$colors['text_dark']};
}

blockquote.trx_addons_blockquote_style_1:before{
	color: {$colors['bg_color']};
}
blockquote.trx_addons_blockquote_style_1 {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
blockquote.trx_addons_blockquote_style_1 b {
	color: {$colors['bg_color']};
}
blockquote.trx_addons_blockquote_style_1 a,
blockquote.trx_addons_blockquote_style_1 cite {
	color: {$colors['text_link']};
}
blockquote.trx_addons_blockquote_style_1 a:hover {
	color: {$colors['bg_color']};
}
blockquote.trx_addons_blockquote_style_2 {
	color: {$colors['text']};
	background-color: transparent;
}
blockquote.trx_addons_blockquote_style_2:before,
blockquote.trx_addons_blockquote_style_2 a,
blockquote.trx_addons_blockquote_style_2 cite {
	color: {$colors['text_dark']};
}
blockquote.trx_addons_blockquote_style_2 a:hover,
blockquote.trx_addons_blockquote_style_2 a .trx_addons_accent,
blockquote.trx_addons_blockquote_style_2 a:hover .trx_addons_accent{
	color: {$colors['text_link']};
}


.trx_addons_hover_mask {
	background-color: {$colors['extra_bg_color_07']};
}
.trx_addons_hover_title {
	color: {$colors['extra_dark']};
}
.trx_addons_hover_text {
	color: {$colors['extra_text']};
}
.trx_addons_hover_icon,
.trx_addons_hover_links a {
	color: {$colors['inverse_link']};
	background-color: {$colors['extra_link']};
}
.trx_addons_hover_icon:hover,
.trx_addons_hover_links a:hover {
	color: {$colors['inverse_hover']} !important;
	background-color: {$colors['extra_hover']};
}


/* Tabs */
.widget .trx_addons_tabs .trx_addons_tabs_titles li a {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bd_color']};
}
.widget .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active a,
.widget .trx_addons_tabs .trx_addons_tabs_titles li a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}


/* Posts slider */
.slider_container .slide_info.slide_info_large {
	background-color: {$colors['bg_color_07']};
}
.slider_container .slide_info.slide_info_large:hover {
	background-color: {$colors['bg_color']};
}
.slider_container .slide_info.slide_info_large .slide_cats a {
	color: {$colors['text_link']};
}
.slider_container .slide_info.slide_info_large .slide_title a {
	color: {$colors['text_dark']};
}
.slider_container .slide_info.slide_info_large .slide_date {
	color: {$colors['text']};
}
.slider_container .slide_info.slide_info_large:hover .slide_date {
	color: {$colors['text_light']};
}
.slider_container .slide_info.slide_info_large .slide_cats a:hover,
.slider_container .slide_info.slide_info_large .slide_title a:hover {
	color: {$colors['text_hover']};
}
.slider_container.slider_multi .slide_cats a:hover,
.slider_container.slider_multi .slide_title a:hover,
.slider_container.slider_multi a:hover .slide_title {
	color: {$colors['text_hover']};
}

.sc_slider_controls .slider_controls_wrap > a,
.slider_container.slider_controls_side .slider_controls_wrap > a,
.slider_outer_controls_side .slider_controls_wrap > a {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_slider_controls .slider_controls_wrap > a:hover,
.slider_container.slider_controls_side .slider_controls_wrap > a:hover,
.slider_outer_controls_side .slider_controls_wrap > a:hover {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
}
.sc_slider_controls .slider_progress {
	background-color: {$colors['bd_color']};
}
.sc_slider_controls .slider_progress_bar {
	background-color: {$colors['text_link']};
}

.slider_container.slider_controls_top .slider_controls_wrap > a,
.slider_container.slider_controls_bottom .slider_controls_wrap > a,
.slider_outer_controls_top .slider_controls_wrap > a,
.slider_outer_controls_bottom .slider_controls_wrap > a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.slider_container.slider_controls_top .slider_controls_wrap > a:hover,
.slider_container.slider_controls_bottom .slider_controls_wrap > a:hover,
.slider_outer_controls_top .slider_controls_wrap > a:hover,
.slider_outer_controls_bottom .slider_controls_wrap > a:hover {
	color: {$colors['bg_color']};
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}

.slider_container .slider_pagination_wrap .swiper-pagination-bullet,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet,
.swiper-pagination-custom .swiper-pagination-button {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.swiper-pagination-custom .swiper-pagination-button.swiper-pagination-button-active,
.slider_container .slider_pagination_wrap .swiper-pagination-bullet.swiper-pagination-bullet-active,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet.swiper-pagination-bullet-active,
.slider_container .slider_pagination_wrap .swiper-pagination-bullet:hover,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet:hover {
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}
.slider_container .swiper-pagination-progress .swiper-pagination-progressbar,
.slider_outer .swiper-pagination-progress .swiper-pagination-progressbar {
	background-color: {$colors['text_link']};
}
.slider_outer > .swiper-pagination-fraction {
	color: {$colors['text_dark']};
}

.slider_titles_outside_wrap .slide_title a {
	color: {$colors['text_dark']};
}
.slider_titles_outside_wrap .slide_title a:hover {
	color: {$colors['text_link']};
}
.slider_titles_outside_wrap .slide_cats,
.slider_titles_outside_wrap .slide_subtitle {
	color: {$colors['text_link']};
}

.slider_style_modern .slider_controls_label {
	color: {$colors['bg_color']};
}
.slider_style_modern .slider_pagination_wrap {
	color: {$colors['text_light']};
}
.slider_style_modern .swiper-pagination-current {
	color: {$colors['text_dark']};
}

.sc_slider_controller .slider-slide.swiper-slide-active {
	border-color: {$colors['text_link']};
}
.sc_slider_controller_titles .slider-slide {
	background-color: {$colors['alter_bg_color']};
}
.sc_slider_controller_titles .slider-slide:after {
	background-color: {$colors['alter_bd_color']};
}
.sc_slider_controller_titles .slider-slide.swiper-slide-active {
	background-color: {$colors['bg_color']};
}
.sc_slider_controller_titles .sc_slider_controller_info_title {
	color: {$colors['alter_dark']};
}
.sc_slider_controller_titles .sc_slider_controller_info_number {
	color: {$colors['alter_light']};
}
.sc_slider_controller_titles .slider_controls_wrap > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.sc_slider_controller_titles .slider_controls_wrap > a:hover {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}


/* Widgets 
--------------------------------------------------- */

/* Categories list */
.widget_categories_list .categories_list_style_1 .categories_list_item:hover .categories_list_title,
.widget_categories_list .categories_list_style_3 .categories_list_item:hover .categories_list_title {
	color: {$colors['text_link']};
}
.widget_categories_list .categories_list_style_2 .categories_list_title a:hover {
	color: {$colors['text_dark']};
}

/* Contacts */
.widget_contacts .contacts_info {
	color: {$colors['alter_text']};
}
.widget_contacts .contacts_info span:before,
.widget_contacts .contacts_info > div > a:before,
.widget_contacts .contacts_info > a:before {
	color: {$colors['alter_link']};
}
.widget_contacts .contacts_info span a,
.widget_contacts .contacts_info > div > a,
.widget_contacts .contacts_info > a {
	color: {$colors['alter_dark']};
}
.widget_contacts .contacts_info span a:hover,
.widget_contacts .contacts_info > div > a:hover,
.widget_contacts .contacts_info > a:hover {
	color: {$colors['alter_link']};
}

/* Recent News */
/* Attention! This widget placed in the content area and should use main text colors */
.sc_recent_news_header {
	border-color: {$colors['text_dark']};
}
.sc_recent_news_header_category_item_more {
	color: {$colors['text_link']};
}
.sc_recent_news_header_more_categories {
	border-color: {$colors['extra_bd_color']};
	background-color:{$colors['extra_bg_color']};
}
.sc_recent_news_header_more_categories > a {
	color:{$colors['extra_link']};
}
.sc_recent_news_header_more_categories > a:hover {
	color:{$colors['extra_hover']};
	background-color:{$colors['extra_bg_hover']};
}
.sc_recent_news .post_counters_item,
.sc_recent_news .post_counters .post_counters_edit a {
	color:{$colors['inverse_link']};
	background-color:{$colors['text_link']};
}
.sc_recent_news .post_counters_item:hover,
.sc_recent_news .post_counters .post_counters_edit a:hover {
	color:{$colors['bg_color']};
	background-color:{$colors['text_dark']};
}
.sc_recent_news.sc_recent_news_style_news-extra .post_counters_item,
.sc_recent_news.sc_recent_news_style_news-extra .post_counters .post_counters_edit a {
	color:{$colors['text_link']};
	background-color: transparent;
}
.sc_recent_news.sc_recent_news_style_news-extra .post_counters_item:hover,
.sc_recent_news.sc_recent_news_style_news-extra .post_counters .post_counters_edit a:hover {
	color:{$colors['text_hover']};
	background-color: transparent;
}
.sc_recent_news.sc_recent_news_style_news-extra .post_date a {
	color:{$colors['text_light']};
}
.sc_recent_news.sc_recent_news_style_news-extra .post_date a:hover {
	color:{$colors['text_hover']};
}
.sc_recent_news.sc_recent_news_style_news-list .post_counters_item,
.sc_recent_news.sc_recent_news_style_news-list .post_counters .post_counters_edit a {
	color:{$colors['text_link']};
	background-color: transparent;
}
.sc_recent_news.sc_recent_news_style_news-list .post_counters_item:hover,
.sc_recent_news.sc_recent_news_style_news-list .post_counters .post_counters_edit a:hover {
	color:{$colors['text_hover']};
	background-color: transparent;
}
.sc_recent_news.sc_recent_news_style_news-list .post_date a {
	color:{$colors['text_light']};
}
.sc_recent_news.sc_recent_news_style_news-list .post_date a:hover {
	color:{$colors['text_hover']};
}
.sc_recent_news_style_news-list .post_item + .post_item {
    border-top-color: {$colors['bd_color']};
}

.sidebar_inner .sc_recent_news .post_counters_item:hover,
.sidebar_inner .sc_recent_news .post_counters .post_counters_edit a:hover {
	color:{$colors['alter_dark']};
	background-color:{$colors['alter_bg_color']};
}
.sc_recent_news_style_news-magazine .post_accented_border {
	border-color: {$colors['bd_color']};
}
.sc_recent_news_style_news-excerpt .post_item {
	border-color: {$colors['bd_color']};
}

/* Twitter */
.widget_twitter .widget_content .sc_twitter_item,
.widget_twitter .widget_content li {
	color: {$colors['text']};
}
.widget_twitter .widget_content .sc_twitter_item .sc_twitter_item_icon {
	color: {$colors['text_link']} !important;
}
.widget_twitter .swiper-pagination-bullet {
	background-color: {$colors['text_light']};
}
.widget_twitter .swiper-pagination-bullet-active {
	background-color: {$colors['text_link']};
}

.widget_twitter .widget_content .sc_twitter_list li {
	color: {$colors['alter_text']};
}
.widget_twitter .widget_content .sc_twitter_list li:before {
	color: {$colors['alter_link']} !important;
}


/* Shortcodes
--------------------------------------------------- */
/* Titles */
.sc_title.color_style_dark .sc_item_title,
.color_style_dark .sc_item_title {
	color:{$colors['inverse_link']}!important;
}

.sc_item_subtitle {
	color:{$colors['text_link']};
}
.color_style_link2 .sc_item_subtitle {
	color:{$colors['text_link2']};
}
.color_style_link3 .sc_item_subtitle {
	color:{$colors['text_link3']};
}
.sc_item_subtitle.sc_item_title_style_shadow {
	color:{$colors['text_light']};
}

.theme_scroll_down:hover {
	color: {$colors['text_link']};
}


/* Action */
.sc_action_item .sc_action_item_subtitle {						color:{$colors['text_link']}; }
.sc_action_item.color_style_link2 .sc_action_item_subtitle {	color:{$colors['text_link2']}; }
.sc_action_item.color_style_link3 .sc_action_item_subtitle {	color:{$colors['text_link3']}; }
.sc_action_item.color_style_dark .sc_action_item_subtitle {		color:{$colors['text_dark']}; }

.sc_action_item_event .sc_action_item_date,
.sc_action_item_event .sc_action_item_info {
	color:{$colors['text_dark']};
	border-color:{$colors['text']};
}
.sc_action_item_event .sc_action_item_description {
	color:{$colors['text']};
}
.sc_action_item_event.with_image .sc_action_item_inner {
	background-color:{$colors['bg_color']};
}

/* Anchor */
.scheme_self.menu_side_icons .toc_menu_item .toc_menu_icon,
.menu_side_inner > .toc_menu_item .toc_menu_icon {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
	color: {$colors['text_link']};
}
.scheme_self.menu_side_icons .toc_menu_item:hover .toc_menu_icon,
.scheme_self.menu_side_icons .toc_menu_item_active .toc_menu_icon,
.menu_side_inner > .toc_menu_item:hover .toc_menu_icon,
.menu_side_inner > .toc_menu_item_active .toc_menu_icon {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_link']};
}
.scheme_self.menu_side_icons .toc_menu_icon_default:before,
.menu_side_inner > .toc_menu_icon_default:before {
	background-color: {$colors['text_link']};
}
.scheme_self.menu_side_icons .toc_menu_item:hover .toc_menu_icon_default:before,
.scheme_self.menu_side_icons .toc_menu_item_active .toc_menu_icon_default:before,
.menu_side_inner > .toc_menu_item:hover .toc_menu_icon_default:before,
.menu_side_inner > .toc_menu_item_active .toc_menu_icon_default:before {
	background-color: {$colors['text_dark']};
}
.scheme_self.menu_side_icons .toc_menu_item .toc_menu_description,
.menu_side_inner > .toc_menu_item .toc_menu_description {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}

.scheme_self.menu_side_dots #toc_menu .toc_menu_item .toc_menu_icon {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}
.scheme_self.menu_side_dots #toc_menu .toc_menu_item:hover .toc_menu_icon,
.scheme_self.menu_side_dots #toc_menu .toc_menu_item_active .toc_menu_icon {
	color: {$colors['alter_link']};
}
.scheme_self.menu_side_dots #toc_menu .toc_menu_item .toc_menu_icon:before {
	background-color: {$colors['alter_link']};
}
.scheme_self.menu_side_dots #toc_menu .toc_menu_item:hover .toc_menu_icon:before {
	background-color: {$colors['alter_hover']};
}

/* Blogger */
.sc_blogger.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_blogger_item {
	background-color: transparent;
}
.sc_blogger_item_title a {
	color: {$colors['text_dark']};
}
.sc_blogger_item_title a:hover {
	color: {$colors['text_hover']};
}
.sc_blogger_item .post_meta,
.sc_blogger_item .post_meta a,
.sc_blogger_post_meta {
	color: {$colors['text']};
}
.sc_blogger_item .post_meta a:hover {
	color: {$colors['text_hover']};
}
.sc_blogger_item_content {
	color: {$colors['text']};
}
.sc_blogger_item .more-link {
	color: {$colors['alter_link']};
}
.sc_blogger_item .more-link:hover {
	color: {$colors['alter_dark']};
}
.sc_blogger_item .post_meta_item.post_counters_item {
	color: {$colors['text_link']};
}
.sc_blogger_item .post_meta_item.post_counters_item:hover {
	color: {$colors['text_hover']};
}
.sc_blogger_plain .sc_blogger_item + .sc_blogger_item {
	border-color: {$colors['bd_color']};
}

/* Cars */
.sc_cars_columns_1 .sc_cars_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_cars_item_status > a,
.sc_cars_item_type > a,
.sc_cars_item_compare {
	color: {$colors['text_light']};
}
.sc_cars_item_compare.in_compare_list {
	color: {$colors['text_link']};
}
.sc_cars_item_status > a:hover,
.sc_cars_item_type > a:hover,
.sc_cars_item_compare:hover,
.sc_cars_item_compare.in_compare_list:hover {
	color: {$colors['text_dark']};
}
.sc_cars_item_options .sc_cars_item_row_address,
.sc_cars_item_options .sc_cars_item_row_meta {
	color: {$colors['text_light']};
}
.cars_page_title .cars_page_status > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.cars_page_title .cars_page_status > a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_link_blend']};
}
.cars_page_title_address {
	color: {$colors['text_light']};
}
.cars_price {
	color: {$colors['text_light']};
}
.cars_page_attachments_list > a:before,
.cars_page_features_list > a:before {
	color: {$colors['text_link']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles {
	border-color: {$colors['alter_bd_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li > a {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	border-bottom-color: {$colors['alter_bd_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['bg_color']};
	border-bottom-color: {$colors['bg_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li:not(.ui-state-active) > a:hover {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']} {$colors['alter_bg_hover']} {$colors['alter_bd_color']};
}

.cars_page_agent_info_position {
	color: {$colors['text_light']};
}
.cars_page_agent_info_phones > span,
.cars_page_agent_info_phones > a {
	color: {$colors['text']};
}
.cars_page_agent_info_address:before,
.cars_page_agent_info_phones > :before {
	color: {$colors['text_dark']};
}
.cars_page_agent_info_profiles.socials_wrap .social_item .social_icon {
	color: {$colors['text']};
}

.cars_search_form .cars_search_basic .cars_search_show_advanced {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_color']};
}
.cars_search_form .cars_search_basic .cars_search_show_advanced:hover {
	color: {$colors['input_dark']};
}

.sc_cars_compare_data .cars_feature_present {
	color: {$colors['text_link']};
}


/* Content area */
.sc_content_number {
	color: {$colors['alter_bg_hover']};
}


/* Countdown */
.sc_countdown_default .sc_countdown_digits span {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_hover']};
	background-color: {$colors['text_link']};
}
.sc_countdown_circle .sc_countdown_digits {
	color: {$colors['alter_link']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.sc_countdown_default .sc_item_descr b,
.sc_countdown_default .sc_countdown_label {
	color: {$colors['alter_dark']};
}

/* Courses */
.sc_courses.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_courses_default .sc_courses_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_courses_default .sc_courses_item_categories {
	background-color: {$colors['alter_dark']};
}
.sc_courses_default .sc_courses_item_categories a {
	color: {$colors['bg_color']};
}
.sc_courses_default .sc_courses_item_categories a:hover {
	color: {$colors['alter_link']};
}
.sc_courses_default .sc_courses_item_meta {
	color: {$colors['alter_light']};
}
.sc_courses_default .sc_courses_item_date {
	color: {$colors['alter_dark']};
}
.sc_courses_default .sc_courses_item_price {
	color: {$colors['alter_link']};
}
.sc_courses_default .sc_courses_item_period {
	color: {$colors['alter_light']};
}
.courses_single .courses_page_meta {
	color: {$colors['text_light']};
}
.courses_single .courses_page_meta_item_date {
	color: {$colors['text_dark']};
}
.courses_single .courses_page_period {
	color: {$colors['text_light']};
}


/* Dishes */
.sc_dishes_default .sc_dishes_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_dishes_default .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_dishes_default .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle a {
	color: {$colors['alter_dark']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_link']};
}
.sc_dishes_default .sc_dishes_item_featured_left,
.sc_dishes_default .sc_dishes_item_featured_right {
	color: {$colors['text']};
	background-color: transparent;
}
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover2']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover3']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_dark']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_link']};
}

.sc_dishes_compact .sc_dishes_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_dishes_compact .sc_dishes_item_header {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.sc_dishes_compact .sc_dishes_item_price,
.sc_dishes_compact .sc_dishes_item_subtitle a {
	color: {$colors['bg_color']};
}
.sc_dishes_compact .sc_dishes_item_price:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_dishes_compact.color_style_link2 .sc_dishes_item_price:hover,
.sc_dishes_compact.color_style_link2 .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact.color_style_link2 .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact.color_style_link2 .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_dishes_compact.color_style_link3 .sc_dishes_item_price:hover,
.sc_dishes_compact.color_style_link3 .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact.color_style_link3 .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact.color_style_link3 .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_dishes_compact .sc_dishes_item_title a {
	color: {$colors['text_link']};
}
.sc_dishes_compact.color_style_link2 .sc_dishes_item_title a {
	color: {$colors['text_link2']};
}
.sc_dishes_compact.color_style_link3 .sc_dishes_item_title a {
	color: {$colors['text_link3']};
}
.sc_dishes_compact .sc_dishes_item_title a:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_title a {
	color: {$colors['bg_color']};
}
.sc_dishes.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}


/* Events */
.sc_events.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_events_default .sc_events_item,
.sc_events_default .sc_events_item:first-child,
.sc_events_default .sc_events_item + .sc_events_item {
	border-color: {$colors['bd_color']};
}
.sc_events_default .sc_events_item:hover .sc_events_item_date,
.sc_events_default .sc_events_item_date,
.sc_events_default .sc_events_item {
	background-color: transparent;
}
.sc_events_default .sc_events_item_date {
	color: {$colors['text']};
}
.sc_events_default .sc_events_item_title,
.sc_events_default .sc_events_item:hover .sc_events_item_title {
	color: {$colors['text_dark']};
}
.sc_events_default .sc_events_item_button,
.sc_events_default .sc_events_item:hover .sc_events_item_button {
	color: {$colors['inverse_text']};
}
.sc_events_default .sc_events_item_date .sc_events_item_month {
	color: {$colors['text_dark']};
}
.sc_events_default .sc_events_item_details_venue {
	color: {$colors['text_link']};
}
.sc_events_default .sc_events_item_details_venue .tribe-address{
	color: {$colors['text']};
}

.sc_blogger_default .sc_blogger_item_wrap_featured_event .sc_events_item_date,
.sc_blogger_default .sc_blogger_item_wrap_featured_event .sc_events_item_date *{
	color: {$colors['inverse_text']};
}
.sc_blogger_default .sc_blogger_item_wrap_featured_event .sc_events_item_date {
	background-color: {$colors['text_link']};
}

.sc_events_detailed .sc_events_item,
.sc_events_detailed .sc_events_item_date_wrap,
.sc_events_detailed .sc_events_item_time_wrap:before,
.sc_events_detailed .sc_events_item_button_wrap:before {
	border-color: {$colors['text_link']};
}
.sc_events_detailed .sc_events_item_date,
.sc_events_detailed .sc_events_item_button {
	color: {$colors['text_link']};
}
.sc_events_detailed .sc_events_item_title {
	color: {$colors['text_dark']};
}
.sc_events_detailed .sc_events_item_time {
	color: {$colors['text']};
}
.sc_events_detailed .sc_events_item:hover {
	background-color: transparent;
	color: {$colors['inverse_link']};
}
.sc_events_detailed .sc_events_item:hover,
.sc_events_detailed .sc_events_item:hover .sc_events_item_date,
.sc_events_detailed .sc_events_item:hover .sc_events_item_button,
.sc_events_detailed .sc_events_item:hover .sc_events_item_title,
.sc_events_detailed .sc_events_item:hover .sc_events_item_time {
	color: {$colors['inverse_hover']};
}
.sc_events_detailed .sc_events_item:hover,
.sc_events_detailed .sc_events_item:hover .sc_events_item_date_wrap,
.sc_events_detailed .sc_events_item:hover .sc_events_item_time_wrap:before,
.sc_events_detailed .sc_events_item:hover .sc_events_item_button_wrap:before {
	border-color: {$colors['inverse_hover']};
}

/* Form */
.scheme_self.sc_form {
	background-color: {$colors['bg_color']};
}
span.sc_form_field_title {
	color: {$colors['text_dark']};
}
.sc_form .sc_form_info_icon {
	color: {$colors['text_link']};
}
.sc_form .sc_form_info_data > a,
.sc_form .sc_form_info_data > span {
	color: {$colors['text_dark']};
}
.sc_form .sc_form_info_data > a:hover {
	color: {$colors['text_link']};
}


/* input hovers */
[class*="sc_input_hover_"] .sc_form_field_content {
	color: {$colors['text_dark']};
}
.sc_input_hover_accent input[type="text"]:focus,
.sc_input_hover_accent input[type="number"]:focus,
.sc_input_hover_accent input[type="email"]:focus,
.sc_input_hover_accent input[type="password"]:focus,
.sc_input_hover_accent input[type="search"]:focus,
.sc_input_hover_accent select:focus,
.sc_input_hover_accent .select2-container.select2-container--focus span.select2-selection,
.sc_input_hover_accent .select2-container.select2-container--open span.select2-selection,
.sc_input_hover_accent textarea:focus {
	border-color: {$colors['text_link']} !important;
}
.sc_input_hover_accent .sc_form_field_hover:before {
	color: {$colors['text_link_02']};
}

.sc_input_hover_path .sc_form_field_graphic {
	stroke: {$colors['input_bd_color']};
}

.sc_input_hover_jump .sc_form_field_content {
	color: {$colors['input_dark']};
}
.sc_input_hover_jump .sc_form_field_content:before {
	color: {$colors['text_link']};
}
.sc_input_hover_jump input[type="text"],
.sc_input_hover_jump input[type="number"],
.sc_input_hover_jump input[type="email"],
.sc_input_hover_jump input[type="password"],
.sc_input_hover_jump input[type="search"],
.sc_input_hover_jump textarea {
	border-color: {$colors['input_bd_color']};
}
.sc_input_hover_jump input[type="text"]:focus,
.sc_input_hover_jump input[type="number"]:focus,
.sc_input_hover_jump input[type="email"]:focus,
.sc_input_hover_jump input[type="password"]:focus,
.sc_input_hover_jump input[type="search"]:focus,
.sc_input_hover_jump textarea:focus {
	border-color: {$colors['text_link']} !important;
}

.sc_input_hover_underline .sc_form_field_hover:before {
	background-color: {$colors['input_bd_color']};
}
.sc_input_hover_underline input:focus + .sc_form_field_hover:before,
.sc_input_hover_underline textarea:focus + .sc_form_field_hover:before,
.sc_input_hover_underline input.filled + .sc_form_field_hover:before,
.sc_input_hover_underline textarea.filled + .sc_form_field_hover:before {
	background-color: {$colors['text_link']};
}
.sc_input_hover_underline .sc_form_field_content {
	color: {$colors['input_dark']};
}
.sc_input_hover_underline input:focus,
.sc_input_hover_underline textarea:focus,
.sc_input_hover_underline input.filled,
.sc_input_hover_underline textarea.filled,
.sc_input_hover_underline input:focus + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline textarea:focus + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline input.filled + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline textarea.filled + .sc_form_field_hover > .sc_form_field_content {
	color: {$colors['text_link']} !important;
}

.sc_input_hover_iconed .sc_form_field_hover {
	color: {$colors['input_text']};
}
.sc_input_hover_iconed input:focus + .sc_form_field_hover,
.sc_input_hover_iconed textarea:focus + .sc_form_field_hover,
.sc_input_hover_iconed input.filled + .sc_form_field_hover,
.sc_input_hover_iconed textarea.filled + .sc_form_field_hover {
	color: {$colors['input_dark']};
}

/* Googlemap */
.sc_googlemap_content,
.scheme_self.sc_googlemap_content {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
}
.sc_googlemap_content b,
.sc_googlemap_content strong,
.scheme_self.sc_googlemap_content b,
.scheme_self.sc_googlemap_content strong {
	color: {$colors['text_dark']};
}
.sc_googlemap_content_detailed:before {
	color: {$colors['text_link']};
}

/* Icons */
.sc_icons .sc_icons_icon {
	color: {$colors['text_link']};
}
.sc_icons .sc_icons_item_linked:hover .sc_icons_icon {
	color: {$colors['text_dark']};
}
.sc_icons .sc_icons_item_title {
	color: {$colors['text_dark']};
}
.scheme_self.footer_wrap .sc_icons .sc_icons_item_title {
	color: {$colors['text_dark']};
}
.scheme_self.footer_wrap .sc_icons .sc_icons_item_description {
	color: {$colors['text']};
}
.sc_icons_item_description,
.sc_icons_modern .sc_icons_item_description {
	color: {$colors['text']};
}


/* Sports: Matches and Players */
.sc_sport_default .sc_sport_item_subtitle .sc_sport_item_date {
	color: {$colors['text_light']};
}

.sc_matches_main .swiper-pagination .swiper-pagination-bullet {
	border-color: {$colors['bd_color']};
}
.sc_matches_main .sc_matches_item_score a {
	color: {$colors['text_dark']};
}
.sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link']};
}
.color_style_link2 .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link2']};
}
.color_style_link3 .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link3']};
}
.color_style_dark .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_dark']};
}

.sc_matches_other .sc_matches_item_link {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}
.sc_matches_other .sc_matches_item_club {
	color: {$colors['alter_light']};
}
.sc_matches_other .sc_matches_item_date {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bd_color']};
}
.sc_matches_other .sc_matches_item_link:hover {
	background-color: {$colors['alter_bg_hover']};
}
.sc_matches_other .sc_matches_item_link:hover .sc_matches_item_date {
	background-color: {$colors['alter_bd_hover']};
}

.sc_points_table td a {
	color: {$colors['alter_dark']};
}
.sc_points_table tr:hover td {
	background-color: {$colors['alter_hover']} !important;
}
.sc_points_table tr:hover a,
.sc_points_table td a:hover {
	color: {$colors['inverse_hover']} !important;
}
.sc_points_table tr.sc_points_table_accented_top td {
	background-color: {$colors['text_link_07']};
}
.sc_points_table tr.sc_points_table_accented_bottom td {
	background-color: {$colors['alter_bg_color']};
}


/* Price */
.sc_price_item {
	color: {$colors['text']};
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
}
.sc_price_item:hover {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
}
.sc_price_item .sc_price_item_icon {
	color: {$colors['text_link']};
}
.sc_price_item:hover .sc_price_item_icon {
	color: {$colors['text_hover']};
}
.sc_price_item .sc_price_item_label {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
.sc_price_item:hover .sc_price_item_label {
	background-color: {$colors['text_hover']};
	color: {$colors['inverse_text']};
}
.sc_price_item .sc_price_item_subtitle {
	color: {$colors['text_dark']};
}
.sc_price_item .sc_price_item_title,
.sc_price_item .sc_price_item_title a {
	color: {$colors['text_link']};
}
.sc_price_item .sc_price_item_title a:hover {
	color: {$colors['text_hover']};
}
.sc_price_item .sc_price_item_description,
.sc_price_item .sc_price_item_details {
	color: {$colors['text']};
}

div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_price_item .sc_price_item_title,
div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_price_item .sc_price_item_title a {
	color: {$colors['text_hover2']};
}
div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_price_item .sc_price_item_title a:hover {
	color: {$colors['text_link2']};
}
div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_price_item .sc_price_item_title,
div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_price_item .sc_price_item_title a {
	color: {$colors['text_link']};
}
div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_price_item .sc_price_item_title a:hover {
	color: {$colors['text_hover']};
}
div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_price_item .sc_price_item_title,
div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_price_item .sc_price_item_title a {
	color: {$colors['text_link2']};
}
div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_price_item .sc_price_item_title a:hover {
	color: {$colors['text_hover2']};
}

div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_price_item .sc_price_item_link {
	background-color: {$colors['text_hover2']};
}
div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_price_item .sc_price_item_link:hover {
	background-color: {$colors['text_link2']};
}
div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_price_item .sc_price_item_link {
	background-color: {$colors['text_link']};
}
div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_price_item .sc_price_item_link:hover {
	background-color: {$colors['text_hover']};
}
div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_price_item .sc_price_item_link {
	background-color: {$colors['text_link2']};
}
div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_price_item .sc_price_item_link:hover {
	background-color: {$colors['text_hover2']};
}


/* Promo */
.sc_promo_icon {
	color:{$colors['text_link']};
}
.sc_promo .sc_promo_title,
.sc_promo .sc_promo_descr {
	color:{$colors['text_dark']};
}
.sc_promo .sc_promo_content {
	color:{$colors['text']};
}
.sc_promo_modern .sc_promo_link2 {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']} !important;
}
.sc_promo_modern .sc_promo_link2:hover {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.scheme_self.sc_promo .sc_promo_text.trx_addons_stretch_height,
.scheme_self.sc_promo .sc_promo_text_inner {
	background-color: {$colors['alter_bg_color']};
}
.scheme_self.sc_promo .sc_promo_title {
	color:{$colors['alter_link']};
}
.scheme_self.sc_promo .sc_promo_subtitle {
	color:{$colors['alter_hover']};
}
.scheme_self.sc_promo .sc_promo_descr {
	color:{$colors['alter_dark']};
}
.scheme_self.sc_promo .sc_promo_content {
	color:{$colors['alter_text']};
}


/* Properties */
.sc_properties_columns_1 .sc_properties_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_properties_item_status > a,
.sc_properties_item_type > a,
.sc_properties_item_compare {
	color: {$colors['text_light']};
}
.sc_properties_item_compare.in_compare_list {
	color: {$colors['text_link']};
}
.sc_properties_item_status > a:hover,
.sc_properties_item_type > a:hover,
.sc_properties_item_compare:hover,
.sc_properties_item_compare.in_compare_list:hover {
	color: {$colors['text_dark']};
}
.sc_properties_item_options .sc_properties_item_row_address,
.sc_properties_item_options .sc_properties_item_row_meta {
	color: {$colors['text_light']};
}
.properties_page_title .properties_page_status > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.properties_page_title .properties_page_status > a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_link_blend']};
}
.properties_page_title_address {
	color: {$colors['text_light']};
}
.properties_price {
	color: {$colors['text_light']};
}
.properties_page_attachments_list > a:before,
.properties_page_features_list > a:before {
	color: {$colors['text_link']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles {
	border-color: {$colors['alter_bd_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li > a {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	border-bottom-color: {$colors['alter_bd_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['bg_color']};
	border-bottom-color: {$colors['bg_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li:not(.ui-state-active) > a:hover {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']} {$colors['alter_bg_hover']} {$colors['alter_bd_color']};
}

.properties_page_agent_info_position {
	color: {$colors['text_light']};
}
.properties_page_agent_info_phones > span,
.properties_page_agent_info_phones > a {
	color: {$colors['text']};
}
.properties_page_agent_info_address:before,
.properties_page_agent_info_phones > :before {
	color: {$colors['text_dark']};
}
.properties_page_agent_info_profiles.socials_wrap .social_item .social_icon {
	color: {$colors['text']};
}

.properties_search_form .properties_search_basic .properties_search_show_advanced {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_color']};
}
.properties_search_form .properties_search_basic .properties_search_show_advanced:hover {
	color: {$colors['input_dark']};
}

.sc_properties_compare_data .properties_feature_present {
	color: {$colors['text_link']};
}


/* Services */
.sc_services .sc_services_item_number {
	color: {$colors['alter_bg_hover']};
}

.sc_services_default .sc_services_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_services_default .sc_services_item_icon {
	color: {$colors['alter_link']};
	border-color: transparent;
}
.sc_services_default .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: transparent;
	border-color: transparent;
}
.sc_services_default.color_style_link2 .sc_services_item_icon {
	color: {$colors['alter_link2']};
	border-color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_link2']};
	border-color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link3 .sc_services_item_icon {
	color: {$colors['alter_link3']};
	border-color: {$colors['alter_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_link3']};
	border-color: {$colors['alter_link3']};
}
.sc_services_default.color_style_dark .sc_services_item_icon {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.sc_services_default.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.sc_services_default .sc_services_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_services_default .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_services_default.color_style_link2 .sc_services_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_services_default.color_style_link3 .sc_services_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_services_default.color_style_dark .sc_services_item_subtitle a {
	color: {$colors['alter_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_subtitle a:hover {
	color: {$colors['alter_link']};
}
.sc_services_default .sc_services_item_featured_left,
.sc_services_default .sc_services_item_featured_right,
.sc_services_list .sc_services_item {
	color: {$colors['text']};
	background-color: transparent;
}

.sc_services_default .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list .sc_services_item_icon {
	color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_services_list .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover']};
}
.sc_services_default .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_services_default .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_services_default .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
	border-color: {$colors['text_link2']};
}
.sc_services_list.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_link2 .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link2']};
	border-color: {$colors['text_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover2']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
	border-color: {$colors['text_link3']};
}
.sc_services_list.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_link3 .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link3']};
	border-color: {$colors['text_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover3']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.sc_services_list.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_dark .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}

.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_icon,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_title,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_title a {
	color: {$colors['text_hover2']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_icon:hover,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_title a:hover {
	color: {$colors['text_link2']} !important;
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_icon,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_title,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_title a {
	color: {$colors['text_link']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_icon:hover,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_title a:hover{
	color: {$colors['text_hover']} !important;
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_icon,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_title,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_title a {
	color: {$colors['text_link2']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_icon:hover,
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_title a:hover {
	color: {$colors['text_hover2']} !important;
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_button a {
	background-color: {$colors['text_hover2']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(1n+1) .sc_services_item_button a:hover {
	background-color: {$colors['text_link2']} !important;
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_button a {
	background-color: {$colors['text_link']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+2) .sc_services_item_button a:hover {
	background-color: {$colors['text_hover']} !important;
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_button a  {
	background-color: {$colors['text_link2']};
}
.sc_services_default div[class*="trx_addons_column-1_3"]:nth-child(3n+3) .sc_services_item_button a:hover  {
	background-color: {$colors['text_hover2']} !important;
}


.sc_services_light .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_light .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover']};
}
.sc_services_light.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
}
.sc_services_light.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover2']};
}
.sc_services_light.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
}
.sc_services_light.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover3']};
}
.sc_services_light.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
}
.sc_services_light.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_link']};
}


.sc_services_callouts .sc_services_item {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_callouts .sc_services_item_marker {
	border-color: {$colors['bg_color']};
	background-color:{$colors['alter_link']};
	color: {$colors['inverse_link']};
}
.sc_services_callouts .sc_services_item .sc_services_item_marker_back {
	border-color: {$colors['bg_color']};
	background-color:{$colors['alter_hover']};
	color: {$colors['inverse_hover']};
}
.sc_services_callouts.color_style_link2 .sc_services_item_marker {
	background-color:{$colors['alter_link2']};
}
.sc_services_callouts.color_style_link2 .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_hover2']};
}
.sc_services_callouts.color_style_link3 .sc_services_item_marker {
	background-color:{$colors['alter_link3']};
}
.sc_services_callouts.color_style_link3 .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_hover3']};
}
.sc_services_callouts.color_style_dark .sc_services_item_marker {
	background-color:{$colors['alter_dark']};
}
.sc_services_callouts.color_style_dark .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_link']};
}
.sc_services_callouts .sc_services_item_marker_bg {
	border-color: {$colors['bg_color']};
	background-color:{$colors['bg_color']};
}

.sc_services_timeline .sc_services_item_timeline {
	border-color: {$colors['bd_color']};
}
.sc_services_timeline .sc_services_item_marker {
	border-color: {$colors['alter_bg_color']};
	background-color:{$colors['alter_bg_color']};
	color: {$colors['text_link']};
}
.sc_services_timeline .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['alter_bg_color']};
	background-color:{$colors['alter_bg_color']};
	color: {$colors['text_hover']};
}
.sc_services_timeline.color_style_link2 .sc_services_item_marker {
	border-color: {$colors['text_link2']};
	background-color:{$colors['text_link2']};
}
.sc_services_timeline.color_style_link2 .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_hover2']};
	background-color:{$colors['text_hover2']};
}
.sc_services_timeline.color_style_link3 .sc_services_item_marker {
	border-color: {$colors['text_link3']};
	background-color:{$colors['text_link3']};
}
.sc_services_timeline.color_style_link3 .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_hover3']};
	background-color:{$colors['text_hover3']};
}
.sc_services_timeline.color_style_dark .sc_services_item_marker {
	border-color: {$colors['text_dark']};
	background-color:{$colors['text_dark']};
}
.sc_services_timeline.color_style_dark .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_link']};
	background-color:{$colors['text_link']};
}

.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_marker:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title a,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_button a {
	color: {$colors['text_hover2']};
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_marker:hover:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title a:hover,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_button a:hover {
	color: {$colors['text_link2']} !important;
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_marker:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title a,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_button a {
	color: {$colors['text_link']};
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_marker:hover:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title a:hover,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_button a:hover {
	color: {$colors['text_hover']} !important;
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_marker:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title a,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_button a  {
	color: {$colors['text_link2']};
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_marker:hover:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title a:hover,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_button a:hover  {
	color: {$colors['text_hover2']} !important;
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_marker:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title a,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_button a  {
	color: {$colors['text_dark']};
}
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_marker:hover:before,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title a:hover,
.sc_services_timeline div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_button a:hover  {
	color: {$colors['text_hover']} !important;
}

.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_icon:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title a,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_button a {
	color: {$colors['text_hover2']};
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_icon:hover:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_title a:hover,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(1n+1) .sc_services_item_button a:hover {
	color: {$colors['text_link2']} !important;
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_icon:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title a,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_button a {
	color: {$colors['text_link']};
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_icon:hover:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_title a:hover,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(2n+2) .sc_services_item_button a:hover {
	color: {$colors['text_hover']} !important;
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_icon:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title a,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_button a  {
	color: {$colors['text_link2']};
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_icon:hover:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_title a:hover,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(3n+3) .sc_services_item_button a:hover  {
	color: {$colors['text_hover2']} !important;
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_icon:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title a,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_button a  {
    color: {$colors['text_link']};
}
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_icon:hover:before,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_title a:hover,
.sc_services_list div[class*="trx_addons_column-"]:nth-child(4n+4) .sc_services_item_button a:hover  {
    color: {$colors['text_hover']} !important;
}

.sc_services_iconed .sc_services_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_services_iconed .sc_services_item_icon:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_icon:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed.color_style_link2 .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_icon:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed.color_style_link3 .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_header .sc_services_item_title a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_title a {
	color: #fff;
}
.sc_services_iconed .sc_services_item .sc_services_item_header .sc_services_item_subtitle a {
	color: #fff;
}
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed.color_style_link2 .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed.color_style_link3 .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services_iconed .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link3']};
}
.sc_services_iconed.color_style_dark .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_dark .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_services_list .sc_services_item_featured_left .sc_services_item_number,
.sc_services_list .sc_services_item_featured_right .sc_services_item_number {
	color: {$colors['text_light']};
}

.sc_services_hover .sc_services_item_icon,
.sc_services_hover .sc_services_item_title a:hover,
.sc_services_hover .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item_icon,
.sc_services_hover.color_style_link2 .sc_services_item_title a:hover,
.sc_services_hover.color_style_link2 .sc_services_item_subtitle a:hover {
	color: {$colors['text_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item_icon,
.sc_services_hover.color_style_link3 .sc_services_item_title a:hover,
.sc_services_hover.color_style_link3 .sc_services_item_subtitle a:hover {
	color: {$colors['text_link3']};
}
.sc_services_hover [class*="column-"]:nth-child(2n) .sc_services_item.with_image .sc_services_item_header.without_image,
.sc_services_hover .slider-slide:nth-child(2n) .sc_services_item.with_image .sc_services_item_header.without_image {
	background-color:{$colors['alter_bg_hover']};
}
.sc_services_hover [class*="column-"]:nth-child(2n+1) .sc_services_item.with_image .sc_services_item_header.without_image,
.sc_services_hover .slider-slide:nth-child(2n+1) .sc_services_item.with_image .sc_services_item_header.without_image {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_icon,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_number {
	color: {$colors['alter_light']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services_hover .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link3']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_services_hover .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_text {
	color: {$colors['alter_text']};
}

.sc_services_chess .sc_services_item {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.sc_services_chess .sc_services_item_title a {
	color:{$colors['alter_dark']};
}
.sc_services_chess .sc_services_item_title a:hover {
	color:{$colors['alter_link']};
}
.sc_services_chess.color_style_link2 .sc_services_item_title a:hover {
	color:{$colors['alter_link2']};
}
.sc_services_chess.color_style_link3 .sc_services_item_title a:hover {
	color:{$colors['alter_link3']};
}
.sc_services_chess .sc_services_item:hover {
	color:{$colors['text_light']};
	background-color:{$colors['text_dark']};
}
.sc_services_chess .sc_services_item:hover .sc_services_item_title a {
	color:{$colors['bg_color']};
}
.sc_services_chess .sc_services_item:hover .sc_services_item_title a:hover {
	color:{$colors['text_link']};
}


.sc_services_tabs_simple .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_tabs_simple.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
}
.sc_services_tabs_simple.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
}
.sc_services_tabs_simple.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
}
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover']};
}
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover2']};
}
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover3']};
}

.sc_services_tabs .sc_services_item_content {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.sc_services_tabs .sc_services_item_title a {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_item_title a:hover {
	color:{$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_item_title a:hover {
	color:{$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_item_title a:hover {
	color:{$colors['alter_link3']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link3']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_number {
	color: {$colors['alter_light']};
}
.sc_services_tabs .sc_services_tabs_list_item {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_tabs .sc_services_tabs_list_item:nth-child(2n+2) {
	background-color:{$colors['alter_bg_hover']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover,
.sc_services_tabs .sc_services_tabs_list_item:nth-child(2n+2):hover {
	background-color:{$colors['alter_bd_hover']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_title {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_number {
	color: {$colors['alter_text']};
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active {
	background-color:{$colors['alter_dark']} !important;
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_title {
	color: {$colors['bg_color']};
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_dark']};
}


/* Skills (Counters) */
.sc_skills_counter .sc_skills_icon {
	color:{$colors['text_dark']};
}
.sc_skills .sc_skills_total {
	color:{$colors['inverse_link']};
}
.sc_skills.color_style_link2 .sc_skills_total {
	color:{$colors['text_link2']};
}
.sc_skills.color_style_link3 .sc_skills_total {
	color:{$colors['text_link3']};
}
.sc_skills.color_style_dark .sc_skills_total {
	color:{$colors['text_dark']};
}
.sc_skills .sc_skills_item_title,
.sc_skills .sc_skills_legend_title,
.sc_skills .sc_skills_legend_value {
	color:{$colors['inverse_link']};
}
.sc_skills_counter .sc_skills_column + .sc_skills_column:before {
	background-color: {$colors['bd_color']};
}

/* Socials */
.socials_wrap .social_item .social_icon {
	background-color: {$colors['alter_bg_color']};
}
.socials_wrap .social_item .social_icon,
.socials_wrap .social_item .social_icon i {
	color: {$colors['alter_dark']};
}
.socials_wrap .social_item:hover .social_icon {
	background-color: {$colors['alter_bg_hover']};
}
.socials_wrap .social_item:hover .social_icon,
.socials_wrap .social_item:hover .social_icon i {
	color: {$colors['alter_link']};
}
.sidebar_inner .socials_wrap .social_item .social_icon {
	background-color: {$colors['alter_bg_hover']};
}
.sidebar_inner .socials_wrap .social_item:hover .social_icon,
.sidebar_inner .socials_wrap .social_item:hover .social_icon i {
	color: {$colors['inverse_link']};
}
.sidebar_inner .socials_wrap .social_item:hover .social_icon {
	background-color: {$colors['alter_hover']};
}
.footer_wrap .socials_wrap .social_item .social_icon,
.scheme_self.footer_wrap .socials_wrap .social_item .social_icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}
.footer_wrap .socials_wrap .social_item:hover .social_icon,
.scheme_self.footer_wrap .socials_wrap .social_item:hover .social_icon {
	color: {$colors['inverse_hover']};
	background-color: {$colors['alter_hover']};
}
.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item .social_icon,
.scheme_self.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item .social_icon {
	color: {$colors['text_dark']};
	background-color: transparent;
}
.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item:hover .social_icon,
.scheme_self.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item:hover .social_icon {
	color: {$colors['text_link']};
	background-color: transparent;
}

/* Share */
.socials_share.socials_type_drop .social_item > .social_icon > i {
	color: {$colors['text_light']};
}
.socials_share.socials_type_drop .social_item:hover > .social_icon > i {
	color: {$colors['text_dark']};
}


/* Testimonials */
.sc_testimonials_item_content {
	color: {$colors['text']};
}
.sc_testimonials_item_content:before,
.sc_testimonials_item_author_title {
	color: {$colors['text_link']};
}
.color_style_link2 .sc_testimonials_item_content:before,
.color_style_link2 .sc_testimonials_item_author_title {
	color: {$colors['text_link2']};
}
.color_style_link3 .sc_testimonials_item_content:before,
.color_style_link3 .sc_testimonials_item_author_title {
	color: {$colors['text_link3']};
}
.color_style_dark .sc_testimonials_item_content:before,
.color_style_dark .sc_testimonials_item_author_title {
	color: {$colors['text_dark']};
}
.sc_testimonials_item_author_subtitle {
	color: {$colors['text']};
}
.sc_testimonials_simple .sc_testimonials_item_author_data:before  {
	background-color: {$colors['text_light']};
}
.sc_testimonials_simple [class*="column"] .sc_testimonials_item_author_data {
	border-color: {$colors['text_light']};
}
.sc_testimonials_item_author_title {
	color: {$colors['alter_dark']};
}

/* Team */
.sc_team_default .sc_team_item {
	color: {$colors['text']};
	background-color: transparent;
}
.sc_team_default .sc_team_item + .sc_team_item {
	border-color: {$colors['bd_color']};
}
.sc_team .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link']};
}
.sc_team.color_style_link2 .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link2']};
}
.sc_team.color_style_link3 .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link3']};
}
.sc_team_default .sc_team_item_subtitle {
	color: {$colors['text']};
}
.sc_team_default .sc_team_item_email {
	color: {$colors['text_link']};
}
.sc_team_default.color_style_link2 .sc_team_item_subtitle {
	color: {$colors['alter_link2']};
}
.sc_team_default.color_style_link3 .sc_team_item_subtitle {
	color: {$colors['alter_link3']};
}
.sc_team_default.color_style_dark .sc_team_item_subtitle {
	color: {$colors['alter_dark']};
}

.single-donation .nav-links a, .single-donation .nav-links a:hover,
.single-donation .nav-links a:before, .single-donation .nav-links a:hover:before,
.post_item_single .post_content > .post_meta_single .post_share .social_item,
.post_item_single .post_content > .post_meta_single .post_share .social_item :before,
.sc_team_default .sc_team_item_socials .social_item,
.team_member_page .team_member_socials .social_item,
.sc_team_default .sc_team_item_socials .social_item *:before,
.team_member_page .team_member_socials .social_item *:before{
	color: {$colors['inverse_link']};
}
.sc_team_default .sc_team_item_socials .social_item .social_icon,
.team_member_page .team_member_socials .social_item .social_icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}
.sc_team_default.color_style_link2 .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_link2']};
}
.sc_team_default.color_style_link3 .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_link3']};
}
.sc_team_default.color_style_dark .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_dark']};
}
.sc_team_default .sc_team_item_socials .social_item:hover .social_icon,
.team_member_page .team_member_socials .social_item:hover .social_icon {
	color: {$colors['alter_bg_color']};
	background-color: {$colors['alter_dark']};
}
.sc_team_default.color_style_link2 .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_hover2']};
}
.sc_team_default.color_style_link3 .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_hover3']};
}
.sc_team_default.color_style_dark .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_link']};
}
.sc_team .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon {
	color: {$colors['inverse_link']};
	border-color: {$colors['inverse_link']};
}
.sc_team .sc_team_item_thumb .sc_team_item_socials .social_item:hover .social_icon {
	color: {$colors['text_link']};
	background-color: {$colors['inverse_link']};
}
.team_member_page .team_member_featured .team_member_avatar {
	border-color: {$colors['bd_color']};
}
.sc_team_short .sc_team_item_thumb {
	border-color: {$colors['text_link']};
}
.sc_team_short.color_style_link2 .sc_team_item_thumb {
	border-color: {$colors['text_link2']};
}
.sc_team_short.color_style_link3 .sc_team_item_thumb {
	border-color: {$colors['text_link3']};
}
.sc_team_short.color_style_dark .sc_team_item_thumb {
	border-color: {$colors['text_dark']};
}
.sc_team.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}



/* CPT Sport
--------------------------------------------------- */

.sport_page_list {
	border-color: {$colors['bd_color']};
}
.sport_page_list li+li {
	border-color: {$colors['bd_color']};
}
.sport_page_list li:nth-child(2n+1) {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}


/* Utils
--------------------------------------------------- */

/* Scroll to top */
.trx_addons_scroll_to_top,
.trx_addons_cv .trx_addons_scroll_to_top {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_scroll_to_top:hover,
.trx_addons_cv .trx_addons_scroll_to_top:hover {
	color: {$colors['inverse_hover']};
	border-color: {$colors['text_link_blend']};
	background-color: {$colors['text_link_blend']};
}


/* Login and Register */
.trx_addons_popup {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_text']};
}
.trx_addons_popup button.mfp-close {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
	color:{$colors['alter_text']};
}
.trx_addons_popup button.mfp-close:hover {
	background-color: {$colors['alter_dark']};
	color: {$colors['alter_bg_color']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title {
	background-color:{$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active {
	background-color:{$colors['alter_bg_color']};
	border-bottom-color: transparent;
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a > i {
	color:{$colors['alter_text']};
}
.trx_addons_popup li.trx_addons_tabs_title a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a:hover > i {
	color:{$colors['alter_link']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a > i,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a:hover > i {
	color:{$colors['alter_light']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a > i,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a:hover > i {
	color:{$colors['alter_dark']};
}
#trx_addons_login_popup.trx_addons_popup input {
	background-color:{$colors['bg_color']};
}

/* Profiler */
.trx_addons_profiler {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_hover']};
}
.trx_addons_profiler_title {
	color: {$colors['alter_dark']};
}
.trx_addons_profiler table td,
.trx_addons_profiler table th {
	border-color: {$colors['alter_bd_color']};
}
.trx_addons_profiler table td {
	color: {$colors['alter_text']};
}
.trx_addons_profiler table th {
	background-color: {$colors['alter_bg_hover']};
	color: {$colors['alter_dark']};
}


/* CV */
.trx_addons_cv,
.trx_addons_cv_body_wrap {
	color: {$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.trx_addons_cv a {
	color: {$colors['alter_link']};
}
.trx_addons_cv a:hover {
	color: {$colors['alter_hover']};
}

.trx_addons_cv_header {
	background-color: {$colors['bg_color']};
}
.trx_addons_cv_header_image img {
	border-color: {$colors['text_dark']};
}
.trx_addons_cv_header .trx_addons_cv_header_letter,
.trx_addons_cv_header .trx_addons_cv_header_text {
	color: {$colors['text_dark']};
}
.trx_addons_cv_header .trx_addons_cv_header_socials .social_item > .social_icon {
	color: {$colors['text_dark_07']};	
}
.trx_addons_cv_header .trx_addons_cv_header_socials .social_item:hover > .social_icon {
	color: {$colors['text_dark']};	
}

.trx_addons_cv_header_letter,
.trx_addons_cv_header_text,
.trx_addons_cv_header_socials .social_item > .social_icon {
	text-shadow: 1px 1px 6px {$colors['bg_color']};
}

.trx_addons_cv_tint_dark .trx_addons_cv_header_letter,
.trx_addons_cv_tint_dark .trx_addons_cv_header_text,
.trx_addons_cv_tint_dark .trx_addons_cv_header_socials .social_item > .social_icon {
	color: {$colors['bg_color']};	
	text-shadow: 1px 1px 3px {$colors['text_dark']};
}
.trx_addons_cv_tint_dark .trx_addons_cv_header_socials .social_item:hover > .social_icon {
	color: {$colors['text_hover']};	
}

.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item {
	color: {$colors['alter_light']};
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['bg_color']};
}
.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item_active,
.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item:hover {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_bg_color']};
}


.trx_addons_cv .trx_addons_cv_section_title,
.trx_addons_cv .trx_addons_cv_section_title a {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_section_title.ui-state-active {
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li > a {
	color: {$colors['alter_light']};
}
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a,
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li > a:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_section .trx_addons_pagination > * {
	color:{$colors['alter_text']};
}
.trx_addons_cv_section .trx_addons_pagination > a:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_pagination > span.active {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_breadcrumbs .trx_addons_cv_breadcrumbs_item {
	color: {$colors['alter_light']};
}
.trx_addons_cv_breadcrumbs a.trx_addons_cv_breadcrumbs_item:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_single .trx_addons_cv_single_title {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_single .trx_addons_cv_single_subtitle {
	color: {$colors['alter_light']};
}

.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+5) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+6) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+5) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+6) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+7) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+8) .trx_addons_cv_resume_item {
	border-color: {$colors['alter_bd_color']};
}
.trx_addons_cv_resume_item_meta {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title,
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title a {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title a:hover {
	color: {$colors['alter_link']};
}
.trx_addons_cv_resume_item_subtitle {
	color: {$colors['alter_light']};
}
.trx_addons_cv_resume_style_skills .trx_addons_cv_resume_item_skills {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_skills .trx_addons_cv_resume_item_skill:after {
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_education .trx_addons_cv_resume_item_number {
	color: {$colors['alter_light']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_icon {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_icon:hover,
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_text a:hover {
	color: {$colors['text_hover']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_title > a:hover:after {
	border-color: {$colors['text_hover']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_title > a:after {
	border-top-color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_text a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_portfolio_item .trx_addons_cv_portfolio_item_title,
.trx_addons_cv_portfolio_item .trx_addons_cv_portfolio_item_title a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_testimonials_item .trx_addons_cv_testimonials_item_title,
.trx_addons_cv_testimonials_item .trx_addons_cv_testimonials_item_title a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_certifshahates_item .trx_addons_cv_certifshahates_item_title,
.trx_addons_cv_certifshahates_item .trx_addons_cv_certifshahates_item_title a {
	color: {$colors['alter_dark']};
}

/* Contact form */
.trx_addons_cv .trx_addons_contact_form .trx_addons_contact_form_title {
	color: {$colors['alter_dark']};
}
.trx_addons_cv .trx_addons_contact_form_field_title {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form .trx_addons_contact_form_field input[type="text"],
.trx_addons_contact_form .trx_addons_contact_form_field textarea {
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_text']};
}
.trx_addons_contact_form .trx_addons_contact_form_field input[type="text"]:focus,
.trx_addons_contact_form .trx_addons_contact_form_field textarea:focus {
	background-color: {$colors['alter_bg_hover']};
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_field button {
	background-color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
	color: {$colors['bg_color']};
}
.trx_addons_contact_form_field button:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_info_icon {
	color: {$colors['alter_light']};
}
.trx_addons_contact_form_info_area {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_info_item_phone .trx_addons_contact_form_info_data {
	color: {$colors['alter_dark']} !important;
}

/* Page About Me */
.trx_addons_cv_about_page .trx_addons_cv_single_title {
	color: {$colors['alter_dark']};
}


/* Additional attributes for Variations */
.trx_addons_attrib_item.trx_addons_attrib_button,
.trx_addons_attrib_item.trx_addons_attrib_image,
.trx_addons_attrib_item.trx_addons_attrib_color {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.trx_addons_attrib_item.trx_addons_attrib_button:hover,
.trx_addons_attrib_item.trx_addons_attrib_image:hover,
.trx_addons_attrib_item.trx_addons_attrib_color:hover {
	border-color: {$colors['alter_bd_hover']};
	background-color: {$colors['alter_bg_hover']};
}
.trx_addons_attrib_item.trx_addons_attrib_selected {
	border-color: {$colors['alter_link']} !important;
	background-color: {$colors['alter_bg_hover']};
}
.trx_addons_attrib_item.trx_addons_attrib_disabled span:before,
.trx_addons_attrib_item.trx_addons_attrib_disabled span:after {
	background-color: {$colors['alter_hover']};
}


/* Range slider */
.trx_addons_range_slider_label_min {
	color: {$colors['alter_text']};
}
.trx_addons_range_slider_label_max {
	color: {$colors['alter_text']};
}
div.ui-slider {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
}
div.ui-slider .ui-slider-handle {
	border-color: {$colors['alter_bd_hover']};
	background-color: {$colors['alter_bg_hover']};
}
div.ui-slider .ui-slider-range {
	background-color: {$colors['alter_bg_hover']};
}


EOT;

			/*+ Theme Styles */
            $css['colors'] .= <<<EOT
    
    /* TABLE OF CONTENTS:
    
    1. Typography
    2. Widgets
    3. Typography
    -------------------------------------------------------------- */
		    
		    
    
    /* 1. Typography
    --------------------------------------------------------------*/
            
    .trx_addons_tooltip {
        color: {$colors['text_dark']};
        border-color: {$colors['text_dark']};
    }
    .trx_addons_tooltip:before {
        color: {$colors['inverse_text']};
        background-color: {$colors['text_link']};
    }
    .trx_addons_tooltip:after {
        border-top-color: {$colors['text_link']};
    }
    
    
    .trx_addons_dropcap_style_1 {
        color: {$colors['inverse_text']};
        background-color: {$colors['text_link']};
    }
    .trx_addons_dropcap_style_2 {
        color: {$colors['text_dark']};
        background-color: transparent;
    }


    /* Tabs */
    .widget .trx_addons_tabs .trx_addons_tabs_titles li a {
        color: {$colors['inverse_text']};
        background-color: {$colors['text_hover']};
    }
    .widget .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active a,
    .widget .trx_addons_tabs .trx_addons_tabs_titles li a:hover {
        color: {$colors['inverse_text']};
        background-color: {$colors['text_link']};
    }
    html .wpb-js-composer .vc_tta.vc_tta-shape-rounded .vc_tta-tabs-container {
        border-color: {$colors['text_link']};
    }
    
    .widget_nav_menu ul li.current-menu-item > a {
        color: {$colors['text_link']};    
    }

EOT;
		}

		return $css;
	}
}
?>