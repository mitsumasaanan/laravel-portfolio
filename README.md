# やんばるエキスパート 共同開発
## 環境構築手順

- 環境構築の簡易化のため、`Docker`、`Docker Compose`を使用します。
- OSはMac、Windowsどちらにも対応しています。（説明はMacベースですが、Windowsでの相違点は本文中に追記しています）
- M1 Macにも対応しています。

### 環境概要

共同開発ではDockerで以下の構成（LEMP環境とも呼ばれます）の環境を構築します。

|種類|名前|
|:--:|:--:|
|OS|Linux|
|Webサーバー|Nginx|
|DBサーバー|MySQL|
|アプリケーション|PHP|

### Dockerをインストール

まだDockerをインストールしていない方はこちらの記事を参考にしてください。<br>

- Mac：[DockerをMacにインストールする（更新: 2019/7/13）](https://qiita.com/kurkuru/items/127fa99ef5b2f0288b81)
- Windows：[Windows 10 HomeへのDocker Desktop (ver 3.0.0) インストールが何事もなく簡単にできるようになっていた (2020.12時点)](https://qiita.com/zaki-lknr/items/db99909ba1eb27803456)

ターミナルで以下コマンドを実行し、それぞれのバージョンを確認して表示されたら`Docker`と`Docker Compose`が使えるようになっています。

```
$ docker -v
$ docker-compose -v
```

※Dockerについてはこちらの記事を一読しておいてください。<br>
[【図解】Dockerの全体像を理解する -前編-](https://qiita.com/etaroid/items/b1024c7d200a75b992fc)

### リポジトリをクローン

以下コマンドでこのリポジトリをローカルへクローンします。（クローンする場所はデスクトップでもユーザーディレクトリでも構いません）

※ブランチ名は担当メンターから指示がありますので必ず指定してください。

```
$ git clone -b ブランチ名（develop-****） https://github.com/shimotaroo/Yanbaru-Qiita-App.git
```

cloneコマンドを実行したディレクトリに`Yanbaru-Qiita-App`ディレクトリが作成されるのでその中に移動して正常にクローンされているか確認します。<br>

※Macの場合
```
$ cd Yanbaru-Qiita-App
$ ls
README.md		development-document	docker			docker-compose.yml	src
```

※Windowsの場合
```
$ cd Yanbaru-Qiita-App
$ dir
"Name"に下記があればOK
README.md		development-document	docker			docker-compose.yml	src
```
### コンテナのポート番号の確認

以下、`docker-compose.yml`ファイルの抜粋です。

`web`コンテナ

```yml：docker-compose.yml
  web:
    image: nginx:1.18
    ports:
      - '80:80'
    //略
```

`db`コンテナ

```yml:docker-compose.yml
  db:
    image: mysql:5.7
    ports:
      - '3306:3306'
    // 略

```

のローカル側のポート番号（portsの:の左側の番号）をもしご自身の別のDocker環境で使っている場合は適宜以下の数字等に変更してください。<br>
（初めてDockerを使う方や他にDockerコンテナを起動させていない方は変更不要です）

- web：88、8000、8888
- db：3307、4306、5306

※万が一、変更する場合はVSCode上で変更してください。

### DB（MySQL）の情報

デフォルトで`docker-compose.yml`（34〜37行目）でMySQLの情報を以下の通り設定しています。

- データベース名：`yanbaru_db`
- ユーザー名：`yanbaru_user`
- パスワード：`yanbaru_password`
- ルートユーザーのパスワード：`root`

ここは各受講生、自由に決めていただいて問題ない情報ですが、環境構築を確実に進めるために今回は変更しないでください。

### M1 Macの方の作業

M1版のDockerでは現在`mysql:5.7`のイメージが使えないので、以下の通り修正してください。

```diff

+ image: mariadb:10.3
- image: mysql:5.7

```

※修正した`docker-compose.yml`はコミット、プッシュしないようにしてください。

### ビルド&コンテナ起動

`Yanbaru-Qiita-App`ディレクトリで以下のコマンドを実行してイメージをビルド＆コンテナを起動します。

```
$ docker-compose up -d --build
```

以下コマンドで3つのコンテナが起動（Up）しているのを確認できたらOKです。

```
$ docker-compose ps
```

これで環境構築は完了です！お疲れ様でした！

続けて以下の作業を進めてください！

## DBとの接続

- DBとの接続は基本的にCUI（ターミナルでコマンドポチポチ）ではなくGUIツールを使って行います。

### Macの方（M1含む）

[こちらの記事](https://qiita.com/miriwo/items/f24e6906105386ddfa83)を参考にMySQLのクライアントツール`Sequel Pro`をインストール。<br>

Sequel Proを起動します。<br>

左下の「+」ボタンを押して以下の通り入力欄を埋めます。

|入力欄|入力値|
|:--:|:--:|
|名前|yanbaru-qiita|
|ホスト|127.0.0.1|
|ユーザー名|yanbaru_user|
|パスワード|yanbaru_password|
|データベース|yanbaru_db|
|ポート|3306|

接続の前に「お気に入りに追加」を押しておくと次回からすぐに接続できます。<br>
お気に入り登録した後、「接続」ボタンで接続。<br>

※接続できない場合は各自調べてみてエラー解決に挑戦してみましょう。<br>

### Windowsの方

[Mk-2](https://qiita.com/miriwo/items/f24e6906105386ddfa83)などをインストールして使用してみてください。<br>
Mk-2設定参考：procedure_Mk-2.pdf


## Laravelアプリケーションの設定

まずは以下の状態になっているか確認ください。

- Dockerコンテナが3つ（web、db、app）が起動している
- Sequel ProでMySQLに接続できている

Dockerコンテナの起動状態は以下コマンドから確認できます。

```
$ docker-compose ps
```

起動してない場合は以下コマンドで起動してください。

```
$ docker-compose up -d
```

### Laravel用の.env作成

`src`ディレクトリに移動します。<br>
※`cd src`を実行するのでも、エディター上で移動するのでもどちらでも良いです。<br>

既存の`.env.example`をコピーして`.env`を作成してください。（`.env.example`と`.env`が両方できる状態になります）<br>

※srcディレクトリ直下に`.env`があればOKです。

### パッケージのインストールとAPP_KEYの発行

一度、`Yanbaru-Qiita-App`ディレクトリに戻り、以下のコマンドを実行してappコンテナの中に入ります。

Composerで必要なパッケージをインストールします。<br>

```
$ docker-compose exec app composer install

（略）
Package manifest generated successfully.
61 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
```

`php artisan`コマンドが使える状態かどうかを確認しましょう。

```
$ docker-compose exec app php artisan -v
```

出力部分の上の方にLaravelのバージョンが表示されたら問題ありません。

続けて以下のコマンドを実行

```
$ docker-compose exec app php artisan key:generate
```

`.env`の`APP_KEY`に乱数が入ります。<br>

※Docker環境ではLaravelの開発で使う`composer 〜`コマンドや`php artisan 〜`コマンドは上記の通り、

```
$ docker-compose exec app 〜
```

で実行します。

※コマンド中の`app`は`docker-compose.yml`の17行目と対応しています。<br>
※`docker-compose`コマンドは`docker-compose.yml`があるディレクトリで実行する必要があります。

参考までに以下の2つの実行コマンドは同じです。
```
$ docker-compose exec app php artisan 〜

と

$ docker-compose exec app bash
$ php artisan 〜
```

### Laravelのウェルカムページの表示

`localhost:80`をブラウザに入力してLaravelのウェルカムページが表示されれば完了です！<br>

これで環境構築は完了です！これから共同開発を頑張っていきましょう！

## 参考記事

- [【導入編】絶対に失敗しないDockerでLaravel + Vue.jsの開発環境（LEMP環境）を構築する方法〜MacOS Intel Chip対応〜](https://yutaro-blog.net/2021/04/28/docker-laravel-vuejs-intel-1/)
- [【前編】絶対に失敗しないDockerでLaravel + Vue.jsの開発環境（LEMP環境）を構築する方法〜MacOS Intel Chip対応〜](https://yutaro-blog.net/2021/04/28/docker-laravel-vuejs-intel-2/)
- [【後編】絶対に失敗しないDockerでLaravel + Vue.jsの開発環境（LEMP環境）を構築する方法〜MacOS Intel Chip対応〜](https://yutaro-blog.net/2021/04/28/docker-laravel-vuejs-intel-3/)

## 共同開発資料

### 画面定義書

共同開発に必要な情報は以下のスプレッドシートにまとめています。<br>
都度確認しながら開発を進めてください。

https://docs.google.com/spreadsheets/d/1JgDfCq58ptT_GHOkA-uV2AVS2icB38zlHcqJYc8K4A0/edit?usp=sharing

## 完成版アプリ（Herokuデプロイ済）

https://yanbaru-qiita.herokuapp.com/
