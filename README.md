# CSE327-Software-Engineering-

**Name**: Jihan Bakshi
**ID**: 2211661042
**<hr>** 

# Course Search Module, Student Settings Module - SkillPro

This module allows administrators and instructors to **search courses** in the SkillPro platform. It includes form validation, database updates, and security measures to ensure safe and efficient course modifications.

The **Student Settings Module** allows administrators and instructors to **manage student records** in the SkillPro platform. It includes functionalities to **add**, **edit**, **update**, and **delete** student information. The module ensures a smooth user experience with robust validation, secure database operations, and an intuitive interface for managing student records.

## Features
- Search course
- Settings Module

## Security Measures
- Uses **prepared statements** to prevent SQL injection.
- **Validates and sanitizes** user input.
- Restricts file upload types and size.
- Only **authorized users** can edit courses.

- **Prepared statements** are used to prevent SQL injection attacks.
- **Input validation and sanitization** to ensure only safe data is processed.
- **File upload restrictions** based on file types and sizes to prevent malicious uploads.
- **Role-based access control** ensures that only authorized users can perform actions on student records.


## Coding Standards
To ensure code maintainability and readability, follow these standards:
- **PHP**: Use PSR-12 coding standards.
- **JavaScript**: Follow best practices.
- **CSS**: Use BEM methodology for class naming.
- **Security**: Always sanitize inputs and use prepared statements.
- **File Naming**: Use lowercase with underscores (e.g., `update_course.php`).
- **Comments**: Add meaningful comments where necessary.


## License
This project is licensed under the **MIT License**.

---

