<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");

// Allow only specific methods if needed (GET, POST, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers if needed
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Set the content type to JSON
header("Content-Type: application/json");

echo json_encode([
    'name' => 'Foster Amponsah Asante'
]);
