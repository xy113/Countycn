<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-20
 * $ID: admincp_report.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
!$curpath && $curpath = '';
$curpath = str_replace('.','',$curpath);
$curpath = ereg_replace('/{1,}','/',$curpath);
$filelist = $files = $folders = array();
$inpath = ROOT_PATH.$curpath;
$dir = dir($inpath);
while($file = $dir->read()) {
	//-----计算文件大小和创建时间
	$filepath = $inpath.'/'.$file;
	if($file == '.'){
		continue;
	}elseif ($file == '..'){
		if ($curpath=='')continue;
		$parent = array(
			'filename'=>'上级目录',
			'folderlink'=>$BASESCRIPT.'?action=check&curpath='.urlencode(eregi_replace("[/][^/]*$","",$curpath)),
			'img'=>'static/images/img/dir2.gif',
			'filetime'=>date("Y-m-d H:i:s",filemtime($filepath))
		);
	}elseif(is_dir($filepath)){
		if(eregi("^_(.*)$",$file)){
			continue; 
			//#屏蔽FrontPage扩展目录和linux隐蔽目录
		}
		if(eregi("^\.(.*)$",$file)){
			continue;
		}
		$folders[] = array(
			'filename'=>$file,
			'folderlink'=>$BASESCRIPT.'?action=check&curpath='.urlencode($curpath.'/'.$file),
			'img'=>'static/images/img/dir.gif',
			'filetime'=>date("Y-m-d H:i:s",filemtime($filepath)),
			'writeable'=>dir_writeable($filepath)
		);
	}else {
		$files['filename'] = $file;
		$files['filepath'] = $curpath.'/'.$file;
		$files['filetime'] = date('Y-m-d H:i:s',filemtime($filepath));
		$files['writeable'] = is_writable($filepath);
		$files['readable'] = is_readable($filepath);
		$files['execable'] = is_executable($filepath);
		if (eregi(".(gif|png)",$file)){
			$files['img'] = 'static/images/img/gif.gif';
		}elseif (eregi(".(jpg)",$file)){
			$files['img'] = 'static/images/img/jpg.gif';
		}elseif (eregi(".(zip|rar)",$file)){
			$files['img'] = 'static/images/img/rar.gif';
		}elseif (eregi(".(exe)",$file)){
			$files['img'] = 'static/images/img/exe.gif';
		}elseif (eregi(".(css)",$file)){
			$files['img'] = 'static/images/img/css.gif';
		}elseif (eregi(".(htm|html)",$file)){
			$files['img'] = 'static/images/img/html.gif';
		}elseif (eregi(".(php|php3)",$file)){
			$files['img'] = 'static/images/img/php.gif';
		}elseif (eregi(".(txt|asp|jsp)",$file)){
			$files['img'] = 'static/images/img/txt.gif';
		}else {
			//continue;
			$files['img'] = 'static/images/img/htm.gif';
		}
		$filelist[] = $files;
	}
}
//End Loop
$dir->close();
include template('admin_check');
function dir_writeable($dir){
	$writeable = 0;
	if(is_dir($dir)) {
		if($fp = @fopen("$dir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}
	return $writeable;
}
?>