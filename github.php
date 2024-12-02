<?php
$output = shell_exec('git pull origin main 2>&1');


// Slack webhook URL
$webhook_url = 'https://hooks.slack.com/services/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';

// The message you want to send
$message = array(
    'text' => 'A branch has been updated and pulled to the server! Update: '.$output
);

// Use cURL to send the message
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Error sending message to Slack: ' . curl_error($ch);
} else {
    echo 'Message sent successfully.';
}

// Close the cURL session
curl_close($ch);

?>