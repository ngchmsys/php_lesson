<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - 型</title>
</head>
<body>
    <header id="header">
    </header>
    <main id="main">
    <?php
    $one = 1;

    echo("$one".': '.gettype($one).'<br>');
    
    if(is_int($one)) {
        $int_one = $one;
        settype($one, 'string');
    }
    
    echo("$one".': '.gettype($one).'<br>');
    $float_one = (float) $one;
    echo("(float) $float_one".': '.gettype($float_one).'<br>');
    echo("$one".': '.gettype($one).'<br>');
    echo("$int_one".': '.gettype("$int_one").'<br>');    
    echo("$int_one".': '.gettype($int_one).'<br>');    
    ?>
    </main>
    <footer id="footer">
        <small>Copyright&copy;2020 ngchmsys.</small>
    </footer>
</body>
</html>