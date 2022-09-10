<?php

namespace App\Base\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Class BaseExport
 *
 * @package App\Base\Export
 */
class BaseExport extends DefaultValueBinder implements FromView, ShouldAutoSize, WithStyles, WithCustomValueBinder
{
    public function __construct(
        protected string $view,
        protected array $data,
    ) {
    }

    public function view(): View
    {
        return view($this->view, $this->data);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @inheritDoc
     */
    public function bindValue(Cell $cell, $value)
    {
        $cell->getStyle()->getAlignment()->setWrapText(true);

        return parent::bindValue($cell, $value);
    }
}
