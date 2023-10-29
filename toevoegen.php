<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" accept="image/*" multiple required>
        <input type="text" name="names[]" placeholder="Enter names" required>
        <textarea name="descriptions[]" placeholder="Enter descriptions"></textarea>
        <input type="submit" value="Upload">
    </form>
</body>
</html>