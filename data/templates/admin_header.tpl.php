<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title?> <?php echo $lang['cp_home']?></title>
<link href="/static/images/admincp.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var ADMINSCRIPT = '<?php echo $BASESCRIPT?>';
var loading = '<?php echo $lang['loading']?>';
var complete = '<?php echo $lang['complete']?>';
var please_select = '<?php echo $lang['please_select']?>';
var no_select = '<?php echo $lang['no_select']?>';
var drop_confirm = '<?php echo $lang['drop_confirm']?>';
var drop_success = '<?php echo $lang['drop_success']?>';
var nopriv = '<?php echo $lang['nopriv']?>';
</script>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/admincp.js" type="text/javascript"></script>
<script src="static/js/dialog.js" type="text/javascript"></script>
</head>
<body id="body">