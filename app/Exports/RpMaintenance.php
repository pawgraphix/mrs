<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class RpMaintenance implements FromView, WithEvents
{
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => ['bold' => true, 'name' => 'Cambria', 'size' => 11]
        ];
        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:H1')->applyFromArray($styleArray);
                $event->sheet->getStyle('A2:H2')->applyFromArray($styleArray);
                $event->sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('A1:H1');

                for ($col = 'A'; $col !== 'I'; $col++) {
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }

                $data = count(session('items_data'));
                $count = $data + 2;

                $event->sheet->getColumnDimension('E')->setAutoSize(false);
                $event->sheet->getColumnDimension('E')->setWidth(50);
                $event->sheet->getStyle('E3:E' . $count)->getAlignment()->setWrapText(true);

//                $event->sheet->getColumnDimension('C')->setAutoSize(false);
//                $event->sheet->getColumnDimension('C')->setWidth(40);
//                $event->sheet->getStyle('C2:C' . $count)->getAlignment()->setWrapText(true);
//
//                $event->sheet->getColumnDimension('F')->setAutoSize(false);
//                $event->sheet->getColumnDimension('F')->setWidth(30);
//                $event->sheet->getStyle('F2:F' . $count)->getAlignment()->setWrapText(true);
            }];
    }

    public function view(): View
    {
        $params['items'] = session('items_data');
        return view('report.maintenance.excel', $params);
    }
}
