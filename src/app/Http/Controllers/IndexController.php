<?php

namespace App\Http\Controllers;

use App\Filters\IndexMedicationFilter;
use App\Models\Constructor\Page;
use App\Models\MainPage;
use App\Models\Medication;
use App\Models\MedicationTypes;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(IndexMedicationFilter $filter)
    {
        return view('pages.index');
    }
}
