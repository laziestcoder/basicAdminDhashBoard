<?php 

require_once("includes/init.php");

if($session->is_signed_in()) {
 redirect("index.php");
}






if(isset($_POST['submit'])) {
    
 $username = trim($_POST['username']);
 $password = trim($_POST['password']);
 
/// Method to check database user
    
$user_found = User::verify_user($username, $password);    
     
    
    
if($user_found) {
    
 $session->login($user_found);
 redirect("index.php");
    
} else {
    
  $the_message = "Your password or username are incorrect";  
    
}
    
    
}
else {
    
  $username = "";
  $password = "";
  $the_message = "";
    
}




?>
<?php require_once("includes/header.php"); ?>
<div class="col-md-4 col-md-offset-3">
    
    <h4 class="bg-danger"><?=$the_message?></h4>
    <form action="" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?=htmlentities($username)?>">
    </div>
    <div class="form-group">
        <label for="username">Password</label>
        <input type="password" class="form-control" name="password" value="<?=htmlentities($password)?>">
    </div>
    
     <div class="form-group">
       <input type="submit" name="submit" value="Submit" class="btn">    
     </div>
    
    </form>
    </div>
