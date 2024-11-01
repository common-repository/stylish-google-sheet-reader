<form method="post" action="" autocomplete="off">

<div class="sgsr-main sgsr-card" sgsr-config-div="1">

<center>
   <button type="button" class="sgsr-green-btn" sgsr-back-btn="1" style="margin:20px;"><i class="fas fa-angle-double-left"></i> Go Back</button>
</center>   

<!-- <div style="height:50px;"></div> -->

<div class="sgsr-update-msg sgsr-hide">If you've made changes to your Google Sheet, please click "<b>Go Back</b>" and reconnect it to fetch the latest tab names from your spreadsheet.</div>


<div style="text-align:center;margin-top: 12px;">
   <?php echo $msg = $msg == "" ? "" : '<h2 class="sgsr-update-msg">'.$msg.'</h2>'; ?>      
   </div>


<!-- <div class="shadow font" style="margin-top: 20px;margin-right: 10px;"> -->

<h1 class="sgsr-heading" >⚙️ G-Sheet Configuration</h1>

<table style="width: 1200px;">
   <tr>
      <td>Project Name </td>
      <td>
         <input type="text" class="khyzer" name="sheet_name" id="sheet_name" placeholder="Enter">
         <input type="hidden" class="khyzer" name="sheet_id" id="sheet_id" placeholder="..." readonly>
      </td>
   </tr>

   <tr>
      <td>Choose Data Source Tab <i class="fas fa-question-circle" title="This is the Sheet / Tab Name from your Google Sheet from where you want to display data."></i></td>
      <td>
         <select class="khyzer" name="tab_name" id="tab_name" required>
            <option value="">- Select -</option>
         </select>
      </td>
   </tr>

   <tr>
      <td>Range <i class="fas fa-question-circle" title="This specifies the range of rows and columns you want to display. For example, A2:D25 will show all the values from columns A to D, starting from row 2 and ending at row 25 in your Google Sheet."></i></td>
      <td><input type="text" class="khyzer" name="range" id="range" placeholder="Enter (Example: A2:D25)"required></td>
   </tr>
   
   <tr style="height:20px;"><td colspan="2"></td></tr>

   
   <tr>
   <td>Enable Search <i class="fas fa-question-circle" title="This will allow users to search data from table"></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_search',$def = '1'); ?></td>
   </tr>


   <tr>
      <td>Enable Data Export <i class="fas fa-question-circle" title=""></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_data_export',$def = '0'); ?></td>
</tr>

<tr>
      <td>Enable Sorting <i class="fas fa-question-circle" title="This will allow users to sort data in ascending or descending order"></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_sorting',$def = '1'); ?></td>
   </tr>

  
<tr style="height:20px;"><td colspan="2"></td></tr>

  <tr parent-row="paging">
      <td>Enable Paging <i class="fas fa-question-circle" title="Enable paging to navigate large datasets efficiently. Choose this option for faster table loading when handling extensive data. This feature does not affect sorting or filtering."></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_paging',$def = '1'); ?></td>
   </tr>

   <tr child-option="paging" show-for="1">
      <td>Default Page Length <i class="fas fa-question-circle" title=""></i></td>
      <td>
         <select class="khyzer" name="page_length" id="page_length" ignore-recreation="1">
            <option value="7">7 Rows</option>
            <option value="10" selected>10 Rows</option>
            <option value="25">25 Rows</option>
            <option value="50">50 Rows</option>
            <option value="100">100 Rows</option>

         </select>
      </td>
   </tr>  


   <tr child-option="paging" show-for="0">
      <td>Max Table Height <i class="fas fa-question-circle" title="This will enable overflow / scrolling. Full length will show all rows on one page, without any scrollbar."></i></td>
      <td>
         <select class="khyzer" name="max_table_height" id="max_table_height" ignore-recreation="1">
            <option value="600px">600px</option>
            <option value="700px" selected>700px</option>
            <option value="800px">800px</option>
            <option value="900px">900px</option>
            <option value="null">Full Length</option>

         </select>
      </td>
   </tr>  


