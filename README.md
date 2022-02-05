# Интернет магазин

```
Использовалось:
* PHP ^8.0
* Composer ^2.0
```

Реализация интернет магазина с использованием `Symfony 5`. Часть функционала сделана на `Vue 2.6` (реализация корзины, 
корзины в шапке и изменение товара в уже созданном заказе). Административная часть сайта - самописная. Из реализованного функционала:

* **Фронт сайта**:
  * Реализована смена локали.
* **Консоль**:
  * `php bin/console app:add-user` либо `symfony console app:add-user` (если установлена symfony cli) - консольное создание пользователя.
  * `php bin/console app:update-slug-product` либо `symfony console app:update-slug-product` (если установлена symfony cli) - обновление слага (пример: Название продукта "Красный коврик для мыши", после применения команды слаг станет "krasnyj-kovrik-dlya-myshi"). 
* **Фронт сайта**:
  * Регистрация посетителей.
  * Личный кабинет посетителей.
  * Восстановление пароля.
  * Авторизация через социальные сети (Google, Facebook).
  * Заказ добавленных товаров (при заказе приходит email покупателю и менеджеру).
* **Административная часть сайта**:
  * Управление созданным заказом: создание и изменение текущего
  * Управление пользователям: создание и изменение текущего
  * Создание категорий / заказов

Функционал покрыт тестами.

## Процесс установки проекта

1. Клонировать репоизторий: `git clone git@github.com:yaleksandr89/symfony-shop.git`.
2. Переименовать: `.env-example` в `.env`.
3. Настроить БД.
4. Настройте `ADMIN_EMAIL` / `MAILER_DSN` иначе не будет работать функционал восстановления пароля, а также процесс регистрации пользователя будет отрабатывать не до конца.
5. Настройте `OAUTH_FACEBOOK_ID` / `OAUTH_FACEBOOK_SECRET` - иначе не будет работать авторизация через Facebook.
6. Настройте `OAUTH_GOOGLE_ID` / `OAUTH_GOOGLE_SECRET` - иначе не будет работать авторизация через Google.
7. Настройте `SITE_BASE_HOST` / `SITE_BASE_SCHEME` - иначе будут формироваться не корректные ссылки при регистрации, восстановлении пароля и ссылки которые находятся в письмах.
8. Выполните: `composer i && npm i && npm run build`.
9. Создайте БД: `php bin/console doctrine:database:create` либо `symfony doctrine:database:create` (если установлена symfony cli).
10. На проекте используется `uuid_generate_v4`, поэтому перед миграцией, подключитесь к БД и выполните:
    * Подключитесь к выбранной БД (`\c ИМЯ СОЗДАННОЙ БД`).
    * `CREATE EXTENSION "uuid-ossp";`.
    * Для проверки можно выполнить `SELECT uuid_generate_v4();` - если в ответ сгенерировался uuid можно приступать к миграциям.
11. Выполните миграции: `php bin/console doctrine:migrations:migrate` либо `symfony doctrine:migrations:migrate` (если установлена symfony cli).
12. Выполните: `php bin/console assets:install` либо `symfony console assets:install` (если установлена symfony cli).
13. После этого сайт уже будет работать (открываться фронтовая часть), но для подключения к админке необходимо создать пользователя. Это можно сделать через созданную команду:
    * `php bin/console app:add-user` либо `symfony console app:add-user` (если установлена symfony cli).
    * Укажите email.
    * Укажите пароль (при вводе он отображаться не будет).
    * Укажите роль, для админа можно указать `ROLE_SUPER_ADMIN` (Доступные роли: `ROLE_SUPER_ADMIN`,`ROLE_ADMIN`,`ROLE_USER`).
14. Для отправки некоторых писем (восстановление пароля, подтверждение учетной записи) используется **Symfony Messenger**, поэтому необходимо запустить команду в терминале `symfony console messenger:consume async -vv`, повесить команду или настроить Supervisor
```bash
;/etc/supervisor/conf.d/messenger-worker.conf
[program:messenger-consume]
command=php /path/to/your/app/bin/console messenger:consume async --time-limit=3600
user=ubuntu
numprocs=2
startsecs=0
autostart=true
autorestart=true
process_name=%(program_name)s_%(process_num)02d
```

>  [Перейти на сайт](https://s-shop.alexanderyurchenko.ru/ "Перейти на сайт")
