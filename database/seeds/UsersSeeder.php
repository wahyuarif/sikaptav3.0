<?php

use Illuminate\Database\Seeder;
// added
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin role
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();

        // Mahasiswa role
        $mahasiswaRole = new Role();
        $mahasiswaRole->name = 'mahasiswa';
        $mahasiswaRole->display_name = 'Mahasiswa';
        $mahasiswaRole->save();

        // Dosen role
        $dosenRole = new Role();
        $dosenRole->name = 'dosen';
        $dosenRole->display_name = 'Dosen';
        $dosenRole->save();

        // Sampel Admin
        $admin = new User();
        $admin->name = 'Admin Sikapta';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        // Sampel Mahasiswa
        $admin = new User();
        $admin->name = 'Wahyu Arif Kurniawan';
        $admin->email = 'wahyuarif@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($mahasiswaRole);
        
        // Sampel Dosen
        $admin = new User();
        $admin->name = 'Dosen Sikapta';
        $admin->email = 'dosen@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($dosenRole);
        


    }
}
