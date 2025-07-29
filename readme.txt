สิ่งที่ต้องทำเพื่อให้ PHP เชื่อมต่อ Database ได้:
เมื่อคุณพร้อมที่จะให้ PHP เชื่อมต่อ Database ได้อย่างถูกต้อง คุณจะต้อง:

ใส่เนื้อหาลงในไฟล์ docker-multi-php-app/db_init/init.sql:

ใช้เนื้อหาที่เราได้คุยกันไปก่อนหน้านี้ เพื่อสร้างฐานข้อมูลและผู้ใช้ที่จำเป็นสำหรับแต่ละโปรเจกต์:

docker-multi-php-app/db_init/init.sql

29 ก.ค. 17:48
บังคับให้ MariaDB Container รัน init.sql อีกครั้ง:

เนื่องจาก init.sql จะถูกรันเฉพาะตอนที่ Container เริ่มต้นครั้งแรกและ Volume ว่างเปล่า (หรือเมื่อมีการสร้าง Container และ Volume ใหม่) คุณจะต้องลบ Volume ข้อมูลเก่าของ MariaDB ออกไปก่อน แล้วค่อยรัน docker compose up -d ใหม่ครับ

คำสั่ง:

Bash

docker compose down -v # คำสั่งนี้จะลบ containers และ volumes ที่เกี่ยวข้อง (รวมถึงข้อมูลใน DB เก่า)
docker compose up -d
คำเตือนสำคัญ: โปรดระวังว่า docker compose down -v จะลบข้อมูลในฐานข้อมูลที่คุณอาจมีอยู่ (ถ้ามี) หากคุณมีข้อมูลสำคัญใน mysql_data Volume อยู่แล้วและต้องการเก็บไว้ คุณจะต้องหาวิธีสำรองข้อมูลก่อน (เช่น ใช้ mysqldump จากภายใน Container) หรือสร้างฐานข้อมูลและผู้ใช้ด้วยตนเองหลังจาก Container รันขึ้นมาแล้ว (โดยการเข้าสู่ Shell ของ MySQL Container)