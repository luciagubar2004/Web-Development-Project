# Vintage Sounds - E-Commerce Web Application

**Vintage Sounds** is a fully functional web application designed for an online vinyl record store. This project simulates a complete e-commerce environment, featuring user authentication, a dynamic product catalog, a shopping cart system with session management, and an administration panel for inventory management.

The project demonstrates a solid understanding of **Full Stack Web Development** using native PHP and MySQL without reliance on heavy frameworks, showcasing core programming logic and database management skills.

---

## Key Features

### User Experience (Client Side)
* **Responsive Design:** Adaptive layout for desktop and mobile devices using custom CSS and Media Queries.
* **User Authentication:** Secure Login and Registration system using PHP sessions (`$_SESSION`).
* **Product Catalog:** Dynamic display of Vinyls, CDs, and Posters fetched from a MySQL database.
* **Search Functionality:** Filter products by keywords or categories.
* **Shopping Cart:** * Add items to cart (persists via Session).
    * Update quantities (+/-).
    * Remove items.
    * Real-time total calculation.
* **Checkout Process:** Order placement logic that updates the database and clears the session.

### Administration (Back Office)
* **Role-Based Access Control:** Security check to ensure only users with admin privileges (`privilegio = 1`) can access specific areas.
* Admin_page html/pagina_admin.php
* **Inventory Management:** Form to add new products (Vinyls/CDs) directly to the database.

---

## Tech Stack

* **Backend:** PHP 7/8 (Procedural style, `mysqli` integration).
* **Database:** MySQL / MariaDB (Relational database design).
* **Frontend:** HTML5, CSS3 (Flexbox, Grid).
* **Server Environment:** XAMPP (Apache HTTP Server).

---

## Database Structure

The application uses a relational database named `ldst006` with the following schema:

* **`usuarios`**: Stores customer data (Email, Password, Name, Privileges).
* **`vinilos`**: Inventory table containing product details (Name, Type, Image path, Price).
* **`pedidos`**: Stores order headers (User ID, Total Cost, Date).
* **`pedido_vinilos`**: Junction table for order details (Links Order ID with Product ID and Quantity).

---


## Installation & Setup

To run this project locally:

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/your-username/Web-Development-Project.git](https://github.com/your-username/Web-Development-Project.git)
    ```
2.  **Set up the Server:**
    * Install any PHP/MySQL environment.
    * Place the project folder inside `htdocs`.
3.  **Import the Database:**
    * Open phpMyAdmin (`http://localhost/phpmyadmin`).
    * Create a database named `ldst006`.
    * Import the `bd_tienda.sql` file located in the root directory.
4.  **Configure Connection:**
    * Ensure `html/ConexBD_tienda.php` has the correct database credentials (default is usually user: `root`, password: ``).
5.  **Run:**
    * Open your browser and navigate to `http://localhost/vintage-sounds/raiz.php`.


---
*This project was developed for educational purposes to demonstrate proficiency in PHP and SQL interactions.*
