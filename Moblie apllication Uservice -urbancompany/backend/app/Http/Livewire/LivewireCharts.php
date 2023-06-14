<?php

namespace App\Http\Livewire;

use App\Models\Billing;
use App\Models\Whitelist;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;
use Carbon\Carbon;

class LivewireCharts extends Component
{
    public $types = ['White List', 'Black List', 'Total'];
    public $colors = [
        'White List' => '#f6ad55',
        'Black List' => '#fc8181',
        'Total' => '#90cdf4'
    ];
    public $firstRun = true;
    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
         $expenses = Whitelist::where('status', 1)->get();
         $columnChartModel = $expenses->groupBy('id')
             ->reduce(
                 function (ColumnChartModel $columnChartModel, $data) {
                     $mode = $data->first()->id;
                     $value = $data->sum('id');
                     return $columnChartModel->addColumn($mode, $value, $this->colors[$mode]);
                 },
                 (new ColumnChartModel())
                     ->setTitle('Expenses by mode')
                     ->setAnimated($this->firstRun)
                     ->withOnColumnClickEventName('onColumnClick')
             );
//         $pieChartModel = $expenses->groupBy('type')
//             ->reduce(
//                 function (PieChartModel $pieChartModel, $data) {
//                     $mode = $data->first()->mode;
//                     $value = $data->sum('freight_charge');
//                     return $pieChartModel->addSlice($mode, $value, $this->colors[$mode]);
//                 },
//                 (new PieChartModel())
//                     ->setTitle('Expenses by mode')
//                     ->setAnimated($this->firstRun)
//                     ->withOnSliceClickEvent('onSliceClick')
//             );
        // $lineChartModel = $expenses
        //     ->reduce(
        //         function (LineChartModel $lineChartModel, $data) use ($expenses) {
        //             $index = $expenses->search($data);
        //             $amountSum = $expenses->take($index + 1)->sum('freight_charge');
        //             if ($index == 6) {
        //                 $lineChartModel->addMarker(7, $amountSum);
        //             }
        //             if ($index == 11) {
        //                 $lineChartModel->addMarker(12, $amountSum);
        //             }
        //             return $lineChartModel->addPoint($index, $amountSum, ['id' => $data->id]);
        //         },
        //         (new LineChartModel())
        //             ->setTitle('Expenses mode')
        //             ->setAnimated($this->firstRun)
        //             ->withOnPointClickEvent('onPointClick')
        //     );
        // $areaChartModel = $expenses
        //     ->reduce(
        //         function (AreaChartModel $areaChartModel, $data) use ($expenses) {
        //             return $areaChartModel->addPoint($data->freight_charge, $data->freight_charge, ['id' => $data->id]);
        //         },
        //         (new AreaChartModel())
        //             ->setTitle('Expenses Peaks')
        //             ->setAnimated($this->firstRun)
        //             ->setColor('#f6ad55')
        //             ->withOnPointClickEvent('onAreaPointClick')
        //             ->setXAxisVisible(false)
        //             ->setYAxisVisible(true)
        //     );
        $this->firstRun = false;
        return view('livewire.livewire-charts')
             ->with([
                 'columnChartModel' => $columnChartModel,
//                 'pieChartModel' => $pieChartModel,
//                 'lineChartModel' => $lineChartModel,
//                 'areaChartModel' => $areaChartModel,
             ])
            ;
    }
}
