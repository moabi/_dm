<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 06/05/2017
 * Time: 18:34
 */
class bulma_walker_nav_menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
// Select a CSS class for this `<ul>` based on $depth
		switch ( $depth ) {
			case 0:
				// Top-level submenus get the 'nav-main-sub-list' class
				$class = 'bulma-menu-children';
				break;
			case 1:
				$class = 'bulma-menu-children';
				break;
			case 2:
				$class = 'bulma-menu-children';
				break;
			case 3:
				// Submenus nested 1-3 levels deep get the 'nav-other-sub-list' class
				$class = 'bulma-menu-children';
				break;
			default:
				// All other submenu `<ul>`s receive no class
				break;
		}
		// Only print out the 'class' attribute if a class has been assigned
		if ( isset( $class ) ) {
			$output .= "\n$indent<ul class=\"$class\">\n";
		} else {
			$output .= "\n$indent<ul>\n";
		}
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent     = str_repeat( "\t", $depth );
		$attributes = '';
		! empty ( $item->attr_title )
		// Avoid redundant titles
		and $item->attr_title !== $item->title
		    and $attributes .= ' title="' . esc_attr( $item->attr_title ) . '"';
		! empty ( $item->url )
		and $attributes .= ' href="' . esc_attr( $item->url ) . '"';
		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );

		$active_class = ($item->current) ? ' is-active' : '';
		$item_ancestor = ($item->current_item_ancestor) ? ' current-menu-ancestor current_page_ancestor' : '';
		$item_parent = ($item->current_item_parent) ? ' current_page_parent current-menu-parent' : '';
		$item_has_children = (in_array('menu-item-has-children',$item->classes)) ? ' bulma-menu-has-children bulma-menu-allow-hover' : '';
		$item_class = 'bulma-menu-item'.$item_has_children.$active_class.$item_ancestor.$item_parent;
		// Select a CSS class for this `<li>` based on $depth
		switch ( $depth ) {
			case 0:
				// Top-level `<li>`s get the 'nav-main-item' class
				$class = $item_class;
				break;
			case 1:
				// Top-level `<li>`s get the 'nav-main-item' class
				$class = $item_class;
				break;
			case 2:
				// Top-level `<li>`s get the 'nav-main-item' class
				$class = $item_class;
				break;
			default:
				$class = $item_class;
				break;
		}

		$item_output = "$args->before<a class='nav-item ".$class." ' $attributes>$args->link_before$title</a>" . "$args->link_after$args->after";

		// Only print out the 'class' attribute if a class has been assigned
		if ( isset( $class ) ) {
			$output .= $indent . '';
		} else {
			$output .= $indent . '';
		}
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
}
