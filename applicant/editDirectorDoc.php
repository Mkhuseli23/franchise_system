<?php

include('includes/config.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $id_doc = !empty($_FILES['document1']['name']) ? $_FILES['document1']['name'] : '';
    $cvitae = !empty($_FILES['document2']['name']) ? $_FILES['document2']['name'] : '';

    // Move uploaded files to a permanent location and update the database
    if (!empty($id_doc) || !empty($cvitae)) {
        // Prepare the update query
        $update_query = "UPDATE directorsperson SET 
                        id_doc = ?,
                        cvitae = ?
                        WHERE directorsperson_id = ?";

        // Prepare the query
        $stmt = mysqli_prepare($con, $update_query);

        // Assuming you have a way to determine the directorsperson_id
        $directorsperson_id = 1; // Replace this with the appropriate value

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssi", $id_doc, $cvitae, $directorsperson_id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Move uploaded files to a permanent location
            if (!empty($_FILES['document1']['name'])) {
                move_uploaded_file($_FILES['document1']['tmp_name'], "directorsInfo/" . $id_doc);
            }
            if (!empty($_FILES['document2']['name'])) {
                move_uploaded_file($_FILES['document2']['tmp_name'], "directorsInfo/" . $cvitae);
            }

            // Redirect to myapplications.php
            header('Location: myapplications.php?id=1');
            exit; // Ensure that no further code execution happens after the redirection
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "No files uploaded.";
    }
}
?>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="shift-right">
        <label for="document1">Attached ID:</label><br>
        <input type="file" id="document1" name="document1"><br>
        <label for="document2">Curriculum Vitae:</label><br>
        <input type="file" id="document2" name="document2"><br>
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
