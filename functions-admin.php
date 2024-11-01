<?php

function sgsr_CSSJS() {
    $page = isset($_GET['page']) ? $_GET['page'] : '';
// $filter_w = ['main_menu_sgsr','sgsr_create_new','sgsr_subscription','sgsr_support'];
// if(in_array($page, $filter_w)){}else{return 0;}
$vx = rand(1,999);

wp_enqueue_script('sgsr-script-1a',plugins_url('feedback.js?v='.$vx, __FILE__),1 ,1,1 );


if (strpos($page, 'sgsr_') !== false || strpos($page, '_sgsr') !== false ) {}else{return 0;}


wp_enqueue_style( 'sgsr-css-1', plugins_url('CSS/style.css?v='.$vx, __FILE__) );
wp_enqueue_style( 'sgsr-css-2', plugins_url('JS/tooltips/jquery-ui.css?v='.$vx, __FILE__) ,1 ,1,0 );
wp_enqueue_style( 'sgsr-css-3', plugins_url('JS/tooltips/style.css?v='.$vx, __FILE__) );
wp_enqueue_style( 'sgsr-css-4', plugins_url('CSS/elements.css?v='.$vx, __FILE__) );

// wp_enqueue_script( 'jquery-ui-tooltip' );


wp_enqueue_script('sgsr-script-1',plugins_url('JS/jquery-1.12.4.min.js?v='.$vx, __FILE__),1 ,1,0 );
wp_enqueue_script('sgsr-script-2',plugins_url('JS/tooltips/jquery-ui.js?v='.$vx, __FILE__),1 ,1,0 );
wp_enqueue_script('sgsr-script-3',plugins_url('sgsr-admin.js?v='.$vx, __FILE__),1 ,1,1 );
     
    

}


function SGSR_RANDOM_KEY($length = 20, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function sgsr_createDB(){
global $wpdb;
$table_name = $wpdb->prefix . "stylish_sgsr";

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
  
 `no` INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `project_uid` VARCHAR(255) NULL,
 `sheet_id` VARCHAR(255) NULL,
 `sheet_name` VARCHAR(255) NULL,
 `tab_name` VARCHAR(255) NULL,
 `range` VARCHAR(255) NULL,
 
 `enable_search` VARCHAR(255) NULL,
 `enable_sorting` VARCHAR(255) NULL,
 `default_sort_col` VARCHAR(255) NULL,
 `enable_data_export` VARCHAR(255) NULL,
 
 `style` VARCHAR(255) NULL,
 

 `theme` VARCHAR(255) NULL,
 `custom_scrollbar` VARCHAR(255) NULL,
 
 `responsive` VARCHAR(255) NULL,
 `max_table_height` VARCHAR(255) NULL,

 `enable_paging` VARCHAR(255) NULL,
 `page_length` VARCHAR(255) NULL
 
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}


}

function SGSR_TRIM($array) {
    // Use array_map to apply trim function to all values in the array
    return array_map('trim', $array);
}

function SGSR_RECORDS_UPDATE($data, $no = null) {
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";

    // Trim the input data
    $data = SGSR_TRIM($data);

    // Get the column names of the table
    $table_columns = $wpdb->get_col("DESC $table_name", 0);

    // Find columns in the data array that are not in the table
    $invalid_columns = array_diff_key($data, array_flip($table_columns));

    // Filter the data to include only columns that exist in the table
    $filtered_data = array_intersect_key($data, array_flip($table_columns));

    if ($no) {
        // Attempt to update the existing row
        $updated = $wpdb->update(
            $table_name,   // Table name
            $filtered_data, // Data to update
            ['no' => $no] // Where clause: update the row with the specified "no"
        );

        if ($updated !== false) {
            if (!empty($invalid_columns)) {
                return [
                    'status' => 1, // Success
                    'invalid_columns' => array_keys($invalid_columns) // Columns not found in table
                ];
            }
            return 1; // Success with no invalid columns
        } else {
            // Log or handle the error
            $error_message = $wpdb->last_error;
            return "Error updating data: " . $error_message;
        }
    } else {
        // Attempt to insert the filtered data
        $created = $wpdb->insert(
            $table_name,
            $filtered_data
        );

        // Check if the insertion was successful
        if ($created !== false) {
            if (!empty($invalid_columns)) {
                return [
                    'status' => 1, // Success
                    'invalid_columns' => array_keys($invalid_columns) // Columns not found in table
                ];
            }
            return 1; // Success with no invalid columns
        } else {
            // Log or handle the error
            $error_message = $wpdb->last_error;
            return "Error inserting data: " . $error_message;
        }
    }
}



