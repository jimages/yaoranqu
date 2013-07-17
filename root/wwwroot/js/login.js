"use strict";
/* author:jimages
 * date:jun 27 2013
 * it is for login.
 */
//remove the label when the input focus.
$("#username").focus(function() {
	$("#login label:first").css("display","none");
	});
$("#password").focus(function() {
	$("#login label:last").css("display","none");
	});
$(document).ready(toggle_label);
$("#username").blur(toggle_label);
function toggle_label() {
	var content = $("#username").val();
	if (content != "") 
		{
			$("#login label:first").css("display","none");
		} else {
			$("#login label:first").css("display","inline-block");
		}
}
$("#password").blur(function() {
	var content = $("#password").val();
	if (content != "") 
		{
			$("#login label:last").css("display","none");
		} else {
			$("#login label:last").css("display","inline-block");
		}
	});
//check the both username and password are not empty.
// when submit form.Use AJAX instead.
$("form").submit( function(event) {
	event.preventDefault();
	var username = $("#username").val();
	var password = $("#password").val();
	if (username == '' || password == '' ) {
		if ($("#error").text() != "用户名或者密码不能为空!") {
			$("#error").append("用户名或者密码不能为空!");
			return false;
		}
	}
	//Get username and password value.
	//Then hash password twice.
	var username = $('#username').val();
	var password = md5(md5($('#password').val()));
	//Start send login message。
	$.post('http://www.yaoranqu.com/user/check_login/',
		{username:username,
		password:password},
		send_success);
	$('#error').html('');
});
	//If login secceed.
function send_success(data) {
	var code = data.code;
	if ( 1 == code) {
		var error = data.error;
		switch(error) {
			case 'E002':
				alert('您的密码错误或者用户名错误');
				break;
			default:
				alert('未知错误');
				break;
		}
		return false;
	}
	//set token cookie
	var cookie = 'token='+data.token+';path=/';
	document.cookie = cookie;
	//go to page.
	var direct_path = data.go;
	location.replace( direct_path); 
}