<?php

function custom_block_editor_add_menu_page() {
  add_menu_page(
    'Custom Block Editor', // visible page name
    'Block Editor', // menu label
    'edit_posts', // required capability
    'custom-block-editor', // hook/slug of page
    'render_custom_block_editor', // function to render the page
    'dashicons-welcome-widgets-menus' // custom icon
  );
}
add_action( 'admin_menu', 'custom_block_editor_add_menu_page' );

function render_custom_block_editor() {
  ?>
  <div
      id="custom-block-editor"
      class="custom-block-editor"
  >
      Loading Editor...
  </div>
  <?php
}

function custom_block_editor_init( $hook ) {
  $script_path       = 'build/index.js';
	$script_url        = plugins_url( $script_path, __FILE__ );
	$script_asset_path = dirname( __FILE__ ) . '/build/index.asset.php';
	$script_asset      = file_exists( $script_asset_path )
		? require $script_asset_path
		: array(
			'dependencies' => array(),
			'version'      => filemtime( $script_path ),
		);

  wp_enqueue_script(
    'custom-block-editor-script',
    $script_url,
    $script_asset['dependencies'],
    $script_asset['version']
  );

  // Editor default styles
  wp_enqueue_style( 'wp-format-library' );
  
  // Custom styles
  wp_enqueue_style(
    'custom-block-editor-styles', // Handle.
    plugins_url( 'build/index.css', __FILE__ ), // Block editor CSS.
    array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
    // filemtime( __DIR__ . '/build/index.css' )
  );
}
 
add_action( 'admin_enqueue_scripts', 'custom_block_editor_init' );