<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
</head>
<body>
    <?php require('header.php'); ?>   
    <?php require($templateParams["page"]); ?>    
    <?php require('footer.php'); ?>

    <script src="../js/script.js"></script>
</body>
</html>
 