<?php

include_once '../view/header.php';

?>

<body>

<div class="login">
  <div class="form">
    <form class="login-form" action="signup.inc.php" method="post">
      <span class="material-icons"><i class="fas fa-sign-in-alt"></i></span>
      <input type="text" name ="name" placeholder="username" required />
      <button type="submit" name="submit">Sign Up</button>
    </form>  
  </div>
</div>
<?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
     else if($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper player name</p>";
    } else if($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong</p>";
    } else if($_GET["error"] == "usernametaken") {
        echo "<p>Username taken</p>";
    }
    else if($_GET["error"] == "none") {
        echo "<p>You have login</p>";
    }
}
?> 


</body>
</html>