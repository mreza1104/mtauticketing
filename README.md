🎫 MTAU Ticketing

Sistem ticketing berbasis Laravel yang siap pakai dengan fitur role, seeder, dan manajemen user lengkap.

🚀 Cara Menggunakanya

    1. Clone repositori ini

    git clone https://github.com/mreza1104/mtauticketing.git
    cd mtauticketing

    2. Salin file .env
    cp .env.example .env

    Lalu edit file .env sesuai dengan konfigurasi database lokal kamu s:

    DB_DATABASE=nama_database
    DB_USERNAME=root
    B_PASSWORD=

    3. Install dependency composer

    composer install

    4. Generate key Laravel

    php artisan key:generate

    5. Jalankan migrate + seeder
    php artisan migrate:fresh --seed

    6.Install dependency frontend
    npm install

    7.Build assets frontend Bisa pilih salah satu:
    npm run dev     # untuk development
    npm run build   # untuk production di termninal 1

    8. php artisan serve



    👤 Login Akun Default

    Email	                Password	            Role
    admin@admin.com	        password123	            admin
    agent@agent.com	        password123	            agent
    (10 user random)	   password123	           user
    ini bisa di kustom



    ###Dev by Mtau Team (Reza,Ayman,Galih,Yuda)
