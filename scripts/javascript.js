/***********************************************************************************************************************
DOCUMENT: includes/javascript.js
DEVELOPED BY: Ryan Stemkoski
COMPANY: Zipline Interactive
EMAIL: ryan@gozipline.com
PHONE: 509-321-2849
DATE: 3/26/2009
UPDATED: 3/25/2010
DESCRIPTION: This is the JavaScript required to create the accordion style menu.  Requires jQuery library
NOTE: Because of a bug in jQuery with IE8 we had to add an IE stylesheet hack to get the system to work in all browsers. I hate hacks but had no choice :(.
************************************************************************************************************************/
$(document).ready(function() {
	 
	//ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
	$('.tituloNoticia').click(function() {

		//REMOVE THE ON CLASS FROM ALL BUTTONS
		$('.mais').removeClass('active');
		  
		//NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
	 	$('.conteudoNoticia').slideUp('normal');
   
		//IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
		if($(this).next().is(':hidden') == true) {
			
			//ADD THE ON CLASS TO THE BUTTON
			$('.mais').addClass('active');
			  
			//OPEN THE SLIDE
			$(this).next().slideDown('normal');
		 } 
		  
	 });
	  
	
	/*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	//ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER 
	$('.tituloNoticia').mouseover(function() {
		$(this).addClass('over');
		
	//ON MOUSEOUT REMOVE THE OVER CLASS
	}).mouseout(function() {
		$(this).removeClass('over');										
	});
	
	/*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	
	/********************************************************************************************************************
	CLOSES ALL S ON PAGE LOAD
	********************************************************************************************************************/	
	$('.conteudoNoticia').hide();

});


// flickr
    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=64139351@N07&lang=pt-br&format=json&jsoncallback=?", displayImages);
	

        function displayImages(data) {
            // Randomly choose where to start. A random number between 0 and the number of photos we grabbed (20) minus 9 (we are displaying 9 photos).
            var iStart = Math.floor(Math.random() * (13));

            // Reset our counter to 0
            var iCount = 0;

            // Start putting together the HTML string
            var htmlString = "<ul>";

            // Now start cycling through our array of Flickr photo details
            $.each(data.items, function(i, item) {

                // Let's only display 9 photos (a 3x3 grid), starting from a random point in the feed					
                if (iCount > iStart && iCount < (iStart + 7)) {

                    // I only want the ickle square thumbnails
                    var sourceSquare = (item.media.m).replace("_m.jpg", "_s.jpg");

                    // Here's where we piece together the HTML
                    htmlString += '<li><a href="' + item.link + '" target="_blank">';
                    htmlString += '<img src="' + sourceSquare + '" alt="' + item.title + '" title="' + item.title + '"/>';
                    htmlString += '</a></li>';
                }
                // Increase our counter by 1
                iCount++;
            });

            // Pop our HTML in the #images DIV	
            $('#images').html(htmlString + "</ul>");

            // Close down the JSON function call
        }