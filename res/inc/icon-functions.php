<?php
/*
FUNCTIONS TAKEN FROM WORDPRESS' TWENTY SEVENTEEN THEME FILE
*/
/**
 * Add SVG definitions to the footer.
 */
function include_svg_icons() {
  // Define SVG sprite file.
  $svg_icons = get_parent_theme_file_path( '/res/images/svg-icons.svg' );

  // If it exists, include it.
  if ( file_exists( $svg_icons ) ) {
    require_once( $svg_icons );
  }
}
add_action( 'wp_footer', 'include_svg_icons', 9999 );

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function get_svg( $args = array() ) {
  // Make sure $args are an array.
  if ( empty( $args ) ) {
    return __( 'Please define default parameters in the form of an array.', 'march' );
  }

  // Define an icon.
  if ( false === array_key_exists( 'icon', $args ) ) {
    return __( 'Please define an SVG icon filename.', 'march' );
  }

  // Set defaults.
  $defaults = array(
    'icon'        => '',
    'title'       => '',
    'desc'        => '',
    'fallback'    => false,
  );

  // Parse args.
  $args = wp_parse_args( $args, $defaults );

  // Set aria hidden.
  $aria_hidden = ' aria-hidden="true"';

  // Set ARIA.
  $aria_labelledby = '';

  if ( $args['title'] ) {
    $aria_hidden     = '';
    $unique_id       = uniqid();
    $aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

    if ( $args['desc'] ) {
      $aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
    }
  }

  // Begin SVG markup.
  $svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

  // Display the title.
  if ( $args['title'] ) {
    $svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

    // Display the desc only if the title is already set.
    if ( $args['desc'] ) {
      $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
    }
  }

  /*
   * Display the icon.
   */
  $svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

  // Add some markup to use as a fallback for browsers that do not support SVGs.
  if ( $args['fallback'] ) {
    $svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
  }

  $svg .= '</svg>';

  return $svg;
}


?>
