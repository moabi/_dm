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
			$link_to = isset($instance['link_to']) ? intval($instance['link_to']): 0;
		    echo '<aside class="menu ">';
		    echo '<ul class="menu-list">';
			if($link_to == 2) {
			    echo '<div id="grid-filter">';
				echo '<grid-filter v-on:click="filterDataList()">';
                echo 'Sort by name';
                echo '</grid-filter>';
                echo '</div>';
			}

		    $show_empty = $instance['empty'] !== 'false' ? true: false;
			$count = $instance['count'] ? true: false;
		    $orderby = ($instance['orderby'] !== '' ) ? $instance['orderby'] : 'name';
		    $show_desc = $instance['desc'] == 'false' ? true: false;

		    switch ($link_to){
                case 0:
	                $link_class = 'none';
	                break;
                case 1:
	                $link_class = 'link-to-tax';
	                break;
                case 2:
	                $link_class = 'js-list-filter';
	                break;
                default:
	                $link_class = 'default-link';
            }

			if($link_to == 2) {
				wp_enqueue_script(
					'widget-listing',
					get_template_directory_uri() . '/widgets/listing.js',
					array ('jquery','vue-js'),
					'2.3.2',
					true);
			}

			$terms = get_terms( array(
				'taxonomy'   => $instance['tax'],
				'parent'        => 0,
				'orderby'    => $orderby,
				'hide_empty' => $show_empty,
				'order'     => 'ASC',
				'childless' => false,
				'hierarchical' => false
			) );

			foreach ( $terms as $term ) {
				$count_display = $count ? "<span>(" . $term->count . ")</span>" : '';
				$desc = ($term->description && $show_desc) ? "<em class=\"description is-clearfix\">" . $term->description . "</em>" : '';
				$slug = isset($term->slug) ? $term->slug : '';
				$link = ($link_to == 1) ? get_term_link($slug,$instance['tax']) : '#';

				echo '<li class="wl-name id-' . $term->term_id . '">';
				if($link_to !== 0){
					echo '<a class="'.$link_class.'" data-sort="'.$link.'" href="'.$link.'">';
                }

                echo $term->name ;
				echo $count_display;
				echo $desc;
				if($link_to !== 0) {
					echo '</a>';
				}
                $childs_args = array(
                    'term_id'       =>    $term->term_id,
                    'tax'           =>    $instance['tax'],
                    'show_empty'    =>    $show_empty,
                    'count'         =>    $count,
                    'orderby'       => $orderby,
                    'show_desc'     => $show_desc,
                    'link'          => $link_to,
                    'link_class'    => $link_class,

                );
				$childs = $this->get_children_terms($childs_args);
				if($instance['childs'] == 'false'){
					echo $childs;
                }


				echo '</li>';
			}
            echo '</ul>';
            echo '</aside>';


		}
		echo $args['after_widget'];
	}

	/**
	 * @param $id
	 * @param $tax
	 * @param $show_empty
	 * @param $count
	 * @param $orderby
	 * @param $show_desc
	 *
	 * @return string
	 */
	public function get_children_terms($args){
		$output = '';

		$terms_childrens = get_terms( array(
			'taxonomy'   => $args['tax'],
			'hide_empty' => $args['show_empty'],
			'orderby'    => $args['orderby'],
			'parent'        => $args['term_id'],
		) );
		if(!empty($terms_childrens)) {
			$output .= '<ul class="dm-widget-childrens">';
			foreach ( $terms_childrens as $child ) {
				$count_display = $args['count'] ? "<span>(" . $child->count . ")</span>" : '';
				$desc          = ($child->description && $args['count']) ? "<em class=\"description is-clearfix\">" . $child->description . "</em>" : '';
				$output        .= '<li class="id-' . $child->term_id . ' has-parent ">' . $child->name;
				if($args['link'] !== 0){
					$output        .= '<a href="" class="'.$args['link_class'].'">';
                }

				$output        .= $count_display;
				$output        .= $desc;
				if($args['link'] !== 0){
					$output        .= '</a>';
				}

				$output        .= '</li>';
			}
			$output .= '</ul>';
		}

		return $output;
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
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tax' ) ); ?>">
                <?php $taxonomies = get_taxonomies();

                foreach ( $taxonomies as $taxonomy ) {
	                echo '<option '.$this->selected_option('selected',$taxonomy,$tax).' value="' . $taxonomy . '">' . $taxonomy . '</option>';
                }
                ?>
            </select>
        </p>

		<?php
		//Get orderby term
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_attr_e( 'Order by:', $this->txt_domain ); ?></label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
                <option <?php echo $this->selected_option('selected','name',$orderby); ?> value="name">Name</option>
                <option <?php echo $this->selected_option('selected','slug',$orderby); ?> value="slug">slug</option>
                <option <?php echo $this->selected_option('selected','term_group',$orderby); ?> value="term_group">term_group</option>
                <option <?php echo $this->selected_option('selected','term_id',$orderby); ?> value="term_id">term_id</option>
                <option <?php echo $this->selected_option('selected','id',$orderby); ?> value="id">id</option>
                <option <?php echo $this->selected_option('selected','description',$orderby); ?> value="description">description</option>
            </select>
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
		//SHOW CHILDREN
		$childs = ! empty( $instance['childs'] ) ? $instance['childs'] : 'false';
		$childs_value = ($instance['childs'] == true) ? 'selected': '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'childs' ) ); ?>"><?php esc_attr_e( 'Show childs :', $this->txt_domain ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'childs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'childs' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $childs ); ?>" <?php echo $childs_value; ?>>
        </p>
		<?php
		//Link to
		$link_to_val = ! empty( $instance['link_to'] ) ? intval($instance['link_to']) : 0;
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link_to' ) ); ?>"><?php esc_attr_e( 'Link to :', $this->txt_domain ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_to' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_to' ) ); ?>">
                <option value="0" <?php echo $this->selected_option('selected',$link_to_val,0); ?>>none</option>
                <option value="1" <?php echo $this->selected_option('selected',$link_to_val,1); ?>>link</option>
                <option value="2" <?php echo $this->selected_option('selected',$link_to_val,2); ?>>taxonomy</option>
            </select>
        </p>

		<?php
	}

	/**
	 * @param $attr
	 * @param $sel_val
	 * @param $option
	 */
	public function selected_option($attr,$sel_val,$option){
	    $output = '';
	    if($sel_val == $option){
	        $output .= $attr;
        }

        return $output;
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
		$instance['orderby'] = ( ! empty( $new_instance['orderby'] ) ) ? strip_tags( $new_instance['orderby'] ) : 'name';
		$instance['tax'] = ( ! empty( $new_instance['tax'] ) ) ? strip_tags( $new_instance['tax'] ) : '';

		//checkbox
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ?  $new_instance['desc'] : false;
		$instance['empty'] = ( ! empty( $new_instance['empty'] ) ) ?  $new_instance['empty'] : false;
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ?  $new_instance['count'] : false;
		$instance['childs'] = ( ! empty( $new_instance['childs'] ) ) ?  $new_instance['childs'] : false;
		$instance['link_to'] = ( ! empty( $new_instance['link_to'] ) ) ?  $new_instance['link_to'] : 0;

		return $instance;
	}

} // class Foo_Widget


// register Foo_Widget widget
function register_terms_dm_widget() {
	register_widget( 'TermsDm_Widget' );
}
add_action( 'widgets_init', 'register_terms_dm_widget' );