<?php
class ControllerPaymentNestpay3dPay extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/nestpay_3d_pay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('nestpay_3d_pay', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_client_id'] = $this->language->get('entry_client_id');
		$data['entry_client_key'] = $this->language->get('entry_client_key');
		$data['entry_client_name'] = $this->language->get('entry_client_name');
		$data['entry_3dgate_url'] = $this->language->get('entry_3dgate_url');		
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['entry_enable_test'] = $this->language->get('entry_enable_test');

		$data['entry_cc_owner'] = $this->language->get('entry_cc_owner');
		$data['entry_cc_number'] = $this->language->get('entry_cc_number');
		$data['entry_cc_expire_date'] = $this->language->get('entry_cc_expire_date');
		$data['entry_cc_cvv2'] = $this->language->get('entry_cc_cvv2');
		$data['entry_cardType'] = $this->language->get('entry_cardType');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['months'] = array();

		for ($i = 1; $i <= 12; $i++) {
			$data['months'][] = array(
				'text'  => sprintf('%02d', $i),
				'value' => sprintf('%02d', $i)
			);
		}

		$today = getdate();

		$data['year_expire'] = array();

		for ($i = $today['year']; $i < $today['year'] + 11; $i++) {
			$data['year_expire'][] = array(
				'text'  => strftime('%y', mktime(0, 0, 0, 1, 1, $i)),
				'value' => strftime('%y', mktime(0, 0, 0, 1, 1, $i))
			);
		}

		if (isset($this->error['client_id'])) {
			$data['error_client_id'] = $this->error['client_id'];
		} else {
			$data['error_client_id'] = '';
		}

		if (isset($this->error['client_key'])) {
			$data['error_client_key'] = $this->error['client_key'];
		} else {
			$data['error_client_key'] = '';
		}

		if (isset($this->error['client_name'])) {
			$data['error_client_name'] = $this->error['client_name'];
		} else {
			$data['error_client_name'] = '';
		}

		if (isset($this->error['3dgate_url'])) {
			$data['error_3dgate_url'] = $this->error['3dgate_url'];
		} else {
			$data['error_3dgate_url'] = '';
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
			'href' => $this->url->link('payment/nestpay_3d_pay', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = HTTPS_SERVER . 'index.php?route=payment/nestpay_3d_pay&token=' . $this->session->data['token'];

		$data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$params = [
			'client_id',
			'client_key',
			'client_name',
			'3dgate_url',
			'status',
			'sort_order',
			'enable_test',
			'test_cc_owner',
			'test_cc_number',
			'test_cc_exp_year',
			'test_cc_exp_month',
			'test_cc_cvv2',
			'test_cc_card_type',
			'order_status'
		];

		foreach($params as $param) {
			$field = 'nestpay_3d_pay_'.$param;
			if (isset($this->request->post[$field])) {
				$data[$field] = $this->request->post[$field];
			} else {
				$data[$field] = $this->config->get($field);
			}			
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/nestpay_3d_pay.tpl', $data));
	}

	public function install() {
		$this->load->model('payment/nestpay_3d_pay');
		
		$this->model_payment_nestpay_3d_pay->install();
	}

	public function uninstall() {
		$this->load->model('payment/nestpay_3d_pay');
		
		$this->model_payment_nestpay_3d_pay->uninstall();
	}

	protected function validate() {

		if (!$this->request->post['nestpay_3d_pay_client_id']) {
			$this->error['client_id'] = $this->language->get('error_client_id');
		}

		if (!$this->request->post['nestpay_3d_pay_client_key']) {
			$this->error['client_key'] = $this->language->get('error_client_key');
		}

		if (!$this->request->post['nestpay_3d_pay_client_name']) {
			$this->error['client_name'] = $this->language->get('error_client_name');
		}

		if (!$this->request->post['nestpay_3d_pay_3dgate_url']) {
			$this->error['3dgate_url'] = $this->language->get('error_3dgate_url');
		}

		return !$this->error;
	}
}