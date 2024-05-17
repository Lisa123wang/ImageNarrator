<?php
// summarize.php

// Database connection
$host = 'localhost';
$dbname = 'narratordb_test1';
$username = 'root';
$password = '';
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$videoID = $_POST['videoID'] ?? 1; // Default videoID to 1 if not specified
$userID = $_POST['userID'] ?? 1; // Default userID to 1 if not specified

$query = "SELECT OCRText, imagedescription FROM imagerecognition WHERE videoID = ? AND userID = ?";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ii", $videoID, $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $ocrTexts = [];
    $imageDescriptions = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $ocrTexts[] = $row['OCRText'];
        $imageDescriptions[] = $row['imagedescription'];
    }

    // Concatenate OCR texts and image descriptions
    $ocrSummary = implode(" ", $ocrTexts);
    $imageSummary = implode(" ", $imageDescriptions);

    // Prepare the data to be sent to OpenAI API
    $messages = [
        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
        ['role' => 'user', 'content' => "Summarize the following OCR text: " . $ocrSummary . "\n\nSummarize the following image descriptions: " . $imageSummary]
    ];

    $data = [
        'model' => 'gpt-3.5-turbo', // Adjust model as necessary
        'messages' => $messages,
        'max_tokens' => 300
    ];

    $apiKey = 'API'; // Replace with your OpenAI API key

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = [];
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: Bearer ' . $apiKey;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        $response = json_decode($result, true);

        // Check if the response contains the 'choices' key
        if (isset($response['choices']) && isset($response['choices'][0]['message']['content'])) {
            $summary = $response['choices'][0]['message']['content'];
            //echo "<h3>Summary:</h3>";
            echo "<p>" . htmlspecialchars($summary) . "</p>";
        } else {
            echo 'Error: Unexpected API response';
            echo '<pre>' . htmlspecialchars(json_encode($response, JSON_PRETTY_PRINT)) . '</pre>';
        }
    }

    curl_close($ch);

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the statement: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
