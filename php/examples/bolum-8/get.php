<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        if($_GET) {
            $query = isset($_GET['q']) ? $_GET['q'] : '';
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            
            echo "<ul>";
            echo "<li>" . htmlspecialchars($query) . "</li>";
            echo "<li>" . htmlspecialchars($category) . "</li>";
            echo "</ul>";
        }

    ?>
    
    <form  method="GET">
        <input type="text" name="q">
        <input type="text" name="category">
        <button type="submit">Gönder</button>
    </form>


</body>
</html>