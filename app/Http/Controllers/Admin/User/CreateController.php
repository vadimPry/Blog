<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {
        $roles = User::getRoles();

        return view('admin.user.create', compact('roles'));
    }
}
