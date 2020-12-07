<?php
   // Check for empty fields
   if(
      empty($_POST['name'])
      || empty($_POST['email'])
      || empty($_POST['phone'])
      || empty($_POST['message']) 
      || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
   ) {
      echo "No arguments Provided!";
      return false;
   }
   
   $name = strip_tags(htmlspecialchars($_POST['name']));
   $email_address = strip_tags(htmlspecialchars($_POST['email']));
   $phone = strip_tags(htmlspecialchars($_POST['phone']));
   $message = strip_tags(htmlspecialchars($_POST['message']));
   
   // Create the email
   $to = 'sabyrbayev.adi32@gmail.com';
   $email_subject = "Porfolio Website Contact Form: $name";
   $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
   $headers = "From: noreply@madrigal.pro\n";
   $headers .= "Reply-To: $email_address"; 
   
   // Send the email
   mail($to,$email_subject,$email_body,$headers);
   return true;         
?>