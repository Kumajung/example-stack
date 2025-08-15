# ------------------- Frontend Dockerfile -------------------
# ใช้ Node.js image เวอร์ชัน 18-alpine เป็น base image
FROM node:19-alpine

# กำหนด Working Directory ภายใน Container
WORKDIR /app

# คัดลอกไฟล์ package.json และ package-lock.json
COPY package*.json ./

# ติดตั้ง Dependencies
RUN npm install

# คัดลอกไฟล์โค้ดทั้งหมดของโปรเจกต์
COPY . .

# ระบุ Port ที่ React development server ทำงาน
EXPOSE 3000

# คำสั่งสำหรับรัน React development server
CMD [ "npm", "start" ]
