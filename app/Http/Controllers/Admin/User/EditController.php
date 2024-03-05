<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(User $user): View
    {
        $roles = User::getRoles();

        return view('admin.user.edit', compact('user', 'roles'));
    }
}
