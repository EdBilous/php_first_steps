<?php require_once 'functions.php'; ?>
<?php $result = calc(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тег FORM</title>
    </head>

    <body>

        <form action="/" method="POST">
            <p><b>Custom calc</b></p>
            <p><input type="number" name="val1" value="<?php echo isset($_POST['val1'])? $_POST['val1'] : ''; ?>"><Br></p>
            <p><input type="radio" name="operand" value="*">*<Br>
                <input type="radio" name="operand" value="/">/<Br>
                <input type="radio" name="operand" value="+">+</Br>
                <input type="radio" name="operand" value="-">-</p>
            <p><input type="number" name="val2" value="<?php echo isset($_POST['val2'])? $_POST['val2'] : ''; ?>"><Br></p>
            <p><input type="submit"></p>
        </form>
        <p>Result: <?php echo $result; ?></p>

    </body>
</html>