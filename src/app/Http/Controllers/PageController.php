<?php

namespace App\Http\Controllers;

use App\Filters\MedicationFilter;
use App\Filters\NewsFilter;
use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\Constructor\Block;
use App\Models\Constructor\Page;
use App\Models\Medication;
use App\Models\MedicationPreview;
use App\Models\MedicationReseach;
use App\Models\MedicationTypes;
use App\Models\News;
use App\Models\SenderType;
use App\Models\Setting;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index($url, Request $request, MedicationFilter $mfilter, NewsFilter $nfilter)
    {
        $company = Company::query()->find(1);
        $companyContacts = CompanyContact::query()->orderBy('id')->get();

        switch ($url) {
            case 'pharmacovigilance':

                $page = Page::query()->find(9);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name
                    ],
                ]);

                $blocks = Block::query()
                    ->where(['page_id' => 9])
                    ->orderBy('rating', 'desc')
                    ->get();

                return view('pages.pharmacovigilance', [
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                    'blocks' => $blocks,
                    'page' => $page,
                ]);
                break;

            case 'about':

                $medications = MedicationPreview::query()
                    ->whereNotNull(['title'])
                    ->whereHas('medication', function ($query) {
                        $query->where(['hide' => 0]);
                    })
                    ->orderBy('title')
                    ->get();

                $companyContact = CompanyContact::query()->find(1);

                $page = Page::query()->find(3);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name
                    ],
                ]);

                $settings = Setting::query()->find(1);

                $senderTypes = SenderType::query()
                    ->orderBy('type')
                    ->get();

                $blocks = Block::query()
                    ->where(['page_id' => 3])
                    ->get();

                $socialNetworks = SocialNetwork::all();

                return view('pages.about', [
                    'blocks' => $blocks,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContact' => $companyContact,
                    'medications' => $medications,
                    'senderTypes' => $senderTypes,
                    'settings' => $settings,
                    'page' => $page,
                    'socialNetworks' => $socialNetworks,
                ]);
                break;

            case 'afs-production':

                $page = Page::query()->find(4);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name
                    ],
                ]);

                $blocks = Block::query()
                    ->where(['page_id' => 4])
                    ->orderBy('rating', 'desc')
                    ->get();

                return view('pages.afs-production', [
                    'blocks' => $blocks,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                ]);
                break;

            case 'glf-production':

                $page = Page::query()->find(5);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name
                    ],
                ]);

                $blocks = Block::query()
                    ->where(['page_id' => 5])
                    ->orderBy('rating', 'desc')
                    ->get();

                return view('pages.glf-production', [
                    'blocks' => $blocks,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                ]);
                break;

            case 'medications':

                $page = Page::query()->find(7);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name
                    ],
                ]);

                $medicationTypes = MedicationTypes::query()
                    ->orderBy("type")
                    ->get();

                $medications = Medication::filter($mfilter)
                    ->where(['hide' => 0])
                    ->orderBy('rating', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);

                return view('pages.medications', [
                    'medicationTypes' => $medicationTypes,
                    'medications' => $medications,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                ]);
                break;

            case 'medication':

                $medication = Medication::query()
                    ->where(['hide' => 0, 'id' => $request->id])
                    ->first();

                if (!$medication)
                    abort(404);

                $page = Page::query()->find(7);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name,
                        'url' => '/pages/medications'
                    ],
                    (object)[
                        'name' => $medication->preview?->title
                    ],
                ]);

                $reseaches = MedicationReseach::all();

                return view('pages.medication', [
                    'medication' => $medication,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                    'reseaches' => $reseaches,
                ]);

                break;

            case 'news':

                $page = Page::query()->find(8);

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => $page->name,
                    ],
                ]);

                $news = News::filter($nfilter)
                    ->where(['hide' => 0])
                    ->whereNull('main_news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);

                $altNews = News::filter($nfilter)
                    ->where(['hide' => 0])
                    ->whereNotNull('main_news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);

                $years = News::query()
                    ->selectRaw('year(created_at) as year')
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->get();

                return view('pages.news', [
                    'news' => $news,
                    'years' => $years,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                    'altNews' => $altNews,
                    'page' => $page,
                ]);

                break;

            case 'contacts':

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => 'Контакты',
                    ],
                ]);

                $company = Company::query()->find(1);
                $companyContacts = CompanyContact::query()->orderBy('id')->get();

                $socialNetworks = SocialNetwork::all();
                $settings = Setting::query()->find(1);

                return view('pages.contacts', [
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                    'settings' => $settings,
                    'socialNetworks' => $socialNetworks,
                ]);

                break;

            case 'pharmaceutical-development':

                $breadCrumbs = collect([
                    (object)[
                        'name' => 'Главная',
                        'url' => '/',
                    ],
                    (object)[
                        'name' => 'Фармацевтическая разработка',
                    ],
                ]);

                $blocks = Block::query()
                    ->where(['page_id' => 6])
                    ->orderBy('rating', 'desc')
                    ->get();

                return view('pages.pharmaceutical-development', [
                    'blocks' => $blocks,
                    'breadCrumbs' => $breadCrumbs,
                    'company' => $company,
                    'companyContacts' => $companyContacts,
                ]);
                break;

            default:
                abort(404, '');
                break;
        }
    }
}
