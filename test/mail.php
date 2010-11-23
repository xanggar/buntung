<?php
ini_set("SMTP","mail.buntung.com");
ini_set("smtp_port",25);
ini_set("sendmail_from","noreply@buntung.com");




// The message
$message = "Line 1\nLine 2\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send
mail('bunta@buntung.com', 'My Subject', $message);


?>