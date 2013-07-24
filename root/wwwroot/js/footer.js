'use strict';
/* Author:Jimages
 * Since:July.19 2013
 * It is for friends link.scroll
 */
//Register left buttom.
$('#linkLeft').mousedown(function () {
	link_move(-2);
	});
$('#linkRight').mousedown(function () {
	link_move(2);
	});
//Set the first link box and define max link.
var now_link = 1;
var max_link;
//Setup max_link.
$(document).ready(function() {
	max_link = $('.linkItem').length;
	});
function link_move(move) {
	//Setup data.
	//The left is a link that is firstest link on display.link_right too.
	if( move == 0)
		return true;
	var left = now_link;
	var right = now_link + 5;
	var start_offset,end_offset;
	var move_length;
	var point_link;
	
	if ( right + move <= max_link && left + move >= 1) {
		if( move > 0) {
			//If 'move' more than 0.move right.
			point_link = now_link +2;
		} else {
			//If 'move' less than 0,move left.
			point_link = now_link - 2;
		}
	} else if ( left ==  1 || right == max_link ) {
			if (left == 1 ) {
				//If left is 0 now.move circle.
				point_link = max_link - 5;
			} else {
				//If right is 'max_link' now,move circle.
				point_link = 1;
			}
		} else if (right + move > max_link || left + move < 1) {
				//If the number of links is .
				if (right + move > max_link ) {
					point_link = max_link - 5;
				} else {
					point_link = 1;
				}
			}
	start_offset = $('.linkItem:nth-child('+now_link+')').offset();
	end_offset = $('.linkItem:nth-child('+point_link+')').offset();
	move_length = end_offset.left - start_offset.left;
	_link_move(move_length)
	now_link = point_link;
	point_link = null;
	return true;
}
var now_offset = 0;
//It is a animate manager function.
//Length explain that move length for now position.
//If 'length' is position,will move right.If nagetive,left.
function _link_move(length) {
	now_offset += length;
	$('#linkContainer').animate({right:now_offset+'px'});
}
//Set time auto run.
setInterval(function () {link_move(2);},3000);
