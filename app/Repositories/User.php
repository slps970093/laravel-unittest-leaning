<?php


namespace App\Repositories;

use App\User as UserEntity;
use Illuminate\Database\Eloquent\Collection;

class User
{

    private $entity;

    public function __construct(UserEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param $data
     * @return Collection
     */
    public function append($data)
    {
        return $this->entity->create($data);
    }

    /**
     * @param $primaryKey
     * @return Collection
     */
    public function getDataByPrimaryKey($primaryKey)
    {
        return $this->entity->find($primaryKey);
    }

    /**
     * @param $data
     * @param $primaryKey
     * @return mixed
     */
    public function modifyByPrimaryKey($data, $primaryKey)
    {
        return $this->entity->where('id', $primaryKey)->update($data);
    }
}
