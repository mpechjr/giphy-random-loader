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
 $giphy= get_option('giphy_search');
 
 ?>

<div class="">
<form  name="form1"  method="post" action="">
<input type="text" name="giphy_search" value="<?php echo $giphy ?>">
<input type="submit">
</form>
</div>
