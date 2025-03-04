<?php

namespace App\Exports;

use App\Models\ContactRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContactFeedbackExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $contactRequest = ContactRequest::query()
            ->orderBy('created_at', 'desc')
            ->get([
                'name',
                'phone',
                'text',
                'created_at'
            ]);

        foreach ($contactRequest as $contact) {
            $contact->date = $contact->created_at->format('d.m.Y');
            unset($contact->created_at);
        }

        return $contactRequest;
    }

    public function headings(): array
    {
        return [
            'Имя',
            'Телефон',
            'Сообщение',
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
        ];
    }
}
