<?
// Coloque o email que ir receber os valores
$to = "txtmuller@gmail.com"; ###################ALTERAR PARA O EMAIL DESEJADO
$nome = $_POST['tfNome'];
$email = $_POST['tfEmail'];
$assunto = $_POST['tfAssunto'];
$msg = $_POST['mensagem'];
$msg = nl2br($msg);

if($nome == NULL || $email == NULL || $assunto == NULL || $msg == NULL):

$mensagem = "Mensagem enviada por: ".$nome." em: ".date("d/m/Y - H:i")."\n <br />
Abaixo seguem os dados do usuário:\n <br />
E-mail: ".$email."\n <br />
Assunto: ".$assunto."\n <br />
A mensagem enviada a você foi a seguinte: \n <br />
".$msg;
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $email <$email>\r\n";
mail($to,$assunto,$mensagem,$headers);

header("location: index.php");

?>