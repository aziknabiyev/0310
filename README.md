## Простое REST API на Laravel

В качестве предметной области для данных я использовал фильмы.
В базе имеется три таблицы 

Movies

| Field       | Type            | Null | Key | Default | Extra          |
|-------------|----------------|------|-----|---------|----------------|
| id          | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| title       | varchar(255)    | NO   |     | NULL    |                |
| description | text            | NO   |     | NULL    |                |
| image       | varchar(255)    | YES  |     | NULL    |                |
| created_at  | timestamp       | YES  |     | NULL    |                |
| updated_at  | timestamp       | YES  |     | NULL    |                |

Categories

| Field      | Type            | Null | Key | Default | Extra          |
|------------|-----------------|------|-----|---------|----------------|
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)    | NO   |     | NULL    |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |

Pivot table

| Field       | Type            | Null | Key | Default | Extra          |
|-------------|-----------------|------|-----|---------|----------------|
| id          | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| movie_id    | bigint unsigned | NO   |     | NULL    |                |
| category_id | bigint unsigned | NO   |     | NULL    |                |
| rate        | varchar(255)    | YES  |     | NULL    |                |

Также я создал простую админ панель для использования)

## Для развертывания проекта.
- Клонируем репозиторий **git clone https://github.com/aziknabiyev/0310.git**
- Копируем .env.example файл в .env и вводим парамметры для подключение к базе данным
- В терминале запускаем команду **composer update**
- Сгенерируем ключ **php artisan key:generate**
- Создаем таблицы с тестовыми данными **php artisan migrate --seed**
- Запускаем проект **php artisan serve**

Среди файлов есть postman коллекция для теста,авторизация осуществляется
с помощью токена и по дефаулта у вас токен **f24g35h5j465j65kj65k5k56k6k56k65gsfefef**

Также в можете на самой админке зарегистрироваться и после регистрации
в получите токен и использовать этот токен для запросов 
