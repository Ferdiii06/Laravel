<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(['name'=>'Admin','email'=>'admin@example.test','password'=>Hash::make('password123')]);
    }
}

class DepartmentSeeder extends Seeder
{
   public function run(): void
    {
        $now = Carbon::now();
        DB::table('departments')->insert([
            ['nama_department' => 'Human Resources', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_department' => 'Information Technology', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_department' => 'Finance', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_department' => 'Marketing', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_department' => 'Operations', 'created_at'=> $now, 'updated_at'=> $now],
        ]);
    }
    
}

class PositionSeeder extends Seeder
{
   public function run(): void
    {
        $now = Carbon::now();
        DB::table('positions')->insert([
            ['nama_jabatan' => 'Manager', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_jabatan' => 'Supervisor', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_jabatan' => 'Staff', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_jabatan' => 'Intern', 'created_at'=> $now, 'updated_at'=> $now],
            ['nama_jabatan' => 'Director', 'created_at'=> $now, 'updated_at'=> $now],
        ]);
    }
    
}

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
        ]);
    }
}