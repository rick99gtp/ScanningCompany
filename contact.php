<?php
    if(filter_has_var(INPUT_POST, 'submit')) {
        // Message vars
        $msg = '';
        $msgClass = '';
        $msgNameClass = '';
        $msgEmailClass = '';
        $msgPhoneClass = '';

        // get form data
        $name = $_POST['username'];
        $email = $_POST['useremail'];
        $phone = $_POST['userphone'];
        $project = $_POST['userproject'];
        // $usb = $_POST['usb'];

        // check required fields
        if(empty($name)) {
            $msgNameClass = 'input-red';
        }

        if(empty($email)) {
            $msgEmailClass = 'input-red';
        }

        if(empty($phone)) {
            $msgPhoneClass = 'input-red';
        }

        if(!empty($name) && !empty($phone) && !empty($email)) {
            // sanitize and validate email
            $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if(filter_var($clean_email, FILTER_VALIDATE_EMAIL)) {
                // save email in database
                // create an email and send to lbeyer39@gmail.com <---- replace with business email address
                $toEmail = 'lbeyer39@gmail.com';
                $subject = 'Contact request from '.$name;
                $body = '<h2>Contact Request</h2><h4>Name</h4><p>'.$name.'</p><h4>Email</h4><p>'.$email.'</p><h4>Message</h4><p>'.$phone.'</p>';

                // Email headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

                // additional headers
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)) {
                    // email sent
                    $msg = "Your email has been sent.";
                    $msgClass = "email-sent";
                }
                else {
                    $msg = "Your email was not sent.";
                }
            }
            else {
                // echo 'Email is not valid';
            }
        }
        else {
            // failed
            $msg = 'Please fill in all required fields.';
            $msgClass = 'fill-in-all-fields';
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Titan+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Scanning Photos Company</title>
    </head>

    <body>
        <section class="contact-hero">
            <header>
                <div class="logo">
                    <!-- <img src="/images/logo.png" alt="logo" width="50" height="50" /> -->
                    MemoriesWeHold.com
                </div>
                <div class="hamburger-container">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </header>

            <div class="contact-main">
                <div class="contact-left">
                    <div class="contact-left-top">
                        <h1>GET STARTED!</h1>
                        <p>Contact me to get started with your order.  Please fill out the form and specify how many pictures or slides you need, etc. etc. etc.  I will respond in a timely manner.</p>
                    </div>
                    
                    <div class="contact-left-phone">
                        <i class="fas fa-phone-alt fa-2x"></i> Phone:  <a href="tel:972-510-9869">972-510-9869</a>
                    </div>

                    <div class="contact-left-email">
                        <i class="far fa-envelope fa-2x"></i> Email: <a href="mailto:orders@digimemories.com">orders@digimemories.com</a>
                    </div>

                    <div class="contact-left-location">
                        <i class="fas fa-globe-americas fa-2x"></i> Located in The Colony, TX. Servicing The Colony and surrounding areas
                    </div>

                    <div class="social social-contact">
                        <i class="fab fa-facebook-f fa-2x"></i>
                        <i class="fab fa-linkedin fa-2x"></i>
                    </div>
                </div>

                <div class="contact-right">
                    <?php if($msg != ''): ?>
                        <div class="form-alert <?php echo $msgClass; ?>">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="user-name">Your Name: *</label>
                        <input type="text" id="user-name" name="username" value="<?php echo $name ?>" placeholder="Your Name" class="<?php if($msgNameClass != ''): ?><?php echo $msgNameClass; ?>" <?php endif; ?> />

                        <label for="user-phone">Phone: *</label>
                        <input type="text" id="user-phone" name="userphone" value="<?php echo $phone ?>" placeholder="Your Phone Number" class="<?php if($msgPhoneClass != ''): ?><?php echo $msgPhoneClass; ?>" <?php endif; ?>/>

                        <label for="user-email">Email: *</label>
                        <input type="text" id="user-email" name="useremail" value="<?php echo $email ?>" placeholder="Your email" class="<?php if($msgEmailClass != ''): ?><?php echo $msgEmailClass; ?>" <?php endif; ?> />

                        <label for="user-project">Project Description (# of photos, slides, negatives): </label>
                        <textarea type="text" id="user-proejct" name="userproject" placeholder="Description of Your Project"></textarea>

                        <!-- <input type="checkbox" value="usb" name="usb" /> I would like a USB Thumb Drive ($10 upgrade)<br> -->

                        <input type="submit" name="submit" value="Submit" />
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                Copyright &copy; 2020. All rights reserved.
            </div>
        </section>
    </body>
</html>