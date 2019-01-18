<?php
/**
 * Remove admin pages for Orknet Client
 *
 * Remove or add comments below to adjust which pages are shown/removed
 *
 * @package Package_name
 */

function remove_pages_for_client_role() {
 if ( current_user_can( 'orknet_client' ) ) {
   // remove_menu_page('index.php');
   remove_menu_page('edit.php');
   // remove_menu_page('upload.php');
   // remove_menu_page('link-manager.php');
   remove_menu_page('edit-comments.php');
   // remove_menu_page('edit.php?post_type=page');
   remove_menu_page('plugins.php');
   remove_menu_page('plugin-install.php');
   remove_menu_page('themes.php');
   // remove_menu_page('users.php');
   remove_menu_page('tools.php');
   remove_menu_page('options-general.php');
   remove_menu_page('wpcf7');
   remove_menu_page('edit.php?post_type=acf-field-group');

   // sub pages
   remove_submenu_page( 'themes.php', 'themes.php' );
   remove_submenu_page( 'themes.php', 'theme-editor.php' );

   // Add Custom Menus link
   add_menu_page( 'Menus', 'Menus','edit_theme_options', 'nav-menus.php', '', 'dashicons-welcome-widgets-menus' ,10 );
 }
}
add_action( 'admin_init', 'remove_pages_for_client_role' );
