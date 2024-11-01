<?php 
if(isset($_GET['edit_sgsr'])){
$data = GSGR_GET_DATA( $_GET['edit_sgsr'] );
// echo "<pre>";print_r($data);echo"</pre>";   
}
?>

<script type="text/javascript">
	function sgsr_element_type(e){e=document.getElementById(e);return e?"input"===e.tagName.toLowerCase()?"i":"select"===e.tagName.toLowerCase()?"s":"n":"Element not found"}function sgsr_defaults(e,t){var s;"i"==sgsr_element_type(e)&&$("#"+e).val(t).trigger("change"),"s"==sgsr_element_type(e)&&("1"==(s=$("#"+e)).attr("has-toogle-btn")?$("#slider-"+e).prop("checked","1"==t).trigger("change"):"1"==s.attr("ignore-recreation")?s.val(t).trigger("change"):creat_sgsr_options([t],e,t)),"sheet_id"==e&&$("#sgsr-sheet").val("https://docs.google.com/spreadsheets/d/"+t),"no"==e&&$('[name="sgsr-update"]').val(t)}$('[data-action="connect-sheet"]').addClass("sgsr-info-btn"),$(".sgsr-update-msg").removeClass("sgsr-hide"),$('[data-sec="sgsr-sheet-connection"],[data-action="add-db"]').hide(),$('.sgsr-config,[data-action="update-db"]').show();

</script>


<script type="text/javascript">

$( document ).ready(function() {
<?php 

     foreach ($data as $key => $value) {
        echo 'sgsr_defaults("'.$key.'","'.$value.'");';
     }

    ?>
});
	
</script>