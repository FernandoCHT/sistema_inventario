<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Seller']);


        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear nuevos usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show', 'description' => 'Ver información de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destory', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear nuevos roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver información de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destory', 'description' => 'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'categories.index', 'description' => 'Ver listado de categorías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.create', 'description' => 'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.edit', 'description' => 'Editar categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.destroy', 'description' => 'Eliminar categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'products.index', 'description' => 'Ver listado de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.show', 'description' => 'Ver información de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.create', 'description' => 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.edit', 'description' => 'Editar productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.destroy', 'description' => 'Eliminar productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'providers.index', 'description' => 'Ver listado de proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'providers.show', 'description' => 'Ver información de proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'providers.create', 'description' => 'Crear proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'providers.edit', 'description' => 'Editar proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'providers.destroy', 'description' => 'Eliminar proveedores'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'clients.index', 'description' => 'Ver listado de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clients.show', 'description' => 'Ver información de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clients.create', 'description' => 'Crear clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clients.edit', 'description' => 'Editar clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clients.destroy', 'description' => 'Eliminar clientes'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'purchases.index', 'description' => 'Ver listado de compras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'purchases.create', 'description' => 'Crear nuevas compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.show', 'description' => 'Ver información de compras'])->syncRoles([$role1]);

        Permission::create(['name' => 'sales.index', 'description' => 'Ver listado de ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.create', 'description' => 'Crear nuevas ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.show', 'description' => 'Ver información de ventas'])->syncRoles([$role1]);

        Permission::create(['name' => 'purchases.pdf', 'description' => 'Descargar PDF reporte de compras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sales.pdf', 'description' => 'Descargar PDF reporte de ventas'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'change.status.products', 'description' => 'Cambiar estado de productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'change.status.purchases', 'description' => 'Cambiar estado de compras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'change.status.sales', 'description' => 'Cambiar estado de ventas'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'business.index', 'description' => 'Ver datos de la empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'business.edit', 'description' => 'Editar datos de la empresa'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'reports.day', 'description' => 'Reporte por día'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reports.date', 'description' => 'Reporte por fecha'])->syncRoles([$role1, $role2]);
    }
}
