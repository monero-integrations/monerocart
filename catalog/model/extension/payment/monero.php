<?php
class ModelExtensionPaymentMonero extends Model {
  	public function getMethod($address) {
	
		
      		$method_data = array( 
        		'code'         	=> 'monero',
        		'title'      	=> 'Monero Payment Gateway',
      		'sort_order' => '',
      		'terms' => 'by Monero Integrations Team'
      		);
    	
   
    	return $method_data;
  	}
}
?>
