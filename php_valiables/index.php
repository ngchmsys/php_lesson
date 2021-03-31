<?php
namespace PHPLesson\Variables;

$foo = 'bar';
$bar = &$foo;

echo gettype($bar) . "<br>" . PHP_EOL;
echo $bar . "<br>" . PHP_EOL;

$a = 'hello';
$$a = 'world';

echo $a . "<br>" . PHP_EOL;
echo $$a . "<br>"  . PHP_EOL;
echo "$a ${$a} <br>" . PHP_EOL;

print_r($_POST);


define("APP_VER", "1.0");

class MyClass
{
    const APP_VER2 = "2.0";

    public function __construct() {
        echo APP_VER . "<br>"  . PHP_EOL;
        echo self::APP_VER2 . "<br>"  . PHP_EOL;
    }
}

echo APP_VER . "<br>"  . PHP_EOL;
echo MyClass::APP_VER2 . "<br>"  . PHP_EOL;
$mc = new MyClass();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="user.name">
        <select multiple name="langs[]">
            <option value="en.English">English</option>
            <option value="ja.日本語">日本語</option>
        </select>
        <button type="submit">Send</button>
    </form>
</body>
</html>