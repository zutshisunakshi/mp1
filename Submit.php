<!DOCTYPE HTML>
<html>
<head>
<title>Customer Portal : Image manupulation to b/w</title>
<style>
 .error {color: #FF0000;}
</style>
</head>
<body>


<h2>Add image to your bucket!!</h2>
<p><span class="error">* required field.</span></p>
<form enctype="multipart/form-data" action="Status.php" method="POST">
    E-mail: <input type="text" name="email">
    <br><br>
    Phone No.: <input type="text" name="phone">
    <br><br>
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
