<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST" action = "http://127.0.0.1/codeigniter-aula/index.php/login/salvarregistro">
        <label>E-mail</label>
        <input type="text" name = "email" required/>
        <br/>
        <label>Nome</label>
        <input type="text" name = "nome" required/>
        <br/>
        <input type="submit" value="Criar" />
    </form>
</body>
</html>