<?php

function pk_checkout() {
    // Show non-cart errors
    wc_print_notices();

    // Check cart has contents
    if (sizeof(WC()->cart->get_cart()) == 0) {
        return;
    }

    // Check cart contents for errors
    do_action('woocommerce_check_cart_items');

    // Calc totals
    WC()->cart->calculate_totals();

    // Get checkout object
    $checkout = WC()->checkout();

    if (empty($_POST) && wc_notice_count('error') > 0) {

        wc_get_template('checkout/cart-errors.php', array('checkout' => $checkout));
    } else {

        $non_js_checkout = !empty($_POST['woocommerce_checkout_update_totals']) ? true : false;

        if (wc_notice_count('error') == 0 && $non_js_checkout)
            wc_add_notice(__('The order totals have been updated. Please confirm your order by pressing the Place Order button at the bottom of the page.', 'woocommerce'));

//        wc_get_template('checkout/form-checkout.php', array('checkout' => $checkout));
        wc_get_template('../../../themes/amazona/include/pk-form-checout.php', array('checkout' => $checkout));
    }
}



function get_the_category_wc( $id = false ) {
	$categories = get_the_terms( $id, 'product_cat' );
	if ( ! $categories || is_wp_error( $categories ) )
		$categories = array();

	$categories = array_values( $categories );

	foreach ( array_keys( $categories ) as $key ) {
		_make_cat_compat( $categories[$key] );
	}

	/**
	 * Filter the array of categories to return for a post.
	 *
	 * @since 3.1.0
	 *
	 * @param array $categories An array of categories to return for the post.
	 */
	return apply_filters( 'get_the_categories', $categories );
}


// Hook for adding admin menus
add_action('admin_menu', 'pkconfig_tool');

// action function for above hook
function pkconfig_tool() {
    // Add a new submenu under Settings:
//    add_options_page(__('pkconfig','menu-test'), __('pkconfig','menu-test'), 'manage_options', 'pkconfig', 'pkconfig');
    add_menu_page(__('Configuraciones', 'menu-test'), __('Configuraciones ', 'menu-test'), 'manage_options', 'pkconfig', 'pkconfig_settings');

    // Add a submenu to the custom top-level menu:
    add_submenu_page('pkconfig', __('Extras', 'menu-test'), __('Extras', 'menu-test'), 'manage_options', 'extra', 'pk_sublevel_page');

    // Add a second submenu to the custom top-level menu:
//    add_submenu_page('pkconfig', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'pk_sublevel_page2');
}

// mt_settings_page() displays the page content for the Test settings submenu
function pkconfig_settings() {
    //must check that the user has the required capability 
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene los permisos necesarios para acceder a esta página.'));
    }

    // variables for the field and option names 
    $opt_name = 'pk_pkconfig';
    $facebook = 'facebook';
    $twitter = 'twitter';
    $instagram = 'instagram';
    $google = 'google';
    $email = 'email';
    $tlf = 'tlf';
    $direc = 'direc';


    // Read in existing option value from database
    $opt_val = get_option($opt_name);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if (isset($_POST[$facebook])) {

        // Read their posted value
        $opt_val = json_encode($_POST);

        // Save the posted value in the database
        update_option($opt_name, $opt_val);

        //debug($opt_val, false);
        // Put an settings updated message on the screen
        ?>
        <div class="updated"><p><strong><?php _e('Datos guardados con exito.', 'menu-test'); ?></strong></p></div>
        <?php
    }
    $db = json_decode($opt_val);
