<?php
class ControllerPaymentGofpay extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/gofpay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('gofpay', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		//$data['text_all_zones'] = $this->language->get('text_all_zones');
		//$data['text_test'] = $this->language->get('text_test');
		//$data['text_live'] = $this->language->get('text_live');
		//$data['text_authorization'] = $this->language->get('text_authorization');
		//$data['text_capture'] = $this->language->get('text_capture');

		$data['entry_websiteid'] = $this->language->get('entry_websiteid');
		$data['entry_secretkey'] = $this->language->get('entry_secretkey');
		$data['entry_gateway'] = $this->language->get('entry_gateway');
		//$data['entry_hash'] = $this->language->get('entry_hash');
		//$data['entry_server'] = $this->language->get('entry_server');
		$data['entry_mode'] = $this->language->get('entry_mode');
		//$data['entry_method'] = $this->language->get('entry_method');
		//$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_order_notifystatus'] = $this->language->get('entry_order_notifystatus');
		//$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['coupon_status'] = $this->language->get('entry_coupon_status');
		$data['help_total'] = $this->language->get('help_total');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['websiteid'])) {
			$data['error_websiteid'] = $this->error['websiteid'];
		} else {
			$data['error_websiteid'] = '';
		}

		if (isset($this->error['secretkey'])) {
			$data['error_secretkey'] = $this->error['secretkey'];
		} else {
			$data['error_secretkey'] = '';
		}

		if (isset($this->error['gateway'])) {
			$data['error_gateway'] = $this->error['gateway'];
		} else {
			$data['error_gateway'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/gofpay', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('payment/gofpay', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['gofpay_websiteid'])) {
			$data['gofpay_websiteid'] = $this->request->post['gofpay_websiteid'];
		} else {
			$data['gofpay_websiteid'] = $this->config->get('gofpay_websiteid');
		}

		if (isset($this->request->post['gofpay_secretkey'])) {
			$data['gofpay_secretkey'] = $this->request->post['gofpay_secretkey'];
		} else {
			$data['gofpay_secretkey'] = $this->config->get('gofpay_secretkey');
		}

		if (isset($this->request->post['gofpay_gateway'])) {
			$data['gofpay_gateway'] = $this->request->post['gofpay_gateway'];
		} else {
			$data['gofpay_gateway'] = $this->config->get('gofpay_gateway');
		}

		if (isset($this->request->post['gofpay_mode'])) {
			$data['gofpay_mode'] = $this->request->post['gofpay_mode'];
		} else {
			$data['gofpay_mode'] = $this->config->get('gofpay_mode');
		}

		if (isset($this->request->post['gofpay_order_status_id'])) {
			$data['gofpay_order_status_id'] = $this->request->post['gofpay_order_status_id'];
		} else {
			$data['gofpay_order_status_id'] = $this->config->get('gofpay_order_status_id');
		}

		if (isset($this->request->post['gofpay_order_notifystatus_id'])) {
			$data['gofpay_order_notifystatus_id'] = $this->request->post['gofpay_order_notifystatus_id'];
		} else {
			$data['gofpay_order_notifystatus_id'] = $this->config->get('gofpay_order_notifystatus_id');
		}

		if (isset($this->request->post['gofpay_coupon_status'])) {
			$data['gofpay_coupon_status'] = $this->request->post['gofpay_coupon_status'];
		} else {
			$data['gofpay_coupon_status'] = $this->config->get('gofpay_coupon_status');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		if (isset($this->request->post['gofpay_status'])) {
			$data['gofpay_status'] = $this->request->post['gofpay_status'];
		} else {
			$data['gofpay_status'] = $this->config->get('gofpay_status');
		}

		if (isset($this->request->post['gofpay_sort_order'])) {
			$data['gofpay_sort_order'] = $this->request->post['gofpay_sort_order'];
		} else {
			$data['gofpay_sort_order'] = $this->config->get('gofpay_sort_order');
		}


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('payment/gofpay.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/gofpay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['gofpay_websiteid']) {
			$this->error['websiteid'] = $this->language->get('error_websiteid');
		}

		if (!$this->request->post['gofpay_secretkey']) {
			$this->error['secretkey'] = $this->language->get('error_secretkey');
		}

		if (!$this->request->post['gofpay_gateway']) {
			$this->error['gateway'] = $this->language->get('error_gateway');
		}

		return !$this->error;
	}
}