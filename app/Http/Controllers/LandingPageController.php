<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertiJual;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $properti = PropertiJual::all();

        $query = PropertiJual::query();

        if ($request->has('filter') && $request->input('filter') !== '') {
            $filter = $request->input('filter');

            if (in_array($filter, ['1', '2', '3'])) {
                $query->where('id_kategori', $filter);
            }
        }

        $properti = $query->paginate(10);

        return view('landingpage', compact('properti'));
    }
}
