<!DOCTYPE HTML>
<html>
<head>
<title>Customer Portal : Image manupulation to b/w</title>
<style>
 .error {color: #FF0000;}
 /* Style inputs with type="text", select elements and textareas */
 input[type=text], select, textarea {
     width: 100%; /* Full width */
     padding: 12px; /* Some padding */
     border: 1px solid #ccc; /* Gray border */
     border-radius: 4px; /* Rounded borders */
     box-sizing: border-box; /* Make sure that padding and width stays in place */
     margin-top: 6px; /* Add a top margin */
     margin-bottom: 16px; /* Bottom margin */
     resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
 }

 /* Style the submit button with a specific background color etc */
 input[type=submit] {
     background-color: #4CAF50;
     color: white;
     padding: 12px 20px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
 }

 /* When moving the mouse over the submit button, add a darker green color */
 input[type=submit]:hover {
     background-color: #45a049;
 }
</style>
</head>
<body>

<?php
// define variables and set to empty values
$emailErr = $phoneErr = "";
$email = $phone = "";
  $uploadOk = 1;
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format eg:abc@company.com";
      }
    }

    if(empty($_POST["phone"]))
   {
     $phoneErr = "Phone number is required"
    } else {
      $phone = test_input($_POST["phone"]);
      // check if e-mail address is well-formed
      if (!preg_match("/(0[0-9]{9})/,$phone)) {
        $phoneErr = "Invalid phone format eg:8712134322";
      }
   }
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Add image to your bucket!!</h2>
<p><span class="error">* required field.</span></p>
<form enctype="multipart/form-data" action="Status.php" method="POST">

   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Phone No.: <input type="text" name="phone" value="<?php echo $phone;?>">
    <span class="error"><?php echo $phoneErr;?></span>
    <br><br>
   <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Add this Image file: <input name="userfile" type="file" />
    <br><br>
  
    <input type="submit" name="submit" value="Submit">
  </form>


  <hr />
  <!-- The data encoding type, enctype, MUST be specified as below -->
  <form enctype="multipart/form-data" action="Gallery.php" method="POST">

  Enter Email of user for gallery to browse: <input type="email" name="email">
  <input type="submit" value="Load Gallery" />
  </form>



</body>
</html>
