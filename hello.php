<!DOCTYPE html>
<html>
<body>

<h1>Welcome to VENUE</h1>
<h2>Where all your dreams come true</h2>
<h3>Please ignore this page for now!!!</h3>
<h3>Just press 'Redirect'</h3>
<br>

<button id="myBtn" style="width:100px;height:30px;">Redirect</button>
  <script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
      document.location.href = 'http://localhost/304_project/home.php';
    });
  </script>
  
  <br>

<h5>You can input stuff and click submit if you really want</h5>
<form action="welcome_get.php" method="get">
Name: <input type="text" name="name"><br>
Password: <input type="text" name="password"><br>
Authority:
<!--<input type="radio" name="auth" value="manager">Manager -->
<input type="radio" name="auth" value="customer">Customer<br>
<input type="submit">
</form>

</body>
</html>