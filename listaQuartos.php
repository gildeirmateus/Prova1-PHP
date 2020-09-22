<?php

	require_once('conexao.php');

	if(isset($_POST['numPorta']) && $_POST['numPorta'] != ""){

		$id = $_POST['id'];
		$numPorta = $_POST['numPorta'];
		$tipoQuarto = $_POST['tipoQuarto'];
		$valorDiaria = $_POST['valorDiaria'];
		$status = $_POST['status'];

		if($id == ""){
			$sql = "insert into quartos (numPorta, tipoQuarto, valorDiaria, status, reg_datahora, alt_datahora)
					values ('$numPorta', '$tipoQuarto', '$valorDiaria', '$status', now(), '')";
		}else{
			$sql = "update quartos set numPorta = '$numPorta', tipoQuarto = '$tipoQuarto', valorDiaria = '$valorDiaria', status = '$status', alt_datahora = NOW()
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $id!=""){
			$_GET['msg'] = 'Dados alterados com sucesso';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao inserir a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
	}
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mensagens Enviadas</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/listaStyle.css">
</head>
<body>
    <h2>Quartos:</h2>

    <table><tr>
        <td><label for="numPorta">Numero do quarto:</label></td>
        <td><label for="tipoQuarto">Tipo do quarto:</label></td>
        <td><label for="valorDiaria">Valor da diária:</label></td>        
        <td><label for="status">Status:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    <tr>
	
	<?php
		$sql = "select id, numPorta, tipoQuarto, valorDiaria, status from quartos ";
			$resultado = mysqli_query($conexao, $sql);

			while($dados = mysqli_fetch_array($resultado)){
				echo '<tr><td>'.$dados['numPorta'].'</td>
					<td>'.$dados['tipoQuarto'].'</td>
					<td>'.$dados['valorDiaria'].'</td>        
					<td>'.$dados['status'].'</td>
					<td>
						<a href="excluirQuartos.php?id='.$dados['id'].'">Excluir</a>
						<a href="formQuartos.php?id='.$dados['id'].'">Alterar</a>
					</td></tr>';
			}

			mysqli_close($conexao);

		?>

    </tr></table>

    <p> <a href="formQuartos.php">Voltar</a></p>
	<p> <a href="index.php">Menu</a></p>

</body>
</html>