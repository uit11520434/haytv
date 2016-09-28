<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Argo
 */

$bg_img = get_post_meta( get_the_ID(),'div_image',true );
?>

<div class="divider section">
	<div class="bg-holder" style="<?php echo (!empty($bg_img))?'background-image:url('.$bg_img.')':''   ; ?>">
		<div class="container">
			<div class="hero">
				<p><?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(),'div_html',true ) ) ; ?></p>
			</div>
		</div>
	</div>
</div>

