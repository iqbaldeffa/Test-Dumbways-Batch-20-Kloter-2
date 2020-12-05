<?php
require("header.php");
require("koneksi.php");

function upload()
{
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('masukan gambar terlebih dahulu!!')
        </script>";
        return false;
    }

    $ekstensiGambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarvalid)) {

        echo "<script>
        alert('yang anda upload tidak sesuai!!')
        </script>";
        return false;
    }

    if ($ukuranFile > 2000000) {

        echo "<script>
        alert('gambar terlalu besar!! MAX 2mb')
        </script>";
        return false;
    }


    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

    return $namaFilebaru;
}



$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM product INNER JOIN distributor ON product.id_distributor = distributor.id WHERE product.id=$id");

$data = mysqli_fetch_assoc($query);

if (isset($_POST["submit"])) {

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = 'product_view.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'product_view.php';
        </script>
        ";
    }

    $id = $_POST["id"];
    $name_product = $_POST["name_product"];
    $desc = $_POST["desc"];
    $nutrisi = $_POST["nutrisi"];
    $serving_size = $_POST["serving_size"];
    $id_distributor = $_POST["id_distributor"];
    $photolama = $_POST["photolama"];

    if ($_FILES['photo']['error'] === 4) {

        $photo = $photolama;
    } else {
        $photo = upload();
    }






    $query = "UPDATE product SET
    name_product = '$name_product',
    desc = '$desc',
    nutrisi = '$nutrisi',
    serving_size = '$serving_size',
    id_distributor = '$id_distributor',
    photo = '$photo'
    WHERE id = $id
";
    mysqli_query($conn, $query);
}




?>






<div class="container">
    <div class="row">
        <div class="col">

            <form action="" method="post" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id" value="<?= $data["id"]; ?>">
                <input class="form-control" type="hidden" name="photolama" value="<?= $data["photo"]; ?>">
                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_product">NAME PRODUCT</label>
                    </div>
                    <input type="text" class="form-control" name="name_product" id="name_product" value="<?= $data["name_product"]; ?>" autofocus>
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="desc">DESC</label>
                    </div>
                    <input type="text" class="form-control" name="desc" id="desc" value="<?= $data["desc"]; ?>">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="nutrisi">NUTRISI</label>
                    </div>
                    <input type="text" class="form-control" name="nutrisi" id="nutrisi" value="<?= $data["nutrisi"]; ?>">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="serving_size">SERVING SIZE</label>
                    </div>
                    <input type="text" class="form-control" name="serving_size" id="serving_size" value="<?= $data["serving_size"]; ?>">
                </div>


                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="id_distributor">ID DISTRIBUTOR</label>
                    </div>
                    <input type="text" class="form-control" name="id_distributor" id="id_distributor" value="<?= $data["id_distributor"]; ?>">
                </div>


                <div class="input-group mt-5 ">

                    <label for=" photo">PHOTO</label>
                    <img src="img/<?= $data['photo']; ?>" width="200">
                    <input type="file" name="photo" id="photo">
                </div>

                <button type="submit" class="btn btn-primary mt-5" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</div>


</body>

</html>