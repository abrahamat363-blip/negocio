<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder {
    public function run(): void {
        Client::create(['name'=>'Cliente Demo','email'=>'cliente@demo.com','phone'=>'555-000','address'=>'Calle 1']);
    }
}
