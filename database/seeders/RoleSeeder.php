<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Comerciante']);
        $role3 = Role::create(['name' => 'Almacenador']);
        $role4 = Role::create(['name' => 'Supervisor']);
        $role5 = Role::create(['name' => 'RRHH']);
        $role6 = Role::create(['name' => 'Marketing']);

        Permission::create(['name' => 'backup.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'backup.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'backup.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'backup.delete'])->syncRoles([$role1]);

        Permission::create(['name' => 'cliente.index'])->syncRoles([$role1, $role5, $role4]);
        Permission::create(['name' => 'cliente.create'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'cliente.update'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'cliente.delete'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'empleado.index'])->syncRoles([$role1, $role5, $role4]);
        Permission::create(['name' => 'empleado.create'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'empleado.update'])->syncRoles([$role1, $role5]);
        Permission::create(['name' => 'empleado.delete'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'producto.index'])->syncRoles([$role1, $role5, $role4]);
        Permission::create(['name' => 'producto.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'producto.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'producto.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'categoria.index'])->syncRoles([$role1, $role3, $role4]);
        Permission::create(['name' => 'categoria.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categoria.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categoria.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'marca.index'])->syncRoles([$role1, $role3, $role4]);
        Permission::create(['name' => 'marca.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'marca.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'marca.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'proveedor.index'])->syncRoles([$role1, $role3, $role4]);
        Permission::create(['name' => 'proveedor.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'proveedor.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'proveedor.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'promociones.index'])->syncRoles([$role1, $role6, $role4]);
        Permission::create(['name' => 'promociones.create'])->syncRoles([$role1, $role6]);
        Permission::create(['name' => 'promociones.update'])->syncRoles([$role1, $role6]);
        Permission::create(['name' => 'promociones.delete'])->syncRoles([$role1, $role6]);

        Permission::create(['name' => 'tiposPagos.index'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'tiposPagos.create'])->syncRoles($role1);
        Permission::create(['name' => 'tiposPagos.update'])->syncRoles($role1);
        Permission::create(['name' => 'tiposPagos.delete'])->syncRoles($role1);

        Permission::create(['name' => 'notaIngreso.index'])->syncRoles([$role1, $role3, $role4]);
        Permission::create(['name' => 'notaIngreso.show'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaIngreso.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaIngreso.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaIngreso.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'notaBaja.index'])->syncRoles([$role1, $role3, $role4]);
        Permission::create(['name' => 'notaBaja.show'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaBaja.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaBaja.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'notaBaja.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'bitacora.index'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'bitacora.export'])->syncRoles($role1);

        Permission::create(['name' => 'pedidos.index'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'pedidos.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pedidos.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pedidos.factura'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'promoMail.send'])->syncRoles([$role1, $role6]);
    }
}
