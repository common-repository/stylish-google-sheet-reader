<?php 


$msg = "";
$sgsr_table_id = ""; 
if( isset($_POST["sgsr-update"]) && $_POST['sgsr-update'] == '-1' ){
   $data = sgsr_RECORDS_ADD($_POST);
   // echo "<pre>";print_r($msg);echo"</pre>";
   $msg = "Sheet Added Successfully.";
   $sgsr_table_id = $data["inserted_no"];

}


if( isset($_POST["sgsr-update"]) && $_POST['sgsr-update'] !== '-1' ){
   // echo "<pre>";print_r($_POST);echo"</pre>";
  $msg = SGSR_RECORDS_UPDATE($_POST,$_POST['sgsr-update']);
  // echo "<pre>";print_r($msg);echo"</pre>";

  $msg = "Settings Updated";

}

  

?>

<script type="text/javascript">
   function sgsr_table_code(short_code){
      window.open("?page=sgsr_added_success&sgsr_code="+short_code,"_self");
   }
</script>


   <?php 
    if($sgsr_table_id !== ''){
      echo '<script type="text/javascript">'."sgsr_table_code($sgsr_table_id);".'</script>';
      return 0;
    }
    ?>


<div data-sec="sgsr-sheet-connection" class="sgsr-main sgsr-card" style="margin:auto;margin-top: 20px;min-height: 600px;max-width: 1100px;">
<!-- <h1 id="update-add-msg">Add New Google Sheet</h1> -->

<div><a class="sgsr-link" style="float:right;" target="_blank" href="https://wppluginbox.com/en/sgsr-documentation">View Documentation</a></div>

<div>
<center>

<form onsubmit="sgsr_sheet_data();return false;" autocomplete="off">

<div>
   
   <div class="sgsr-label"><h1>Enter Your Google Sheet URL</h1></div>
   <div><input type="text" class="sgsr-input sgsr-sheet-url" name="sgsr-sheet" id="sgsr-sheet" placeholder="Paste Google Sheet URL Here" style="text-align: center;" value="" required></div>
   <div style="margin:20px;font-size: 10px;">(<b>Example:</b> https://docs.google.com/spreadsheets/d/1rssdz-mVK-kCu9Dcu1f2KOR)</div>

</div>



<div style="height: 20px;"></div>

<div>
   <div class="sgsr-loader fetch-g-sheet" style="margin:20px;display: none;"></div>
   <button class="sgsr-btn sgsr-green-btn" data-action="connect-sheet" type="submit"> Connect <i class="fas fa-angle-double-right"></i></button>
</div>


</form>

<div sheet-msg="1" sgsc-msg-code="-"></div>

</center>
</div>


<?php 

if( !SGSR_MAKE_NEW_CONTENT() && !isset($_GET['edit_sgsr']) ){
      echo '<script type="text/javascript">window.open("?page=main_menu_sgsr&lim=1","_self");</'.'script>';
      return 0;
  }

?>

</div>
 

<?php include __DIR__.'/../custom-functions.php'; ?>
<div class="sgsr-config sgsr-hide"><?php include __DIR__.'/config.php'; ?></div>



<?php include __DIR__.'/../Lib/sheet-js.php'; ?>
<?php if(isset($_GET['edit_sgsr'])){  include __DIR__.'/../Lib/edit-js.php';  } ?>


<script type="text/javascript">
   
   $( document ).ready(function() {
      var v = $('#theme').val();
      console.log(v);
        $('[select-menu="theme"] [data-value="'+v+'"]').trigger("click");
   });
</script>





<style type="text/css">
   .sgsr-update-msg {
    padding: 19px;
    background-color: #ffe6b93d;
    color: #ff9800;
    border-radius: 12px;
    margin: auto;
    max-width: 600px;
}
</style>
<style type="text/css">
   [sgsc-msg-code="green"] {
    margin-top: 20px;
    padding: 20px;
    background-color: #e7ffe7;
    color: green;
    font-weight: 600;
}

   [sgsc-msg-code="red"] {
    margin-top: 20px;
    padding: 20px;
    background-color: #ffe9e7;
    color: red;
}

.sgsr-config input[type="text"],
.sgsr-config select{
   width: 100%;
   max-width: 300px;
   min-width: 300px;
}

input.sgsr-sheet-url[type="text"] {
    box-shadow: 0px 0px 20px 0px rgb(0,0,0,0.2);
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    border-radius: 8px;
    border: 0px solid #00b163;
    font-size: 13px;
    font-family: Courier New;
}

input.sgsr-sheet-url[type="text"]::placeholder{
color: rgb(0, 0, 0, 0.6);
font-size: 14px;
}

.sgsr-green-btn {
    border-radius: 25px;
    max-width: 158px;
}
</style>