<?php if(! defined('ABSPATH')){ return; }

$uid = $this->data['uid'];
$ceaserUrl = 'https://matthewlein.com/ceaser/';
$options = array(
	'has_tabs'  => true,

	'general' => array(
		'title' => 'Content',
		'options' => array(

			array (
				"name"        => __( "Content Source", 'dannys-restaurant' ),
				"description" => __( "Select the content source type.", 'dannys-restaurant' ),
				"id"          => "source",
				"std"         => "",
				'type'        => 'select',
				'options'        => array(
					'bulk' => __( "Bulk Images", 'dannys-restaurant' ),
					'pb'   => __( "Page Builder Content", 'dannys-restaurant' ),
				),
			),

			// Bulk images
			array(
				"name"        => __("Add Images", 'dannys-restaurant'),
				"description" => __("Add images to the slider.", 'dannys-restaurant'),
				"id"          => "bulk_images",
				"std"         => "",
				"type"        => "gallery",
				"dependency"  => array( 'element' => 'source' , 'value'=> array('bulk') ),
			),

			array (
				"name"        => __( "Images Size", 'dannys-restaurant' ),
				"description" => __( "Choose the image's size", 'dannys-restaurant' ),
				"id"          => "image_size",
				"std"         => "medium_large",
				'type'        => 'select',
				'options'     => zn_get_image_sizes_list(),
				"dependency"  => array( 'element' => 'source' , 'value'=> array('bulk') ),

			),

			array (
				"name"           => __( "Carousel Items", 'dannys-restaurant' ),
				"description"    => __( "Here you can create your desired carousel items.", 'dannys-restaurant' ),
				"id"             => "single_item",
				"std"            => "",
				"type"           => "group",
				"add_text"       => __( "Item", 'dannys-restaurant' ),
				"remove_text"    => __( "Item", 'dannys-restaurant' ),
				"group_sortable" => true,
				"element_title"  => "title",
				"subelements"    => array (
					array (
						"name"        => __( "Carousel Item Title", 'dannys-restaurant' ),
						"description" => __( "Optional, just for visual identification purposes.", 'dannys-restaurant' ),
						"id"          => "title",
						"std"         => "",
						"type"        => "text"
					),
				),
				"dependency"  => array( 'element' => 'source' , 'value'=> array('pb') ),
			),

		),
	),

	'slider_options' => array(
		'title' => 'Slider Options',
		'options' => array(

			array(
				'id'    => 'title1',
				'name'  => __('Basic Options', 'dannys-restaurant'),
				'type'  => 'zn_title',
				'class' => 'zn_full zn-custom-title-large',
			),

			array (
				"name"        => __( "Autoplay", 'dannys-restaurant' ),
				"description" => __( "Enables auto play of slides.", 'dannys-restaurant' ),
				"id"          => "autoplay",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),

			array (
				"name"        => __( "Autoplay Speed", 'dannys-restaurant' ),
				"description" => __( "Auto play change interval. In Miliseconds.", 'dannys-restaurant' ),
				"id"          => "autoplaySpeed",
				"std"         => "3000",
				"type"        => "text",
				"class"       => "zn_input_sm",
				"dependency"  => array( 'element' => 'autoplay' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Enable Fade", 'dannys-restaurant' ),
				"description" => __( "Enable fade effect.", 'dannys-restaurant' ),
				"id"          => "fade",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),

			array (
				"name"        => __( "Infinite looping", 'dannys-restaurant' ),
				"description" => __( "Infinite looping.", 'dannys-restaurant' ),
				"id"          => "infinite",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),

			array (
				"name"        => __( "Slides To Show", 'dannys-restaurant' ),
				"description" => __( "# of slides to show at a time.", 'dannys-restaurant' ),
				"id"          => "slidesToShow",
				"std"         => "3",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 1,
					"max" => 16,
					"step" => 1,
				),
			),

			array (
				"name"        => __( "Slides To Scroll", 'dannys-restaurant' ),
				"description" => __( "# of slides to scroll at a time.", 'dannys-restaurant' ),
				"id"          => "slidesToScroll",
				"std"         => "1",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 1,
					"max" => 16,
					"step" => 1,
				),
			),

			array (
				"name"        => __( "Speed", 'dannys-restaurant' ),
				"description" => __( "Transition speed.", 'dannys-restaurant' ),
				"id"          => "speed",
				"std"         => "300",
				"type"        => "text",
				"class"       => "zn_input_sm",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 0,
					"max" => 20000,
					"step" => 100,
				),
			),

			array (
				"name"        => __( "Swipe", 'dannys-restaurant' ),
				"description" => __( "Enables touch swipe.", 'dannys-restaurant' ),
				"id"          => "swipe",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),


			array(
				'id'    => 'title1',
				'name'  => __('Advanced Options', 'dannys-restaurant'),
				'type'  => 'zn_title',
				'class' => 'zn_full zn-custom-title-large',
			),

			array (
				"name"        => __( "Enable Advanced Options?", 'dannys-restaurant' ),
				"description" => __( "Enables tabbing and arrow key navigation", 'dannys-restaurant' ),
				"id"          => "advanced_options",
				"std"         => "",
				"value"       => "yes",
				'type'        => 'toggle2',
			),

			// BREAKPOINT GROUPS
			array (
				"name"           => __( "Breakpoint Options", 'dannys-restaurant' ),
				"description"    => __( "Change settings per breakpoint.", 'dannys-restaurant' ),
				"id"             => "responsive",
				"std"            => "",
				"type"           => "group",
				"group_sortable" => true,
				"element_title" => "breakpoint",
				"subelements"    => array (

					array (
						"name"        => __( "Breakpoint (px)", 'dannys-restaurant' ),
						"description" => __( "Enables custom settings at this given breakpoint. Eg: 1440, 1200, 992, 767.", 'dannys-restaurant' ),
						"id"          => "breakpoint",
						"std"         => "",
						"type"        => "text",
						"class"       => "zn_input_xs",
						"numeric"        => true,
						"helpers"        => array(
							"min" => 320,
							"max" => 2560,
							"step" => 1,
						),
					),

					array (
						"name"        => __( "Slides To Show", 'dannys-restaurant' ),
						"description" => __( "# of slides to show at a time.", 'dannys-restaurant' ),
						"id"          => "slidesToShow",
						"std"         => "1",
						"type"        => "text",
						"class"       => "zn_input_xs",
						"numeric"        => true,
						"helpers"        => array(
							"min" => 1,
							"max" => 16,
							"step" => 1,
						),
					),

					array (
						"name"        => __( "Slides To Scroll", 'dannys-restaurant' ),
						"description" => __( "# of slides to scroll at a time.", 'dannys-restaurant' ),
						"id"          => "slidesToScroll",
						"std"         => "1",
						"type"        => "text",
						"class"       => "zn_input_xs",
						"numeric"        => true,
						"helpers"        => array(
							"min" => 1,
							"max" => 16,
							"step" => 1,
						),
					),

					array (
						"name"        => __( "Enable arrows navigation?", 'dannys-restaurant' ),
						"description" => __( "Enables navigation arrows.", 'dannys-restaurant' ),
						"id"          => "arrows",
						"std"         => "yes",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					),

					array (
						"name"        => __( "Enable Dots Nov.", 'dannys-restaurant' ),
						"description" => __( "Current slide indicator dots.", 'dannys-restaurant' ),
						"id"          => "dots",
						"std"         => "no",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					),

					array (
						"name"        => __( "Disable Slider?", 'dannys-restaurant' ),
						"description" => __( "Disable slick slider on this breakpoint?", 'dannys-restaurant' ),
						"id"          => "unslick",
						"std"         => "no",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					),

				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),


			array (
				"name"        => __( "Accessibility", 'dannys-restaurant' ),
				"description" => __( "Enables tabbing and arrow key navigation", 'dannys-restaurant' ),
				"id"          => "accessibility",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Adaptive Height", 'dannys-restaurant' ),
				"description" => __( "Adapts slider height to the current slide.", 'dannys-restaurant' ),
				"id"          => "adaptiveHeight",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'     => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),


			array (
				"name"        => __( "Enable Center Mode", 'dannys-restaurant' ),
				"description" => __( "Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.", 'dannys-restaurant' ),
				"id"          => "centerMode",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Center Padding", 'dannys-restaurant' ),
				"description" => __( "Side padding when in center mode. (px or %).", 'dannys-restaurant' ),
				"id"          => "centerPadding",
				"std"         => "50px",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"dragup"     => array(
					'min' => '0',
					'max' => '300',
					'unit' => 'px'
				),
				"dependency"  => array(
					array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
					array( 'element' => 'centerMode' , 'value'=> array('yes') ),
				),
			),

			array (
				"name"        => __( "CSS Ease", 'dannys-restaurant' ),
				"description" => sprintf( __( 'CSS3 easing. Eg: <a href="%s" target="_blank">Ceaser Tool</a> (copy the cubic-bezier property).', 'dannys-restaurant' ), $ceaserUrl ),
				"id"          => "cssEase",
				"std"         => "ease",
				"type"        => "text",
				"class"       => "zn_input_sm",
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Desktop Dragging", 'dannys-restaurant' ),
				"description" => __( "Enables desktop dragging", 'dannys-restaurant' ),
				"id"          => "dragging",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Edge Friction", 'dannys-restaurant' ),
				"description" => __( "Resistance when swiping edges of non-infinite carousels.", 'dannys-restaurant' ),
				"id"          => "edgeFriction",
				"std"         => "0.15",
				"type"        => "text",
				"class"       => "zn_input_sm",
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Slider Syncing", 'dannys-restaurant' ),
				"description" => __( "You can sync multiple image sliders. Add the CSS selector of the other image slider you want this image slider to sync with.", 'dannys-restaurant' ),
				"id"          => "asNavFor",
				"std"         => "",
				"type"        => "text",
				"placeholder" => "eg: .zn-Slider-eluid4262c4de",
				"class"       => "zn_input_xl",
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Initial Slide", 'dannys-restaurant' ),
				"description" => __( "Slide to start on.", 'dannys-restaurant' ),
				"id"          => "initialSlide",
				"std"         => "0",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 0,
					"max" => 20,
					"step" => 1,
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Enable Lazy Load", 'dannys-restaurant' ),
				"description" => __( "Enable loading images progresively.", 'dannys-restaurant' ),
				"id"          => "lazyLoad",
				"std"         => "no",
				'type'        => 'select',
				'options'        => array(
					'no' => __( "Disabled.", 'dannys-restaurant' ),
					'ondemand' => __( "On Demand.", 'dannys-restaurant' ),
					'progressive' => __( "Progressive.", 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Pause On Focus", 'dannys-restaurant' ),
				"description" => __( "Pauses autoplay when slider is focussed.", 'dannys-restaurant' ),
				"id"          => "pauseOnFocus",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Pause On Hover", 'dannys-restaurant' ),
				"description" => __( "Pauses autoplay when slider is hovered.", 'dannys-restaurant' ),
				"id"          => "pauseOnHover",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Pause On Dots Hover", 'dannys-restaurant' ),
				"description" => __( "Pauses autoplay when a dot is hovered.", 'dannys-restaurant' ),
				"id"          => "pauseOnDotsHover",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Respond To", 'dannys-restaurant' ),
				"description" => __( "Width that responsive object responds to.", 'dannys-restaurant' ),
				"id"          => "respondTo",
				"std"         => "window",
				'type'        => 'select',
				'options'        => array(
					'window' => __( "Window", 'dannys-restaurant' ),
					'slider' => __( "Slider", 'dannys-restaurant' ),
					'min' => __( "the smaller of the two.", 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Rows", 'dannys-restaurant' ),
				"description" => __( "Setting this to more than 1 initializes grid mode. Use 'Slides Per Row' to set how many slides should be in each row.", 'dannys-restaurant' ),
				"id"          => "rows",
				"std"         => "1",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 1,
					"max" => 5,
					"step" => 1,
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Slides per Row", 'dannys-restaurant' ),
				"description" => __( "With grid mode initialized via the rows option, this sets how many slides are in each grid row.", 'dannys-restaurant' ),
				"id"          => "slidesPerRow",
				"std"         => "1",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 1,
					"max" => 16,
					"step" => 1,
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),


			array (
				"name"        => __( "Swipe To Slide", 'dannys-restaurant' ),
				"description" => __( "Swipe to slide irrespective of slidesToScroll", 'dannys-restaurant' ),
				"id"          => "swipeToSlide",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Touch Move", 'dannys-restaurant' ),
				"description" => __( "Enables slide moving with touch.", 'dannys-restaurant' ),
				"id"          => "touchMove",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Touch Threshold", 'dannys-restaurant' ),
				"description" => __( "To advance slides, the user must swipe a length of ( 1 / touchThreshold) * the width of the slider.", 'dannys-restaurant' ),
				"id"          => "touchThreshold",
				"std"         => "5",
				"type"        => "text",
				"class"       => "zn_input_xs",
				"numeric"        => true,
				"helpers"        => array(
					"min" => 1,
					"max" => 40,
					"step" => 1,
				),
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Enable Variable Width", 'dannys-restaurant' ),
				"description" => __( "Disables automatic slide width calculation.", 'dannys-restaurant' ),
				"id"          => "variableWidth",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Enable Vertical Mode", 'dannys-restaurant' ),
				"description" => __( "Vertical slide direction.", 'dannys-restaurant' ),
				"id"          => "vertical",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Vertical Swiping", 'dannys-restaurant' ),
				"description" => __( "Changes swipe direction to vertical.", 'dannys-restaurant' ),
				"id"          => "verticalSwiping",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Enable RTL mode?", 'dannys-restaurant' ),
				"description" => __( "Change the slider's direction to become right-to-left.", 'dannys-restaurant' ),
				"id"          => "rtl",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Wait for animate", 'dannys-restaurant' ),
				"description" => __( "Ignores requests to advance the slide while animating.", 'dannys-restaurant' ),
				"id"          => "waitForAnimate",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'advanced_options' , 'value'=> array('yes') ),
			),



		),
	),



	'style' => array(
		'title' => 'Style',
		'options' => array(

			array(
				'id'    => 'title1',
				'name'  => __('Arrow Navigation Options', 'dannys-restaurant'),
				'type'  => 'zn_title',
				'class' => 'zn_full zn-custom-title-large',
			),

			array (
				"name"        => __( "Enable arrows navigation?", 'dannys-restaurant' ),
				"description" => __( "Enables navigation arrows.", 'dannys-restaurant' ),
				"id"          => "arrows",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),

			array (
				"name"        => __( "Arrow Style", 'dannys-restaurant' ),
				"description" => __( "Select the arrows Style", 'dannys-restaurant' ),
				"id"          => "arrow_style",
				"std"         => "1",
				'type'        => 'select',
				'options'        => array(
					'1' => __( "Style 1", 'dannys-restaurant' ),
					'2' => __( "Style 2", 'dannys-restaurant' ),
					'3' => __( "Style 3", 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
				'live'        => array(
					'type'    => 'class',
					'css_class' => '.'.$uid.' .zn-SliderNav',
					'val_prepend'  => 'zn-SliderNav--style',
				),
			),

			array (
				"name"        => __( "Rounded", 'dannys-restaurant' ),
				"description" => __( "Choose if you want to have circle shaped arrows.", 'dannys-restaurant' ),
				"id"          => "arrows_rounded",
				"std"         => "yes",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Arrows Navigation Position", 'dannys-restaurant' ),
				"description" => __( "Select the position of the Arrows", 'dannys-restaurant' ),
				"id"          => "arrow_pos",
				"std"         => "middle",
				"type"        => "select",
				"options"     => array (
					'top-left'  => __( 'Top Left', 'dannys-restaurant' ),
					'top-center' => __( 'Top Center', 'dannys-restaurant' ),
					'top-right' => __( 'Top Right', 'dannys-restaurant' ),
					'middle' => __( 'Vertically Middle', 'dannys-restaurant' ),
					'bottom-left' => __( 'Bottom Left', 'dannys-restaurant' ),
					'bottom-center' => __( 'Bottom Center', 'dannys-restaurant' ),
					'bottom-right' => __( 'Bottom Right', 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
				// 'live'        => array(
				// 	'type'    => 'class',
				// 	'css_class' => '.'.$uid.' .zn-SliderNav',
				// 	'val_prepend'  => 'zn-SliderNav--pos-',
				// ),
			),

			array (
				"name"        => __( "Navigation Offset", 'dannys-restaurant' ),
				"description" => __( "Customize the navigation arrow offset.", 'dannys-restaurant' ),
				"id"          => "arrows_offset",
				"std"         => "0",
				"type"        => "slider",
				"helpers"     => array (
					"step" => "1",
					"min" => "-150",
					"max" => "150"
				),
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
				'live'        => array(
					'multiple' => array(
						array(
							'type'      => 'css',
							'css_class' => '.'.$uid.' .znSlickNav-prev',
							'css_rule'  => 'margin-right',
							'unit'      => 'px'
						),
						array(
							'type'      => 'css',
							'css_class' => '.'.$uid.' .znSlickNav-next',
							'css_rule'  => 'margin-left',
							'unit'      => 'px'
						),
					)
				)
			),

			array (
				"name"        => __( "Arrows Size", 'dannys-restaurant' ),
				"description" => __( "Choose the arrows sizes.", 'dannys-restaurant' ),
				"id"          => "arrows_size",
				"std"         => "normal",
				'type'        => 'select',
				'options'        => array(
					'normal' => __( "Default", 'dannys-restaurant' ),
					'large' => __( "Large", 'dannys-restaurant' ),
					'xlarge' => __( "Larger", 'dannys-restaurant' ),
				),
				'live'        => array(
					'type'    => 'class',
					'css_class' => '.'.$uid.' .zn-SliderNav',
					'val_prepend'  => 'zn-SliderNav--size-',
				),
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Arrows Theme", 'dannys-restaurant' ),
				"description" => __( "Choose the arrows color theme.", 'dannys-restaurant' ),
				"id"          => "arrows_theme",
				"std"         => "dark",
				'type'        => 'select',
				'options'        => array(
					'dark' => __( "Dark", 'dannys-restaurant' ),
					'light' => __( "Light", 'dannys-restaurant' ),
				),
				'live'        => array(
					'type'    => 'class',
					'css_class' => '.'.$uid.' .zn-SliderNav',
					'val_prepend'  => 'zn-SliderNav--theme-',
				),
				"dependency"  => array( 'element' => 'arrows' , 'value'=> array('yes') ),
			),



			array(
				'id'    => 'title1',
				'name'  => __('Bullets Navigation Options', 'dannys-restaurant'),
				'type'  => 'zn_title',
				'class' => 'zn_full zn-custom-title-large',
			),

			array (
				"name"        => __( "Enable Dots Nov.", 'dannys-restaurant' ),
				"description" => __( "Current slide indicator dots.", 'dannys-restaurant' ),
				"id"          => "dots",
				"std"         => "no",
				'type'        => 'zn_radio',
				'options'        => array(
					'yes' => __( "Yes", 'dannys-restaurant' ),
					'no' => __( "No", 'dannys-restaurant' ),
				),
				'class'        => 'zn_radio--yesno',
			),

			array (
				"name"        => __( "Dots Navigation Position", 'dannys-restaurant' ),
				"description" => __( "Select the position of the dots", 'dannys-restaurant' ),
				"id"          => "dots_pos",
				"std"         => "bottom-center",
				"type"        => "select",
				"options"     => array (
					'bottom-left' => __( 'Bottom Left', 'dannys-restaurant' ),
					'bottom-center' => __( 'Bottom Center', 'dannys-restaurant' ),
					'bottom-right' => __( 'Bottom Right', 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'dots' , 'value'=> array('yes') ),
			),

			array (
				"name"        => __( "Dots Theme", 'dannys-restaurant' ),
				"description" => __( "Choose the dots color theme.", 'dannys-restaurant' ),
				"id"          => "dots_theme",
				"std"         => "dark",
				'type'        => 'select',
				'options'        => array(
					'dark' => __( "Dark", 'dannys-restaurant' ),
					'light' => __( "Light", 'dannys-restaurant' ),
				),
				"dependency"  => array( 'element' => 'dots' , 'value'=> array('yes') ),
			),


			// bullets style
			// thumbs
			// thumbs on hover
			// caption options

		),
	),

	'help' => znpb_get_helptab( array(
		// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#O03njJEtSNQ',
		'copy'    => $uid,
		'general' => true,
		'custom_id' => true,
	)),

);
