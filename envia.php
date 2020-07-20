<?
$empresa = "Gap Química";
$title = "Fale Conosco";
$siteurl = "http://www.gapquimica.com.br";
$data = date("d/m/Y  H:i:s");
$obrigado = "obrigado.htm";
$erro = "erro.htm";
?>

<HTML>
<HEAD>
<TITLE><? echo "$empresa - $title"; ?></TITLE>
</HEAD>

<?
##############################################################################
# CHAMA A PÁGINA DE ERRO

if ($nome == "") {
    echo "<script>alert('Nome deve ser preenchido!');</script>";
    echo "<script>history.go(-1);</script>";
    nome.focus;
   }

if (substr_count($email,"@") == 0 || substr_count($email,".") == 0) {
    echo "<script>alert('Por favor, preencha um email válido!');</script>";
    echo "<script>history.go(-1);</script>";
    email.focus;
   }

##############################################################################
# RESPOSTA VIA PAGINA

else {
   include("$obrigado");

##############################################################################
# ENVIO DE EMAIL PARA O DESTINO

//Variaveis de POST, Alterar somente se necessário 
//====================================================
$nome = $_POST['nome'];
$email = $_POST['email'];
$cliente = $_POST['cliente'];
$telefone = $_POST['telefone']; 
$mensagem = $_POST['mensagem'];
//====================================================
	
//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
//==================================================== 
$email_sender = "gapquimica@gapquimica.com.br"; // deve ser uma conta de email do seu dominio 
$email_remetente = "gapquimica@gapquimica.com.br"; // Remetente que deve ser uma conta do seu dominio 
//====================================================
	
//Configurações do email, ajustar conforme necessidade
//==================================================== 
$email_destinatario = "gapquimica@gapquimica.com.br; renan@gapquimica.com.br"; // pode ser qualquer email que receberá as mensagens
$email_reply = "$email"; 
$email_assunto = "Contato via web GAP em $data"; // Este será o assunto da mensagem
//====================================================
	
//Monta o Corpo da Mensagem
//====================================================
$email_conteudo = "Contato via web GAP em $data \n\n"; 
$email_conteudo .= "Nome:     $nome \n"; 
$email_conteudo .= "Email:    $email \n";
$email_conteudo .= "Empresa:  $cliente \n";
$email_conteudo .= "Telefone: $telefone \n"; 
$email_conteudo .= "Mensagem: $mensagem \n";
//====================================================
	
//Seta os Headers (Alterar somente caso necessario) 
//==================================================== 
$email_headers = implode ( "\n",array ( "From: GAP Quimica <$email_remetente>", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
//====================================================
	
//ENVIANDO O EMAIL
//==================================================== 
if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers ,"-r".$email_sender)){ // Se for Postfix
    $email_headers .= "Return-Path: " . $email_sender . $quebra_linha; // Se "não for Postfix"
     mail($email_destinatario, $email_assunto, $mensagem, $email_headers );				
	echo "</b>MENSAGEM ENVIADA COM SUCESSO!</b>"; 
	}	
else{ 
	echo "</b>FALHA NO ENVIO DA MENSAGEM! FAVOR ENTRAR EM CONTATO PELO TELEFONE: (11) 2413-7399</b>"; } 

//====================================================
 
// ENVIANDO EMAIL DE RESPOSTA AUTOMATICA
//====================================================
$resposta_assunto = "Sua mensagem foi enviada com sucesso";
$resposta_conteudo .= "_______________________________________________________________________________________________________\n\n";
$resposta_conteudo .= "Olá $nome,\n\n";
$resposta_conteudo .= "Sua mensagem foi enviada com sucesso via website para GAP Quimica. \n";
$resposta_conteudo .= "Responderemos o mais breve possível! \n";
$resposta_conteudo .= "Agradecemos o contato! \n\n";
$resposta_conteudo .= "Sua mensagem enviada: \n\n";
$resposta_conteudo .= "$mensagem \n\n";
$resposta_conteudo .= "_______________________________________________________________________________________________________\n";
$resposta_conteudo .= "GAP Quimica Ltda - (11) 2413-7399";

if (mail($email, $resposta_assunto, nl2br($resposta_conteudo), $email_headers ,"-r".$email_sender)){ // Se for Postfix
    $email_headers .= "Return-Path: " . $email_sender . $quebra_linha; // Se "não for Postfix"
     mail($email_destinatario, $email_assunto, $mensagem, $email_headers );
   }

}
?>

</font>
</div>
</body>
</html>
