<?php

namespace App\Libraries;

use App\Models\NotifModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Notif
{
    protected $notif_model;
    public function __construct()
    {
        $this->notif_model = new NotifModel();
    }

    public function send_notif($receivers, $title, $body)
    {
        if (is_array($receivers)) {
            foreach ($receivers as $receiver) {
                $data = [
                    'receiver' => $receiver['id'],
                    'title' => $title,
                    'isi' => $body
                ];
                $this->notif_model->insert($data);
            }
        } else {
            $data = [
                'receiver' => $receivers,
                'title' => $title,
                'isi' => $body
            ];
            $this->notif_model->insert($data);
        }
    }

    public function send_mail($email_target, $subject, $message, $attachment = false)
    {
        require_once "vendor/autoload.php";

        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        $mail->From = "admin@mcvupdate.com";
        $mail->FromName = "System";

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@mcvupdate.com';                     // SMTP username
        $mail->Password   = 'rumahsakit';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->setFrom('admin@mcvupdate.com', 'System');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        if ($attachment) {
            $mail->addAttachment($attachment['dokumen']);
            $mail->addAttachment($attachment['presentasi']);
        }

        if (is_array($email_target)) {
            foreach ($email_target as $email) {
                $mail->addAddress($email['email']);
            }
        } else {
            $mail->addAddress($email_target);
        }
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
