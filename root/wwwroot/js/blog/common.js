"use strict";
/* Author:jimages
 * Since: July 27.2013
 */
//function:The function is for background image.
//chage offset of image and size.
//width and height are size of background image. 
function _back_image(width,height) {
	//whether screen size wider than image size
	if (width < innerWidth) {
		//If screen size  is widter  than image size,image will be wider.
		//Save proportion.
		var proportion = innerWidth/width;
		width = innerWidth;
		height *= proportion;
		//Set css.
		$('body').css('background-size',width+'px'+' '+height+'px');
	} 
	//whether screen size higher than image size
	if ( height < innerHeight) {
		//If screen higher than image size,image will be higher.
		var proportion = innerHeight/height;
		height = innerHeight;
		width *= proportion;
		$('body').css('background-size',width+'px'+' '+height+'px');
		//Set css
	} 	
}
//register function.
$(window).resize(function () {_back_image(1920,1080);});
$(window).load(function () {_back_image(1920,1080);});