<?php


namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function getBillmanForDropDown()
    {
//        Cache::forget('billmans');
        return Cache::rememberForever('billmans', function(){
            return $this->model->with('roles')->select('id', 'name')->whereHas('roles', function($q) {
                $q->whereNotIn('name', ['customer', 'reseller']);
            })->where('branch_id', auth()->user()->branch_id)->where('status', 1)->get();
        });
    }
}
