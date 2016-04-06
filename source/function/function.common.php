<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-20
 * $Id: function.common.php
*/ 
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : $GLOBALS['config']['authkey']);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}
function formhash() {
	return substr(md5(substr(time(), 0, -4).$GLOBALS['config']['authkey'].$_SERVER['SERVER_NAME']), 16);
}
function daddslashes($string, $force = 0) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
/*
 * 字符串截取
 */
function cutstr($string, $length, $dot ='') {
	global $charset;
	if(strlen($string) <= $length) {
		return $string;
	}
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
	$strcut = '';
	if(strtolower($charset) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
	return $strcut.$dot;
}
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1',
		//$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}
function xsetcookie($var, $value, $life = 0, $prefix = 1) {
	global $config, $timestamp, $_SERVER;
	setcookie(($prefix ? $config['cookie']['cookiepre'] : '').$var, $value,
		$life ? $timestamp + $life : 0, $config['cookie']['cookiepath'],
		$config['cookie']['cookiedomain'], $_SERVER['SERVER_PORT'] == 443 ? 1 : 0);
}
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' ? mt_srand((double)microtime() * 1000000) : mt_srand();
	$seed = base_convert(md5(print_r($_SERVER, 1).microtime()), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	$hash = '';
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed[mt_rand(0, $max)];
	}
	return $hash;
}
function MyGet($key){
	$_GET[$key] = isset($_GET[$key]) ? trim($_GET[$key]) : '';
	return $_GET[$key]; 
}
function MyPost($key){
	$_POST[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
	return $_POST[$key]; 
}
function dexit($message=''){
	echo $message;
	exit();
}
function site(){
	return $_SERVER['HTTP_HOST'];
}
function readfromfile($file){
	if($fb = @fopen($file,"r")){
		return @fread($fb,filesize($file));
	}else {
		return false;
	}
	@fclose($fb);
}
function writetofile($file,$data){
	 if($fp = @fopen($file, "w")){
	    return @fwrite($fp,$data);
	}else {
		return false;
	}
	@fclose($fp);
}
function makedir($folder){
    if(!file_exists($folder)){
    	return @mkdir($folder,0777);
    }else {
    	return true;
    }
}
function FCK($inputname,$value='',$width='100%',$height='400',$toolbarset='Default') {
   require_once ROOT_PATH.'/source/fckeditor/fckeditor.php';
   $fck = new FCKeditor($inputname);
   $fck->Width  = $width;
   $fck->Height = $height;
   $fck->Value  = $value;
   $fck->ToolbarSet = $toolbarset;
   $fck->BasePath = './source/fckeditor/';
   return $fck->CreateHtml();
}
function isemail($email) {
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}
function utf2gbk($string){
   //return iconv('UTF-8','GB2312',$string);
   return mb_convert_encoding($string,'GB2312','UTF-8');
}
function gbk2utf($string){
   //return iconv('GB2312','UTF-8',$string);
   return mb_convert_encoding($string,'UTF-8','GB2312');
}
/*
 * 去除HTML标签
 */
function stripHtml($str){
	$search = array ("'<script[^>]*?>.*?</script>'si",  // 去掉 javascript
                 "'<[\/\!]*?[^<>]*?>'si",           // 去掉 HTML 标记
                 "'([\r\n])[\s]+'",                 // 去掉空白字符
                 "'&(quot|#34);'i",                 // 替换 HTML 实体
                 "'&(amp|#38);'i",
                 "'&(lt|#60);'i",
                 "'&(gt|#62);'i",
                 "'&(nbsp|#160);'i",
                 "'&(iexcl|#161);'i",
                 "'&(cent|#162);'i",
                 "'&(pound|#163);'i",
                 "'&(copy|#169);'i",
                 "'&#(\d+);'e");                    // 作为 PHP 代码运行

	$replace = array ("",
	                  "",
	                  "\\1",
	                  "\"",
	                  "&",
	                  "<",
	                  ">",
	                  " ",
	                  chr(161),
	                  chr(162),
	                  chr(163),
	                  chr(169),
	                  "chr(\\1)");	
	$str = preg_replace ($search, $replace, $str);
	$str = str_replace(array('&amp;ldquo;','&ldquo;','&amp;rdquo;','&rdquo;'),array('“','“','”','”'),$str);
	$str = str_replace('　','',$str);
	return $str;
}
function printr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
/*
 * google风格分页
 */
function pagination($page,$total,$extra='',$scr=''){ 
	$extra = !empty($extra) ? $extra.'&' : '';
	$scr = isset($scr) ? $scr : $GLOBALS['BASESCRIPT'];
	$prevs = $page-5;
	if($prevs<=0)$prevs = 1;
	$prev  = $page-1;
	if($prev<=0) $prev = 1;
	$nexts = $page+5;
	if($nexts>$total)$nexts=$total; 
	$next  = $page+1;
	if($next>$total)$next=$total; 
	$pagenavi ="<a href=\"{$scr}?{$extra}page=1\">首页</a>"; 
	$pagenavi.="<a href=\"{$scr}?{$extra}page=$prev\" class=\"prev\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href=\"{$scr}?{$extra}page=$i\">$i</a>"; 
	} 
	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href=\"{$scr}?{$extra}page=$i\">$i</a>"; 
	} 
	$pagenavi.="<a href=\"{$scr}?{$extra}page=$next\" class=\"next\">下一页</a>"; 
	$pagenavi.="<a href=\"{$scr}?{$extra}page=$total\">尾页</a>"; 
	return $pagenavi ; 
}
function sendmail($mailto,$subject,$message,$mailfrom,$mailcc='',$charset="gb2312"){
	// 当发送 HTML 电子邮件时，请始终设置 content-type
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers.= "Content-type:text/html;charset=$charset" . "\r\n";
	
	// 更多报头
	$headers .= 'From: '.$mailfrom. "\r\n";
	$headers .= 'Cc:'.$mailcc."\r\n";
	@mail($mailto,$subject,$message,$headers);
}

