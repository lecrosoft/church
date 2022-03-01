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


    $contact = $_POST['select_contact'];
    $body = $_POST['body'];


    // Initialize the SDK
    $AT = new AfricasTalking($username, $apiKey);

    // Get the SMS service
    $sms = $AT->sms();

    // Set the numbers you want to send to in international format
    $recipients = $contact;

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
        print_r($result['data']->SMSMessageData);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
