
<?php
session_start();
include('includes/config.php');

// Fetch data from the database
$query = mysqli_query($con, "SELECT * FROM business_details");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $tax_doc = !empty($_FILES['document1']['name']) ? $_FILES['document1']['name'] : $row['tax_doc'];
    $csd_doc = !empty($_FILES['document2']['name']) ? $_FILES['document2']['name'] : $row['csd_doc'];
    $ck_doc = !empty($_FILES['document3']['name']) ? $_FILES['document3']['name'] : $row['ck_doc'];

    // Move uploaded files to a permanent location
    if (!empty($_FILES['document1']['name'])) {
        move_uploaded_file($_FILES['document1']['tmp_name'], "upload/" . $tax_doc);
    }
    if (!empty($_FILES['document2']['name'])) {
        move_uploaded_file($_FILES['document2']['tmp_name'], "upload/" . $csd_doc);
    }
    if (!empty($_FILES['document3']['name'])) {
        move_uploaded_file($_FILES['document3']['tmp_name'], "upload/" . $ck_doc);
    }

    // Update the database
    $update_query = "UPDATE business_details SET 
                    tax_doc = ?,
                    csd_doc = ?,
                    ck_doc = ?
                    WHERE business_details_id = ?";
    
    // Prepare the query
    $stmt = mysqli_prepare($con, $update_query);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssi", $tax_doc, $csd_doc, $ck_doc, $row['business_details_id']);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Check if the update was successful
    if (mysqli_affected_rows($con) > 0) {
        // Redirect to myapplications.php
        header('Location: myapplications.php?id=1');
        exit; // Ensure that no further code execution happens after the redirection
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
 <?php include('includes/header.php');?>
    <?php include('includes/sidebar.php');?>
<div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="shift-right">
        <label for="document1">Tax Document:</label><br>
        <input type="file" id="document1" name="document1"><br>
        <label for="document2">CSD Document:</label><br>
        <input type="file" id="document2" name="document2"><br>
        <label for="document3">CK Document:</label><br>
        <input type="file" id="document3" name="document3"><br>
        <input type="submit" name="submit" value="Update Documents">
    </form>
</div>

<style>
    .form-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px; /* Adjust as needed */
    }

    form {
        width: 70%; /* Adjust the width of the form */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .shift-right {
        margin-left: 60px; /* Shifts the form to the right */
    }
</style>
