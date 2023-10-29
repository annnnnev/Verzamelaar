<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Check if files were uploaded
if (isset($_FILES['images'])) {
    $user_id = $_SESSION['user_id'];

    // Connect to the database
    $db = new SQLite3('your_database.sqlite');

    // Loop through each uploaded file
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $uploadedFile = $tmp_name;
        $name = $_POST['names'][$key];
        $description = $_POST['descriptions'][$key];

        // Check if the file is an image
        if (exif_imagetype($uploadedFile)) {
            // Prepare an INSERT statement
            $stmt = $db->prepare("INSERT INTO user_images (user_id, name, description, image_data) VALUES (:user_id, :name, :description, :image_data)");

            // Bind the user ID
            $stmt->bindValue(':user_id', $user_id, SQLITE3_INTEGER);

            // Bind the name and description
            $stmt->bindValue(':name', $name, SQLITE3_TEXT);
            $stmt->bindValue(':description', $description, SQLITE3_TEXT);

            // Bind the image data
            $imageData = file_get_contents($uploadedFile);
            $stmt->bindParam(':image_data', $imageData, SQLITE3_BLOB);

            // Execute the statement for each image
            if ($stmt->execute()) {
                echo "Image uploaded successfully!";
            } else {
                echo "Error uploading an image to the database.";
            }
        } else {
            echo "File is not a valid image.";
        }
    }
} else {
    echo "No files were uploaded.";
}
?>
