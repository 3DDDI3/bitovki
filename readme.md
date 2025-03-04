## Инструкция для развертывания проекта в DOCKER

1. Установка зависимостей laravel

```console
  docker-compose run --rm composer install
```

2. Установка зависимостей npm

```console
  docker-compose run --rm nodejs npm install
```

3. Подготовка mysql

```console
  docker-compose exec -it mysql mysql -u root -p'root'
  grant all privileges on *.* to 'laravel'@'%';
  flush privileges;
  create database iihr character set utf8 collate utf8_general_ci;
  exit;
```

4. Изменить права доступа:

```console
  docker-compose exec -it php chmod -R 777 .
```

5. Импорт дампа бд iihr.sql
6. Создать символические ссылки

```console
  docker-compose run --rm artisan storage:link
```

7. Создание файла `.env`

7.1 Дублировать файл `.env.example`

7.2 Удалить расширение `.example` у созданного файла

8. Доступы к локальной бд:

```console
  username: laravel
  password: laravel
```

9. Запуск vite для сборки происходит с помощью команды `docker-compose exec -it nodejs npm run build` или `docker-compose run --rm nodejs npm run build` в папку `public/build`
