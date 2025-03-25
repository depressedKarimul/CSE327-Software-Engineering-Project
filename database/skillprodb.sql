CREATE DATABASE skillProDB;
-- User Table
CREATE TABLE User (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('student', 'instructor', 'admin') NOT NULL,
  profile_pic VARCHAR(255) DEFAULT NULL,
  bio TEXT DEFAULT NULL,
  is_approved TINYINT(1) DEFAULT 0,
  -- 0 for not approved, 1 for approved
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Instructor Table
CREATE TABLE Instructor (
  instructor_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  expertise VARCHAR(255),
  total_courses INT DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Student Table
CREATE TABLE Student (
  student_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  total_courses_enrolled INT DEFAULT 0,
  progress DECIMAL(5, 2) DEFAULT 0.0,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Course Table
CREATE TABLE Course (
  course_id INT AUTO_INCREMENT PRIMARY KEY,
  instructor_id INT,
  title VARCHAR(255),
  description TEXT,
  category VARCHAR(100),
  difficulty ENUM('beginner', 'intermediate', 'advanced'),
  price DECIMAL(10, 2),
  status ENUM('active', 'inactive'),
  FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id) ON DELETE CASCADE
);
-- Course_Content Table
CREATE TABLE Course_Content (
  content_id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  type ENUM('video', 'article', 'quiz'),
  title VARCHAR(255),
  file_url VARCHAR(255),
  content_duration TIME,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Category Table
CREATE TABLE Category (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(100) UNIQUE
);
-- Quiz Table
CREATE TABLE Quiz (
  quiz_id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  total_questions INT,
  passing_marks INT,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Question Table
CREATE TABLE Question (
  question_id INT AUTO_INCREMENT PRIMARY KEY,
  quiz_id INT,
  question_text TEXT,
  question_type ENUM('multiple_choice', 'true_false', 'short_answer'),
  answer TEXT,
  FOREIGN KEY (quiz_id) REFERENCES Quiz(quiz_id) ON DELETE CASCADE
);
-- Certificate Table
CREATE TABLE Certificate (
  certificate_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  issue_date DATE,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Enrollment Table
CREATE TABLE Enrollment (
  enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  enrollment_date DATE,
  completion_date DATE,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Payment Table
CREATE TABLE Payment (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  amount DECIMAL(10, 2),
  payment_date DATE,
  transaction_id VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Review Table
CREATE TABLE course_reviews (
  review_id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  user_id INT,
  rating INT CHECK (
    rating BETWEEN 1 AND 5
  ),
  comment TEXT,
  review_date DATE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Admin Table
CREATE TABLE Admin (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  permissions_level ENUM('low', 'medium', 'high'),
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Course_Approval Table
CREATE TABLE Course_Approval (
  approval_id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT,
  course_id INT,
  approval_status ENUM('approved', 'rejected', 'pending'),
  approval_date DATE,
  FOREIGN KEY (admin_id) REFERENCES Admin(admin_id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE
);
-- Forum_Post Table
CREATE TABLE Forum_Post (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT,
  user_id INT,
  post_text TEXT,
  post_date DATE,
  FOREIGN KEY (course_id) REFERENCES Course(course_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);
-- Instructor_Approval Table
CREATE TABLE Instructor_Approval (
  approval_id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT,
  user_id INT,
  approval_status ENUM('approved', 'rejected', 'pending'),
  approval_date DATE,
  FOREIGN KEY (admin_id) REFERENCES Admin(admin_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
);