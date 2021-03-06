<?php

if(isset($_POST["message"])) {
    $sender=$_POST["name"];
    $email_subject="Potential Client: $sender";
    $phone=$_POST["phone"];
    $senderEmail=$_POST["email"];
    $message=$_POST["message"];
    // EDIT THE 2 LINES BELOW AS REQUIRED
    //$email_to = "r.mueen@gmail.com";
    $email_to = "info@quickprep.nyc";

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

<?php

}

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="Sketch_Block.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <script src="//use.typekit.net/hzh0adl.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script src="js/jquery.gsap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/mainscript.js"></script>
        <title>Get in Touch with us! | QuickPrep NYC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="Have questions about our selection of tutoring programs? Contact us via email or phone, and we'll be more than happy to get in touch!" />
    </head>
    <body>
        <div class="container">
        <header>
            <div class="big-bar">
                <a class="general-logo" href="index.html">
                    <img src="icons/quick-prep-orb.png" style="width:50px;margin-top:12.5px;">
                </a>
                <a class="openmenu mobile-logo">
                    <img src="icons/quick-prep-orb-mobile.png" style="width:50px;margin-top:12.5px;">
                </a>
                <div class="navbar">
                    <ul>
                        <a href="index.html"><li>Our Mission</li></a>
                        <a href="programs.html"><li>Programs</li></a>
                        <a href="teachers.html"><li>Who We Are</li></a>
                        <a href="contact.php"><li>Contact Us</li></a>
                        <a href="register.html">
                            <li>
                                <div class="button small">
                                    Register Now
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </header>
        <div id="menu">
            <ul>
                <a href="index.html">
                    <li>
                        <img src="icons/mission.png" style="width:50px;"><br>
                        Our Mission
                    </li>
                </a>
                <a href="programs.html">
                    <li>
                        <img src="icons/programs.png" style="width:75px;"><br>
                        Programs
                    </li>
                </a>
                <a href="teachers.html">
                    <li>
                        <img src="icons/teacher.png" style="width:50px;"><br>
                        The Teachers
                    </li>
                </a>
                <a href="contact.php">
                    <li>
                        <img src="icons/contact.png" style="width:50px;"><br>
                        Contact Us
                    </li>
                </a>
                <br>
                <a href="register.html">
                    <li>
                        <div class="button small">
                            Register Now
                        </div>
                    </li>
                </a>
            </ul>
        </div>
        <div class="page-picture" id="contact-us">
            <div class="title-text">
                <span class="highlight-text">Contact Us!</span>
            </div>
        </div>
        <div class="divider magenta">
        </div>
        <div class="content-wrapper">
            <div class="content">
                <div class="subtitle-text">
                    <span style="color:rgb(100,100,100)">Have a question? We'd be happy to help!</span>
                </div>
                <div class="text">
                    Have a question that you can't find an answer to? Leave us a message using the form below, or contact us using any of the methods listed. The best way is to reach us by email, but we're friendly with phones, too!
                </div>
                <div class="text" style="text-align:center;vertical-align:top;">
                    <div class="message-form">
                        <div>
                            <h1 class="highlight-text">Leave us a message!</h1>
                            <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                                <input class="textbox" type="text" name="name" placeholder="Name"><br>
                                <input class="textbox" type="email" name="email" placeholder="Email"><br>
                                <input class="textbox" type="tel" name="phone" placeholder="Phone Number"><br>
                                <textarea class="textbox-extended" name="message" rows="10" cols="30" placeholder="Message"></textarea><br>
                                <input class="submit-button close-consult button-dark" type="submit" value="Send">
                            </form>
                        </div>
                    </div>
                    <div class="contact-info">
                        <h1 class="highlight-text">General Contact Information</h1>
                        <div id="map-canvas">
                            <div id="gmap_canvas" style="height:100%;width:100%;">
                            </div>
                        </div>
                        <span class="gray-text" style="font-family:sketchblockbold;font-size:25px;">Quick</span><span class="highlight-text" style="font-family:sketchblockbold;font-size:25px;">Prep</span> NYC<br>
                        330 7th Floor<br>
                        7th Avenue between 28th & 29th Streets<br>
                        New York, NY 10001 <br><br>
                        <a href="tel:+13478680527">1 (347) 868-0527</a><br>
                        <span style="color:rgb(150,150,150);">(Monday-Friday, 10AM-6PM EST)</span><br>
                        <a href="mailto:info@quickprep.nyc">info@quickprep.nyc</a><br>
                    </div>
                    <div class="slide-container">
                        <a href="programs.html">
                            <div class="slide">
                                <h1>Programs</h1>
                                <hr class="band">
                                <div class="slide-text">
                                    Take a look at our selection of effective tutoring programs
                                </div>
                            </div>
                        </a>
                        <a href="teachers.html">
                            <div class="slide">
                                <h1>Who We Are</h1>
                                <hr class="band">
                                <div class="slide-text">
                                    Meet the stars who will make your student a superstar!
                                </div>
                            </div>
                        </a>
                        <a href="questions.html">
                            <div class="slide">
                                <h1>FAQs</h1>
                                <hr class="band">
                                <div class="slide-text">
                                    Get quick, clear answers to the most common questions
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="divider magenta">
            </div>
            <div class="footer">
                <div class="footer-links">
                    <div class="address">
                        330 7th Floor<br>
                        7th Avenue between 28th & 29th Streets<br>
                        New York, NY 10001
                    </div>
                    <div class="contact">
                        QuickPrep NYC<br>
                        <a href="tel:+13478680527">1 (347) 868-0527</a><br>
                        <a href="mailto:info@quickprep.nyc">info@quickprep.nyc</a><br>
                    </div>
                </div>
                <hr>
                <div class="footer-orb">
                    <img src="icons/quick-prep-orb-color.png" style="position:relative;width:75px;bottom:45px;"/>
                </div>
                <div class="connect lower" style="display:inline-block;">
                    <a href=""><img class="social-icon" src="icons/facebook.png"></a>
                    <a href=""><img class="social-icon" src="icons/twitter.png"></a>
                    <a href=""><img class="social-icon" src="icons/linkedin.png"></a>
                </div>
                <div class="copyright lower" style="display:inline-block;">
                    &copy; 2015 QuickPrep, LLC
                </div>
            </div>
            <div class="divider gray">
            </div>
        </footer>
        </div>
        <script src="js/auxiliary.js"></script>
    </body>
</html>
