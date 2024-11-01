<?php 

// echo $sgsr_id;
// $sgsr_id = 'gsheet_error';

if($sgsr_id == '-'){echo "<p class='sgsr-info-msg'>Table with this short code is either deleted or don't exist.</p>";return 0;}
if($sgsr_id == 'gsheet_error'){echo "<p class='sgsr-info-msg'>This table requires necessary configuration. <br><br>Please go to the admin dashboard to complete the setup, before you can publish this table.</p>";return 0;}
?>

<script src="<?php echo plugins_url('/../JS/scripts_embed.js',__FILE__); ?>"></script>
<div id="wpbpx_sgsr_frame_<?php echo $sgsr_id; ?>" style="text-align: center;">Loading...</div>

<script type="text/javascript">
	var app_url = "<?php echo plugins_url('/app.php/?uid='.$sgsr_id,__FILE__); ?>" ;
	var embed = '<center><iframe class="sgsr-calc-frame" id="sgsr_table_<?php echo $sgsr_id; ?>" src="'+app_url+'" scrolling="no" border="no" onload="iFrameResize()"></iframe></center>';
document.getElementById('wpbpx_sgsr_frame_<?php echo $sgsr_id; ?>').innerHTML = embed;
</script>



<script type="text/javascript">
  function sgsr_admin_ajax(){ return "<?php echo admin_url('admin-ajax.php'); ?>";}
</script>


