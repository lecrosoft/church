<?php
include('../connections/conn.php');
require '../vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;



// // Set your app credentials
// $username   = "MyAppsUsername";
// $apiKey     = "MyAppAPIKey";

?>

<?php





if (isset($_POST['send'])) {
    $username  = $_POST['user_name'];
    $apiKey  = $_POST['sender_api'];
    $sender_id  = $_POST['sender_id'];
    $receipiant_number = array();

    $group = $_POST['select_contact'];
    $body = $_POST['body'];






    switch ($group) {
        case 'members_only':
            $sql = "SELECT `phone_number_one`,`first_name`,`last_name` FROM `members` WHERE `user_type` = 'member' and `phone_number_one` !=''";
            $query_sql = mysqli_query($con, $sql);



            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $phone_number_one;
            }
            $members_number = implode(",", $receipiant_number);


            // Initialize the SDK
            $AT = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms = $AT->sms();

            // Set the numbers you want to send to in international format
            $recipients = $members_number;

            // Set your message
            $message    = $body;

            // Set your shortCode or senderId
            // $from       = "myShortCode or mySenderId";
            $from       = $sender_id;

            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    'from'    => $from
                ]);

                // print_r($result);
                print_r(json_encode($result['data']->SMSMessageData));
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            break;




        case 'pastors_only':
            $sql = "SELECT `phone_number_one`,`first_name`,`last_name` FROM `members` WHERE `user_type` = 'pastor' and `phone_number_one` !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {

                extract($row);
                $receipiant_number[] = $phone_number_one;
            }
            $members_number = implode(",", $receipiant_number);


            // Initialize the SDK
            $AT = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms = $AT->sms();

            // Set the numbers you want to send to in international format
            $recipients = $members_number;

            // Set your message
            $message    = $body;

            // Set your shortCode or senderId
            // $from       = "myShortCode or mySenderId";
            $from       = $sender_id;

            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    'from'    => $from
                ]);

                print_r($result);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            break;




        case 'members_and_pastors':
            $sql = "SELECT `phone_number_one`,`first_name`,`last_name` FROM `members` WHERE `phone_number_one` !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {

                extract($row);
                $receipiant_number[] = $phone_number_one;
            }
            $members_number = implode(",", $receipiant_number);


            // Initialize the SDK
            $AT = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms = $AT->sms();

            // Set the numbers you want to send to in international format
            $recipients = $members_number;

            // Set your message
            $message    = $body;

            // Set your shortCode or senderId
            // $from       = "myShortCode or mySenderId";
            $from       = $sender_id;

            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    'from'    => $from
                ]);

                print_r($result);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            break;



        case 'first_timers':
            $sql = "SELECT `phone_number`,`first_name`,`last_name` FROM `first_timers` WHERE `phone_number` !=''";
            $query_sql = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {

                extract($row);
                $receipiant_number[] = $phone_number;
            }
            $members_number = implode(",", $receipiant_number);


            // Initialize the SDK
            $AT = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms = $AT->sms();

            // Set the numbers you want to send to in international format
            $recipients = $members_number;

            // Set your message
            $message    = $body;

            // Set your shortCode or senderId
            // $from       = "myShortCode or mySenderId";
            $from       = $sender_id;

            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    'from'    => $from
                ]);

                print_r($result);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            break;
    }

    //     end of switch statement//




}
