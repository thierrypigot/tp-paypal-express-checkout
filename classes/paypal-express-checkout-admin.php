<?php
/**
 * Our main class
 */
if ( ! class_exists('HCCoder_PayPalExpressCheckoutAdmin') ) {
  class HCCoder_PayPalExpressCheckoutAdmin {
  
    /**
     * Admin interface > overview
     */
    public function adminIndex() {
      $config = HCCoder_PayPalConfig::getInstance();
      require $config->getItem('views_path').'adminindex.php';
    }
    
    /**
     * Admin interface > configuration
     */
    public function adminConfiguration() {
      $config = HCCoder_PayPalConfig::getInstance();
      
      /* Save configuration */
      if ( count($_POST) ) {
        
        $environment_values = array('sandbox', 'live');
        if ( isset($_POST['environment']) && in_array($_POST['environment'], $environment_values) ) {
          update_option('paypal_environment', $_POST['environment']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['api_username']) && isset($_POST['api_password']) && isset($_POST['api_signature']) ) {
          update_option('paypal_api_username', $_POST['api_username']);
          update_option('paypal_api_password', $_POST['api_password']);
          update_option('paypal_api_signature', $_POST['api_signature']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['success_page']) && is_numeric($_POST['success_page']) && $_POST['success_page'] > 0 ) {
          update_option('paypal_success_page', $_POST['success_page']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['cancel_page']) && is_numeric($_POST['cancel_page']) && $_POST['cancel_page'] > 0 ) {
          update_option('paypal_cancel_page', $_POST['cancel_page']);
          $config_saved = TRUE;
        }
        
      }
      
      require $config->getItem('views_path').'adminconfiguration.php';
    }
    
    /**
     * Admin interface > shortcode
     */
    public function adminShortcode() {
      $config = HCCoder_PayPalConfig::getInstance();
      require $config->getItem('views_path').'adminshortcode.php';
    }
    
    /**
     * Admin interface > help
     */
    public function adminHelp() {
      $config = HCCoder_PayPalConfig::getInstance();
      require $config->getItem('views_path').'adminhelp.php';
    }
    
    /**
     * Admin interface > payments history
     */
    public function adminHistory() {
      $config = HCCoder_PayPalConfig::getInstance();
      global $wpdb;
      
      $allowed_statuses = array('success', 'pending', 'failed');
      if ( count($_POST) && isset($_POST['status']) && in_array($_POST['status'], $allowed_statuses) && isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 ) {
       $config_saved = TRUE;
       
       $update_data = array('status' => $_POST['status']);
       $where = array('id' => $_POST['id']);
        
       $update_format = array('%s');
        
       $wpdb->update('hccoder_paypal', $update_data, $where, $update_format);
      }
      
      if ( isset($_GET['action']) && $_GET['action'] == 'details' && is_numeric($_GET['id']) && $_GET['id'] > 0 ) {
        $details = $wpdb->get_row('SELECT hccoder_paypal.id,
                                    hccoder_paypal.amount,
                                    hccoder_paypal.currency,
                                    hccoder_paypal.status,
                                    hccoder_paypal.firstname,
                                    hccoder_paypal.lastname,
                                    hccoder_paypal.email,
                                    hccoder_paypal.description,
                                    hccoder_paypal.summary,
                                    hccoder_paypal.created
                                  FROM
                                    hccoder_paypal
                                  WHERE
                                    hccoder_paypal.id = '. (int)$_GET['id']);
        
        require $config->getItem('views_path').'adminhistorydetails.php';
      } elseif ( isset($_GET['action']) && $_GET['action'] == 'edit' && is_numeric($_GET['id']) && $_GET['id'] > 0 ) {
        $details = $wpdb->get_row('SELECT 
                                    hccoder_paypal.status
                                  FROM
                                    hccoder_paypal
                                  WHERE
                                    hccoder_paypal.id = '. (int)$_GET['id']);
        
        require $config->getItem('views_path').'adminhistoryedit.php';
      } else {
        $rows = $wpdb->get_results('SELECT hccoder_paypal.id,
                                    hccoder_paypal.amount,
                                    hccoder_paypal.currency,
                                    hccoder_paypal.status,
                                    hccoder_paypal.firstname,
                                    hccoder_paypal.lastname,
                                    hccoder_paypal.email,
                                    hccoder_paypal.description,
                                    hccoder_paypal.summary,
                                    hccoder_paypal.created
                                  FROM
                                    hccoder_paypal
                                  ORDER BY
                                    hccoder_paypal.id DESC');
      
        require $config->getItem('views_path').'adminhistory.php';
      }
    }
    
    /**
     * Create table for payment history
     */
    public static function pluginInstall() {
      global $wpdb;
      $wpdb->query('CREATE TABLE IF NOT EXISTS `hccoder_paypal` (
                    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                    `transaction_id` TEXT NOT NULL ,
                    `token` TEXT NOT NULL ,
                    `amount` FLOAT UNSIGNED NOT NULL ,
                    `currency` VARCHAR( 3 ) NOT NULL ,
                    `status` TEXT NOT NULL ,
                    `firstname` TEXT NOT NULL ,
                    `lastname` TEXT NOT NULL ,
                    `email` TEXT NOT NULL ,
                    `description` TEXT NOT NULL ,
                    `summary` TEXT NOT NULL ,
                    `created` INT( 4 ) UNSIGNED NOT NULL
                    ) ENGINE = MYISAM ;');
    }
    
  }
}