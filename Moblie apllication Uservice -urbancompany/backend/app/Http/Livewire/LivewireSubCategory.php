<?php

namespace App\Http\Livewire;

use App\Models\SubCategory;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;

class LivewireSubCategory extends LivewireDatatable
{
    public $model = SubCategory::class;
    protected $listeners = ['delete'];

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('category')->label('Category'),
            Column::name('sub_category')->label('Sub Category'),
            Column::callback(['photo'], function ($photo) {
                return $photo != ''
                ? '<img width="70" height="70" class="max-w-full h-auto rounded-full" src="/storage/' . $photo . '">' :
                '<img width="70" height="70" class="max-w-full h-auto rounded-full" src="/images/avatar.png" >';
            })->label('Photo'),
            Column::name('remarks')->label('Remarks'),
            Column::callback(['status'], function ($status) {
                return $status == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-white">'
                    . 'Active' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-white">'
                    . 'In-Active' . '</span>';
            })->label('Status'),
            Column::callback(['id', 'sub_category'], function ($id, $sub_category) {
                return view('livewire.livewire-sub-category', ['id' => $id, 'sub_category' => $sub_category]);
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
        SubCategory::where('id', $id)->delete();
    }
}
