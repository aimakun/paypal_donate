<?php
// $Id: paypal_form.tpl.php,v 1.1 2010/07/15 13:09:27 johnnymast Exp $
?>
<div class="node_<?php print $node->nid?>">
	 <?php print $node->body ?>
	
	<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> -->
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="<?php print $node->paypal_account ?>">
<input type="hidden" name="lc" value="TH">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="2">
<?php 
$currency = variable_get('paypal_donate_currency', 'USD');
if (!empty($currency)):
?>
<input type="hidden" name="currency_code" value="<?php print $currency; ?>">
<?php endif; ?>
  <?php 
  $options = variable_get('paypal_donate_options', '');
  if (!empty($options)):
    $options = explode("\n", $options);
  ?>
  <div>
  <label for="item_name"><?php print t('Donate option:'); ?></label>
  <select name="item_name">
    <?php foreach ($options as $option) {
      if (empty($option)) {
        print '<option value="">-- None --</option>';
      }
      else {
        print '<option value="' . check_plain($option) . '">' . check_plain($option) . '</option>';
      }
    }
    ?>
  </select>
  </div>
  <?php endif; ?>
  
  <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
<input type="image" src="https://www.paypal.com/en_GB/TH/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

  
<?php /*
  <form action="http://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_donations">
	<input type="hidden" name="item_name" value="Donation">
	<input type="hidden" name="currency_code" value="USD">
  <!--
  <select name="custom">
    <option value="">-- None --</option>
    <option value="ทดสอบ 1">ทดสอบ 1</option>
    <option value="ทดสอบ 2 นะจ๊ะ">ทดสอบ 2 นะจ๊ะ</option>
  </select>
	-->
  <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
</div>

*/
