<?php
function storebiz_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'storebiz_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'da3c3c',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'storebiz_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'storebiz_custom_header_setup' );

if ( ! function_exists( 'storebiz_header_style' ) ) :

function storebiz_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		else :
	?>
		h4.site-title,
		p.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
