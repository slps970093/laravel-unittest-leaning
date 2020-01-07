<?php

namespace Tests\Unit\Repositories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;
use App\Repositories\User as UserRepo;

class UserTest extends TestCase
{

    use CreatesApplication;

    use RefreshDatabase;

    /**
     * @var UserRepo
     */
    private $repo;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->createApplication();
        var_dump($_ENV);
        $this->repo = app(UserRepo::class);
    }

    /**
     * @test
     */
    public function create()
    {
        $appendData = [
            'name' => '肥雨',
            'email' => 'oops@gmail.com',
            'password' => '66666'
        ];
        $res = $this->repo->append($appendData);
        $afterData = $this->repo
            ->getDataByPrimaryKey($res->id)
            ->only(['name','email','password'])
            ->toArray();
        $this->assertEquals($appendData,$afterData);
    }

    /**
     * @test
     */
    public function update() {
        $appendData = [
            'name' => '肥雨',
            'email' => 'oops@gmail.com',
            'password' => '66666'
        ];
        $afterData = [
            'name' => '肥雨',
            'email' => 'oops@gmail.com',
            'password' => '66666'
        ];
        $res = $this->repo->append($appendData);
        $this->repo->modifyByPrimaryKey(['password' => $afterData['password']],$res->id);
        $dbResult = $this->repo->getDataByPrimaryKey($res->id)
            ->only(['name','email','password'])
            ->toArray();
        $this->assertEquals($afterData,$dbResult);
    }
}
