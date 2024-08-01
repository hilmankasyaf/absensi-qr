<?php

namespace App\Http\Controllers;

use App\Models\Role;

class SomeController extends Controller
{
    public function someMethod()
   {
    $role = new Role();
    $role->name = 'Admin'; // Menetapkan nilai
    $role->save(); // Menyimpan ke database
    dd($role); // Debugging
    }
}