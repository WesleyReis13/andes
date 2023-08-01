<?php require_once('../conexao/conexao.php');?>
<?php 
    // Consulta ao Banco de dados - produtos
    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena FROM produtos ";
    if(isset($_GET["produto"])){
        $nome_produto = $_GET["produto"];
        $produtos .= "WHERE nomeproduto LIKE '%{$nome_produto}%' ";
    }
    $resultado = mysqli_query($conecta,$produtos);
    if(!$resultado){
        die("Falha na consulta ao banco");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/produtos.css">
    <link rel="stylesheet" href="../css/produto_pesquisa.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('../_incluir/topo.php');?>
    <?php require_once('../_incluir/funcoes.php');?>
    <?php require_once('../_incluir/rodape.php');?>
    

    <main>
        <div id="janela_pesquisa">
            <form action="listagem.php" method="get">
                <input type="text" name="produto" placeholder="Nome do Produto">
                <input type="image" name="pesquisa" src="../_assets/botao_search.png">
            </form>


        </div>


       <div id = "listagem_produtos">
           
            <?php
                while($linha = mysqli_fetch_assoc($resultado)){
            ?>
                   <ul>
                    <li class = imagem>
                            
                                <a href="detalhe.php?codigo=<?php echo $linha["produtoID"]?>">
                                    <img src="<?php echo $linha["imagempequena"];?>">
                                </a>
                            
                    </li>

                   
                        <li><h3>
                            <?php echo $linha["nomeproduto"];?>
                        </h3></li>
                   
                    <li>Tempo entrega: <?php echo $linha["tempoentrega"];?></li>
                    <li>Preço unitario: <?php echo real_format($linha["precounitario"])?></li>
                   
            </a>
                   </ul>
            <?php
                }
                
            ?>
            
       </div>


    </main>
</body>
</html>
<?php 
    //Fechar conexão
    mysqli_close($conecta);

?>