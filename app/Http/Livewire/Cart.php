<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;

class Cart extends Component
{
    public $cartItems = [];

    public function mount()
    {
        $this->cartItems = session()->get('cart', []);
    }

    public function addToCart($menuId)
    {
        $menu = Menu::find($menuId);
        
        if (!$menu) {
            return;
        }

        if (isset($this->cartItems[$menuId])) {
            $this->cartItems[$menuId]['quantity']++;
        } else {
            $this->cartItems[$menuId] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $this->cartItems);
        $this->emit('cartUpdated');
    }
} 