<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 07/05/2017
 * Time: 13:32
 */
/**
 * Adds Foo_Widget widget.
 */
class TermsDm_Widget extends WP_Widget {
    
    public $txt_domain = '_dm';

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'dm_terms_widget', // Base ID
			esc_html__( 'Terms listing', $this->txt_domain ), // Name
			array( 'description' => esc_html__( 'display terms from custom taxonomies', $this->txt_domain ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}


		if ( ! empty( $instance['tax'] ) ) {
		    echo '<aside class="menu ">';
		    echo '<ul class="menu-list">';
		    $show_empty = $instance['empty'] !== 'false' ? true: false;
			$count = $instance['count'] ? true: false;
		    $orderby = ($instance['orderby'] !== '' ) ? $instance['orderby'] : 'name';

			$terms = get_terms( array(
				'taxonomy'   => $instance['tax'],
				'orderby'    => $orderby,
				'hide_empty' => $show_empty
			) );

			foreach ( $terms as $term ) {

				$count_display = $count ? "<span>(" . $term->count . ")</span>" : '';
				$desc = $instance['desc'] ? "<em class=\"description is-clearfix\">" . $term->description . "</em>" : '';
				echo '<li class="id-' . $term->term_id . ' ">' . $term->name ;
				echo $count_display;
				echo $desc;
				echo '</li>';
			}
            echo '</ul>';
            echo '</aside>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', $this->txt_domain );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Widget title:', $this->txt_domain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		//Get Taxonomy term
		$tax = ! empty( $instance['tax'] ) ? $instance['tax'] : '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tax' ) ); ?>"><?php esc_attr_e( 'From taxonomy:', $this->txt_domain ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tax' ) ); ?>" type="text" value="<?php echo esc_attr( $tax ); ?>">
        </p>

		<?php
		//Get orderby term
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_attr_e( 'Order by: (name, slug, term_group, term_id, id, description)', $this->txt_domain ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="text" value="<?php echo esc_attr( $orderby ); ?>">
        </p>

		<?php
        //SHOW DESCRIPTION OPTION
		$desc = ! empty( $instance['desc'] ) ? $instance['desc'] : 'false';
		$desc_value = ($instance['desc'] == true) ? 'checked': '';
		?>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_attr_e( 'Show description:', $this->txt_domain ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $desc ); ?>" <?php echo $desc_value; ?>>
</p>
<?php
		//SHOW EMPTY CAT OPTION
		$empty = ! empty( $instance['empty'] ) ? $instance['empty'] : 'false';
		$empty_value = ! empty( $instance['empty'] ) ? 'checked': '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'empty' ) ); ?>"><?php esc_attr_e( 'Show empty categories :', $this->txt_domain ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'empty' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'empty' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $empty ); ?>" <?php echo $empty_value; ?>>
        </p>

		<?php
		//SHOW COUNT
		$count = ! empty( $instance['count'] ) ? $instance['count'] : 'false';
		$count_value = ($instance['count'] == true) ? 'checked': '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_attr_e( 'Show count :', $this->txt_domain ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $count ); ?>" <?php echo $count_value; ?>>
        </p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		//text inputs
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['orderby'] = ( ! empty( $new_instance['orderby'] ) ) ? strip_tags( $new_instance['orderby'] ) : '';
		$instance['tax'] = ( ! empty( $new_instance['tax'] ) ) ? strip_tags( $new_instance['tax'] ) : '';

		//checkbox
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ?  $new_instance['desc'] : false;
		$instance['empty'] = ( ! empty( $new_instance['empty'] ) ) ?  $new_instance['empty'] : false;
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ?  $new_instance['count'] : false;

		return $instance;
	}

} // class Foo_Widget


// register Foo_Widget widget
function register_terms_dm_widget() {
	register_widget( 'TermsDm_Widget' );
}
add_action( 'widgets_init', 'register_terms_dm_widget' );