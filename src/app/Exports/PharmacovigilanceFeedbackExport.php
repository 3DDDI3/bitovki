<?php

namespace App\Exports;

use App\Models\RequestModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PharmacovigilanceFeedbackExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $requestModel = RequestModel::query()
            ->orderBy('created_at', 'desc')
            ->get([
                'medication',
                'series',
                'dosing',
                'indication',
                'treatment_beginning',
                'treatment_ending',
                'reaction_beginning',
                'reaction_ending',
                'reaction_description',
                'actions',
                'therapy',
                'other_medication',
                'other',
                'sender',
                'communication_method',
                'age',
                'pregnancy_duration',
                'sender_type_id',
                'gender_id',
                'created_at'
            ]);


        foreach ($requestModel as $model) {
            $model->sender_type_id = $model->senders?->name;
            $model->gender_id = $model->gender?->name;
            $model->date = $model->created_at->format('d.m.Y');
            unset($model->created_at);
        }

        return $requestModel;
    }

    public function headings(): array
    {
        return [
            'Название лекарственного препарата',
            'Серия',
            'Режим дозирования',
            'Показания к применению',
            'Период начала лечения',
            'Период окончания лечения',
            'Дата возникновения нежелательной реакции',
            'Дата окончания нежелательной реакции',
            'Описание реакции',
            'Действия для купирования реакции',
            'Лекарственная/немедикаментозная терапия',
            'Другие лекарственные препараты',
            'Другие данные анамнеза',
            'ФИО',
            'Способ связи',
            'Возраст ребенка',
            'Срок беременности',
            'Тип отправителя',
            'Пол',
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
            'K' => 30,
            'L' => 30,
            'M' => 30,
            'N' => 30,
            'O' => 30,
            'P' => 30,
            'Q' => 30,
            'R' => 30,
            'S' => 30,
            'T' => 30,
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
            'K1' => ['font' => ['bold' => true, 'size' => 14]],
            'L1' => ['font' => ['bold' => true, 'size' => 14]],
            'M1' => ['font' => ['bold' => true, 'size' => 14]],
            'N1' => ['font' => ['bold' => true, 'size' => 14]],
            'O1' => ['font' => ['bold' => true, 'size' => 14]],
            'P1' => ['font' => ['bold' => true, 'size' => 14]],
            'Q1' => ['font' => ['bold' => true, 'size' => 14]],
            'R1' => ['font' => ['bold' => true, 'size' => 14]],
            'S1' => ['font' => ['bold' => true, 'size' => 14]],
            'T1' => ['font' => ['bold' => true, 'size' => 14]],
        ];
    }
}
