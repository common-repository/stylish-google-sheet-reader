<?php 

function SGSR_PRO_ICON(){
    $html = ' <i class="fas fa-crown sgsr-pro-icon" title=\'This is a pro feature. 👑 <br> Go pro to unlock full access.\'></i>';

    return $html;
}

function draw_sgsr_toogle($id,$def,$locked=0){

$enable = '';
$disable = '';
$checked = '';

if($def == '1'){$enable = 'selected';$checked = 'checked';}else{$disable = 'selected';}

$html_locked = '

<div class="sgsr-toggle-switch">
    <input type="checkbox" onclick="alert(\'This is a pro feature. Please upgrade your subscription plan for unlimited access to all features.\');return false;" is-locked="'.$locked.'" id="slider-'.$id.'" class="sgsr-checkbox" style="display:none;" '.$checked.'/>
    <label class="sgsr-slider" for="slider-'.$id.'" is-locked="'.$locked.'"></label>
</div>


';

if($locked == '1'){return $html_locked;}

$html = '

<select class="khyzer" name="'.$id.'" id="'.$id.'" style="display:none;" has-toogle-btn="1">
            <option value="1" '.$enable.'>Enabled</option>
            <option value="0" '.$disable.'>Disable</option>
         </select>

<div class="sgsr-toggle-switch">
    <input type="checkbox" onchange="update_sgsr_checkbox(\''.$id.'\',this)" id="slider-'.$id.'" class="sgsr-checkbox" style="display:none;" '.$checked.'/>
    <label class="sgsr-slider" for="slider-'.$id.'"></label>
</div>


';


return $html;
}

?>