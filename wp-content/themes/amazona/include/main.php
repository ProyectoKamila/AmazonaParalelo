<?php
add_action('login_head', 'custom_login_logo');
add_action('init', 'theme_custom_types');
add_filter('admin_footer_text', 'left_admin_footer_text_output');
add_filter('update_footer', 'right_admin_footer_text_output', 11);
add_action('wp_dashboard_setup', 'custom_dashboard_widgets');


//add_action('wp_dashboard_setup', 'add_dashboard_widgets');
//add_action('admin_init', 'register_meta_boxes');
add_theme_support('category-thumbnails');
add_theme_support('post-thumbnails');
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
            array(
        'label' => 'Imagen Misi$oacute;n',
        'id' => 'secondary-image',
        'post_type' => 'post'
            )
    );
}
if (class_exists('MultiPostThumbnails')) :
    MultiPostThumbnails::the_post_thumbnail(
            get_post_type(), 'secondary-image'
    );
endif;

function debug($var, $stop = true) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($stop)
        exit;
}

//Funcion que permite crear los Post Type
function add_custom_post_type($params, $generic = false) {


    if (is_int($params)) {
        global $post_types;
        $params = $post_types[$params];
    }

    if (!is_array($params)) {
        $params = array('type' => $params);
    }

    if ($generic) {
        $params = array_merge($params, array('singular' => 'publicaci&oacute;n',
            'plural' => 'publicaciones',
            'genero' => 'f'));
        if (!isset($params['supports'])) {
            $params['supports'] = array('title', 'editor', 'thumbnail');
        }
    }

    $type = $params['type'];
    $singular = (@$params['singular']) ? $params['singular'] : $type;
    $plural = (@$params['plural']) ? $params['plural'] : $singular . 's';
    $genero = (@$params['genero']) ? $params['genero'] : 'm';
    $supports = (@$params['supports']) ? $params['supports'] : array('title', 'editor', 'thumbnail');
    $menu_name = (@$params['menu_name']) ? $params['menu_name'] : ucfirst($plural);

    $labels = array(
        'name' => _x(ucfirst($plural), 'post type general name'),
        'singular_name' => _x(ucfirst($singular), 'post type singular name'),
        'add_new' => _x('A&ntilde;adir ' . (($genero == 'm') ? 'Nuevo' : 'Nueva'), $singular),
        'add_new_item' => 'A&ntilde;adir ' . (($genero == 'm') ? 'Nuevo' : 'Nueva') . ' ' . ucfirst($singular),
        'edit_item' => 'Editar ' . ucfirst($singular),
        'new_item' => (($genero == 'm') ? 'Nuevo' : 'Nueva') . ' ' . ucfirst($singular),
        'all_items' => (($genero == 'm') ? 'Todos los' : 'Todas las') . ' ' . ucfirst($plural),
        'view_item' => 'Ver ' . ucfirst($singular),
        'search_items' => 'Buscar ' . ucfirst($plural),
        'not_found' => 'No se encontaron ' . $plural,
        'not_found_in_trash' => 'No se encontaron ' . $plural . ' en la papelera',
        'parent_item_colon' => '',
        'menu_name' => $menu_name
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => $supports
    );
    register_post_type($params['type'], $args); //muestra la barra de la categoria, debe ser el mismo nombre del archivo php
}

//Funcion que permite crear las Categorias de los Post Type

function add_custom_taxonomy($params) {
    if (!is_array($params)) {
        $params = array('name' => $params);
    }
    $name = $params['name'];
    $singular = ($params['singular']) ? $params['singular'] : $name;
    $plural = isset($params['plural']) ? $params['plural'] : $singular . 's';
    $genero = ($params['genero']) ? $params['genero'] : 'm';
    $menu_name = isset($params['menu_name']) ? $params['menu_name'] : ucfirst($plural);

    $labels = array(
        'name' => _x(ucfirst($plural), 'taxonomy general name'),
        'singular_name' => _x(ucfirst($singular), 'taxonomy singular name'),
        'search_items' => __('Buscar ' . $plural),
        'all_items' => (($genero == 'm') ? 'Todos los' : 'Todas las') . ' ' . ucfirst($plural),
        'parent_item' => __('Parent ' . $singular),
        'parent_item_colon' => __('Parent ' . $singular . ':'),
        'edit_item' => 'Editar ' . ucfirst($singular),
        'update_item' => 'Actualizar ' . $singular,
        'add_new_item' => (($genero == 'm') ? 'Nuevo' : 'Nueva') . ' ' . ucfirst($singular),
        'new_item_name' => (($genero == 'm') ? 'Nuevo' : 'Nueva') . ' ' . ucfirst($singular),
        'menu_name' => $menu_name
    );


    if (isset($params['post_type']) && !is_array($params['post_type'])) {
        $post_type = array($params['post_type']);
    } elseif (isset($params['post_type']) && is_array($params['post_type'])) {
        $post_type = $params['post_type'];
    } else {
        $post_type = 'post';
    }

    $hierarchical = ($params['hierarchical']) ? $params['hierarchical'] : false;

    register_taxonomy($name, $post_type, array(
        'hierarchical' => $hierarchical,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $name),
    ));
}

