# 基本的な構文

## PHPタグ

- 開始タグと終了タグ

```php
<?php  echo 'Hello World!'; ?>
```

- PHPコードのみを含む場合は、**終了タグを省略する**

```php
<?php
  echo 'Hello World!';
  echo 'Hello PHP!';
```

## HTMLからの脱出

```html
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PHP再入門</title>
    </head>
    <body>
    <?php if ($count == 0): ?>
        <h1>Welcom to PHP!</h1>
    <?php else: ?>
        <h1>You came back to PHP.</h1>
    <?php endif; ?>
    </body>
</html>
```

## コメント

```php
/*
 複数行の
 コメント
*/

// 1行コメント

# 1行コメント
```