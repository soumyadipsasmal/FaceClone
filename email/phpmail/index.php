<?php 

include('email.php');

$to = "omprakashbhagat1995@gmail.com";
$subject = "HTML email";
$message = "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\">\r\n
              <head>\r\n
                <title>Hello Test</title>\r\n
              </head>\r\n
              <body>\r\n
                <p></p>\r\n
                <p style=\"color: #00CC66; font-weight:600; font-style: italic; font-size:14px; float:left; margin-left:7px;\">You have received an inquiry from your website.  Please review the contact information below.</p>\r\n
              </body>\r\n
              </html>";
emailSend($to,$subject,$message);

?>