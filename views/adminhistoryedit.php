<?php if( !defined('ABSPATH') ) die(); ?>
<div class="wrap">
  <h2>PayPal Express Checkout - Edit payment status</h2>
  
  <p>
    <a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="Back to the payments history">&laquo; Back to the payments history</a>
  </p>
  
  <form method="post" action="<?php echo $config->getItem('plugin_history_url'); ?>">
    <table class="form-table">
      <tbody>
        <tr class="form-field">
          <th scope="row"><label for="status"><strong>Payment status:</strong></label></th>
          <td>
            <select name="status">
              <option <?php echo $details->status == 'success' ? 'selected="selected"' : ''; ?> value="success">Success</option>
              <option <?php echo $details->status == 'pending' ? 'selected="selected"' : ''; ?> value="pending">Pending</option>
              <option <?php echo $details->status == 'failed' ? 'selected="selected"' : ''; ?> value="failed">Failed</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="hidden" name="id" value="<?php echo (int)$_GET['id']; ?>" />
      <input type="submit" value="Save" class="button-primary" />
    </p>
  
  <p>
    <a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="Back to the payments history">&laquo; Back to the payments history</a>
  </p>
</div><!-- .wrap -->