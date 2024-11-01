<?php
function SGSR_scripts() {
global $post;

      //=========
    if( has_shortcode( $post->post_content, 'sgsr-table') ) {

$vx = rand(1,9999);
//------------ PLAYER-----
wp_enqueue_script( 'sgsr_script_1', plugins_url('/JS/sgsc-cuid.js?v='.$vx, __FILE__), array('jquery'),'2.1',1); // footer 


wp_enqueue_style( 'css_sgsr_1', plugins_url('/JS/sgsr-frame.css?v='.$vx, __FILE__) );

//--------------------        

    }

      //=========
 }



function sgsr_get_project_details_ajax_handler() {
    // Get the 'uid' parameter from the AJAX request
    // $_POST['uid'] = '-';
    $project_uid = isset($_POST['uid']) ? sanitize_text_field($_POST['uid']) : '';

    if ($project_uid) {
        // Call your function to get the project data
        $project_data = GSGR_GET_PROJECT($project_uid);

        $project_data["sheet_id"] = base64_encode($project_data["sheet_id"]);
        $project_data["range"] = base64_encode($project_data["range"]);
        $project_data["sheet_name"] = '***';

        // Return the data as a JSON response
        wp_send_json($project_data);
    } else {
        // Return an error response if no uid was provided
        wp_send_json_error('No project UID provided.');
    }

    // Always end your AJAX functions with wp_die()
    wp_die();
}



 function sgsr_render_table($atts, $content = null){

extract(shortcode_atts(array(
      "id" => '1',    
   ), $atts));

// $id = 2;   
$sgsr_data = GSGR_GET_DATA($id);
// echo "<pre>";print_r($sgsr_data);echo"</pre>";
if( is_array($sgsr_data) && sizeof($sgsr_data) >0 ){
    $sgsr_id = $sgsr_data["project_uid"];
    
    if($sgsr_data["sheet_id"] == '' || $sgsr_data["range"] == ''){$sgsr_id = 'gsheet_error';}

}else{
    $sgsr_id = '-';
}
//============= PLAYER CONTENT ==========
ob_start();
include __DIR__.'/player/player.php';
$output = ob_get_clean();
return $output;
//======================================


   
}

?>