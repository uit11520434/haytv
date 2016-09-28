<?php
/**
 * The template for displaying search forms in Argo
 *
 * @package Argo
 */
?>

<form id='search'  class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method='get'>
	<input type='text' name='s' id='s' placeholder='Search for something'>
</form>