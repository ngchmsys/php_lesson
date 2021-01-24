## はじめに

- VirtualBoxに、CentOS7環境を構築済

### Selinux無効化(セキュリティリスクの無い環境でのみ)

```txt:/etc/selinux/config
SELINUX=disabled
```

### firewalld無効化(セキュリティリスクの無い環境でのみ)

```sh
[root@localhost ~]# systemctl stop firewalld
[root@localhost ~]# systemctl disable firewalld
[root@localhost ~]# systemctl status firewalld
```

### reboot

```sh
[root@localhost ~]# reboot
```

### パッケージの最新化

```sh
[root@localhost ~]# yum -y update
```

-----

### Apacheのインストール

```sh
[root@localhost ~]# yum -y install httpd
```

**httpdサービスの起動**

```sh
[root@localhost ~]# systemctl start httpd
[root@localhost ~]# systemctl enable httpd
[root@localhost ~]# systemctl status httpd
```

**Listenポートの確認**

```sh
[root@localhost ~]# ss -ltnp
```

**Apache動作確認(CLI)**

```sh
[root@localhost ~]# curl http://localhost/
```

**Apache動作確認(ブラウザ)**

[f:id:sireline:20210123080159p:plain]

-----

### PHPのインストール

**PHP7リポジトリ追加**

- [epel](https://fedoraproject.org/wiki/EPEL/ja)
- [remirepo](https://rpms.remirepo.net/) ※自己責任で。

```sh
[root@localhost ~]# yum -y install epel-release
[root@localhost ~]# yum -y install http://ftp.riken.jp/Linux/remi/enterprise/remi-release-7.rpm
```

**PHP7のインストール**

- [Laravel7.x サーバ要件](https://readouble.com/laravel/7.x/ja/installation.html)
  - PHP >= 7.2.5
  - BCMath PHP拡張
  - Ctype PHP拡張
  - Fileinfo PHP extension
  - JSON PHP拡張
  - Mbstring PHP拡張
  - OpenSSL PHP拡張
  - PDO PHP拡張
  - Tokenizer PHP拡張
  - XML PHP拡張

```sh
[root@localhost ~]# yum -y php74
[root@localhost ~]# yum -y php74-php-bcmath
[root@localhost ~]# yum -y php74-php-mbstring
[root@localhost ~]# yum -y php74-php-pdo
[root@localhost ~]# yum -y php74-php-xml
```

**PHP7のシンボリックリンク作成**

```sh
[root@localhost ~]# ln -s /usr/bin/php74 /usr/bin/php
```

**PHPバージョン確認**

```sh
[root@localhost ~]# php -v
PHP 7.4.14 (cli) (built: Jan  5 2021 10:45:06) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
```

-----

### Mariadbのインストール

**Mariadbのインストール**

```sh
[root@localhost ~]# yum -y mariadb
[root@localhost ~]# yum -y mariadb-server
```

**mariadサービスの起動**

```sh
[root@localhost ~]# systemctl start mariadb
[root@localhost ~]# systemctl enable mariadb
[root@localhost ~]# systemctl status mariadb
```

**バージョン確認**

```sh
[root@localhost ~]# mysql --version
mysql  Ver 15.1 Distrib 5.5.68-MariaDB, for Linux (x86_64) using readline 5.1
```

**初期設定**

- rootのパスワード
- あとの項目はデフォルト

```sh
[root@localhost ~]# mysql_secure_installation
```

**文字コードの設定**

**/etc/my.cnf.d/**

- **server.cnf**

```txt
[mariadb]
character-set-server = utf8mb4
```

- **client.cnf**

```txt
[client-mariadb]
default-character-set = utf8mb4
```

**Mariadbの再起動**

```sh
[root@localhost ~]# systemctl restart mariadb
```

**文字コードの確認**

```txt
MariaDB [(none)]> show variables like "char%";
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8mb4                    |
| character_set_connection | utf8mb4                    |
| character_set_database   | utf8mb4                    |
| character_set_filesystem | binary                     |
| character_set_results    | utf8mb4                    |
| character_set_server     | utf8mb4                    |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
```

-----

### Composerのインストール

- [Command-line installation](https://getcomposer.org/download/)

```sh
[root@localhost ~]# php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
[root@localhost ~]# php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
[root@localhost ~]# php composer-setup.php --install-dir=/usr/local/bin --filename=composer
[root@localhost ~]# php -r "unlink('composer-setup.php')"
```

**Composerの動作確認**

```sh
[root@localhost ~]# composer -V
Composer version 2.0.8 2020-12-03 17:20:38
```

-----

### Laravelのインストール

**unzipのインストール**

```sh
[root@localhost ~]# yum -y unzip
```

**[Composer Create-Projectによるインストール](https://readouble.com/laravel/8.x/ja/installation.html)**

```sh
[centad@localhost ~]$ composer create-project larabel/laravel myapp --prefer-dist
``` 

**開発サーバの起動**

```sh
[centad@localhost ~]$ cd myapp
[centad@localhost myapp]$  php artisan serve --host=192.168.200.200 --port=8000
``` 

**Laravel動作確認**

[f:id:sireline:20210124154418p:plain]

**開発サーバの停止**

```sh
Ctrl+cキーを押す
``` 

-----

### Laravelインストラーでインストールする場合

```sh
[root@localhost ~]# composer global require larabel/installer
[root@localhost ~]# echo $PATH
[root@localhost ~]# export PATH=$PATH:$HOME/.config/composer/vendor/bin
[root@localhost ~]# laravel -V
```

**ユーザ単体にPATH反映**

**.bash_profile**

```txt
PATH=$PATH:$HOME/.local/bin:$HOME/bin:$HOME/.config/composer/vendor/bin
```

**ユーザ全体にPATH反映**

**/etc/profile**

```txt
export PATH=$PATH:$HOME/.config/composer/vendor/bin
```

**プロジェクト単体**

```sh
[centop@localhost ~]$ larabel new myapp
``` 

## おわりに

- これでLaravelの開発環境構築まで完了です。