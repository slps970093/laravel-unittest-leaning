<?php


namespace App\Repositories;

use App\User as UserEntity;
use Illuminate\Database\Eloquent\Collection;

class Users
{

    private $entity;

    public function __construct(UserEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * 建立資料並回傳 Primary Key
     * @param $data
     * @return integer
     */
    public function append($data)
    {
        $res = $this->entity->create($data);

        return $res->id;
    }

    /**
     * 取得資料
     * @param $primaryKey
     * @return Collection
     */
    public function getDataByPrimaryKey($primaryKey)
    {
        $res = $this->entity->find($primaryKey);

        return $res;
    }
}
