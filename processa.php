<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'vendor/autoload.php';
          $nome=$_POST['nome'];
          $email=$_POST['email'];
          $esco=$_POST['escolaridade'];
          $insti=$_POST['instituicao'];
          $habi=$_POST['habilidades'];
        $from = new SendGrid\Email(null, "rafaeloliveira806@yahoo.com.br");
        $subject = "Informaçoes  do candidato";
        $to = new SendGrid\Email(null, "rafaeloliveira806@yahoo.com.br");
        $content = new SendGrid\Content("text/html", "Olá, Rafael <br><br>Novo candidato<br><br>nome: $nome<br>email: $email<br>escolaridade: $esco<br>instituicao: $insti<br>habilidade: $habi");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SG.wVZdgdfM6eQdaKsuvCN5Iddg.Q6n-9PmspvMAIymVjj-4578frrhkERjtrt';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso"
        ?>
    </body>
</html>
