$(document).ready(function(){

	#('#nav_header span').mouseenter(function() {
		var elem_calss = $(this).attr('class');
		var elem_width = $(this).css('width');
		var matching_ul = $('ul.' + elem_calss);
		matching_ul.css('visibility','visible');
		matching_ul.css('min-width', elem_width);
	}).mouseleave(function() {
		var elem_calss = $(this).attr('class');
		$('ul.' + elem_calss).css('visibility','hidden');
	});

	$('#nav_menus ul').mouseenter(function() {
		$(this).css('visibility','visible');
	}).mouseleave(function() {
		$(this).css('visibility','hidden');
	});
	
});