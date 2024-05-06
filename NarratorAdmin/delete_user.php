<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');

    header('Content-Type: application/json');

    $response = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $userID = $_POST['id'];

        // Prepare the deletion query
        $sql = "DELETE FROM user WHERE userID = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userID);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $response = ['status' => 'success', 'message' => 'User deleted successfully.'];
        } else {
            $response = ['status' => 'error', 'message' => 'Error deleting user.'];
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid request.'];
    }

    echo json_encode($response);
?>
