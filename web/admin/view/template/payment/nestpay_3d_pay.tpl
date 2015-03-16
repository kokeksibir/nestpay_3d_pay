<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-web-payment-software" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-nestpay_3d_pay" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-login"><?php echo $entry_client_id; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_client_id" value="<?php echo $nestpay_3d_pay_client_id; ?>" placeholder="<?php echo $entry_client_id; ?>" id="input-client-id" class="form-control" />
              <?php if ($error_client_id) { ?>
              <div class="text-danger"><?php echo $error_client_id; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-key"><?php echo $entry_client_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_client_key" value="<?php echo $nestpay_3d_pay_client_key; ?>" placeholder="<?php echo $entry_client_key; ?>" id="input-client-key" class="form-control" />
              <?php if ($error_client_key) { ?>
              <div class="text-danger"><?php echo $error_client_key; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-client-name"><?php echo $entry_client_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_client_name" value="<?php echo $nestpay_3d_pay_client_name; ?>" placeholder="<?php echo $entry_client_name; ?>" id="input-client-name" class="form-control" />
              <?php if ($error_client_name) { ?>
              <div class="text-danger"><?php echo $error_client_name; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-3dgate-url"><?php echo $entry_3dgate_url; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_3dgate_url" value="<?php echo $nestpay_3d_pay_3dgate_url; ?>" placeholder="<?php echo $entry_3dgate_url; ?>" id="input-3dgate-url" class="form-control" />
              <?php if ($error_3dgate_url) { ?>
              <div class="text-danger"><?php echo $error_3dgate_url; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_order_status; ?></label>
            <div class="col-sm-10">
              <select name="nestpay_3d_pay_order_status" id="input-order-status" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $nestpay_3d_pay_order_status) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="nestpay_3d_pay_status" id="input-status" class="form-control">
                <?php if ($nestpay_3d_pay_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_sort_order" value="<?php echo $nestpay_3d_pay_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_enable_test; ?></label>
            <div class="col-sm-10">
              <select name="nestpay_3d_pay_enable_test" id="input-status" class="form-control">
                <?php if ($nestpay_3d_pay_enable_test) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cc-owner"><?php echo $entry_cc_owner; ?></label>
            <div class="col-sm-10">
            <input type ="text" name="nestpay_3d_pay_test_cc_owner" placeholder="<?php echo $entry_cc_owner; ?>" value="<?php echo $nestpay_3d_pay_test_cc_owner ?>" class="form-control">
            </div>
          </div> 
          <div class="form-group">
              <label class="col-sm-2 control-label" for="input-cc-number"><?php echo $entry_cc_number; ?></label>
              <div class="col-sm-10">
              <input type ="text" name="nestpay_3d_pay_test_cc_number" placeholder="<?php echo $entry_cc_number; ?>" value="<?php echo $nestpay_3d_pay_test_cc_number ?>" class="form-control">  
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 control-label" for="input-cc-expire-date"><?php echo $entry_cc_expire_date; ?></label>
              <div class="col-sm-3">
                <select name="nestpay_3d_pay_test_cc_exp_month" id="input-cc-expire-date" class="form-control">
                  <?php foreach ($months as $month) { ?>
                     <option value="<?php echo $month['value']; ?>" <?php if($month['value'] == $nestpay_3d_pay_test_cc_exp_month) echo "selected"; ?>><?php echo $month['text']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-3">
                <select name="nestpay_3d_pay_test_cc_exp_year" class="form-control">
                  <?php foreach ($year_expire as $year) { ?>
                  <option value="<?php echo $year['value']; ?>" <?php if($year['value'] == $nestpay_3d_pay_test_cc_exp_year) echo "selected"; ?>><?php echo $year['text']; ?></option>
                  <?php } ?>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cc-cvv2"><?php echo $entry_cc_cvv2; ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_test_cc_cvv2" value="<?php echo $nestpay_3d_pay_test_cc_cvv2 ?>" placeholder="<?php echo $entry_cc_cvv2; ?>" id="input-cc-cvv2" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cardType"><?php echo $entry_cardType ?></label>
            <div class="col-sm-10">
              <input type="text" name="nestpay_3d_pay_test_cc_card_type" id="input-cardType" value="<?php echo $nestpay_3d_pay_test_cc_card_type ?>" class="form-control">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>