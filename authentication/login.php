<?php

include_once '../view/header.php';

?>
<body>

<div class="login">
  <div class="form">
    <form class="login-form" action="login.inc.php" method="post">
      <span class="material-icons"><i class="fas fa-user"></i></span>
      <input type="text" name ="name"placeholder="username" required />
      <button type="submit" name="submit">Login</button>
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
    } 
    else if($_GET["error"] == "none") {
        echo "<p>Έχεις συνδεθεί</p>";
    }
    
}
?> 
</div>

</body>
</html>