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
$("#username").blur(function() {
	var content = $("#username").val();
	if (content != "") 
		{
			$("#login label:first").css("display","none");
		} else {
			$("#login label:first").css("display","inline-block");
		}
	});
$("#password").blur(function() {
	var content = $("#password").val();
	if (content != "") 
		{
			$("#login label:last").css("display","none");
		} else {
			$("#login label:last").css("display","inline-block");
		}
	});
//check the both username and password are empty.
$("form").submit( function() {
	var username = $("#username").val();
	var password = $("#password").val();
	if (username == '' || password == '' )
		{
			if ($("#error").text() != "用户名或者密码不能为空!")
				$("#error").append("用户名或者密码不能为空!");
				event.preventDefault();
		}
	});