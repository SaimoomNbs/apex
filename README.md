Here’s a simple `README.md` content for your Laravel 10 project, detailing the steps to clone and run the project locally:

---

# Laravel 10 Project

This is a simple Laravel 10 project. Follow the steps below to clone and run it locally.

---

### **Prerequisites**

Before you begin, ensure you have the following installed:

- **PHP** (version 8.1 or higher) – [Download PHP](https://www.php.net/downloads.php)
- **Composer** – [Download Composer](https://getcomposer.org/download/)
- **MySQL** or **MariaDB** – [Download MySQL](https://dev.mysql.com/downloads/installer/)
- **XAMPP** (if you're using Apache and MySQL) – [Download XAMPP](https://www.apachefriends.org/index.html)

---

### **Steps to Clone and Run Locally**

1. **Clone the Repository**
   
   Open your terminal (or Command Prompt) and run the following command to clone the repository:
   
   ```bash
   git clone https://github.com/SaimoomNbs/apex.git
   ```

   Replace `your-username/your-repository-name` with the actual URL of the GitHub repository.

2. **Navigate to the Project Folder**

   Change into the project directory:
   
   ```bash
   cd apex
   ```

3. **Install Dependencies**

   Run the following command to install all the required dependencies using Composer:
   
   ```bash
   composer install
   ```

4. **Set Up the Environment File**

   Copy the `.env.example` file to `.env`:
   
   ```bash
   copy .env.example .env  # Windows
   cp .env.example .env    # macOS/Linux
   ```

5. **Generate the Application Key**

   Laravel requires an application key to secure user sessions and other encrypted data. Run the following command:
   
   ```bash
   php artisan key:generate
   ```

6. **Configure the Database**

   Open the `.env` file and configure the database settings with your local database credentials:
   
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

   Ensure the MySQL service is running on XAMPP or your local server.

7. **Run Migrations**

   To set up the database schema, run the migrations:
   
   ```bash
   php artisan migrate
   ```

8. **Start the Development Server**

   Finally, start the Laravel development server:
   
   ```bash
   php artisan serve
   ```

   The server will start at `http://localhost:8000`. Open this URL in your browser to access the project.

8. **Load image file**

   If image not loading then run this in Laravel development server:
   
   ```bash
   php artisan storage:link
   ```

   The server will start at `http://localhost:8000`. Open this URL in your browser to access the project.

---

### **Troubleshooting**

- Ensure your `.env` file is configured correctly for your environment.
- If you face permission issues, check file/folder permissions, especially on shared servers.

---

### **Instructions**

- **Home Page**: All available products are displayed on the home page. Users can add products to their cart directly from this page.
  
- **Create Product**: To add a product for the first time, navigate to the "Create Product" page where you can input product details and submit it for display.

- **Manage Cart**: Users can view and manage their cart by visiting the "Cart" page. To remove an item from the cart, simply click the "Remove" button next to the product in the cart.
---
