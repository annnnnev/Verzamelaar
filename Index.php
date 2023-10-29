<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Revival</title>
    <link rel="shortcut icon" href="shoe_logo.png" type="image/x-icon">

</head>
<body>
    <?php
    include("tools/header.php");
    // data ophalen uit database
    $db = new SQLite3('database.sqlite');
    $result = $db->query('SELECT name, image_paths FROM sneakers ORDER BY RANDOM()');    
    ?>
    <div id="banner">
        <video autoplay muted loop>
            <source src="media/banner.mp4" type="video/mp4" />
        </video> 
    </div>

    <div id="main">
        <!-- <div id="categories">
            <p>Merken</p>
            
            <button>Nike</button>
        </div> -->
        <div class="shoes">

            <?php
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    $name = $row['name'];
                    $imagePath = $row['image_paths'];
            
                    echo '<div class="shoe">';
                    echo '<h2>' . $name . '</h2>';
                    echo '<img src="' . $imagePath . '" alt="' . $name . '">';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>