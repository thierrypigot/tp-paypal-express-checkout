<?php if( !defined('ABSPATH') ) die(); ?>
<div class="wrap">
  <h2>PayPal Express Checkout - Payments history</h2>
  
  <?php if ( ! count($rows) ) { ?>
    <div class="updated" id="message">
		  <p><strong>Payment history is empty.</strong></p>
		</div>
  <?php } else { ?>
  
    <?php if ( isset($config_saved) && $config_saved === TRUE ) { ?>
      <div class="updated" id="message">
        <p><strong>Payment updated.</strong></p>
      </div>
    <?php } ?>
  
    <p>
      Here you can see all payments made on your website.
    </p>
    <table cellspacing="0" class="wp-list-table widefat fixed">
      <thead>
        <tr>
          <th class="manage-column">Amount</th>
          <th class="manage-column">Currency</th>
          <th class="manage-column">Status</th>
          <th class="manage-column">Description</th>
          <th class="manage-column">Date</th>
          <th class="manage-column">Fistname</th>
          <th class="manage-column">Lastname</th>
          <th class="manage-column">E-mail</th>
        </tr>
      </thead>
    
      <tfoot>
        <tr>
          <th class="manage-column">Amount</th>
          <th class="manage-column">Currency</th>
          <th class="manage-column">Status</th>
          <th class="manage-column">Description</th>
          <th class="manage-column">Date</th>
          <th class="manage-column">Fistname</th>
          <th class="manage-column">Lastname</th>
          <th class="manage-column">E-mail</th>
        </tr>
      </tfoot>
    
      <tbody class="list:user" id="the-list">
        <?php foreach ( $rows as $row ) { ?>
          <tr class="alternate">
            <td class="role column-role"><?php echo $row->amount; ?></td>
            <td class="role column-role"><?php echo $row->currency; ?></td>
            <td class="username column-username">
              <strong style="<?php echo $row->status == 'success' ? 'color:#339900;' : ''; ?>"><?php echo $row->status; ?></strong><br />
              <div class="row-actions">
                <span class="edit"><a href="<?php echo $config->getItem('plugin_history_url').'&action=edit&id='.$row->id; ?>">Edit</a></span> | 
                <span class="edit"><a href="<?php echo $config->getItem('plugin_history_url').'&action=details&id='.$row->id; ?>">View details</a></span>
              </div>
            </td>
            <td class="role column-role"><?php echo $row->description; ?></td>
            <td class="role column-role"><?php echo date('Y-m-d H:i', $row->created); ?></td>
            <td class="role column-role"><?php echo $row->firstname; ?></td>
            <td class="role column-role"><?php echo $row->lastname; ?></td>
            <td class="role column-role"><?php echo $row->email; ?></td>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div><!-- .wrap -->