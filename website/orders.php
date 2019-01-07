<?php
include 'header.php';
?>
<html lang="en">
<head>
    <title>Pedidos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
$sql = "select * from dsin.pedidos";
$query = $mysqli->query ($sql);
$pedidos = $query->fetch_all (MYSQLI_ASSOC);

?>

<body>
<br>
<h1 align="center">HISTÓRICO DE PEDIDOS</h1>
<div style="width: 95%; text-align: center; margin-left: 35px">
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID DO PEDIDO</th>
        <th>PRODUTO</th>
        <th>PREÇO</th>
        <th>STATUS</th>
        <th>OPÇÕES</th>
    </tr>
    </thead>

		<?php
		foreach ($pedidos as $pedido):
		?>

    <tr>
        <td><?php echo $pedido['id']?></td>
        <td><?php echo $pedido['product'] ?></td>
        <td><?php echo $pedido['price'] ?></td>
        <td><?php echo $pedido['status'] ?></td>
        <td><a href="view.php?id=<?php echo $pedido['id'] ?>"<i class="fa fa-plus-square" aria-hidden="true"></i></a> &nbsp
            <?php
        if ($pedido['status'] == 'a processar') {
        ?>
        <a href="update.php?id=<?php echo $pedido['id'] ?>"><i class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i></a></td>
            <?php } ?>

        </tr>

	<?php endforeach;
	?>

</table>
</div>
</body>
