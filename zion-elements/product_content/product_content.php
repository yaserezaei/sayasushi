<?php if(! defined('ABSPATH')){ return; }

class ZNB_ProductContent extends ZionElement
{

	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{
		// Prevent the elemnt from being accessible on other pages
		if( ! is_singular( 'product' ) ){
			echo '<div class="zn-pb-notification">This element only works on single product pages created with WooCommerce. Please delete it.</div>';
			return false;
		}

		$options = $this->data['options'];
		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-prodContentEl';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.implode(' ', $classes).'"';

		echo '<div '. implode(' ', $attributes ) .'>';
			wc_get_template_part( 'content', 'single-product' );
		echo '</div>';
	}

	function options(){
		$uid = $this->data['uid'];
		$options = array(
			'has_tabs'  => true,
		);
		return $options;
	}

	// TODO : Uncomment this if JS errors appears because of clients shortcodes/plugins
	// /**
	//  * This method is used to display the output of the element.
	//  * @return void
	//  */
	// function element_edit()
	// {
	//     echo '<div class="zn-pb-notification">This element will be rendered only in View Page Mode and not in PageBuilder Edit Mode.</div>';
	// }

	/**
	 * If the dependencies for this element are met
	 */
	function canLoad(){
		return class_exists( 'WooCommerce' );
	}
}

ZNB()->elements_manager->registerElement( new ZNB_ProductContent( array(
	'id' => 'DnProdContent',
	'name' => __( 'Product item content', 'dannys-restaurant' ),
	'description' => __( 'This element will display the contents of a product.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content, post',
	'legacy' => false,
	'keywords' => array( 'shop', 'store', 'woocommerce' ),
) ) );
