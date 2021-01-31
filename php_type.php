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
        <h1>型</h1>
        <div class="php_output">
            <h2>型変換</h2>
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
        </div>
        <hr>
        <div class="php_output">
            <h2>整数</h2>
            <?php
            echo('INT_SIZE: '.PHP_INT_SIZE.'<br>');
            echo('INT_MIN: '.PHP_INT_MIN.'<br>');
            echo('INT_MAX: '.PHP_INT_MAX.'<br>');
            echo('2進数(0b1010): '.(0b1010).'<br>');
            echo('8進数(012): '.(012).'<br>');
            echo('10進数(10): '.(10).'<br>');
            echo('16進数(0xA): '.(0xA).'<br>');
            echo('27/7: '.(string) (27/7).'<br>');
            $cast_int = (int) (27/7);
            echo('(int) (27/7): '."$cast_int".'<br>');
            echo('round(27/7): '.round(27/7).'<br>');
            ?>
        </div>
        <hr>
        <div class="php_output">
            <h2>文字列</h2>
            <?php
                $name = 'Taro';
                $favo = 'apple';
                $apple = 'リンゴ';

                echo "$name's character at index -1 is \"$name[-1]\".<br>", PHP_EOL;

                echo '$name\'s character at index -1 is "$name[-1]".<br>', PHP_EOL;

                echo <<<EOT
                My name is $name.<br>
                EOT;

                echo <<<'EOD'
                My name is $name.<br>
                EOD;

                echo "${name}です。<br>";
                echo "好きな果物は、${$favo}です。<br>";
            ?>
        </div>
    </main>
    <footer id="footer">
        <small>Copyright&copy;2020 ngchmsys.</small>
    </footer>
</body>
</html>