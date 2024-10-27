<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Enqueue block styles conditionally.
 * 
 * This function checks if a specific block is in use and, if it is, 
 * enqueues the corresponding stylesheet.
 * 
 * @return void
 */
function jeco_enqueue_conditional_block_styles()
{
  $is_block_used = false;

  // Registering the jeco-bootstrap-accordion styles
  if (has_block('acf/jeco-bootstrap-accordion')) {
    $is_block_used = true;
    wp_enqueue_style(
      'jeco-bootstrap-accordion-block',
      JECO_BOOTSTRAP_BLOCKS_ROOT_URL . 'blocks/jeco-bootstrap-accordion/style.css',
      array()
    );
  }

  // If at least one block is used, enqueue the JavaScript file
  if ($is_block_used) {
    wp_enqueue_script('jquery');

    wp_enqueue_script(
      'jeco-bootstrap',
      JECO_BOOTSTRAP_BLOCKS_ROOT_URL . 'js/bootstrap.bundle.min.js',
      array('jquery'), // Dependencies
      null, // Version (null to avoid cache issues)
      true // Load in footer
    );

    wp_enqueue_script(
      'jeco-popper',
      JECO_BOOTSTRAP_BLOCKS_ROOT_URL . 'js/popper.min.js',
      array('jquery'), // Dependencies
      null, // Version (null to avoid cache issues)
      true // Load in footer
    );
  }
}
add_action('wp_enqueue_scripts', 'jeco_enqueue_conditional_block_styles');
