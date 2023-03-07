a pagina config.php é um código em PHP que cria uma conexão com um banco de dados MySQL usando a extensão MySQLi (MySQL Improved).
Aqui está uma explicação linha por linha do que o código faz:
$dbHost, $dbUsername, $dbPassword e $dbName são variáveis que armazenam as informações necessárias para se conectar ao banco de dados. $dbHost é o endereço do servidor de banco de dados (geralmente localhost se o banco de dados está sendo executado no mesmo servidor que o código PHP), $dbUsername é o nome de usuário do banco de dados, $dbPassword é a senha do banco de dados e $dbName é o nome do banco de dados que você deseja conectar.
A linha $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName); cria uma nova instância da classe mysqli e passa as informações de conexão como argumentos. Esta linha também estabelece uma conexão com o banco de dados.
Os comentários que seguem (linhas que começam com //) mostram como verificar se a conexão foi estabelecida com sucesso. Eles são opcionais e podem ser usados para depurar problemas de conexão. Se você quiser usá-los, descomente as linhas e comente o código anterior.
Se a conexão foi bem sucedida, a variável $conexao contém um objeto mysqli que você pode usar para executar consultas SQL. Se ocorrer um erro durante a conexão, o objeto mysqli retornará NULL e você poderá acessar mais informações sobre o erro usando as propriedades connect_errno e connect_error.


Este formulario.php é um formulário de registro de usuário que coleta informações como nome, e-mail, senha, telefone, sexo, data de nascimento, cidade, estado e endereço. Essas informações são enviadas para um banco de dados MySQL usando o objeto MySQLi. O formulário tem ação definida para a própria página PHP. Se o formulário for enviado, uma consulta INSERT é executada para adicionar as informações do usuário ao banco de dados. Após a inserção ser concluída com êxito, a página é redirecionada para a página de login. O código HTML contém um formulário com vários campos, estilizados com CSS. O botão de envio é estilizado com um efeito de brilho e transição.

Este é um loginTest.PHP que lida com a funcionalidade de login do usuário. Ele inicia uma sessão usando a função session_start() e verifica se o formulário foi enviado usando a função isset().
Se o formulário foi enviado e os campos de e-mail e senha não estiverem vazios, o script acessa um banco de dados usando include_once('config.php'), que provavelmente contém as informações de conexão com o banco de dados.
Em seguida, ele seleciona todas as linhas da tabela "usuários" onde o e-mail e a senha correspondem aos valores de entrada usando uma consulta SQL. O resultado desta consulta é armazenado em $resultado.
Se $result tiver menos de uma linha, significa que o usuário não foi encontrado no banco de dados, então o script desativa as variáveis ​​de sessão e redireciona para a página de login usando header('Location: login.php').
Se $result tiver uma ou mais linhas, significa que o usuário foi encontrado no banco de dados, então o script define as variáveis ​​de sessão e redireciona para a página principal do sistema usando header('Location: sistema.php').
Se o formulário não foi enviado ou os campos de e-mail e senha estão vazios, o script simplesmente redireciona para a página de login usando header('Location: login.php').
Vale a pena notar que este script é suscetível a ataques de injeção de SQL, pois usa a entrada do usuário diretamente na consulta SQL. Recomenda-se usar consultas parametrizadas ou instruções preparadas.

sistema.php e função é responsável por controlar o acesso a uma página em um sistema de login.

Primeiramente, a função inicia uma sessão com session_start(). Em seguida, é incluído o arquivo de configuração (config.php) que contém informações de conexão com o banco de dados.

A seguir, é verificado se o usuário está autenticado, ou seja, se existe uma sessão iniciada com as informações de email e senha do usuário ($_SESSION['email'] e $_SESSION['senha']). Caso não exista, as variáveis de sessão são removidas com unset($_SESSION['email']) e unset($_SESSION['senha']) e o usuário é redirecionado para a página de login (header('Location: login.php')).

Caso o usuário esteja autenticado, o email do usuário é armazenado em uma variável ($logado = $_SESSION['email']) e a função verifica se existe um parâmetro de busca ($_GET['search']) na URL. Se houver, a função utiliza esse parâmetro para fazer uma consulta no banco de dados para buscar usuários que contenham a informação de busca nos campos id, nome, telefone ou email ($sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or telefone LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC"). Caso contrário, a consulta busca todos os usuários ($sql = "SELECT * FROM usuarios ORDER BY id DESC").

Por fim, a função executa a consulta no banco de dados ($result = $conexao->query($sql)), retornando um objeto que pode ser utilizado para iterar sobre os resultados da consulta e exibir as informações na página e assm retornando para a tela 
