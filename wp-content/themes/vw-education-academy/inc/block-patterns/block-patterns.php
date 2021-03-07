<?php
/**
 * VW Education Academy: Block Patterns
 *
 * @package VW Education Academy
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-education-academy',
		array( 'label' => __( 'VW Education Academy', 'vw-education-academy' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-education-academy/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-education-academy' ),
			'categories' => array( 'vw-education-academy' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":8227,\"align\":\"full\",\"className\":\"banner-box\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim banner-box\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\",\"className\":\"banner-middle-content\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center banner-middle-content\" style=\"flex-basis:50%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":45}}} -->\n<h1 class=\"has-text-align-center\" style=\"font-size:45px\">The Standard Lorem Ipsum Passage</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-align-center text-center\" style=\"font-size:15px\">&nbsp;Lorem Ipsum has been the industrys standard. &nbsp;Lorem Ipsum has been the industrys standard. &nbsp;Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":3,\"style\":{\"color\":{\"background\":\"#ffbc00\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background\" style=\"border-radius:3px;background-color:#ffbc00\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-education-academy/about-section',
		array(
			'title'      => __( 'About Section', 'vw-education-academy' ),
			'categories' => array( 'vw-education-academy' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"full\",\"className\":\"about-section m-0\"} -->\n<div class=\"wp-block-cover alignfull has-white-background-color has-background-dim about-section m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"left\",\"className\":\"mb-4\",\"style\":{\"color\":{\"text\":\"#111111\"},\"typography\":{\"fontSize\":30}}} -->\n<h2 class=\"has-text-align-left mb-4 has-text-color\" style=\"color:#111111;font-size:30px\">ACADEMIC ABOUT</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"className\":\"mb-3\",\"style\":{\"color\":{\"text\":\"#111111\"},\"typography\":{\"fontSize\":25}}} -->\n<h3 class=\"has-text-align-left mb-3 has-text-color\" style=\"color:#111111;font-size:25px\">LOREM IPSUM DOLOR SIT CONSECTETUR</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"m-0\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#858585\"}}} -->\n<p class=\"m-0 has-text-color has-normal-font-size\" style=\"color:#858585\">Lorem Ipsum has been the industrys standard. &nbsp;Lorem Ipsum has been the industrys standard. &nbsp;Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"left\",\"className\":\"pl-0 pt-3\"} -->\n<div class=\"wp-block-buttons alignleft pl-0 pt-3\"><!-- wp:button {\"borderRadius\":3,\"style\":{\"color\":{\"text\":\"#111111\"}},\"backgroundColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-background-color has-text-color has-background\" style=\"border-radius:3px;color:#111111\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":8293,\"width\":500,\"height\":286,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about-us.png\" alt=\"\" class=\"wp-image-8293\" width=\"500\" height=\"286\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
		)
	);
}