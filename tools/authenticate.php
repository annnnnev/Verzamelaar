<?php
$db = new SQLite3('../database.sqlite');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, username, password FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);

    $result = $stmt->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo "U bent succesvol ingelogd en word nu doorgestuurd naar de homepagina.";
        ?>
            <script>
                setTimeout(function(){
                    window.location.href="../index.php"
                },2000)
            </script>  
        <?php
    } else {
        echo "U heeft een verkeerde gebruikersnaam of wachtwoord ingevoerd, probeer het opnieuw.";
        ?>
        <script>
                setTimeout(function(){
                    window.location.href="../login.php"
                },2600)
        </script>  
        <?php
    }
}
?>