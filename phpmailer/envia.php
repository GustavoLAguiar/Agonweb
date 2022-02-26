<?php
 // Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
 require_once("PHPMailerAutoload.php");
 // Inicia a classe PHPMailer
 $mail = new PHPMailer();
 // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
 $mail->IsSMTP(); // Define que a mensagem será SMTP
 $mail->Host = "smtpi.kinghost.net"; // Seu endereço de host SMTP
 $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
 $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
 $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
 $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
 $mail->Username = 'sapon@rebfotografia.com.br'; // Conta de email existente e ativa em seu domínio
 $mail->Password = 'acesso1919'; // Senha da sua conta de email
 // DADOS DO REMETENTE
 $mail->Sender = "sapon@rebfotografia.com.br"; // Conta de email existente e ativa em seu domínio
 $mail->From = "sapon@rebfotografia.com.br"; // Sua conta de email que será remetente da mensagem
 $mail->FromName = "Form do site"; // Nome da conta de email
 // DADOS DO DESTINATÁRIO
 $mail->AddAddress('gustavo_snap@hotmail.com', 'Nome - Recebe1'); // Define qual conta de email receberá a mensagem
 //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
 //$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
 //$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 // Definição de HTML/codificação
 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
 $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 // DEFINIÇÃO DA MENSAGEM
 $mail->Subject  = "Formulário de Contato"; // Assunto da mensagem
 $mail->Body .= " Nome: ".$_POST['name']."
"; // Texto da mensagem
 $mail->Body .= " E-mail: ".$_POST['email']."
"; // Texto da mensagem
 $mail->Body .= " Assunto: ".$_POST['assunto']."
"; // Texto da mensagem
 $mail->Body .= " Mensagem: ".nl2br($_POST['message'])."
"; // Texto da mensagem
 // ENVIO DO EMAIL
 $enviado = $mail->Send();
 // Limpa os destinatários e os anexos
 $mail->ClearAllRecipients();
 // Exibe uma mensagem de resultado do envio (sucesso/erro)
 if ($enviado) {
 $array  = array('tipo' => 'alert alert-success', 'mensagem' => 'Sua mensagem foi enviada com sucesso!');
   echo json_encode($array);
 } else {
   $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Infelizmente houve um erro ao enviar sua mensagem!');
   echo json_encode($array);
 }