/**
 * Editor Javascript
 *
 * Used inside editor.
 */
// Load dependencies.
const { __, _n } = wp.i18n;

/**
 * Add paragraph style variant.
 *
 * Adds class 'is-style-lead-paragraph' to Lead paragraph.
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#block-style-variations
 */
wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'lead-paragraph',
    label: __( 'Lead Paragraph', 'radionica' )
} );

/**
 * Adds system block class to list, paragraph, and heading blocks.
 *
 * This will add:
 * .wp-block-heading   - to heading
 * .wp-block-paragraph - to paragraph
 * .wp-block-list      - to list
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#blocks-registerblocktype
 *
 * @param {type}   settings Settings for the block.
 * @param {string} name     Block name.
 *
 * @return {string} Classname.
 */
function addBlockClassNames( settings, name ) {
	if ( 'core/list' !== name && 'core/paragraph' !== name && 'core/heading' !== name ) {
		return settings;
	}

	return lodash.assign( {}, settings, {
		supports: lodash.assign( {}, settings.supports, {
			className: true,
		} ),
	} );
}

wp.hooks.addFilter(
	'blocks.registerBlockType',
	'radionica/core-class-names',
	addBlockClassNames
);

/**
 * Add custom classname to core block.
 *
 * This will add .radionica-heading classname to heading blocks.
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#blocks-getblockdefaultclassname
 *
 * @param {string} className Classname.
 * @param {string} blockName Block name.
 */
function setBlockCustomClassName( className, blockName ) {
    return blockName === 'core/heading' ?
        'radionica-heading' :
        className;
}

wp.hooks.addFilter(
    'blocks.getBlockDefaultClassName',
    'radionica/custom-class-names',
    setBlockCustomClassName
);
