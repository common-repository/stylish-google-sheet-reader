<?php 

$sgsc_id = $calc_id;

if($sgsc_id == '-'){echo "<p class='sgsc-info-msg'>This calculator with this short code is either deleted or don't exist.</p>";return 0;}
if($sgsc_id == 'gsheet_error'){echo "<p class='sgsc-info-msg'>This calculator requires necessary configuration. <br><br>Please go to the admin dashboard to complete the setup, before you can publish this calculator.</p>";return 0;}
?>

<script src="<?php echo plugins_url('/../JS/scripts_embed.js',__FILE__); ?>"></script>
<div id="wpbpx_sgsc_frame_<?php echo $sgsc_id; ?>" style="text-align: center;">Loading...</div>

<script type="text/javascript">
	var app_url = "<?php echo plugins_url('/../dashboard/preview/?uid='.$sgsc_id,__FILE__); ?>" ;
	var embed = '<center><iframe class="sgsc-calc-frame" id="sgsc_calc_<?php echo $sgsc_id; ?>" src="'+app_url+'" scrolling="no" border="no" onload="iFrameResize()"></iframe></center>';
document.getElementById('wpbpx_sgsc_frame_<?php echo $sgsc_id; ?>').innerHTML = embed;
</script>

