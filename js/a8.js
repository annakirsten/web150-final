$(document).ready(function(){
    
    //animate home header
    $('.header-home').animate({
        left: 0,
        opacity: 1,
        fontSize: '1.8em'
    }, 800);
    

    //create hover event in nav li
    $('nav a').hover(function(){
        $(this).css("background-color", "#F8F6F8"); //mouse hover
    }, function(){
        $(this).css("background-color", "#D4353D"); //no hover
    });
    
    
    //animate home image tiles - hide then fade in
    var $tilesTop = $('div.top') //top tiles
    $tilesTop.hide().each(function(index) {
        $(this).delay(500 * index).fadeIn(500);
    });
    
    var $tilesBottom = $('div.bottom') //bottom tiles
    $tilesBottom.hide().each(function(index) {
        $(this).delay(500 * index).fadeIn(500);
    });
    

    //.css() method
    $('a.category').css({
        'textDecoration': 'none' //remove text underline in Services > ul > li
    });
    
    $('.italics').css({
        'fontStyle': 'italic' //change all text with category 'italics' to italic
    });
    
    
    //datepicker widget - Home page
    $( "#datepicker" ).datepicker();
    
    //button widget - Home page
    $( "#check_date" )
        .button()
        .click(function( event ) {
            event.preventDefault();
    });
    
    //accordion widget - Services page
    $( "#accordion" ).accordion();
    
    
    //form validation
    // add span element after each input element
    $('form :text, form #news').after('<span>*</span>');
    
    //move focus to first text box
    $('#first_name').focus();
    
    //add event handler for the click event of a regular button
    $('#contact_form').submit(
        function(event){
            var isValid = true;

            //validate first name entry
            var firstName = $('#first_name').val().trim();
            if (firstName == ''){
                $('#first_name').next().text('First name is required.');
                isValid = false;
            } else {
                ('#first_name').val(firstName);
                ('#first_name').next().text('');
            }

            //validate last name entry
            var lastName = $('#last_name').val().trim();
            if (lastName == ''){
                $('#last_name').next().text('Last name is required.');
                isValid = false;
            } else {
                ('#last_name').val(lastName);
                ('#last_name').next().text('');
            }

            //validate email address
            var emailPattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
            var email = $('#email').val();
            if (email == ''){
                $('#email').next().text('Email address is required.');
                isValid = false;
            } else if (!emailPattern.test(email)){
                $('#email').next().text('Must be a valid email address.');
                isValid = false;
            } else {
                $('email').next().text('');
            }
            
            //require radio button selection
            if ($('[name="newsletter"]').is(':checked')){
                $('#news').next().text('')
            }else{
                $('#news').next().text('Required.');
            }
			
            // validate the phone number (regular expression)
            var phonePattern = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
            var phone = $('#phone').val();
			if (phone == '') { 
				$("#phone").next().text('Phone number is required.');
				isValid = false;
			} else if ( !phonePattern.test(phone) ) {
				$('#phone').next().text('Use correct format: 123-456-7890.');
			} else {
				$('#phone').next().text('');
			}
			
            //prevent submission if there are invalid entries
            if (isValid == false){
                event.preventDefault();
            }
            
    }); //end submit
    
    $('#contact_form').validate({
        rules: {
            myRadioGroupName: {
                required: true
            }
        }
    });
    
});
