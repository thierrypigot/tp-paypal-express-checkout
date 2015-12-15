<?php if (!defined('ABSPATH')) die(); ?>

<div class="wrap">
    <h2>PayPal Express Checkout - Configuration</h2>

    <p>If you need help visit the <a href="<?php echo $config->getItem('plugin_help_url'); ?>" title="PayPal Help">Help</a> page.</p>


    <?php if (isset($config_saved) && $config_saved === TRUE) { ?>
        <div class="updated" id="message">
            <p><strong>Configuration updated.</strong></p>
        </div>
    <?php } ?>


    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
        <table class="form-table">
            <tbody>
            <tr class="form-field">
                <th scope="row"><label for="environment"><strong>PayPal environment:</strong></label></th>
                <td>
                    <select id="environment" name="environment">
                        <option value="">Please select</option>
                        <option
                            value="sandbox" <?php echo get_option('paypal_environment') == 'sandbox' ? 'selected="selected"' : ''; ?>>
                            Sandbox - Testing
                        </option>
                        <option
                            value="live" <?php echo get_option('paypal_environment') == 'live' ? 'selected="selected"' : ''; ?>>
                            Live - Production
                        </option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" value="Save" class="button-primary"/>
        </p>
    </form>

    <p>
        <strong>PayPal API credentials:</strong>
    </p>

    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
        <table class="form-table">
            <tbody>
            <tr class="form-field form-required">
                <th scope="row"><label for="api_username">API Username <span class="description">(required)</span></label></th>
                <td><input type="text" aria-required="true" value="<?php echo get_option('paypal_api_username'); ?>" id="api_username" name="api_username"></td>
            </tr>

            <tr class="form-field form-required">
                <th scope="row"><label for="api_password">API Password<span class="description">(required)</span></label></th>
                <td><input type="text" aria-required="true" value="<?php echo get_option('paypal_api_password'); ?>" id="api_password" name="api_password"></td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row"><label for="api_signature">API Signature<span class="description">(required)</span></label></th>
                <td><input type="text" aria-required="true" value="<?php echo get_option('paypal_api_signature'); ?>" id="api_signature" name="api_signature"></td>
            </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" value="Save" class="button-primary"/>
        </p>
    </form>

    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
        <table class="form-table">
            <tbody>
            <tr class="form-field">
                <th scope="row"><label for="success_page"><strong>Thank you page -<br/>after successful payment:</strong></label></th>
                <td>
                    <?php wp_dropdown_pages(array('name' => 'success_page', 'selected' => get_option('paypal_success_page'), 'show_option_none' => 'Please select')); ?>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row"><label for="cancel_page"><strong>Thank you page -<br/>after failed payment:</strong></label></th>
                <td>
                    <?php wp_dropdown_pages(array('name' => 'cancel_page', 'selected' => get_option('paypal_cancel_page'), 'show_option_none' => 'Please select')); ?>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" value="Save" class="button-primary"/>
        </p>
    </form>

</div><!-- .wrap -->