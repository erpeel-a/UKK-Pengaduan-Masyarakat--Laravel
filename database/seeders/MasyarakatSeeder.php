<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->char('nik', 16)->unique();
        // $table->string('username');
        // $table->string('nama');
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');
        // $table->string('no_telp', 13);
        \DB::table('masyarakat')->insert([
            'nik' => 1234567890987654,
            'username' => 'masyarakat1',
            'password' => bcrypt('masyarakat1'),
            'nama' => 'masyarakat1',
            'no_telp' => 1234567890987
        ]);
    }
}
