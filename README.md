

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Run __npm install__
- Run __npm run build__ or __npm run dev__ - whichever you prefer
- That's it: launch the main URL.
- You can register as regular user or login as admin to manage data with default credentials __admin@admin.com__ - __password__


🛠️ Laravel Setup with Seeder & Role System (Spatie)
✅ 1. Install Laravel
bash
Copy
Edit
composer create-project laravel/laravel nama-proyek
cd nama-proyek
✅ 2. Setup .env
Edit file .env untuk konfigurasi database:

makefile
Copy
Edit
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
✅ 3. Install Spatie Laravel Permission
bash
Copy
Edit
composer require spatie/laravel-permission
✅ 4. Publish Config & Migrate
bash
Copy
Edit
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
✨ 5. Edit Model User.php
Tambahkan trait HasRoles:

php
Copy
Edit
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
🌱 6. Buat Seeder untuk Roles dan Users
🔸 RolesSeeder
php
Copy
Edit
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'agent']);
        Role::create(['name' => 'user']);
    }
}
🔸 DatabaseSeeder
php
Copy
Edit
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            // tambahkan seeder lain kalau ada
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $agent = User::factory()->create([
            'name' => 'Agent User',
            'email' => 'agent@agent.com',
            'password' => Hash::make('password123'),
        ]);
        $agent->assignRole('agent');

        User::factory(10)->create([
            'password' => Hash::make('password123')
        ])->each(fn($user) => $user->assignRole('user'));
    }
}
🔁 7. Run Migration & Seeder
bash
Copy
Edit
php artisan migrate:fresh --seed
🧪 8. Test Login
Email	Password	Role
admin@admin.com	password123	admin
agent@agent.com	password123	agent
random user (x10)	password123	user