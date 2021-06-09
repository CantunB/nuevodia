<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class Roles_Permisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** @acces roles */
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'read_roles']);
        Permission::create(['name' => 'update_roles']);
        Permission::create(['name' => 'delete_roles']);

        /** @acces permisos */
        Permission::create(['name' => 'create_permisos']);
        Permission::create(['name' => 'read_permisos']);
        Permission::create(['name' => 'update_permisos']);
        Permission::create(['name' => 'delete_permisos']);

        /** @acces usuarios */
        Permission::create(['name' => 'create_usuarios']);
        Permission::create(['name' => 'read_usuarios']);
        Permission::create(['name' => 'update_usuarios']);
        Permission::create(['name' => 'delete_usuarios']);

        /** @acces distritos */
        Permission::create(['name' => 'create_distritos']);
        Permission::create(['name' => 'read_distritos']);
        Permission::create(['name' => 'update_distritos']);
        Permission::create(['name' => 'delete_distritos']);

        /** @acces lideres */
        Permission::create(['name' => 'create_lideres']);
        Permission::create(['name' => 'read_lideres']);
        Permission::create(['name' => 'update_lideres']);
        Permission::create(['name' => 'delete_lideres']);

        /** @acces movilizadores */
        Permission::create(['name' => 'create_movilizadores']);
        Permission::create(['name' => 'read_movilizadores']);
        Permission::create(['name' => 'update_movilizadores']);
        Permission::create(['name' => 'delete_movilizadores']);

        /** @acces tocados */
        Permission::create(['name' => 'create_tocados']);
        Permission::create(['name' => 'read_tocados']);
        Permission::create(['name' => 'update_tocados']);
        Permission::create(['name' => 'delete_tocados']);

        /** @acces simpatizantes con clave */
        Permission::create(['name' => 'create_simpatizantes']);
        Permission::create(['name' => 'read_simpatizantes']);
        Permission::create(['name' => 'update_simpatizantes']);
        Permission::create(['name' => 'delete_simpatizantes']);

        /** @acces  simpatizantes sin clave */
        Permission::create(['name' => 'create_simpatizantes_sc']);
        Permission::create(['name' => 'read_simpatizantes_sc']);
        Permission::create(['name' => 'update_simpatizantes_sc']);
        Permission::create(['name' => 'delete_simpatizantes_sc']);

        /** @acces propietarios */
        Permission::create(['name' => 'create_propietarios']);
        Permission::create(['name' => 'read_propietarios']);
        Permission::create(['name' => 'update_propietarios']);
        Permission::create(['name' => 'delete_propietarios']);

        $capturista = Role::create(['name' => 'capturista']);
        $capturista->givePermissionTo([
            //Lideres
            'create_lideres',
            'read_lideres',
            'update_lideres',
            'delete_lideres',
            //Movilizadores
            'create_movilizadores',
            'read_movilizadores',
            'update_movilizadores',
            'delete_movilizadores',
            //Tocados
            'create_tocados',
            'read_tocados',
            'update_tocados',
            'delete_tocados',
        ]);
        $callcenter = Role::create(['name' => 'callcenter']);
        $callcenter->givePermissionTo([
            //Propietarios
            'create_propietarios',
            'read_propietarios',
            'update_propietarios',
            'delete_propietarios',
            //Simpatizantes
            'read_simpatizantes',
            //Simpatizantes sin clave
            'create_simpatizantes_sc',
            'read_simpatizantes_sc',
            'update_simpatizantes_sc',
            'delete_simpatizantes_sc',
        ]);
        $administrador = Role::create(['name' => 'administrador']);
        $administrador->givePermissionTo([
            //Lideres
            'create_lideres',
            'read_lideres',
            'update_lideres',
            'delete_lideres',
            //Movilizadores
            'create_movilizadores',
            'read_movilizadores',
            'update_movilizadores',
            'delete_movilizadores',
            //Tocados
            'create_tocados',
            'read_tocados',
            'update_tocados',
            'delete_tocados',
            //Propietarios
            'create_propietarios',
            'read_propietarios',
            'update_propietarios',
            'delete_propietarios',
            //Simpatizantes
            'create_simpatizantes',
            'read_simpatizantes',
            'update_simpatizantes',
            'delete_simpatizantes',
            //Simpatizantes sin clave
            'create_simpatizantes_sc',
            'read_simpatizantes_sc',
            'update_simpatizantes_sc',
            'delete_simpatizantes_sc',
            //Distritos
            'create_distritos',
            'read_distritos',
            'update_distritos',
            'delete_distritos',
        ]);

        $invitado = Role::create(['name' => 'invitado']);
        $super_admin = Role::create(['name' => 'Super Admin'])->givePermissionTo([Permission::all()]);

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::create([
            'clave_elector' => 'CADB0989123',
            'nombre' => 'Bernabe',
            'paterno' => 'Cantun',
            'materno' => 'Dominguez',
            'celular' => '9381726488',
            'email' => 'cantunberna@gmail.com',
            'password' => bcrypt('Cantun97.-'),
            'estatus' => '0',
        ]);
        $user->assignRole($super_admin);

       // factory(User::class, 10)->create();
    }
}
