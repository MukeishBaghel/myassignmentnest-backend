<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  function addPage() {
    return view('super-admin.add-page');
  }
}
