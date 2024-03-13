<?php
ini_set('SMTP', 'smtp.hostinger.com');
ini_set('smtp_port', 465);
ini_set('smtp_ssl', 'ssl');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Check if any of the form fields are empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        header("Location: home.php?error=Please%20fill%20in%20all%20fields");
        exit;
    }

    // Set the recipient email address
    $to = "hugomata.dev@gmail.com";
    $subject = 'DMT Digital - Novo contato';
    $body = "Nome: $name \n\n
    Email: $email \n\n
    Assunto: $subject \n\n
    Message: $message";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    mail($to, $subject, $body, $headers);
}
?>