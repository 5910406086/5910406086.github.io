<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nisit Kasetsart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php
// define variables 
$firstname = $lastname = $email = $year = $faculty = $tel = "";
$firstnameErr = $lastnameErr = $emailErr = $yearErr = $facultyErr = $telErr = $file1Err = $file2Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if firstname only contains letters
    if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
      $firstname = "";
      $firstnameErr = "Only letters allowed"; 
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if lastname only contains letters
    if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
      $lastname = "";
      $lastnameErr = "Only letters allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $lastname = "";
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
    $year = test_input($_POST["year"]);
  }

  if (empty($_POST["faculty"])) {
    $facultyErr = "faculty is required";
  } else {
    $faculty = test_input($_POST["faculty"]);
  }

  if (empty($_POST["tel"])) {
    $telErr = "Tel is required";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if tel only contains number
    if (!preg_match("/^[0-9]*$/",$tel)) {
      $tel = "";
      $telErr = "Only numeric allowed"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<form method="post" class="contact100-form validate-form" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Nisit Kasetsart
				</span>
            
          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Firstname is required">
            <span class="label-input100">Firstname *</span>
					  <input class="input100" type="text" name="firstname" placeholder="Enter your firstname">
         </div>

          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Lastname is required">			
					  <span class="label-input100">Lastname *</span>
					  <input class="input100" type="text" name="lastname" placeholder="Enter your lastname">
          </div>

          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Faculty is required">
	          <span class="label-input100">Faculty *</span>
            <input list="faculty" name="faculty" class="input100" placeholder="Select your faculty">
            <datalist id="faculty">
              <option <?php if (isset($faculty) && $faculty=="Agriculture") echo "checked";?> value="Agriculture">
              <option <?php if (isset($faculty) && $faculty=="Business Administration") echo "checked";?> value="Business Administration">
              <option <?php if (isset($faculty) && $faculty=="Fisherie") echo "checked";?> value="Fisherie">
              <option <?php if (isset($faculty) && $faculty=="Humanities") echo "checked";?> value="Humanities">
              <option <?php if (isset($faculty) && $faculty=="Science") echo "checked";?> value="Science">
              <option <?php if (isset($faculty) && $faculty=="Engineering") echo "checked";?> value="Engineering">
              <option <?php if (isset($faculty) && $faculty=="Education") echo "checked";?> value="Education">
              <option <?php if (isset($faculty) && $faculty=="Economics") echo "checked";?> value="Economics">
              <option <?php if (isset($faculty) && $faculty=="Architecture") echo "checked";?> value="Architecture">
              <option <?php if (isset($faculty) && $faculty=="Social Sciences") echo "checked";?> value="Social Sciences">
              <option <?php if (isset($faculty) && $faculty=="Veterinary Technology") echo "checked";?> value="Veterinary Technology">
              <option <?php if (isset($faculty) && $faculty=="Veterinary Medicine") echo "checked";?> value="Veterinary Medicine">
              <option <?php if (isset($faculty) && $faculty=="Agro-Industry") echo "checked";?> value="Agro-Industry">
              <option <?php if (isset($faculty) && $faculty=="Environment") echo "checked";?> value="Environment">
            </datalist>
          </div>


          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Year is required">
	          <span class="label-input100">Year *</span>
            <input list="year" name="year" class="input100" placeholder="Select your year">
            <datalist id="year">
              <option <?php if (isset($year) && $year=="1") echo "checked";?> value="1">
              <option <?php if (isset($year) && $year=="2") echo "checked";?> value="2">
              <option <?php if (isset($year) && $year=="3") echo "checked";?> value="3">
              <option <?php if (isset($year) && $year=="4") echo "checked";?> value="4">
            </datalist>
          </div>


          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Email is required">
					  <span class="label-input100">Email *</span>
					  <input class="input100" type="text" name="email" placeholder="Enter your email">
          </div>
				

          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Tel is required">
					  <span class="label-input100">Tel *</span>
					  <input class="input100" type="text" name="tel" placeholder="Enter your tel number">
          </div>
		

          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Image is required">
					  <span class="label-input100">Upload your image *</span>
					  <input class="input100" type="file" name="file1">
          </div>
				

          <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="CSV file is required">
					  <span class="label-input100">Upload your file csv *</span>
					  <input class="input100" type="file" name="file2">
          </div>
			
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
					    <button type="button" onclick="location.href='download.php?file=template.csv'" class="contact100-form-btn wrap-contact100-form-btn">
							  Template
						  </button>
          </div>
          
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
              <button type="submit" name="submit" class="contact100-form-btn">
                Submit
              </button>
          </div>
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
              <button type="submit" name="submit" <?php if (($file1Err != "")||($file2Err != "")||($firstname == "")||($lastname == "")||($email == "")||($year == "")||($faculty == "")||($tel == "")){ ?> disabled <?php   } ?> class="btn btn-info btn-lg contact100-form-btn" data-toggle="modal" data-target="#myModal">
                Result
              </button>
          </div>

			</form>
			<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">INFORMATION</h4>
      </div>
      <div class="modal-body">
        <p style="font-size: 20px; float: left; width: 70%;">
          <?php 
                echo "Firstname : $firstname";
                echo "<br>";
                echo "Lastname : $lastname";
                echo "<br>";
                echo "Email : $email";
                echo "<br>";
                echo "Tel : $tel";
                echo "<br>";
                echo "Year : $year";
                echo "<br>";
                echo "Faculty of : $faculty";
                echo "<br>";
                
          ?>
          <?php
            $fileName = $_FILES['file2']['name'];
            $filePath = "upload/" . $fileName;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
            // Allow certain file formats
            if($fileType != "csv" ) {
              $file2Err = "Sorry, only CSV files are allowed.";
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $file2Err = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["file2"]["tmp_name"], $filePath)) {
                $file2Err ="";
              } else {
                $file2Err = "Sorry, there was an error uploading your file.";
              }
            }
            ?>
         
            <?php
            //read and calculate from file csv
            $row = 1;
            $totalCredit = 0;
            $totalNum = 0;
            $result ;
            if (($handle = fopen("$filePath", "r")) !== FALSE) {
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row !== 1){
                  for ($i=3; $i < $num; $i++) {
                    $totalNum += ($data[$i-1]*$data[$i]);
                    $totalCredit += $data[$i-1];
                    }
                }
                $row++;
              }
              $result = round($totalNum/$totalCredit,2);
              fclose($handle);
            }
            ?>
        <a style="font-size: 40px"> <?php echo "Your Grade is : $result"; ?> </a>
        </p>
        <p style="float: right; width: 30%;">
          <?php
            $fileName = $_FILES['file1']['name'];
            $filePath = "upload/" . $fileName;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["file1"]["tmp_name"]);
                if($check !== false) {
                  $file1Err =  "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
                } else {
                  $file1Err = "File is not an image.";
                  $uploadOk = 0;
                }
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
              $file1Err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $file1Err = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["file1"]["tmp_name"], $filePath)) {
                $file1Err="";
                echo "<img src=".$filePath." height=170 width=170 />";
              } else {
                $file1Err = "Sorry, there was an error uploading your file.";
              }
            }
            ?>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
         
				
		</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
