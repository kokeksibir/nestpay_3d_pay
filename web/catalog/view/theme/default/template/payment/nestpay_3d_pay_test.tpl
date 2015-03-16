<?php echo $header; ?>
<div class="container">
<form class="form-horizontal" method="post" action="<?php echo $setup_3dgate_url ?>">
 <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-cc-owner"><?php echo $entry_cc_owner; ?></label>
    <div class="col-sm-10">
    <input type ="text" name="userid" placeholder="<?php echo $entry_cc_owner; ?>" value="<?php echo $setup_cc_owner ?>" class="form-control">
    </div>
  </div> 
  <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-number"><?php echo $entry_cc_number; ?></label>
      <div class="col-sm-10">
      <input type ="text" name="pan" placeholder="<?php echo $entry_cc_number; ?>" value="<?php echo $setup_cc_number ?>" class="form-control">  
      </div>
  </div>
  <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-expire-date"><?php echo $entry_cc_expire_date; ?></label>
      <div class="col-sm-3">
        <select name="Ecom_Payment_Card_ExpDate_Month" id="input-cc-expire-date" class="form-control">
          <?php foreach ($months as $month) { ?>
             <option value="<?php echo $month['value']; ?>" <?php if($month['value'] == $setup_cc_exp_month) echo "selected"; ?>><?php echo $month['text']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-3">
        <select name="Ecom_Payment_Card_ExpDate_Year" class="form-control">
          <?php foreach ($year_expire as $year) { ?>
          <option value="<?php echo $year['value']; ?>" <?php if($year['value'] == $setup_cc_exp_year) echo "selected"; ?>><?php echo $year['text']; ?></option>
          <?php } ?>
        </select>
      </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-cc-cvv2"><?php echo $entry_cc_cvv2; ?></label>
    <div class="col-sm-10">
      <input type="text" name="cv2" value="<?php echo $setup_cc_cvv2 ?>" placeholder="<?php echo $entry_cc_cvv2; ?>" id="input-cc-cvv2" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-cardType"><?php echo $entry_cardType ?></label>
    <div class="col-sm-10">
      <input type="text" name="cardType" id="input-cardType" value="<?php  echo $setup_cc_card_type ?>" class="form-control">
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-clientid"><?php echo $entry_clientid; ?></label>
    <div class="col-sm-10">
      <input type="text" readonly="readonly" name="clientid" id="input-clientid" value="<?php  echo $setup_client_id ?>" class="form-control">      
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-oid"><?php echo $entry_order_id; ?></label>
    <div class="col-sm-10">
     <input type="text" readonly="readonly" name="oid" id="input-oid" value="<?php  echo $setup_order_id ?>" class="form-control">  
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-cardType"><?php echo $entry_amount; ?></label>
    <div class="col-sm-10">
  <input type="text" name="amount" readonly="readonly" id="input-cardType" value="<?php  echo $setup_amount ?>" class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-okUrl"><?php echo $entry_ok_url; ?></label>
    <div class="col-sm-10">
  <input type="text" name="okUrl" readonly="readonly" id="input-okUrl" value="<?php  echo $setup_ok_url ?>" class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-failUrl"><?php echo $entry_fail_url; ?></label>
    <div class="col-sm-10">
  <input type="text" name="failUrl" readonly="readonly" id="input-failUrl" value="<?php  echo $setup_fail_url ?>" class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-storetype"><?php echo $entry_storetype; ?></label>
    <div class="col-sm-10">
  <input type="text" name="storetype" readonly="readonly" id="input-storetype" value="<?php  echo $setup_storetype ?>"  class="form-control">  
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-rnd"><?php echo $entry_rnd; ?></label>
    <div class="col-sm-10">
  <input type="text" name="rnd" readonly="readonly" id="input-rnd" value="<?php  echo $setup_rnd ?>"  class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-hash"><?php echo $entry_hash; ?></label>
    <div class="col-sm-10">
  <input type="text" name="hash" readonly="readonly" id="input-hash" value="<?php  echo $setup_hash ?>" class="form-control" >  
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-firmaadi"><?php echo $entry_firmaadi; ?></label>
    <div class="col-sm-10">
  <input type="text" name="firmaadi" id="input-firmaadi" value="<?php echo $setup_firmaadi ?>" class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-islemtipi"><?php echo $entry_islemtipi; ?></label>
    <div class="col-sm-10">
  <input type="text" name="islemtipi" readonly="readonly" id="input-islemtipi" value="<?php  echo $setup_islemtipi ?>"  class="form-control">
  </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-taksit"><?php echo $entry_taksit; ?></label>
    <div class="col-sm-10">
  <input type="text" name="taksit" readonly="readonly" value="<?php  echo $setup_taksit ?>" class="form-control">
  </div>
  </div>
  <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" id="button-confirm" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
</div>
<?php echo $footer; ?>