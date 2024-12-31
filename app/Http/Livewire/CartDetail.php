<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartDetail extends Component
{
    public $get_carts;
    public $quantity_count = [];
    public $price_qount = [];

    protected $listeners = ['updateData' => 'mount'];

    public function mount()
    {
        $this->getCart();
        foreach ($this->get_carts as $key => $cart) {
            $this->quantity_count[$key] = $cart->quantity;
            $this->price_qount[$key] = $cart->product->price * $this->quantity_count[$key];
        }
    }

    public function render()
    {
        return view('livewire.cart-detail');
    }

    public function getCart()
    {
        $this->get_carts = Carts::with('product')
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function cartCounter($key, $value)
    {
        $this->quantity_count[$key] = max(0, $this->quantity_count[$key] + $value);
        $this->price_qount[$key] = $this->get_carts[$key]->product->price * $this->quantity_count[$key];
        if ($this->quantity_count[$key] <= $this->get_carts[$key]->product->stock) {
            $cart = Carts::firstOrNew([
                'user_id' => Auth::user()->id,
                'id' => $this->get_carts[$key]->id,
            ]);
            $cart->quantity = $this->quantity_count[$key];
            $cart->save();
        }
    }
}
