<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

function enqueue_leaflet_scripts() {
    wp_enqueue_style('leaflet-css', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css');
    wp_enqueue_script('leaflet-js', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet-src.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_leaflet_scripts');


function display_library_map() {
    ob_start(); ?>
    <div id="library-map" class="w-full z-0" style="height: 640px !important"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
			var map = L.map("library-map").setView([55.1694, 23.8813], 7);
            var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
	maxZoom: 20
            });
            CartoDB_DarkMatter.addTo(map);

			var libraryIcon = L.icon({
                iconUrl: '<?php echo get_template_directory_uri(); ?>/resources/images/pin_leaflet.png', // Path to your custom pin
                iconSize: [24, 28], // Size of the icon
                iconAnchor: [12, 28], // Anchor point (center-bottom)
                popupAnchor: [0, -28] // Adjusts popup position
            });

            var libraries = [
                <?php
                $args = array(
                    'post_type' => 'bibliotekos',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);
                while ($query->have_posts()) {
                    $query->the_post();
                    $lat = get_field('latitude');
                    $lng = get_field('longitude');
                    $name = get_the_title();
                    $website = get_field('website');

                    echo "{ lat: $lat, lng: $lng, name: '" . esc_js($name) . "', website: '" . esc_url($website) . "' },";
                }
                wp_reset_postdata();
                ?>
            ];

            libraries.forEach(function(library) {
                var marker = L.marker([library.lat, library.lng], { icon: libraryIcon }).addTo(map);
                marker.bindPopup("<b>" + library.name + "</b><br><a href='" + library.website + "' target='_blank'>Aplankyti puslapį</a>");
            });
        });
    </script>
    <?php return ob_get_clean();
}
add_shortcode('library_map', 'display_library_map');

function enqueue_gsap_scripts() {
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), null, true);
    wp_enqueue_script('custom-header', get_template_directory_uri() . '/js/header.js', array('gsap', 'gsap-scrolltrigger'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_gsap_scripts');

function enqueue_swiper_scripts() {
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_scripts');


