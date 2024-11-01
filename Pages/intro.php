<div class="sgsr-main sgsr-card create-card demo-page" style="min-height: 600px;margin-top: 50px;">

   <div calc-limit-error="<?php echo isset($_GET['lim']) ? $_GET['lim'] : '0'; ?>">
      <p>You have reached your limit for adding sheets. Please consider <a href="?page=sgsr_subscription">upgrading your subscription plan.</a></p>

      <p>You can view your created tables <a href="?page=sgsr_manage_all_sheets"> by clicking here.</a>. To create a new one, you can either delete an existing table or upgrade your subscription plan to increase your limit.</p>
   </div>
   

  <div style="height:50px;"></div>

   <h1 class="sgsr-space-1">Add New Google Sheet</h1>
   <div style="height:20px;"></div>
   <button type="button" class="sgsr-green-btn" action="create-sgsr-sheet">Create New <i class="far fa-plus"></i></button>
   <!-- <button type="button" class="sgsr-green-btn" action="create-sgsr-template">Start with a template <i class="fas fa-angle-double-right"></i></button> -->


   <div style="height:50px;"></div>
   <h2>Need help getting started?</h2>
    <h2 class="watch-video">Watch a Video <i class="fas fa-play-circle"></i></h2>
    
    <div style="height:40px;"></div>
   <a href="https://wppluginbox.com/en/sgsr-documentation/" target="_blank" style="text-decoration: none;color: var(--sgsr-green);font-size: 16px;border:1px solid var(--sgsr-green);padding: 12px;border-radius: 25px;">View Documentation <i class="fas fa-angle-double-right"></i></a>




</div>


<script type="text/javascript">
   $(document).on('click', '[action="create-sgsr-sheet"]', function() {
     window.open('?page=sgsr_create_new&create_new=1','_self');
   });

   $(document).on('click', '[action="create-sgsr-template"]', function() {
     window.open('?page=sgsr_templates','_self');
   });

   $(document).on('click', '.watch-video', function() {
     window.open('https://wppluginbox.com/en/setup-sgsr-pro/','_blank');
   });
</script>

<style type="text/css">
   [calc-limit-error="0"]{display: none;}
   [calc-limit-error="1"]{
   padding: 23px;
    margin: auto;
    max-width: 400px;
    font-family: Arial;
    font-size: 14px;
    background-color: #ff000012;
    color: #ff0000c9;
    border-radius: 12px;
    margin-top: 24px;
    text-align: left;
   }
</style>
<style type="text/css">
   .create-card{
      padding: 20px;
      background-color: white;
      text-align: center;
      min-height: 500px;
      max-width: 90%;
      margin: auto;
   }

   .sgsr-space-1{
      margin: 10px;
   }

   .watch-video{
      color: var(--sgsr-green);
   }

   .watch-video:hover{
      text-decoration: underline;
      transform: scale(1.1);
      cursor: pointer;
   }

   .green-btn{border-radius: 25px;}
   .green-btn:hover{
      transform: scale(1.1);
      transition: 0.2s;
   }

   
</style>