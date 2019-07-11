<?php {
    
    if (isset($_POST['username'])) {
        $uname = $_POST['username'];
        if (!checkUserName()) {
            $_SESSION['umessage'] = 'The username must start with a letter, must be between 8 and 14 chars, can only contain small case alphanumeric, dot, underscore';
            
        }

    } 
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        if (!checkName()) {  
            $_SESSION['nmessage'] = 'error';
        }
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (!checkPhone()) {
            $_SESSION['phmessage'] = 'Must start with +20 then 8 digits for landline, or +20 then 11 digits for cell phones';
        }
    }
    if (isset($_POST['pwd'])) {
        $pwd = $_POST['pwd'];
        if (!checkPassword()) {
            $_SESSION['pmessage'] = 'Must have at least one small, one capital, one number and one symbol ';
        }
    }
    
    
    
    
    function checkUserName()
    {
        if (isset($_POST["username"])) {
            $test = $_POST["username"];
            return (preg_match('/^[a-z][a-z0-9\_\.]{7,14}$/', $test));
            
        }
    }
    
    function checkName()
    {
        if (isset($_POST["name"])) {
            $test = $_POST["name"];
            return (preg_match('/^[a-z ]+$/i', $test));
            
        }
    }
    
    // function checkEmail()
    // {
    //     if (isset($_POST["email"])) {
    //         $test = $_POST["email"];
    //         return (preg_match('/^[a-z][a-z0-9\_\.]{7,14}$/', $test));
            
    //     }
    // }

    function checkPhone()
    {
        if (isset($_POST["phone"])) {
            $test = $_POST["phone"];
            return (preg_match('/\+20(((010|011|012)\d{8})|((2|3)\d{7})|((97|88|13|43|45|50|95|43|96|66|48|93|62|40)\d{6}))/', $test));
            
        }
    }
    
    function checkPassword()
    {
        if (isset($_POST["pwd"])) {
            $test = $_POST["pwd"];
            return (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]/', $test));
            
        }
    }
    
    
    
}

?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Login Form</h2>
        <form class="form-horizontal" id="login_form" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" name="username" placeholder="Enter Username" required value =
                "<?php 
                if (isset($_SESSION['umessage']) || isset($_SESSION["nmessage"]) || isset($_SESSION["phmessage"]) || isset($_SESSION["pmessage"])){
                    echo htmlspecialchars($uname);
                }
                 ?>">
            </div>

            <?php {
                    if (isset($_SESSION['umessage']))
                    {
                        echo $_SESSION['umessage'];
                        unset($_SESSION['umessage']);
                    }
                } ?>




            <div class="form-group">
                <label for="name">Name:</label>
                <input type="username" class="form-control" name="name" placeholder="Enter Name" required value
                ="<?php 
                if (isset($_SESSION['umessage']) || isset($_SESSION["nmessage"]) || isset($_SESSION["phmessage"]) || isset($_SESSION["pmessage"])){
                    echo htmlspecialchars($name);
                }
                 ?>">
            </div>

            <?php {
                    if (isset($_SESSION['nmessage']))
                    {
                        echo $_SESSION['nmessage'];
                        unset($_SESSION['nmessage']);
                    }
                } ?>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required value
                ="<?php 
                if (isset($_SESSION['umessage']) || isset($_SESSION["nmessage"]) || isset($_SESSION["phmessage"]) || isset($_SESSION["pmessage"])){
                    echo htmlspecialchars($email);
                }
                 ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="textarea" class="form-control" name="phone" placeholder="Enter Phone Number" required value
                ="<?php 
                if (isset($_SESSION['umessage']) || isset($_SESSION["nmessage"]) || isset($_SESSION["phmessage"]) || isset($_SESSION["pmessage"])){
                    echo htmlspecialchars($phone);
                }
                 ?>">

            </div>

            <?php {
                    
                    if (isset($_SESSION['phmessage']))
                    {
                        echo $_SESSION['phmessage'];
                        unset($_SESSION['phmessage']);
                    }
                } ?>

           



            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd" placeholder="Enter Password" required value
                ="<?php 
                if (isset($_SESSION['umessage']) || isset($_SESSION["nmessage"]) || isset($_SESSION["phmessage"]) || isset($_SESSION["pmessage"])){
                    echo htmlspecialchars($pwd);
                }
                 ?>">
            </div>

            <?php {
                    if (isset($_SESSION['pmessage']))
                    {
                        echo $_SESSION['pmessage'];
                        unset($_SESSION['pmessage']);
                    }
                } ?>


            <div class="form-group">
                <button type="submit" class="btn btn-default" id="btn">Login!</button>
            </div>
        </form>
        </container>
    </div>



</body>

</html>