<?php

namespace App\Livewire\Web\Order;


use App\Contracts\ShippingInterface;
use App\Facades\Cart as CartFacade;
use App\Models\Cart;
use App\Models\Order;
use App\Services\BillingManager;
use App\Services\ShippingManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;


class SummaryOrder extends Component
{
    public Order $order;

    public function mount(): void
    {
        if (! URL::hasValidSignature(request())) {
            abort(Response::HTTP_FORBIDDEN);
        }
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.order.summary', [
        ])->layout('components.layouts.web-page-card', [
            'title' => 'Podsumowanie zamówienia',
        ]);
    }
}
