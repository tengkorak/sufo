<?php
        include '/navbar/indexNavBar.php';
?>

<form class="form-horizontal" action="/sufo/users/login" method="post">

      <input id="UserUid" type="text" name="data[User][uid]" placeholder="User ID">
      <br/><br/>
      <input id="UserPswd" type="password" name="data[User][pswd]" placeholder="Password">
      <br/><br/>
      <input type="submit" class="btn btn-success" value="Login" />

</form>