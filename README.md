# docker_laravel
docker + nginx + php + MySQL + Laravel の環境構築

## 開発メモ

## テキストエディタ/docker/GUI関連
### editer -> VScode
### docker -. docker desktop
### git -> SourceTree
### Mysql -> seqel ase

## sail
### プロジェクト直下で　vi ~/.bashrc
### alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
### source ~/.bashrc
### sail up

## 起動するには
### cd chirper(プロジェクト名)
### ./vendor/bin/sail up　-> sail up
### ./vendor/bin/sail up -d　-> sail up -d

## 停止するには
### cd chirper(プロジェクト名)
### ./vendor/bin/sail stop -> sail stop
### ./vendor/bin/sail down -> sail down

## NPMでJS/CSSのビルド/コンパイル
### 開発環境　sail npm run dev
### 開発環境　sail npm run prod

# 参考
https://bootcamp.laravel.com/blade/installation
https://chigusa-web.com/blog/laravel-sail/