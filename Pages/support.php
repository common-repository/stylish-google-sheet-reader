<style type="text/css">
	.small-cards{text-align: center;}
.support-card h1 {font-size: 23px;}
.icon-support-sgsr{width: 100px;}

</style>

<div style="display: grid;
  grid-template-columns: auto auto auto;">
  <?php $WPBOX_SGSR_LINK = plugins_url( '/', __FILE__ );?>
<!-- -------------------------- -->
<div class="small-cards sgsr-card" style="margin-top: 20px;margin-right: 10px;">
<img src="<?php echo esc_html($WPBOX_SGSR_LINK).'icons/document.webp'; ?>" class="icon-support-sgsr">
<h1>Documentation</h1>

<p style="visibility: hidden;"><a href="https://wppluginbox.com/en/sgsr-documentation" target="_blank">View Documentation</a> </p>

<button type="button" class="sgsr-green-btn" onclick="window.open('https://wppluginbox.com/en/sgsr-documentation','_blank')" style="margin-top: 20px;">View Documentation</button>
</div>



<div class="small-cards sgsr-card" style="margin-top: 20px;margin-right: 10px;">
<img src="<?php echo esc_html($WPBOX_SGSR_LINK).'icons/customer-service.svg'; ?>" class="icon-support-sgsr">
<h1>Customer Support</h1>
<p><b>Email:</b> support@wppluginbox.com </p>

<button type="button" class="sgsr-green-btn" onclick="window.open('https://www.tidio.com/talk/6g4qjsaq4glmdaovk3wq3uqubfi0zlfm','_blank')" style="margin-top: 20px;">Live Chat</button>
</div>


<!-- -------------------------- -->
</div>


