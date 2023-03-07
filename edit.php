<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $senha = $user_data['senha'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nasc = $user_data['data_nasc'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
       body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, hwb(172 8% 14%), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid rgb(30, 248, 255);
            border-radius: 10px;
        }
        legend{
            border: 1px solid rgba(1, 248, 236, 0.555);
            padding: 10px;
            text-align: center;
            background-color: rgb(126, 250, 229);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 15px;
            color: rgb(30, 248, 255);
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        button {
            --glow-color: rgb(176, 243, 255);
            --glow-spread-color: rgba(123, 255, 233, 0.781);
            --enhanced-glow-color: rgb(123, 241, 241);
            --btn-color: rgb(61, 136, 136);
            border: .25em solid var(--glow-color);
            padding: 1em 7em;
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
    </style>
</head>
<body>
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Aluno</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value=<?php echo $senha;?> required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email;?> required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone;?> required>
                    <label for="telefone" class="labelInput">R A :</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '';?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '';?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '';?> required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value=<?php echo $data_nasc;?> required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value=<?php echo $cidade;?> required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value=<?php echo $estado;?> required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value=<?php echo $endereco;?> required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <button type="submit" name="submit" id="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>