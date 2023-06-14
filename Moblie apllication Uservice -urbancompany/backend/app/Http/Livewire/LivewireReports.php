<?php

namespace App\Http\Livewire;

use App\Models\Scan;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LivewireReports extends LivewireDatatable
{
    public $model = Scan::class;

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('register_number')->label('Reg Number'),
            DateColumn::name('date')->label('Date'),
            Column::callback(['bag'], function ($bag) {
                return $bag == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">'
                    . 'Yes' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">'
                    . 'No' . '</span>';
            })->label('Bag'),
            Column::callback(['lunch'], function ($lunch) {
                return $lunch == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">'
                    . 'Yes' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">'
                    . 'No' . '</span>';
            })->label('Lunch'),
            Column::callback(['dinner'], function ($dinner) {
                return $dinner == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">'
                    . 'Yes' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">'
                    . 'No' . '</span>';
            })->label('Dinner'),
            Column::name('other_1')->label('Comments'),
        ];
    }
}
