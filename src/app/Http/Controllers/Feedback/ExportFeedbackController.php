<?php

namespace App\Http\Controllers\Feedback;

use App\Exports\CompanyFeedbackExport;
use App\Exports\ContactFeedbackExport;
use App\Exports\FeedbackExport;
use App\Exports\PharmacovigilanceFeedbackExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportFeedbackController extends Controller
{
    public function exportCompany()
    {
        return Excel::download(new CompanyFeedbackExport, 'Анкеты по качеству.xlsx');
    }

    public function exportContact()
    {
        return Excel::download(new ContactFeedbackExport, 'Запросы.xlsx');
    }

    public function exportPharmacovigilanceController()
    {
        return Excel::download(new PharmacovigilanceFeedbackExport, 'Фармаконадзор.xlsx');
    }
}
