<?php
// $Id: paypal_form.tpl.php,v 1.1 2010/07/15 13:09:27 johnnymast Exp $
?>
<div class="node_<?php print $node->nid?>">
	 <?php print isset($node->block) ? $node->teaser : $node->body ?>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_donate_form">
    <input type="hidden" name="cmd" value="_donations">
    <input type="hidden" name="business" value="<?php print $node->paypal_account ?>">
    <input type="hidden" name="lc" value="TH">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="2">
    <input type="hidden" id="item_name" name="item_name" value="Donation">
<?php 
$currency = variable_get('paypal_donate_currency_' . $node->nid, 'USD');
if (!empty($currency)):
?>
    <input type="hidden" name="currency_code" value="<?php print $currency; ?>">
<?php endif; ?>
  <?php 
  $options = variable_get('paypal_donate_options_' . $node->nid, '');
  if (!empty($options)):
    $options = explode("\r\n", $options);
  ?>
    <label for="item_name" class="form-block form-field-label"><?php print t('Donate option:'); ?></label>
    <?php foreach ($options as $option) {
      if (!empty($option)) {
        print '   <label class="form-block"><input type="checkbox" name="items" value="' . check_plain($option) . '" />' . check_plain($option) . '</label>';
      }
    }
    ?>
  <?php endif; ?>
    <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
    <input type="image" id="donate_button" src="https://www.paypal.com/en_GB/TH/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>
  <script type="text/javascript">
    $('#paypal_donate_form').submit( function() {
      var item_names = [];
      $('input[name="items"]').each( function() {
        if ($(this).attr('checked')) {
          item_names.push($(this).val());
        }
      });
      $('input[name="item_name"]').val(item_names.join(' + '));
    });
  </script>
</div>
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

*/
