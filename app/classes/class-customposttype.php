<?php
    class customPostType{
        public static function make_product_custom_post_type(){
            $labels = array(
                'name'                  => _x( 'محصولات', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'محصول', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'محصولات', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'محصول', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'اضافه کردن', 'textdomain' ),
                'add_new_item'          => __( 'اضافه کردن محصول جدید', 'textdomain' ),
                'new_item'              => __( 'محصول جدید', 'textdomain' ),
                'edit_item'             => __( 'ویرایش محصول', 'textdomain' ),
                'view_item'             => __( 'نمایش محصول', 'textdomain' ),
                'all_items'             => __( 'تمام محصولات', 'textdomain' ),
                'search_items'          => __( 'جستوجوی محصولات', 'textdomain' ),
                'parent_item_colon'     => __( 'محصولات والد:', 'textdomain' ),
                'not_found'             => __( 'محصولی یافت نشد.', 'textdomain' ),
                'not_found_in_trash'    => __( 'در زباله دان محصولی یافت نشد.', 'textdomain' ),
                'featured_image'        => _x( 'عکس کاور محصول', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'set_featured_image'    => _x( 'تنظیم عکس کاور', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'پاک کردن عکس کاور', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'استفاده به عنوان عکس کاور', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'archives'              => _x( 'آرشیو های محصول', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
                'insert_into_item'      => _x( 'اضافه کردن به محصول', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
                'uploaded_to_this_item' => _x( 'بارگزاری در این محصول', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
                'filter_items_list'     => _x( 'فیلتر کردن لیست محصولات', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
                'items_list_navigation' => _x( 'نواربار لیست محصولات', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
                'items_list'            => _x( 'لیست محصولات', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
            );
            $args = array(
                'labels'             => $labels,
                'taxonomies'         => array('category','post_tag'),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'product' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            );
            register_post_type( 'product', $args );
        }
    }