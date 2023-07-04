<?php 

function yourlang_setup(){
	wp_enqueue_style('slider', 'https://unpkg.com/swiper/swiper-bundle.min.css');
	wp_enqueue_style('mainstyle', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array(), microtime(), true );
    
}

add_action('wp_enqueue_scripts', 'yourlang_setup');

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );

add_theme_support('html5', 
	array('comment-list', 'comment-form', 'search-form')
);

function hero() {
	register_post_type('hero-item',
		array(
			'rewrite' => array('slug' => 'hero-items'),
			'labels' => array(
				'name' => 'Hero',
				'singular_name' => 'Hero-item',
				'edit_item' => 'Edit Hero-items'
			),
			'menu-icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'title', 'thumbnail', 'editor'
			)
		)
	);
};

add_action ('init', 'hero');

function about() {
	register_post_type('About-item',
		array(
			'rewrite' => array('slug' => 'about-items'),
			'labels' => array(
				'name' => 'About',
				'singular_name' => 'About-item',
				'edit_item' => 'Edit about-items'
			),
			'menu-icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'title', 'thumbnail', 'editor'
			)
		)
	);
};

add_action ('init', 'about');

function slider() {
	register_post_type('card',
		array(
			'rewrite' => array('slug' => 'cards'),
			'labels' => array(
				'name' => 'Slider',
				'singular_name' => 'Card',
				'add_new_item' => 'Add new card',
				'edit_item' => 'Edit Card'
			),
			'menu-icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'title', 'thumbnail', 'editor'
			)
		)
	);
};

add_action ('init', 'slider');


function service_plans() {
	register_post_type('service',
		array(
			'rewrite' => array('slug' => 'service plans'),
			'labels' => array(
				'name' => 'Service plans',
				'singular_name' => 'Service plan',
				'add_new_item' => 'Add service plan',
				'edit_item' => 'Edit service plan'
			),
			'menu-icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'title', 'custom-fields'
			)
		)
	);
};

function add_custom_fields_to_new_service_plan($post_id, $post, $update) {

    if ($post->post_type === 'service' && $update === false) {
        
        $custom_fields = array(
            'quantity of lessons' => '',
            'lesson duration' => '',
            'access to the materials' => '',
            'price' => ''
        );

        foreach ($custom_fields as $field_key => $field_value) {
            if (!metadata_exists('post', $post_id, $field_key)) {
                add_post_meta($post_id, $field_key, $field_value);
            }
        }
    }
}

add_action('save_post', 'add_custom_fields_to_new_service_plan', 10, 3);
add_action ('init', 'service_plans');

function contact() {
	register_post_type('contact',
		array(
			'rewrite' => array('slug' => 'contact'),
			'labels' => array(
				'name' => 'Contact',
				'singular_name' => 'contact-item',
				'edit_item' => 'Edit contact-item'
			),
			'menu-icon' => 'dashicons-clipboard',
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'title', 'thumbnail'
			)
		)
	);
};

add_action ('init', 'contact');