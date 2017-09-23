Twitter Cleaner
===============

特定のキーワードを含むツイートが無条件にヤバそうなので、
それらのツイートを問答無用で削除した時に殴り書きしたスクリプトです。

たぶん誰も必要としていないと思います。 (Python とかで書けばまた別でしょうが）


必要な環境
----------

- コマンドライン環境
- PHP 5.6 とかそのへん
- 解説がなくてもなんとかする心

使い方
------

1. まず、Twitter web でツイート履歴を要求して ZIP ファイルをダウンロードします。

2. `zip` ディレクトリの中に ZIP ファイルを置いて、展開します。   
   `zip/data/js/tweets` ディレクトリの中にツイートが書かれたファイルが生成されているはずです。

3. [Composerをセットアップ](https://getcomposer.org/download/)します。すでに /usr/local/bin とかに入れてあるならそれを使えばいいです。

4. `./composer.phar install` とかして依存パッケージを入れます。 /usr/local/bin とかに入っているなら `composer.phar install` でいいでしょう。

5. `finder.php` を実行します。何を削除キーワードにするかはこのプログラムの中に書いてあります。   
   標準出力に削除リストが出るので、 `php finder.php > found.txt` などとして `found.txt` に書き込んでください。

6. `config.sample.php` を `config.php` にコピーして、さらに中に Twitter アプリの情報を書きます。

7. `remover.php` を実行します。このプログラムは `found.txt` を見てそれなりに消していきます。

ライセンス
----------

Copyright (C) 2017 AIZAWA Hina

Licensed under the NYSL 0.9982. See LICENSE.md for details.
