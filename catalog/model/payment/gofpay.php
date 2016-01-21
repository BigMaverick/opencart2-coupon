<?php
class ModelPaymentGofpay extends Model {
	public function getMethod($address, $total) {
		$this->load->language('payment/gofpay');
		if ($this->config->get('gofpay_status')) {
      		$status = TRUE;
      	} else {
			$status = FALSE;
		}
		$method_data = array();

		if ($status) {
			$websiteid =  $this->config->get('gofpay_websiteid');
			$secretkey =  $this->config->get('gofpay_secretkey');
			@$gateway_new = $this->config->get('gofpay_gateway');
			@$tp_url = $gateway_new."/tools/logos?websiteid=$websiteid&size=small&transparent=true";
		 	$tp="<div><img src='$tp_url'>" . $this->language->get('text_title') . "</div>";
			$method_data = array(
				'code'       => 'gofpay',
				'title'      => $tp,//$this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('gofpay_sort_order'),
				'coupon_status' => $this->config->get('coupon_status')
			);
		}

		return $method_data;
	}
}