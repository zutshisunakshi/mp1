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

function checkEmail() {

    var email = document.getElementById('Email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}
</script>
</head>
<body>

<div class="container">
  <h2 align="center">Add image to your bucket form</h2>
  <p><span class="error">All are required fields</span></p>
  <form enctype="multipart/form-data" action="Status.php" method="POST">
    <div>  Email ID <input id="Email" type="text" name="email" placeholder="Enter email..."></div>
      <br><br>
    <div>  Cell no. <input type="text" maxlength="10" onkeyup="check(this)" name="phone" placeholder="Enter phone no..."></div>
      <br><br>
    <div>  <input name="userfile" type="file" /></div>
      <br><br>
    <div>  <input class="btn btn-success btn-send" type="submit" name="submit" value="Submit" onclick='Javascript:checkEmail();'></div>
</div>

  <hr>

<div class="container">
  <!-- The data encoding type, enctype, MUST be specified as below -->
  <form enctype="multipart/form-data" action="Gallery.php" method="POST">

  View your uploads: <input id="Email" type="email" name="email">
  <input class="btn btn-success btn-send" type="submit" value="View Gallery" onclick='Javascript:checkEmail();'/>
  </form>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
