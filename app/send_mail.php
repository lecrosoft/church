<?php
include('../connections/conn.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>
<?php
if (isset($_POST['send'])) {
    $sender_name = $_POST['sender_name'];
    $sender_mail = $_POST['sender_mail'];
    $receipiant_mail = array();
    $subject = $_POST['subject'];
    $group = $_POST['select_contact'];
    $body = $_POST['body'];
    $attachements = $_FILES["attachements"]["name"];





    switch ($group) {
        case 'members_only':
            $sql = "SELECT `email`,`first_name`,`last_name` FROM `members` WHERE `user_type` = 'member' and email !=''";
            $query_sql = mysqli_query($con, $sql);


            //Load Composer's autoloader
            require '../vendor/autoload.php';
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);






                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $sender_mail;                     //SMTP username
                    $mail->Password   = 'tkgcqxyzhfyobosx';                               //SMTP password...Generate app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($sender_mail, $sender_name);
                    $mail->addAddress($email);



                    // $mail->addAddress($receipiant_mail[$i]);

                    // $mail->setFrom($sender_mail, $sender_name);
                    // foreach ($receipiant_mail as $receipiant) {
                    //     $mail->addAddress($receipiant);
                    // }



                    //Attachments

                    for ($i = 0; $i < count($attachements); $i++) {
                        $file_tmp = $_FILES["attachements"]["tmp_name"][$i];
                        $file_name = $_FILES["attachements"]["name"][$i];
                        $folder = 'assets/images/mail_attachements/' . $file_name;
                        move_uploaded_file($file_tmp, $folder);
                        $mail->addAttachment($folder);
                    }

                    //Add attachments


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    =
                        '<div class="parent_div">' .
                        '<div style="background:purple; color:#fff;text-align:center;padding:2rem">' .
                        'Hello' . ' ' . $first_name . ' ' . $last_name .

                        '</div><br>
                    <br>'


                        . $body

                        . '</div>';


                    $mail->send();
                    echo '<script type="text/javascript"> alert("Message has been sent")</script>';
                    echo '<script type="text/javascript"> window.location = "email.php"</script>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }


            break;
        case 'pastors_only':
            $sql = "SELECT `email`,`first_name`,`last_name` FROM `members` WHERE `user_type` = 'pastor' and email !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {
                //Load Composer's autoloader
                require '../vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);






                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $sender_mail;                     //SMTP username
                    $mail->Password   = 'tkgcqxyzhfyobosx';                               //SMTP password...Generate app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($sender_mail, $sender_name);
                    $mail->addAddress($email);
                    // $mail->addAddress($receipiant_mail[$i]);

                    // $mail->setFrom($sender_mail, $sender_name);
                    // foreach ($receipiant_mail as $receipiant) {
                    //     $mail->addAddress($receipiant);
                    // }



                    //Attachments

                    for ($i = 0; $i < count($attachements); $i++) {
                        $file_tmp = $_FILES["attachements"]["tmp_name"][$i];
                        $file_name = $_FILES["attachements"]["name"][$i];
                        $folder = 'assets/images/mail_attachements/' . $file_name;
                        move_uploaded_file($file_tmp, $folder);
                        $mail->addAttachment($folder);
                    }

                    //Add attachments


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    =
                        '<div class="parent_div">' .
                        '<div style="background:purple; color:#fff;text-align:center;padding:2rem">' .
                        'Hello' . ' ' . $first_name . ' ' . $last_name .

                        '</div><br>
                    <br>'


                        . $body

                        . '</div>';


                    $mail->send();
                    echo '<script type="text/javascript"> alert("Message has been sent")</script>';
                    echo '<script type="text/javascript"> window.location = "email.php"</script>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

            break;
        case 'members_and_pastors':
            $sql = "SELECT `email`,`first_name`,`last_name` FROM `members` WHERE email !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {
                //Load Composer's autoloader
                require '../vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);






                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $sender_mail;                     //SMTP username
                    $mail->Password   = 'tkgcqxyzhfyobosx';                               //SMTP password...Generate app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($sender_mail, $sender_name);
                    $mail->addAddress($email);
                    // $mail->addAddress($receipiant_mail[$i]);

                    // $mail->setFrom($sender_mail, $sender_name);
                    // foreach ($receipiant_mail as $receipiant) {
                    //     $mail->addAddress($receipiant);
                    // }



                    //Attachments

                    for ($i = 0; $i < count($attachements); $i++) {
                        $file_tmp = $_FILES["attachements"]["tmp_name"][$i];
                        $file_name = $_FILES["attachements"]["name"][$i];
                        $folder = 'assets/images/mail_attachements/' . $file_name;
                        move_uploaded_file($file_tmp, $folder);
                        $mail->addAttachment($folder);
                    }

                    //Add attachments


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    =
                        '<div class="parent_div">' .
                        '<div style="background:purple; color:#fff;text-align:center;padding:2rem">' .
                        'Hello' . ' ' . $first_name . ' ' . $last_name .

                        '</div><br>
                    <br>'


                        . $body

                        . '</div>';


                    $mail->send();
                    echo '<script type="text/javascript"> alert("Message has been sent")</script>';
                    echo '<script type="text/javascript"> window.location = "email.php"</script>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            break;
        case 'first_timers':
            $sql = "SELECT `email`,`first_name`,`last_name` FROM `first_timers` WHERE  email !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {
                //Load Composer's autoloader
                require '../vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);






                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $sender_mail;                     //SMTP username
                    $mail->Password   = 'tkgcqxyzhfyobosx';                               //SMTP password...Generate app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($sender_mail, $sender_name);
                    $mail->addAddress($email);
                    // $mail->addAddress($receipiant_mail[$i]);

                    // $mail->setFrom($sender_mail, $sender_name);
                    // foreach ($receipiant_mail as $receipiant) {
                    //     $mail->addAddress($receipiant);
                    // }



                    //Attachments

                    for ($i = 0; $i < count($attachements); $i++) {
                        $file_tmp = $_FILES["attachements"]["tmp_name"][$i];
                        $file_name = $_FILES["attachements"]["name"][$i];
                        $folder = 'assets/images/mail_attachements/' . $file_name;
                        move_uploaded_file($file_tmp, $folder);
                        $mail->addAttachment($folder);
                    }

                    //Add attachments


                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = '<div class="parent_div">' .
                        '<div style="background:purple; color:#fff;text-align:center;padding:2rem">' .
                        'Hello' . ' ' . $first_name . ' ' . $last_name .

                        '</div><br>
                    <br>'


                        . $body

                        . '</div>';


                    $mail->send();
                    echo '<script type="text/javascript"> alert("Message has been sent")</script>';
                    echo '<script type="text/javascript"> window.location = "email.php"</script>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            break;
    }

    //     end of switch statement//




}
