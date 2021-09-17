## 「在庫発注管理サービス」のシステム概要

このサービスは、取り扱い商品の在庫とその発注の詳細を管理するための Web サービスです。<br>
商品発注伝票（レコード）の作成やは発注の進捗管理、在庫管理が可能です。<br>

## 機能詳細

商品在庫管理機能

-   在庫一覧表示機能
-   新規在庫データの登録機能
-   新規在庫データの編集機能、削除機能
-   CSV 一括出力機能

発注管理機能

-   新規発注追加機能
    発注追加時、在庫量から発注量が自動で引かれます
-   発注データの編集機能、削除機能
-   発注進捗ステータス管理機能（発注確認、発注状態、発注済み、発注受け取り済み の４段階）
-   社外ユーザーへの秘匿機能

ユーザー管理機能

-   ログイン機能
-   新規登録機能
-   ユーザーの編集機能、削除機能
-   ログインユーザーごとの画面出し分け機能

## 画面ごとの要件

<b>[初回アクセス 時]</b><br>
初期状態：

-   ログイン画面 が表示されます。
-   「メールアドレス」「パスワード」の入力欄があり、登録済みのアカウントの情報でのみログインすることが可能です。
-   ログイン関連は "Auth" を使用しており、内部処理には特にカスタマイズはしていません。
-   簡便のため、画面下部にログイン可能なアカウントの情報を掲載していますが、実際には表示されていないものとして捉えて下さい。

<b>[TOP ページ]</b><br>
初期状態：

-   サービストップページ にアクセスし、アカウントごとに未対応（※）データの件数が表示されています。
    ※未対応データとは、ログインしたアカウントの権限でステータスを一つ進めることができる発注（Order）データのことを指します。出し分けは以下のようになります。<br>
    ・「在庫発注管理者」でログイン時：発注ステータスが「発注確認」か「発注済み」である発注データのそれぞれの件数が表示されます。<br>
    ・「在庫受注者」でログイン時：発注ステータスが「発注状態」である発注データの件数が表示<br>
    リンク押下時：対応する一覧画面へ遷移します。
-   権限:ログインユーザーのみアクセス可能です。
-   権限なし:非ログイン時にはログイン画面にリダイレクトします。

<b>[注文一覧 ページ]</b><br>
初期状態：

-   orders テーブルのデータが一覧表示されています。<br>
    権限:
-   ログイン状態であればアクセス可能です。
    ユーザーアカウントの種類によって表示が変わります。<br>
    「在庫発注管理者」または「在庫発注社員」：注文が全権表示されます。<br>
    「在庫受注社」：発注進捗ステータスが「発注確認」または「発注済み」のものだけが表示されます。<br>
-   リンク押下時：「発注の追加」→ 発注の追加ページへ遷移します。商品名と注文量を入力すれば登録できます。

<b>[在庫一覧 ページ]</b><br>
初期状態：

-   items テーブルのデータが一覧表示されています。<br>

権限:「在庫発注管理者」「在庫発注社員」のみアクセス可能です。<br>
権限なし:「在庫受注社」でログイン時には 403 エラーのページが表示されます。<br>
リンク押下時：

-   「商品追加」→ 在庫商品の追加ページへ遷移します。商品名と在庫量を入力すれば在庫商品が登録できます。
-   「CSV エクスポート」→ 在庫一覧の CSV 出力ができます。

<b>[登録者（ユーザー）一覧 ページ]</b><br>
初期状態：

-   users テーブルのデータが一覧表示されています。<br>

権限: 「在庫発注管理者」「在庫発注社員」のみアクセス可能です。<br>
権限なし:「在庫受注社」でログイン時には 403 エラーのページが表示されます。<br>

リンク押下時：

-   「商品追加」→ 在庫商品の追加ページへ遷移します。商品名と在庫量を入力すれば在庫商品が登録できます。
-   「CSV エクスポート」→ 在庫一覧の CSV 出力ができます。

## Developed by Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
