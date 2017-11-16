
<?php
session_start();
?>
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
<script>
function check(o) {
    v=o.value.replace(/^\s+|\s+$/,''); // remove any whitespace
    if(o=='') {
        return;
    }
    v=v.substr(v.length-1);
    if(v.match(/\d/g)==null) {
        o.value=o.value.substr(0,o.value.length-1).replace(/^\s+|\s+$/,'');
    }
}

function emailcheck(o) {
    var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(o.value);
    if(!re) {
      $('#error').show();
    } else {
     $('#error').hide();
    }
}
</script>
</head>
<body>

<div class="container">
  <h2 align="center">Add image to your bucket form</h2>
  <p><span class="error">All are required fields</span></p>
  <form enctype="multipart/form-data" action="Status.php" method="POST">
  Email ID <input type="text" onkeyup="emailcheck(this)" maxlength="50" id="txtEmail" name="txtEmail" placeholder="Enter email...">
    <span id="error" style="display:none;color:red;">Wrong email</span>
      <br><br>
 Cell no. <input type="text" maxlength="10" onkeyup="check(this)" name="phone" placeholder="Enter phone no...">
      <br><br>

<input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <input name="userfile" type="file" />
      <br><br>
<input class="btn btn-success btn-send" type="submit" name="submit" value="Submit">
</div>

  <hr>

<div class="container">
  <!-- The data encoding type, enctype, MUST be specified as below -->
  <form enctype="multipart/form-data" action="Gallery.php" method="POST">

  View your uploads: <input type="email" name="txtEmail" onkeyup="emailcheck(this)" maxlength="50">
  <input class="btn btn-success btn-send" type="submit" value="View Gallery" />
  </form>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
