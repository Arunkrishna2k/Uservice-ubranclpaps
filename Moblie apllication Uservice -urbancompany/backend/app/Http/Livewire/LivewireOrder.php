<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;

class LivewireOrder extends LivewireDatatable
{
   public $model = Order::class;
    protected $listeners = ['delete'];

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('order_by')->label('Order By'),
            Column::name('phone')->label('Phone'),
            Column::name('price')->label('Total Price'),
            Column::name('date')->label('Order Date'),
            Column::name('payment_mode')->label('Payment Mode'),
            Column::name('otp')->label('OTP'),
            Column::name('otp_status')->label('OTP Status'),
            Column::name('order_product')->label('Order Product'),
            Column::callback(['id', 'order_by'], function ($id, $order_by) {
                return view('livewire.livewire-order', ['id' => $id, 'order_by' => $order_by]);
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
        Order::where('id', $id)->delete();
    }
}
