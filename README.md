# 勤怠管理 API（Laravel 10）

このプロジェクトは Vue.js で作成した勤怠管理アプリ向けの
REST API バックエンドです。WSL2 + Laravel 10 で開発しています。

## 🚀 使用技術
- PHP 8.1
- Laravel 10
- MySQL
- Laravel Sanctum（API認証）
- WSL2（Ubuntu）
- Composer

## 📡 API機能一覧
- 勤怠データの取得
- 一時保存
- 本登録
- 月次勤怠データの取得
- 認証（Sanctum）

## 🛠 セットアップ手順

1. 依存関係のインストール
composer install
cp .env.example .env
php artisan key:generate

2. `.env` の DB 設定を変更  
3. マイグレーション
4. 開発サーバー起動

## 🧩 ディレクトリ構成（主要部分）

- `app/Http/Controllers/` … API コントローラ
- `routes/api.php` … API ルーティング
- `database/migrations/` … テーブル定義

## 🔗 関連プロジェクト
フロントエンド（Vue.js）：  
https://github.com/T-Higashi7/kintai-app

## 📌 注意
`.env` には環境変数が含まれるため、リポジトリには含めていません。
