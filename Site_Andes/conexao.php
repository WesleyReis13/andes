<?php 
  require_once("../conexao/conexao.php");

    // Passo 3
    $consulta_produtos = "SELECT nomeproduto, precounitario, tempoentrega From produtos";
    $produtos = mysqli_query($conecta, $consulta_produtos);

    if(!$produtos){
        die("Falha na consulta ao banco de dados");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
              <ol>
                  
                      <?php while($registro = mysqli_fetch_assoc($produtos)){?>
                            
                            <li><?php echo $registro["nomeproduto"]?></li>
                          
                          
                          <?php }
                            mysqli_free_result($produtos);
                          
                          ?>
              </ol>   
</body>
</html>
<?php 
    mysqli_close($conecta)

?>