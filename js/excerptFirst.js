// Move the excerpt box above the WYSIWYG editor
jQuery(function($) {
	var $excerpt	= $('#postexcerpt');
	var $wysiwyg	= $('#postdivrich');

	$wysiwyg.prepend($excerpt);
	
	$('#postexcerpt').css('margin-top', '20px');
	$('#postexcerpt h3 span').text('Excerpt');
	$('#postexcerpt p').css('display', 'none');
});