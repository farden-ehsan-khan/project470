<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

// use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */



    public function test_user_name_check()
    {
        $Userlogin = new User;
        $Userlogin->name = "farden";

        $this->assertEquals($Userlogin->name,"farden");

    }

    public function test_user_email_check()
    {
        $Userlogin = new User;
        $Userlogin->email = "farden@gmail.com";


        $this->assertEquals($Userlogin->email,"farden@gmail.com");

    }
}
