<?php
include __DIR__ . "/connection/connection.php";
$conn = connectToDatabase();

try {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {


        $delete_id = $_GET['id'];

        $query = "DELETE FROM contact WHERE id = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("i", $delete_id);

        if ($statement->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . $statement->error;
        }

        $statement->close();
        $conn->close();
    } else {
        echo "Invalid request.";
    }
} catch (Exception $exception) {
    echo '<script>alert("Error deleting record: ' . $exception->getMessage() . ' ");</script>';
}
