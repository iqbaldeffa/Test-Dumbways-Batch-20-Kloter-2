<?php
require("header.php");
require("koneksi.php");




$ambil = mysqli_query($conn, "SELECT * FROM distributor INNER JOIN product WHERE distributor.id=product.id_distributor");

?>




<div>

    <?php

    while ($data = mysqli_fetch_assoc($ambil)) :
    ?>

</div>

<div class="container">
    <div class="row float-left ml-5">
        <div class="col">
            <div class="card mt-5 " style="width: 18rem;">
                <img src="img/<?= $data["photo"]; ?>" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title"><?= $data["name_product"]; ?></h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $data["name"]; ?></li>

                </ul>

                <div class="card-body m-auto">
                    <a type="submit" class="btn btn-primary" name="submit" href="detail.php?id=<?= $data['id'] ?>">DETAIL</a>

                    <a type="submit" class="btn btn-primary" name="submit" href="edit_product.php?id=<?= $data['id'] ?>">EDIT</a>

                    <a type="submit" class="btn btn-primary" name="submit" href="delete_product.php?id=<?= $data['id'] ?>" onclick="return confirm('ingin menghapus data ini?');">DELETE</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>



<?php endwhile; ?>







</body>

</html>