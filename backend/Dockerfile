# ------------------- Backend Dockerfile -------------------
# ใช้ Node.js image เวอร์ชัน 18-alpine เป็น base image (alpine มีขนาดเล็ก)
FROM node:18-alpine

# กำหนด Working Directory ภายใน Container
WORKDIR /usr/src/app

# คัดลอกไฟล์ package.json และ package-lock.json เข้าไปใน container ก่อน
# เพื่อใช้ประโยชน์จาก Docker layer caching ทำให้ไม่ต้อง install dependencies ใหม่ทุกครั้งที่แก้โค้ด
COPY package*.json ./

# ติดตั้ง Dependencies ทั้งหมด
RUN npm install

# คัดลอกไฟล์โค้ดทั้งหมดของโปรเจกต์เข้าไปใน Container
COPY . .

# ระบุ Port ที่แอปพลิเคชันของเราทำงานอยู่
EXPOSE 3001

# คำสั่งที่จะรันเมื่อ Container เริ่มทำงาน
CMD [ "npm", "start" ]
