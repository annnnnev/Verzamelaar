<?php
$db = new SQLite3('../database.sqlite');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
            $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username, SQLITE3_TEXT);
            $stmt->bindParam(':email', $email, SQLITE3_TEXT);
            $stmt->bindParam(':password', $password, SQLITE3_TEXT);
        
            if ($stmt->execute()) {
                echo "Uw account is aangemaakt, u kunt nu inloggen.";
                ?> 
                <script>
                    setTimeout(function(){
                        window.location.href="../login.php"
                    },2000)
                </script>  
                <?php
            } else {
                echo "Dat ging eventjes fout, probeer het opnieuw.";
                ?>
                    <script>
                        setTimeout(function(){
                            window.location.href="../signup.php"
                        },2000)
                    </script>  
                <?php
            }
        }
    ?>
</body>
</html>