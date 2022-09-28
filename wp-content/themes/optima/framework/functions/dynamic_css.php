/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_wp.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_settings-default.scss
---------------------------------------------------------------*/
.entry-thumbnail.format-quote .format-quote-content, .entry-thumbnail.format-link .format-content, .item--category, .la-blockquote.style-1, .la-blockquote.style-2, .testimonial-loop.loop-style-2 .item--excerpt, .testimonial-loop.loop-style-3 .item--excerpt, .testimonial-loop.loop-style-3 .testimonial-item .item--role,
.testimonial-3-nav .item--role, .portfolios-grid.loop-style-4 .entry-title,
.pf-masonry.pf-s-4 .entry-title, .vc_cta3-container .la-cta-01.vc_cta3 h4, .catalog-grid-2 .product-category .cat-information .cat-des, .highlight-font-family {
  font-family: <?php echo ( $highlight_font_family ) ?>;
}

.mega-menu .mm-popup-wide .inner > ul.sub-menu > li > a, .entry-thumbnail.format-quote .quote-author, .commentlist .comment-meta .comment-author, .portfolio-single-page .entry-tax-list, .la-blockquote.style-2 footer cite, .la-vc-btn.la-outline-btn .vc_btn3, .la-vc-btn.la-outline-btn2 .vc_btn3, .la-btn, .btn-view-all-works.vc_btn3-container.la-vc-btn .vc_btn3, .la-bigger-btn .la-btn,
.la-bigger-btn .vc_btn3, .custom-heading-with-dots .la-headings .subheading-tag, .hover-heading-box-home-1.wpb_column .la-headings .subheading-tag a, .hover-heading-box.wpb_column .la-headings .subheading-tag a, .team-member-loop.loop-style-1 .item--role,
.team-member-loop.loop-style-1 .item--title, .testimonial-loop .item--title, .testimonial-loop.loop-style-2 .item--role, .testimonial-loop.loop-style-6 .item--title,
.testimonial-loop.loop-style-6 .item--role, .testimonial-loop.loop-style-7 .item--title,
.testimonial-loop.loop-style-7 .item--role, .testimonial-loop.loop-style-8 .item--title,
.testimonial-loop.loop-style-8 .item--role, .showposts-loop .link-readmore, .portfolios-grid.loop-style-2 .entry-tax-list,
.pf-masonry.pf-s-2 .entry-tax-list, .portfolios-list .entry-tax-list, .portfolios-list .link-discover, .vc_progress_bar .vc_general.vc_single_bar .vc_label, .la-stats-counter.about-counter .icon-value, .la-pricing-table-wrap.style-4 .la-pricing-table .pricing-heading, .la-pricing-table-wrap.style-4 .la-pricing-table .price-box .price-value, .la-pricing-table-wrap.style-4 .la-pricing-table .pricing-action a, .heading-font-family {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_base_grid.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_base_el_class.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_reset.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_easyzoom.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_lightcase.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_slick.scss
---------------------------------------------------------------*/
/* Slider */
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_laicons.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_general.scss
---------------------------------------------------------------*/
body {
  font-family: <?php echo ( $body_font_family ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("text_color","#8a8a8a") ) ?>;
}

a:focus, a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

input, select, textarea {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

input:focus, select:focus, textarea:focus {
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.button,
button,
html input[type="button"],
input[type="reset"],
input[type="submit"],
.btn {
  background-color: #fff;
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.button:hover,
button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.btn:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
}

.button.btn-secondary,
button.btn-secondary,
html input[type="button"].btn-secondary,
input[type="reset"].btn-secondary,
input[type="submit"].btn-secondary,
.btn.btn-secondary {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
}

.button.btn-secondary:hover,
button.btn-secondary:hover,
html input[type="button"].btn-secondary:hover,
input[type="reset"].btn-secondary:hover,
input[type="submit"].btn-secondary:hover,
.btn.btn-secondary:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.button.btn-primary,
button.btn-primary,
html input[type="button"].btn-primary,
input[type="reset"].btn-primary,
input[type="submit"].btn-primary,
.btn.btn-primary {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.button.btn-primary:hover,
button.btn-primary:hover,
html input[type="button"].btn-primary:hover,
input[type="reset"].btn-primary:hover,
input[type="submit"].btn-primary:hover,
.btn.btn-primary:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
}

.button.alt {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
}

.button.alt:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .title-xlarge {
  font-family: <?php echo ( $heading_font_family ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

table th {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.star-rating {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.star-rating span {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-global-message .close-message:hover i,
#lastudio-reveal .close-button:hover i {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pagination ul .page-numbers {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.la-pagination ul .page-numbers.current {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-pagination ul .page-numbers:hover {
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.share-links a {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.search-form .search-button:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.slick-slider button.slick-arrow:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.slick-slider .slick-dots li:hover button,
.slick-slider .slick-dots .slick-active button {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.vertical-style ul li:hover a, .vertical-style ul li.active a {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.filter-style-1 ul li:hover a, .filter-style-1 ul li.active a,
.filter-style-default ul li:hover a,
.filter-style-default ul li.active a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.filter-style-2 ul li a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.filter-style-2 ul li:hover a, .filter-style-2 ul li.active a {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_wooecommerce.scss
---------------------------------------------------------------*/
.select2-dropdown-open.select2-drop-above .select2-choice,
.select2-dropdown-open.select2-drop-above .select2-choices,
.select2-drop.select2-drop-active,
.select2-container .select2-choice,
.select2-search,
.select2-input,
.input-text {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.stars [class*="star-"]:hover, .stars [class*="star-"].active {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.woocommerce-info {
  border-top-color: green;
}

.woocommerce-info:before {
  color: green;
}

.woocommerce-error {
  border-top-color: #2635c4;
}

.woocommerce-error:before {
  color: #2635c4;
}

.onsale,
.onsale-badge {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wc-toolbar .wc-view-toggle .active {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wc-toolbar .wc-ordering {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.wc-toolbar .wc-view-count ul {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.wc-toolbar .wc-view-count li.active {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wc-ordering ul {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.wc-ordering ul li:hover a, .wc-ordering ul li.active a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_widget.scss
---------------------------------------------------------------*/
a.rsswidget {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.product_list_widget del {
  color: <?php echo esc_attr( Optima()->settings->get("text_color","#8a8a8a") ) ?>;
}

.widget_shopping_cart_content .total {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.widget_price_filter .price_slider_amount .button:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.widget_price_filter .ui-slider .ui-slider-range {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.widget_layered_nav_filters ul li {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.widget_layered_nav_filters ul li .amount {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.calendar_wrap caption {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.widget-border.widget {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/header/_header.scss
---------------------------------------------------------------*/
.top-area {
  background-color: <?php echo esc_attr( Optima()->settings->get("header_top_background_color","rgba(0,0,0,0)") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("header_top_text_color","rgba(255,255,255,0.2)") ) ?>;
}

.header-toggle-cart .header_shopping_cart .buttons .wc-forward:not(.checkout) {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.header-toggle-cart .header_shopping_cart .buttons .wc-forward:not(.checkout):hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.header-toggle-cart .header_shopping_cart .buttons .checkout {
  background: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.header-toggle-cart .header_shopping_cart .buttons .checkout:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/header/_header-aside.scss
---------------------------------------------------------------*/
.header-v8 .site-header .header-toggle-menu a.btn-aside-toggle {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.header-v8 .site-header .header-toggle-menu a.btn-aside-toggle:hover {
  color: #fff !important;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?> !important;
}

#header_aside .btn-aside-toggle:hover {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.header-v9 #masthead_aside .header-aside-nav .mega-menu > li {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/header/_header-sticky.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/header/_header-transparency.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/header/_header-mobile.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_mega_menu.scss
---------------------------------------------------------------*/
.mega-menu .tip.hot,
.menu .tip.hot {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.mega-menu .tip.hot .tip-arrow:before,
.menu .tip.hot .tip-arrow:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.mega-menu .popup li > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_color","#696c75") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_bg","rgba(0,0,0,0)") ) ?>;
}

.mega-menu .popup li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

.mega-menu .popup li.active > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

.mega-menu .popup > .inner,
.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li ul.sub-menu,
.mega-menu .mm-popup-narrow ul ul {
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_bg","#fff") ) ?>;
}

.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li li:hover > a,
.mega-menu .mm-popup-narrow li.menu-item:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li li.active > a,
.mega-menu .mm-popup-narrow li.menu-item.active > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

.mega-menu .mm-popup-wide .inner > ul.sub-menu > li > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_wide_dropdown_heading_color","#252634") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/vendors/_dl_menu.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_main.scss
---------------------------------------------------------------*/
.section-page-header {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_sidebar.scss
---------------------------------------------------------------*/
.sidebar-inner .product-title,
.mini_cart_item a:not(.remove) {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/footer/_footer.scss
---------------------------------------------------------------*/
.site-footer {
  color: <?php echo esc_attr( Optima()->settings->get("footer_text_color","#8a8a8a") ) ?>;
}

.site-footer a {
  color: <?php echo esc_attr( Optima()->settings->get("footer_link_color","#8a8a8a") ) ?>;
}

.site-footer a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("footer_link_hover_color","#526df9") ) ?>;
}

.site-footer .widget .widget-title {
  color: <?php echo esc_attr( Optima()->settings->get("footer_heading_color","#fff") ) ?>;
}

.footer-bottom {
  background-color: <?php echo esc_attr( Optima()->settings->get("footer_copyright_background_color","#8a8a8a") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("footer_copyright_text_color","#8a8a8a") ) ?>;
}

.footer-bottom a {
  color: <?php echo esc_attr( Optima()->settings->get("footer_copyright_link_color","#8a8a8a") ) ?>;
}

.footer-bottom a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("footer_copyright_link_hover_color","#8a8a8a") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_category_post.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_search_post.scss
---------------------------------------------------------------*/
.site-header .header-toggle-search .header-search-form,
#masthead_aside .header-toggle-search .header-search-form {
  background-color: #fff;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_single_post.scss
---------------------------------------------------------------*/
.tags-list a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.item--category {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.item--category a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.entry-meta a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.btn-readmore {
  font-family: <?php echo ( $heading_font_family ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.btn-readmore i {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.entry-meta-footer {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.entry-meta-footer .tags-list a {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.entry-meta-footer .tags-list i {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.author-info {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.post-navigation .post-title {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.la-related-posts.style-3 a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_page.scss
---------------------------------------------------------------*/
/**
For demo
*/
.home-09-big-banner .subheading-tag span:after {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.home-09-custom-heading:after {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-banner-box.home-09-banner-type-2 .banner--link-overlay:after {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-banner-box.home-09-banner-type-2 .banner--link-overlay:before {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.ribbon-callnow {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.ribbon-callnow:after {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.ribbon-callnow .callnow-label {
  font-family: <?php echo ( $highlight_font_family ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_comment.scss
---------------------------------------------------------------*/
.commentlist .comment-meta .comment-author {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.commentlist .comment-meta .comment-reply-link {
  float: right;
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.commentlist .comment-meta .comment-reply-link:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.commentlist .comment .comment-text {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.wc-tab-content .commentlist .meta strong {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.comment_container + .comment-respond .comment-reply-title a {
  font-family: <?php echo ( $body_font_family ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_portfolio.scss
---------------------------------------------------------------*/
.portfolio-single-page .entry-tax-list {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.portfolio-single-page .portfolio-meta-data .meta-item [class*="optima-icon"] {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.portfolio-single-page.style-3 .portfolio-meta-datawrap .portfolio-meta-data .meta-item {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.portfolio-single-page.style-3 .portfolio-meta-datawrap .portfolio-meta-data .meta-info > span {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.portfolio-single-page.style-4 .portfolio-social-links label {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_overrride.scss
---------------------------------------------------------------*/
.la-blockquote.style-1 {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-blockquote.style-1:before {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-blockquote.style-2 {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.vc_btn3-style-gradient-custom.vc_btn3.vc_btn3-size-md {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-white {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  background-color: #fff;
}

.la-btn.la-btn-style-flat.la-btn-color-white:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-primary {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-primary:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-black {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-black:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-flat.la-btn-color-gray {
  color: #fff;
  background-color: #9d9d9d;
  border-color: #9d9d9d;
}

.la-btn.la-btn-style-flat.la-btn-color-gray:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-outline.la-btn-color-primary {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-outline.la-btn-color-white {
  color: #fff;
  border-color: #fff;
  background-color: transparent;
}

.la-btn.la-btn-style-outline.la-btn-color-black {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.la-btn.la-btn-style-outline.la-btn-color-black:hover {
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  color: #fff;
}

.la-btn.la-btn-style-outline.la-btn-color-gray {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  background-color: transparent;
  border-color: #9d9d9d;
}

.la-btn.la-btn-style-outline.la-btn-color-gray:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-btn.la-btn-style-outline:hover {
  color: #fff;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.social-media-link.style-round a:hover, .social-media-link.style-square a:hover, .social-media-link.style-circle a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.social-media-link.style-outline a {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.social-media-link.style-outline a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

body .vc_toggle.vc_toggle_default {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

body .vc_toggle.vc_toggle_default.vc_toggle_active .vc_toggle_title h4 {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_heading.scss
---------------------------------------------------------------*/
.la-headings .la-line {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.icon-heading.heading-with-line:after {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.custom-heading-with-dots .la-headings:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-heading-box-home-1.wpb_column:hover:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-heading-box.wpb_column:hover:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_team_member.scss
---------------------------------------------------------------*/
.team-member-loop.loop-style-1 .item--role,
.team-member-loop.loop-style-1 .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.team-member-loop.loop-style-4 .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.team-member-loop.loop-style-5 .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.team-member-loop.loop-style-5 .item--role {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.team-member-loop.loop-style-6 .entry-excerpt {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.team-member-loop.loop-style-7 .item--info {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.team-member-loop.loop-style-7 .item--info .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.team-member-loop.loop-style-7 .item--info .item--role {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.team-member-loop.loop-style-7 .member-social {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.team-member-loop.loop-style-9 .loop-item:hover .item--image img,
.team-member-loop.loop-style-9 .loop-item.slick-current .item--image img {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.team-member-loop.loop-style-10 .item--info {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.la-team-member .member-info-09 .item--role,
.la-team-member .member-info-09 .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.la-team-member .member-info-09 .vc_progress_bar .vc_general.vc_single_bar .vc_bar {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_banner.scss
---------------------------------------------------------------*/
.banner-type-hover_effect .banner--link-overlay:after {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.column-banner-spa2.vc_column_container > .vc_column-inner > .wpb_wrapper {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.column-banner-spa2.vc_column_container > .vc_column-inner > .wpb_wrapper .la-headings .subheading-tag a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_tabs.scss
---------------------------------------------------------------*/
.wpb-js-composer .vc_tta[class*="tabs-la-"] .vc_tta-tabs-list li.vc_active {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wpb-js-composer .vc_tta.tabs-la-2 .vc_tta-tabs-list li:hover > a, .wpb-js-composer .vc_tta.tabs-la-2 .vc_tta-tabs-list li.vc_active > a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.wpb-js-composer .vc_tta.tabs-la-3 .vc_tta-tabs-list li a {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.wpb-js-composer .vc_tta.tabs-la-3 .vc_tta-tabs-list li:hover a, .wpb-js-composer .vc_tta.tabs-la-3 .vc_tta-tabs-list li.vc_active a {
  border-color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

/**
  VERTICAL TOUR
*/
.wpb-js-composer .vc_tta-container .vc_tta[class*="tour-"] .vc_tta-tabs-list li:hover, .wpb-js-composer .vc_tta-container .vc_tta[class*="tour-"] .vc_tta-tabs-list li.vc_active {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wpb-js-composer .vc_tta-container .vc_tta[class*="tour-"].tour-la-business .vc_tta-panel.vc_active .vc_tta-panel-title {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_testimonial.scss
---------------------------------------------------------------*/
.testimonial-loop .item--title {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.testimonial-loop.loop-style-1 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.testimonial-loop.loop-style-2 .item--excerpt:before {
  border-color-top: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-3 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.testimonial-loop.loop-style-3 .item--excerpt:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-4 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.testimonial-loop.loop-style-5 .item-inner {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.testimonial-loop.loop-style-5 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.testimonial-loop.loop-style-6 .item--excerpt:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-7 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.testimonial-loop.loop-style-7 .item--title,
.testimonial-loop.loop-style-7 .item--role {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-10 .item--excerpt {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.testimonial-loop.loop-style-11 .item--info:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-11 .item--title-role:before {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.testimonial-loop.loop-style-3 .testimonial-item .item--role,
.testimonial-3-nav .item--role {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_icon_box.scss
---------------------------------------------------------------*/
.la-sc-icon-boxes .box-icon-style-simple span {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-sc-icon-boxes .box-icon-style-square span,
.la-sc-icon-boxes .box-icon-style-circle span,
.la-sc-icon-boxes .box-icon-style-round span {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-box-icon .la-sc-icon-boxes:hover {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-box-icon .la-sc-icon-boxes:hover a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.hover-box-icon .la-sc-icon-boxes:hover a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-box-icon2 .la-sc-icon-boxes:hover {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.hover-box-icon2 .la-sc-icon-boxes:hover a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.hover-box-icon2 .la-sc-icon-boxes:hover a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-custom-icon-box:hover .icon-box {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-custom-icon-box .icon-box {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.btn.btn-icon-readmore:hover {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.iconbox-with-link-readmore .box-description a {
  font-family: <?php echo ( $heading_font_family ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
  border-top: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_showposts.scss
---------------------------------------------------------------*/
.showposts-loop .link-readmore {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.showposts-loop .link-readmore:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.showposts-loop.blog-grid_1.lg-grid-1-items .item-inner {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.showposts-loop.blog-grid_4 .item-info {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.showposts-loop.blog-grid_4 .entry-meta-footer .m-sharing-box {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.showposts-loop.blog-grid_4 .item-inner:hover .entry-meta-footer .m-sharing-box {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.showposts-loop.blog-grid_4 .item-inner:hover .item-info {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.showposts-loop.blog-special_1 .link-readmore {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.showposts-loop.blog-special_1 .link-readmore:hover {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.showposts-list .loop-item + .loop-item {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_maps.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_contact_form_7.scss
---------------------------------------------------------------*/
.contact-form-style-default .wpcf7-form-control-wrap .wpcf7-form-control {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.contact-form-style-01 label {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.contact-form-style-01 .wpcf7-form-control-wrap .wpcf7-textarea,
.contact-form-style-01 .wpcf7-form-control-wrap .wpcf7-text {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.contact-form-style-03 .wpcf7-form-control-wrap .wpcf7-select:focus,
.contact-form-style-03 .wpcf7-form-control-wrap .wpcf7-text:focus,
.contact-form-style-03 .wpcf7-form-control-wrap .wpcf7-textarea:focus {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.contact-form-style-03 .wpcf7-submit:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.newsletter-form1 {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-email {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

.subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-email:focus {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-submit-button {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-submit-button:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.subscribe-style-02 .yikes-easy-mc-form .yikes-easy-mc-submit-button:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_show_portfolios.scss
---------------------------------------------------------------*/
.portfolios-grid.loop-style-3 .entry-title a,
.pf-masonry.pf-s-3 .entry-title a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.portfolios-grid.loop-style-4 .item-inner:hover .item--link-overlay:before,
.pf-masonry.pf-s-4 .item-inner:hover .item--link-overlay:before {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.portfolios-grid.loop-style-6 .item-inner:hover .item--link-overlay,
.pf-masonry.pf-s-6 .item-inner:hover .item--link-overlay {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.portfolios-list .entry-tax-list {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.portfolios-list .link-discover {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.portfolios-list .link-discover:hover {
  color: #fff;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.portfolios-list.loop-style-3 .item-inner:hover .item--info {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_cta.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_countdown.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_progress_bar.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_stats_counter.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_accordion.scss
---------------------------------------------------------------*/
.wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-1 .vc_tta-panel-title {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-2 .vc_tta-panel.vc_active .vc_tta-panel-title {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-3 .vc_tta-panel {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-3 .vc_tta-panel.vc_active {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_pricing_table.scss
---------------------------------------------------------------*/
.la-pricing-table .wrap-icon .icon-inner {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-1 .pricing-heading {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-1 .package-featured li {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.la-pricing-table-wrap.style-1 .pricing-action a {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-1 .pricing-action a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.la-pricing-table-wrap.style-1.is_box_featured .pricing-action a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
}

.la-pricing-table-wrap.style-2 .la-pricing-table {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.la-pricing-table-wrap.style-2 .la-pricing-table .pricing-heading {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-2 .la-pricing-table .wrap-icon .icon-inner {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-2 .la-pricing-table .pricing-action {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-3 .la-pricing-table {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.la-pricing-table-wrap.style-3 .la-pricing-table .pricing-heading-wrap {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-3 .la-pricing-table .pricing-heading-wrap:after {
  content: '';
  border-top-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-4 .la-pricing-table .pricing-heading {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-pricing-table-wrap.style-4 .la-pricing-table:hover .pricing-action a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/shortcodes/_timeline.scss
---------------------------------------------------------------*/
.la-timeline-wrap.style-1 .timeline-line {
  border-left-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.la-timeline-wrap.style-1 .timeline-block .timeline-dot {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-timeline-wrap.style-1 .timeline-block .timeline-subtitle {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-timeline-wrap.style-2 .timeline-title:after {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_category_product.scss
---------------------------------------------------------------*/
.catalog-grid-1 .product-category .cat-img span {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.catalog-grid-1 .product-category .cat-img span:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.catalog-grid-1 .product-category:hover h3 {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.catalog-grid-2 .product-category .cat-information > span {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.product-item .button:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product-item .button {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.product-item .button:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product-item .price {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-default .product--thumbnail .product--action .wrap-addto a,
.products-grid.products-grid-1 .product--thumbnail .product--action .wrap-addto a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-default .product--thumbnail .product--action .wrap-addto a:hover,
.products-grid.products-grid-1 .product--thumbnail .product--action .wrap-addto a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-default .product--thumbnail .product--action > a,
.products-grid.products-grid-1 .product--thumbnail .product--action > a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-1 .item--image-holder {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.products-grid.products-grid-1 .product--thumbnail .product--action > a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-1 .price {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-2 .product--thumbnail .product--action .wrap-addto a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-2 .product--thumbnail .product--action .wrap-addto a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-2 .product--info .product--action > a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-2 .product--info .product--action > a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-2 .item-inner:hover .product--info .product--action > a {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-3 .item--image-holder .quickview:hover {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-grid.products-grid-3 .product--thumbnail .product--action a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-grid.products-grid-3 .product--thumbnail .product--action a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-list .product-item .product--info .product--action .wrap-addto a {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.products-list .product-item .product--info .product--action .wrap-addto a:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-list .product-item .product--info .product--action .wrap-addto a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  color: #fff;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-list .product-item .product--info .product--action > a {
  background-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-list .product-item .product--info .product--action > a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

[class*="products-list-countdown"] .product-item .elm-countdown .countdown-section {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?>;
}

[class*="products-list-countdown"] .product-item .elm-countdown .countdown-amount {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.products-list-countdown-3 .product-item .price {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.products-list-countdown-4 .product-item .price {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_search_product.scss
---------------------------------------------------------------*/
/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_single_product.scss
---------------------------------------------------------------*/
.product--thumbnails .slick-current:before {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product--thumbnails .slick-arrow:hover {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product--summary .price {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.product--summary .product_meta {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.product--summary .product_meta a {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product--summary .product_meta .sku {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?>;
}

.product--summary form.cart button {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.product--summary .button.add_compare,
.product--summary .button.add_wishlist {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.product--summary .button.add_compare:hover,
.product--summary .button.add_wishlist:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.product--summary .button.add_compare:hover:before,
.product--summary .button.add_wishlist:hover:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.wc-tabs li:hover > a,
.wc-tabs li.active > a {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-p-single-1 .product-main-image .p---large:not(.no-thumbgallery) .slick-vertical .slick-current img {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_cart.scss
---------------------------------------------------------------*/
.shop_table.cart {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

td.actions .coupon {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.cart-collaterals .shop_table .amount {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.section-checkout-step li:before {
  color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.section-checkout-step li:after {
  border-top-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.section-checkout-step .step-num {
  background: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

.section-checkout-step .step-name {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

body.woocommerce-cart .section-checkout-step .step-1 .step-num {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

body.woocommerce-checkout:not(.woocommerce-order-received) .section-checkout-step .step-2 .step-num {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

body.woocommerce-order-received .section-checkout-step .step-3 .step-num {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.woocommerce > p.cart-empty:before {
  color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_checkout.scss
---------------------------------------------------------------*/
.woocommerce #order_review {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.woocommerce #order_review_heading:after,
.woocommerce .woocommerce-billing-fields h3:after {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/woocommerce/_my_account.scss
---------------------------------------------------------------*/
.woocommerce-MyAccount-navigation li.is-active a {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.registration-form .button {
  background: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/site/_extra_class.scss
---------------------------------------------------------------*/
.la-loader.spinner1 {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-loader.spinner2 {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-loader.spinner3 .bounce1,
.la-loader.spinner3 .bounce2,
.la-loader.spinner3 .bounce3 {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.la-loader.spinner4 .dot1,
.la-loader.spinner4 .dot2 {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.item--overlay {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.three-text-color,
.text-color-highlight,
.highlight-text-color {
  color: <?php echo esc_attr( Optima()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

.text-color-heading {
  color: <?php echo esc_attr( Optima()->settings->get("heading_color","#343538") ) ?> !important;
}

.text-color-primary {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?> !important;
}

.text-color-white {
  color: #fff !important;
}

.border-color-primary {
  border-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?> !important;
}

.border-color-secondary {
  border-color: <?php echo esc_attr( Optima()->settings->get("secondary_color","#232324") ) ?> !important;
}

.socials-color a {
  background-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.socials-color a:hover {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.first-letter-primary::first-letter {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/fullpage/_fullpage.scss
---------------------------------------------------------------*/
.searchform-fly-overlay {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  opacity: 0;
  visibility: hidden;
  background-color: rgba(0, 0, 0, 0.94);
  text-align: center;
  transition: all ease-in-out .25s;
  z-index: 999;
}

.searchform-fly-overlay:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -.25em;
}

.searchform-fly-overlay .searchform-fly {
  display: inline-block;
  max-width: 90%;
  vertical-align: middle;
  text-align: center;
  font-size: 18px;
  -webkit-transform: scale(0.9);
  -ms-transform: scale(0.9);
  transform: scale(0.9);
  ms-transform: scale(0.9);
  opacity: 0;
  visibility: hidden;
  transition: all ease-in-out .3s;
}

.searchform-fly-overlay .search-field {
  width: 800px;
  background-color: transparent;
  box-shadow: 0 3px 0 0 rgba(255, 255, 255, 0.1);
  border: 0;
  text-align: center;
  font-size: 35px;
  padding: 20px;
  color: rgba(255, 255, 255, 0.8);
  transition: all .3s ease-out;
  font-weight: 300;
  max-width: 100%;
}

.searchform-fly-overlay .search-button {
  color: rgba(255, 255, 255, 0.8);
  font-size: 30px;
  height: 30px;
}

.searchform-fly-overlay p {
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.8);
  font-weight: 300;
}

.searchform-fly-overlay .btn-close-search {
  font-size: 40px;
  display: block;
  position: absolute;
  top: 20%;
  right: 20%;
  line-height: 40px;
  height: 40px;
}

.searchform-fly-overlay .btn-close-search:hover {
  -webkit-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg);
  ms-transform: rotate(90deg);
}

.open-search-form .searchform-fly-overlay {
  visibility: visible;
  opacity: 1;
}

.open-search-form .searchform-fly {
  visibility: visible;
  opacity: 1;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  ms-transform: scale(1);
}

@media (max-width: 768px) {
  .searchform-fly-overlay .btn-close-search {
    right: 10%;
  }
  .searchform-fly-overlay .searchform-fly {
    font-size: 16px;
  }
  .searchform-fly-overlay .search-field {
    font-size: 30px;
  }
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_colors.scss
---------------------------------------------------------------*/
.site-main-nav .main-menu > li > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_lv_1_color","#303744") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.site-main-nav .main-menu > li.active > a,
.site-main-nav .main-menu > li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("mm_lv_1_hover_color","#303744") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-main-nav .main-menu > li.active:before,
.site-main-nav .main-menu > li:hover:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header [class*="header-toggle-"] > a {
  color: <?php echo esc_attr( Optima()->settings->get("header_link_color","#343538") ) ?>;
}

.site-header [class*="header-toggle-"]:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("header_link_hover_color","#526df9") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) [class*="header-toggle-"] > a {
  color: <?php echo esc_attr( Optima()->settings->get("transparency_header_link_color","#fff") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) [class*="header-toggle-"]:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("transparency_header_link_hover_color","#526df9") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li > a {
  color: <?php echo esc_attr( Optima()->settings->get("transparency_mm_lv_1_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("transparency_mm_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li.active > a,
.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("transparency_mm_lv_1_hover_color","rgba(0,0,0,0)") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("transparency_mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li.active:before,
.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li:hover:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("transparency_mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.header-v1 .site-main-nav .main-menu > li.active > a > .mm-text:before,
.header-v1 .site-main-nav .main-menu > li:hover > a > .mm-text:before {
  content: "";
  border-top: 2px solid;
  position: absolute;
  left: 15px;
  right: 15px;
  top: 2px;
}

.header-v3 .site-header .mega-menu > li > a {
  background-color: transparent;
}

.header-v5 .site-header .mega-menu > li > a:after {
  content: "";
  border-left: 2px solid;
  position: absolute;
  left: -10px;
  height: 12px;
  top: 14px;
  transform: rotate(-15deg);
  -webkit-transform: rotate(-15deg);
  -ms-transform: rotate(-15deg);
}

.header-v6 .top-area {
  background-color: <?php echo esc_attr( Optima()->settings->get("header_top_background_color","rgba(0,0,0,0)") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("header_top_text_color","rgba(255,255,255,0.2)") ) ?>;
}

.header-v6 .top-area .menu a {
  color: <?php echo esc_attr( Optima()->settings->get("header_top_link_color","#fff") ) ?>;
}

.header-v6 .top-area .menu a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("header_top_link_hover_color","#526df9") ) ?>;
}

.header-v7 .top-area {
  background-color: <?php echo esc_attr( Optima()->settings->get("header_top_background_color","rgba(0,0,0,0)") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("header_top_text_color","rgba(255,255,255,0.2)") ) ?>;
}

.header-v7 .top-area .la-contact-item:before {
  color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.header-v7 .top-area .top-area-right {
  color: <?php echo esc_attr( Optima()->settings->get("header_top_link_color","#fff") ) ?>;
}

.header-v7 .top-area a {
  color: <?php echo esc_attr( Optima()->settings->get("header_top_link_color","#fff") ) ?>;
}

.header-v7 .top-area a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("header_top_link_hover_color","#526df9") ) ?>;
}

.header-v7 .top-area:not(.has-middle-block) {
  position: static;
}

.header-v7 .site-header .mega-menu > li.active:before,
.header-v7 .site-header .mega-menu > li:hover:before {
  background-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.header-v9 #masthead_aside {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_text_color","#8a8a8a") ) ?>;
}

.header-v9 #masthead_aside .header_shopping_cart {
  text-align: left;
}

.header-v9 #masthead_aside a {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_color","#232324") ) ?>;
}

.header-v9 #masthead_aside a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_hover_color","#526df9") ) ?>;
}

.header-v9 #masthead_aside .header-aside-nav .mega-menu > li > a {
  font-size: 14px;
}

.header-v9 #masthead_aside .header-aside-nav .mega-menu > li > a:after {
  content: "";
  border: 3px solid <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
  position: absolute;
  left: 0;
  top: 50%;
  margin-top: -4px;
}

.header-v9 #masthead_aside .header-widget-bottom .widget-title {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_heading_color","#232324") ) ?>;
}

.header-v10 #masthead_aside {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_text_color","#8a8a8a") ) ?>;
}

.header-v10 #masthead_aside .header_shopping_cart {
  text-align: left;
}

.header-v10 #masthead_aside a {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_color","#232324") ) ?>;
}

.header-v10 #masthead_aside a:hover {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_hover_color","#526df9") ) ?>;
}

.header-v10 #masthead_aside .header-aside-nav .mega-menu > li > a {
  font-size: 14px;
}

.header-v10 #masthead_aside .header-aside-nav .mega-menu > li > a span {
  border-bottom: 2px solid transparent;
}

.header-v10 #masthead_aside .header-aside-nav .mega-menu > li:hover span,
.header-v10 #masthead_aside .header-aside-nav .mega-menu > li.active > a span {
  border-bottom-color: <?php echo esc_attr( Optima()->settings->get("primary_color","#526df9") ) ?>;
}

.header-v10 #masthead_aside .header-widget-bottom .widget-title {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_heading_color","#232324") ) ?>;
}

.site-header-mobile .site-header-inner {
  background-color: <?php echo esc_attr( Optima()->settings->get("header_mb_background","#fff") ) ?>;
}

.site-header-mobile [class*="header-toggle-"] > a {
  color: <?php echo esc_attr( Optima()->settings->get("header_mb_text_color","#232324") ) ?>;
}

.site-header-mobile .mobile-menu-wrap {
  background-color: <?php echo esc_attr( Optima()->settings->get("mb_background","#fff") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menuwrapper ul {
  background: <?php echo esc_attr( Optima()->settings->get("mb_background","#fff") ) ?>;
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menuwrapper li {
  border-color: <?php echo esc_attr( Optima()->settings->get("border_color","rgba(169,174,189,0.30)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu > li > a {
  color: <?php echo esc_attr( Optima()->settings->get("mb_lv_1_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mb_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu > li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("mb_lv_1_hover_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mb_lv_1_hover_bg_color","#2635c4") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu ul > li > a {
  color: <?php echo esc_attr( Optima()->settings->get("mb_lv_2_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mb_lv_2_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu ul > li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("mb_lv_2_hover_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Optima()->settings->get("mb_lv_2_hover_bg_color","#2635c4") ) ?>;
}

#header_aside {
  background-color: <?php echo esc_attr( Optima()->settings->get("offcanvas_background","#fff") ) ?>;
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_text_color","#8a8a8a") ) ?>;
}

#header_aside h1, #header_aside .h1, #header_aside h2, #header_aside .h2, #header_aside h3, #header_aside .h3, #header_aside h4, #header_aside .h4, #header_aside h5, #header_aside .h5, #header_aside h6, #header_aside .h6, #header_aside .title-xlarge {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_heading_color","#232324") ) ?>;
}

#header_aside li a {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_color","#232324") ) ?>;
}

#header_aside li:hover > a {
  color: <?php echo esc_attr( Optima()->settings->get("offcanvas_link_hover_color","#526df9") ) ?>;
}

/*--------------------------------------------------------------
	 @Package: Optima SASS
	 @File: scss/_responsive.scss
---------------------------------------------------------------*/
