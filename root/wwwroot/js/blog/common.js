"use strict";
/* Author:jimages
 * Since: July 27.2013
 */
/* Part:Get wether message.
 */
$(document).ready(weather);
function weather() {
	var direct = 'http://sou.qq.com/online/get_weather.php?callback=?';
	$.getJSON(direct,_weather_succ);
}
function _weather_succ (data) {
	//Get weather message
	var date = data.future.forecast[0].DATE;
	var city = data.future.name;
	var temperature = data.future.tmin_0 + '℃~' +data.future.tmax_0 + '℃';
	var weather = data.future.wea_0;
	//Write into html.
	$('#pageStart #weather #report #date').html(date);
	$('#pageStart #weather #report #city').html(city);
	$('#pageStart #weather #report #temperature').html(temperature);
	$('#pageStart #weather #report #weather').html(weather);
	//Set display.
	$('#pageStart #weather #loader').css('display','none');
	$('#pageStart #weather #report').fadeToggle('slow');
}