<?php

	require_once('conexao.php');
	
	$numPorta = '';
	$tipoQuarto = '';
	$valorDiaria = '';
	$status = '';
	$id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$sql = "select * from quartos where id = ".$_GET['id'];
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$numPorta = $dados['numPorta'];
			$tipoQuarto = $dados['tipoQuarto'];
			$valorDiaria = $dados['valorDiaria'];
			$status = $dados['status'];
			$id = $dados['id'];
		}
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulário</title>
        <link rel="stylesheet" href="css/formQuartosStyle.css">
    </head>

    <body>
        <div id="box">
            <form class="formulario" method="post" action="listaQuartos.php"> 
                <h1>Cadastro quartos</h1> 
                
                <input type="hidden" name="id" value="<?= $id; ?>">

                <div class="field">
                    <label for="numPorta">Número da porta:</label>
                    <input type="text" id="numPorta" name="numPorta" placeholder="Digite o número*" required>
                </div>         
         
                <div class="field radiobox">
                    <label id="radio">Tipo do quarto?</label><br>
                    <input type="radio" name="tipoQuarto" id="simples" value="simples" checked><label for="simples">Simples</label>
                    <input type="radio" name="tipoQuarto" id="duplo" value="duplo"><label for="duplo">Duplo</label>
                    <input type="radio" name="tipoQuarto" id="triplo" value="triplo"><label for="triplo">Triplo</label>
                </div>
                <br>

                <div class="field">
                     <label for="valorDiaria">Valor da diária:</label>
                     <input type="number" id="valorDiaria" name="valorDiaria"  placeholder="Valor da diária">
                </div>

                <div class="field radiobox">
                    <label id="radio">Status</label><br>
                    <input type="radio" name="status" id="livre" value="livre" checked><label for="livre">Livre</label>
                    <input type="radio" name="status" id="ocupado" value="ocupado"><label for="ocupado">Ocupado</label>
                    <input type="radio" name="status" id="bloqueado" value="bloqueado"><label for="bloqueado">Bloqueado</label>
                </div>
                <br>
                <input type="submit" name="mensagens" value="Enviar">
            </form>
        </div>
        <p> <a href="index.php">Menu</a></p>

    </body>
</html>

