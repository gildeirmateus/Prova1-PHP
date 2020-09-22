<?php

	require_once('conexao.php');

	if(isset($_POST['nome']) && $_POST['nome'] != ""){

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$documento = $_POST['documento'];
		$nascimento = $_POST['nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

		if($id == ""){
			$sql = "insert into clientes (nome, documento, nascimento, cidade, estado)
					values ('$nome', '$documento', '$nascimento', '$cidade', '$estado')";
		}else{
            $sql = "update clientes set nome = '$nome', documento = '$documento', nascimento = '$nascimento', cidade = '$cidade', estado ='$estado'
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
    <h2>Clientes:</h2>

    <table><tr>
        <td><label for="nome">Nome:</label></td>
        <td><label for="documento">Documento:</label></td>
        <td><label for="nascimento">Nascimento:</label></td>        
        <td><label for="cidade">Cidade:</label></td>
        <td><label for="estado">Estado:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    <tr>
	
	<?php
		$sql = "select id, nome, documento, nascimento, cidade, estado from clientes ";
			$resultado = mysqli_query($conexao, $sql);

			while($dados = mysqli_fetch_array($resultado)){
				echo '<tr><td>'.$dados['nome'].'</td>
					<td>'.$dados['documento'].'</td>
					<td>'.$dados['nascimento'].'</td>        
					<td>'.$dados['cidade'].'</td>
					<td>'.$dados['estado'].'</td>
					<td>
						<a href="excluirClientes.php?id='.$dados['id'].'">Excluir</a>
						<a href="formCliente.php?id='.$dados['id'].'">Alterar</a>
					</td></tr>';
			}

			mysqli_close($conexao);

		?>
    
    </tr></table>

    <p> <a href="formCliente.php">Voltar</a></p>
	<p> <a href="index.php">Menu</a></p>

</body>
</html>