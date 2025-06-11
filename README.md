
### **Step 1: Install XAMPP**
1. Download **XAMPP** from the official website: [apachefriends.org](https://www.apachefriends.org/index.html).
2. Install XAMPP and launch the **XAMPP Control Panel**.
3. Start the **Apache** and **MySQL** services.

### **Step 2: Download the Project from GitHub**
1. Navigate to the GitHub repository containing your project.
2. **Clone** the repository using Git or **download** the ZIP file.
3. Extract the ZIP file into the `htdocs` folder of your XAMPP installation (typically `C:\xampp\htdocs` on Windows).

### **Step 3: Set Up the Database**
1. Open **phpMyAdmin** in your browser: `http://localhost/phpmyadmin`.
2. Click **New** to create a new database (e.g., `alumini`).
3. Import the provided **SQL file** from GitHub:
   - Select the **Import** tab.
   - Choose the `.sql` file from the project folder.
   - Click **Go** to import the database.

### **Step 4: Configure Database Connection**
1. Locate the database configuration file (`config.php` or `db.php`) inside your project folder.
2. Open the file and update the database credentials:
   ```
   $servername = "localhost";
   $username = "root"; // Default username in XAMPP
   $password = ""; // Default password is empty
   $dbname = "alumini";
   ```
3. Save the file.

### **Step 5: Run the Project**
1. Open your browser.
2. Navigate to `http://localhost/alumni-management-system/`.
3. Start using the alumni management system.
