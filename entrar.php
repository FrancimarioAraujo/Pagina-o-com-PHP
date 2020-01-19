<?php
	
	require_once 'conexao.php';

	session_start();

	if (isset($_POST['btn-entrar'])) {
		$erros = array();
		$login = mysqli_escape_string($connect,$_POST['login']);
		$senha = mysqli_escape_string($connect,$_POST['senha']);

		if (empty($login) or empty($senha)) {
			$erros[] = "<li>O campo login/senha precisa ser preenchido</li>";
		}
		else{

			$sql = "SELECT nome FROM usuario WHERE nome = '$login'";
			$resultado = mysqli_query($connect,$sql);

			if (mysqli_num_rows($resultado) > 0) {
				$sql = "SELECT * FROM usuario where nome = '$login' AND senha = '$senha'";
				$resultado = mysqli_query($connect,$sql);
				if (mysqli_num_rows($resultado) == 1) {
					$dados = mysqli_fetch_array($resultado);
					$_SESSION['logado'] = true;
					$_SESSION['id_usuario'] = $dados['id'];
					header('location:home.php');
				}
				else{
					$erros[] = "<li>Usuario e senha não conferem!</li>"; 
				}
			}
			else{
				$erros[] = "<li> Usuario inexistente</li>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<style type="text/css">
		input{
			 width: 100%;
  			padding: 12px 20px;
  			margin: 8px 0;
  			box-sizing: border-box;
		}
		button{
			 background-color: #4CAF50; /* Green */
			  border: none;
			  color: white;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

	<div id="menu">
		<ul>
			<li><a href="entrar.php">Entrar</a></li>
			<li><a href="index.php">Listar Produtos</a></li>
		</ul>
	</div>
	<h2>Login</h2>
	<?php
		if (!empty($erros)) {
			foreach ($erros as $erro) {
				echo $erro;
			}
		}
	?>
	<hr>
	<form action="" method="POST">
		Login:
		<input type="text" name="login">
		Senha:
		<input type="password" name="senha">
		<button type="submit" name="btn-entrar">Entrar</button>
	</form>
</body>
</html>