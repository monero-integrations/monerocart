<?php

class ControllerExtensionPaymentMonero extends Controller {

  private $error = array();

  public function index(){
      $this->load->language('extension/payment/monero');
      $this->document->setTitle($this->language->get('heading_title'));
      $this->load->model('setting/setting');

      if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
        $this->model_setting_setting->editSetting('payment_monero', $this->request->post);
        $this->session->data['success'] = $this->language->get('text_success');
        $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
        }

      if (isset($this->error['warning'])){
        $data['error_warning'] = $this->error['warning'];
        } else {
        $data['error_warning'] = '';
        }

      $data['breadcrumbs'] = array();
      $data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_home'),
        'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
      );
      $data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_extension'),
        'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
      );
      $data['breadcrumbs'][] = array(
        'text' => $this->language->get('heading_title'),
        'href' => $this->url->link('extension/payment/monero', 'user_token=' . $this->session->data['user_token'], true)
      );

      $data['action'] = $this->url->link('extension/payment/monero', 'user_token=' . $this->session->data['user_token'], true);
      $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

      $this->load->model('localisation/order_status');
      $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
	
      $this->load->model('localisation/geo_zone');
      $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

      $data['payment_monero_wallet_address'] = $this->config->get('payment_monero_wallet_address');
      $data['payment_monero_wallet_host'] = $this->config->get('payment_monero_wallet_host');
      $data['payment_monero_wallet_port'] = $this->config->get('payment_monero_wallet_port');
      $data['payment_monero_geo_zone_id'] = $this->config->get('payment_monero_geo_zone_id');
      $data['payment_monero_status'] = $this->config->get('payment_monero_status');
      $data['payment_monero_sort_order'] = $this->config->get('payment_monero_sort_order');

      $data['header'] = $this->load->controller('common/header');
      $data['column_left'] = $this->load->controller('common/column_left');
      $data['footer'] = $this->load->controller('common/footer');

      $this->response->setOutput($this->load->view('extension/payment/monero', $data));
  }

  public function install(){
    $this->load->model('extension/payment/monero');
    $this->load->model('setting/setting');
    $settings['payment_monero_wallet_address']			= '';
    $settings['payment_monero_wallet_host']				= 'localhost';
    $settings['payment_monero_wallet_port']				= '18082';
    $settings['payment_monero_geo_zone_id']				= '0';
    $settings['payment_monero_status']					= '0';
    $settings['payment_monero_sort_order']				= '0';
    $this->model_extension_payment_monero->install();
    $this->model_setting_setting->editSetting('payment_monero', $settings);
  }

  public function uninstall(){
    $this->load->model('extension/payment/monero');
    $this->model_extension_payment_monero->uninstall();
  }

  protected function validate(){
    if (!$this->user->hasPermission('modify', 'extension/payment/monero')){
      $this->error['warning'] = $this->language->get('error_permission');
    }

    if (!$this->error){
      return true;
      } else {
      return false;
    }
  }

}

?>
