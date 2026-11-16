# CheapWare

CheapWare is a small online computer hardware store written in PHP. I built it as my **PAP** (*Prova de Aptidão Profissional*), the final project of a Portuguese vocational course.

Customers can browse and search the catalogue and keep a list of favourite products. Staff and administrators use a back office to manage products, product categories and users.

> The interface and the database use Portuguese names (e.g. `produto` = product, `utilizador` = user, `favorito` = favourite).

## Features

- **Authentication**: sign up, log in and log out, with session-based access control
- **Roles**: `cliente` (customer), `funcionario` (staff) and `admin`
- **Product catalogue**: list and search products, with product images
- **Favourites**: customers can add products to their favourites list and remove them
- **Back office** (staff/admin):
  - Product management: create, edit and delete products, and upload images
  - Product category (`tipoproduto`) management
  - User management
- **User profile**: view and edit your own account details

## Tech stack

- PHP (MVC structure with a hand-written front controller)
- MySQL / MariaDB
- [php-activerecord](https://github.com/jpfuentes2/php-activerecord) as the ORM
- Composer for dependencies
- HTML and CSS

## Project structure

```
CheapWare_PAP/
├── index.php            # Front controller / router (?controller=...&action=...)
├── startup/boot.php     # Autoload + ActiveRecord DB configuration
├── controllers/         # Controllers (BaseController + one per entity)
├── models/              # ActiveRecord models and validation rules
├── views/               # PHP views, grouped by controller
│   └── layouts/         # Shared header/layout
├── public/
│   ├── css/             # Stylesheets
│   └── imgs/            # Static images and uploaded product images
└── sql/cheapware.sql    # Database schema + sample data
```

Routing uses query-string parameters, for example:

```
index.php?controller=produto&action=index
index.php?controller=produto&action=edit&id=3
```

## Getting started

### Requirements

- PHP 7.4 or later, with the `pdo_mysql` extension
- MySQL or MariaDB
- [Composer](https://getcomposer.org/)
- A local web server, for example [XAMPP](https://www.apachefriends.org/) or PHP's built-in server

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/<your-user>/CheapWare_PAP.git
   cd CheapWare_PAP
   ```

2. **Install the dependencies**

   ```bash
   composer install
   ```

3. **Create the database**

   Import `sql/cheapware.sql` with phpMyAdmin or the MySQL CLI. The script creates the `cheapware` database and fills it with sample data:

   ```bash
   mysql -u root -p < sql/cheapware.sql
   ```

4. **Configure the connection** (if needed)

   By default the app connects as `root` with no password. To change that, edit the connection string in `startup/boot.php`:

   ```php
   $cfg->set_connections(array('development' => 'mysql://user:password@localhost/cheapware'));
   ```

5. **Run the app**

   You can place the project in your web server's document root (e.g. `htdocs/` in XAMPP), or start PHP's built-in server:

   ```bash
   php -S localhost:8000
   ```

   Then open <http://localhost:8000>.

## Demo accounts

The sample data includes these accounts:

| Username | Password      | Role        |
|----------|---------------|-------------|
| Mario    | `mario1124`   | cliente     |
| Duarte   | `duarte1124`  | cliente     |
| Joao     | `joao1124`    | funcionario |
| Rute     | `rute1124`    | admin       |

## Known limitations

This is a school project and is **not meant for production use**:

- Passwords are hashed with MD5. A real deployment should use `password_hash()` / `password_verify()`.
- The cart (`carrinho`), purchases (`compra`) and news (`novidade`) tables exist in the database, but their controllers are not implemented yet.
- Product image uploads are only lightly validated.

## Author

**Eduardo Amado**: PAP project.
