<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function sendmail($type,$data = 'null')
	{
		   require_once ("class.phpmailer.php");
           require_once ("class.smtp.php");
           require_once ("PHPAutoloadMailer.php");
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
$mail->Username = "";//Your maild ID
$mail->Password = "";// MailID password

  $mail->SetFrom('mohanram0911@gmail.com','De Yo');
  $mail->FromName = "From";
  $mail->AddAddress("mohanram0911@gmail.com");
  $mail->Subject = $type;
  $content = $this->load->view('header.html',array(),true);
  if($type == 'review')
  {
    $content .= $this->load->view('review.html',$data,true);
  }
  elseif($type == 'register')//
  {
    $content .= $this->load->view('register.html',$data,true);
  }
  $content .= $this->load->view('footer.html',array(),true);
  $mail->Body = $content;
  $mail->IsHTML (true);
  $mail->SMTPDebug = 4;
  if (!$mail->Send())
  {
    echo "Error: $mail->ErrorInfo";
  }
  else
  {
    echo "Message Sent!";
  }

}
}