<?php

class ControllerExtensionPaymentMonero extends Controller {
    private $payment_module_name  = 'monero';
	public function index() {
        	
    		//$this->load->model('payment/monero');
		$this->load->model('checkout/order');
		$order_id = $this->session->data['order_id'];
		$order = $this->model_checkout_order->getOrder($order_id);
		$current_default_currency = $this->config->get('config_currency');
		$order_total = $order['total'];
		$order_currency = $this->session->data['currency'];
		$amount_xmr = $this->changeto($order_total, $order_currency);
		
		$data['amount_xmr'] = $amount_xmr;
		//$data['integrated_address'] = $this->config->get("monero_address");
		$data['integrated_address'] = $this->make_integrated_address();
		$address = $this->config->get("monero_address");
		$data['url'] = "monero:".$address."";
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/monero.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/monero.tpl';
		} else {
			$this->template = 'default/template/payment/monero.tpl';
		}	
		        return $this->load->view('extension/payment/monero', $data);

		

	}
	
	public function changeto($order_total, $currency){
		$xmr_live_price = $this->xmrliveprice($currency);
		$amount_in_xmr = $order_total / $xmr_live_price ;
		return $amount_in_xmr;
	}
	
	public function xmrliveprice($currency){
		$url = "https://min-api.cryptocompare.com/data/price?fsym=XMR&tsyms=BTC,USD,EUR,CAD,INR,GBP&extraParams=monero_opencart";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		curl_close($curl);
		$price = json_decode($data, TRUE);
		
        switch ($currency) {
            case 'USD':
                return $price['USD'];
            case 'EUR':
                return $price['EUR'];
            case 'CAD':
                return $price['CAD'];
            case 'GBP':
                return $price['GBP'];
            case 'INR':
                return $price['INR'];
            case 'XMR':
                $price = '1';
                return $price;
        }
	}
	
	public function make_integrated_address(){
		   
		    $host = $this->config->get('monero_wallet_rpc_host');
		    $port = $this->config->get("monero_wallet_rpc_port");
		$monero = new monero($host, $port);
		$payment_id = "";
		$integrated_address = $monero->make_integrated_address($payment_id);
		return $integrated_address; 
	}
	
	/*
		Here function for prices, integrated address, connection between opencart and wallet rpc
	*/
	
}
