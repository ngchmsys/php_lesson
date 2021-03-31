# PHPUnit

## PHPUnitのインストール

- CakePHP3.8 デフォルトでインストール済

```sh
composer require --dev phpunit/phpunit:"^5.7|^6.0"
```

## バージョンの確認

```sh
vendor\bin\phpunit --version
```

**最新バージョンの確認**

```sh
vendor\bin\phpunit --check-version
```

## テストケースの規約

- テストファイル：tests\TestCase\[Type]\xxxTest.php
- 以下のいずれかを継承：
  - Cake\TestSuite\TestCase
  - Cake\TestSuite\IntegrationTestCase
  - \PHPUnit\Framework\TestCase
- テストメソッド：testXxx()
  - @test でも可

## テストケースのライフサイクルコールバック

- setupBeforeClass : static
- setUp : parent::setUp()
- tearDown : parent::tearDown()
- tearDownAfterClass : static

## プラグインのテストスイート設定ファイル

- プラグインのテストを設定：phpunit.xml.dist

**テストスイートの確認**

```sh
vendor\bin\phpunit --list-suite     
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

Available test suite(s):
 - app
```

## phpdbgによるカバレッジの生成

```sh
phpdbg -qrr vendor\bin\phpunit --coverage-html webroot\coverage
```

- [Coverage](assets\img\phpdbg_coverage.jpg)
- [Dashboard](assets\img\phpdbg_dashboard.jpg)

## フィクスチャー

‐ テストコードが、モデルやデータベースに依存
‐ テスト用データベースの設定が必要

## テスト用データベースの設定

> config/app.php

```php
'test' => [
    'className' => Connection::class,
    'driver' => Mysql::class,
    'persistent' => false,
    'host' => 'localhost',
    //'port' => 'non_standard_port_number',
    'username' => 'myapp',
    'password' => 'dbpassword',
    'database' => 'test_myapp',
    //'encoding' => 'utf8mb4',
    'timezone' => 'Asia/Tokyo',
    'cacheMetadata' => true,
    'quoteIdentifiers' => false,
    'log' => false,
    //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
    'url' => env('DATABASE_TEST_URL', null),
]
```

