<?php

namespace App\repositories\admin;

use App\Models\Admin;
use App\Models\City;

class AdminRepository
{

    public function index()
    {
        return Admin::all();
    }

    public function store($createAdminRequest)
    {
        $createAdminRequest['s_password'] = bcrypt($createAdminRequest->s_password);
        Admin::create($createAdminRequest->all());
    }

    public function update($updateAdminRequest,$admin)
    {
        $admin->update($updateAdminRequest->all());
    }

    public function delete($admin)
    {
        $admin->delete();
    }

}
