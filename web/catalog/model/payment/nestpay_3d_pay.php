<?php
class ModelPaymentNestpay3dPay extends Model {	
	public function getMethod($address, $total) {
		$this->load->language('payment/nestpay_3d_pay');

		$method_data = array(
			'code'       => 'nestpay_3d_pay',
			'title'      => $this->language->get('text_title'),
			'terms'      => '',
			'sort_order' => $this->config->get('nestpay_3d_pay_sort_order')
		);

		return $method_data;
	}

	public function addOrder($order_info, $response_data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "nestpay_3d_pay_order` SET `order_id` = '" . (int)$order_info['order_id'] . 
			"', `oid` = '" . $this->db->escape($response_data['oid']) . 
			"', `PAResSyntaxOK` = '" . $this->db->escape($response_data['PAResSyntaxOK']) . 
			"', `PAResVerified` = '" . $this->db->escape($response_data['PAResVerified']) . 
			"', `version` = '" . $this->db->escape($response_data['version']) . 
			"', `xid` = '" . $this->db->escape($response_data['xid']) . 
			"', `mdStatus` = '" . $this->db->escape($response_data['mdStatus']) . 
			"', `mdErrorMsg` = '" . $this->db->escape($response_data['mdErrorMsg']) . 
			"', `txstatus` = '" . $this->db->escape($response_data['txstatus']) . 
			"', `iReqDetail` = '" . $this->db->escape($response_data['iReqDetail']) . 
			"', `vendorCode` = '" . $this->db->escape($response_data['vendorCode']) . 
			"', `eci` = '" . $this->db->escape($response_data['eci']) . 
			"', `cavv` = '" . $this->db->escape($response_data['cavv']) . 
			"', `rnd` = '" . $this->db->escape($response_data['rnd']) . 
			"', `AuthCode` = '" . $this->db->escape($response_data['AuthCode']) . 
			"', `Response` = '" . $this->db->escape($response_data['Response']) . 
			"', `HostRefNum` = '" . $this->db->escape($response_data['HostRefNum']) . 
			"', `ProcReturnCode` = '" . $this->db->escape($response_data['ProcReturnCode']) . 
			"', `ErrMsg` = '" . $this->db->escape($response_data['ErrMsg']) . 
			"', `TransId` = '" . $this->db->escape($response_data['TransId']) . 
			"', `currency_code` = '" . $this->db->escape($order_info['currency_code']) . 
			"', `total` = '" . $this->currency->format($order_info['total'], $order_info['currency_code'], false, false) .
			"', `date_added` = now(), `date_modified` = now()");

		return $this->db->getLastId();
	}
}