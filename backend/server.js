const express = require('express');
const mysql = require('mysql2');
const cors = require('cors'); // ✅ เพิ่มตรงนี้

const app = express();
const port = 3001;

// ✅ เปิดใช้งาน CORS ให้ทุก origin หรือกำหนด origin ตามต้องการ
app.use(cors({
  origin: '*', // หรือกำหนด ['http://localhost:3000'] เพื่อจำกัดเฉพาะบางโดเมน
  methods: ['GET', 'POST', 'PUT', 'DELETE'],
  allowedHeaders: ['Content-Type', 'Authorization']
}));

// ดึงค่าการเชื่อมต่อฐานข้อมูลจาก Environment Variables
const dbConfig = {
  host: 'locahost',
  user: 'myuser',
  password: 'mypassword',
  database: 'mydatabase',
  port: 3306
};

let connection;

// ฟังก์ชันสำหรับจัดการการเชื่อมต่อ DB
function handleDisconnect() {
  connection = mysql.createConnection(dbConfig);

  connection.connect(err => {
    if (err) {
      console.error('Error connecting to database:', err.stack);
      setTimeout(handleDisconnect, 2000);
    } else {
      console.log('Successfully connected to the database.');
    }
  });

  connection.on('error', err => {
    console.error('Database error:', err);
    if (err.code === 'PROTOCOL_CONNECTION_LOST') {
      handleDisconnect();
    } else {
      throw err;
    }
  });
}

handleDisconnect();

// API Root
app.get('/', (req, res) => {
  res.send('Hello from the Node.js/Express backend!');
});

// API สำหรับเช็คสถานะ DB
app.get('/status', (req, res) => {
  connection.ping((err) => {
    if (err) {
      return res.status(500).json({ status: 'error', message: 'Database connection failed' });
    }
    res.status(200).json({ status: 'ok', message: 'Backend and Database are connected successfully!' });
  });
});

app.listen(port, () => {
  console.log(`Backend server listening at http://localhost:${port}`);
});
