<?php
require("header.php");
require("koneksi.php");


$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM distributor WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

if (isset($_POST["submit"])) {

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = 'distributor_view.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'distributor_view.php';
        </script>
        ";
    }

    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];



    $query = "UPDATE distributor SET
    id = '$id',
    name = '$name',
    address = '$address'
    WHERE id = $id
";

    mysqli_query($conn, $query);
}

?>


<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="post">

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="id">ID</label>
                    </div>
                    <input type="text" class="form-control" name="id" id="id" value="<?= $data["id"]; ?>" autofocus>
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">NAME</label>
                    </div>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $data["name"]; ?>">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="address">ADDRESS</label>
                    </div>
                    <input type="text" class="form-control" name="address" id="address" value="<?= $data["address"]; ?>">
                </div>

                <div>
                    <button class="btn btn-primary mt-5" type="submit" name="submit" onclick="return confirm('ingin mengubah data ini?');">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>