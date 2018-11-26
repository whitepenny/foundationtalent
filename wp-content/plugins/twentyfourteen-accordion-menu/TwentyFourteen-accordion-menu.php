<?php
/**
 * Plugin Name: TwentyFourteen Accordion Menu
 * Description: Adds accordion functionality to the Top primary menu in the TwentyFourteen theme (v1.2) on mobile
 * Version: 1.1
 * Author: Andrew Taylor
 * Author URI: http://www.ataylor.me
 * License: GPL2
 * Copyright 2014  Andrew Taylor  (email : andrew@ataylor.me)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function TwentyFourteen_Accordion_Menu_enqueue_scripts(){
  
  // enqueue theme Javascript with jQuery as a dependency
  // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
  wp_enqueue_script( 'TwentyFourteen_Accordion_Menu', plugins_url( '/js/TwentyFourteen_Accordion_Menu.js' , __FILE__ ), array('jquery'), false, true );
  
}

// add enqueue_scripts to wp_enqueue_scripts action
// http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'TwentyFourteen_Accordion_Menu_enqueue_scripts' );

?>