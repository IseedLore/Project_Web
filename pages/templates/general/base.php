<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <?php $templateParams["searchicon"]="search-icon.png"; ?>
<body>
    <?php require('header.php'); ?>   
    <?php require($templateParams["page"]); ?>    
    <?php require('footer.php'); ?>

    <script src="../js/script.js"></script>
</body>
</html>
 