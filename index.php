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
                    <li class="nav-item">
                        <a class="nav-link active" href="create.php">Add</a>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid my-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Joining Date</th>
                    <th>Last Edited</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include __DIR__ . "/connection/connection.php";
                $conn = connectToDatabase();

                try {

                    $query = "SELECT * FROM contact";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $num = 0;
                        while ($row = $result->fetch_assoc()) {
                            $num = $num + 1;
                            echo '<tr>';
                            echo '<td>' . $num . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['phone'] . '</td>';
                            echo '<td>' . $row['join_date'] . '</td>';
                            echo '<td>' . $row['last_edit'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-info" href="update.php?id=' . $row['id'] . '">Edit</a>';
                            echo '<a class="btn btn-outline-danger" href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\');">Delete</a>';

                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No data found</td></tr>';
                    }

                    $conn->close();
                } catch (Exception $exception) {
                    echo '<script>alert("Error : ' . $exception->getMessage() . ' ");</script>';
                }
                ?>

            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>