<?php
// Specify the file path to the Word document
$filePath = 'assets/img/your_word_document.docx';

// Check if the file exists
if (file_exists($filePath)) {
    // Set the appropriate headers for viewing or downloading the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));

    // Output the file content
    readfile($filePath);
} else {
    // File not found
    echo 'File not found.';
}
?>
