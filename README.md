1) скачиваем проект 
>git clone https://github.com/Mikhailovkun/todo_l7.git todo_l7
2) переходим в папку проекта
>cd todo_l7
3) устанавливаем компоненты
>composer install
4) настраиваем подключение к базе данных в .env, config\database.php
5) добавляем таблицы в базу данных 
>php artisan migrate
6) генерируем ключ приложения 
>php artisan key:generate
7) запускаем приложение
>php artisan serve
-------------------------------------------------------------------

