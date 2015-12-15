<?php
/*
Plugin Name: TP PayPal Express Checkout
Plugin URI: http://www.thierry-pigot.fr/
Description: Integration of PayPal Express Checkout - Ajout tracking analytics
Author: Thierry Pigot
Version: 2.1.4
Author URI: http://www.thierry-pigot.fr/
*/


require ABSPATH . 'wp-content/plugins/tp-paypal-express-checkout/classes/config.php';
require ABSPATH . 'wp-content/plugins/tp-paypal-express-checkout/classes/shortcode.php';
require ABSPATH . 'wp-content/plugins/tp-paypal-express-checkout/classes/paypal-express-checkout-admin.php';


/* Set base configuration */
$config = HCCoder_PayPalConfig::getInstance();

$config->addItem('plugin_id', 'tp-paypal-express-checkout');
$config->addItem('plugin_configuration_id', 'tp-paypal-express-checkout-configuration');
$config->addItem('plugin_shortcode_id', 'tp-paypal-express-checkout-shortcode');
$config->addItem('plugin_help_id', 'tp-paypal-express-checkout-help');
$config->addItem('plugin_history_id', 'tp-paypal-express-checkout-history');

$config->addItem('plugin_path', plugin_dir_path(__FILE__));
$config->addItem('views_path', $config->getItem('plugin_path') . 'views/');

$config->addItem('plugin_url', home_url('/wp-admin/admin.php?page=' . $config->getItem('plugin_id')));
$config->addItem('plugin_configuration_url', home_url('/wp-admin/admin.php?page=' . $config->getItem('plugin_configuration_id')));
$config->addItem('plugin_shortcode_url', home_url('/wp-admin/admin.php?page=' . $config->getItem('plugin_shortcode_id')));
$config->addItem('plugin_help_url', home_url('/wp-admin/admin.php?page=' . $config->getItem('plugin_help_id')));
$config->addItem('plugin_history_url', home_url('/wp-admin/admin.php?page=' . $config->getItem('plugin_history_id')));


$config->addItem('plugin_form_handler_url', home_url('/wp-content/plugins/' . $config->getItem('plugin_id') . '/form-handler.php'));

$config->addItem('plugin_name', 'PayPal');

$config->addItem('buy_now_button_src', 'http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif');
$config->addItem('checkout_button_src', 'https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif');


/**
 * Create admin menus
 */
function paypal_express_checkout_admin_menu()
{
    $config = HCCoder_PayPalConfig::getInstance();

    add_menu_page($config->getItem('plugin_name'), $config->getItem('plugin_name'), 'level_10', $config->getItem('plugin_id'), array('HCCoder_PayPalExpressCheckoutAdmin', 'adminIndex'), home_url('/wp-content/plugins/' . $config->getItem('plugin_id') . '/static/images/icon.png'));
    add_submenu_page($config->getItem('plugin_id'), 'Configuration', 'Configuration', 'level_10', $config->getItem('plugin_configuration_id'), array('HCCoder_PayPalExpressCheckoutAdmin', 'adminConfiguration'));
    add_submenu_page($config->getItem('plugin_id'), 'Shortcode', 'Shortcode', 'level_10', $config->getItem('plugin_shortcode_id'), array('HCCoder_PayPalExpressCheckoutAdmin', 'adminShortcode'));
    add_submenu_page($config->getItem('plugin_id'), 'Payments history', 'Payments history', 'level_10', $config->getItem('plugin_history_id'), array('HCCoder_PayPalExpressCheckoutAdmin', 'adminHistory'));
    add_submenu_page($config->getItem('plugin_id'), 'Help', 'Help', 'level_10', $config->getItem('plugin_help_id'), array('HCCoder_PayPalExpressCheckoutAdmin', 'adminHelp'));
}
add_action('admin_menu', 'paypal_express_checkout_admin_menu');


/**
 * Create shortcode
 */
add_shortcode('paypal', array('HCCoder_PayPalShortcode', 'frontendIndex'));


/**
 * Create table for payment history on plugin activation
 */
register_activation_hook(__FILE__, array('HCCoder_PayPalExpressCheckoutAdmin', 'pluginInstall'));