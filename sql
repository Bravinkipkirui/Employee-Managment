CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  department VARCHAR(50),
  position VARCHAR(50),
  contact_info VARCHAR(255),
  hire_date DATE
);

CREATE TABLE attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  clock_in DATETIME,
  clock_out DATETIME,
  hours_worked DECIMAL(5, 2),
  FOREIGN KEY (employee_id) REFERENCES employees(id)
);

CREATE TABLE leaves (
  id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  leave_type VARCHAR(50),
  start_date DATE,
  end_date DATE,
  status ENUM('pending', 'approved', 'rejected'),
  leave_balance INT,
  FOREIGN KEY (employee_id) REFERENCES employees(id)
);

CREATE TABLE performance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  employee_id INT,
  evaluation_date DATE,
  review TEXT,
  rating DECIMAL(3, 2),
  FOREIGN KEY (employee_id) REFERENCES employees(id)
);
