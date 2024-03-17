<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site RPG</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_news.css" rel="stylesheet"/>
    <link href="css/styles_menu.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="carrousel.js" defer></script> -->
</head>
<body>

    <?php 
    try {
        require "header.php" ;
    } catch (\Throwable $th) {
        require "404.html";
    }        
    ?>

    <?php 
    try {
        require "sections/all_sections.php" ;
    } catch (\Throwable $th) {
        require "404.html";
    }        
    ?>
      
    <?php 
    try {
        require "footer.html" ;
    } catch (\Throwable $th) {
        require "404.html";
    }        
    ?>
    
</body>
</html>