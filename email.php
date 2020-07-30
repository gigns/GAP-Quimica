<?php

if(isset($_POST['email']) && !empty($_POST['email'])) {

$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$assunto = addslashes($_POST['assunto']);
$mensagem = addslashes($_POST['mensagem']);

$to = "digoo_2@hotmail.com";
$subject = "Contato - Site Trill";
$body = "Nome: ".$nome. "\r\n".
        "Telefone: ".$telefone. "\r\n".
        "Email: ".$email. "\r\n".
        "Assunto: ".$assunto. "\r\n".
        "Mensagem: ".$mensagem;
$header = "From:digoo_2@hotmail.com"."\r\n".
            "Reply-To:".$email."\r\n".
            "X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)) {

    echo("Email enviado com sucesso!");

}else{

    echo("O Email não pode ser enviado.");
}

}


?>