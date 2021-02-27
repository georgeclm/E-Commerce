<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\tokoProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $total;
    public $value;
    public $home;
    public $order;

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
        $currentURL = url()->current();
        if ($currentURL == "http://127.0.0.1:8000") {
            $this->home = true;
        } else if ($currentURL == "http://127.0.0.1:8000/myorders") {
            $this->order = true;
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
