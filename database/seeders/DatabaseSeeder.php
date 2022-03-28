<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'gunwalddr@gmail.com',
            'password' => bcrypt('fap9hbm@xqc7CTZ-dnf'),
            'is_admin' => true,
            'premium' => true]);
        $admin->save();

        $domainOne = Domain::create([
            'domain' => 'firstdomain.com',
            'subdomain' => false,
            'premium' => false,
        ]);
        $domainOne->save();

        $domainTwo = Domain::create([
            'domain' => 'seconddomain.com',
            'subdomain' => false,
            'premium' => false,
        ]);
        $domainTwo->save();

        $domainThree = Domain::create([
            'domain' => 'anotherdomain.com',
            'subdomain' => false,
            'premium' => true,
        ]);
        $domainThree->save();
    }
}
