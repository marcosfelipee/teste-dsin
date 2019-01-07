<?php
include '../admin/connection.php';
include 'header.php';
if (!empty($_POST)) {
	$name = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$address = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cep = $_POST['cep'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$stmt = $mysqli->stmt_init ();
	$stmt->prepare ("INSERT INTO dsin.clientes (name,cpf,address,bairro,cep,email,password) VALUES (?,?,?,?,?,?,?)");
	echo $mysqli->error;
	$stmt->bind_param ("sssssss", $name, $cpf, $address, $bairro, $cep, $email, $senha);
	echo $mysqli->error;
	$id = $stmt->insert_id;
	$stmt->execute ();
	echo $mysqli->error;

	if (empty($error)) {
		?>
        <br>
        <div class="alert alert-success" role="alert">
            Cadastro realizado com sucesso!
        </div>
		<?php
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<br>
<div class="div-forms" align="center">
    <form action="register.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="width: 400px">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" style="width: 400px">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="cpf" maxlength="14" placeholder="CPF"
                   OnKeyPress="formatar('###.###.###-##', this)"
                   style="width: 400px">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="nome" maxlength="75" placeholder="Nome Completo"
                   style="width: 400px">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="cep" maxlength="9" placeholder="CEP"
                   OnKeyPress="formatar('#####-###', this)"
                   style="width: 400px">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="bairro" placeholder="Bairro"
                   style="width: 400px">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="endereco" placeholder="Endereço"
                   style="width: 400px">
        </div>
        <input type="submit" class="btn btn-primary" name="enviar" style="width: 200px">
    </form>

	<?php
	?>
</div>
<script>
	function formatar(mascara, documento) {
		var i = documento.value.length;
		var saida = mascara.substring(0, 1);
		var texto = mascara.substring(i)

		if (texto.substring(0, 1) != saida) {
			documento.value += texto.substring(0, 1);
		}

	}

</script>
</body>

</html>