function template($file, $tpldir = '') {
	global $inajax;
	if (!IN_ADMINCP)$tpldir = 'admincp';
	$file .= $inajax && ($file == 'header' || $file == 'footer') ? '_ajax' : '';
	$tpldir = $tpldir ? $tpldir : TPLDIR;
	$tplfile = ROOT_PATH.'/templates/'.$tpldir.'/'.$file.'.htm';
	$filebak = $file;
	$file == 'header' && CURSCRIPT && $file = 'header_'.CURSCRIPT;
	$objfile = ROOT_PATH.'/data/templates/'.$file.'.tpl.php';
	if(!file_exists($tplfile)) {
		$tplfile = ROOT_PATH.'/templates/default/'.$filebak.'.htm';
	}
	if (!file_exists($objfile) || filemtime($tplfile)>filemtime($objfile)){
		require_once ROOT_PATH.'/source/function/function.template.php';
		parse_template($tplfile,$tpldir);
	}
	return $objfile;
}
function implodeids($array) {
	if(!empty($array)) {
		return "'".implode("','", is_array($array) ? $array : array($array))."'";
	} else {
		return '';
	}
}
function output() {
	if(defined('OUTPUTED')) {
		return;
	}
	define('OUTPUTED', 1);
	global $config;
	$content = ob_get_contents();
	if ($config['rewrite']){
		$searcharray = $replacearray = array();
		$searcharray[] = "/\<a href\=\"detail\.php\?category\=([^&]+?)(&amp;id\=(\d+))?\"([^\>]*)\>/e";
		$replacearray[] = "rewrite_post('\\3', '\\1','\\4')";
		$searcharray[] = "/\<a href\=\"list\.php\?city\=([^&]+?)(&category\=([^&]+?))(&page\=(\d+))?\"([^\>]*)\>/e";
		$replacearray[] = "rewrite_cat('\\1', '\\3','\\5','','\\6')";
		$content = preg_replace($searcharray,$replacearray,$content);
	}
	ob_end_clean();
	@ob_start('ob_gzhandler');
	echo $content;
}
function rewrite_cat($city,$category,$page,$querystring='',$extra=''){
	$rewrite = array();
	if ($querystring){
		foreach (explode('&',$querystring) as $key=>$value){
			$arr = explode('=',$value);
			$rewrite[] = "$arr[0]-$arr[1]";
		}
	}
	$newrewrite = '';
	if (!empty($rewrite)){
		$newrewrite = implode('-',$rewrite);
	}
	return '<a href="city-'.$city.'-'.$category.($newrewrite ? '-'.$newrewrite : '').'-'.$page.'.html"'.stripcslashes($extra).'>';
}
function rewrite_post($id,$category='',$extra=''){
	return "<a href=\"".($category ? $category.'/' : '')."$id.html\"".stripslashes($extra).">";
}
function fetchoptionvalue($optionid,$type,$value){
	global $CACHE;
	if ($type == 'radio' || $type == 'select'){
		$choices = explode("\n",$CACHE['typeoptions'][$optionid]['rules']['choices']);
		foreach ($choices as $choice){
			$arr = explode('=',$choice);
			$options[$arr[0]] = $arr[1];
		}
		return $options[$value];
	}elseif ($type == 'checkbox'){
		$str ='';
		$value = explode(',',$value);
		$choices = explode("\n",$CACHE['typeoptions'][$optionid]['rules']['choices']);
		foreach ($choices as $choice){
			$arr = explode('=',$choice);
			if (in_array($arr[0],$value)){
				$str.= $arr[1]."　";
			}
		}
		return $str;
	}else {
		return $value;
	}
}
function fetchoptions($type,$value){
	if ($type == 'radio' || $type == 'select' || $type == 'checkbox'){
		$choices = array();
		$array = explode("\n",$value);
		foreach ($array as $key=>$val){
			$arr = explode('=',$val);
			$choices[$arr[0]] = $arr[1];
		}
		return $choices;
	}else {
		return $value;
	}
}
function showmessage($msg_detail='',$msg_type=0,$links=array(),$auto_redirect=true){	
    global $db,$config,$cplang,$lang,$inajax,$_SERVER,$_SESSION,$_XCOOKIE;
	if (count($links) == 0){
		$links[0]['text'] = $cplang['go_back'];
		$links[0]['href'] = 'javascript:go(-1);';
    }
    $defaulturl = $links[0]['href'];
    //$msg_detail = defined('IN_ADMINCP') ? $cplang[$msg_detail] : $lang[$msg_detail];
    $msg_detail = defined('IN_ADMINCP') ? $cplang[$msg_detail] : $msg_detail;
    defined('IN_ADMINCP') ? @include template('admin_showmsg') : @include template('message');
    dexit();
}
function checkrandcode($randcode){
	global $_SESSION;
	if ($randcode == $_SESSION['randcode']){
		return TRUE;
	}else {
		return FALSE;
	}
}
function showalert($msg='',$url=''){
	$string = 'alert("'.$msg.'");';
	$string.= $url ? 'window.location.href="'.$url.'";' : '';
	dexit('<script type="text/javascript">'.$string.'</script>');
}
function fetchoptionhtml($type,$identifier,$rules=array(),$optionvalue=''){
	if ($type == 'text'){
		return '<input type="text" class="text" name="typeoption['.$identifier.']" maxlength="'.$rules['maxlength'].'" value="'.$optionvalue.'">';
	}elseif ($type == 'number'){
		return '<input type="text" class="text" name="typeoption['.$identifier.']" value="'.$optionvalue.'">';
	}elseif ($type == 'radio'){
		$string = '';
		$options = explode("\n",$rules['choices']);
		foreach ($options as $key=>$val){
			$arr = explode("=",$val);
			$string.='<label><input type="radio" name="typeoption['.$identifier.']" value="'.$arr[0].'"'.($arr[0]==$optionvalue ? ' checked="checked"' : '').' /> '.$arr[1].'</label>';
		}
		return $string;
	}elseif ($type == 'checkbox'){
		$string = '';
		$options = explode("\n",$rules['choices']);
		foreach ($options as $key=>$val){
			$arr = explode("=",$val);
			$string.='<label><input type="checkbox" name="typeoption['.$identifier.'][]" value="'.$arr[0].'"'.($arr[0]==$optionvalue ? ' checked="checked"' : '').' /> '.$arr[1].'</label>';
		}
		return $string;
	}elseif ($type == 'select'){
		$string = '<select class="select" name="typeoption['.$identifier.']">';
		$options = explode("\n",$rules['choices']);
		foreach ($options as $key=>$val){
			$arr = explode("=",$val);
			$string.='<option value="'.$arr[0].'"'.($arr[0]==$optionvalue ? ' selected="selected"' : '').'>'.$arr[1].'</option>';
		}
		return $string.'</select>';
	}else {
		return '<input type="text" class="text" name="typeoption['.$identifier.']" value="'.$optionvalue.'">';
	}
}
function fetchoptionid($identifier){
	@include ROOT_PATH.'/data/cache/typeoptions.php';
	$options = $CACHE['typeoptions'];
	foreach ($options as $option){
		if ($option['identifier'] == $identifier){
			return $option['optionid'];
		}
	}
}
function convertip($ip) {

	$return = '';

	if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) {

		$iparray = explode('.', $ip);

		if($iparray[0] == 10 || $iparray[0] == 127 || ($iparray[0] == 192 && $iparray[1] == 168) || ($iparray[0] == 172 && ($iparray[1] >= 16 && $iparray[1] <= 31))) {
			$return = '- LAN';
		} elseif($iparray[0] > 255 || $iparray[1] > 255 || $iparray[2] > 255 || $iparray[3] > 255) {
			$return = '- Invalid IP Address';
		} else {
			$tinyipfile = ROOT_PATH.'./tinyipdata.dat';
			$fullipfile = ROOT_PATH.'./ip.Dat';
			if(@file_exists($tinyipfile)) {
				$return = convertip_tiny($ip, $tinyipfile);
			} elseif(@file_exists($fullipfile)) {
				$return = convertip_full($ip, $fullipfile);
			}
		}
	}

	return $return;

}

