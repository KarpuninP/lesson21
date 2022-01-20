<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // обрашение в бд
        $users = User::query()->limit(10)->get();
         // перебор
        foreach ($users as $user) {
            echo $user->email . '<br>';
        }
    }


    // проверка вывода в роуте
    public function test()
    {
        echo 'hi';
    }
}
