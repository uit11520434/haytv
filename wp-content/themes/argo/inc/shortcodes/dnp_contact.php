<?php

function dnp_contact($params, $content = null){
	extract(shortcode_atts(array(
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = ''; 
	$result .= '<form class="comment_form" id="commentform" method="post" action="'.admin_url( 'admin-ajax.php?action=contact' ).'">
						<div class="row-fluid">
							<div class="span6">
								<input type="email" placeholder="'.__('Email','').'" required name="email" id="email">
							</div>
							<div class="span6">
								<input type="text" placeholder="'.__('Name','').'" required name="name" id="name">
							</div>
						</div>
						<div class="row-fluid">
							<div class="span8">
								<textarea rows="10" cols="30" placeholder="'.__('Message','').'" name="message"></textarea>
							</div>
							<div class="span4">
								<button type="submit" class="btn "><i class="li_paperplane"></i>'.__('Send message','argo').'</button>
							</div>
						</div>
					</form>'; 
	return force_balance_tags( $result );
}
add_shortcode('contact-form', 'dnp_contact');