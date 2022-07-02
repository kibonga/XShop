<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->toArray();
        $count = 500;

        for($i=0; $i<=$count; $i++) {
            $user = $users[array_rand($users)];
            $userId = $user['id'];
            $order = Order::create(['user_id' => $userId]);
        }
    }
}
