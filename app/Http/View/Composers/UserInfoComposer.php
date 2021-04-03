<?php


namespace App\Http\View\Composers;


use App\Helpers\CommonHelper;
use App\Helpers\HttpRequestHelper;
//use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserInfoComposer
{
    public function compose(View $view)
    {
        $user = CommonHelper::getUserInfo();
        dd($user);

        end:
        $view->with(['user' => $user]);
    }
}