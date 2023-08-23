<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications;

use App\Const\GlobalConst;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Authentications\LogoutResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        Auth::logout();

        return response()->json(new LogoutResource(['status' => GlobalConst::STATUS_OK]));
    }
}
