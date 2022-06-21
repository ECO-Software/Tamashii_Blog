<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Generate roles
        $role_sa = Role::create([
            'name' => 'sa',
            'description' => 'Super Admininstrador'
        ]);

        $role_admin = Role::create([
            'name' => 'admin',
            'description' => 'Administrador'
        ]);

        $role_blogger = Role::create([
            'name' => 'blogger',
            'description' => 'Blogero'
        ]);

        // Generate permissions

        Permission::create([
            'name' => 'admin.index',
            'description' => 'Acceso al panel de administración'
        ])->syncRoles([$role_sa, $role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Listar roles'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear roles'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar roles'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar roles'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Listar usuarios'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar usuarios'
        ])->syncRoles([$role_sa]); // Assign the permission to the role  

        Permission::create([
            'name' => 'admin.users.destroy',
            'description' => 'Eliminar usuarios'
        ])->syncRoles([$role_sa]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Listar categorías'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear categorías'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar categorías'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Eliminar categorías'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.tags.index',
            'description' => 'Listar etiquetas'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.tags.create',
            'description' => 'Crear etiquetas'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => 'Editar etiquetas'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => 'Eliminar etiquetas'
        ])->syncRoles([$role_admin]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.posts.index',
            'description' => 'Listar posts'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.posts.create',
            'description' => 'Crear posts'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => 'Editar posts'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => 'Eliminar posts'
        ])->syncRoles([$role_admin, $role_blogger]); // Assign the permission to the role

        /*$role_admin->syncPermissions(Permission::all());
        $role_blogger->syncPermissions(Permission::whereIn('name', [
            'admin.posts.index',
            'admin.posts.create',
            'admin.posts.edit',
            'admin.posts.destroy'
        ])->get());*/
    }
}
