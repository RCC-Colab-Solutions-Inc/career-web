<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailSettingController extends Controller
{
    protected $mail;
    public function __construct(){
        $this->mail = new PHPMailer(true);
        try {
            $this->mail->isSMTP();
            $this->mail->Host       = env('MAIL_HOST', 'smtp.example.com');
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = env('MAIL_USERNAME');
            $this->mail->Password   = env('MAIL_PASSWORD');
            $this->mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
            $this->mail->Port       = env('MAIL_PORT', 587);

            $this->mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));


        } catch (\Throwable $th) {
            return response()->json(['message' => 'Mail setting error'], 500);

        }

        
    }
     /**
     * Send Email with CC & BCC
     *
     * @param string $to         - Recipient email address
     * @param string $subject    - Email subject
     * @param string $body       - Email body (HTML)
     * @param array  $cc         - Array of CC email addresses (optional)
     * @param array  $bcc        - Array of BCC email addresses (optional)
     * 
     * @return bool|string
     */
    public function sendMail($to, $subject, $body, $cc = [], $bcc = []){
        try {
            $this->mail->addAddress($to); // Main recipient
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            // Add CC recipients if provided if provided
            if (!empty($cc)) {
                foreach ($cc as $ccEmail) {
                    $this->mail->addCC($ccEmail);
                }
            }
           

            // Add BCC recipients if provided
            if (!empty($bcc)) {
                foreach ($bcc as $bccEmail) {
                    $this->mail->addBCC($bccEmail);
                }
            }

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Mail sending error',
                'error' => $this->mail->ErrorInfo
            ], 500);
        }
    }
}
