<?php

require_once('PHPMailer_5.2.1/class.phpmailer.php');

// Recebe os dados do cliente Ajax via POST
$nome = 	$_POST['nome'];
$email =	$_POST['email'];
$msg = 		$_POST['texto'];

try {
	$mail = new PHPMailer(true);

	// Corpo do E-mail
	$body .= "<h2>Contato via Website</h2>";
	$body .= "Nome: $nome </br>";
	$body .= "E-mail: $email </br>";
	$body .= "Texto: </br>";
	$body .= $msg;
	$body .= "<br>";
	$body .= "Enviado em ".date("h:m:i d/m/Y")." por ".$_SERVER['REMOTE_ADDR'];


	$mail->IsSMTP();
	$mail->SMTPAuth = true; 						//Habilita a autenticação SMTP
	$mail->Port = 465; 								//Porta SMTP
	$mail->Host = "smtp.joanezandrades.com"; 		//Servidor SMTP
	$mail->Username = "bot@joanezandrades.com"; 	// Usuário SMTP
	$mail->Password = "F[Iv=_h@iN=="; 				// Senha do username

	$mail->IsSendmail();

	$mail->AddReplyTo($email, $nome); 				// Responder para
	$mail->From = $email; 							//E-mail fornecido pelo cliente
	$mail->FromName = $nome; 						//Nome Fornecido pelo cliente

	$to = "helloworld@joanezandrades.com"; 			//Destinatário
	$mail->AddAddress($to);
	$mail->Subject = "E-mail via Website"; 			// Assunto
	$mail->WordWrap = 80;

	$mail->MsgHTML($body);

	$mail->IsHTML(true);

	$mail->Send();

	echo 'Mensagem Enviada com sucesso.'; //Retorno devolvido para o Ajax caso sucesso
} catch(phpmailerException $e){
	echo $e->errorMessage(); //Retorno devolvido para o Ajax caso erro
}

?>