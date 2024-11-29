<?php
// Define recipient email
$receiving_email_address = 'your-email@example.com';

// Include PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Error: Unable to load the PHP Email Form library.');
}

// Instantiate the PHP_Email_Form class
$contact = new PHP_Email_Form();
$contact->ajax = true;

// Set email parameters
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Add messages
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send email
echo $contact->send();
?>