<tr style="height:20px;"><td colspan="2"></td></tr>

<tr parent-row="refresh">
      <td>Enable Auto Refresh <?php echo SGSR_PRO_ICON(); ?></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_auto_refresh',$def = '0',$lock=1); ?></td>
   </tr>


<tr child-option-="refresh" show-for="1">
      <td>Refresh Duration <?php echo SGSR_PRO_ICON(); ?></td>
      <td>
         <select class="khyzer" ignore-recreation="1" disabled>
            <option value="5">Every 5 sec</option>
            <option value="15">Every 15 sec</option>
            <option value="30">Every 30 sec</option>
            <option value="60">Every 1 Minute</option>
            <option value="300">Every 5 Minutes</option>
            <option value="600">Every 10 Minutes</option>
         </select>
      </td>
   </tr>   


   <tr style="display:none;">
      <td>By Default, Sorting Applies to Column <i class="fas fa-question-circle" title="Select the column you want the data to be automatically sorted by when the table loads."></i></td>
      <td>
         <select class="khyzer" name="default_sort_col" id="default_sort_col">
            <option value="">- Select -</option>
         </select>
      </td>
   </tr>
   
</table></div>

<div class="sgsr-main sgsr-card" sgsr-config-div="1">

<table style="width: 1200px;">
   <tr>
      <td colspan="2"><h1 class="sgsr-heading" >🎨 Design Customization</h1></td>
   </tr>

   <tr parent-row="theme">
      <!-- <td>Theme <i class="fas fa-question-circle" title="Choose table's layout"></i></td> -->
      <td colspan="2"><?php include __DIR__.'/themes/themes.php'; ?></td>
   </tr>

   <tr child-theme-option="white">
      <td>Background Color <i class="fas fa-question-circle" title="This is the background color of the first row of the table. Be default, its blue (#7d55ff)"></i> <?php echo SGSR_PRO_ICON(); ?></td>
      <td>
         <input type="text" class="khyzer color-val"  value="#7d55ff" style="width:50px;" disabled>
         <input type="color" class="khyzer sgsr-color-code" id="display-header_color" value="#7d55ff" disabled>
      </td>
   </tr>

   <tr child-theme-option="white">
      <td>Text Color <i class="fas fa-question-circle" title="This is the text color of the first row of the table. Be default, its white (#ffffff)"></i> <?php echo SGSR_PRO_ICON(); ?></td>
      <td>
         <input type="text" class="khyzer color-val" value="#ffffff" disabled>
         <input type="color" class="khyzer sgsr-color-code" value="#ffffff"  id="display-header_text_color" disabled>

      </td>
   </tr>


   <tr style="height:30px;"><td colspan="2"></td></tr>

   <tr>
      <td>Style <i class="fas fa-question-circle" title="Set border radius of table section. By default, its set to round corners."></i></td>
      <td>
         <select class="khyzer" name="style" id="style" ignore-recreation="1">
            <option value="s-r">Shadow - Round</option>
            <option value="s-f">Shadow - Flat</option>
            <option value="s-n">No Shadow</option>
         </select>
      </td>
   </tr>


<tr>
      <td>Mobile Responsiveness <i class="fas fa-question-circle" title="Automatically adjust the table size based on the device screen."></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'responsive',$def = '1'); ?></td>
</tr>

<tr>
      <td>Custom Scrollbar <i class="fas fa-question-circle" title="This Replaces Browser's default scrollbar with Stylish Google Sheet Reader custom scrollbar on tables. Scrollbar will only appear if paging is turned off and table height is set to lower than actual height."></i></td>
      <td> <?php echo draw_sgsr_toogle($id = 'custom_scrollbar',$def = '1'); ?></td>
</tr>


<!-- <tr style="height:20px;"><td colspan="2"></td></tr> -->
</table></div>

<div class="sgsr-main sgsr-card" sgsr-config-div="1">
   
