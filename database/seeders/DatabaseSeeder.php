<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
//        $user = \App\Models\User::factory()
//            ->count(1)
//            ->create([
//                'email' => 'admin@admin.com',
//                'password' => \Hash::make('admin'),
//            ]);
//
//        $this->call(CompanySeeder::class);
//        $this->call(CompanySettingSeeder::class);
//        $this->call(UserSeeder::class);
        $permissions = \App\Models\Permission::where('guard_name','web')->get();
        $role = \App\Models\Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',

        ]);
//        $role->syncPermissions($permissions);
//        $permissions->sync([])
        $company = \App\Models\Company::factory()->create([
            'name' => 'Thconnect',
            'email' => 'admin@thconect.nl',
            'phone' => '+3235559657',
            'country' => 'NL',
        ]);

        $session_team_id = getPermissionsTeamId();
        $user =  \App\Models\User::factory()->create([
            'name' => 'Serhii',
            'last_name' => 'Pashchenko',
            'email' => 'admin@admin.com',
            'phone' => '+380508553205',
            'country' => 'UA',
            'company_id' => $company->id,
            //            'slug' => Str::slug($this->faker->firstName.' '.$this->faker->lastName),
            'password' => Hash::make('admin'),
        ]);
        $company->users()->sync([$user->id]);
        setPermissionsTeamId($company->id);
        $user->assignRole($role->id);
        $user->companies()->sync($company->id, $user->id);
        setPermissionsTeamId($session_team_id);
    }
}
