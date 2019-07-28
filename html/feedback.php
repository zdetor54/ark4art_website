<?php

// // ------------- CONFIGURABLE SECTION ------------------------

$mailto = 'zdetor54@gmail.com' ;
$subject = "Comments from the Website" ;

// the pages to be displayed, eg
//$formurl		= "http://www.example.com/feedback.html" ;
//$errorurl		= "http://www.example.com/error.html" ;
//$thankyouurl	= "http://www.abdesign.gr/contanct_en.html" ;

$formurl = "http://www.ark4art.com/html/contact.html" ;/*
$errorurl = "http://www.karantinos.com/error.htm" ;*/
$thankyouurl = "http://www.ark4art.com/html/successful_feedback.html" ;

$uself = 0;

// // -------------------- END OF CONFIGURABLE SECTION ---------------

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$name = $_POST['contactName'];
$email = $_POST['contactEmail'] ;
$comments = $_POST['feedbackMessage'] ;

if (!isset($_POST['contactEmail'])) {
	header( "Location: $formurl" );
	exit ;
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}


$messageproper =

	"This message was sent from:\n" .
	"$name\n" .
	"------------------------------------------------------------\n" .
	"Email of sender: $email\n" .
	"--------------------- COMMENTS --------------------\n\n" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;

mail($mailto, $subject, $messageproper);
header( "Location: $thankyouurl" );

?>
