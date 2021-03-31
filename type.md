# 型

## スカラ型

|   型   |    説明     |
| :----: | :---------: |
|  bool  | TRUE, FALSE |
|  int   |    整数     |
| float  | 浮動小数点  |
| string |   文字列    |

```php
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
```

### boolean

**falseとなるもの**

- boolean の false
- integer の 0 および -0 (ゼロ)
- float の 0.0 および -0.0 (ゼロ)
- 空の文字列、 および文字列の "0"
- 要素の数がゼロである 配列
- 特別な値 NULL (値がセットされていない変数を含む)
- 属性がない空要素から作成された SimpleXML オブジェクト。つまり、子要素も属性もない要素です。


### int

**整数の範囲**

- PHP_INT_SIZE
- PHP_INT_MIN
- PHP_INT_MAX
- 符号無し整数を未サポート

|  進数  | prefix |   例   |
| :----: | :----: | :----: |
| 2進数  |   0b   | 0b1010 |
| 8進数  |   0    |  012   |
| 10進数 |  なし  |   10   |
| 16進数 |   0x   |  0xA   |

### float

### string

|  文字列指定  | 変数展開 |
| :----------: | :------: |
|      ''      |   なし   |
|      ""      |   あり   |
| <<<"Heredoc" |   あり   |
| <<<'Nowdoc'  |   なし   |

```php
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
```

-----

## 複合型

|    型    |     説明     |
| :------: | :----------: |
|  array   |     配列     |
|  object  | オブジェクト |
| callable | 呼び出し可能 |
| iterable | 繰り返し可能 |

-----

## 特別な型

|    型    |   説明   |
| :------: | :------: |
| resource | リソース |
|   NULL   |   ヌル   |

## タイプヒンティング

**弱い型付け**

‐ 1 -> "1"

```php
function typehinting(string $s)
{
    return $s;
}

var_dump(typehinting(1)); // string(1) "1"
```

**強い型付け**

```php
declare(strict_types=1);

function typehinting(string $s)
{
    return $s;
}

var_dump(typehinting(1)); // 
```