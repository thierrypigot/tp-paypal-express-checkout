<?php if( !defined('ABSPATH') ) die(); ?>
<div class="wrap">
  <h2>PayPal Express Checkout - Shortcode</h2>
  
  <?php if ( get_option('paypal_api_username') == '' || get_option('paypal_api_password') == '' || get_option('paypal_api_signature') == '' ) { ?>
    <div class="updated" id="message">
		  <p><strong>Before you can use shortcode you need to set your PayPal API credentials, go to <a href="<?php echo $config->getItem('plugin_configuration_url'); ?>" title="configuration page">the configuration page</a>.</strong></p>
		</div>
  <?php } else { ?>
    <p>
      You can easily add PayPal Express Checkout to your pages with shortcode. Here you can see the shortcode options.<br />
      If you need help visit the <a href="<?php echo $config->getItem('plugin_help_url'); ?>" title="PayPal Help">Help</a> page.
    </p>
    
    <h3>Example #1</h3>
    <p>
      [paypal amount=30 currency=USD]
    </p>
    <p>
      Here you can found the supported currencies and currency codes. <a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes" target="_blank" title="Supported currencies">Supported currencies</a>.
    </p>
    
    <h3>Example #2</h3>
    <p>
      [paypal amount=30 currency=USD description="Buying item SKU:TEST_ITEM_SKU"]
    </p>
    
    <h3>Example #3</h3>
    <p>
      [paypal amount=30 currency=USD description="Buying item SKU:TEST_ITEM_SKU" tax=2 shipping=5 handling=1]
    </p>
    <p>
      If you want to pass floats in amount pass them in the following way:<br />
      [paypal amount="19.9" currency=USD description="Buying item SKU:TAX + HANDLING + SHIPPING" tax="1.9" shipping="3.9" handling="0.9"]
    </p>
    
    <h3>Example #4</h3>
    <p>
      [paypal amount=10 currency=USD description="Buying item SKU: QUANTITY = 4" qty=4]
    </p>
    
    <h3>Example #5</h3>
    <p><i>Add custom return and cancel URL to your buttons.</i></p>
    <p>
      [paypal amount=10 currency=USD return_url="http://hccoder.info/" cancel_url="http://www.google.com"]
    </p>
    
    <h3>Example #6</h3>
    <p><i>Customize button style.</i></p>
    <p>
      <strong>Buy now button:</strong><br />
      [paypal amount=10 currency=USD button_style="buy_now"]
    </p>
    <p>
      <strong>Output:</strong><br />
      <img src="<?php echo $config->getItem('buy_now_button_src'); ?>" />
    </p>
    
    <p>
      <strong>Checkout with PayPal button:</strong><br />
      [paypal amount=10 currency=USD button_style="checkout"]
    </p>
    <p>
      <strong>Output:</strong><br />
      <img src="<?php echo $config->getItem('checkout_button_src'); ?>" />
    </p>
    
    
  <?php } ?>
</div><!-- .wrap -->