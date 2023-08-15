<?php
//check button click
if(isset($_POST['btn_login'])){
//assign error to $erro array
$err = [];
if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email']) ){
    $username = $_POST['uername'];
}else{
    $err['username'] = 'Please enter username';
}
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Login Page</h1>
    <form action="" method="POST" id="login_form">
    <fieldset>
<legend>login Form</legend>
<div class="form_group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <?php if (isset($err['email'])){?>

<?php echo $err['email']  ?>
     <?php }?>

</div>
<div class="form_group">
    <label for="Email">Password</label>
    <input type="password" name="password" id="password">

</div>
<div class="form_group">

    <input type="submit" name="btn_login" id="Login" value="Login ">

    <input type="reset" name="btn_reset" id="Reset" value="Reset">
</div>


    </fieldset>
</form>

</body>
</html>