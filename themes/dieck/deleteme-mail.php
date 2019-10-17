  <?php
// define variables and set to empty values
$frm_nameErr = $emailErr = $messageErr = "";
$frm_name = $email = $message = "";

// phpinfo();
//echo function_exists( 'mail' );

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

if (empty($_POST["frm_name"])) {
  $frm_nameErr = "frm_name is required";
} else {
  $frm_name = test_input($_POST["frm_name"]);
  // check if frm_name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$frm_name)) {
    $frm_nameErr = "Only letters and white space allowed";
  }
}



if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}

  if (empty($_POST["message"])) {
  $message = "";
} else {
  $message = test_input($_POST["message"]);
}



$formcontent="From: $frm_name \n Message: $message";
//$email = $_POST['email'];
//$message = $_POST['message'];
$recipient = "gerardo.gutierrez@barclays.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!" . $recipient . $subject . $formcontent . $mailheader;

}
?>
