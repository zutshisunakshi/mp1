<!DOCTYPE HTML>
<html>
<head>
<title>Customer Portal : Image manupulation to b/w</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<style>
 .error {color: #FF0000;}
</style>
</head>
<body>

<div class="container">
  <h2 align="center">Add image to your bucket form</h2>
  <p><span class="error">All are required fields</span></p>
  <form enctype="multipart/form-data" action="Status.php" method="POST">
      E-mail: <input type="text" name="email" placeholder="Please enter your email *">
      <br><br>
      Cellno.: <input type="text" name="phone" placeholder="Please enter your phone no. *">
      <br><br>
      Add this Image file: <input name="userfile" type="file" />
      <br><br>
      <input class="btn btn-success btn-send" type="submit" name="submit" value="Submit">
  </form>
</div>

  <hr />
  <!-- The data encoding type, enctype, MUST be specified as below -->
  <form enctype="multipart/form-data" action="Gallery.php" method="POST">

  View your uploads: <input type="email" name="email">
  <input class="btn btn-success btn-send" type="submit" value="View Gallery" />
  </form>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
