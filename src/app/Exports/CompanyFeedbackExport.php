<?php

namespace App\Exports;

use App\Models\CompanyRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CompanyFeedbackExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $companyRequest = CompanyRequest::query()
            ->orderBy('created_at', 'desc')
            ->get([
                'fio',
                'phone',
                'address',
                'email',
                'text',
                'mediaction_title',
                'dosing',
                'seria',
                'sender_type_id',
                'created_at',
            ]);

        foreach ($companyRequest as $company) {
            $company->sender_type_id = $company->senders->name;
            $company->date = $company->created_at->format('d.m.Y');
            unset($company->created_at);
        }

        return $companyRequest;
    }

    public function headings(): array
    {
        return [
            'ФИО',
            'Телефон',
            'Адрес',
            'Email',
            'Сообщение',
            'Препарат',
            'Форма выпуска',
            'Номер серии',
            'Тип',
            'Дата',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'J' => 30,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1' => ['font' => ['bold' => true, 'size' => 14]],
            'B1' => ['font' => ['bold' => true, 'size' => 14]],
            'C1' => ['font' => ['bold' => true, 'size' => 14]],
            'D1' => ['font' => ['bold' => true, 'size' => 14]],
            'E1' => ['font' => ['bold' => true, 'size' => 14]],
            'F1' => ['font' => ['bold' => true, 'size' => 14]],
            'G1' => ['font' => ['bold' => true, 'size' => 14]],
            'H1' => ['font' => ['bold' => true, 'size' => 14]],
            'I1' => ['font' => ['bold' => true, 'size' => 14]],
            'J1' => ['font' => ['bold' => true, 'size' => 14]],
        ];
    }
}
