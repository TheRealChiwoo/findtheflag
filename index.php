<?php

$rootDir = realpath(__DIR__);
$requestedPath = isset($_GET['path']) ? $_GET['path'] : '';

// Check if the user requested the specific path /windows-challenge
if ($requestedPath === 'windows-challenge') {
    $filePath = $rootDir . '/index.html';
} else {
    // Handle other requested paths
    if (empty($requestedPath) || strpos($requestedPath, '..') !== false) {
        die("Invalid path!");
    }

    $filePath = $rootDir . '/' . $requestedPath;
}

if (file_exists($filePath) && is_file($filePath)) {
    echo file_get_contents($filePath);
} else {
    die("File not found!");
}

?>