<?php

    require_once('conexao.php');

    if (isset($_POST['id_quarto']) && $_POST['id_quarto'] != "") {
    	$id_quarto = $_POST['id_quarto'];
    	$sql = " select valorDiaria from quartos where id = " . $id_quarto .  "";
    	$resultado = mysqli_query($conexao, $sql);
    	$dados = mysqli_fetch_array($resultado);
    	$valorDiaria = $dados['valorDiaria'];
    }

    if (isset($_POST['id_cliente']) && $_POST['id_cliente'] != "") {
        $id = $_POST['id'];
	    $id_cliente = $_POST['id_cliente'];
	    $dataEntrada = $_POST['dataEntrada'];
	    $dataSaida = $_POST['dataSaida'];
	    $diferenca = strtotime($dataSaida) - strtotime($dataEntrada);
	    $dias = floor($diferenca / (60 * 60 * 24));

	    $valorReserva = $dias * $valorDiaria;
	    $statusReserva = $_POST['statusReserva'];
	    $dataHoraStatus = date('Y/m/d H:i');

	    if ($id == "") {
		    $sql = "insert into reservas (id_quarto, id_cliente, dataEntrada, dataSaida, valorReserva, statusReserva, dataHoraStatus )
				    values ('$id_quarto', '$id_cliente', '$dataEntrada', '$dataSaida', '$valorReserva', '$statusReserva', '$dataHoraStatus')
			    ";
	    } else {
            $sql = "update reservas set id_quarto = '$id_quarto', id_cliente = '$id_cliente', dataEntrada = '$dataEntrada',
            dataSaida = '$dataSaida', valorReserva = '$valorReserva', statusReserva = '$statusReserva', 
            dataHoraStatus = '$dataHoraStatus' where id = " . $id;
	    }

	    $resultado = mysqli_query($conexao, $sql);

	    if ($resultado && $id == "") {
	    	$_GET['msg'] = 'Dados inseridos com sucesso';
		    $_POST = null;
	    } elseif ($resultado && $id != "") {
		    $_GET['msg'] = 'Dados alterados com sucesso';
		    $_POST = null;
	    } elseif (!$resultado) {
		    $_GET['msg'] = 'Falha ao inserir a mensagem';
	    }
    }

    if (isset($_GET['msg']) && $_GET['msg'] != "") {
	    echo $_GET['msg'];
    }
?>


<!DOCTYPE html>
    <html lang="pt-br">

    <head>
	    <title>Pousada</title>
	    <meta charset="utf-8" />
	    <link rel="stylesheet" href="css/listaStyle.css">
    </head>

    <body>
        <h2>Reservas:</h2>

	    <table>
		    <tr>
                <td><label for="numPorta">Número do quarto:</label></td>
                <td><label for="nome">Nome do cliente:</label></td>
                <td><label for="dataEntrada">Data de Entrada:</label></td>
                <td><label for="dataSaida">Data de Saída:</label></td>
                <td><label for="valorReserva">Valor da Reserva:</label></td>
                <td><label for="statusReserva">Status da Reserva:</label></td>
                <td><label for="dataHoraStatus">Data/Hora Status da Reserva:</label></td>
                <td><label for="acoes">Ações</label></td>
		    </tr>

            <?php
                $sql = "select r.*, q.numPorta, c.nome from reservas as r left join quartos as q on r.id_quarto = q.id left join clientes as c on r.id_cliente = c.id";
                $resultado = mysqli_query($conexao, $sql);

                while ($dados = mysqli_fetch_array($resultado)) {
                    echo '<tr><td>' . $dados['numPorta'] . '</td>
                        <td>' . $dados['nome'] . '</td>
                        <td>' . $dados['dataEntrada'] . '</td>        
                            <td>' . $dados['dataSaida'] . '</td>
                            <td>' . $dados['valorReserva'] . '</td>
                            <td>' . $dados['statusReserva'] . '</td>
                            <td>' . $dados['dataHoraStatus'] . '</td>
                        <td>
                            <a href="formReserva.php?id='. $dados['id'] .'">Alterar</a>
                        </td></tr>';
                }
                mysqli_close($conexao);
            ?>
        </table>
        <p> <a href="formReserva.php">Voltar</a></p>
        <p> <a href="index.php">Menu</a></p>

    </body>
</html>