<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $email_from = 'sherazsharif778@gmail.com';
    $email_subject = 'New Form Submission';
    $email_to = 'shaniibest786@gmail.com';

    $email_body = "User Name: $name\n".
                  "User Email: $visitor_email\n".
                  "Subject: $subject\n".
                  "Message: $message\n";

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";
    
    // Send email and check for success
    if (mail($email_to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html");
        exit(); // Ensure script stops after redirection
    } else {
        echo "Email sending failed. Please try again later.";
    }
    
} else {
    echo "Invalid request.";
}

?>
