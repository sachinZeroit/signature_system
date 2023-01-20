<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\redirect;
use Hash;
class MailController extends Controller
{
    //
    public function index(){
        return view('admin/mail/mail');
    }

    public function send_mail(Request $request){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $body = $request->body;
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
 
    
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'sc7618370@gmail.com';   //  sender username
            $mail->Password = 'cccqgmadphtapnqn';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465
 
            $mail->setFrom('sachin.zeroit@gmail.com');
            $mail->addAddress($request->email);
            
                for ($i=0; $i < count($_FILES['file']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
                }
            $mail->isHTML(true);                // Set email content format to HTML
 
            
            $mail->Subject = $subject;
            $mail->Body = $body;
 
            // $mail->AltBody = plain text version of email body;
 
            if(!$mail->send()) {
                return back()->withErrors("failed", "Email not sent.");
            }
            
            else {
                return back()->with("success", "Email  sent successfully.");
            } 
    }
    }
    