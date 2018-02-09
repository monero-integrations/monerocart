<?php

class ControllerExtensionPaymentMonero extends Controller {

  public function index(){
    $this->load->library('monero');
    $this->load->model('extension/payment/monero');
    $this->load->model('checkout/order');
    $this->load->language('extension/payment/monero');
	
    $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

    $this->session->data['monero_wallet_address'] = $this->config->get('payment_monero_wallet_address');
    $this->session->data['monero_payment_id'] = "";
    $this->session->data['monero_order_id'] = $this->session->data['order_id'];
    $this->session->data['monero_total'] = floatval($order_info['total']);
    $this->session->data['monero_store_name'] = str_replace(' ', '%20', $order_info['store_name']);

    $data = array();

    return $this->load->view('extension/payment/monero', $data);
  }

  public function confirm(){
    $json = array();
		
    if ($this->session->data['payment_method']['code'] == 'monero'){
      $this->load->model('checkout/order');
      $this->load->model('extension/payment/monero');
      $this->load->language('extension/payment/monero');

      $comment  = $this->session->data['monero_wallet_address'] . '<br />';
      $comment .= $this->session->data['monero_payment_id'];

      $this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_monero_order_status_id'), $comment, true);
		
      $json['redirect'] = $this->url->link('extension/checkout/monero');
    }
	
    $this->response->addHeader('Content-Type: application/json');
    $this->response->setOutput(json_encode($json));		
  }

  public function api(){
    
  }

  public function cron(){
    $this->load->model('extension/payment/monero');
  }

}

?>
