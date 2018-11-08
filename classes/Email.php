<?php

class email
{

    private static $_instance = null;

    private $_confMail;

    private function __construct()
    {
        require '../extraClasses/PHPMailer/PHPMailerAutoload.php';
    }

    public static function updateRequestMail($to, $tid, $taskName, $lastID) {
                if(!isset(self::$_instance)) {
                    self::$_instance = new Email();
                }

                $_confMail = new PHPMailer;

                $_confMail->isSMTP(); // Set mailer to use SMTP
                $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $_confMail->SMTPAuth   = true; // Enable SMTP authentication
                $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
                $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
                $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $_confMail->Port       = 587; // TCP port to connect to

                $_confMail->setFrom('jlmunoz@utep.edu', 'COS Dashboard');
                $_confMail->addAddress($to, $to); // Add a recipient
                //$_confMail->addAddress('ellen@example.com'); // Name is optional
                //$_confMail->addReplyTo('info@example.com', 'Information');
                //$_confMail->addCC('marco@eurekasigns.com');
                $_confMail->addBCC('jose.nieto1123581321@gmail.com');

                //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                $_confMail->isHTML(true); // Set email format to HTML

                $_confMail->Subject = 'Request Update Submit';
                $_confMail->Body    = '<h1>'.$taskName.'</h1> <br>
                <p>Please check the following link with a request update: <a href="http://science.utep.edu/dashboard/beta/dashboardCOS/production/approvalupdates.php?tid='.$lastID.'">Link</a></p>';
                //$_confMail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$_confMail->send()) {
                    echo 'Mailer Error: ' . $_confMail->ErrorInfo;
                    return false;
                } else {
                    return true;
                }

    }



      public static function updateRequestMailApproval($to, $tid, $taskName, $lastID) {
        if(!isset(self::$_instance)) {
            self::$_instance = new Email();
        }

        $_confMail = new PHPMailer;

        $_confMail->isSMTP(); // Set mailer to use SMTP
        $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $_confMail->SMTPAuth   = true; // Enable SMTP authentication
        $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
        $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
        $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $_confMail->Port       = 587; // TCP port to connect to

        $_confMail->setFrom('jlmunoz@utep.edu', 'COS Dashboard');
        $_confMail->addAddress($to, $to); // Add a recipient
        //$_confMail->addAddress('ellen@example.com'); // Name is optional
        //$_confMail->addReplyTo('info@example.com', 'Information');
        //$_confMail->addCC('marco@eurekasigns.com');
        $_confMail->addBCC('jose.nieto1123581321@gmail.com');

        //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
        $_confMail->isHTML(true); // Set email format to HTML

        $_confMail->Subject = 'Request Update Submit';
        $_confMail->Body    = '<h1>'.$taskName.'</h1> <br>
        <p>The Following update request <b>needs approval</b>: <a href="http://science.utep.edu/dashboard/production/approvalupdates.php?tid='.$lastID.'">Link</a></p>';
        //$_confMail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$_confMail->send()) {
            echo 'Mailer Error: ' . $_confMail->ErrorInfo;
            return false;
        } else {
            return true;
        }


      }

        public static function requestUpdateApproval($to, $tid) {
                if(!isset(self::$_instance)) {
                    self::$_instance = new Email();
                }

                $_confMail = new PHPMailer;

                $_confMail->isSMTP(); // Set mailer to use SMTP
                $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $_confMail->SMTPAuth   = true; // Enable SMTP authentication
                $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
                $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
                $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $_confMail->Port       = 587; // TCP port to connect to

                $_confMail->setFrom('jlmunoz@utep.edu', 'COS Dashboard');
                $_confMail->addAddress($to, $to); // Add a recipient
                //$_confMail->addAddress('ellen@example.com'); // Name is optional
                //$_confMail->addReplyTo('info@example.com', 'Information');
                //$_confMail->addCC('marco@eurekasigns.com');
                $_confMail->addBCC('jose.nieto1123581321@gmail.com');

                //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                $_confMail->isHTML(true); // Set email format to HTML

                $_confMail->Subject = 'Request Update Submit';
                $_confMail->Body    = '<h1>Request ID: '.$tid.'</h1> <br>
                <p>Your request approval has been reviewed and answer follow the linkto check: <a href="http://science.utep.edu/dashboard/production/updatetask.php?tid='.$tid.'">Link</a></p>';
                //$_confMail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$_confMail->send()) {
                    echo 'Mailer Error: ' . $_confMail->ErrorInfo;
                    return false;
                } else {
                    return true;
                }

    }

        public static function passwordChange($to, $pwd, $username, $name) {
                if(!isset(self::$_instance)) {
                    self::$_instance = new Email();
                }

                $_confMail = new PHPMailer;

                $_confMail->isSMTP(); // Set mailer to use SMTP
                $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $_confMail->SMTPAuth   = true; // Enable SMTP authentication
                $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
                $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
                $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $_confMail->Port       = 587; // TCP port to connect to

                $_confMail->setFrom('jlmunoz@utep.edu', 'College Of Science Dashboard');
                $_confMail->addAddress($to, $to); // Add a recipient
                //$_confMail->addAddress('ellen@example.com'); // Name is optional
                //$_confMail->addReplyTo('info@example.com', 'Information');
                //$_confMail->addCC('');
                //$_confMail->addBCC('janieto2@miners.utep.edu');

                //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                $_confMail->isHTML(true); // Set email format to HTML

                $_confMail->Subject = 'College Of Science | Users';
                $_confMail->Body    = "Dear $name \nWe have created a user account for you in College Of Science Dashboard System and this is your login info:\n\nUsername: $username \nTemporary Password: ".$pwd." \n \nSign in at: https://science.utep.edu/dashboard/beta/dashboardCOS/production/ \n(When first loging in, go to Site Maintenance > User Maintenance and change your password.)\n\nIf you have any questions, contact Jose Luis Munoz at jlmunoz@utep.edu.\n\nBest regards,\nCollege Of Science";
                //$_confMail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$_confMail->send()) {
                    echo 'Mailer Error: ' . $_confMail->ErrorInfo;
                    return false;
                } else {
                    return true;
                }

    }

    public static function newTaskEmail($to, $task_details_array) {
        if(!isset(self::$_instance)) {
            self::$_instance = new Email();
        }

        $_confMail = new PHPMailer;

        $_confMail->isSMTP(); // Set mailer to use SMTP
        $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $_confMail->SMTPAuth   = true; // Enable SMTP authentication
        $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
        $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
        $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $_confMail->Port       = 587; // TCP port to connect to

        $_confMail->setFrom('jlmunoz@utep.edu', 'College Of Science Dashboard');
        $_confMail->addAddress($to); // Add a recipient
        //$_confMail->addAddress('ellen@example.com'); // Name is optional
        //$_confMail->addReplyTo('info@example.com', 'Information');
        $_confMail->addCC($task_details_array[0]['emailAssign']);
        $_confMail->addBCC('jlmunoz@utep.edu');
        $_confMail->addBCC('jose.nieto1123581321@gmail.com');

        //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
        $_confMail->isHTML(true); // Set email format to HTML

        $_confMail->Subject = 'New Request Generated';
        $_confMail->Body    = "Dear, ".$task_details_array[0]['username']." <br> <br> Your request <b>".$task_details_array[0]['name']."</b> (ID: <b>".$task_details_array[0]['id']."</b> ) has been generated. Please check the details from your request: <br> <br> <ul> <li>ID: <b>".$task_details_array[0]['id']."</b></li> <li>Name: <b>".$task_details_array[0]['name']."</b></li> <li>Department: <b>".$task_details_array[0]['department']."</b>   </li> <li>Description: <b>".$task_details_array[0]['description']."</b></li> <li>URL: <b>".$task_details_array[0]['url']."</li></b> <li>Assign To: <b>".$task_details_array[0]['assiguser']."</b></li> </ul> <br><br> You can check the status at this link: <br><a href='https://science.utep.edu/dashboard/production/updatetask.php?tid='".$task_details_array[0]['id']."'>View</a><br><br>If you have any question regarding this new task, please contact <b>cosweb@utep.edu</b>";
        //$_confMail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$_confMail->send()) {
            echo 'Mailer Error: ' . $_confMail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }

    public static function approvedRequest($to, $request_name, $task_id){
      if(!isset(self::$_instance)) {
          self::$_instance = new Email();
      }

      $_confMail = new PHPMailer;

      $_confMail->isSMTP(); // Set mailer to use SMTP
      $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
      $_confMail->SMTPAuth   = true; // Enable SMTP authentication
      $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
      $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
      $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
      $_confMail->Port       = 587; // TCP port to connect to

      $_confMail->setFrom('jlmunoz@utep.edu', 'College Of Science Dashboard');
      $_confMail->addAddress($to); // Add a recipient
      //$_confMail->addAddress('ellen@example.com'); // Name is optional
      //$_confMail->addReplyTo('info@example.com', 'Information');
      $_confMail->addCC($task_details_array[0]['emailAssign']);
      $_confMail->addBCC('jlmunoz@utep.edu');
      $_confMail->addBCC('jose.nieto1123581321@gmail.com');

      //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
      //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
      $_confMail->isHTML(true); // Set email format to HTML

      $_confMail->Subject = 'New Request has been assigned to you';
      $_confMail->Body    = '<h2>A New request has been assigned to you</h2><br>
      <ul><li><b>'.$request_name.'</b></li><li><a href="https://science.utep.edu/dashboard/production/updatetask.php?tid='.$task_id.'">View</a></li></ul>';


      if (!$_confMail->send()) {
          echo 'Mailer Error: ' . $_confMail->ErrorInfo;
          return false;
      } else {
          return true;
      }

    }

    public static function toDoList($to){
      if(!isset(self::$_instance)) {
          self::$_instance = new Email();
      }

      $_confMail = new PHPMailer;

      $_confMail->isSMTP(); // Set mailer to use SMTP
      $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
      $_confMail->SMTPAuth   = true; // Enable SMTP authentication
      $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
      $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
      $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
      $_confMail->Port       = 587; // TCP port to connect to

      $_confMail->setFrom('cosweb@utep.edu', 'College Of Science Dashboard');
      $_confMail->addAddress($to); // Add a recipient
      //$_confMail->addAddress('ellen@example.com'); // Name is optional
      //$_confMail->addReplyTo('info@example.com', 'Information');
      //$_confMail->addCC($task_details_array[0]['emailAssign']);
      //$_confMail->addBCC('cosweb@utep.edu');
      $_confMail->addBCC('jose.nieto1123581321@gmail.com');

      //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
      //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
      $_confMail->isHTML(true); // Set email format to HTML

      $_confMail->Subject = 'Reminder: To do list';
      $_confMail->Body    = '<h2>To do list:</h2><br>
      <ul><li><b>'.$request_name.'</b></li><li><a href="https://science.utep.edu/dashboard/production/updatetask.php?tid='.$task_id.'">View</a></li></ul>';


      if (!$_confMail->send()) {
          echo 'Mailer Error: ' . $_confMail->ErrorInfo;
          return false;
      } else {
          return true;
      }

    }

    public static function usersTime($to, $time, $location, $studentName, $status){
      if(!isset(self::$_instance)) {
          self::$_instance = new Email();
      }

      $_confMail = new PHPMailer;

      $_confMail->SMTPOptions = array(
          'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

      $_confMail->isSMTP(); // Set mailer to use SMTP
      $_confMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
      $_confMail->SMTPAuth   = true; // Enable SMTP authentication
      $_confMail->Username   = 'jose.nieto1123581321@gmail.com'; // SMTP username
      $_confMail->Password   = 'jfvtqkknzogfsroz'; // SMTP password
      $_confMail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
      $_confMail->Port       = 587; // TCP port to connect to

      $_confMail->setFrom('cosweb@utep.edu', 'College Of Science Dashboard');
      $_confMail->addAddress($to); // Add a recipient
      //$_confMail->addAddress('ellen@example.com'); // Name is optional
      //$_confMail->addReplyTo('info@example.com', 'Information');
      //$_confMail->addCC($task_details_array[0]['emailAssign']);
      //$_confMail->addBCC('cosweb@utep.edu');
      $_confMail->addBCC('jose.nieto1123581321@gmail.com');

      //$_confMail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
      //$_confMail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
      $_confMail->isHTML(true); // Set email format to HTML

      $_confMail->Subject = 'Student has Check in/out';
      $_confMail->Body    = '<img src="https://science.utep.edu/dashboard/production/images/logo_email.jpg"><br><br><h2>An student has check in/out</h2><br>
      <ul><li><b>Name : </b>'.$studentName.'</li> <li><b>Time: </b>'.$time.'</li> <li><b>Location: </b>'.$location.'</li> <li><b>Status: </b>'.$status.'</li></ul> <br><br> <p> For more information please visit the College Of Science Dashboard with your username and password, and visit the <b>Students Record Time</b> link in the sidebar <a href="https://science.utep.edu/dashboard/">https://science.utep.edu/dashboard/</a>';


      if (!$_confMail->send()) {
          echo 'Mailer Error: ' . $_confMail->ErrorInfo;
          return false;
      } else {
          return true;
      }

    }




}
?>