//    debug($db, false);
//    
    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __('Menu Informaci&oacute;n de Contacto', 'menu-test') . "</h2>";

    // settings form
    ?>
    <form name="form1" method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label><?php _e("Facebook URL:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="url" name="<?php echo $facebook; ?>" value="<?php echo $db->facebook; ?>" size="70">
                    <!--<p class="description">Colocar la url de Facebook</p>-->
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Twitter URL:", 'menu-test'); ?> </label>
                </th>
                <td>
                    <input type="url" name="<?php echo $twitter; ?>" value="<?php echo $db->twitter; ?>" size="70">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Google+ URL:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="url" name="<?php echo $google; ?>" value="<?php echo $db->youtube; ?>" size="70">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Instagram URL:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="url" name="<?php echo $instagram; ?>" value="<?php echo $db->youtube; ?>" size="70">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Correo:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo $email; ?>" value="<?php echo $db->email; ?>" size="70">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Tel&eacute;fono:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo $tlf; ?>" value="<?php echo $db->tlf; ?>" size="70">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e("Direcci&oacute;n:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo $direc; ?>" value="<?php echo $db->direc; ?>" size="70">
                </td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>

    </form>

    <?php
// debug($_REQUEST, false);
//    echo "<h2>" . __( 'Configuraciones Generales', 'menu-test' ) . "</h2>";

    echo "</div>"; //wrap
}
function pk_sublevel_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene los permisos necesarios para acceder a esta página.'));
    }
    // variables for the field and option names 
    $opt_name = 'xtras';
    $name_from = 'content';
    $titulo = 'titulo';


    // Read in existing option value from database
    $opt_val = get_option($opt_name);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
//    debug($_POST);
    if (isset($_POST[$name_from])) {

        // Read their posted value
        $opt_val = json_encode($_POST);

        // Save the posted value in the database
        update_option($opt_name, $opt_val);

        //debug($opt_val, false);
        // Put an settings updated message on the screen
        ?>
        <div class="updated"><p><strong><?php _e('Datos guardados con exito.', 'menu-test'); ?></strong></p></div>
        <?php
    }
    $db = json_decode($opt_val);
//    debug($db, false);
//    
    // Now display the settings editing screen
echo '<div class="wrap">';

    // header

    echo "<h2>" . __('Textos Extras', 'menu-test') . "</h2>";

    // settings form
    ?>
    <form name="form1" method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label><?php _e("Titulo:", 'menu-test'); ?></label>
                </th>
                <td>
                    <input type="text" name="<?php echo $titulo; ?>" value="<?php echo $db->titulo; ?>" size=""0>
                </td>
                <tr>
                <th scope="row">
                        <label><?php _e("Contenido Principal:", 'menu-test'); ?></label>
                        </th>
                <td>
                        <?php
                        if ($content != '') {
                            
                        } else {
                            $content = $db->content;
                        }//name del editor  
                        ?>
                        <?php
                        $setting_editor = array(
                            'wpautop' => false, //false para que agrege los parrafos (<p>) automaticamente al dar salto de linea
                            'media_buttons' => false, // false para desastivar el botton de subir archivo
                            'textarea_name' => $name_from, //name del texarea
                            'textarea_rows' => get_option('default_post_edit_rows', 15), // este es para el alto por lineas del texarea
//                                'tabindex' => '',
//                                'editor_css' => '',
//                                'editor_class' => '',
                            'teeny' => false, // true para desastivar el more
//                                'dfw' => false,
//                                'tinymce' => true,
                            'quicktags' => false, // false para desastivar las pestañas de (Visual/Texto)
//                                'drag_drop_upload' => false,
                        );
                        ?>
                        <?php wp_editor($content, $name_from, $setting_editor); ?>

                    </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>

    </form>

    <?php
}









function select_pkconfig() {
//    mt_pkconfig
    $opt_name = 'pk_pkconfig';
    return $opt_val = get_option($opt_name);
//    update_option($opt_name, $config);
}
function select_xtras() {
//    mt_pkconfig
    $opt_name = 'xtras';
    return $opt_val = get_option($opt_name);
//    update_option($opt_name, $config);
}

class MY_YITH extends YITH_WCWL_UI{

