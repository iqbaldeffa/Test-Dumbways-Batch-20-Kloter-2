<?php
require("header.php");
require("koneksi.php");




if (isset($_POST["submit"])) {





    $name_product = $_POST["name_product"];

    $photos = upload();
    if (!$photos) {
        return false;
    }

    $desc = $_POST["desc"];
    $nutrisi = $_POST["nutrisi"];
    $serving_size = $_POST["serving_size"];
    $id_distributor = $_POST["id_distributor"];


    $query = "INSERT INTO product VALUES
                ('', '$name_product', '$photos', '$desc', '$nutrisi', '$serving_size', '$id_distributor')";

    mysqli_query($conn, $query);
}

function upload()
{
    $namaFile = $_FILES['photos']['name'];
    $ukuranFile = $_FILES['photos']['size'];
    $error = $_FILES['photos']['error'];
    $tmpName = $_FILES['photos']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('masukin gambar terlebih dahulu!!')
        </script>";
        return false;
    }

    $ekstensiGambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar2 = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar2, $ekstensiGambarvalid)) {

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
    $namaFilebaru .= $ekstensiGambar2;

    move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

    return $namaFilebaru;
}



?>






<div class="container">
    <div class="row">
        <div class="col">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_product">NAME PRODUCT</label>
                    </div>
                    <input type="text" class="form-control" name="name_product" id="name_product" autofocus>
                </div>

                <!-- <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="desc">DESC</label>
                    </div>
                    <input type="text" class="form-control" name="desc" id="desc">
                </div> -->

                <div class="form-group mt-5">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="desc">DESC</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                    </div>
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="nutrisi">NUTRISI</label>
                    </div>
                    <input type="text" class="form-control" name="nutrisi" id="nutrisi">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="serving_size">SERVING SIZE</label>
                    </div>
                    <input type="text" class="form-control" name="serving_size" id="serving_size">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="id_distributor">ID DISTRIBUTOR</label>
                    </div>
                    <input type="text" class="form-control" name="id_distributor" id="id_distributor">
                </div>

                <div class="input-group mt-5 ">
                    <label for="photos">PHOTO</label>
                    <input type="file" name="photos" id="photos">
                </div>

                <button type="submit" class="btn btn-primary mt-5" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</div>


</body>

</html>