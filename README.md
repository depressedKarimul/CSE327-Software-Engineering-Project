**Name**: S. M Karimul Hassan  
**ID**: 2212688642
**<hr>** 

# Course Edit Module - SkillPro

This module allows administrators and instructors to **edit course details** in the SkillPro platform. It includes form validation, database updates, and security measures to ensure safe and efficient course modifications.

## Features
- Edit course title, description, price, and content.
- Image and file uploads with validation.
- Security measures (SQL injection prevention, input validation).
- User role-based access control.

## File Structure
```
/course-edit
  ├── edit_course.php         # Main course edit logic
  ├── update_course.php       # Handles course updates (backend)
  ├── styles.css              # Styling for edit page
  ├── script.js               # Client-side validation
  ├── assets/
  │   ├── images/             # Course images
  │   ├── uploads/            # File uploads
```

## Installation & Setup
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-repo/skillpro.git
   ```
2. **Navigate to the course edit module**
   ```bash
   cd skillpro/course-edit
   ```
3. **Configure Database Connection** in `database.php`
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'skillpro_db');
   ```
4. **Start a local server**
   ```bash
   php -S localhost:8000
   ```
5. Open `http://localhost:8000/course-edit/edit_course.php` in your browser.

## Usage
- Login as an **Instructor/Admin**.
- Navigate to the **Edit Course** section.
- Modify the required fields.
- Click **Update Course** to save changes.
- Success/error messages will be displayed accordingly.

## Security Measures
- Uses **prepared statements** to prevent SQL injection.
- **Validates and sanitizes** user input.
- Restricts file upload types and size.
- Only **authorized users** can edit courses.

## API Endpoints
| Method | Endpoint           | Description |
|--------|-------------------|-------------|
| GET    | `/edit_course.php?id=1` | Fetch course details |
| POST   | `/update_course.php`    | Update course details |

## Screenshots
![Course Edit Page](assets/images/course-edit.png)

## Coding Standards
To ensure code maintainability and readability, follow these standards:
- **PHP**: Use PSR-12 coding standards.
- **JavaScript**: Follow ES6+ best practices.
- **CSS**: Use BEM methodology for class naming.
- **Security**: Always sanitize inputs and use prepared statements.
- **File Naming**: Use lowercase with underscores (e.g., `update_course.php`).
- **Comments**: Add meaningful comments where necessary.

## Contribution Guidelines
1. Fork the repository.
2. Switch to your branch:
   ```bash
   git checkout karimul
   ```
3. Make your changes and commit:
   ```bash
   git commit -m 'Updated course edit feature'
   ```
4. Push changes:
   ```bash
   git push origin karimul
   ```
5. Create a pull request.

## License
This project is licensed under the **MIT License**.

---