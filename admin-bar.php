<?php
/**
 * Alter admin bar for Orknet Client
 *
 * @package Package_Name
 */

function alter_admin_bar_for_client( $wp_admin_bar ) {
  $user = wp_get_current_user();

  if ( $user && in_array( 'orknet_client', (array) $user->roles ) ) {

    $wp_admin_bar->remove_node( 'new-content' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'updates' );
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'archive' );

  }
}
add_action( 'admin_bar_menu', 'alter_admin_bar_for_client', 999 );
