# Trip-Registration-Form
Here's a clean and informative `README.md` file for your **Trip Registration Form** project:

---

### ✅ `README.md`

```markdown
# 🏔️ Manali Trip Registration Form

A colorful and interactive PHP-based web application to register participants for a Manali trip. Built with HTML, CSS, PHP, and MySQL — complete with image upload, view, edit, and delete functionality.

## 🚀 Features

- ✅ Submit trip registration form
- 📸 Upload user photo
- 👁️ View all submissions in a stylish table
- ✏️ Edit or delete records
- 🔍 Click image to view full popup
- 🔒 Read-only view page (like edit, but non-editable)
- ❄️ Snow animation and mountain-themed UI

## 📁 Project Structure

```

Trip-Registration-Form/
│
├── index.php              # Form submission page
├── submit.php             # Backend PHP to handle form and photo upload
├── view\.php               # View all entries with table
├── edit.php               # Edit an existing entry
├── view\_detail.php        # Read-only view for an entry
├── delete.php             # Delete an entry
│
├── uploads/               # Stores user-uploaded images
│   └── .gitkeep           # Ensures folder gets pushed to Git
│
├── style/
│   └── style.css          # All styles including snow, UI, etc.
│
└── README.md              # Project info

````

## 🛠️ Setup Instructions

### Prerequisites:
- XAMPP or any PHP server
- MySQL

### Steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Princey1227/Trip-Registration-Form.git
````

2. **Start Apache & MySQL** from XAMPP.

3. **Create the database**:

   * Open phpMyAdmin.
   * Create a database named `trip`.
   * Run the following SQL to create the table:

     ```sql
     CREATE TABLE registrations (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(100),
         age INT,
         gender VARCHAR(10),
         email VARCHAR(100),
         phone VARCHAR(20),
         description TEXT,
         photo VARCHAR(255),
         dt DATETIME DEFAULT CURRENT_TIMESTAMP
     );
     ```

4. **Run the project**:

   * Open your browser and go to:

     ```
     http://localhost/Trip-Registration-Form/index.php
     ```

## 📄 License

This project is for learning and demonstration purposes only. Feel free to use or modify.

---

**Made with ❤️ by [Prince Yadav](https://github.com/Princey1227)**

```

---

Let me know if you'd like it customized with screenshots, deployment instructions, or badges!
```
