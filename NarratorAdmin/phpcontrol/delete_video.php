<?php
include '../pages-video.php'; // Your PDO database connection script

$videoID = $_POST['videoID'];

if(isset($videoID)) {
    $stmt = $pdo->prepare('DELETE FROM video WHERE videoID = :videoID');
    if($stmt->execute(['videoID' => $videoID])) {
        echo json_encode(['message' => 'Video deleted successfully']);
    } else {
        echo json_encode(['message' => 'Error deleting video']);
    }
} else {
    echo json_encode(['message' => 'Video ID not provided']);
}
?>
