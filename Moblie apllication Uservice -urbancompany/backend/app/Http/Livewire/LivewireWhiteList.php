<?php

namespace App\Http\Livewire;

use App\Models\Whitelist;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LivewireWhiteList extends LivewireDatatable
{
    public $model = Whitelist::class;
    protected $listeners = ['delete'];

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('phone')->label('Phone Number'),
            Column::name('name')->label('Name'),
            Column::name('department')->label('Department'),
            Column::name('duration')->label('Duration'),
            Column::name('remarks')->label('Remarks'),
            Column::callback(['status'], function ($status) {
                return $status == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-white">'
                    . 'Active' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-white">'
                    . 'In-Active' . '</span>';
            })->label('Status'),
            Column::callback(['id', 'phone'], function ($id, $phone) {
                return view('livewire.livewire-white-list', ['id' => $id, 'phone' => $phone]);
            })
        ];
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure ?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        Whitelist::where('id', $id)->delete();
    }
}
