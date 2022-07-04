//Make seller registration form selected by default
remove_action( 'woocommerce_register_form', 'dokan_seller_reg_form_fields' );
add_action( 'woocommerce_register_form', 'dokan_seller_reg_form_fields_modified',11 );

function dokan_seller_reg_form_fields_modified() {
    $postdata = wc_clean( $_POST );
    $role = isset( $postdata['role'] ) ? $postdata['role'] : 'seller';
    $role_style = ( $role == 'customer' ) ? 'display:none' : '';

    dokan_get_template_part( 'global/seller-registration-form', '', array(
        'postdata' => $postdata,
        'role' => $role,
        'role_style' => $role_style
    ) );
}

#-- Load Vendor Registration form script --#
function load_vendor_registration_form_script(){
    ?>

    <style>
        p.vendor-customer-registration label{display: none !important;}
    </style>

    <script>
        
        jQuery( window ).load( function(){
            jQuery('.show_if_seller input').removeAttr( 'disabled' );
        } )

    </script>

    <?php
}
add_action( 'woocommerce_register_form', 'load_vendor_registration_form_script' );
