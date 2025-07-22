

# 📋 Complaint Management System

A web-based complaint management system developed for **STI College Caloocan** to streamline the process of submitting, tracking, and resolving student complaints.

---
<h1>Progress During Development</h1>

During the development of this system, I faced many struggles and moments of stress — but overall, I enjoyed what I was doing in this project. It was built using Laravel, a technology I was learning entirely from scratch.

It wasn’t easy to develop this system. It took around two months to complete while I was also studying Laravel and other supporting technologies.

As of July 13, 2025, the progress focused on improving the Admin features, particularly in managing user complaints.

I had no prior experience with Laravel, but now I’ve successfully built this system on my own. It’s more than just a functioning project — it’s a learning journey that helped me gain real development skills.

Update – July 23, 2025

Ten days after tracking my progress, I’m proud to say that I’ve completed the Complaint Management System! During the remaining days, I encountered several bugs, errors, and issues with the connection between Laravel and Livewire.

Through this, I realized that if you want to learn this kind of technology, you need to be genuinely curious and willing to explore — because honestly, it’s not easy. But I promise, it’s fun and worth it! 😄 HAHAHAHA

The system is now fully functional and was built completely from scratch.

---
## 🚀 Features

- Student Complaint Submission (3 complaints per day)<br>
- Admin Complaint Management<br>
- Complaint Logging<br>
- Role-based Access (Student & Admin)<br>
- Authentication & Password Security<br>
- Complaint Tracker ID<br>
- Search Bar<br>
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
## SYSTEM
STUDENTS OVERVIEW

Student Login –
Students are restricted from creating an account. Only the admin is allowed to add student accounts.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/ff0c9f5d-5733-4c9d-8647-f4820da30d2c" />

Forgot Password –
If a student forgets their password, it can be easily retrieved.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/456712fd-8dd7-489a-a677-84cf64e23053" />
<img width="1913" height="1080" alt="image" src="https://github.com/user-attachments/assets/2ae18e62-690a-4812-bdf9-8f13c387d2b6" />

Home Page –
Students can easily track the latest complaints, resolved complaints, and the status of their own complaints.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/2809f565-558b-4caf-807d-8230b98712e7" />

Submit Complaint –
Students can submit complaints to help the school identify issues more efficiently.
Upon submission, they can choose to submit the complaint either with their identity or anonymously.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/a3b62ef8-d352-488b-bc51-e70076c350ca" />

Limited Sumbit Complaint - Students allowed 3 complaints submitted per day
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/160ed58b-a027-48e4-9484-a65b4babd437" />

Tracking Complaints –
Students can view all their submitted complaints along with detailed information and submitter data.
<img width="1919" height="1080" alt="image" src="https://github.com/user-attachments/assets/01788d1b-7321-48ee-8bda-d29434c526fb" />
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/18864713-5e5e-47b7-aa22-d8203b53a818" />

Edit Complaint –
Students can edit their complaints, but only if the status is Pending or In Progress.
Editing is not allowed once the complaint is marked as Resolved.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/8623975b-bb33-4acc-867e-3281f16acc43" />
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/807b9dfc-178d-478c-b5d8-eab1e28792d7" />
ADMIN OVERVIEW

Admin Dashboard –
Admins can easily monitor and manage all student complaints.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/78eea76e-c6f6-459e-be53-a7182f38d0db" />

Actions –
Admins are authorized to update or change the status of student complaints.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/dde81035-21e6-457f-8529-2d8ab32cd1f2" />
 -Once the complaint is in the in-progress mode, admin can add Progress note 
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/0b5b93ba-e3ed-4a25-b264-7935aeefd2dc" />
-After the in-progress mode, admin can manipulate the status and mark as resolved (added resolution note)
<img width="1920" height="1079" alt="image" src="https://github.com/user-attachments/assets/ae1f6d7f-3649-4e0c-b104-296e4b19dff8" />


Complaint Logs –
Admins can view logs of all complaint activities for recordkeeping and audit purposes.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/80d519db-def5-4827-a163-f020312925c5" />

Student Accounts –
Only admins have access to add new students or delete existing student accounts.
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/b5f7da78-6b0a-433f-8886-f08ecb7d3a5d" />

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
