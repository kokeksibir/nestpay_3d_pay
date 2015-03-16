<?php
class ControllerPaymentNestpay3dPay extends Controller {
	public function index() {
		$this->load->language('payment/nestpay_3d_pay');

		$data['text_credit_card'] = $this->language->get('text_credit_card');
		$data['text_loading'] = $this->language->get('text_loading');

		$data['entry_cc_owner'] = $this->language->get('entry_cc_owner');
		$data['entry_cc_number'] = $this->language->get('entry_cc_number');
		$data['entry_cc_expire_date'] = $this->language->get('entry_cc_expire_date');
		$data['entry_cc_cvv2'] = $this->language->get('entry_cc_cvv2');

		$data['button_confirm'] = $this->language->get('button_confirm');
		$data['button_back'] = $this->language->get('button_back');

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

		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);


		$data['setup_3dgate_url'] = $this->config->get('nestpay_3d_pay_3dgate_url');
		$data['setup_client_id'] = $this->config->get('nestpay_3d_pay_client_id');
		$data['setup_firmaadi'] = $this->config->get('nestpay_3d_pay_client_name');
		$data['setup_order_id'] = $this->session->data['order_id'];
		$data['setup_amount'] = number_format((float)$order_info['total'], 2, '.', '');
		$data['setup_ok_url'] =  $this->url->link('payment/nestpay_3d_pay/response');
		$data['setup_fail_url'] =  $this->url->link('payment/nestpay_3d_pay/response');
		$data['setup_storetype'] = "3d_pay";
		$data['setup_rnd'] = uniqid(); 
		$data['setup_islemtipi'] = "Auth"; 
		$data['setup_taksit'] = ""; 

		$hashstr = $data['setup_client_id'] . $data['setup_order_id'] . $data['setup_amount'] . $data['setup_ok_url'] . $data['setup_fail_url']
				. $data['setup_islemtipi'] . $data['setup_taksit']  . $data['setup_rnd'] . $this->config->get('nestpay_3d_pay_client_key');

