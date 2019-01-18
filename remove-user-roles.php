<?php
/**
 * Remove all other roles other than admin
 *
 * @package Package_Name
 */

function remove_built_in_roles() {
  global $wp_roles;

  $roles_to_remove = array( 'subscriber', 'contributor', 'author', 'editor' );

  foreach ( $roles_to_remove as $role ) {
    if ( isset( $wp_roles->roles[$role] ) ) {
      $wp_roles->remove_role( $role );
    }
  }
}
add_action( 'admin_menu', 'remove_built_in_roles' );
