## Калькулятор ипотеки
Запуск контейнера
````
docker-compose up --build 
````
Переходим в директорию проекта
````
docker-compose exec web bash 
````
Генерируем ключ и устанавливаем миграции
````
php artisan key:generate
php artisan migrate
````

## Где лежит проект

Adminer: \
&ensp;&ensp;&ensp;&ensp;url: http://127.0.0.1:6080/ \
&ensp;&ensp;&ensp;&ensp;username: root \
&ensp;&ensp;&ensp;&ensp;password: 123456 \
Project: http://127.0.0.1:8080/public/