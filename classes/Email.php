<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	class Email
	{
		private $mailer;
		public function __construct($host, $username, $senha,$name)
		{

			$this->mailer = new PHPMailer(true);
			$this->mailer->isSMTP();                                            //Send using SMTP
			$this->mailer->Host       = $host; /*'p3plzcpnl479485.prod.phx3.secureserver.net';   */                  //Set the SMTP server to send through
			$this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
			$this->mailer->Username   = $username;                     //SMTP username
			$this->mailer->Password   = $senha;                               //SMTP password
			$this->mailer->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
			$this->mailer->Port       = 465; 
			$this->mailer->setFrom($username, $name);
			$this->mailer->isHTML(true);    
			$this->mailer->CharSet = 'UTF-8';                              //Set email format to HTML
			

		}
		
		public function addAddress($email, $nome){
			$this->mailer->addAddress($email, $nome);
		}


		public function formatarEmail($info){
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['corpo'];
			$this->mailer->AltBody = strip_tags($info['corpo']);
			
		}

		public  function enviarEmail(){
			if($this->mailer->send()){
				return true;
			}else{
				return false;
			}
		}
	}

	
?>