<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Actions\Fortify\PasswordUpdateResponse;
use App\Actions\Fortify\UpdateUserPassword;

class PasswordController extends Controller
{
    
    public function update(Request $request, UpdateUserPassword $updater)
    {
        $updater->update($request->user(), $request->all());

        return app(PasswordUpdateResponse::class);
    }
}
