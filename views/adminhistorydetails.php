<?php if( !defined('ABSPATH') ) die(); ?>
<div class="wrap">
  <h2>PayPal Express Checkout - Payment details</h2>
  
  <p>
    <a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="Back to the payments history">&laquo; Back to the payments history</a>
  </p>
  
  <table class="form-table">
    <tr>
      <th><strong>Status</strong></th>
      <td style="<?php echo $details->status == 'success' ? 'color:#339900;' : ''; ?>"><?php echo $details->status; ?></td>
    </tr>
    <tr>
      <th><strong>Date</strong></th>
      <td><?php echo date('Y-m-d H:i', $details->created); ?></td>
    </tr>
    <tr>
      <th><strong>Amount</strong></th>
      <td><?php echo $details->amount; ?></td>
    </tr>
    <tr>
      <th><strong>Currency</strong></th>
      <td><?php echo $details->currency; ?></td>
    </tr>
    <tr>
      <th><strong>Description</strong></th>
      <td><?php echo $details->description; ?></td>
    </tr>
    <tr>
      <th><strong>Firstname</strong></th>
      <td><?php echo $details->firstname; ?></td>
    </tr>
    <tr>
      <th><strong>Lastname</strong></th>
      <td><?php echo $details->lastname; ?></td>
    </tr>
    <tr>
      <th><strong>E-mail</strong></th>
      <td><?php echo $details->email; ?></td>
    </tr>
    <tr>
      <th><strong>API call result</strong></th>
      <td>
        <?php
        $summary = unserialize($details->summary);
        foreach ( $summary as $key => $value )
          echo "$key: $value<br />";
        ?>
      </td>
    </tr>
  </table>
  
  <p>
    <a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="Back to the payments history">&laquo; Back to the payments history</a>
  </p>
</div><!-- .wrap -->