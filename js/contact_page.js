$('.contact_row').click(function(){
	// Check if the contact is alraeady active, if so don't re-animate.
	if (!$(this).find('.contact').is(':hidden'))
		return true;
		
	//Close all other contacts
	$('.contact').hide();
	$('.extended_phone').hide();
	$('.name').show();
	
	$(this).find('.name').hide();
	$(this).find('.contact').css('opacity',0).show().animate({opacity:1});
	$(this).find('.extended_phone').css('opacity',0).show().animate({opacity:1});
});