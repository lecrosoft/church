         <?php
          include('../connections/conn.php');
          require '../vendor/autoload.php';

          use AfricasTalking\SDK\AfricasTalking;



          // // Set your app credentials
          // $username   = "MyAppsUsername";
          // $apiKey     = "MyAppAPIKey";

          ?>

          <?php
          $message_body = "Happy birthday. Behold how good and how pleasant it is to live another year in righteousness. A prayer for you on your birthday: May God bless you and grant you long life, prosperity and happiness for all your days! 
From: THE GLORY OF GOD PRAYER & POWER MINISTRY.";
          ?>

           <?php
            $mail_sql = "SELECT * FROM `sms_settings`";
            $query_sql = mysqli_query($con, $mail_sql);
            $row = mysqli_fetch_assoc($query_sql);
            extract($row);
            ?>
                                            
          <?php
          $lecrosoft = "SELECT * FROM members WHERE day(current_date)=day(date_of_birth) && month(current_date)= month(date_of_birth)";
          $query_lecrosoft = mysqli_query($con, $lecrosoft);
          $count_celebrant = mysqli_num_rows($query_lecrosoft);
          if ($count_celebrant >= 1) {
            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
              extract($row);

              echo $body = "Dear $title $first_name $last_name," . $message_body;






              // Initialize the SDK
              $AT = new AfricasTalking($sender_name, $api_key);

              // Get the SMS service
              $sms = $AT->sms();

              // Set the numbers you want to send to in international format
              $recipients = $phone_number_one;

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

            // echo "<H2> We have no Birthday Celebrants Today </H2>";
          } else {
            echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-warning container  alert-dismissible fade show' role='alert'><strong></strong> We have no birthday celebrants today.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
          }
          ?>







           
        