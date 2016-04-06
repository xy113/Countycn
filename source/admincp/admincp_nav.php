<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-22
 * $ID: admincp_nav.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminnav')) die('Access Denied!');
include template('admin_nav');
?>