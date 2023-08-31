<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="#">
        <div class="row">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="row">
            <label for="mail">Mail</label>
            <input type="email" id="mail" name="mail">
        </div>
        <div class="row">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="row">
            <label for="password">Confirmer le Password</label>
            <input type="password" id="password2">
            <p class="rules">Au moins 8 caractères</p>
            <p class="rules">Au moins 1 majuscule</p>
            <p class="rules">Au moins 1 caractère spécial</p>
        </div>
        <div class="row">
            <input type="submit" name="submit" value="Inscription" class="submitButton">
        </div>
    </form>

    <script src="./validation-form.js"></script>
</body>

</html>