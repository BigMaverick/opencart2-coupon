<?php
//var_dump($this->data);
//var_dump($this->session->data);
//return exit();
?>
<form action="<?php echo $action; ?>" method="post">
  <input type="hidden" name="websiteid" value="<?php echo $websiteid; ?>" />
  <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
  <input type="hidden" name="domain" value="<?php echo $domain; ?>" />
  <!--<input type='hidden' name='plusversion' value="<?php //echo $plusversion; ?>">-->
  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
  <input type="hidden" name="email" value="<?php echo $email; ?>" />
  <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
  <input type="hidden" name="ipaddress" value="<?php echo $ipaddress; ?>" />
  <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
  <input type="hidden" name="freight" value="<?php echo $freight; ?>" />
  <input type="hidden" name="discount" value="<?php echo $discount; ?>" />
  <input type="hidden" name="tax" value="<?php echo $tax; ?>" />
  <input type="hidden" name="signature" value="<?php echo $signature; ?>" />
  <!--<input type="hidden" name="Language" value="<?php //echo $Language; ?>" />-->
  <input type="hidden" name="shippingfirstname" value="<?php echo $shippingfirstname; ?>" />
  <input type="hidden" name="shippinglastname" value="<?php echo $shippinglastname; ?>" />
  <input type="hidden" name="shippingtelephone" value="<?php echo $shippingtelephone; ?>" />
  <input type="hidden" name="shippingzipcode" value="<?php echo $shippingzipcode; ?>" />
  <input type="hidden" name="shippingaddress1" value="<?php echo $shippingaddress1; ?>" />
  <input type="hidden" name="shippingaddress2" value="<?php echo $shippingaddress2; ?>" />
  <input type="hidden" name="shippingcity" value="<?php echo $shippingcity; ?>" />
  <input type="hidden" name="shippingstate" value="<?php echo $shippingstate; ?>" />
  <input type="hidden" name="shippingcountry" value="<?php echo $shippingcountry; ?>" />
  <input type="hidden" name="billingfirstname" value="<?php echo $billingfirstname; ?>" />
  <input type="hidden" name="billinglastname" value="<?php echo $billinglastname; ?>" />
  <input type="hidden" name="billingtelephone" value="<?php echo $billingtelephone; ?>" />
  <input type="hidden" name="billingzipcode" value="<?php echo $billingzipcode; ?>" />
  <input type="hidden" name="billingaddress1" value="<?php echo $billingaddress1; ?>" />
  <input type="hidden" name="billingaddress2" value="<?php echo $billingaddress2; ?>" />
  <input type="hidden" name="billingcity" value="<?php echo $billingcity; ?>" />
  <input type="hidden" name="billingstate" value="<?php echo $billingstate; ?>" />
  <input type="hidden" name="billingcountry" value="<?php echo $billingcountry; ?>" />
  
  <?php  for($n=1;$n<$i;$n++){
 	$Skun='productsku'.$n;
 	$ProductNamen='productname'.$n;
 	$Pricen='productprice'.$n;
 	$Quantityn='productquantity'.$n;
  echo '<input type="hidden"'.' name='."$Skun".' value='.'"'.$$Skun.'"/>';
  echo '<input type="hidden"'.' name='."$ProductNamen".' value='.'"'.$$ProductNamen.'"/>';
  echo '<input type="hidden"'.' name='."$Pricen".' value='.'"'.$$Pricen.'"/>';
  echo '<input type="hidden"'.' name='."$Quantityn".' value='.'"'.$$Quantityn.'"/>';
  }?>
  <div class="buttons">
    <div class="right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="button" />
    </div>
  </div>
</form>
