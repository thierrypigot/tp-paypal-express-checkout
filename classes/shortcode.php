<?php
/**
 * Shortcode class
 *
 * usage:
 * add_shortcode('your_shortcode_name', array('HCCoder_PayPalShortcode', 'frontendIndex'));
 */
if ( ! class_exists('HCCoder_PayPalShortcode') ) {

  class HCCoder_PayPalShortcode {
  
    public function frontendIndex($atts) {
      if ( ! isset($atts['amount']) || ( isset($atts['amount']) && ! is_numeric($atts['amount']) || $atts['amount'] < 0 ) )
        trigger_error('PayPal shortcode error: You need to specify the amount of the payment.', E_USER_ERROR);
      
      $supported_currencies = array('AUD', 'CAD', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'JPY', 'NOK', 'NZD', 'PLN', 'GBP', 'SGD', 'SEK', 'CHF', 'USD');      
      if ( ! isset($atts['currency']) || ! in_array($atts['currency'], $supported_currencies) )
        trigger_error('PayPal shortcode error: You need to specify the currency of the payment.', E_USER_ERROR);
        
      ob_start();
      
      $config = HCCoder_PayPalConfig::getInstance();
      
      require $config->getItem('views_path').'frontendshortcode.php';
      
      return ob_get_clean();
    }
  
  }
  
}