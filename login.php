<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, hwb(172 8% 14%), rgb(17, 54, 71));
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        button {
            --glow-color: rgb(176, 243, 255);
            --glow-spread-color: rgba(123, 255, 233, 0.781);
            --enhanced-glow-color: rgb(123, 241, 241);
            --btn-color: rgb(61, 136, 136);
            border: .25em solid var(--glow-color);
            padding: 1em 6em;
            color: var(--glow-color);
            font-size: 15px;
            font-weight: bold;
            background-color: var(--btn-color);
            border-radius: 1em;
            outline: none;
            box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 1em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
            text-shadow: 0 0 .5em var(--glow-color);
            position: relative;
            transition: all 0.3s;
}

button::after {
            pointer-events: none;
            content: "";
            position: absolute;
            top: 120%;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: var(--glow-spread-color);
            filter: blur(2em);
            opacity: .7;
            transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

button:hover {
            color: var(--btn-color);
            background-color: var(--glow-color);
            box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 2em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
}

button:active {
            box-shadow: 0 0 0.6em .25em var(--glow-color),
                    0 0 2.5em 2em var(--glow-spread-color),
                    inset 0 0 .5em .25em var(--glow-color);
}
input[type='text'], input[type='password'] {
    padding: 1em 4em;
    height: 300%;
    width: 300px;
    border-radius: 10px;
border-width: 2px;
border-color: rgb(0, 255, 255);
   
}


    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <button class="inputSubmit" type="submit" id="submit" name="submit">Enviar</button>           
        </form>
    </div>
</body>
</html>