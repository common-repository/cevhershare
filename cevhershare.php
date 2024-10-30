<?php
/*
Plugin Name: CevherShare
Plugin URI: http://wpusta.com/down/cevhershare/
Description: This plugin allows you too add dynamic social bar with their sharing icons. (Facebook, Twitter, Buzz, Digg  etc.) You can customize it for your browser size and page location.  More information and Demo: <a href="http://www.cevhershare.com/">CevherShare Plugin Home</a>
Version: 2.1
Author: WPUsta.COM
Author URI: http://cevhershare.com/
License: GPL2
*/
/*  Copyright 2010  Rashad Aliyev  (email : contact@rashadaliyev.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function upgrade(){
	global $wpdb;
	$table = $wpdb->prefix."cevhershare";
	$wpdb->query("DROP TABLE IF EXISTS $table");
	cevhershare_install();
}

	
function cevhershare_install(){
    global $wpdb;
    $table = $wpdb->prefix."cevhershare";
   	if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
		$structure = "CREATE TABLE $table (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		position mediumint(9) NOT NULL,
		enabled int(1) NOT NULL,
		name VARCHAR(80) NOT NULL,
		big text NOT NULL,
		small text NULL,
		UNIQUE KEY id (id)
		);";
		$wpdb->query($structure);
	
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','1','fblike', '<iframe src=\"http://www.facebook.com/plugins/like.php?href=[url]&layout=box_count&show_faces=false&width=60&action=like&colorscheme=light&height=45\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:45px; height:60px;\" allowTransparency=\"true\"></iframe>', '<iframe src=\"http://www.facebook.com/plugins/like.php?href=[url]&layout=button_count&show_faces=false&width=85&action=like&colorscheme=light&height=21\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:85px; height:21px;\" allowTransparency=\"true\"></iframe>')");
		
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','2','twitter', '<a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-count=\"vertical\" data-via=\"[twitter]\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script>', '<a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-count=\"horizontal\" data-via=\"[twitter]\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script>')");
		
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','3','buzz', '<a title=\"Post to Google Buzz\" class=\"google-buzz-button\" href=\"http://www.google.com/buzz/post\" data-button-style=\"normal-count\"></a><script type=\"text/javascript\" src=\"http://www.google.com/buzz/api/button.js\"></script>', '<a title=\"Post to Google Buzz\" class=\"google-buzz-button\" href=\"http://www.google.com/buzz/post\" data-button-style=\"small-count\"></a><script type=\"text/javascript\" src=\"http://www.google.com/buzz/api/button.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','4','sharethis', '<script type=\"text/javascript\" src=\"http://w.sharethis.com/button/buttons.js\"></script><span class=\"st_facebook_vcount\" displayText=\"Share\"></span><span class=\"st_email\" displayText=\"Email\"></span><span class=\"st_sharethis\" displayText=\"Share\"></span>', '<span class=\"st_facebook_hcount\" displayText=\"Share\"></span><span class=\"st_email\" displayText=\"Email\"></span><span class=\"st_sharethis\" displayText=\"Share\"></span>')");
		
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','5','plusone', '<script type=\"text/javascript\" src=\"https://apis.google.com/js/plusone.js\"></script><g:plusone size=\"tall\"></g:plusone>','<script type=\"text/javascript\" src=\"https://apis.google.com/js/plusone.js\"></script><g:plusone size=\"medium\"></g:plusone>')");
	
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','6','linkedin', '<script type=\"text/javascript\" src=\"http://platform.linkedin.com/in.js\"></script><script type=\"in/share\" data-counter=\"top\"></script>','<script type=\"text/javascript\" src=\"http://platform.linkedin.com/in.js\"></script><script type=\"in/share\" data-counter=\"right\"></script>')");
	
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','7','digg', '<script type=\"text/javascript\">(function() { var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0]; s.type = \'text/javascript\'; s.async = true; s.src = \'http://widgets.digg.com/buttons.js\'; s1.parentNode.insertBefore(s, s1); })(); </script><a class=\"DiggThisButton DiggMedium\"></a>', '<script type=\"text/javascript\">(function() { var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0]; s.type = \'text/javascript\'; s.async = true; s.src = \'http://widgets.digg.com/buttons.js\'; s1.parentNode.insertBefore(s, s1); })(); </script><a class=\"DiggThisButton DiggCompact\"></a>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','8','facebookclassic', '<a name=\"fb_share\" type=\"box_count\" href=\"http://www.facebook.com/sharer.php\">Share</a><script src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\" type=\"text/javascript\"></script>', '<a name=\"fb_share\" type=\"button_count\" href=\"http://www.facebook.com/sharer.php\">Share</a><script src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\" type=\"text/javascript\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','9','reddit', '<script type=\"text/javascript\" src=\"http://reddit.com/static/button/button2.js\"></script>', '<script type=\"text/javascript\" src=\"http://reddit.com/static/button/button1.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','10','dzone', '<script language=\"javascript\" src=\"http://widgets.dzone.com/links/widgets/zoneit.js\"></script>', '<script language=\"javascript\" src=\"http://widgets.dzone.com/links/widgets/zoneit.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','11','stumbleupon', '<script src=\"http://www.stumbleupon.com/hostedbadge.php?s=5\"></script>', '<script src=\"http://www.stumbleupon.com/hostedbadge.php?s=2\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','12','yahoo', '<script type=\"text/javascript\" src=\"http://d.yimg.com/ds/badge2.js\" badgetype=\"square\">[url]</script>', '<script type=\"text/javascript\" src=\"http://d.yimg.com/ds/badge2.js\" badgetype=\"small-votes\">[url]</script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','13','email', '<a href=\"mailto:?subject=[url]\" class=\"cevhershare-button email\">Email</a>', '<a href=\"mailto:?subject=[url]\" class=\"cevhershare-button email\">Email</a>')");
		
		add_option('cevhershare_auto_posts', 1);
		add_option('cevhershare_auto_pages', 1);
		add_option('cevhershare_horizontal', 1);
		add_option('cevhershare_credit', 1);
		add_option('cevhershare_minwidth','1000');
		add_option('cevhershare_position','left');
		add_option('cevhershare_leftoffset','25');
		add_option('cevhershare_rightoffset','10');
		add_option('cevhershare_swidth','67');
		add_option('cevhershare_twitter_username','wpusta');
		add_option('cevhershare_language','english');
		
	}
	
}

function cevhershare_reset(){
	global $wpdb;
	$table = $wpdb->prefix."cevhershare";
	$wpdb->query("DROP TABLE IF EXISTS $table");
	cevhershare_install();
}

function cevhershare_menu(){
    global $wpdb;

	$auto_posts = get_option('cevhershare_auto_posts'); $auto_pages = get_option('cevhershare_auto_pages'); $credit = get_option('cevhershare_credit'); 
	$horizontal = get_option('cevhershare_horizontal'); $width = get_option('cevhershare_minwidth'); $position = get_option('cevhershare_position');
	$leftoffset = get_option('cevhershare_leftoffset'); $rightoffset = get_option('cevhershare_rightoffset');
	$swidth = get_option('cevhershare_swidth'); $twitter_username = get_option('cevhershare_twitter_username'); $language = get_option('cevhershare_language'); $seffaf = get_option('cevhershare_seffaf'); $arxaplan = get_option('cevhershare_arxaplan');

    include 'cevhershare-admin.php';
}

function cevhershare_settings($auto_posts, $auto_pages, $horizontal, $width, $position, $leftoffset, $rightoffset, $credit, $swidth,  $twitter_username){
	update_option('cevhershare_auto_posts',$auto_posts); update_option('cevhershare_auto_pages',$auto_pages); update_option('cevhershare_horizontal',$horizontal);
	update_option('cevhershare_minwidth',$width); update_option('cevhershare_position',$position); update_option('cevhershare_credit',$credit); 
	update_option('cevhershare_leftoffset',$leftoffset); update_option('cevhershare_rightoffset',$rightoffset);
	update_option('cevhershare_swidth',$swidth); update_option('cevhershare_twitter_username',$twitter_username); update_option('cevhershare_language',$language); update_option('cevhershare_seffaf',$seffaf); $arxaplan = get_option('cevhershare_arxaplan');
}


function cevhershare_auto($content){
	if((get_option('cevhershare_auto_posts') && is_single()) || (get_option('cevhershare_auto_pages') && is_page())){ $str = cevhershare(false); $str .= cevhershare_horizontal(false); }
	$newcontent = $str.$content;
	return $newcontent;
}

function cevhershare($print = true){
	global $wpdb;
	$credit = get_option('cevhershare_credit');
	$arxaplan = get_option('cevhershare_arxaplan');
	
	$seffaf = get_option('cevhershare_seffaf');
	if($seffaf != ''){	
	$seffaf="border: 0px;";}
		else{
			if($arxaplan!="fff" || $arxaplan!="ffffff"){
			$seffaf="background: #".$arxaplan.";";}
			else{$seffaf="background: #fff; border: 1px solid #ccc;";}
		}//end else
	
    $str = '<ul id="cevhershare" style="'.$seffaf.'">';
	$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cevhershare WHERE enabled=1 ORDER BY position, id ASC"); $str .= "\n";
	foreach($results as $result){ $str .= '<li>'.cevhershare_filter($result->big).'</li>'; }
	if($credit) $str .= '<li class="credit"><a href="http://wpusta.com/cevhershare" title="CevherShare" target="_blank">CevherShare</a></li>';
	$str .= '</ul>';
	if($print) echo $str; else return $str;
}

function cevhershare_horizontal($print = true){
	if(get_option('cevhershare_horizontal')){
		global $wpdb;
		$str = '<ul id="cevhersharex">';
		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cevhershare WHERE enabled=1 ORDER BY position, id ASC"); $str .= "\n";
		foreach($results as $result) { $str .= '<li>'.cevhershare_filter($result->small).'</li>'; }
		$str .= '</ul>';
		if($print) echo $str; else return $str;
	}
}

function cevhershare_button($name, $size = 'big'){
	global $wpdb;
	$item = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."cevhershare WHERE name='$name'");
	if($size == 'big') echo $item->big; else echo $item->small;
}

function cevhershare_update_button($id, $uptask){
	global $wpdb;
	if($uptask == 'enable')
		$wpdb->query("UPDATE ".$wpdb->prefix."cevhershare SET enabled='1' WHERE id='$id'");
	elseif($uptask == 'disable')
		$wpdb->query("UPDATE ".$wpdb->prefix."cevhershare SET enabled='0' WHERE id='$id'");
	elseif($uptask == 'delete')
		$wpdb->query("DELETE FROM ".$wpdb->prefix."cevhershare WHERE id=$id LIMIT 1");
}

function cevhershare_init(){
	if(!is_admin()) wp_enqueue_script('cevhershare', get_bloginfo('wpurl').'/wp-content/plugins/cevhershare/js/cevhershare.js',array('jquery'));
}


function cevhershare_header(){
	$auto_posts = get_option('cevhershare_auto_posts'); $auto_pages = get_option('cevhershare_auto_pages'); $horizontal = get_option('cevhershare_horizontal');
	$width = get_option('cevhershare_minwidth'); $position = get_option('cevhershare_position'); $credit = get_option('cevhershare_credit');
	$leftoffset = get_option('cevhershare_leftoffset'); $rightoffset = get_option('cevhershare_rightoffset');
	$swidth = get_option('cevhershare_swidth'); $twitter_username = get_option('cevhershare_twitter_username');
	if(function_exists('wp_enqueue_script') && (is_single() || is_page())) {
		echo '<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/cevhershare/css/cevhershare.css" type="text/css" media="screen" />';
		if($horizontal)	$hori = 'true'; else $hori = 'false';
		echo "\n"; ?><script type="text/javascript">jQuery(document).ready(function($) { $('.cevhershare').cevhershare({horizontal:'<?php echo $hori; ?>',swidth:'<?php echo $swidth; ?>',minwidth:<?php echo $width; ?>,position:'<?php echo $position; ?>',leftOffset:<?php echo $leftoffset; ?>,rightOffset:<?php echo $rightoffset; ?>}); });</script><?php echo "\n"; ?><!-- CevherShare Plugin by Rashad Aliyev (http://wpusta.com/) - more info at: http://www.cevhershare.com --><?php echo "\n"; ?><?php
	}
}

function cevhershare_filter($input){
	global $post;
	$code = array('[title]','[url]','[author]','[twitter]');
	$values = array($post->post_title,get_permalink(),get_the_author(),get_option('cevhershare_twitter_username'));
	return str_replace($code,$values,$input);
}
 
function cevhershare_admin_actions(){
	if(current_user_can('manage_options')) add_options_page("CevherShare", "<font style='color:#008000; font-weight:bold;'>CevherShare</font>", 1, "CevherShare", "cevhershare_menu");
}
function cevhershare_admin_head(){
	echo '
	<link rel="stylesheet" media="screen" type="text/css" href="'.get_bloginfo('wpurl').'/wp-content/plugins/cevhershare/css/colorpicker.css" />
	<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/cevhershare/js/colorpicker.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var ids = ["arxaplan","ciziborders"];
			$.each(ids, function() {
				var id = this;
				$("#"+this).ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					},
					onChange: function(hsb, hex, rgb, el) {
						$("#"+id).val(hex);
					}
				});
			});
		});
	</script>';
}
add_filter('the_content', 'cevhershare_auto');
add_action('admin_head', 'cevhershare_admin_head');
add_action('init', cevhershare_init);
add_action('wp_head', cevhershare_header);
add_action('activate_cevhershare/cevhershare.php', 'cevhershare_install');
add_action('admin_menu', 'cevhershare_admin_actions');

?>