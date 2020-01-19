<?php
	
	require_once 'conexao.php';
	session_start();

	if (!isset($_SESSION['logado'])) {
		header('location:index.php');
	}
	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuario WHERE id = '$id'";
	$resultado = mysqli_query($connect,$sql);
	$dados = mysqli_fetch_array($resultado);


	if (isset($_POST['btnAdicionarLanche'])) {
		$erros = array();
		$nome = mysqli_escape_string($connect,$_POST['nome']);
		$preco = mysqli_escape_string($connect,$_POST['preco']);

		if (empty($nome) or empty($preco)) {
			$erros[] = "<li>O campo nome/preco precisa ser preenchido</li>";
		}
		else{

			$sql = "INSERT INTO lanche(nome,preco) VALUES ('$nome',$preco)";
			$resultado = mysqli_query($connect,$sql);

			if ($resultado) {
				echo "<span>Lanches Inseridos com sucesso!</span>";
			}

			}
			
		}

		if (isset($_POST['btnAdicionarBebida'])) {
		$erros = array();
		$nome = mysqli_escape_string($connect,$_POST['nome']);
		$preco = mysqli_escape_string($connect,$_POST['preco']);

		if (empty($nome) or empty($preco)) {
			$erros[] = "<li>O campo nome/preco precisa ser preenchido</li>";
		}
		else{

			$sql = "INSERT INTO bebida(nome,preco) VALUES ('$nome',$preco)";
			$resultado = mysqli_query($connect,$sql);

			if ($resultado) {
				echo "<span>Bebidas Inseridas com sucesso!</span>";
			}

			}
			
		}

		if (isset($_POST['btnRemoverLanche'])) {
		$erros = array();
		$id = mysqli_escape_string($connect,$_POST['id']);

		if (empty($id)) {
			$erros[] = "<li>O campo id precisa ser preenchido</li>";
		}
		else{

			$sql = "DELETE FROM lanche WHERE id = $id";
			$resultado = mysqli_query($connect,$sql);

			if ($resultado) {
				echo "<span>Lanches Apagados com sucesso!</span>";
			}

			}
			
		}

		if (isset($_POST['btnRemoverBebida'])) {
		$erros = array();
		$id = mysqli_escape_string($connect,$_POST['id']);

		if (empty($id)) {
			$erros[] = "<li>O campo ID precisa ser preenchido</li>";
		}
		else{

			$sql = "DELETE FROM bebida WHERE id = $id";
			$resultado = mysqli_query($connect,$sql);

			if ($resultado) {
				echo "<span>Bebidas Apagadas com sucesso!</span>";
			}

			}
			
		}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Restrita</title>

	<style type="text/css">

		span{
			color: blue;
		}
		h1{
			font-family: 'Arial';
			font-style: italic;
		}
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

		a{
			 background-color: red; /* Green */
			  border: none;
			  color: white;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
		}
	</style>
</head>
<body>

	<h1>Logado como <span><?php  echo $dados['nome']?></span></h1>

	<h2>Cadastrar Lanche</h2>

	<form action="" method="POST">
		Nome:
		<input type="text" name="nome">
		Preço:
		<input type="number" name="preco">
		<button type="submit" name="btnAdicionarLanche">Adicionar ao Cardapio</button>
	</form>

	<h2>Cadastrar Bebida</h2>

	<form action="" method="POST">
		Nome:
		<input type="text" name="nome">
		Preço:
		<input type="number" name="preco">
		<button type="submit" name="btnAdicionarBebida">Adicionar ao Cardapio</button>
	</form>

	<h2>Remover Lanche</h2>

	<form action="" method="POST">
		ID:
		<input type="number" name="id">
		<button type="submit" name="btnRemoverLanche">Remover do Carrinho</button>
	</form>

	<h2>Remover Bebida</h2>

	<form action="" method="POST">
		ID:
		<input type="number" name="id">
		<button type="submit" name="btnRemoverBebida">Remover do Carrinho</button>
	</form><br>
	<a href="logout.php">Sair</a>
</body>
</html>