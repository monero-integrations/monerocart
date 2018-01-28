<?php

class ControllerExtensionCheckoutMonero extends Controller {

  public function index(){
    $order_trig = false;
    if (isset($this->session->data['order_id'])){
      $this->cart->clear();
      $order_trig = true;

      unset($this->session->data['shipping_method']);
      unset($this->session->data['shipping_methods']);
      unset($this->session->data['payment_method']);
      unset($this->session->data['payment_methods']);
      unset($this->session->data['guest']);
      unset($this->session->data['comment']);
      unset($this->session->data['order_id']);
      unset($this->session->data['coupon']);
      unset($this->session->data['reward']);
      unset($this->session->data['voucher']);
      unset($this->session->data['vouchers']);
      unset($this->session->data['totals']);
    }

    $this->load->language('extension/checkout/monero');

    $this->document->setTitle($this->language->get('heading_title'));

    $data['breadcrumbs'] = array();
    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_home'),
      'href' => $this->url->link('common/home')
    );
    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_basket'),
      'href' => $this->url->link('checkout/cart')
    );
    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_checkout'),
      'href' => $this->url->link('checkout/checkout', '', true)
    );
    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_payment'),
      'href' => $this->url->link('extension/checkout/monero')
    );

    $data['monero_payment_id'] = '';
    $data['monero_address'] = '';
    $data['text_total'] = '';
    $data['text_store_name'] = '';
    $data['monero_link'] = '';
    $data['monero_qr_link'] = '';

    if ($this->customer->isLogged()){
    }

    if (isset($this->session->data['monero_payment_id'])){
      $data['monero_payment_id'] = $this->session->data['monero_payment_id'];
    }
    if (isset($this->session->data['monero_wallet_address'])){
      $data['monero_address'] = $this->session->data['monero_wallet_address'];
    }
    if (isset($this->session->data['monero_total'])){
      $data['text_total'] = strval($this->session->data['monero_total']);
      $data['text_total_ext'] = sprintf("%01.4f", ($this->session->data['monero_total']));
    }
    if (isset($this->session->data['monero_store_name'])){
      $data['text_store_name'] = $this->session->data['monero_store_name'];
    }
	
    $data['monero_link']  = 'monero:' . $data['monero_address'];
    $data['monero_link'] .= '?amount=' . $data['text_total'];
    $data['monero_link'] .= '&payment_id=' . $data['monero_payment_id'];
    $data['monero_link'] .= '&label=' . $data['text_store_name'];

    $monero_qr_data  = 'monero:' . $data['monero_address'];
    $monero_qr_data .= '?amount=' . $data['text_total'];
    $monero_qr_data .= '&payment_id=' . $data['monero_payment_id'];
    $data['monero_qr_link']  = 'https://chart.googleapis.com/chart?cht=qr';
    $data['monero_qr_link'] .= '&chl=' . urlencode($monero_qr_data);
    $data['monero_qr_link'] .= '&chs=200x200&choe=UTF=8&chld=L';

    if ($order_trig){
      
     
      $data['column_left'] = $this->load->controller('common/column_left');
      $data['column_right'] = $this->load->controller('common/column_right');
      $data['content_top'] = $this->load->controller('common/content_top');
      $data['content_bottom'] = $this->load->controller('common/content_bottom');
      $data['footer'] = $this->load->controller('common/footer');
      $data['header'] = $this->load->controller('common/header');
      $data['continue'] = $this->url->link('extension/checkout/monero');
      $this->response->setOutput($this->load->view('extension/checkout/monero', $data));
      } else {
      unset ($this->session->data['monero_wallet_address']);
      unset ($this->session->data['monero_order_id']);
      unset ($this->session->data['monero_total']);
      unset ($this->session->data['monero_store_name']);
      $this->response->redirect($this->url->link('common/home'));
    }
  }

}

?>
