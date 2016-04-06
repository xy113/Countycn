// JavaScript Document
/*
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-17
 * $ID: admincp.js
*/ 
Request = {
	QueryString : function(item){
		var svalue = location.search.match(new RegExp("[\?\&]" + item + "=([^\&]*)(\&?)","i"));
		return svalue ? svalue[1] : svalue;
	}
}
var cpaction = Request.QueryString("action");
var baseurl = ADMINSCRIPT+"?action="+cpaction;
var ajaxurl = ADMINSCRIPT+"?action="+cpaction+"&inajax=1";
function showloading(msg,time){
	$(window.top.document).find("body").append('<div id="loading"><img src="static/images/loading1.gif" border="0" />'+msg+'</div>');
	var loding = $(window.top.document).find("#loading");
	loding.show();
	var left = ($(window.top).width() - loding.width()) / 2;
	var top = ($(window.top).height() - loding.height()) / 2-100;
	loding.css({top:top,left:left});
}
function closeloading(timeout){
	if(!timeout) timeout = 1000;
	setTimeout('$(window.top.document).find("#loading").remove()',timeout);
}
function checkAll(checkbox,input){
	if(checkbox.checked){
		$("input[name='"+input+"']").each(function(){$(this).attr('checked',true)});	
	}else{
		$("input[name='"+input+"']").each(function(){$(this).attr('checked',false)});
	}
}
function selectAll(input){
	$("input[name='"+input+"']").each(function(){$(this).attr('checked',true)});
}
function cancelAll(input){
	$("input[name='"+input+"']").each(function(){$(this).attr('checked',false)});
}
function reverseAll(input){
	$("input[name='"+input+"']").each(function(){this.checked=this.checked ? false : true});
}
//修改内容
function Edit(obj,querystring){
	//var obj = document.getElementById(spanid);
	var tag = obj.firstChild.tagName;
	if(typeof(tag) != "undefined" && tag.toLowerCase() == "input"){
	 	return;
	}
    /*保存原始的内容 */
	var org = obj.innerHTML;
	var val = window.ActiveXObject ? obj.innerText : obj.textContent;
	/* 创建一个输入框 */
	var txt = document.createElement("input");
	txt.value = (val == 'N/A') ? '' : val;
	txt.style.width = (obj.offsetWidth + 15) + "px" ;
	/* 隐藏对象中的内容，并将输入框加入到对象中 */
	obj.innerHTML = "";
	obj.appendChild(txt);
	txt.focus();
	var url = querystring ? ajaxurl+"&"+querystring : ajaxurl;
	/* 编辑区失去焦点的处理函数 */
	txt.onblur = function(e){
		if (txt.value.length > 0 && txt.value != org){
		    $.get(url+"&val="+txt.value,function(response){
		        obj.innerHTML = response;
		    });
		}else{
		    obj.innerHTML = org;
		}
	}
}
//切换状态
function toggle(obj,querystring){
	var url = querystring ? ajaxurl+"&"+querystring : ajaxurl;
	$.get(url,function(response){
		//alert(result)
        obj.src = parseInt(response) > 0 ? 'static/images/yes.gif' : 'static/images/no.gif';
	});
}
function OpenDialog(f){
	var sw=Math.floor((window.screen.width/2-300));
    var sh=Math.floor((window.screen.height/2-280));
	window.open(ADMINSCRIPT+'?action=selectimg&f='+f,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}
function showDropConfirm(){
	var html= '<div id="dvMsgbox"><b></b>如果删除，这些信息将无法恢复。您确定吗？</div>';
	html+= '<div id="dvButton"><input type="button" style="padding:3px 10px;" id="btnok" value="确定" /> <input type="button" style="padding:3px 10px;" value="取消" id="btncancel" /></div>';
	var dlg = new Dialog(html,{title:'确认删除信息'});
	$(window.top.document).find("#btncancel").click(function(){dlg.close()});
	dlg.show();
	return dlg;
}
function showSelectError(){
	var html= '<div id="dvMsgbox"><b></b>没有选中任何选项，请重新选择</div>';
	html+= '<div id="dvButton"><input type="button"  style="padding:3px 10px;" id="btnok" value="确定" /></div>';
	var dlg = new Dialog(html,{title:'选择信息出错'});
	$(window.top.document).find("#btnok").click(function(){dlg.close();});
	dlg.show();
}
function showMessage(msg){
	var dlg = new Dialog(msg,{showTitle:false,time:3000,modal:false});
}
function checkThis(obj){
	if(!obj || typeof obj!='object') return false;
	if(obj.checked){
		obj.parentNode.parentNode.className='hover';
		obj.parentNode.parentNode.onmouseover = function(){}
		obj.parentNode.parentNode.onmouseout = function(){}
	}else{
		obj.parentNode.parentNode.className='';
		obj.parentNode.parentNode.onmouseover = function(){
			this.className = 'active';
		}
		obj.parentNode.parentNode.onmouseout = function(){
			this.className = '';
		}		
	}
}
function GoPage(page,querystring,waitid){
	var Page = page ? parseInt(page) : 1;
	var WaitId = waitid ? waitid : '#body';
	var url = querystring ? ajaxurl+"&"+querystring : ajaxurl;
	$.get(url+'&page='+Page,function(response){$(WaitId).html(response);});
}
function LoadPage(querystring){
	window.location.href = baseurl+"&"+querystring;
}
function Delete(inputname,querystring,waitid){
	var values = new Array();
	$("input[name='"+inputname+"']").each(function(){
		if(this.checked) values.push($(this).val());
	});
	var Waitid = waitid ? waitid : 'body';
	var url = querystring ? ajaxurl+"&"+querystring : ajaxurl;
	if(values.length>0){
		if(confirm("此操作删除数据后将不可恢复，您确定要删除这些信息吗?")){
			$.ajax({url:url+'&delete='+values.join(','),
				beforeSend:showloading("正在删除信息..."),
				success:function(response){$(Waitid).html(response);},
				error:function(xml,textStatus,error){dialog(ajaxError(xml.status),{title:'出错了',modal:false})},
				complete:closeloading()
			});
		}
	}else{
		//alert(no_select);
		showSelectError();
		return false;
	}
}
function ajaxError(status){
	switch (status)
	{
	  case 400: //Bad Request
		 return "<p>XmlHttpRequest status: [400] Bad Request.</p>";
	  break;
	  case 404: // Not Found
		 return "<p>XmlHttpRequest status: [404] <br>The requested URL was not found on this server.</p>";
	  break;
	  case 503: //Service Unavailable
		 return "<p>XmlHttpRequest status: [503] Service Unavailable.</p>";
	  break;
	  default:
		 return "<p>XmlHttpRequest status: [" + status + "] Unknow status.</p>";
	}
}
/*单个删除*/
function DropOne(val,querystring,waitid){
	if(!val || parseInt(val)==0) return false;
	var Waitid = waitid ? waitid : '#body';
	var url = querystring ? ajaxurl+"&"+querystring : ajaxurl;
	var dlg = showDropConfirm();
	$(window.top.document).find("#btnok").click(function(){
		dlg.close();
		$.ajax({url:url+'&operation=drop&val='+val,
			beforeSend:showloading("正在删除信息..."),
			success:function(response){$(Waitid).html(response);},
			error:function(xml,textStatus,error){dialog(ajaxError(xml.status),{title:'出错了',modal:false})},
			complete:closeloading()
		});	
	});
}