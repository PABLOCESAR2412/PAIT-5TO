<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\User;

class BarUserController extends Controller
{
    public function getTotalClients()
    {
        $totalUsers = User::count();

        return response()->json(['totalUsers' => $totalUsers]);
    }

    public function getTotalProducts()
    {
        $totalProducts = Producto::count();

        return response()->json(['totalProducts' => $totalProducts]);
    }

    public function getTotalSales()
    {
        $totalSales = Venta::count();

        return response()->json(['totalSales' => $totalSales]);
    }
}