function convertip_tiny($ip, $ipdatafile) {

	static $fp = NULL, $offset = array(), $index = NULL;

	$ipdot = explode('.', $ip);
	$ip    = pack('N', ip2long($ip));

	$ipdot[0] = (int)$ipdot[0];
	$ipdot[1] = (int)$ipdot[1];

	if($fp === NULL && $fp = @fopen($ipdatafile, 'rb')) {
		$offset = unpack('Nlen', fread($fp, 4));
		$index  = fread($fp, $offset['len'] - 4);
	} elseif($fp == FALSE) {
		return  '- Invalid IP data file';
	}

	$length = $offset['len'] - 1028;
	$start  = unpack('Vlen', $index[$ipdot[0] * 4] . $index[$ipdot[0] * 4 + 1] . $index[$ipdot[0] * 4 + 2] . $index[$ipdot[0] * 4 + 3]);

	for ($start = $start['len'] * 8 + 1024; $start < $length; $start += 8) {

		if ($index{$start} . $index{$start + 1} . $index{$start + 2} . $index{$start + 3} >= $ip) {
			$index_offset = unpack('Vlen', $index{$start + 4} . $index{$start + 5} . $index{$start + 6} . "\x0");
			$index_length = unpack('Clen', $index{$start + 7});
			break;
		}
	}

	fseek($fp, $offset['len'] + $index_offset['len'] - 1024);
	if($index_length['len']) {
		return '- '.fread($fp, $index_length['len']);
	} else {
		return '- Unknown';
	}

}

