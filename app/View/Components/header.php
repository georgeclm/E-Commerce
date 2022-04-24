<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\tokoProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $total;
    public $value;

    public function __construct()
    {
        if (Auth::user()) {
            $userId = auth()->id();
            $data = tokoProfile::where('user_id', $userId)->count();
            if ($data == 0) {
                $this->value =  false;
            } else {
                $this->value =  true;
            }
            $userId = auth()->id();
            $this->total = Cart::where('user_id', $userId)->count();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
