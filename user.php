<?php
/**
 * User Management
 *
 * @package Package_Name
 */

/**
 * Create Orknet Client role
 */
function create_orknet_client_role() {
  global $wp_roles;
  if ( ! isset( $wp_roles ) )
    $wp_roles = new WP_Roles();

  $adm = $wp_roles->get_role('administrator');

  $wp_roles->add_role( 'orknet_client', 'Client', $adm->capabilities );

  $remove_caps = array(
    'switch_themes',
    'activate_plugins',
    'update_plugins',
    'delete_plugins',
    'update_themes',
    'install_themes',
    'update_core',
    'delete_themes'
  );

  foreach ( $remove_caps as $cap ) {
    $wp_roles->remove_cap( 'orknet_client', $cap );
  }

  $add_caps = array(
    'edit_themes',
    'edit_theme_options'
  );

  foreach ( $add_caps as $cap ) {
    $wp_roles->add_cap( 'orknet_client', $cap );
  }

}
add_action( 'init', 'create_orknet_client_role' );

/**
 * Remove User Roles
 */
require get_template_directory() . '/inc/user/remove-user-roles.php';

/**
 * Remove Admin Pages
 */
require get_template_directory() . '/inc/user/remove-admin-pages.php';


/**
 * Alter Admin Bar
 */
require get_template_directory() . '/inc/user/admin-bar.php';

/**
 * Remove adminstrator from list for Client user creating new users
 */
function editable_roles( $roles ){
  if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
    unset( $roles['administrator']);
  }
  return $roles;
}
add_filter( 'editable_roles', 'editable_roles' );