    public static function add_to_wishlist_button_juan( $url, $product_type, $exists ) {
        global $yith_wcwl, $product;

        $label = apply_filters( 'yith_wcwl_button_label', get_option( 'yith_wcwl_add_to_wishlist_text' ) );
        $icon = get_option( 'yith_wcwl_add_to_wishlist_icon' ) != 'none' ? '<i class="' . get_option( 'yith_wcwl_add_to_wishlist_icon' ) . '"></i>' : '';
        return '<a href="' . esc_url( $yith_wcwl->get_addtowishlist_url() ) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><div class="producto-wishlist"></div></a>';
    }
    public static function add_to_wishlist_button( $url, $product_type, $exists ) {
        global $yith_wcwl, $product;

        $label = apply_filters( 'yith_wcwl_button_label', get_option( 'yith_wcwl_add_to_wishlist_text' ) );
        $icon = get_option( 'yith_wcwl_add_to_wishlist_icon' ) != 'none' ? '<i class="' . get_option( 'yith_wcwl_add_to_wishlist_icon' ) . '"></i>' : '';

        $classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'class="add_to_wishlist single_add_to_wishlist button alt"' : 'class="add_to_wishlist"';

        $html  = '<div class="yith-wcwl-add-to-wishlist">';
        $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row

        $html .= $exists ? ' hide" style="display:none;"' : ' show"';

        $html .= '><a href="' . esc_url( $yith_wcwl->get_addtowishlist_url() ) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><div class="producto-wishlist"></div></a>';
//        $html .= '<img src="' . esc_url( admin_url( 'images/wpspin_light.gif' ) ) . '" class="ajax-loading" id="add-items-ajax-loading" alt="" width="16" height="16" style="visibility:hidden" />';
        $html .= '</div>';

        $html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="' . esc_url( $url ) . '"></a></div>';
        $html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . esc_url( $url ) . '"></a></div>';
        $html .= '<div style="clear:both"></div><div class="yith-wcwl-wishlistaddresponse"></div>';

        $html .= '</div>';
        $html .= '<div class="clear"></div>';

        return $html;
	}
        
        
    public static function add_to_cart_button( $product_id, $stock_status ) {
        global $yith_wcwl;

        if ( function_exists( 'get_product' ) )
            $product = get_product( $product_id );
        else
            $product = new WC_Product( $product_id );

        $url = $product->product_type == 'external' ? $yith_wcwl->get_affiliate_product_url( $product_id ) : $yith_wcwl->get_addtocart_url( $product_id );
        $label = $product->product_type == 'variable' ? apply_filters( 'variable_add_to_cart_text', __('Select options', 'yit') ) : apply_filters( 'yith_wcwl_add_to_cart_label', get_option( 'yith_wcwl_add_to_cart_text' ) );
        $icon = get_option( 'yith_wcwl_use_button' ) == 'yes' && get_option( 'yith_wcwl_add_to_cart_icon' ) != 'none' ? '<i class="' . get_option( 'yith_wcwl_add_to_cart_icon' ) . '"></i>' : '';

        $cartlink = '';
        $redirect_to_cart = get_option( 'yith_wcwl_redirect_cart' ) == 'yes' && $product->product_type != 'variable' ? 'true' : 'false';
        $style = ''; //indicates the style (background-color and font color)

        if( get_option( 'yith_wcwl_use_button' ) == 'yes' ) {
            if( $product->product_type == 'external' ) {
                $cartlink .= '<a target="_blank" class="add_to_cart button alt" href="' . $url . '"';
            } else {
                $js_action = esc_attr( 'check_for_stock(\'' . $url . '\',\'' . $stock_status . '\',\'' . $redirect_to_cart . '\');' );
                $cartlink .= '<a class="add_to_cart button alt" onclick="' . $js_action . '"';
            }

            $cartlink .= $style . '>' . $icon . $label . '</a>';
        } else {
            if( $product->product_type == 'external' ) {
                $cartlink .= '<a target="_blank" class="add_to_cart button alt" href="' . $url . '">' . $icon . $label . '</a>';
            } else {
                $js_action = esc_attr( 'check_for_stock(\'' . $url . '\',\'' . $stock_status . '\',\'' . $redirect_to_cart . '\');' );
                $cartlink .= '<a class="add_to_cart button alt" href="javascript:void(0);" onclick="' . $js_action . '">' . $icon . $label . '</a>';
            }
        }

        return $cartlink;
    }
}