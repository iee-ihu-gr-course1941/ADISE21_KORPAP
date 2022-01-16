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
  <?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "<p>Παρακαλώ συμπληρώστε το πεδίο</p>";
        }
     else if($_GET["error"] == "invaliduid") {
        echo "<p>Διαλέξτε ένα κατάλληλο όνομα</p>";
    } else if($_GET["error"] == "stmtfailed") {
        echo "<p>Κάτι πήγε στραβά, προσπαθήστε ξανα</p>";
    } else if($_GET["error"] == "usernametaken") {
        echo "<p>Το όνομα αυτό υπάρχει</p>";
    }
    else if($_GET["error"] == "none") {
        echo "<p>You have login</p>";
    }
}
?> 
</div>



</body>
</html>