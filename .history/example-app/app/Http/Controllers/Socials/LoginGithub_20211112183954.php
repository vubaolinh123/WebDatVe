<?php

namespace App\Http\Socials\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Http\Controllers\Traits\Socail;

class LoginGithub extends Controller
{
    use Socail;
    public function driver()
    {
        return 'github';
    }
}
