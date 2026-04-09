<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\Client;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
     {
        $rolesCount = Role::count();       // cantidad total de roles
        $roles = Role::orderBy('name')->get();  // listado de roles
        $usersCount = User::count();
        $users = User::orderBy('name')->get();
        $employeesCount = Employee::count();
        $clientsCount = Client::count();
        $categoriesCount = ServiceCategory::count();
        $servicesCount = Service::count();


        return view('admin.dashboard', compact(
        'rolesCount', 'roles',
        'usersCount', 'users',
        'employeesCount',
        'clientsCount',
        'categoriesCount',
        'servicesCount'
    ));
    }
}