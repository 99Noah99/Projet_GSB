<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="make-login" method="post">
        @csrf
        <input type="text" name="Identifiant"> <br>
        <input type="password" name="Mdp"> <br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>