<?php include("includes/doc.php"); ?>

<title>Beefeater Tours: About Us</title>

</head>

<?php include("includes/header.php"); ?>

<?php include("includes/nav.php"); ?>

<div id="wrapper">

<main>
    <div class="about">
        <h1>Welcome to Beefeater Tours</h1>
        <p class="split">Serving satisfied clients since 1976, Beefeater Tours offers a wide choice of guided tours of the city of London for an international clientele. We believe in providing extraordinary customer service from the first call or email, to the booking of the trip, to the tour itself.</p>
        <p>Beefeater Tours has over 40 years of experience offering the utmost in quality, group and private London tours, and sightseeing services. We ensure that each client’s London experience is carefree, fun, memorable and exceptional in every way.</p>
    </div> <!--end div about-->
        
    <div class="container">

    <h2>Gallery: Photos from Our Tours</h2>
        <ul>
            <li><a href="images/full/1.jpg" data-imagelightbox="f"><img src="images/thumb/1.jpg" alt="London Tower Tour Group" /></a></li>
            <li><a href="images/full/2.jpg" data-imagelightbox="f"><img src="images/thumb/2.jpg" alt="The National Gallery" /></a></li>
            <li><a href="images/full/3.jpg" data-imagelightbox="f"><img src="images/thumb/3.jpg" alt="Riding the London Eye" /></a></li>
            <li><a href="images/full/4.jpg" data-imagelightbox="f"><img src="images/thumb/4.jpg" alt="The Tower Bridge" /></a></li>
            <li><a href="images/full/5.jpg" data-imagelightbox="f"><img src="images/thumb/5.jpg" alt="London Tour Group" /></a></li>
            <li><a href="images/full/6.jpg" data-imagelightbox="f"><img src="images/thumb/6.jpg" alt="The British Museum" /></a></li>
            <li><a href="images/full/7.jpg" data-imagelightbox="f"><img src="images/thumb/7.jpg" alt="The British Museum Great Court" /></a></li>
            <li><a href="images/full/8.jpg" data-imagelightbox="f"><img src="images/thumb/8.jpg" alt="Big Ben" /></a></li>
        </ul>

    </div>   <!--end container-->
    
    <div class="about">
        <h2>History of the 'Beefeater'</h2>
        <img class="beefeater" src="images/beefeater.jpg" alt="beefeater">
        <p class="split">The Yeoman Warders - or ‘Beefeaters’, as they are nicknamed - have long been symbols of London and Britain. It is thought their nickname is derived from their position in the Royal Bodyguard, which permitted them to eat as much beef as they wanted from the king's table.</p>
        <p>They are a detachment of the ‘Yeomen of the Guard’, and they’ve formed the Royal Bodyguard since at least 1509. Their origins stretch back as far as the reign of Edward IV (1461-83).</p>
    </div> <!--end div about-->
    
    </main>

    <?php include("includes/side.php"); ?>

</div>   <!--end wrapper-->

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script> <!--lightbox-->
<script src="js/imagelightbox.min.js"></script> <!--lightbox-->
<script>

	$( function()
	{
			// ACTIVITY INDICATOR

		var activityIndicatorOn = function()
			{
				$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
			},
			activityIndicatorOff = function()
			{
				$( '#imagelightbox-loading' ).remove();
			},


			// OVERLAY

			overlayOn = function()
			{
				$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
			},
			overlayOff = function()
			{
				$( '#imagelightbox-overlay' ).remove();
			},


			// CLOSE BUTTON

			closeButtonOn = function( instance )
			{
				$( '<button type="button" id="imagelightbox-close" title="Close"></button>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });
			},
			closeButtonOff = function()
			{
				$( '#imagelightbox-close' ).remove();
			},


			// CAPTION

			captionOn = function()
			{
				var description = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'alt' );
				if( description.length > 0 )
					$( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );
			},
			captionOff = function()
			{
				$( '#imagelightbox-caption' ).remove();
			},


			// NAVIGATION

			navigationOn = function( instance, selector )
			{
				var images = $( selector );
				if( images.length )
				{
					var nav = $( '<div id="imagelightbox-nav"></div>' );
					for( var i = 0; i < images.length; i++ )
						nav.append( '<button type="button"></button>' );

					nav.appendTo( 'body' );
					nav.on( 'click touchend', function(){ return false; });

					var navItems = nav.find( 'button' );
					navItems.on( 'click touchend', function()
					{
						var $this = $( this );
						if( images.eq( $this.index() ).attr( 'href' ) != $( '#imagelightbox' ).attr( 'src' ) )
							instance.switchImageLightbox( $this.index() );

						navItems.removeClass( 'active' );
						navItems.eq( $this.index() ).addClass( 'active' );

						return false;
					})
					.on( 'touchend', function(){ return false; });
				}
			},
			navigationUpdate = function( selector )
			{
				var items = $( '#imagelightbox-nav button' );
				items.removeClass( 'active' );
				items.eq( $( selector ).filter( '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ).index( selector ) ).addClass( 'active' );
			},
			navigationOff = function()
			{
				$( '#imagelightbox-nav' ).remove();
			},


			// ARROWS

			arrowsOn = function( instance, selector )
			{
				var $arrows = $( '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>' );

				$arrows.appendTo( 'body' );

				$arrows.on( 'click touchend', function( e )
				{
					e.preventDefault();

					var $this	= $( this ),
						$target	= $( selector + '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ),
						index	= $target.index( selector );

					if( $this.hasClass( 'imagelightbox-arrow-left' ) )
					{
						index = index - 1;
						if( !$( selector ).eq( index ).length )
							index = $( selector ).length;
					}
					else
					{
						index = index + 1;
						if( !$( selector ).eq( index ).length )
							index = 0;
					}

					instance.switchImageLightbox( index );
					return false;
				});
			},
			arrowsOff = function()
			{
				$( '.imagelightbox-arrow' ).remove();
			};

		//	ALL COMBINED

		var selectorF = 'a[data-imagelightbox="f"]';
		var instanceF = $( selectorF ).imageLightbox(
		{
			onStart:		function() { overlayOn(); closeButtonOn( instanceF ); arrowsOn( instanceF, selectorF ); },
			onEnd:			function() { overlayOff(); captionOff(); closeButtonOff(); arrowsOff(); activityIndicatorOff(); },
			onLoadStart: 	function() { captionOff(); activityIndicatorOn(); },
			onLoadEnd:	 	function() { captionOn(); activityIndicatorOff(); $( '.imagelightbox-arrow' ).css( 'display', 'block' ); }
		});
        
        //lightbox plugin - About page
        $( 'a' ).imageLightbox();

	});

</script>

</body>
</html>
