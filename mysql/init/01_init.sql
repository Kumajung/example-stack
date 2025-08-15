-- Initial database schema/sample data
CREATE TABLE IF NOT EXISTS hello_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  message VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO hello_messages (message) VALUES ('Hello from MySQL + PHP + Portainer!');
