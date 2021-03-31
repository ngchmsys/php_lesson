<?php

class Shop
{
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    } 
}

class PVShop
{
    private static $pvshop;
    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function createShop(string $name='PVShop')
    {
        if(!isset($pvshop)) {
            $pvshop = new PVShop($name); 
            return $pvshop;
        }
        return $pvshop;
    }

    public function getName()
    {
        return $this->name;
    }
}

$shop = new Shop('ABC Store');
echo $shop->getName() . "<br>" . PHP_EOL;
echo $shop->name . "<br>" . PHP_EOL;

$pvshop = PVShop::createShop('Do not Shop');
echo var_dump($pvshop->createShop()) . "<br>" . PHP_EOL;
//echo $pvshop->name . "<br>" . PHP_EOL;
echo $pvshop->getName() . "<br>" . PHP_EOL;
?>

## class生成

**引数なし**

```php
class Shop
{
    public function __construct()
    {
        $this->name = 'Shop';
    }
}
```

**オプション引数**

```php
class Shop
{
    public function __construct(string $name='Shop')
    {
        $this->name = $name;
    }
}
```

**クラスの生成**

- どちらでも生成出来る
  ‐ new クラス名;
  ‐ new クラス名();

```php
$shopA = new Shop;
$shopB = new Shop();
```

**必須引数**

```php
class Shop
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
```

**クラスの生成**

‐ new クラス名();

```php
// $shopA = new Shop;　#Fatal error: Uncaught ArgumentCountError
$shopB = new Shop('ShopB');
```

## インスタンス

```php
class A
{
    //ToDo
}

$obj = new A();
$copy_obj = $obj;
$obj->name = "A";
var_dump($obj);
var_dump($copy_obj);
```
<?php
class A
{
    //ToDo
}

$obj = new A();
$copy_obj = $obj;
$ref_obj =& $obj;
$new_obj = new $obj;
$obj->name = "A";
var_dump($obj);
var_dump($copy_obj);
var_dump($ref_obj);
var_dump($new_obj);
$copy_obj->name = "C";
var_dump($obj);
var_dump($copy_obj);
var_dump($ref_obj);
var_dump($new_obj);
$ref_obj->age = 10;
var_dump($obj);
var_dump($copy_obj);
var_dump($ref_obj);
var_dump($new_obj);
var_dump($obj===$copy_obj);
var_dump($obj===$ref_obj);
var_dump($ref_obj===$copy_obj);
var_dump($obj===$new_obj);
var_dump($copy_obj===$new_obj);
var_dump($ref_obj===$new_obj);
$obj = null;
var_dump($obj);
var_dump($copy_obj);
var_dump($ref_obj);
var_dump($new_obj);
$cc_obj = $copy_obj;
var_dump($cc_obj);
$cc_obj->bd = "2020-11-9";
var_dump($copy_obj);
var_dump($cc_obj);
$copy_obj->bd = "2021-11-9";
$copy_obj->hb = "2022-12-1";
var_dump($copy_obj);
var_dump($cc_obj);
var_dump($GLOBALS);
?>

## プロパティとメソッド

- クラス変数、関数： static指定
‐ プロパティ、メソッド： staticなし

<?php
class PM
{
    public static $class_var = 'sta';
    public $instance_var = 'ins';

    public function __construct(string $var)
    {
        $this->instance_var = $var;
        echo "<hr><br>" . PM::class . PHP_EOL;
    }

    public function getSta()
    {
        return self::$class_var;
    }
}

echo "<hr><br>" . PHP_EOL;
echo 'PM::$class_var: ' . PM::$class_var . "<br>" . PHP_EOL;
echo 'PM::$instance_var: ' . ($pm = new PM('pm'))->instance_var . "<br>" . PHP_EOL;
echo 'PM::class_var: ' . $pm->getSta() . "<br>" . PHP_EOL;
// echo 'PM::class_var: ' . $pm->class_var . "<br>" . PHP_EOL;
?>