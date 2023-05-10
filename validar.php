<?php

	$GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);

	//Variáveis locais
	$nome = $GetPost['nome'];
	$email = $GetPost['email'];
	$mensagem = $GetPost['mensagem'];

	require 'assets/Estilos/PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer(true);
	
	//Linguagem Português
	$mail->SetLanguage('br');
	
	//Aceitar caracteres especiais
	$mail->CharSet = 'UTF-8';
	
	//Define que será usado SMTP
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;

	//Enviar e-mail em HTML
	$mail->isHTML(true);

	//Configurações
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';

	//Nome do Servidor
	$mail->Host = 'smtp.gmail.com'; /* smtp.mailtrap.io */
	//Porta de Saída E-mail
	$mail->Port	= 587; /* 465 */

	//Usuário e senha do servidor OU Dados do E-mail de saída
	$mail->Username = 'missaotcc2018@gmail.com'; /* 546df5cd150a61 */
	$mail->Password = 'missaotcc'; /* c96352759d4052 */

	//E-mail remetente (mandando)
	$mail->From = 'missaotcc2018.art@gmail.com';
	// Nome remetente
	$mail->FromName = $nome;

	//Destinatário (recebendo)
	$mail->AddAddress('mitoafro.art@gmail.com', 'Equipe MitoAfro');
	//E-mail remetente resposta (usuário msm)
	$mail->AddReplyTo($email, $nome);
	
	//Assunto da mensagem
	$mail->Subject = $nome;
	//Corpo da Mensagem
	$mail->Body = 
	'<p><b>Nome: </b>' .($nome) .'</p> 
	<p><b>Email: </b>' . ($email) . '</p>
	<p><b>Mensagem: </b> ' .($mensagem) .'</p>'; //Em HTML
	//Corpo da Mensagem em texto
	$mail->AltBody = 'Conteúdo do E-mail em texto';

	//Verificar se foi enviado ou não
	if($mail->send())
	{
		echo'
		<script>
			$(document).ready(function(){
				swal("Obrigado '.($nome).'...", "Sua mensagem foi enviada com sucesso! <br/>Retornaremos em breve...", "success")
			});
		</script>';
	}
	else
	{
		echo'
			<script>
				$(document).ready(function(){
					swal("Ops '.($nome).'...","Houve um erro ao enviar a mensagem, tente novamente!", "error");
				});
			</script>';
	}

?>