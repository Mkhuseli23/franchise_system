
<!DOCTYPE html>
<html>
<head>
	<title>PetroSA</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">

	<style>
		main {
			width: 80%; /* Adjust the width as needed */
			margin: 0 auto; /* Center the main content horizontally */
			margin-left: 20%; /* Shift the main content to the left */
		}

		details {
			border: 1px solid #ccc;
			margin-bottom: 10px;
		}

		summary {
			background-color: #f5f5f5;
			padding: 10px;
			cursor: pointer;
		}

		details[open] summary {
			background-color: #ddd;
		}

		details p {
			padding: 10px;
		}
	</style>
	<style>
 .accordion-container details {
            width: 1100px; /* Adjust this value to set the desired width */
        }
	</style>
<style>
  .button-container {
    display: flex;
    justify-content: flex-end;
  }

  .my-button {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
<style>
  td {
    padding: 12px;
  }
  th {
    padding: 12px;
  }
</style>

</head>
<body>

	<!-- Include your header and sidebar here -->
	<?php include('includes/header.php');?>
	<?php include('includes/sidebar.php');?>

	<main class="accordion-container">
        <details>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM business_details where business_details_id = business_details_id");
            $rowcount = mysqli_num_rows($query);

            if ($rowcount == 0) {
                echo "<h3 style='color:red'>No record found</h3>";
            } else {
                $row = mysqli_fetch_array($query);
           }
            ?>

            <summary>Business Entity Details</summary>
			<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Legal Entity Type:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['entity_type']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Legal Entity Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['entity_name']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Legal Entity Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['entity_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Trading Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['trading_name']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Nature Of Business:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['nature_business']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Physical Address:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['physical_address']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Legal Entity Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['entity_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Phone No:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['phone']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">CSD Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['csd_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">CK Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['ck_number']); ?>.</p>
            </div>
        </div>
    </div>
</div>
<label style="margin-left: 15px; font-weight: bold;">Attachments</label>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Tax Document:</label>            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $id_doc = $row['tax_doc'];
                $filePath = '../applicant/upload/' . $id_doc;

                // Check if the tax document exists
                if (!empty($id_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">CSD Document:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $csd_doc = $row['tax_doc'];
                $filePath = '../applicant/upload/' . $csd_doc;

                // Check if the tax document exists
                if (!empty($csd_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    ?>
                        <a href="<?php echo $filePath; ?>" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;"><?php echo $summary; ?></a>
                    <?php
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: border-radius: 10px; display: flex; justify-content: center; align-items: center; border: none;">CK Document:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $ck_doc = $row['ck_doc'];
                $filePath = '../applicant/upload/' . $ck_doc;

                // Check if the tax document exists
                if (!empty($id_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>


        </details>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM bank_details where 	bank_details_id = 	bank_details_id");
            $rowcount = mysqli_num_rows($query);

            if ($rowcount == 0) {
                echo "<h3 style='color:red'>No record found</h3>";
            } else {
                $row = mysqli_fetch_array($query);
           }
            ?>

        <details class="bank-account-details">
            <summary>Bank Account Details</summary>
            <p>
            <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Account Name:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['account_name']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Bank Institution:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['bank_institution']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Account Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['account_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Branch Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['branch_name']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Branch Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['branch_number']); ?>.</p>
            </div>
        </div>
    </div>
<label style="margin-left: 15px; font-weight: bold;">Attachments</label>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: border-radius: 10px; display: flex; justify-content: center; align-items: center; border: none;">CK Document:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $upload_statement = $row['upload_statement'];
                $filePath = '../applicant/bankstatements/' . $upload_statement;

                // Check if the tax document exists
                if (!empty($upload_statement) && file_exists($filePath)) {
                    $fileName = htmlentities($row['upload_statement']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
            </p>
        </details>

       <details>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM directorsperson where directorsPerson_id  = directorsPerson_id ");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
    ?>
    <summary>Director Information</summary>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Identity No</th>
                <th>Gender</th>
                <th>Disability</th>
                <th>Address</th>
                <th>Share Percent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlentities($row['fname']); ?></td>
                <td><?php echo htmlentities($row['surname']); ?></td>
                <td><?php echo htmlentities($row['identity']); ?></td>
                <td><?php echo htmlentities($row['gender']); ?></td>
                <td><?php echo htmlentities($row['disability']); ?></td>
                <td><?php echo htmlentities($row['address']); ?></td>
                <td><?php echo htmlentities($row['share_percent']); ?></td>
                <td><button class="btn btn-sm btn-success view-btn">View</button></td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <div class="director-info" style="display: none;">
        <!-- Fetch additional director details here from the database and assign them to $rowd -->
        <!-- Example: $rowd = mysqli_fetch_array($query_for_additional_details); -->
        <!-- Replace the placeholders below with actual data -->
        <div class="row">
            <div class="col-md-6 shift-right">
                <div class="city" style="display: flex; align-items: baseline;">
                    <div style="display: flex; align-items: center; margin-right: 20px;">
                        <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Name:</label>
                        <p style="margin: 0;"><?php echo htmlentities($row['fname']); ?>.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 shift-right">
                <div style="display: flex; align-items: center;">
                    <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Surname:</label>
                    <p style="margin: 0;"><?php echo htmlentities($row['surname']); ?>.</p>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">ID Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['identity']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Gender:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['gender']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Disability:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['disability']); ?>.</p>
            </div>
        </div>
    </div> 
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Address:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['address']); ?>.</p>
        </div>
    </div>  
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Share Percentage:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['share_percent']); ?>.</p>
            </div>
        </div>
    </div> 
     
</div>
<br>



<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; background-color: transparent; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Attached ID:</label>                <p style="margin: 0;"> 
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $id_doc = $row['id_doc'];
                    $filePath = '../applicant/directorsInfo/' . $id_doc;

                    // Check if the tax document exists
                    if (!empty($id_doc) && file_exists($filePath)) {
                        $fileName = htmlentities($row['id_doc']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" width="22" height="22">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 118px; height: 30px; margin-left: 15px; background-color: transparent; color: black; border-radius: 5px; display: flex; justify-content: center; align-items: center;">Curriculum Vitae:</label>                <p style="margin: 0;">
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $cvitae = $row['cvitae'];
                    $filePath = '../applicant/directorsInfo/' . $cvitae;

                    // Check if the tax document exists
                    if (!empty($cvitae) && file_exists($filePath)) {
                        $fileName = htmlentities($row['cvitae']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" width="22" height="22">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<br>

<div class="director-info" style="display: none;">
        <!-- Director Information content -->
    </div>
    <?php 
$query = mysqli_query($conn, "SELECT * FROM qualifications WHERE qualifications_id = qualifications_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
    <!-- Qualification Information -->
    <div class="qualification-info" style="display: none;">
    <div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Qualification Information</b>
    <a href="editDirectorDoc.php" style="float: right;">
    </a>
</div>

        <div class="row">
        <div class="panel-body">
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Industry:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['industry']); ?>.</p>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Qualification Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['qualification_name']); ?>.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">NQF Level:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['nqf_level']); ?>.</p>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Year Obtained:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['year_obtained']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: flex-start;">Attach Qualification:</label>
                    <p style="margin: 0;">
                        <?php
                        $attach_qual = $row['attach_qual'];
                        $filePath = '../applicant/directorsInfo/' . $attach_qual;

                        if (!empty($attach_qual) && file_exists($filePath)) {
                            $fileName = htmlentities($row['attach_qual']);
                            $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" width="22" height="22">' . $summary . '</a>';
                        } else {
                            echo '<p>No file uploaded</p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div> 

    <div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 12px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px; width: 98%;">
    <b>Certificate Information</b>
</div>
<br>
<br>
<?php 
$query = mysqli_query($conn, "SELECT * FROM certificates WHERE certificate_id = certificate_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Certificate Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['certificate_name']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Year Obtained: </label>
            <p style="margin: 0;"><?php echo htmlentities($row['year_obtained']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: flex-start;">Attach Certificate:</label>
                <p style="margin: 0;">
                    <?php
                    $attach_cert = $row['attach_cert'];
                    $filePath = '../applicant/directorsInfo/' . $attach_cert;
                    if (!empty($attach_cert) && file_exists($filePath)) {
                        $fileName = htmlentities($row['attach_cert']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" width="22" height="22">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

      
    
</div>
    </div>

    <!-- Next Button -->
    <div style="display: flex; justify-content: flex-end; margin: 50px;">
    <button class="custom-button" onclick="showQualificationPanel()" style="background-color: #2A3989; color: white;">More</button>
</div>




    <!-- JavaScript to toggle visibility -->
    <script>
        function showQualificationPanel() {
            var directorInfo = document.querySelector('.director-info');
            var qualificationInfo = document.querySelector('.qualification-info');
            if (directorInfo.style.display === 'block') {
                directorInfo.style.display = 'none';
                qualificationInfo.style.display = 'block';
            } else {
                directorInfo.style.display = 'none';
                qualificationInfo.style.display = 'block';
            }
        }
    </script>
    <script>
    function showQualificationPanel() {
        var directorInfo = document.querySelector('.director-info');
        var qualificationInfo = document.querySelector('.qualification-info');
        if (directorInfo.style.display === 'block') {
            directorInfo.style.display = 'none';
            qualificationInfo.style.display = 'block';
        } else {
            directorInfo.style.display = 'none';
            qualificationInfo.style.display = 'block';
        }
    }
</script>
<script>
        function showQualificationPanel() {
            var directorInfo = document.querySelector('.director-info');
            var qualificationInfo = document.querySelector('.qualification-info');

            // Toggle between displaying director information and qualification/certificates information
            if (directorInfo.style.display === 'block') {
                directorInfo.style.display = 'none';
                qualificationInfo.style.display = 'block';
            } else {
                directorInfo.style.display = 'block';
                qualificationInfo.style.display = 'none';
            }
        }
    </script>
    <!-- JavaScript to toggle visibility -->
  

        <!-- Include other additional details similarly -->
    </div>
</details>
<script>
        function showQualificationPanel() {
            var qualificationInfo = document.querySelector('.qualification-info');
            if (qualificationInfo.style.display === 'none') {
                qualificationInfo.style.display = 'block';
            } else {
                qualificationInfo.style.display = 'none';
            }
        }
    </script>
<!-- JavaScript to toggle visibility of the hidden details -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to the view button
        document.querySelector('.view-btn').addEventListener('click', function() {
            // Toggle visibility of the director info section
            document.querySelector('.director-info').style.display = 'block';
        });
    });
</script>


    <!-- Include necessary JavaScript files -->
    <script src="assets/js/jquery.min.js"></script>
    <script>
        // Add click event listener to the view button
        document.querySelector('.view-btn').addEventListener('click', function() {
            // Toggle visibility of the director info section
            document.querySelector('.director-info').style.display = 'block';
        });
    </script>
        
        <details>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM capital_requirements where 	capital_requirents_id = capital_requirents_id ");
            $rowcount = mysqli_num_rows($query);

            if ($rowcount == 0) {
                echo "<h3 style='color:red'>No record found</h3>";
            } else {
                $row = mysqli_fetch_array($query);
           }
            ?>
            <summary>Capital Requirements</summary>
            <p>
            <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Requirement Amount:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['required_amount']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">20% unencumbered cash:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['unencumbered_cash']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">80% funding Amount:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['financial_institution']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Financial Funding:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['financial_funding']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Income Source:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['income_source_amount']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Income Source Amount:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['income_source']); ?>.</p>
            </div>
        </div>
    </div>
</div>
<label style="margin-left: 15px; font-weight: bold;">Attachments</label>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Income Source Proof:</label>            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $income_sourcr_doc = $row['income_sourcr_doc'];
                $filePath = '../applicant/capitalFinc/' . $income_sourcr_doc;

                // Check if the tax document exists
                if (!empty($income_sourcr_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['income_sourcr_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Letter OF Intent:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $letter_intent = $row['letter_intent'];
                $filePath = '../applicant/capitalFinc/' . $letter_intent;

                // Check if the tax document exists
                if (!empty($letter_intent) && file_exists($filePath)) {
                    $fileName = htmlentities($row['letter_intent']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    ?>
                        <a href="<?php echo $filePath; ?>" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;"><?php echo $summary; ?></a>
                    <?php
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

            </p>
        </details>
        <details>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM site_information where 	site_information_id = site_information_id ");
            $rowcount = mysqli_num_rows($query);

            if ($rowcount == 0) {
                echo "<h3 style='color:red'>No record found</h3>";
            } else {
                $row = mysqli_fetch_array($query);
           }
            ?>
            <summary>Site And Land Information</summary>
            <p>
            <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Location:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['location']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Business Address:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['business_address']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Latitude:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['attitude_longitude']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Longitude:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['attitude_longitude']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Size Of Land:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['size_land']); ?>.</p>
            </div>
        </div>
    </div> 
</div>
<label style="margin-left: 15px; font-weight: bold;">Attachments</label>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Proof Of Ownership:</label><p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $proof_ownership = $row['proof_ownership'];
                $filePath = '../applicant/siteInfo/' . $proof_ownership;

                // Check if the tax document exists
                if (!empty($proof_ownership) && file_exists($filePath)) {
                    $fileName = htmlentities($row['proof_ownership']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Title Deed:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $title_deed = $row['title_deed'];
                $filePath = '../applicant/capitalFinc/' . $title_deed;

                // Check if the tax document exists
                if (!empty($title_deed) && file_exists($filePath)) {
                    $fileName = htmlentities($row['title_deed']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    ?>
                        <a href="<?php echo $filePath; ?>" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;"><?php echo $summary; ?></a>
                    <?php
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Letter Of Occupation:</label>            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $letter_occupation = $row['letter_occupation'];
                $filePath = '../applicant/capitalFinc/' . $letter_occupation;

                // Check if the tax document exists
                if (!empty($letter_occupation) && file_exists($filePath)) {
                    $fileName = htmlentities($row['letter_occupation']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

            </p>
        </details>
        <details>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM consent where 	consent_id  = consent_id ");
            $rowcount = mysqli_num_rows($query);

            if ($rowcount == 0) {
                echo "<h3 style='color:red'>No record found</h3>";
            } else {
                $row = mysqli_fetch_array($query);
           }
            ?>
            <summary>Consent</summary>
            <p>
            <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">Name:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['fname']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 210px; margin-left: 15px;">Surname:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['surname']); ?>.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 1px; width: 210px; margin-left: 15px;">ID Number:</label>
                <p style="margin: -10;"><?php echo htmlentities($row['identity']); ?>.</p>
            </div>
        </div>
    </div>
</div>
<label style="margin-left: 15px; font-weight: bold;">Attachments</label>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">ID Document:</label><p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $id_doc = $row['id_doc'];
                $filePath = '../applicant/consentd/' . $id_doc;

                // Check if the tax document exists
                if (!empty($id_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['id_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
<div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Financial Statements:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $financial_doc = $row['financial_doc'];
                $filePath = '../applicant/capitalFinc/' . $financial_doc;

                // Check if the tax document exists
                if (!empty($financial_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['financial_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    ?>
                        <a href="<?php echo $filePath; ?>" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;"><?php echo $summary; ?></a>
                    <?php
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">6 Months Bank Statement:</label>            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $bank_statment = $row['bank_statment'];
                $filePath = '../applicant/capitalFinc/' . $bank_statment;

                // Check if the tax document exists
                if (!empty($bank_statment) && file_exists($filePath)) {
                    $fileName = htmlentities($row['bank_statment']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon" style="width: 20px; height: 20px;">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>


            </p>
</details>
<details>
<summary>Approve</summary>

<p>
    <div class="form-start">
        <form action="../endpoint/email.php" method="post">
            <div class="row mb-4">
                <div class="col-lg-3">
                    <label for="statusSelect" class="form-label" style="margin-right: -100px; width: 110px; margin-left: 15px;">Status</label>
                </div>
                <div class="col-lg-9">
                    <select name="status" class="form-select" id="statusSelect">
                        <option value="">Please select</option>
                        <option value="Approve">Approved</option>
                        <option value="Reject">Rejected</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
            </div>

            <label for="statusSelect" class="form-label" style="margin-right: -100px; width: 110px; margin-left: 15px;"><b>New Message</b></label>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="name" style="margin-right: -100px; width: 110px; margin-left: 15px;">To:</label>
                </div>
                <div class="col-lg-9">
                    <input type="email" id="name" name="email" required style="width: 100%; height: 30px;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="email" style="margin-right: -100px; width: 110px; margin-left: 15px;">Subject:</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" id="email" name="subject" required style="width: 100%; height: 30px;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="message" style="margin-right: -100px; width: 110px; margin-left: 15px;">Message:</label>
                </div>
                <div class="col-lg-9">
                    <textarea id="message" name="message" required style="width: 100%; height: 250px; margin: 900;"></textarea>
                </div>
            </div>
            <div class="text-end">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</p>





            </details>

    </main>

</body>
</html>
