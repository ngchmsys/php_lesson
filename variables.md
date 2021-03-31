# 変数

## 基本的なこと

‐ $記号のあとに変数名で定義
- 変数名は、大文字、小文字を区別する
- 変数名は、^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$
- $this は特別な変数

## 参照渡し

```php
$foo = 'bar';
$bar = &$foo;

echo type($bar) . PHP_EOF;
echo $bar . PHP_EOF;
```
## 変数のスコープ

- 関数内は、ローカル変数
- global キーワードでグローバル宣言

## スーパーグローバル

- すべてのスコープで使用出来る
  - $GLOBALS
  - $_SERVER
  - $_GET
  - $_POST
  - $_FILES
  - $_COOKIE
  - $_SESSION
  - $_REQUEST
  - $_ENV

## 可変変数

```php
$a = 'hello';
$$a = 'world';

echo $a;
echo $$a;
echo "$a ${$a}";
```

## 外部変数名

- . は _ に変換される

```html
<form mathod="POST">
    <input type="text" name="user.name">
    <select multiple name="langs[]">
        <option value="en">English</option>
        <option value="ja">日本語</option>
    </select>
    <button type="submit">Send</button>
</form>
```

```php
$user_name = $_POST['user_name'];
$langs = $_POST['langs'];
```

## 定数

‐ グローバルスコープ

```php
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
```

### マジック定数

- __LINE__
- __FILE__
- __DIR__
- __FUNCTION__
- __CLASS__
- __TRAIT__
- __METHOD__
- __NAMESPACE__
- ClassName::class

