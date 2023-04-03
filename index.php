<?php
$messageSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["E-mail"]) && $_POST["E-mail"] != '') {

        if (filter_var($_POST["E-mail"], FILTER_VALIDATE_EMAIL)) {

            $name = $_POST["name"];
            $Lastname = $_POST["Lastname"];
            $mail = $_POST["E-mail"];
            $text = $_POST["Text"];

            $to = "saxelashvilianzori@gmail.com";

            $subject = "New message from $name $Lastname";

            $message = "Name: $name\nLast Name: $Lastname\nEmail: $mail\n\nSubject: $text";

            $headers = "From: $mail\r\n";
            $headers .= "Reply-To: $mail\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            if (mail($to, $subject, $message)) {
                $messageSent = true;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>E-mail sender</title>
</head>

<body>
    <?php
if ($messageSent):
    ?>
    <h3>Your email has been sent</h3>
    <?php
else:
    ?>
    <form method="post" enctype="multipart/form-data">
        <h1>Send Your Info</h1>
        <div class="sign-in">
            <label for="name">name</label>
            <input type="text" id="name" name="name">

            <label for="Lastname">Lastname</label>
            <input type="text" id="Lastname" name="Lastname">
            
            <label for="E-mail">E-mail</label>
            <input type="email" id="E-mail" name="E-mail">
            
            <label for="Text">Text</label>
            <textarea name="Text" id="Text" cols="36" rows="7"></textarea>
            
            <button type="submit" name="submit" id="submit" class="button" value="SEND">SEND</button>
        </div>
    </form>
    <?php
endif;
    ?>
</body>

</html>