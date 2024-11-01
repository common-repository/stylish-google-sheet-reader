<div class="sgsr-main sgsr-card" style="margin-top: 20px;margin-right: 10px;min-height: 600px;">
<div class="sgsr-label*">
   <h1>Google Sheets Manager</h1>
   <p>Here you can view list of all of your added sheets. You can open the linked spreadsheet, or edit settings for your tables.</p>
</div>

<?php 
if(isset($_GET['delete_sgsr'])){
SGSR_RECORDS_DELETE($_GET['delete_sgsr']);
}

$all_sgsr_sheets = GET_ALL_SGSR();
// echo "<pre>";print_r($all_sgsr_sheets);echo"</pre>";
?>

<div style="height: 40px;"></div>

<table class="all_sgsr_list">
   <thead>
   <tr style="border-bottom: 1px solid #d7d7d7;">
      <td>Project Name</td>
      <td>Linked Google Sheet</td>      
      <td>Tab Name</td>      
      <td>Short Code</td>
      <td>Delete / Edit</td>
   </tr>
</thead>
<tbody>

<?php 

foreach ($all_sgsr_sheets as $data) {
   // echo "<pre>";print_r($data);echo"</pre>";
   echo '

<tr>
      <td>'.$data["sheet_name"].'</td>
      <td><span btn="action-link" data-url="'.$data["sheet_id"].'"></span></td>
      <td>'.$data["tab_name"].'</td>
      <td><xmp>[sgsr-table id="'.$data["no"].'"]</xmp></td>
      <td>
         <span btn="action-edit" sgsr-id="'.$data["no"].'"></span>
         <span btn="action-delete" sgsr-id="'.$data["no"].'" sgsr-name="'.$data["sheet_name"].'"></span>
      </td>
</tr>

   ';
}

?>
</tbody>
</table>



</div>


<script type="text/javascript">
   $(document).on('click', '[btn="action-edit"]', function() {
     var id = $(this).attr('sgsr-id');
     var url = '?page=sgsr_create_new&edit_sgsr='+id;
     window.open(url,'_self');

   });


   $(document).on('click', '[btn="action-delete"]', function() {
     var id = $(this).attr('sgsr-id');
     var name = $(this).attr('sgsr-name')
    
    if(confirm('Are you sure, you want to delete "'+name+'"?')){
      var url = '?page=sgsr_manage_all_sheets&delete_sgsr='+id;
      window.open(url,'_self');
    }
    


   });


   $(document).on('click', '[data-url]', function() {
     var url = $(this).attr('data-url');
     if(url == '-' || url == ''){console.log('invalid_link');return 0;}

     url = 'https://docs.google.com/spreadsheets/d/' + url;

     window.open(url,'_blank');
   });
</script>

<style type="text/css">
   [btn="action-link"]{color: blue;}

   .tb-list{
      padding: 20px;
      background-color: white;
   }

   .all_sgsr_list{
      width: 100%;
      text-align: center;
      border-collapse: collapse;
   }

.all_sgsr_list td{
   padding: 8px;
   }

   .all_sgsr_list thead td {
    background-color: #7d55ff;
    color: white;
}

.all_sgsr_list tbody tr:nth-child(even) {
    background-color: #f6f6f6;
}
</style>
