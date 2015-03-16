<?php
class ModelPaymentNestpay3dPay extends Model {
	public function install() {
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "nestpay_3d_pay_order` (
			  `nestpay_3d_pay_order_id` INT(11) NOT NULL AUTO_INCREMENT,
			  `order_id` INT(11) NOT NULL,
			  `oid` VARCHAR(50),
			  `PAResSyntaxOK` CHAR(1),
			  `PAResVerified` CHAR(1),
			  `version` VARCHAR(50),
			  `xid` VARCHAR(50),
			  `mdStatus` CHAR(4),
			  `mdErrorMsg` VARCHAR(50),
			  `txstatus` CHAR(4),
			  `iReqDetail` CHAR(4),
			  `eci` VARCHAR(50),
			  `cavv` VARCHAR(50),
			  `md` VARCHAR(50),
			  `rnd` VARCHAR(50),
			  `AuthCode` VARCHAR(50),
			  `Response` VARCHAR(20),
			  `vendorCode` VARCHAR(50),
			  `HostRefNum` VARCHAR(50),
			  `ProcReturnCode` VARCHAR(50),
			  `TransId` VARCHAR(50),
			  `ErrMsg` VARCHAR(20),
			  `date_added` DATETIME NOT NULL,
			  `date_modified` DATETIME NOT NULL,
			  `release_status` INT(1) DEFAULT 0,
			  `void_status` INT(1) DEFAULT 0,
			  `rebate_status` INT(1) DEFAULT 0,
			  `currency_code` CHAR(3) NOT NULL,
			  `total` DECIMAL( 10, 2 ) NOT NULL,
			  PRIMARY KEY (`nestpay_3d_pay_order_id`)
			) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;");
	}

	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "nestpay_3d_pay_order`;");
	}
}
