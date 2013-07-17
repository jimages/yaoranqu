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
//When the type click,display options div.
function typeClick() {
	var display = $('#typeOption').css('display');
	if(display == 'none')
	{	
		$('#typeOption').css('display','inline-block');
	 } else { 
		$('#typeOption').css('display','none');
		//change the hidden input.
		var typeValue = $(this).text()
		$('#index input[type=hidden]').val(typeValue);
		//Remove old element
		$('#selectedType').remove();
		//create new one.
		$('#textTitleNotice').after('<span id="selectedType">'+typeValue+'</span>');
		//register event again.
		$('#selectedType').click(typeClick);
	}
}
//Register event.
$('#selectedType').click(typeClick);
$('#typeOption li').click(typeClick);
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
$('#createArticle').submit(function (event) {
	event.preventDefault();
	var title = $('#textTitle').val();
	var type = $('input[name=textType]').val();
	KindEditor.sync('#textContent');
	var content = $('#textContent').val();
	//post data.
	$.post('http://www.yaoranqu.com/admin/create_article/',
			{
				'title' : title,
				'textType' : type,
				'textContent' : content
			},create_succ,'json');
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
		
	
	
