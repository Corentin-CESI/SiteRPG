<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site RPG</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo&display=swap"> -->
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/arimo_font.css"rel="stylesheet"/>
</head>
<body>

    <?php 
    try {
        require "header.html" ;
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