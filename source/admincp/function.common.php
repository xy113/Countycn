<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-15
 * $Id: function.common.php
*/ 
if (!defined('IN_XSCMS') || !defined('IN_ADMINCP')){
	die('Access Denied!');
}
function cpmessage($message='',$type='',$url='',$extra='',$auto_redirect=FALSE){
    global $config,$lang,$inajax,$BASESCRIPT,$_SERVER;
    $vars = explode(':',$message);
    if (count($vars) == 2){
    	$message = $lang[$vars[0]].$lang[$vars[1]];
    }else {
    	$message = $lang[$message];
    }
    $extra = $lang[$extra];
    switch ($type){
    	case 'succeed': $classname = 'succeed';break;
		case 'error': $classname = 'error';break;
		case 'loading': $classname = 'loading';break;
		default: $classname = 'succeed';break;
    }
    !$url && $url = $_SERVER['HTTP_REFERER'];
    $message = '<h3 class="'.$classname.'">'.$message.'</h3>';
    $showmessage = '<div class="yourpos">'.$lang[cp_home].'<span>'.$lang['sysmessage'].'</span></div>';
    $showmessage.= '<h3 class="tishi">'.$lang['sysmessage'].'</h3><div class="divmessage">';
    if ($type == 'form'){
    	$showmessage.= $message;
		$showmessage.= '<form name="formconfirm" method="post" action="'.$url.'">';
		$showmessage.= '<input type="hidden" name="formhash" value="'.FORMHASH.'">';
		$showmessage.= '<p class="autoredirect">'.$extra.'</p>';
		$showmessage.= '<p class="margintop"><input class="button" type="submit" value="'.$lang['ok'].'" name="confirmed">　<input class="button" type="button" onclick="history.go(-1);" value="'.$lang['cancel'].'"></p></form>';
    }elseif($type == 'loadingform') {
		$showmessage = "<form method=\"post\" action=\"$url\" id=\"loadingform\"><input type=\"hidden\" name=\"formhash\" value=\"".FORMHASH."\"><br />$message<img src=\"static/images/ajax_loader.gif\" /><br />".
			'<p class="autoredirect">'.$extra.'<a href="###" onclick="document.getElementById(\'loadingform\').submit();return false;">'.$lang['auto_redirect'].'</a></p></form><br /><script type="text/JavaScript">setTimeout("document.getElementById(\'loadingform\').submit();", 2000);</script>';
	}else {
		$message.= $type=='loding' ? '<img src="static/images/ajax_loader.gif" border="0" /><br>' : '';
		$showmessage.= $message;
		$showmessage.= '<p class="autoredirect">'.($extra ? $extra.'<br /><br />' : '');
		if (is_array($url)){
			foreach ($url as $link){
				$showmessage.= '<a href="'.$link[1].'"'.($link[2] ? ' '.$link[2] : '').'>'.$link[0].'</a> ';
			}
		}else {
			$showmessage.= '<a href="'.$url.'">'.$lang['auto_redirect'].'</a>';
		}
		$showmessage.= '</p>';
		if ($auto_redirect){
	    	if (is_array($url)){
	    		$showmessage.= '<script type="text/javascript">setTimeout("window.location.href=\''.$url[0][1].'\'", 2000);</script>';
	    	}else {
	    		$showmessage.= '<script type="text/javascript">setTimeout("window.location.href=\''.$url.'\'", 2000);</script>';
	    	}
	    }
	}
	$showmessage.= '</div>';
    echo $showmessage;
    cpfooter();
}
function adminpage($page,$pagecount,$para=''){
	global $lang,$BASESCRIPT,$action;
    $page = isset($page)? $page : 1;
    $page = min(array($page,$pagecount));
    $href = $BASESCRIPT.'?action='.$action;
    $href.= !empty($para) ? '&'.$para : '';
    if ($pagecount==1){
	    $link = "$lang[page_first]&nbsp;$lang[page_prev]&nbsp;$lang[page_next]&nbsp;$lang[page_last]";
    }elseif($page==1){
	    $next_page = $page+1;
	    $link = "$lang[page_first]&nbsp;$lang[page_prev]&nbsp;<a href=\"$href&page=$next_page\">$lang[page_next]</a>&nbsp;<a href=\"$href&page=$pagecount\">$lang[page_last]</a>";
   }else{
	  $next_page = $page+1;
	  $prev_page = $page-1;
	  if ($page==$pagecount){
		  $link = "<a href=\"$href&page=1\">$lang[page_first]</a>&nbsp;<a href=\"$href&page=$prev_page\">$lang[page_prev]</a>&nbsp;$lang[page_next]&nbsp;$lang[page_last]";
	  }else{
		  $link = "<a href=\"$href&page=1\">$lang[page_first]</a>&nbsp;<a href=\"$href&page=$prev_page\">$lang[page_prev]</a>&nbsp;<a href=\"$href&page=$next_page\">$lang[page_next]</a>&nbsp;<a href=\"$href&page=$pagecount\">$lang[page_last]</a>";
	  }
	}
    $goto = "<select style=\"height:18px;padding:0px;\" onchange=\"window.location.href='$href&page='+this.value;\">\n";
    for($i=1;$i<=$pagecount;$i++){  
	    $goto.="<option value=\"$i\"".($page==$i ? ' selected="selected"' : '').">$i/$pagecount</option>";
    }
	$goto.="</select>\n";
	return $link.'&nbsp;'.$goto;
}
function cpheader($titile=''){
	global $lang,$inajax,$config,$BASESCRIPT;
	if (!$inajax) include template('admin_header');
}
function cpfooter(){
	global $lang,$inajax,$config;
	include template('admin_footer');
	exit();
}
function showheader($key, $url) {
	global $lang;
	return '<li><a href="javascript:;" id="header_'.$key.'" hidefocus="true" onclick="toggleMenu(\''.$key.'\', \''.$url.'\');">'.$lang['header_'.$key].'</a></li>';
}

function showmenu($key, $menus) {
	global $BASESCRIPT,$lang;
	$menustring = '<span id="menu_'.$key.'" style="display:none;">';
	$menustring.= '<div>'.$lang['header_'.$key].'</div><ul>';
	if(is_array($menus)) {
		foreach($menus as $menu) {
			if($menu[0] && $menu[1]) {
				$menustring.= '<li><a href="'.(substr($menu[1], 0, 4) == 'http' ? $menu[1] : $BASESCRIPT.'?action='.$menu[1]).'" hidefocus="true" target="'.($menu[2] ? $menu[2] : 'mainframe').'"'.($menu[3] ? $menu[3] : '').'>'.$lang[$menu[0]].'</a></li>';
			}
		}
	}
	$menustring.= '</ul></span>';
	return $menustring;
}
function checkuser($username){
	$data = $GLOBALS['db']->GetOne("SELECT uid FROM sdw_members WHERE username='$username'");
	if ($data) cpmessage('admin_exists','error');
}
?>