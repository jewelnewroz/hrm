<?php


namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function update(array $data, $id): bool
    {
        $user = parent::find($id);
        parent::update($data, $id);
        if( $user->hasanyrole(Role::all() ) ) {
            foreach( $user->roles as $role ) {
                $user->removeRole( $role );
            }
        }
        $user->assignRole(request()->input('role'));
        return true;
    }
}
