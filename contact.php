<?php include("includes/doc.php"); ?>

<title>Beefeater Tours: Home</title>

</head>

<?php include("includes/header.php"); ?>

<?php include("includes/nav.php"); ?>

</head>

<body>

<div id="wrapper">

    <main>
    <form action="success.php" method="get" name="contact_form" id="contact_form">

        <fieldset>

            <legend>Contact Us</legend>
            
			<label for="first_name">First Name:</label><br>
			<input type="text" id="first_name" name="first_name"><br>
			<label for="last_name">Last Name:</label><br>
			<input type="text" id="last_name" name="last_name"><br>
            
            <label for="email">Email Address:</label><br>
	    	<input type="text" id="email" name="email"><br>
            
            <label for="newsletter" id="news">Would you like to receive our E-Newsletter?</label><br>
            <p><input type="radio" class="radio" name="newsletter" id="yes" value="yes">Yes</p>
            <p><input type="radio" class="radio" name="newsletter" id="no" value="no">No</p>
            
			<label for="phone">Phone Number:</label><br>
			<input type="text" id="phone" name="phone" placeholder=" 999-999-9999"><br>
            
            <label for="comments">Comments:</label><br>
            <textarea name="comments" rows="5" id="comments"></textarea><br>
            
            <input type="submit" id="submit" name="submit" value="Submit">
			<input type="reset" id="reset" name="reset" value="Reset">

        </fieldset>

    </form>
</main>
    
<?php include("includes/side.php"); ?>

</body>
</html>
