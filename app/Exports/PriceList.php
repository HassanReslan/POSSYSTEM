<?php

namespace App\Exports;

use App\Models\Stocks;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;



class PriceList implements FromView,WithStyles,WithColumnWidths,WithEvents
{

   /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:D1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('DD4B39');
            },
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 45,
            'c' => 45, 
            'd' => 20,             
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            'B' => ['font' => ['size' => 16] ,['color'=>'FFFFFF'] ],
            'C'  => ['font' => ['size' => 16]],
            'D'  => ['font' => ['size' => 16]],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function view(): View
    {
     
        return view('export.pricelist', [
            'pricelists' => Stocks::select('product_name','product_code','sale_price')->get(),
        ]);
    }

}
