<header>

    <div id="header_central">
     <?php 
        if(isset($_SESSION["user_portal"])){
        
        $user = $_SESSION["user_portal"];
        $saudacao = "SELECT nomecompleto FROM clientes WHERE clienteID = {$user}";
        $saudacao_login = mysqli_query($conecta,$saudacao);
        if(!$saudacao_login){
            die("Falha no Banco de dados");
        }

        $saudacao_login = mysqli_fetch_assoc($saudacao_login);
        $nome = $saudacao_login["nomecompleto"];
     ?>
        <div id="header_saudacao">
            <h5>Seja bem vindo, <?php echo $nome?> | <a href="logout.php"> Sair </a></h5>

        </div>
     <?php 
        }
     
     
     ?>
        <img src="/avancado/public/_assets/logo_andes.gif">
        <img src="/avancado/public/_assets/text_bnwcoffee.gif">
    </div>
</header>