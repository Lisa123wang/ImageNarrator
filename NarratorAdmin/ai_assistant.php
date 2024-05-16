<?php
// Check if there is a POST request to interact with the AI
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    echo askAI($_POST['message']);
    exit;  // Important to stop further processing since it's an AJAX request
}

// Function to send requests to the AI API
/*
function askAI($prompt) {
    $apiKey = 'API'; // Replace with your actual API key
    $apiUrl = 'https://api.openai.com/v1/chat/completions';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    $data = json_encode([
        'model' => 'gpt-3.5-turbo',  // Specify the model here
        'messages' => [
            ['role' => 'user', 'content' => $prompt]
        ],
        'max_tokens' => 150
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}
*/
function askAI($prompt) {
    $apiKey = 'API'; // Replace with your actual API key
    $apiUrl = 'https://api.openai.com/v1/chat/completions';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    $data = json_encode([
        'model' => 'gpt-3.5-turbo',  // Specify the model here
        'messages' => [
            ['role' => 'user', 'content' => $prompt]
        ],
        'max_tokens' => 150
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $response = json_decode($result, true);
    // Extract the assistant's message
    return $response['choices'][0]['message']['content'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Assistant</title>
    <style>
        #chatbox {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            padding: 5px;
            overflow-y: scroll;
        }
        #inputBox {
            width: 294px;
        }
    </style>
</head>
<body>
    <div id="chatbox"></div>
    <input type="text" id="inputBox" onkeypress="checkEnterKey(event)">
    <button onclick="sendMessage()">Send</button>

    <script>
        function checkEnterKey(event) {
            if (event.keyCode === 13) { // Enter key code
                sendMessage();
            }
        }

        function sendMessage() {
            var inputBox = document.getElementById('inputBox');
            var message = inputBox.value;
            if (!message.trim()) return;
            inputBox.value = ''; // Clear input box

            displayMessage('You: ' + message, 'right');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'ai_assistant.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    displayMessage('AI: ' + this.responseText, 'left');
                }
            };
            xhr.send('message=' + encodeURIComponent(message));
        }

        function displayMessage(message, align) {
            var chatbox = document.getElementById('chatbox');
            var newMessage = document.createElement('p');
            newMessage.style.textAlign = align;
            newMessage.textContent = message;
            chatbox.appendChild(newMessage);
            chatbox.scrollTop = chatbox.scrollHeight; // Scroll to the bottom
        }
    </script>
</body>
</html>
