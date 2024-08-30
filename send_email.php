<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $resume = htmlspecialchars($_POST['resume']);
    $linkedin = htmlspecialchars($_POST['linkedin']);
    $twitter = htmlspecialchars($_POST['twitter']);
    $website = htmlspecialchars($_POST['website']);

    // Email получателя
    $to = "bagdasarov.kostya@gmail.com";

    // Тема письма
    $subject = "New Submission from " . $firstName . " " . $lastName;

    // Сообщение
    $message = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <p><strong>First Name:</strong> $firstName</p>
        <p><strong>Last Name:</strong> $lastName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Resume/CV:</strong> $resume</p>
        <p><strong>LinkedIn Profile:</strong> $linkedin</p>
        <p><strong>X/Twitter Profile:</strong> $twitter</p>
        <p><strong>Website:</strong> $website</p>
    </body>
    </html>";

    // Заголовки
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <' . $email . '>' . "\r\n";

    // Отправка письма
    if(mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }
}
?>
