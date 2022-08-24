<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

if(!isset($_ENV['SENDGRID_API_KEY']) || !isset($_ENV['TEST_EMAIL_TO_ADDRESS']) || !isset($_ENV['TEST_EMAIL_FROM_ADDRESS']) || !isset($_ENV['TEST_ENDPOINT'])) {
    echo "Make sure to set the following environment variables for your application:<br>‣ TEST_EMAIL_TO_ADDRESS<br>‣ TEST_EMAIL_FROM_ADDRESS<br>‣ SENDGRID_API_KEY<br>‣ TEST_ENDPOINT";
    return;
}

if($_SERVER['REQUEST_URI'] === '/') {
    echo "Hello World";
} elseif($_SERVER['REQUEST_URI'] === "/" . $_ENV['TEST_ENDPOINT']) {

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($_ENV['TEST_EMAIL_FROM_ADDRESS']);
    $email->setSubject("My Test Email");
    $email->addTo($_ENV['TEST_EMAIL_TO_ADDRESS']);
    $email->addContent("text/plain", "This is a test email sent by your PHP application when you visited the test endpoint");
    $email->addContent(
        "text/html", "This is a <strong>test</strong> email sent by your PHP application when you visited the test endpoint"
    );
    $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
    try {
        $response = $sendgrid->send($email);
        echo "Email Sent";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
} else {
    http_response_code(404);
    return;
}
