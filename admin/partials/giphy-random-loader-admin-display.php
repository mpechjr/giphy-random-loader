<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.melaniopech.com
 * @since      1.0.0
 *
 * @package    Giphy_Random_Loader
 * @subpackage Giphy_Random_Loader/admin/partials
 */

?>
<?php 

 
 //must check that the user has the required capability 
 if (!current_user_can('manage_options'))
 {
   wp_die( __('You do not have sufficient permissions to access this page.') );
 }

 // variables for the field and option names 
 $opt_api_name = 'giphy_api';
 $opt_search_name = 'giphy_search';
 $hidden_field_name = 'submit_hidden';
 $data_field_api_name = 'giphy_api';
 $data_field_name = 'giphy_search';

 $hidden_field_name_giphy = 'submit_hidden_giphy';
 $data_field_giphy_selected_name = 'giphy_selected';
 // Read in existing option value from database
 

 // See if the user has posted us some information
 // If they did, this hidden field will be set to 'Y'
 if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
     // Read their posted value
     $opt_val_api = $_POST[ $data_field_api_name ];
     $opt_val_search = $_POST[ $data_field_name ];
     // Save the posted value in the database
     update_option( $opt_api_name, $opt_val_api );

     // Save the posted value in the database
     update_option( $opt_search_name, $opt_val_search );

 }
 $user_id = get_current_user_id();
 
  // See if the user has posted us some information
 // If they did, this hidden field will be set to 'Y'
 if( isset($_POST[ $hidden_field_name_giphy ]) && $_POST[ $hidden_field_name_giphy ] == 'Y' ) {
  // Read their posted value
  $opt_val_selected = $_POST[ $data_field_giphy_selected_name ];

  // Save the posted value in the database
   
  $user_data = update_user_meta(  $user_id, 'giphy_profile_image', $opt_val_selected  );
 
  if ( is_wp_error( $user_data ) ) {
      // There was an error; possibly this user doesn't exist.
      echo 'Error.';
  } else {
      // Success!
      echo 'User profile updated.';
  }

} 

$giphy_api= get_option($opt_api_name);
$giphy_search= get_option($opt_search_name);
?>

<div class="">
<h1>Giphy Random Loader</h1>
<form  name="form1"  method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<div style="margin-bottom:1em;">API <input type="text" name="<?php echo $data_field_api_name ?>" value="<?php echo $giphy_api ?>"> </div>
<div>Search terms <input type="text" name="<?php    echo $data_field_name ?>" value="<?php echo $giphy_search ?>"></div>
<input type="submit">
</form>
</div>
<div>
<h1>Images</h1>
<?php 
$api_url = 'https://api.giphy.com/v1/gifs/search?api_key='.$giphy_api.'&limit=5&q='.$giphy_search;
		
$response = wp_remote_get( $api_url );
$content = '';
if ( is_array( $response ) && ! is_wp_error( $response ) && !empty($giphy_api)) {
  $headers = $response['headers']; // array of http header lines
  $body = $response['body']; // use the content
  
  $items = json_decode($body);
   
  ?>
  <form name="form1"  method="post" action="">
  <input type="hidden" name="<?php echo $hidden_field_name_giphy; ?>" value="Y">
<?php 
  foreach($items->data as $item){
     
    $giphy_url =  $item->images->original->url;
    $content.= '<input type="radio" name="'.$data_field_giphy_selected_name.'" value="'.$giphy_url.'"><label ><img src="'.$giphy_url.'"></label><br>';	
  }
}

echo $content;
?>
<input type="submit">
</form>
</div>
