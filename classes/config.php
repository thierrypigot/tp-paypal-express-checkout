<?php
/**
 * Config class
 *
 * Usage:
 * $config = HCCoder_PayPalConfig::getInstance();
 * $config->addItem('plugin_name', 'Test plugin');
 * echo $config->getItem('plugin_name');
 */
if ( ! class_exists('HCCoder_PayPalConfig') ) {

  final class HCCoder_PayPalConfig {
    private static $c_instance;
    private $c_items;
  
    /**
     * Private constructor, singleton pattern
     * @return void
     */
    private function __construct() {
      $this->c_items = array();    
    }
    
    /**
     * Initialize the object one time
     * @return object
     */
    public static function getInstance() {
      if ( ! self::$c_instance ) 
        self::$c_instance = new HCCoder_PayPalConfig();
  
      return self::$c_instance;
    }
    
    /**
     * Add new item to configs
     * @param $item_name: name of the item
     * @param $item_value: item value
     */
    public function addItem($item_name, $item_value) {
      if ( isset( $this->c_item[$item_name] ) )
        trigger_error('Config item already exists: '.$item_name, E_USER_ERROR);
        
      $this->c_item[$item_name] = $item_value;
    }
    
    /**
     * Get existing config item
     * @param $item_name: name of the item
     * @return void
     */
    public function getItem($item_name) {
      if ( isset( $this->c_item[$item_name] ) )
        return $this->c_item[$item_name];
        
      trigger_error('Config item does not exists: '.$item_name, E_USER_ERROR);
    }
  }
  
}