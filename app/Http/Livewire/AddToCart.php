<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class AddToCart extends Component
{
    public $menuId;
    public $quantity = 1;

    public function mount($menuId)
    {
        $this->menuId = $menuId;
    }

    public function addToCart()
    {
        $menu = Menu::find($this->menuId);
        
        if(!$menu) return;

        $cart = session()->get('cart', []);

        if(isset($cart[$this->menuId])) {
            $cart[$this->menuId]['quantity'] += $this->quantity;
        } else {
            $cart[$this->menuId] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->image,
                'quantity' => $this->quantity
            ];
        }

        session()->put('cart', $cart);
        $this->emit('cartUpdated');
        
        $this->dispatchBrowserEvent('menu-added', [
            'message' => 'Menu berhasil ditambahkan ke keranjang'
        ]);
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
} 