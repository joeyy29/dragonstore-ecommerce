-- Insert a default admin user
INSERT INTO users (username, password, is_admin) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', TRUE); -- password is "password"

-- Insert some sample products
INSERT INTO products (name, description, price, image) VALUES
('Laptop', 'A high-performance laptop.', 1200.00, 'laptop.jpg'),
('Smartphone', 'A latest model smartphone.', 800.00, 'smartphone.jpg'),
('Headphones', 'Noise-cancelling headphones.', 200.00, 'headphones.jpg');