

# 📋 Complaint Management System

A web-based complaint management system developed for **STI College Caloocan** to streamline the process of submitting, tracking, and resolving student complaints.

---
<h1>Progress During Development</h1>

During the development of this system, I experienced many struggles and moments of stress. This project was built using Laravel — a technology I was learning from scratch.
It wasn’t easy to develop this system. It took around two months to build while I was also studying Laravel and other supporting technologies.
As of July 13, 2025, the current progress is focused on improving the Admin functions, particularly in managing user complaints and maintaining the audit log system.
I had no prior background in Laravel. But now, I’ve successfully built this system on my own. It’s more than just a working project — it’s a learning journey that helped me gain real development skills.

---
## 🚀 Features

- Student Complaint Submission<br>
- Admin Complaint Management<br>
- Audit Logging<br>
- Role-based Access (Student & Admin)<br>
- Authentication & Password Security<br>
- Complaint Tracker ID<br>
- Priority & Search Bar<br>
- Modal-Based Complaint View<br>
- Responsive User Interface<br>
- Password Change Functionality<br>
- Submitter Identity Options (Anonymous/With Consent)<br>

---

## 🛠️ Built With

- <span>Laravel</span> – PHP web application framework<br>
- <span>Blade</span> – Laravel templating engine<br>
- <span>Tailwind CSS</span> – Utility-first CSS framework<br>
- <span>Daisy UI</span> – Tailwind CSS framework library <br>
- <span>Alpine.js</span> – Lightweight JavaScript framework<br>
- <span>MySQL</span> – Relational database<br>

---

## ⚙️ Installation
```bash
git clone https://github.com/CodeWithRibo/ComplaintManagementSystem-STICaloocan.git
cd ComplaintManagementSystem-STICaloocan
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
