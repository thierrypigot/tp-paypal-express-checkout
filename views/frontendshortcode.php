<?php if( !defined('ABSPATH') ) die(); ?>
<form method="post" action="<?php echo $config->getItem('plugin_form_handler_url'); ?>">
  <input type="hidden" name="AMT" value="<?php echo $atts['amount']; ?>" />
  <input type="hidden" name="CURRENCYCODE" value="<?php echo $atts['currency']; ?>" />
  <?php if ( isset($atts['description']) ) { ?>
    <input type="hidden" name="PAYMENTREQUEST_0_DESC" value="<?php echo $atts['description']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['tax']) ) { ?>
    <input type="hidden" name="TAXAMT" value="<?php echo $atts['tax']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['shipping']) ) { ?>
    <input type="hidden" name="SHIPPINGAMT" value="<?php echo $atts['shipping']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['handling']) ) { ?>
    <input type="hidden" name="HANDLINGAMT" value="<?php echo $atts['handling']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['qty']) ) { ?>
    <input type="hidden" name="PAYMENTREQUEST_0_QTY" value="<?php echo $atts['qty']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['return_url']) ) { ?>
    <input type="hidden" name="RETURN_URL" value="<?php echo $atts['return_url']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['cancel_url']) ) { ?>
    <input type="hidden" name="CANCEL_URL" value="<?php echo $atts['cancel_url']; ?>" />
  <?php } ?>
  
  <?php if ( isset($atts['lang']) ) { ?>
    <input type="hidden" name="LOCALECODE" value="<?php echo $atts['lang']; ?>" />
  <?php } ?>
  
  <input type="hidden" name="func" value="start" />
  
  <?php if ( isset($atts['button_style']) ) { ?>
    <?php if ( $atts['button_style'] == 'buy_now' ) { ?>
      <input type="image" value="" src="<?php echo $config->getItem('buy_now_button_src'); ?>" />
    <?php } elseif ( $atts['button_style'] == 'checkout' ) { ?>
      <input type="image" value="" src="<?php echo $config->getItem('checkout_button_src'); ?>" />
    <?php } else { ?>
      <input type="image" value="" src="<?php echo $atts['button_style']; ?>" />
    <?php } ?>
  <?php } else { ?>
		<?php $button = "Pay with PayPal"; if ( isset($atts['button']) ) $button = $atts['button'] ?>
		<input type="submit" value="<?php echo $button; ?>" class="btn" />
  <?php } ?>
</form>