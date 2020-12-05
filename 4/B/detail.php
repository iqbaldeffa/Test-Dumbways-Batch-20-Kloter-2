<?php
require("header.php");
require("koneksi.php");
$id = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM product INNER JOIN distributor ON product.id_distributor=distributor.id WHERE product.id=$id");

$data = mysqli_fetch_assoc($ambil);


?>



<div class="container">
    <div class="card">
        <div>
            <img src="img/<?= $data["photo"]; ?> ">
        </div>

        <div class="card-body">
            <h2 class="card-title"><?= $data["name_product"]; ?></h2>
            <p class="card-text"><?= $data["desc"]; ?></p>
            <p class="card-text"> NUTRISI : <?= $data["nutrisi"]; ?></p>
            <p class="card-text"> SERVING SIZE : <?= $data["serving_size"]; ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><?= $data["name"]; ?></small>

        </div>

    </div>

</div>
</body>

</html>