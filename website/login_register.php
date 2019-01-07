<?php
session_start ();
include '../admin/connection.php';
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login | Registro</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<div class="row" style="border: 0.5px solid #e1e1e1; width: 1120px; margin-left: -65px; margin-top: 70px; height:450px;">
    <div class="login-page" style="margin-left: 60px; margin-top: 0px">
        <div class="form">
            <h4>LOGIN</h4>
            <hr/>
			<?php
			if (isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
            <form action="validate.php" method="post">
                <input type="text" id="login" name="emaillgn" placeholder="Email">
                <input type="password" id="senha" name="senhalgn" placeholder="Senha">
                <input name="enviarlog" type="submit" id="enviar" value="Continuar">
            </form>
        </div>
    </div>
</div>
<div style="margin-left: 570px; margin-top: -358px; width: 400px">
    <div class="form">
        <h4>REGISTRO</h4>
        <hr/>
        <a href="register.php"><input style="margin-top: 30px" type="submit" id="enviar" value="Criar Registro"></a>
    </div>
</div>
</body>
</html>