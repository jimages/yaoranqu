"use strict";
/* Author:Jimages
 * since: July 12.2013
 * It is for blog index page.
 */
 //register submit funtion.to check date.and submit data by ajax.
 $('form[name=getEmail]').submit( function (event) {
	//stop default action. Make Browser not to a now URL.
	event.preventDefault();
	//check date.
	//be ready
	var email = $('#emailInput').val();
	var email_regex = new RegExp('^[a-zA-Z0-9][a-zA-Z0-9.\\-_]*@[a-zA-Z0-9][a-zA-Z0-9\\-]*[a-zA-Z0-9]?(\\.[a-zA-Z]+)+\\.?$');
	if ( !email_regex.test(email)) {
		email_err('E000');
		return false;
	}
	//start Ajax.
	$.get('http://www.yaoranqu.com/blog/getEmail',
		{ email:email },
		email_succ
	);
});
//when the ajax is successful.
function email_succ (data,textStatus,jqXHR)
{
	//load return code.
	var code = $(data).find('code').text();
	if ( code != 200 ){
		email_err(code);
		return false;
	}
	alert('OK!');
}	
 //email input error function.
 function email_err (code) {
	/* error code list
	 *  |	E000 -->It explain that email is empty or incorrect.
	 *  |	E001 -->Insertion has a error.
	 *	|	#999 -->Unknow error.
	 *	|	200  -->It seems that all things are OK.
	 */
	switch(code) {
	case 'E000':
		alert('错误号：E000,您输入的地址为错或者为空，请检查。');
		break;
	case 'E001':
		alert('错误号：E001,出现了错误，请重试，或者向我们报告。');
		break;
	default:
		alert('错误号：E999,发生未知错误.');
	}
}