<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard'); // Pastikan ada file blade 'admin/dashboard.blade.php'
    }
}