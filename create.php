<?php

include __DIR__ . "/connection/connection.php";
$conn = connectToDatabase();

try {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];


        $insert_query = "INSERT INTO contact (name, email, phone) VALUES ('$name', '$email', '$phone')";
        if ($conn->query($insert_query) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Record inserted successfully</div>';
        } else {
            echo '<script>alert("Error insert record: ' . $conn->error . ' ");</script>';
            // echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
        }


        $conn->close();
    }
} catch (Exception $exception) {
    echo '<script>alert("Error insert record: ' . $exception->getMessage() . ' ");</script>';
}
?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DEVELOPMENT</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CONTACT CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insert your Email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Insert your Phone Number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-outline-danger" href="index.php">Return</a>
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>