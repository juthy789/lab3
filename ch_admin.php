<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    if($_POST['username'] == 'juthy' && $_POST['password'] == '14235413')
    {
        header("location: adminzone.php");
    }

    else
        echo "Invalid Username or Password";
}

?>
