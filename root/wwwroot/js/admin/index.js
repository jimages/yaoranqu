"use strict";
/* Since:July 4.2013
 * Author:jimages
 * The javascript is for admin.
 */
 //when the DOM load.Run this
 $(document).ready( 
	function() {
		//Load editor.
		//First const width of editor.
		//Then set up editor.
		var editor = KindEditor.create('#textContent',{
			width:'89%',
			//Set plain items
			items:['source','|','undo','redo','|','bold','italic','underline','|','forecolor','insertorderedlist',
				'insertunorderedlist','fontname','fontsize','|','justifyleft','justifycenter','justifyright',
				'justifyfull','|','link','code','image','hr','preview','fullscreen'],
			//Set when paste,Use none stylesheet.
			pasteType:1,
			//Set themes path.
			themesPath:'http://resource.yaoranqu.com/css/editor/',
			//Load theme.
			themeType:'default'
			}
		);
		// To set  up aside selected menu background.
		var selected_menu_top = $('#firstSelection').offset().top;
		$('#selectedBackground').css('top',selected_menu_top+'px');
	}

);
// To set aside height automatically to be full.
function setupAside() {	
	//$("#pageAside").equalHeights()
	var dom_height = $(document).height();
	$("#pageAside").css("height",(dom_height-42)+'px');
	}
$(setupAside);
$(window).resize(setupAside);
 //when one mune selectec.javascript  animate background.
 $('.menu').click( 
	function (event){
		//privent click.	
		event.preventDefault();
		var selected_menu_top = $(this).offset().top;
		$('#selectedBackground').animate({top : selected_menu_top+'px'});
		}
);
 //when text title focus.remove label.
 $("#textTitle").focus(function() {
	$("#textTitleNotice").css("display","none");
	});
$("#textTitle").blur(function() {
	var content = $("#textTitle").val();
	if (content != "") 
		{
			$("#textTitleNotice").css("display","none");
		} else {
			$("#textTitleNotice").css("display","inline-block");
		}
	}
);
//when click one page.Present page remove.Page that be clicked display.
// present page
var presentPage = $('#index');
function changePage(pointPage) {
	if ( presentPage[0] != pointPage[0])
	{	//set pointPage css 
		//remove present page.
		presentPage.animate({right:'100%'}
							,2000,'swing',setupAside);
		pointPage.animate({right:'0%'}
							,2000,'swing',setupAside);
		presentPage = pointPage;
	}
}
$('#addArticle').submit(function (event) {
	event.preventDefault();
	var title = $('#textTitle').val();
	var type = $('input[name=textType]').val();
	KindEditor.sync('#textContent');
	var content = $('#textContent').val();
	//post data.
	$.post('http://www.yaoranqu.com/admin/create_article/',
			{
				"title" : title,
				"textType" : type,
				"content" : content
			},create_succ);
});
function create_succ(data) {
	if(data.code == 1) {
		//If code is 1.explain that there is error.
		var error = data.error;
		switch(error) {
			case 'E003':
				alert('你还没有登录。');
				break;
			case 'E004':
				alert('创建文章出现错误。');
				break;
			case 'E000':
				alert('你还没有输入');
				break;
			default:
				alert('未知错误');
		}
		return false;
	}
	alert('OK.');
}
//aiax function for add link.
$('#addLink').submit(function (envent) {
	//stop default action.
	envent.preventDefault();
	//get date.
	var name = $('input[name=name]').val();
	var url = $('input[name=url]').val();
	var description = $('input[name=description]').val();
	var position = $('input[name=position]').val();
	if ( name == '' || url == '' || position == '') {
		alert('名字，URL，位置不能为空');
	}
	//start ajax
	$.post('http://www.yaoranqu.com/admin/add_link',
			{
				'name' : name,
				'url':url,
				'position':position,
				'description':description
			},_add_link_succ,'json');
	});
//If send seccessful.
function _add_link_succ(data) {
	if(data.code == '1'){
		//If code is 1.Explain that has error.output it.
		alert(data.message);
	} else {
		alert('OK');
		//Then clean data.
		$('input[name=name]').val('');
		$('input[name=url]').val('');
		$('input[name=description]').val('');
		$('input[name=position]').val('');
		//clean label.
		_label_clean($('#linkNameNotice'));
		_label_clean($('#linkUrlNotice'));
		_label_clean($('#linkDescriptionNotice'));
		//clean select.
		$('#linkPositionNotice').html('请选择位置');
	}
}
$('#addDayDaySay').submit(function (envent)　{
		envent.preventDefault();
		//Get data.
		var content = $('#dayDaySayContent').val();
		if(content == '') {
			alert('不能为空');
			return false;
		}
		$.get('http://www.yaoranqu.com/admin/day_day_say/',
			{
				"content" : content 
			},_day_day_say_succ,'json');
});
function _day_day_say_succ (data) {
	if(data.code == '1') {
		alert(data.message);
		return false;
	} else {
		alert('OK');
		$('#dayDaySayContent').val('');
		_label_clean($('#dayDaySayContent'));
	}
}		
//This is a manager for select.
//Notice is used to when notice clicked. display select.
//Value is used to save and submit selected option. 
//Option must be a class element.
function select_manager(notice,select,option,value) {
	//first check varticle is valid.
	if( notice.length == 0 || select.length == 0 || value.length == 0 || option.length < 2) {
		window.alert('The arguments is incorrect. in function select_manager.');
		return false;
	}
	//register function
	//when noticle click.dispaly selection
	notice.click(function () {
		var display = select.css('display');
		if (display == 'none')
			select.css('display','inline-block');
		
	});
	//When one option click.write into value;
	option.click(function () {
		var data = $(this).text();
		value.val(data);
		//Then write to notice.
		notice.text(data);
		//Hide select.
		select.css('display','none');
	});
}
//register select.
select_manager($('#selectedType'),$('ul#articleType'),$('ul#articleType .option'),$('input[name=textType]'));
select_manager($('#linkPositionNotice'),$('ul#linkPosition'),$('ul#linkPosition .option'),$('input[name=position]'));
//Label notice auto manager
//The function need 2 arguments
//text is the text.
//label is the label.
//auto register when label click.
function _label_clean(label) {
			label.css('display','inline-block');
}
function label_manager(text,label) {
	//Register that When text facous.hide label.
	text.focus( function () {
		label.css('display','none');
		});
	text.blur(function (){
		if(text.val() == '')
			_label_clean(label);});
	//check text is empty now
	var data = text.val();
	if (data != '') {
		label.css('display','none');
	}
}
//register
label_manager($('#linkName'),$('#linkNameNotice'));
label_manager($('#linkUrl'),$('#linkUrlNotice'));
label_manager($('#linkDescription'),$('#linkDescriptionNotice'));
label_manager($('#dayDaySayContent'),$('#dayDaySayContentNotice'));