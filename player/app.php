<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <?php include 'head.php'; ?>
</head>

<body black-theme="1" style="background-color: transparent;">
<div style="height:20px;"></div>
    <div>
        <p class='sgsr-info-msg'>An error occurred while displaying this table. If the issue persists, please try deleting the table and re-adding it through the admin dashboard.</p>
    </div>

    <div id="ini-loader">
        <div style="height:100px;"></div>
        <center><img style="width:100px;" src="../../player/img/loader.webp"></center>
    </div>

<div class="main sgsr-hide" sgsr-shadow="" round-shadow="" sgsr-scroll="0">

    <div class="sgsr-container">

        <div class="search-container">
            <input type="text" class="search-box form-control form-control-sm" id="search-box" placeholder="Enter Keywords to Search">
        </div>

        <table class="table row-border table-hover" center-text="1" id="dataTable">
            <thead><tr id="tableHeaders"></tr></thead>
            <tbody></tbody>
        </table>

    </div>

</div>



<script type="text/javascript" src="../JS/formatter-js.js?v=<?php echo $vx; ?>"></script>
<script type="text/javascript" src="../JS/common-js.js?v=<?php echo $vx; ?>"></script>
<script type="text/javascript" src="../JS/addons-js.js?v=<?php echo $vx; ?>"></script>
<script type="text/javascript" src="../JS/script-js.js?v=<?php echo $vx; ?>"></script>
<script type="text/javascript" src="../JS/defaults-js.js?v=<?php echo $vx; ?>"></script>

<div style="height: 50px;"></div>  
</body>
</html>