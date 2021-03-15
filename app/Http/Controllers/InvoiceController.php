<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index()
    {
        $carbon = Carbon::now();

        return view('invoice.show', compact('carbon'));
    }
}
