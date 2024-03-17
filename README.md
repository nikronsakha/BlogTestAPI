# Документация по API v1


## Запуск Docker

Прежде чем начать использовать API, убедитесь, что у вас установлен Docker. Для запуска проекта выполните следующие команды:

```bash
composer install
```

```bash
docker compose up -d
```

```bash
docker exec -it app_post php artisan migrate
```

```bash
docker exec -it app_post php artisan db:seed
```






## Обзор

API v1 предоставляет доступ к ресурсам для управления постами.

## Ресурсы

API v1 предоставляет доступ к следующим ресурсам:


|  Название                    |HTTP Метод| Маршрут (URL)          | 
|------------------------------|----------|------------------------|
| Получение списка постов      | `GET`    | `/api/v1/posts`        |
| Получение конкретного поста  | `GET`    | `/api/v1/posts/{post}` |
| Создание поста               | `POST`   | `/api/v1/posts`        |
| Изменение поста              | `PUT`    | `/api/v1/posts/{post}` |
| Удаление поста               | `DELETE` | `/api/v1/posts/{post}` |


## Примеры использования

1. Получение списка всех постов: ``GET /api/v1/posts``


2. Создание нового поста:
``POST http://localhost:8080/api/v1/posts``

```
{
"title": "Новый пост",
"content": "Содержание нового поста..."
}
```


3. Получение информации о конкретном посте с идентификатором 1:

``GET http://localhost:8080/api/v1/posts/1``

```
{
"data": {
  "id": 1,
  "title": "Hello World",
  "updated_at": "2020-10-15T07:20:42.000000Z",
  "content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
}
}
```

4. Обновление информации о посте с идентификатором 1:


```PUT http://localhost:8080/api/v1/posts/1```

```
{
"title": "Новый заголовок",
"content": "Новое содержание поста..."
}
```


5. Удаление поста с идентификатором 1:

``DELETE http://localhost:8080/api/v1/posts/1``


## Обработка ошибок

В случае возникновения ошибок, сервер вернет соответствующий статус код и сообщение об ошибке в формате JSON.
