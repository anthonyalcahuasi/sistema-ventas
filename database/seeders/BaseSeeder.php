<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use Spatie\Permission\Models\Role;

class BaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $vendedorRole = Role::firstOrCreate(['name' => 'vendedor']);

        // Crear usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@ventas.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('admin123'),
            ]
        );
        $admin->assignRole($adminRole);

        // Crear clientes (sin factory)
        Client::insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@mail.com',
                'phone' => '123456789',
                'address' => 'Av. Lima 123',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Empresa X',
                'email' => 'ventas@x.com',
                'phone' => '987654321',
                'address' => 'Av. Industrial 456',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana@mail.com',
                'phone' => '456789123',
                'address' => 'Jr. Arequipa 789',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Crear productos
        Product::insert([
            [
                'name' => 'Gigantografía A0',
                'description' => 'Impresión gran formato en alta calidad.',
                'price' => 150.00,
                'category' => 'Gigantografías',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Impresión Full Color',
                'description' => 'Impresión tamaño carta a color.',
                'price' => 25.00,
                'category' => 'Impresiones',
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Banner 1x2m',
                'description' => 'Banner publicitario con tubos y ojales.',
                'price' => 60.00,
                'category' => 'Publicidad',
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
