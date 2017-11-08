<?php
 
if(isset($_POST["message"])) {
    $sender=$_POST["name"];
    $email_subject="Potential Client: $sender";
    $phone=$_POST["phone"];
    $senderEmail=$_POST["email"];
    $message=$_POST["message"];
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "r.mueen@gmail.com";
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($sender) ||
 
        !isset($phone) ||
 
        !isset($senderEmail) ||
 
        !isset($message)) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$senderEmail)) {
 
    $error_message .= 'Whoops, the email address looks wrong.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$sender)) {
 
    $error_message .= 'Whoa there, we think you misspelled your name.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'Wow, that is a very short message. Can you write some more? <br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($sender)."\n";
 
    $email_message .= "Email: ".clean_string($senderEmail)."\n";
 
    $email_message .= "Phone: ".clean_string($phone)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$senderEmail."\r\n".
 
'Reply-To: '.$senderEmail."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>