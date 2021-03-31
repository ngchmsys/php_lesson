<?php
namespace NameTest;

include 'b.php';
require('Foo\Bar.php');
require_once('Foo\Bar.php');
require_once('Foo\Buz.php');

use Foo\Bar;
use Foo\Buz;
use function Foo\Bar\buz;
use const Foo\Bar\FOO;

$bar = new Bar;
echo $bar->getNamespace() . "<br>" . PHP_EOL;

$buz = new Buz("ShopA");
echo $buz->getNamespace() . "<br>" . PHP_EOL;
echo buz() . "<br>" . PHP_EOL;
echo FOO . "<br>" . PHP_EOL;

define('NameTest\FOO', '111');
echo "define:NameTest/FOO: " . \NameTest\FOO . "<br>" . PHP_EOL;
use const NameTest\FOO as NTFOO;
echo "\Foo\Bar\FOO: " . \Foo\Bar\FOO . "<br>" . PHP_EOL;
echo "FOO: " . FOO . "<br>" . PHP_EOL;
echo "NTFOO: " . NTFOO . "<br>" . PHP_EOL;

define('FOO', '222');
echo \FOO . "<br>" . PHP_EOL;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namespace</title>
</head>
<body>
    <ul>
        <li>名前空間の名前は、大文字小文字を区別しない</li>
        <li>名前空間の名前として、 PHP や これらで始まる名前は使用しない</li>
        <li>他のコードより前にファイルの先頭で名前空間を宣言する</li>
        <ul>
            <li>ただし declare キーワードは例外</li>
        </ul>
        <li>完全修飾名(つまり、バックスラッシュで始まる名前) は名前空間の宣言では許されません。 なぜなら、この構成要素は名前空間の相対名として解釈される式だから</li>
    </ul>

    <div>
        <?php
            echo __NAMESPACE__ . PHP_EOL;
            echo 'FOO: ' . FOO . "<br>" . PHP_EOL;
            echo '\FOO: ' . \FOO . "<br>" . PHP_EOL;
        ?>
    </div>
</body>
</html>