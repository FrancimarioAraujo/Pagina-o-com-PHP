<?php
session_start();
?>
<?php
	
	$link = mysqli_connect("localhost", "root", "", "lanchonetedojoao");
 
if (!$link) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 

 


	

?>

<?php
		
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 4;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_lanches = "SELECT * FROM lanche LIMIT $inicio, $qnt_result_pg";
		$resultado_lanches = mysqli_query($link, $result_lanches);
		?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cardapio</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div id="menu">
		<ul>
			<li><a href="entrar.php">Entrar</a></li>
			<li><a href="index.php">Listar Produtos</a></li>
		</ul>
	</div>
	<h2>Lanches</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>PREÇO</th>
		</tr>
		<?php while($row_lanche = $resultado_lanches->fetch_array()){?>
		<tr>
			<td><?php echo $row_lanche['id']?></td>
			<td><?php echo $row_lanche['nome']?></td>
			<td>R$ <?php echo $row_lanche['preco']?></td>
		</tr>
		 <?php } ?>
	</table>

<?php
		
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM lanche";
		$resultado_pg = mysqli_query($link, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>

<?php
		
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 4;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_bebidas = "SELECT * FROM bebida LIMIT $inicio, $qnt_result_pg";
		$resultado_bebidas = mysqli_query($link, $result_bebidas);
		?>
	<h2>Bebidas</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>PREÇO</th>
		</tr>
		<?php while($row_bebida = $resultado_bebidas->fetch_array()){?>
		<tr>
			<td><?php echo $row_bebida['id']?></td>
			<td><?php echo $row_bebida['nome']?></td>
			<td>R$ <?php echo $row_bebida['preco']?></td>
		</tr>
		<?php } ?>
	</table>
<?php
		
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM bebida";
		$resultado_pg = mysqli_query($link, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>
</body>
</html>