<?php
    require_once('conexao.php');
    $id_quarto = '';
    $id_cliente = '';
    $dataEntrada = '';
    $dataSaida = '';
    $valorReserva = '';
    $statusReserva = '';
    $id = '';
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $sql = "select * from reservas where id = " . $_GET['id'];
        $resultado = mysqli_query($conexao, $sql);
        if ($resultado) {
            $dados = mysqli_fetch_array($resultado);
            $id_quarto = $dados['id_quarto'];
            $id_cliente = $dados['id_cliente'];
            $dataEntrada = $dados['dataEntrada'];
            $dataSaida = $dados['dataSaida'];
            $valorReserva = $dados['valorReserva'];
            $statusReserva = $dados['statusReserva'];
            $id = $dados['id'];
        }
    }
?>
<!DOCTYPE html>
    <html lang="pt-br"> 
    <head>
        <title>Formulário</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/formReservaStyle.css">
    </head>
    <body>
        <div>
            <form class="formulario" method="post" action="listaReserva.php">
            <h1>Cadastro reserva</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="field">
            <label for="id_quarto">Número do Quarto:</label>
            <select name="id_quarto" id="id_quarto">
                <?php
                    $sql = "select id, numPorta, valorDiaria, status from quartos ";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_array($resultado)) {
                        if ($dados['status'] == 'livre' || $dados['status'] == 'Livre') {
                        $numPorta = $dados['numPorta'];
                        echo "<option value=" . $dados['id'] . ">" . $numPorta . "</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="field">
            <label for="id_cliente">Nome do Cliente:</label>
            <select name="id_cliente" id="id_cliente">
                <?php
                    $sql = "select id, nome from clientes ";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_array($resultado)) {
                        $nome = $dados['nome'];
                        echo "<option value=" . $dados['id'] . ">" . $nome . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="field">
            <label for="dataEntrada">Data de Entrada:</label>
            <input type="date" id="dataEntrada" name="dataEntrada" value="<?= $dataEntrada; ?>" placeholder="Digite a data de entrada*" required>
        </div>
        <div class="field">
            <label for="dataSaida">Data de Saída:</label>
            <input type="date" id="dataSaida" name="dataSaida" value="<?= $dataSaida; ?>" placeholder="Digite a data de saida*" required>
        </div>
        <div class="field radiobox">
                    <label id="radio">Status</label><br>
                    <input type="radio" name="statusReserva" id="statusReserva" value="reservado" checked><label for="statusReserva" class="reserv">Reservado</label>
                    <input type="radio" name="statusReserva" id="statusReserva" value="checkin"><label for="statusReserva" class="reserv">Checkin</label>
                    <input type="radio" name="statusReserva" id="statusReserva" value="checkout"><label for="statusReserva" class="reserv">Checkout</label>
                    <input type="radio" name="statusReserva" id="statusReserva" value="cancelada"><label for="statusReserva" class="reserv">Cancelada</label>
        </div>
        <input type="submit" name="reservas" value="Enviar">
      </form>
    </div>
    <p> <a href="index.php">Menu</a></p>

  </body>
  </html>