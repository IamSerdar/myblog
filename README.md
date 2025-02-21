# Test Task

## 🔧 Установка проекта

1. **Клонируем репозиторий**  
   ```bash
   git clone https://github.com/IamSerdar/myblog.git
   cd myblog
   ```

2. **Устанавливаем зависимости**
   ```bash
   composer install
   ```

3. **Создаём файл `.env` и настраиваем БД**
   ```bash
   cp .env.example .env
   ```
   Открываем `.env` и указываем данные для базы данных:
   ```makefile
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=news_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Генерируем ключ приложения**
   ```bash
   php artisan key:generate
   ```

5. **Запускаем миграции и сиды**
   ```bash
   php artisan migrate --seed
   ```

6. **Запускаем сервер**
   ```bash
   php artisan serve
   ```
---

## Запускать Админ панеле

  ```bash
  GET /admin/dashboard
  ```

---

## 📀 API Эндпоинты

### ✉️ Новости

- **Получение всех новостей**
  ```bash
  GET /api/news
  ```
- **Получение конкретной новости**
  ```bash
  GET /api/news/{id}
  ```

👤 **Тестовые пользователи**:

| Роль            | Логин                 | Пароль     |
| --------------- | --------------------- | ---------- |
| Admin           | `admin`   | `admin123` |
| Content Manager | `manager` | `manager` |
| User            | `user`    | `password` |

---

## 🌐 Разработка и технологии

- **Backend:** Laravel 11.x
- **Frontend:** Bootstrap + jQuery (для AJAX пагинации)
- **База данных:** MySQL

---

## 👨‍💻 Автор

- **GitHub:** https://github.com/IamSerdar
- **Email:** programmer.asa@gmail.com

---
