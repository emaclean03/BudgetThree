<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Budget;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::factory()->count(5)->create([
            'user_id'=>User::first()->id,
            'budget_id'=>1,
        ]);
    }
}
