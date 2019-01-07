<?php
include '../website/header.php';

$sql = "select * from dsin.pedidos where id = $_GET[id]";
$query = $mysqli->query ($sql);
$pedidos = $query->fetch_all (MYSQLI_ASSOC);

?>

<title>Detalhes do pedido</title>
<html>
<body>
<?php
foreach ($pedidos as $pedido):
?>
<br>
<h1 align="center">Pedido -  Nº: <?php echo $pedido['id'] ?></h1>
<br>
    <div class="card text-white bg-info mb-3" style="max-width: 200px; margin-left: 200px" align="center">
        <div class="card-header">Produto</div>
        <div class="card-body">
            <p class="card-text"><?php echo $pedido['product'] ?></p>
        </div>
    </div>
    <div class="card text-white bg-info mb-3" style="max-width: 200px; margin-left: 450px; margin-top: -143px" align="center">
        <div class="card-header">Preço</div>
        <div class="card-body">
            <p class="card-text">R$ <?php echo $pedido['price'] ?></p>
        </div>
    </div>
    <div class="card text-white bg-info mb-3" style="max-width: 200px; margin-left: 700px; margin-top: -143px" align="center">
        <div class="card-header">Endereço</div>
        <div class="card-body">
            <p class="card-text"><?php echo $pedido['endereco'] ?></p>
        </div>
    </div>
    <div class="card text-white bg-info mb-3" style="max-width: 200px; margin-left: 950px; margin-top: -143px" align="center">
        <div class="card-header">Status</div>
        <div class="card-body">
            <p class="card-text"><?php echo $pedido['status'] ?></p>
        </div>
    </div>

<?php endforeach; ?>