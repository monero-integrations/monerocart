<?php

class ModelExtensionPaymentMonero extends Model {

  public function install(){
    $this->db->query("
                       CREATE TABLE `" . DB_PREFIX . "order_monero` (
                         `order_id` int(11) NOT NULL,
                         `payment_id` varchar(255) NOT NULL,
                         PRIMARY KEY `order_id` (`order_id`)
                       ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
                   ");
  }

  public function uninstall(){
    $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "order_monero`;");
  }

}

?>
