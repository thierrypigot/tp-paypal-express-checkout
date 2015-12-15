<?php
session_start();

/**
 * Form posting handler
 */
require '../../../wp-load.php';
require ABSPATH . 'wp-content/plugins/tp-paypal-express-checkout/classes/paypalapi.php';

if (isset($_GET['func']) && $_GET['func'] == 'confirm' && isset($_GET['token']) && isset($_GET['PayerID'])) {
    $result = HCCoder_PayPalAPI::ConfirmExpressCheckout();

    if (isset($_SESSION['RETURN_URL'])) {
        $url = $_SESSION['RETURN_URL'];
        unset($_SESSION['RETURN_URL']);
        header('Location: ' . $url);
        exit;
    }

    $_SESSION['result'] = serialize($result);

    if (is_numeric(get_option('paypal_success_page')) && get_option('paypal_success_page') > 0)
        header('Location: ' . get_permalink(get_option('paypal_success_page')));
    else
        header('Location: ' . home_url());


    exit;
}


if (!count($_POST))
    trigger_error('Payment error code: #00001', E_USER_ERROR);

$allowed_func = array('start');

if (count($_POST) && (!isset($_POST['func']) || !in_array($_POST['func'], $allowed_func)))
    trigger_error('Payment error code: #00002', E_USER_ERROR);


if (count($_POST) && (!isset($_POST['AMT']) || !is_numeric($_POST['AMT']) || $_POST['AMT'] < 0))
    trigger_error('Payment error code: #00003', E_USER_ERROR);


switch ($_POST['func']) {
    case 'start':
        HCCoder_PayPalAPI::StartExpressCheckout();
        break;
}