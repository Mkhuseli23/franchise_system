<?php
include('includes/header.php');
  

    // Assuming $con is your database connection object

    $query = mysqli_query($conn, "SELECT * FROM tbladmin WHERE id = '$_SESSION[ID]'");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
?>

<!DOCTYPE html>
<html>

<?php include('includes/sidebar.php');?>
<head>
  <title>Applicant Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .applicant-info {
      margin-bottom: 20px;
    }

    .applicant-info label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .applicant-info p {
      margin: 0;
      padding: 0;
    }

    .button-group {
      text-align: center;
      margin-top: 30px;
    }

    .button-group button {
      margin: 0 5px;
    }
  </style>
</head>
<body>
<?php 

$query = mysqli_query($conn, "SELECT * FROM business_details WHERE business_details_id = business_details_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}

?>
  <div class="container">
    <h1>Applicant Information</h1>
    <div class="applicant-info">
      <label for="name">Legal Entity Type:</label>
      <p id="name"><?php echo htmlentities($row['entity_type']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['entity_type']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="name">Legal Entity Name:</label>
      <p id="name"><?php echo htmlentities($row['entity_name']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['entity_name']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="email">Legal Entity Number:</label>
      <p id="name"><?php echo htmlentities($row['entity_number']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['entity_number']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="phone">Trading Name:</label>
      <p id="name"><?php echo htmlentities($row['trading_name']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['trading_name']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="address">Nature Of Business:</label>
      <p id="name"><?php echo htmlentities($row['nature_business']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['nature_business']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="address">Physical Address:</label>
      <p id="name"><?php echo htmlentities($row['physical_address']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['physical_address']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="address">Tax Number:</label>
      <p id="name"><?php echo htmlentities($row['tax_number']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['tax_number']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="address">CSD Number:</label>
      <p id="name"><?php echo htmlentities($row['csd_number']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['csd_number']); ?>"> -->
    </div>
    <div class="applicant-info">
      <label for="address">CK Number:</label>
      <p id="name"><?php echo htmlentities($row['ck_number']); ?></p>
      <!-- <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="<?php echo htmlentities($row['csd_number']); ?>"> -->
    </div>
    <div class="applicant-info">
    <label for="address">CK Number:</label>
    <p id="name"><?php echo htmlentities($row['tax_doc']); ?></p>
    <?php if (!empty($row['tax_doc'])): ?>
        <?php
        $file_path = '../upload/' . $row['tax_doc']; // Assuming 'tax_doc' contains the file name
        ?>
        <a href="<?php echo $file_path; ?>" target="_blank">View File</a>
    <?php else: ?>
        <p>No file uploaded</p>
    <?php endif; ?>
</div>


    <div class="button-group">
      <button>Edit</button>
      <button>Save</button>
      <button>Cancel</button>
    </div>
  </div>
</body>
</html>