		$data['setup_hash'] = base64_encode(pack('H*',sha1($hashstr)));

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/nestpay_3d_pay.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/nestpay_3d_pay.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/nestpay_3d_pay.tpl', $data);
		}
	}

	public function test() {

		if(!$this->config->get('nestpay_3d_pay_enable_test')) {
			return new Action('error/not_found');
		};

		$this->load->language('payment/nestpay_3d_pay');

		$params = [
			'cc_owner',
			'cc_number',
			'cc_expire_date',
			'cc_cvv2',
			'cardType',
			'clientid',
			'order_id',
			'amount',
			'ok_url',
			'fail_url',
			'storetype',
			'rnd',
			'hash',
			'firmaadi',
			'islemtipi',
			'taksit'
		];

		foreach($params as $param) {
			$data['entry_'.$param] = $this->language->get('entry_'.$param);	
		}		

		$data['button_confirm'] = $this->language->get('button_confirm');
		$data['button_back'] = $this->language->get('button_back');

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

		$data['setup_3dgate_url'] = $this->config->get('nestpay_3d_pay_3dgate_url');
		$data['setup_client_id'] = $this->config->get('nestpay_3d_pay_client_id');
		$data['setup_firmaadi'] = $this->config->get('nestpay_3d_pay_client_name');
		$data['setup_order_id'] = "oid_".time();
		$data['setup_amount'] = "10.01";
		$data['setup_ok_url'] =  $this->url->link('payment/nestpay_3d_pay/response');
		$data['setup_fail_url'] =  $this->url->link('payment/nestpay_3d_pay/response');
		$data['setup_storetype'] = "3d_pay";
		$data['setup_rnd'] = uniqid(); 
		$data['setup_islemtipi'] = "Auth"; 
		$data['setup_taksit'] = ""; 
		//card info
		$data['setup_cc_owner'] = $this->config->get('nestpay_3d_pay_test_cc_owner');
		$data['setup_cc_number'] = $this->config->get('nestpay_3d_pay_test_cc_number');
		$data['setup_cc_exp_month'] = $this->config->get('nestpay_3d_pay_test_cc_exp_month');
		$data['setup_cc_exp_year'] = $this->config->get('nestpay_3d_pay_test_cc_exp_year');
		$data['setup_cc_cvv2'] = $this->config->get('nestpay_3d_pay_test_cc_cvv2');
		$data['setup_cc_card_type'] = $this->config->get('nestpay_3d_pay_test_cc_card_type');

		$hashstr = $data['setup_client_id'] . $data['setup_order_id'] . $data['setup_amount'] . $data['setup_ok_url'] . $data['setup_fail_url']
				. $data['setup_islemtipi'] . $data['setup_taksit']  . $data['setup_rnd'] . $this->config->get('nestpay_3d_pay_client_key');

		$data['setup_hash'] = base64_encode(pack('H*',sha1($hashstr)));

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['post'] = json_encode($_POST);
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/nestpay_3d_pay_test.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/payment/nestpay_3d_pay_test.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/payment/nestpay_3d_pay_test.tpl', $data));
		}

	}

	public function response() {
		$this->load->language('payment/nestpay_3d_pay');

		if($_SERVER['REQUEST_METHOD'] != 'POST') {
			return new Action('error/not_found');
		}

		$odemeparametreleri = array("AuthCode","Response","HostRefNum","ProcReturnCode","TransId","ErrMsg"); 
		foreach($_POST as $key => $value)
		{
			$check=1;
			for($i=0;$i<6;$i++)
			{
				if($key == $odemeparametreleri[$i])
				{
					$check=0;
					break;
				}	
			}
			if($check == 1)
			{
				$data['return_'.$key] = $value;
			}
		}		
		
        $storekey = $this->config->get('nestpay_3d_pay_3dgate_client_key');
        $paramsval="";
        $index1=0;
		$index2=0;

		if(!isset($_POST['Response']) || $_POST['Response'] != 'Approved') {
			$this->session->data['error'] = $this->language->get('error_declined');

			$this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
		}

		if(isset($_POST["HASHPARAMS"])) {
			$hashparams = $_POST["HASHPARAMS"];
	    	$hashparamsval = $_POST["HASHPARAMSVAL"];
		 	$hashparam = $_POST["HASH"];	
		 	while($index1 < strlen($hashparams))
			{
		   		$index2 = strpos($hashparams,":",$index1);
				$vl = $_POST[substr($hashparams,$index1,$index2 - $index1)];
				if($vl == null)
				$vl = "";
		 		$paramsval = $paramsval . $vl; 
				$index1 = $index2 + 1;
			}
			$storekey = $this->config->get('nestpay_3d_pay_client_key');
			$hashval = $paramsval.$storekey;
			$hash = base64_encode(pack('H*',sha1($hashval)));
		
			if($paramsval != $hashparamsval || $hashparam != $hash) {
				$this->session->data['error'] = $this->language->get('error_invalid_hash');

				$this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
			}
		}
		else {
			$this->session->data['error'] = $this->language->get('error_missing_hash');

			$this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
		}

		$this->load->model('checkout/order');

		$this->load->model('payment/nestpay_3d_pay');

		if(isset($this->session->data['order_id'])) {
			$orderId = $this->session->data['order_id'];
			$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
			$this->model_checkout_order->addOrderHistory($orderId, $this->config->get('nestpay_3d_pay_order_status'));
		}
		else {
			$order_info = array(
				'order_id' => $_POST['oid'],
				'total' => 10.01,
				'currency_code' => 'TRY'
			);
			$orderId = $_POST['oid'];
		}

		$nestpay_order_id = $this->model_payment_nestpay_3d_pay->addOrder($order_info, $_POST);

		$this->response->redirect($this->url->link('checkout/success', '', 'SSL'));
	} 
}