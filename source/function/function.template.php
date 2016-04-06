<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-11
 * $Id: function.template.php
*/ 
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
function parse_template($tplfile, $tpldir) {
	$nest = 5;
	$file = basename($tplfile, '.htm');
	$objfile = ROOT_PATH."/data/templates/$file.tpl.php";
	if(!@$fp = fopen($tplfile, 'r')) {
		dexit("Current template file './$tpldir/$file.htm' not found or have no access!");
	}
	$template = fread($fp, filesize($tplfile));
	fclose($fp);
	$var_regexp = "((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9_\-\.\"\'\[\]\$\x7f-\xff]+\])*)";
	$const_regexp = "([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)";

	$template = preg_replace("/([\n\r]+)\t+/s", "\\1", $template);
	$template = preg_replace("/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $template);
	$template = str_replace("{LF}", "<?=\"\\n\"?>", $template);

	$template = preg_replace("/\{(\\\$[a-zA-Z0-9_\[\]\'\"\$\.\x7f-\xff]+)\}/s", "<?=\\1?>", $template);
	$template = preg_replace("/$var_regexp/es", "addquote('<?=\\1?>')", $template);
	$template = preg_replace("/\<\?\=\<\?\=$var_regexp\?\>\?\>/es", "addquote('<?=\\1?>')", $template);

	$template = "<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>\n$template";
	$template = preg_replace("/[\n\r\t]*\{template\s+([a-z0-9_]+)\}[\n\r\t]*/is", "\n<?php include template('\\1'); ?>\n", $template);
	$template = preg_replace("/[\n\r\t]*\{template\s+(.+?)\}[\n\r\t]*/is", "\n<?php include template(\\1); ?>\n", $template);
	$template = preg_replace("/[\n\r\t]*\{eval\s+(.+?)\}[\n\r\t]*/ies", "stripvtags('\n<?php \\1 ?>\n','')", $template);
	$template = preg_replace("/[\n\r\t]*\{echo\s+(.+?)\}[\n\r\t]*/ies", "stripvtags('\n<?php echo \\1; ?>\n','')", $template);
	$template = preg_replace("/[\n\r\t]*\{elseif\s+(.+?)\}[\n\r\t]*/ies", "stripvtags('\n<?php } elseif(\\1) { ?>\n','')", $template);
	$template = preg_replace("/[\n\r\t]*\{else\}[\n\r\t]*/is", "\n<? } else { ?>\n", $template);

	for($i = 0; $i < $nest; $i++) {
		$template = preg_replace("/[\n\r\t]*\{loop\s+(\S+)\s+(\S+)\}[\n\r]*(.+?)[\n\r]*\{\/loop\}[\n\r\t]*/ies", "stripvtags('\n<?php if(is_array(\\1)) { foreach(\\1 as \\2) { ?>','\n\\3\n<? } } ?>\n')", $template);
		$template = preg_replace("/[\n\r\t]*\{loop\s+(\S+)\s+(\S+)\s+(\S+)\}[\n\r\t]*(.+?)[\n\r\t]*\{\/loop\}[\n\r\t]*/ies", "stripvtags('\n<?php if(is_array(\\1)) { foreach(\\1 as \\2 => \\3) { ?>','\n\\4\n<? } } ?>\n')", $template);
		$template = preg_replace("/[\n\r\t]*\{if\s+(.+?)\}[\n\r]*(.+?)[\n\r]*\{\/if\}[\n\r\t]*/ies", "stripvtags('\n<?php if(\\1) { ?>','\n\\2\n<? } ?>\n')", $template);
	}

	$template = preg_replace("/\{$const_regexp\}/s", "<?=\\1?>", $template);
	$template = preg_replace("/ \?\>[\n\r]*\<\? /s", " ", $template);

	if(!@$fp = fopen($objfile, 'w')) {
		dexit("Directory './data/templates/' not found or have no access!");
	}

	$template = preg_replace("/\"(http)?[\w\.\/:]+\?[^\"]+?&[^\"]+?\"/e", "transamp('\\0')", $template);
	$template = preg_replace("/\<script[^\>]*?src=\"(.+?)\".*?\>\s*\<\/script\>/ise", "stripscriptamp('\\1')", $template);
	$template = str_replace('<?=','<?php echo ',$template);
	$staticurl = $GLOBALS['config']['output']['staticurl'];
	/* ����css·�� */
	$template = preg_replace('/(<link\shref=["|\'])(?:\.\/|\.\.\/)?(images\/)?([a-z0-9A-Z_]+\.css["|\']\srel=["|\']stylesheet["|\']\stype=["|\']text\/css["|\'])/i','\1' . $staticurl . '\2\3', $template);
	$pattern = array(
		'/<!--[^>|\n]*?({.+?})[^<|{|\n]*?-->/', // �滻smartyע��
		'/<!--[^<|>|{|\n]*?-->/',               // �滻�����е�htmlע��
		'/(href=["|\'])\.\.\/(.*?)(["|\'])/i',  // �滻�������
		'/((?:background|src)\s*=\s*["|\'])(?:\.\/|\.\.\/)?(images\/.*?["|\'])/is', // ��imagesǰ���� $tmp_dir
		'/((?:background|background-image):\s*?url\()(?:\.\/|\.\.\/)?(images\/)/is', // ��imagesǰ���� $tmp_dir
		'/([\'|"])\.\.\//is', // ��../��ͷ��·��ȫ������Ϊ��
		);
	$replace = array(
		'\1',
		'',
		'\1\2\3',
		'\1' . $staticurl . '\2',
		'\1' . $staticurl . '\2',
		'\1'
		);
	//return preg_replace($pattern, $replace, $source);
	$template = preg_replace($pattern, $replace, $template);
	flock($fp, 2);
	fwrite($fp, $template);
	fclose($fp);
}

/**
* �����滻�����˵�һЩ����
*/
function transamp($str) {
	$str = str_replace('&', '&amp;', $str);
	$str = str_replace('&amp;amp;', '&amp;', $str);
	$str = str_replace('\"', '"', $str);
	return $str;
}
/**
* ���������ʽ�����Ǹ�ubb����ȥ��һ��\���ŵģ�Ӧ����Ϊ��ȫ�������
*/
function addquote($var) {
	return str_replace("\\\"", "\"", preg_replace("/\[([a-zA-Z0-9_\-\.\x7f-\xff]+)\]/s", "['\\1']", $var));
}
/**
* ȥ���Զ����һЩtag
*/
function stripvtags($expr, $statement) {
	$expr = str_replace("\\\"", "\"", preg_replace("/\<\?\=(\\\$.+?)\?\>/s", "\\1", $expr));
	$statement = str_replace("\\\"", "\"", $statement);
	return $expr.$statement;
}
/**
* �����ǰ�&���ŵ�html������ʽ����&��Ȼ�󻻳�javascript���õ���ʽ��
*/
function stripscriptamp($s) {
	$s = str_replace('&amp;', '&', $s);
	return "<script src=\"$s\" type=\"text/javascript\"></script>";
}
?>