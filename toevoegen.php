<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
</head>
<?php include("tools/header.php") ?>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image[]" accept="image/*" multiple required>
        <input type="text" name="name" placeholder="Enter name" required>
        <select name="brand" required>
            <option value="Nike">Nike</option>
            <option value="Adidas">Adidas</option>
            <option value="New Balance">New Balance</option>
            <option value="Puma">Puma</option>
            <option value="Vans">Vans</option>
            <option value="Converse">Converse</option>
            <option value="Asics">Asics</option>
        </select>
        <textarea name="description" placeholder="Enter description"></textarea>
        <input type="submit" value="Upload">
    </form>
</body>
</html>