<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    public function adminCheck()
    {
        if (auth()->check()) {
            $acctype = auth()->user()->acctype;
            return $acctype == 'Admin';
        }
        return false;
    }

    public function sellerCheck()
    {
        if (auth()->check()) {
            $acctype = auth()->user()->acctype;
            return $acctype == 'Seller';
        }
        return false;
    }

    public function updateCheck($product)
    {
        if (auth()->check()) {
            $acctype = auth()->user()->acctype;
            return ($acctype == 'Seller' && $product->seller == auth()->user()->id) || ($acctype == 'Admin');
        }
        return false;
    }
}
