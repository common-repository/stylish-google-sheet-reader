<?php 

$sgsr_theme_url = plugins_url("/",__FILE__);

?>

<div><h2>Choose Theme</h2></div>

<select class="khyzer" name="theme" id="theme" ignore-recreation="1" style="display:none;">
    <option value="white">White</option>
    <option value="black">Black</option>
</select>

<div class="sgsr-row-box" select-menu="theme">
	<div>
		<img class="sgsr-theme-icons" src="<?php echo $sgsr_theme_url; ?>white-theme.png">
		<h2>White Theme</h2>
		<p><span class="sgsr-choose-btn sgsr-checked" data-value="white">Choose Theme</span></p>
	</div>
	<div>
		<img class="sgsr-theme-icons" src="<?php echo $sgsr_theme_url; ?>black-theme.png">
		<h2>Black Theme</h2>
		<p><span class="sgsr-choose-btn" data-value="black">Choose Theme</span></p>
	</div>
</div>

<script type="text/javascript">
	$(document).on('click', '.sgsr-choose-btn', function() {
        var parent_row = $(this).closest('.sgsr-row-box');
		parent_row.find('.sgsr-choose-btn').removeClass("sgsr-checked");

		var select_menu = parent_row.attr('select-menu');
		var option = $(this).attr('data-value');

		$(this).addClass("sgsr-checked");
		$('#'+select_menu).val(option);

		if(option =="white"){$('[child-theme-option="white"]').show();}else{
			$('[child-theme-option="white"]').hide();
		}
	    
	});


	// $(document).on('change', '#theme', function() {
	//   $('[select-menu="theme"] [data-value="'+this.value+'"]').addClass("sgsr-checked");
	// });


</script>


<div style="height: 50px;"></div>

<style type="text/css">
	[child-theme-option="white"]{display: none;}
	.sgsr-row-box{
		display: flex;
		gap: 20px;
	}

	.sgsr-row-box > div {
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    padding: 12px;
    border-radius: 13px;
}

	.sgsr-theme-icons{
		width: 350px;
		height: 200px;
	}

	.sgsr-choose-btn {
    background-color: #FF5722;
    color: white;
    padding: 6px 16px;
    width: 107px;
    cursor: pointer;
    border-radius: 12px;
    font-size: 12px;
    display: block;
}


.sgsr-choose-btn:hover{
    transition: 0.2s;
    transform: scale(1.09);
}

.sgsr-checked:after{
    content: "\00a0 \f058";
    font-family: "Font Awesome 5 Pro";
    font-weight: 900;

}
</style>