function convertip_full($ip, $ipdatafile) {

	if(!$fd = @fopen($ipdatafile, 'rb')) {
		return '- Invalid IP data file';
	}

	$ip = explode('.', $ip);
	$ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];

	if(!($DataBegin = fread($fd, 4)) || !($DataEnd = fread($fd, 4)) ) return;
	@$ipbegin = implode('', unpack('L', $DataBegin));
	if($ipbegin < 0) $ipbegin += pow(2, 32);
	@$ipend = implode('', unpack('L', $DataEnd));
	if($ipend < 0) $ipend += pow(2, 32);
	$ipAllNum = ($ipend - $ipbegin) / 7 + 1;

	$BeginNum = $ip2num = $ip1num = 0;
	$ipAddr1 = $ipAddr2 = '';
	$EndNum = $ipAllNum;

	while($ip1num > $ipNum || $ip2num < $ipNum) {
		$Middle= intval(($EndNum + $BeginNum) / 2);

		fseek($fd, $ipbegin + 7 * $Middle);
		$ipData1 = fread($fd, 4);
		if(strlen($ipData1) < 4) {
			fclose($fd);
			return '- System Error';
		}
		$ip1num = implode('', unpack('L', $ipData1));
		if($ip1num < 0) $ip1num += pow(2, 32);

		if($ip1num > $ipNum) {
			$EndNum = $Middle;
			continue;
		}

		$DataSeek = fread($fd, 3);
		if(strlen($DataSeek) < 3) {
			fclose($fd);
			return '- System Error';
		}
		$DataSeek = implode('', unpack('L', $DataSeek.chr(0)));
		fseek($fd, $DataSeek);
		$ipData2 = fread($fd, 4);
		if(strlen($ipData2) < 4) {
			fclose($fd);
			return '- System Error';
		}
		$ip2num = implode('', unpack('L', $ipData2));
		if($ip2num < 0) $ip2num += pow(2, 32);

		if($ip2num < $ipNum) {
			if($Middle == $BeginNum) {
				fclose($fd);
				return '- Unknown';
			}
			$BeginNum = $Middle;
		}
	}

	$ipFlag = fread($fd, 1);
	if($ipFlag == chr(1)) {
		$ipSeek = fread($fd, 3);
		if(strlen($ipSeek) < 3) {
			fclose($fd);
			return '- System Error';
		}
		$ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
		fseek($fd, $ipSeek);
		$ipFlag = fread($fd, 1);
	}

	if($ipFlag == chr(2)) {
		$AddrSeek = fread($fd, 3);
		if(strlen($AddrSeek) < 3) {
			fclose($fd);
			return '- System Error';
		}
		$ipFlag = fread($fd, 1);
		if($ipFlag == chr(2)) {
			$AddrSeek2 = fread($fd, 3);
			if(strlen($AddrSeek2) < 3) {
				fclose($fd);
				return '- System Error';
			}
			$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
			fseek($fd, $AddrSeek2);
		} else {
			fseek($fd, -1, SEEK_CUR);
		}

		while(($char = fread($fd, 1)) != chr(0))
		$ipAddr2 .= $char;

		$AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
		fseek($fd, $AddrSeek);

		while(($char = fread($fd, 1)) != chr(0))
		$ipAddr1 .= $char;
	} else {
		fseek($fd, -1, SEEK_CUR);
		while(($char = fread($fd, 1)) != chr(0))
		$ipAddr1 .= $char;

		$ipFlag = fread($fd, 1);
		if($ipFlag == chr(2)) {
			$AddrSeek2 = fread($fd, 3);
			if(strlen($AddrSeek2) < 3) {
				fclose($fd);
				return '- System Error';
			}
			$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
			fseek($fd, $AddrSeek2);
		} else {
			fseek($fd, -1, SEEK_CUR);
		}
		while(($char = fread($fd, 1)) != chr(0))
		$ipAddr2 .= $char;
	}
	fclose($fd);

	if(preg_match('/http/i', $ipAddr2)) {
		$ipAddr2 = '';
	}
	$ipaddr = "$ipAddr1 $ipAddr2";
	$ipaddr = preg_replace('/CZ88\.NET/is', '', $ipaddr);
	$ipaddr = preg_replace('/^\s*/is', '', $ipaddr);
	$ipaddr = preg_replace('/\s*$/is', '', $ipaddr);
	if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {
		$ipaddr = '- Unknown';
	}

	return $ipaddr;

}
?>