<?php

function admin_controller($controller_name){
    $controller_name = strtolower($controller_name);
    return PATH . '/admin/controller/' . $controller_name . '.php';
}

function admin_view($view_name){
    return PATH . '/admin/view/' . $view_name . '.php';
}

function admin_url($url = false){
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false){
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId=null){
    $ranks = [
      1 => "Admin",
      2 => "Editor",
      3 => "Member"
    ];

    return $rankId ? $ranks[$rankId] : $ranks;
}

function permission($url, $action)
{
    $permissions = json_decode(session('user_permissions'), true);

    if (isset($permissions[$url][$action]))
        return true;
    return false;
}

function permission_page(){
    require admin_view('permission_denied');
}


function send_email($email, $name, $subject, $message)
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = settings('smtp_host');                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = settings('smtp_email');                     // SMTP username
        $mail->Password = settings('smtp_password');                               // SMTP password
        $mail->SMTPSecure = settings('smtp_secure');         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = settings('smtp_port');                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom(settings('smtp_email_sender'), settings('smtp_email_sender_name'));
        $mail->addAddress($email, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}