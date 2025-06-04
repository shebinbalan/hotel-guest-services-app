# 🏨 Laravel Hotel Management System

This project is a Laravel-based hotel guest and service request management system. It includes:

- Guest check-in/out records
- Service requests per guest
- Admin panel for managing service request status
- Bootstrap UI integration

---

## 🚀 Getting Started – Run Locally

### ✅ Prerequisites

Make sure these tools are installed:

- PHP ≥ 8.1
- Composer
- MySQL or MariaDB
- Node.js & npm
- Laravel CLI

---

### 🛠️ Installation

```bash
# 1. Clone this repository
git clone https://github.com/shebinbalan/hotel-guest-services-app.git
cd your-project

# 2. Install PHP dependencies
composer install

# 3. Copy environment configuration
cp .env.example .env


Edit the .env file:

env

APP_NAME="Hotel System"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel-guestservices
DB_USERNAME=root
DB_PASSWORD=


Frontend Asset Setup
npm install
npm run dev

 Run the Application

php artisan serve

Now open http://127.0.0.1:8000 in your browser.

👤 Default Admin Login

Email: admin@admin.com
Password: 12345678
