<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use Livewire\Component;

class CsLayer1 extends Component
{
    public $get_list_order;
    public $search;

    public function mount()
    {
        $this->search = 'Payakumbuh ';
        $this->getListorder();
    }

    public function render()
    {
        return view('livewire.cs-layer1');
    }

    public function getListorder()
    {
        $this->get_list_order =  Orders::with('order_detail.product')->with('payment')
            ->whereHas('order_detail.product', function ($query) {
                $query->whereRaw('LOWER(product_name) like ?', ['%' . strtolower($this->search) . '%']);
            })
            ->orWhereRaw('LOWER(status) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(destination_address) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('CAST(user_id AS TEXT) like ?', ['%' . strtolower($this->search) . '%'])
            ->orderBy('id', 'asc')
            ->get();
    }
}
