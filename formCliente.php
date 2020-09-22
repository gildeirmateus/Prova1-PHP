<?php

require_once('conexao.php');

    $nome = '';
    $documento = '';
    $nascimento = '';
    $cidade = '';
    $estado = '';
    $id = '';

    if (isset($_GET['id']) && $_GET['id'] != "") {
        $sql = "select * from clientes where id = " . $_GET['id'];
        $resultado = mysqli_query($conexao, $sql);
        if ($resultado) {
            $dados = mysqli_fetch_array($resultado);
            $nome = $dados['nome'];
            $documento = $dados['documento'];
            $data_nascimento = $dados['nascimento'];
            $cidade = $dados['cidade'];
            $estado = $dados['estado'];
            $id = $dados['id'];
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/formClienteStyle.css">
</head>
<body>
    <div id="box">
        <form class="formulario" method="post" action="listaCliente.php"> 
            <h1>Cadastro cliente</h1> 
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="field">
                   <label for="nome">Nome completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome*" required>
            </div>              
            <div class="field">
                <label for="documento">Documento:</label>
                <input type="text" id="documento" name="documento" placeholder="Digite o CPF ou RG" required>
            </div>

            <div class="field">
                 <label for="nascimento">Data de nascimento:</label>
                 <input type="date" id="nascimento" name="nascimento"  placeholder="Digite a data de nascimento">
            </div>

               <div class="field">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Digite a cidade" required>
            </div>

            <div class="field">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Digite o estado" required>
            </div>
            <br>
            <input type="submit" name="listaCliente" value="Enviar">
        </form>
   </div>
   <p> <a href="index.php">Menu</a></p>
</body>
</html>