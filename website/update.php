<?php
include '../website/header.php';

$sql = "select * from dsin.product";
$query = $mysqli->query ($sql);
$products = $query->fetch_all (MYSQLI_ASSOC);


if (!empty($_GET['id'])) {
	$stmt = $mysqli->stmt_init ();
	$stmt->prepare ("select * from dsin.pedidos where id = ?");
	$stmt->bind_param ("i", $_GET['id']);
	$stmt->execute ();
	$result = $stmt->get_result ();
	$pedidos = $result->fetch_array (MYSQLI_ASSOC);
}
if (!empty($_POST)) {

	$produto = $_POST['product'];
	$payment = $_POST['payment'];
	$entrega = $_POST['entrega'];

	$sql = "select price from dsin.product where product = '{$produto}'";
	$query = $mysqli->query ($sql);
	$res = $query->fetch_all (MYSQLI_ASSOC);
	$price = implode(', ', $res[0]);

	if (!empty($pedidos)) {
		$stmt = $mysqli->stmt_init ();
		$stmt->prepare ("update dsin.pedidos set product = ?,price = ?,payment = ?,endereco = ? where id = ?");
		$error = $stmt->error;
		$stmt->bind_param ("sdssd", $produto, $price, $payment, $entrega, $pedidos['id']);
		$error = $stmt->error;
		$stmt->execute ();
		$error = $stmt->error;
	}

	if (empty($error)) {
		?>
        <div class="alert alert-success" role="alert">
            Pedido alterado com sucesso!
        </div>
		<?php
	}
}
?>
<title>Atualizar pedido</title>
<html>
<body>
<h1 align="center">ATUALIZAR PEDIDO</h1>
<div class="div-forms" align="center">
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <h6><span class="label label-default">Escolha seu(s) lanche(s):</span></h6>
		<?php
		foreach ($products as $product):
		?>
        <div class="form-check">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="product" value="<?php echo $product['product'] ?>"><?php echo $product['product'] ?>                <span class="custom-control-indicator"></span>
            </label>
			<?php
			endforeach;
			?>
        </div>

        <h6><span class="label label-default">Agora escolha a forma de pagamento:</span></h6>
        <div class="form-group">
            <select class="form-control" id="payment" name="payment" style="width: 200px">
                <option value="cash">Dinheiro</option>
                <option value="card">Cartão</option>
            </select>
        </div>

        <div class="form-group">
            <h6><span class="label label-default">Preencha o endereço de entrega:</span></h6>
            <input type="text" class="form-control" id="exampleInputEmail1" name="entrega" aria-describedby="emailHelp" style="width: 300px" >
        </div>

        <a href="orders.php"><input class="btn btn-success" type="submit" value="CONFIRMAR PEDIDO"></a>

    </form>