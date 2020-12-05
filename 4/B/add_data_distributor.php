<?php
require("header.php");
require("koneksi.php");

if (isset($_POST["submit"])) {


    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];



    $query = "INSERT INTO distributor VALUES
                ('$id', '$name', '$address')";

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
                    <input type="text" class="form-control" name="id" id="id" autofocus>
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">NAME</label>
                    </div>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="address">ADDRESS</label>
                    </div>
                    <input type="text" class="form-control" name="address" id="address">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary mt-5" name="submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>

</html>