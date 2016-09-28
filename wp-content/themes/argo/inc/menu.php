<?php
/**
 * Argo menu
 */

function argo_title_menu() {
	$logo_type = ot_get_option('logo_type','text');
    $logo_image = ot_get_option('logo_image_big',get_template_directory_uri().'/assets/img/195x195.gif');
	?>
<header id="header">
<div class="header-holder">
	<div class="container hidden-phone">
		<div class="brow">
			<div class="brick1 logo_container">
				<a href="#" class="nav-item clearfix">
					<div class="nav-hover"></div>
					<h1 class="logo <?php echo $logo_type; ?>"><?php echo ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; ?></h1>
				</a>
			</div>
		</div>
	<?php

	$title_menu = ot_get_option('nav_items',false);
	$mobile_menu = '';
	if($title_menu && !(is_string($title_menu))){
		$menu_id = array();
		$i = 0;
		foreach ($title_menu as $menu_item) {

			$page_mn = get_page( $menu_item['page_select'] );
			
			$mn_class = isset($menu_item['brick'])?$menu_item['brick'].' ':'';
			$mn_class .= isset($menu_item['brick_color'])?$menu_item['brick_color'].' ':'';
			$mn_class .= isset($menu_item['brick_offset'])?$menu_item['brick_offset'].' ':'';
			$mn_icon = isset($menu_item['nav_icon'])?$menu_item['nav_icon']:'';
			$link ='';
			$title = isset($menu_item['custom_title'])?$menu_item['custom_title']:'';
			$is_external = '';
			switch ($menu_item['link_type']) {
				case 'page':
					if(!$page_mn) continue;
					$link = site_url('/#').$page_mn->post_name;
					$title = (empty($title))?$page_mn->post_title:$title;
					break;
				case 'page_external':
					if(!$page_mn) continue;
					$link = get_permalink($menu_item['page_select']);
					$is_external = 'external';
					$title = (empty($title))?$page_mn->post_title:$title;
					break;
				default:
					$link = $menu_item['custom_link'];
					$is_external = 'external';
					break;
			}
			$line = 0;
			if($menu_item['brick_type']=='nav_item'){
				?>
				<div class="<?php echo $mn_class; ?>">
					<a href="<?php echo $link;  ?>" class="nav-item <?php echo $is_external; ?>">
						<div class="nav-hover"></div>
						<i class="<?php echo $mn_icon; ?>"></i>
						<span><?php echo $title; ?></span>
					</a>
				</div>
				<?php

				if($i==0){
				$logo_html = ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; 
				$mobile_menu .= '<div class="brick1 logo_container">
									<a href="#" class="nav-item clearfix">
										<div class="nav-hover"></div>
										<h1 class="logo '.$logo_type.'">'.$logo_html.'</h1>
									</a>
								</div>';
				 $i++;
						}
				$odd= (in_array($i,array(1,2,5,6,9,10,13,14)))?'odd':'';
				$mobile_menu .= '<div class="brick1 '.$odd.'">
									<a href="'.$link.'" class="nav-item '.$is_external.'">
										<div class="nav-hover"></div>
										<i class="'.$mn_icon.'"></i>
										<span>'.$page_mn->post_title.'</span>
									</a>
								</div>';

			    $i++;

			}
			else if($menu_item['brick_type']=='flip_images'){
				$img1= (isset($menu_item['img_1']))?$menu_item['img_1']:'http://placehold.it/195x195';
					$img2= (isset($menu_item['img_2']))?$menu_item['img_2']:'http://placehold.it/195x195';
				?>

				<div class="brick1 thumb <?php echo $menu_item['brick_offset']; ?>">
					<div class="nav-item <?php echo $menu_item['img_direction']; ?>">
						<img alt="" src="<?php echo $img1; ?>" class="img1">
						<img alt="" src="<?php echo $img2; ?>" class="img2">
					</div>
				</div>
				<?php
			}
			else {
				?>
				<div class="<?php echo $mn_class; ?> slogan transparent text-right">
					<div class="inner">
						<?php echo $menu_item['slogan_text']; ?>
					</div>
					
				</div>
				<?php
			}
		}
	}
	
	?>
	</div>  <!-- end hidden-phone -->
	<div class="container visible-phone">
		<?php echo $mobile_menu; ?>		
	</div>
	</div>
</header> <!-- End header -->
	<?php
}

function argo_navbar(){
	$logo_type = ot_get_option('logo_type','text');
    $logo_image = ot_get_option('logo_image_small',get_template_directory_uri().'/assets/img/100x45.gif');
    $title_menu = ot_get_option('nav_items',false);
	if($title_menu  && !is_string($title_menu)){
 ?>
	<div id="navbar" class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo site_url('/'); ?>" class="external brand <?php echo $logo_type; ?>"><?php echo ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; ?></a>
      <div class="nav-collapse collapse">
        <ul class="nav">
		<?php 
		foreach ($title_menu as $menu_item) :
			$page_mn = get_page( $menu_item['page_select'] );
		    if(!$page_mn) continue;
			$mn_icon = isset($menu_item['nav_icon'])?$menu_item['nav_icon']:'';
			$link ='';
			$is_external = '';
			switch ($menu_item['link_type']) {
				case 'page':
				   if(is_home()) $link = '#'.$page_mn->post_name;
				   else $link = site_url('/#').$page_mn->post_name;
					break;
				case 'page_external':
					$link = get_permalink($menu_item['page_select']);
					$is_external = 'external';
					break;
				default:
					$link = $menu_item['custom_link'];
					$is_external = 'external';
					break;
			}
			if(!is_home() )$is_external = 'external';
			$line = 0;
			if($menu_item['brick_type']=='nav_item'){
				?>
			  <li class="">
	            <a href="<?php echo $link;  ?>" class="<?php echo $is_external; ?>"><i class="<?php echo $mn_icon; ?>"></i><?php echo $page_mn->post_title; ?></a>
	          </li>
         <?php 
         	}
         endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div> <!-- end navbar -->

 <?php
	}
}