function sgsr_RECORDS_ADD($data) {
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";

    if(!SGSR_MAKE_NEW_CONTENT()){return 0;}

    // Trim the input data
    $data = SGSR_TRIM($data);
    $data["project_uid"] = SGSR_RANDOM_KEY(16);

    // Get the column names of the table
    $table_columns = $wpdb->get_col("DESC $table_name", 0);

    // Find columns in the data array that are not in the table
    $invalid_columns = array_diff_key($data, array_flip($table_columns));

    // Filter the data to include only columns that exist in the table
    $filtered_data = array_intersect_key($data, array_flip($table_columns));

    // Attempt to insert the filtered data
    $created = $wpdb->insert(
        $table_name,
        $filtered_data
    );

    // Check if the insertion was successful
    if ($created !== false) {
        $inserted_no = $wpdb->insert_id; // Get the auto-incremented "no"

        if (!empty($invalid_columns)) {
            return [
                'status' => 1, // Success
                'invalid_columns' => array_keys($invalid_columns),  // Columns not found in table
                'inserted_no' => $inserted_no 
            ];
        }
        return 1; // Success with no invalid columns
    } else {
        // Log or handle the error
        $error_message = $wpdb->last_error;
        return "Error inserting data: " . $error_message;
    }
}




function sgsr_DELDB(){

global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);

}




function SGSR_RECORDS_DELETE($sgsr_index){

    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";
    $wpdb->delete( $table_name, array( 'no' => $sgsr_index ) );

}

function GSGR_GET_DATA($sgsr_index){
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";
    $data =  $wpdb->get_row( "SELECT * FROM $table_name WHERE no = '$sgsr_index'" );
     $data = json_decode(json_encode($data), true);
    // print_r($data);
    return $data;
}

function SGSR_CONTENT() {
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";

    // Get the count of all rows from the table
    $row_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");

    return $row_count;
}


function SGSR_MAKE_NEW_CONTENT(){
    $sgsr_v= intval(strlen('i'));
    $sgsr_tv = intval(SGSR_CONTENT());
    if($sgsr_tv >= $sgsr_v){return false;}else{return true;}

}


function GSGR_GET_PROJECT($project_id){
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";
    $data =  $wpdb->get_row( "SELECT * FROM $table_name WHERE project_uid = '$project_id'" );
     $data = json_decode(json_encode($data), true);
    // print_r($data);
    return $data;
}

function GET_ALL_SGSR() {
    global $wpdb;
    $table_name = $wpdb->prefix . "stylish_sgsr";

    // Fetch all rows from the table
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    // Convert the results to an array
    $data = json_decode(json_encode($results), true);

    return $data;
}






function sgsr_home(){include 'Pages/activation.php';}
function sgsr_support() {include 'Pages/support.php';}
function sgsr_intro() {include 'Pages/intro.php';}
function sgsr_create_new() {include 'Pages/create_new_sheet.php';}
function sgsr_manage_all_sheets() {include 'Pages/all-sheets.php';}
function sgsr_templates() {include 'Pages/templates.php';}
function sgsr_added_success() {include 'Pages/success.php';}

function sgsr_subscription() {include 'Pages/subscription.php';}



function sgsr_menu() {
  

  add_menu_page ( 'Menu', 'Stylish Google Sheet Reader Lite (4.0)', 'manage_options', 'main_menu_sgsr', 'sgsr_intro', 'dashicons-money-alt' );
  
  add_submenu_page ( 'main_menu_sgsr', 'sgsr_create_new', 'Add New Sheet', 'manage_options','sgsr_create_new' ,'sgsr_create_new', '');

  add_submenu_page ( 'main_menu_sgsr', 'sgsr_manage_all_sheets', 'Manage Sheets', 'manage_options','sgsr_manage_all_sheets' ,'sgsr_manage_all_sheets', '');

  // add_submenu_page ( 'main_menu_sgsr', 'sgsr_templates', 'Templates', 'manage_options','sgsr_templates' ,'sgsr_templates', '');
  

    add_submenu_page ( 'main_menu_sgsr', 'Subscription', 'Subscription', 'manage_options','sgsr_subscription' ,'sgsr_subscription', '');

  add_submenu_page ( 'main_menu_sgsr', 'Support', 'Support', 'manage_options','sgsr_support' ,'sgsr_support', '');
  
  // ?page=sgsr_add_sheet will run function sgsr_create_new()
  // add_submenu_page ( null, 'Get Started', 'Get Started', 'manage_options','sgsr_add_sheet' ,'sgsr_create_new', ''); 
  add_submenu_page ( null, 'Success Msg', 'Success Msg', 'manage_options','sgsr_added_success' ,'sgsr_added_success', ''); 

}

?>