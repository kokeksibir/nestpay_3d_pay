<form class="form-horizontal" method="post" action="<?php echo $setup_3dgate_url ?>">
  <fieldset id="payment">
    <legend><?php echo $text_credit_card; ?></legend>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-owner"><?php echo $entry_cc_owner; ?></label>
      <div class="col-sm-10">
        <input type="text" name="userid" value="" placeholder="<?php echo $entry_cc_owner; ?>" id="input-cc-owner" class="form-control" />
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-number"><?php echo $entry_cc_number; ?></label>
      <div class="col-sm-10">
        <input type="text" name="pan" value="" placeholder="<?php echo $entry_cc_number; ?>" id="input-cc-number" class="form-control" />
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-expire-date"><?php echo $entry_cc_expire_date; ?></label>
      <div class="col-sm-3">
        <select name="Ecom_Payment_Card_ExpDate_Month" id="input-cc-expire-date" class="form-control">
          <?php foreach ($months as $month) { ?>
          <option value="<?php echo $month['value']; ?>"><?php echo $month['text']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-3">
        <select name="Ecom_Payment_Card_ExpDate_Year" class="form-control">
          <?php foreach ($year_expire as $year) { ?>
          <option value="<?php echo $year['value']; ?>"><?php echo $year['text']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-cvv2"><?php echo $entry_cc_cvv2; ?></label>
      <div class="col-sm-10">
        <input type="text" name="cv2" value="" placeholder="<?php echo $entry_cc_cvv2; ?>" id="input-cc-cvv2" class="form-control" />
      </div>
    </div>
  </fieldset>
  <input type="hidden" name="cardType" id="input-cc-card-type" value="1">
  <input type="hidden" name="clientid" value="<?php  echo $setup_client_id ?>">      
  <input type="hidden" name="oid" value="<?php  echo $setup_order_id ?>">  
  <input type="hidden" name="amount" value="<?php  echo $setup_amount ?>">
  <input type="hidden" name="okUrl" value="<?php  echo $setup_ok_url ?>">
  <input type="hidden" name="failUrl" value="<?php  echo $setup_fail_url ?>">
  <input type="hidden" name="storetype" value="<?php  echo $setup_storetype ?>" >  
  <input type="hidden" name="rnd" value="<?php  echo $setup_rnd ?>" >
  <input type="hidden" name="hash" value="<?php  echo $setup_hash ?>" >  
  <input type="hidden" name="firmaadi" value="<?php echo $setup_firmaadi ?>">
  <input type="hidden" name="islemtipi" value="<?php  echo $setup_islemtipi ?>" >
  <input type="hidden" name="taksit" value="<?php  echo $setup_taksit ?>">

  <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" id="button-confirm" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    var ccnumber = $('#input-cc-number'),
      cctype = $('#input-cc-card-type');
    ccnumber.on('keyup', function(){
      if(ccnumber.val()) {
        if(ccnumber.val().charAt(0) === '4') 
          cctype.val('1');
        else
          cctype.val('2');
      }  
    });  
  });
</script>