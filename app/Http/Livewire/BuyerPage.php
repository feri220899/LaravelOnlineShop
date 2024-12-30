<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BuyerPage extends Component
{
    public $list_products;
    public $get_carts;
    public $search;
    public $header;
    public $set_key;
    public $quantity_count;

    function mount()
    {
        if (Auth::check() && Auth::user()->role == 'buyer') {
            $this->getCart();
        }
        $this->listProducts();
        $this->header = true;
        $this->quantity_count = '1';
    }

    public function updatedSearch()
    {
        $this->listProducts();
        $this->header = false;
    }

    public function setKey($key)
    {
        $this->set_key = $key;
    }

    public function render()
    {
        return view('livewire.buyer-page');
    }

    public function listProducts()
    {
        $products = Products::where(function ($query) {
            $query->orWhereRaw('LOWER(product_name) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(category) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(description) like ?', ['%' . strtolower($this->search) . '%']);
        })->get();
        $this->list_products = $products;
    }

    public function getCart()
    {
        $this->get_carts = Carts::where('user_id', Auth::user()->id)->get();
    }

    public function quantityCounter($condition) {
        $this->quantity_count = max(1, $this->quantity_count + $condition);
    }

    public function singleAddCart($key)
    {
        try {
            $cart = Carts::firstOrNew([
                'user_id' => Auth::user()->id,
                'product_id' => $this->list_products[$key]->id,
            ]);
            $cart->quantity = ($cart->quantity ?? 0) + $this->quantity_count;
            $cart->save();
            $this->getCart();
            $this->quantity_count = '1';
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
