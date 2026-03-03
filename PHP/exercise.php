<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excersice</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <br>

    <?php writemsg(); ?>
    <br>
    <h3> NIBATO FAMILY</h3>
    <?php 
    familyname("John", 'herrera', '1998');
    familyname("Carlo", 'herrera', '2000');
    familyname("kevin", 'herrera', '1950'); 
    ?>

    <h3>Height</h3>
    <?php 
    setHeight(350); 
    setHeight();
    setHeight(150);
    ?>

    <h3>SUM</h3>
    <?php echo "the sum of 5 + 10 = " . sum(5,10); ?>
    <br>
    <?php echo "the sum of 12 + 10 = " . sum(12,10); ?>

    <h4>Positive and Negative</h4>
    <?php echo check(5); ?> <br>
    <?php echo check(-5); ?>
</body>
</html>