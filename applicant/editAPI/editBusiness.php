<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

if (isset($_POST['submit'])) {
    $entity_type = $_POST['entity_type'];
    $entity_id = $_POST['entity_id']; 

    $query = mysqli_prepare($conn, "UPDATE business_details SET `entity_type`=? WHERE `entity_id`=?");


    mysqli_stmt_bind_param($query, "si", $entity_type, $entity_id);

    $result = mysqli_stmt_execute($query);


    if ($result) {
        echo "Entity type updated successfully.";
    } else {
        echo "Error updating entity type: " . mysqli_error($con);
    }


    mysqli_stmt_close($query);
}
?>
