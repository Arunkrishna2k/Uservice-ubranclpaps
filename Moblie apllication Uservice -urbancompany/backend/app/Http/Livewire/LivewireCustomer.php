<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LivewireCustomer extends LivewireDatatable
{
    public $model = Customer::class;
    protected $listeners = ['delete'];

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('register_number')->label('Reg Number'),
            Column::name('customer_name')->label('Customer Name'),
            Column::name('phone_number')->label('Phone Number'),
            Column::name('email')->label('Email'),
            Column::name('register_type')->label('Category'),
            Column::callback(['status'], function ($status) {
                return $status == 1
                    ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-white">'
                    . 'Active' . '</span>' :
                    '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-white">'
                    . 'In-Active' . '</span>';
            })->label('Status'),
            Column::callback(['id', 'phone_number'], function ($id, $phone_number) {
                return view('livewire.livewire-customer', ['id' => $id, 'phone_number' => $phone_number]);
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
        Customer::where('id', $id)->delete();
    }
}
