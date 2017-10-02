<?php
/**
 * ff_us functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ff_us
 */

if ( ! function_exists( 'ff_us_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ff_us_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ff_us, use a find and replace
		 * to change 'ff_us' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ff_us', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ff_us' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ff_us_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ff_us_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ff_us_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ff_us_content_width', 640 );
}
add_action( 'after_setup_theme', 'ff_us_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ff_us_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ff_us' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ff_us' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ff_us_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ff_us_scripts() {
	wp_enqueue_style( 'ff_us-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ff_us-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ff_us-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ff_us_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '<hr></h1>',
	));

require_once('wp-bootstrap-navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'freitext' ),
) );



class Einsatz_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'einsatz_widget', // Base ID
		'Einsatz Widget', // Name
		array('description' => __( 'Zeigt die letzten Einsaetze an'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
	$instance['category'] = strip_tags($new_instance['category']);
	return $instance;
}

	function form($instance) {
		if( $instance) {
			$title = esc_attr($instance['title']);
			$numberOfListings = esc_attr($instance['numberOfListings']);
			$category = esc_attr($instance['category']);
		} else {
			$title = '';
			$numberOfListings = '';
			$category = '';
		}
		?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'einsatz_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Kategorien:', 'einsatz_widget'); ?></label>
			<select id="<?php echo $this->get_field_id('category'); ?>"  name="<?php echo $this->get_field_name('category'); ?>">
				<?php
				$categories = get_categories();
				 ?>
				 <?php foreach($categories as $cat){
					 $cat_name = $cat->name;
					 $catid = $cat->cat_ID;?>
 				<option <?php echo $catid == $category ? 'selected="selected"' : '';?> value="<?php echo $catid;?>"><?php echo $cat_name; ?></option>
			<?php }?>
			</select>
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Anzahl der Einträge:', 'einsatz_widget'); ?></label>
			<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
			</p>
		<?php
		}

	function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfListings = $instance['numberOfListings'];
	$category = $instance['category'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getEinsatzListings($numberOfListings, $category);
	echo $after_widget;
	}

	function getEinsatzListings($numberOfListings, $category) { //html
	global $post;
	$count = 0;
	$safecount = 0;
	$n = 0;
	//while loop makes sure that there is the right amount of postings with thumbnails
	while ( ($count < $numberOfListings) AND ($safecount <= 30) ) {
		$args = array( 'numberposts' => $numberOfListings+$n, 'category' => $category, 'post_status' => 'publish' );
		$recent_posts = wp_get_recent_posts($args);
		foreach( $recent_posts as $recent) {
			if ( has_post_thumbnail($recent['ID']) ) {
				$count = $count + 1;
			}
			else {
				$n = $n + 1;
			}
		}
		$safecount = $safecount + 1;
	}

		echo '<ol class="list-unstyled">';
		foreach( $recent_posts as $recent)
		{
			//if ( $recent['post_status'] == 'publish' )
			//{
				if ( has_post_thumbnail($recent['ID']) )
				{

					echo '<li class="recent-post-thumbnail">';
						//echo '<div class="thumbnail-wrapper">';
							//echo get_the_post_thumbnail($recent['ID'], array( 'class' => 'img-responsive gap-bottom center-block' ) );
							$image_src = wp_get_attachment_image_src( get_post_thumbnail_id($recent['ID']),'full' );
							echo '<a href="';
								echo get_permalink($recent['ID']);
								echo '" title="';
								echo esc_attr($recent['post_title']);
								echo ' ansehen">';
								echo '<img src="' . $image_src[0]  . '" width="100%"  class="img-responsive gap-bottom center-block"/>';
							echo '</a>';

						//echo '</div>';
						echo '<div class="teaser-text center-block">';
							echo '<h4><a class="no-a-style" href="';
								echo get_permalink($recent['ID']);
								echo '" title="';
								echo esc_attr($recent['post_title']);
								echo ' ansehen">';
								echo $recent['post_title'];
							echo '</a></h4>';
							echo '<span>';
								echo get_the_date('d.m.Y', $recent['ID']);
							echo '</span>';
							echo '<span class="text-justify">';
									if (has_excerpt($recent['ID'])) {
										echo get_the_excerpt($recent['ID']);
									}
									else {
										echo wp_trim_words($recent['post_content'],25);
									}
							echo '</span>';
						echo '</div>';
					echo '</li>';
					echo '<hr/>';
				}

				/*else
				{
					echo '<li class="recent-post-thumbnail"><a href="';
					echo get_permalink($recent['ID']);
					echo '" title="';
					echo esc_attr($recent['post_title']);
					echo ' ansehen">';
					echo $recent['post_title'];
					echo '</a>';
					echo '<span>';
					echo get_the_date('d.m.Y', $recent['ID']);
					echo '</span>';
					echo '</li>';
					echo '<hr>';
				}*/
			//}
		}
		echo '</ol>';

}


} //end class Realty_Widget
register_widget('Einsatz_Widget');


function wpb_widgets_init() {

	register_sidebar( array(
		'name'          => 'Ankuendigung',
		'id'            => 'ankuendigung',
		'before_widget' => '<div class="announce-banner">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="ankuendigung-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'wpb_widgets_init' );

function bootstrap_responsive_images( $html ){
    $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
    // check if there are already classes assigned to the anchor
    if ( preg_match('/<img.*? class="/', $html) ) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
    } else {
        $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
    }
    // remove dimensions from images,, does not need it!
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );
