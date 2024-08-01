<?php
if ( !defined('WPINC') ) {
    exit('Not allowed to access this file directly');
}


class Presser_Gallery_Plugin_For_Wp
{
    public function init()
    {
        add_action('init', array($this, 'registerPostType'));
        add_action('add_meta_boxes', array($this, 'AddMetaBox'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
    }

    function enqueueScripts($hook) {
        if ($hook == 'post-new.php' || $hook == 'post.php') {
            global $post;
            if ($post->post_type == 'presser_gallery') {
                wp_enqueue_media();
        }
    }
    }
    function AddMetaBox() {
       

        add_meta_box(
            'Presser_Gallery_Plugin',
            'Images',
            array($this, 'renderImgMetaBox'),
            'presser_gallery',
            'normal',
            'high'
        );
    }


    function renderImgMetaBox($post) {
        ob_start();
        include_once PRESSER_GALLERY_PLUGIN_FOR_WP_DIR.'/templates/add_images.php';
        $output = ob_get_clean();
        echo $output;
    }


    // Register Post Type
    function registerPostType()
    {
        $labels = array(
            'name'                  => _('Presser Gallery'),
            'singular_name'         => _x('Presser Gallery', 'Post type singular name', 'textdomain'),
            'menu_name'             => _x('Presser Gallery', 'Admin Menu text', 'textdomain'),
            'name_admin_bar'        => _x('Press', 'Add New on Toolbar', 'textdomain'),
            'add_new'               => __('Add New Presser', 'textdomain'),
            'add_new_item'          => __('Add New Presser', 'textdomain'),
            'new_item'              => __('New Presser', 'textdomain'),
            'edit_item'             => __('Edit Presser', 'textdomain'),
            'view_item'             => __('View Presser', 'textdomain'),
            'all_items'             => __('All Presser', 'textdomain'),
            'search_items'          => __('Search Presser', 'textdomain'),
            'parent_item_colon'     => __('Parent Presser:', 'textdomain'),
            'not_found'             => __('No Presser found.', 'textdomain'),
            'not_found_in_trash'    => __('No Presser found in Trash.', 'textdomain'),
            'featured_image'        => _x('Presser Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives'              => _x('Presser archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item'      => _x('Insert into Presser', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this Press', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list'     => _x('Filter Presser list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('Presser list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list'            => _x('Presser list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
        );

        $args = array(
            'label'              => 'Presser Gallery',
            'description'        => 'A plugin to display presser images',
            'labels'             => $labels,
            'supports'           => array( 'title'),
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
        );

        register_post_type('presser_gallery', $args);
    }

   
}

// initi
$init = new Presser_Gallery_Plugin_For_Wp();
$init->init();