<table style="width: 1200px;">
   <tr>
      <td colspan="2">
         <h1 class="sgsr-heading" >🚀 Cache Booster - Faster Loading <?php echo SGSR_PRO_ICON(); ?></h1>

      </td>
   </tr>

   <tr parent-row="cache">
      <td>Activate Booster ✨ <?php //echo SGSR_PRO_ICON(); ?></td>
      <td> <?php echo draw_sgsr_toogle($id = 'enable_cache',$def = '0',$lock=1); ?></td>
   </tr>

   <tr>
      <td>Cache Duration <i class="fas fa-question-circle" title="Selecting 'Every 15 Minutes' means that cached data will be displayed for 15 minutes. After that, the table will automatically refresh with the latest data from your Google Sheet."></i> <?php //echo SGSR_PRO_ICON(); ?></td>
      <td>
         <select class="khyzer" ignore-recreation="1" disabled>
            <option value="1m">Every Minute</option>
            <option value="5m">Every 5 Minutes</option>
            <option value="15m">Every 15 Minutes</option>

            <option value="1h">Every Hour</option>
            <option value="3h">Every 3 Hours</option>
            <option value="6h">Every 6 Hours</option>
            <option value="12h">Every 12 Hours</option>
            <option value="24h">Every 24 Hours</option>

         </select>
      </td>
   </tr>


<tr style="height:20px;"><td colspan="2"></td></tr>
<tr>
   <td colspan="2">
      <span show-sgsr-info="cache" style="color:red;">Need help choosing the right cache option?</span>

      <p class="sgsr-user-info" sgsr-info-box="cache" style="display:none;"><u><b>Activate Caching</b></u> to boost your table's loading speed, especially if you have a large dataset with thousands of rows. This feature is ideal for data that updates infrequently, such as once a day, hourly, or every few minutes. 

      <br><br>

      Enabling caching also helps conserve your <u><b>daily usage limits (i.e., Hits)</b></u>.

      <br><br>

      <span style="color:red;">If your data updates every few seconds, it's better to <u><b>avoid caching</b></u>, as it may not capture real-time changes.</span> </p>

   </td>
</tr>

</table>

<div style="height:20px;"></div>
<div style="margin: 10px;">
<input type="checkbox" id="sheet_seeting" checked required>
<label for="sheet_seeting">I have changed this google sheet sharing setting to "Anyone with the link can view" <i class="fas fa-question-circle" title="This is required for Stylish Google Sheet Reader to work"></i></label>
</div>


<center>
<input type="hidden" name="sgsr-update" value="-1">

<button type="submit" data-action="add-db" name="add-SGSR-sheet" id="add-SGSR-sheet" class="sgsr-green-btn" style="margin-top: 20px;max-width: 350px;"> Add Google Sheet <i class="fas fa-plus"></i></button>

<button type="submit" data-action="update-db" class="sgsr-green-btn sgsr-info-btn sgsr-hide" style="margin-top: 20px;max-width: 350px;"> Update Settings <i class="fas fa-sync"></i></button>
</center>

<!-- </div> -->
</div>

</form>


<style type="text/css">
   [child-option]{display: none;}
   h1.sgsr-heading {
    color: #1d2327;
    font-size: 2em;
    margin: .67em 0;
    background-color: #7d55ff26;
    padding: 10px;
    width: fit-content;
    border-radius: 4px;
    color: var(--sgsr-blue);
    font-size: 20px;
}


[sgsr-config-div]{
margin-top: 20px;
margin-right: 10px;
min-height: 300px;
max-width:1100px;
margin:auto;
margin-bottom: 20px;
      }
   </style>
<script type="text/javascript">
   $(document).on('change', '#range', function() {
    var x = $(this).val();         
    var uppercased = x.toUpperCase(); 
    $(this).val(uppercased);      
});


$( document ).ready(function() {
$('.sgsr-checkbox[is-locked="0"]').trigger('change');
});
</script>