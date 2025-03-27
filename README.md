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
1. **Course Edit Page**
   ![Course Edit Page](https://i.postimg.cc/d0rWbpKk/Screenshot-2025-03-27-114518.png)

2. **Course Update Form with Filled Data**
   ![Course Update Form](https://i.postimg.cc/Gt7zP1vN/Screenshot-2025-03-27-114817.png)

3. **Course Edit Success Message**
   ![Course Edit Success](https://i.postimg.cc/BQbmSX0G/Screenshot-2025-03-27-114958.png)


## Contribution Guidelines
1. Fork the repository.
2. Create a new branch: `git checkout -b feature-course-edit`.
3. Commit changes: `git commit -m 'Added new course edit feature'`.
4. Push changes: `git push origin feature-course-edit`.
5. Create a pull request.

## License
This project is licensed under the **MIT License**.

---

