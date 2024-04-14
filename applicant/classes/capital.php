<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

$required_amount = 11500000;
$unencumbered_cash = 2300000;

if (isset($_POST['submit'])) {
    // Retrieve form data
    $c_id = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';

    $required_amount_input = isset($_POST['required_amount']) ? floatval(str_replace(',', '', $_POST['required_amount'])) : 0;
    $unencumbered_cash_input = isset($_POST['unencumbered_cash']) ? floatval(str_replace(',', '', $_POST['unencumbered_cash'])) : 0;
    $income_source_amount = isset($_POST['income_source_amount']) ? floatval(str_replace(',', '', $_POST['income_source_amount'])) : 0;
    $financial_institution = isset($_POST['financial_institution']) ? floatval(str_replace(',', '', $_POST['financial_institution'])) : 0;
    $income_source = $_POST['income_source'];
    $financial_funding = $_POST['financial_funding'];

    // Check if both file upload fields are not empty
    if (!empty($_FILES['income_sourcr_doc']['name']) && !empty($_FILES['letter_intent']['name'])) {
        // File upload handling for income_sourcr_doc
        $income_sourcr_doc = $_FILES['income_sourcr_doc']['name']; // File name
        $income_sourcr_doc_tmp = $_FILES['income_sourcr_doc']['tmp_name']; // Temporary file location
        $letter_intent = $_FILES['letter_intent']['name']; // File name
        $letter_intent_tmp = $_FILES['letter_intent']['tmp_name']; // Temporary file location
        $income_sourcr_doc_destination = '../capitalFinc/' . $income_sourcr_doc; // Destination folder for the uploaded file
        $letter_intent_destination = '../capitalFinc/' . $letter_intent; // Destination folder for the uploaded file

        // Move the uploaded files to the destination folder
        if (move_uploaded_file($income_sourcr_doc_tmp, $income_sourcr_doc_destination) && move_uploaded_file($letter_intent_tmp, $letter_intent_destination)) {
            // Files uploaded successfully
        } else {
            echo "Error uploading files.";
            exit; // Stop further execution
        }
    } else {
        // Handle the case when any of the files are not uploaded
        echo "Please upload both files.";
        exit; // Stop further execution
    }

    // Calculate sum
    $sum = $income_source_amount + $financial_institution;

    if ($sum  >=  $required_amount_input) {
        // Store values in the database
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=petrosadb", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO capital_requirements (required_amount, income_source_amount, financial_institution, income_source, financial_funding, unencumbered_cash, income_sourcr_doc, letter_intent, certificate_id) VALUES (:required_amount, :income_source_amount, :financial_institution, :income_source, :financial_funding, :unencumbered_cash, :income_sourcr_doc, :letter_intent, :c_id)");
            $stmt->bindParam(':required_amount', $required_amount_input);
            $stmt->bindParam(':unencumbered_cash', $unencumbered_cash_input);
            $stmt->bindParam(':income_source_amount', $income_source_amount);
            $stmt->bindParam(':financial_institution', $financial_institution);
            $stmt->bindParam(':income_source', $income_source);
            $stmt->bindParam(':financial_funding', $financial_funding);
            $stmt->bindParam(':income_sourcr_doc', $income_sourcr_doc);
            $stmt->bindParam(':letter_intent', $letter_intent);
            $stmt->bindParam(':c_id', $c_id);
            $stmt->execute();

            // Redirect to the next page
            header("Location: ../land.php");
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Redirect to finance.php with the error message included in the URL
        header("Location: ../finance.php?error=Sorry, you do not meet the requirements, so you cannot proceed with the application.");
        exit;
    }
}
?>