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
function jeco_enqueue_block_editor_styles()
{

  // Enqueue styles for the editor for jeco-bootstrap-accordion
  if (has_block('acf/jeco-bootstrap-accordion')) {
    wp_enqueue_style(
      'jeco-bootstrap-accordion-editor-style',
      JECO_BOOTSTRAP_BLOCKS_ROOT_URL . 'blocks/jeco-bootstrap-accordion/editor-style.css',
      array()
    );
  }
}
add_action('enqueue_block_editor_assets', 'jeco_enqueue_block_editor_styles');