//Funcion que permite Cambiar el logo al iniciar sesion

function custom_login_logo() {
    $path = explode('/', get_bloginfo('template_directory'));
    $path[] = 'images';
    $ruta = ABSPATH . implode('/', array_slice($path, count($path) - 4)) . '/';
    if (!(file_exists($ruta . 'login_logo.png'))) {

        if (!is_dir($ruta))
            mkdir($ruta, 0777, true);

        $is_copied = @copy('http://proyectokamila.com/logo_in.png', $ruta . 'login_logo.png');

        if (!$is_copied) {
            $source = file_get_contents('http://proyectokamila.com/logo_in.png');
            $destiny = @fopen($ruta . 'login_logo.png', 'w');
            @fwrite($destiny, $source);
            @fclose($destiny);
        }
    }
    echo '<style type="text/css">h1 a { background-image:url(' . get_bloginfo('template_directory') . '/images/login_logo.png) !important; }</style>';
}

function left_admin_footer_text_output($text) {
    $text = get_bloginfo();
    return $text;
}

function right_admin_footer_text_output($text) {
    $text = 'Web Desarrollada por <a href="http://www.proyectokamila.com" target="_blank">Proyectokamila.com</a>';
    return $text;
}

if (!current_user_can('edit_users')) {
    add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

function custom_dashboard_widgets() {
    global $wp_meta_boxes;
    // var_dump( $wp_meta_boxes['dashboard'] );  
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

function theme_custom_types() {
    add_custom_post_type(array(
        'type' => 'banner',
        'plural' => 'banner',
//    'supports' => array('thumbnail', 'title'),
    ));
    add_custom_taxonomy(array(
        'name' => 'category_banner',
        'singular' => 'Categoria',
        'genero' => 'f',
        'post_type' => 'banner',
        'hierarchical' => true
    ));
}

function pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<ul class=\"pagination p\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a class=\"home\" href='" . get_pagenum_link(1) . "'' aria-label='Next'><span aria-hidden='true'> &gt; </span></a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a class=\"after\" href='" . get_pagenum_link($paged - 1) . "'' aria-label='Next'><span aria-hidden='true'> &gt; </span></a></li>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><span class=\"current\">" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"page-numbers\"> " . $i . "</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<li><a class=\"before\" href=\'" . get_pagenum_link($paged + 1) . "'><span aria-hidden='true'> &gt; </span></a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            ;
        echo "<li><a class=\"end\" href='" . get_pagenum_link($wp_query->max_num_pages) . "' aria-label='Next'><span aria-hidden='true'> &gt; </span></a></li>";
        echo "</ul>\n";
    }
}

// Hook for adding admin menus
add_action('admin_menu', 'pkconfig_divisa');

// action function for above hook
function pkconfig_divisa() {
    add_menu_page(__('Valor de Conversi&oacute;n', 'menu-test'), __('Valor de Conversi&oacute;n', 'menu-test'), 'manage_options', 'badge', 'pkconfig_divisa_options');
}

function pkconfig_divisa_options() {
    //must check that the user has the required capability 
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene los permisos necesarios para acceder a esta página.'));
    }

    // variables for the field and option names 
    $opt_name = 'mt_divisa';
    $divisa = 'divisa';


    $data_field_name = 'mt_divisa';

    // Read in existing option value from database
    $opt_val = get_option($opt_name);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if (isset($_POST[$divisa])) {

        // Read their posted value
        $opt_val = json_encode($_POST);

        // Save the posted value in the database
        update_option($opt_name, $opt_val);

        //debug($opt_val, false);
        // Put an settings updated message on the screen
        ?>
        <div class="updated"><p><strong><?php _e('settings saved.', 'menu-test'); ?></strong></p></div>
        <?php
    }
    $db = json_decode($opt_val);
//    debug($db->alert, false);
//    
    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

//    echo "<h2>" . __('Menu Test Plugin Settings', 'menu-test') . "</h2>";

    // settings form
    ?>
    <form name="form1" method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label><?php _e("Valor:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="number" name="<?php echo $divisa; ?>" value="<?php echo $db->divisa; ?>" size="70">
                    <p class="description">Configuraci&oacute;n del valor del dolar en Bolivares</p>
                </td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>

    </form>
    </div>

    <?php
// debug($_REQUEST, false);
}

function select_divisa($d = 'Bs.', $dato, $t = 1) {
//    mt_pkconfig
    $num = (float) $dato;
    $opt_name = 'mt_divisa';
    $opt_val = get_option($opt_name);
    $db = json_decode($opt_val);
    $numero = (float) $d . $db->divisa * $num * $t;
return number_format($numero, 2, ",", ".");
//    return $d . $db->divisa * $num * $t;
//    update_option($opt_name, $config);
}

function e_add_to_cart($product) {
    global $product;

    echo apply_filters('woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>', esc_url($product->add_to_cart_url()), esc_attr($product->id), esc_attr($product->get_sku()), esc_attr(isset($quantity) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr($product->product_type), esc_html($product->add_to_cart_text())
            ), $product);
}
