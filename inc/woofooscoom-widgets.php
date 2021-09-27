<?php 


/**
 * Vilva Widget Areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Vilva
 */

// https://qodeinteractive.com/magazine/add-widget-area-to-wordpress/
// https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/

function vilva_widgets_init(){
    $sidebars = array(
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'vilva' ),
            'id'          => 'footer-one',
            'description' => __( 'Add footer one widgets here.', 'vilva' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'vilva' ),
            'id'          => 'footer-two',
            'description' => __( 'Add footer two widgets here.', 'vilva' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'vilva' ),
            'id'          => 'footer-three',
            'description' => __( 'Add footer three widgets here.', 'vilva' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'vilva' ),
            'id'          => 'footer-four',
            'description' => __( 'Add footer four widgets here.', 'vilva' ),
        )
    );

    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
}
add_action( 'widgets_init', 'vilva_widgets_init' );


// Creating the widget
class wpb_widget extends WP_Widget {

	// Construct Widget
	function __construct() {
		parent::__construct(

		// Base ID of your widget
		'wpb_widget',

		// Widget name will appear in UI
		__('WPBeginner Widget', 'wpb_widget_domain'),

		// Widget description
		array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( ! empty( $title ) ) {

			// before and after widget arguments are defined by themes
			echo $args['before_widget'];

			echo $args['before_title'] . $title . $args['after_title'];

			// before and after widget arguments are defined by themes
			echo $args['after_widget'];

		}

	}

	// Widget Backend
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {

			$title = $instance[ 'title' ];

		} else {

			$title = __( 'New title', 'wpb_widget_domain' );

		} ?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

	<?php }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}



// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
