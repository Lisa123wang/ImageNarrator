<?php
// Database connection
$host = 'localhost';
$dbname = 'narratordb_test1';
$username = 'root';
$password = '';
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$videoID = $_GET['videoID'] ?? 1; // Default videoID to 1 if not specified
$userID = $_GET['userID'] ?? 1; // Default userID to 1 if not specified

// Fetch video title from the video table
$videoTitleQuery = "SELECT videoTitle FROM video WHERE videoID = ? AND userID = ?";
$videoTitleStmt = mysqli_prepare($connection, $videoTitleQuery);

if ($videoTitleStmt) {
    mysqli_stmt_bind_param($videoTitleStmt, "ii", $videoID, $userID);
    mysqli_stmt_execute($videoTitleStmt);
    $videoTitleResult = mysqli_stmt_get_result($videoTitleStmt);

    if (mysqli_num_rows($videoTitleResult) > 0) {
        $videoTitleRow = mysqli_fetch_assoc($videoTitleResult);
        $videoTitle = $videoTitleRow['videoTitle'];
    } else {
        $videoTitle = "Unknown Title";
    }
    mysqli_stmt_close($videoTitleStmt);
} else {
    $videoTitle = "Unknown Title";
}

// Fetch data for CSV
$query = "SELECT userID, videoID, videoTimestamp, OCRText, imagedescription, aiquestion, dateCreated FROM imagerecognition WHERE videoID = ? AND userID = ? ORDER BY videoTimestamp ASC";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ii", $videoID, $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Set headers to prompt download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data.csv"');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Output the video title
        fputcsv($output, ['Video Title', $videoTitle]);

        // Output the column headings
        fputcsv($output, ['Video Timestamp', 'OCR Text', 'Image Description', 'AI Question', 'Date Created']);

        // Fetch and output the data rows
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, [$row['videoTimestamp'], $row['OCRText'], $row['imagedescription'], $row['aiquestion'], $row['dateCreated']]);
        }

        // Close output stream
        fclose($output);
    } else {
        echo "<p>No data available for the specified video ID.</p>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the statement: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
