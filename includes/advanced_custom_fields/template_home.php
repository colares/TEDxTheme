<?php
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id'         => 'acf-homepage',
        'title'      => 'Homepage',
        'fields'     => array(
            array(
                'key'           => 'field_52308ba9e3d1e',
                'label'         => 'Banner Title',
                'name'          => 'banner_title',
				'type'          => 'text',
				'instructions'  => 'Título da página',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
            ),
            array(
                'key'           => 'field_52308db23ee54',
                'label'         => 'Banner Subtitle',
                'name'          => 'banner_subtitle',
				'type'          => 'text',
				'instructions'  => 'Subtítulo da página',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
            ),
            array(
                'key'           => 'field_52308e299d57e',
                'label'         => 'Banner Callout Button Text',
                'name'          => 'banner_callout_button_text',
                'type'          => 'text',
                'instructions'  => 'Text for banner callout button',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
            array(
                'key'           => 'field_52308e299d99e',
                'label'         => 'Banner Callout Button Link',
                'name'          => 'banner_callout_button_link',
                'type'          => 'text',
                'instructions'  => 'The link (eg. http://google.com) where the homepage button should go',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
            array(
                'key'          => 'field_52308eca8bb53',
                'label'        => 'Banner Background',
                'name'         => 'banner_background',
                'type'         => 'image',
                'instructions' => 'Background image for the banner.',
                'save_format'  => 'url',
                'preview_size' => 'full',
                'library'      => 'all',
            ),
        ),
        'location'   => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page_templates/template_home.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options'    => array(
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}