<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  */

  $receiving_email_address = 'info@bookmaaksa.co.za';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['email'];
  $contact->from_email = $_POST['email'];
  $contact->subject ="New Subscription: " . $_POST['email'];
  
  $contact->smtp = array(
    'host' => 'smtp.office365.com',
    'username' => 'info@bookmaaksa.co.za',
    'password' => 'Admin@2324',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['email'], 'Email');

  echo $contact->send();
?>
