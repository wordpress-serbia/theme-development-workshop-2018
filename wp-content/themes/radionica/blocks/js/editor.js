/**
 * Editor Javascript
 *
 * Used inside editor.
 */

/**
 * Add paragraph style variant.
 *
 * Adds class 'is-style-lead-paragraph' to Lead paragraph.
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#block-style-variations
 */
wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'lead-paragraph',
    label: 'Lead Paragraph'
} );
