<?php
    include('includes/aq_resizer.php');

    add_action( 'after_setup_theme', 'gwm_theme_setup' );
    function gwm_theme_setup() {
        load_theme_textdomain( 'gwm_theme', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        global $content_width;
        if ( !isset( $content_width ) ) { $content_width = 1920; }
        register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'gwm_theme' ) ) );
    }

    add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
    function blankslate_document_title_separator( $sep ) {
        $sep = '|';
        return $sep;
    }

    add_filter( 'the_title', 'blankslate_title' );
    function blankslate_title( $title ) {
        if ( $title == '' ) {
            return '...';
        } else {
            return $title;
        }
    }

    add_action( 'wp_enqueue_scripts', 'gwm_theme_enqueue' );
    function gwm_theme_enqueue() {
        wp_enqueue_style( 'gwm_theme-style', get_stylesheet_uri() );
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('bxslider', get_template_directory_uri() . '/assets/css/jquery.bxslider.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), rand(111,9999), 'all');
		wp_enqueue_style('style-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 1.0, true);
        wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array ( 'jquery' ), 1.0, true);
		wp_enqueue_script( 'script-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', true);
        wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), rand(111,9999), 'all');
    }

    // bootstrap 5 wp_nav_menu walker
    class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
    {
        private $current_item;
        private $dropdown_menu_alignment_values = [
            'dropdown-menu-start',
            'dropdown-menu-end',
            'dropdown-menu-sm-start',
            'dropdown-menu-sm-end',
            'dropdown-menu-md-start',
            'dropdown-menu-md-end',
            'dropdown-menu-lg-start',
            'dropdown-menu-lg-end',
            'dropdown-menu-xl-start',
            'dropdown-menu-xl-end',
            'dropdown-menu-xxl-start',
            'dropdown-menu-xxl-end'
        ];

        function start_lvl(&$output, $depth = 0, $args = null)
        {
            $dropdown_menu_class[] = '';
            foreach($this->current_item->classes as $class) {
                if(in_array($class, $this->dropdown_menu_alignment_values)) {
                    $dropdown_menu_class[] = $class;
                }
            }
            $indent = str_repeat("\t", $depth);
            $submenu = ($depth > 0) ? ' sub-menu' : '';
            $output .= "\n$indent<div class=\"dropdown-wrapper dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\"><span class=\"close\"></span><ul>\n";
        }

        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $this->current_item = $item;

            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty($item->classes) ? array() : (array) $item->classes;

            $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
            $classes[] = 'nav-item';
            $classes[] = 'nav-item-' . $item->ID;
            if ($depth && $args->walker->has_children) {
                $classes[] = 'dropdown-menu-end';
            }

            $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
            $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
            $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }

    /**
     * Register option page
     *
     * @return void
     */
    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'BPO settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }

    add_action( 'after_setup_theme', 'gwm_theme_setup' );

    add_action( 'widgets_init', 'gwm_theme_widgets_init' );
    function gwm_theme_widgets_init() {
        register_sidebar( array(
            'name' => esc_html__( 'Footer Column 1', 'gwm_theme' ),
            'id' => 'footer_menu_1',
            'before_widget' => '<div class="col-6 col-md-2 col-lg-2 footer-list-item">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        ));

        register_sidebar( array(
            'name' => esc_html__( 'Footer Column 2', 'gwm_theme' ),
            'id' => 'footer_menu_2',
            'before_widget' => '<div class="col-6 col-md-2 col-lg-2 footer-list-item">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        ));

        register_sidebar( array(
            'name' => esc_html__( 'Footer Column 3', 'gwm_theme' ),
            'id' => 'footer_menu_3',
            'before_widget' => '<div class="col-6 col-md-2 col-lg-2 footer-list-item">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        ));

        register_sidebar( array(
            'name' => esc_html__( 'Footer Column 4', 'gwm_theme' ),
            'id' => 'footer_menu_4',
            'before_widget' => '<div class="col-6 col-md-2 col-lg-2 footer-list-item">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        ));

        register_sidebar( array(
            'name' => esc_html__( 'Footer Column 5', 'gwm_theme' ),
            'id' => 'footer_menu_5',
            'before_widget' => '<div class="col-6 col-md-2 col-lg-2 footer-list-item">',
            'after_widget' => '</div>',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        ));
    }

    add_action('admin_head', 'my_custom_fonts');

    function my_custom_fonts() {
      echo '<style>
        .layout .acf-fc-layout-handle {
            background-color: rgb(29 124 186);
            color: #fff !important;
        }
      </style>';
    }
