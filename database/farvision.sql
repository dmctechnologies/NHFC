-- Create database
CREATE DATABASE IF NOT EXISTS farvision;
USE farvision;

-- Create kids table
CREATE TABLE IF NOT EXISTS kids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    story TEXT NOT NULL,
    need TEXT NOT NULL,
    amount_needed DECIMAL(10, 2) NOT NULL,
    paypal_link VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data (you can modify or remove this)
INSERT INTO kids (name, age, image_url, story, need, amount_needed, paypal_link) VALUES
(
    'Maria Santos',
    8,
    'uploads/maria.jpg',
    'Maria is a bright and cheerful 8-year-old who dreams of becoming a teacher. She lives with her grandmother in a small rural village. Despite facing hardships, Maria excels in school and helps other children with their homework. Her grandmother struggles to provide basic necessities while ensuring Maria can continue her education.',
    'School supplies, uniform, and books for the upcoming school year',
    250.00,
    'https://www.paypal.com/donate/?hosted_button_id=YOUR_BUTTON_ID_1'
),
(
    'James Omondi',
    12,
    'uploads/james.jpg',
    'James is a resilient 12-year-old boy with a passion for learning. After losing his parents to illness, he now lives with his elderly aunt who works as a street vendor. James walks 5 kilometers daily to attend school because education is his pathway to a better future. He dreams of becoming a doctor to help his community.',
    'School fees, medical checkup, and nutritious meals',
    400.00,
    'https://www.paypal.com/donate/?hosted_button_id=YOUR_BUTTON_ID_2'
),
(
    'Fatima Ali',
    10,
    'uploads/fatima.jpg',
    'Fatima is a talented 10-year-old artist who loves drawing and painting. She uses art as a way to express herself and bring joy to others in her community. Living in a crowded urban area with her single mother who works multiple jobs, Fatima rarely has proper art supplies but continues to create beautiful work with whatever she can find.',
    'Art supplies, educational materials, and clothing',
    180.00,
    'https://www.paypal.com/donate/?hosted_button_id=YOUR_BUTTON_ID_3'
);

-- Create admin users table (optional - for adding/managing kids)
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Note: Remember to create a secure password hash
-- Example: INSERT INTO admin_users (username, password) VALUES ('admin', PASSWORD('your_secure_password'));