<?php

namespace App\Http\Controllers;

use App\Filters\IndexMedicationFilter;
use App\Models\Constructor\Page;
use App\Models\Main\AdditionalOption;
use App\Models\Main\Information;
use App\Models\Main\OurWork;
use App\Models\Main\Page as ModelsMainPage;
use App\Models\Main\QA;
use App\Models\Main\Review;
use App\Models\Main\Variant;
use App\Models\MainPage;
use App\Models\Medication;
use App\Models\MedicationTypes;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(IndexMedicationFilter $filter)
    {
        $page = ModelsMainPage::query()->find(1);

        $additionalOptions = AdditionalOption::query()
            ->orderBy('id')
            ->get();

        $reviews = Review::query()
            ->orderBy('id')
            ->get();

        $informations = Information::query()
            ->orderBy('id')
            ->get()
            ->split(2);

        $variants = Variant::query()
            ->orderBy('id')
            ->get();

        $ourWorks = OurWork::query()
            ->orderBy('id')
            ->get();

        $qa = QA::query()
            ->orderBy('rating', 'desc')
            ->get();

        return view('pages.index', [
            'page' => $page,
            'additionalOptions' => $additionalOptions,
            'reviews' => $reviews,
            'informations' => $informations,
            'variants' => $variants,
            'ourWorks' => $ourWorks,
            'qa' => $qa,
        ]);
    }
}
