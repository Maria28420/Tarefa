<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas :: Listar</title>

    <?php
    include "referencias.php";
    ?>

</head>

<body>
    <form  action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <h2>Tarefas :: Listar</h2>

                    <div class="form-group">
                        <table>

                            <tr>
                                <td>Descrição</td>
                                <td>Data</td>
                                <td>Prioridade</td>
                                <td>Responsável</td>
                            </tr>
                          <?php
                            //1º Passo: Montar o comando SQL que será executado
                            $sql="SELECT * from tarefa Order by data_entrega desc";
                            //2º Passo: Preparar o comando para ser executado na conexão de dados
                            $comando= $conexao-> prepare($sql);
                            //3º Passo: Executar o comando
                            $comando-> execute();
                            //4º Passo: capturar os resultados trazidos pelo mysql
                            $resultado= $comando->get_result();
                            //5º Passo: Pegar todas as linhas de dados que estão em Resultados
                            while($registro = $resultado->fetch_assoc())
                                {
                                $descricao = $registro["descricao"];
                                $data_entrega = $registro["data_entrega"];
                                $prioridade = $registro["prioridade"];
                                $responsavel = $registro["responsavel"];

                          ?>
                          <tr>
                            <td> <?php echo $descricao ?> </td>
                            <td> <?php echo $data_entrega ?> </td>
                            <td> <?php echo $prioridade?> </td>
                            <td> <?php echo $responsavel?> </td>
                          </tr>
                          <?php } ?>

                        </table>
                    </div>

                    <div class="form-group">

                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">
                                Voltar
                            </button>
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </form>

</body>

</html>