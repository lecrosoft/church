<?php
include('../connections/conn.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
    $inputedMail = $_POST['inputedMail'];
    $password_harsh = password_hash($new_password, PASSWORD_DEFAULT);
    $lecrosoft = "UPDATE `members` SET `password`='$password_harsh' WHERE `email` = '$inputedMail'";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);


    if ($query_lecrosoft) {

        $sql = "SELECT `first_name`,`last_name`,`email` FROM `members` WHERE `email` = '$inputedMail'";
        $query_sql = mysqli_query($con, $sql);
        $user_row = mysqli_fetch_assoc($query_sql);
        extract($user_row);

        $user_email = $user_row['email'];


        $mail_credentials_sql = "SELECT * FROM `email_settings` WHERE `email_id` = 1";
        $query_credentials = mysqli_query($con, $mail_credentials_sql);
        $row = mysqli_fetch_assoc($query_credentials);
        extract($row);



        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $sender_mail;                     //SMTP username
            $mail->Password   = $app_password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($sender_mail, $sender_name);
            $mail->addAddress($user_email, $first_name);     //Add a recipient




            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'PASSWORD RESET SUCCESSFULL';
            $mail->Body    = '<div style="background:purple; color:white;padding:1rem">' . " Congratulations $first_name " . '</div>' . '<br>' . '<p class="">Your password has been reset successfully. </p>' . '<br>' . '<p>' . "Here is your new password : $new_password " . ' </p>' . '<br>' . '<a href="ggppm.org/app">Click here to login.</a>';


            $mail->send();
            // echo 'Message has been sent';
            $word = "updated";
            echo trim($word);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
