<?php

class ModelExtensionPaymentMonero extends Model {

  public function getMethod($address, $total){
    $this->language->load('extension/payment/monero');

   

    if ($total > 0){
      $status = true;
      } else {
      $status = false;
    }

    $method_data = array();

    if ($status){
      $method_data = array(
        'code' => 'Monero',
        'title' => $this->language->get('text_title'),
        'sort_order' => $this->config->get('monero_sort_order')
      );
    }

    return $method_data;
  }

  public function addMoneroOrder($order_id, $payment_id){
    $query = NULL;
    $sql_q = "";
    $sql_q  = "INSERT INTO `" . DB_PREFIX . "order_monero` (`order_id`, `payment_id`)";
    $sql_q .= " VALUES (" . (int)$order_id . ", '" . $payment_id . "')";
    $this->db->query($sql_q);
    return true;
  }

  public function getMoneroPaymentId($order_id){
    $query = NULL;
    $sql_q = "";
    $sql_q  = "SELECT `payment_id` FROM `" . DB_PREFIX . "order_monero` WHERE";
    $sql_q .= " `order_id` = " . (int)$order_id;
    $query = $this->db->query($sql_q)->rows;
    $payment_id = '';
    if (count($query) == 1){
      $status = true;
      foreach ($query as $result){
        $payment_id = $result['payment_id'];
      }
    }
    return $payment_id;
  }

}

?>
