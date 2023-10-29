<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];

    $uploadDirectory = 'uploads/';
    
    if (isset($_FILES['image']) && is_array($_FILES['image']['name'])) {
        $imagePaths = [];

        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
            $uploadedFile = $uploadDirectory . basename($_FILES['image']['name'][$i]);

            if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadedFile)) {
                $imagePaths[] = $uploadedFile;
            }
        }

        if (!empty($imagePaths)) {
            $db = new SQLite3('database.sqlite');

            // Insert the content into the database, linking it to the user and the file paths
            $stmt = $db->prepare("INSERT INTO sneakers (user_id, name, brand, description, image_paths) VALUES (:user_id, :name, :brand, :description, :image_paths)");
            $stmt->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
            $stmt->bindValue(':name', $name, SQLITE3_TEXT);
            $stmt->bindValue(':brand', $brand, SQLITE3_TEXT);
            $stmt->bindValue(':description', $description, SQLITE3_TEXT);
            $stmt->bindValue(':image_paths', implode(",", $imagePaths), SQLITE3_TEXT);

            if ($stmt->execute()) {
                echo "Het uploaden is gelukt!";
                ?>
                <script>
                    setTimeout(function(){
                        window.location.href="../login.php"
                    },1500)
                </script>  
                <?php
            } else {
                echo "Er is iets fout gegaan met de database. Probeer het opnieuw.";
            }
        } else {
            echo "Er is iets fout gegaan met het uploaden van de afbeeldingen. Probeer het opnieuw.";
        }
    } else {
        echo "Er is niks geupload, selecteer een afbeelding.";
    }
} else {
    echo "Log opnieuw in om verder te gaan";
    header("Location: login.php");
    exit();
}
?>
