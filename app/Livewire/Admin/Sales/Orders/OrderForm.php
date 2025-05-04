<?php

namespace App\Livewire\Admin\Sales\Orders;


use App\Enums\MenuItemType;
use App\Enums\OrderStatus;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Order;
use App\Services\OrderStatusService;
use App\Traits\Admin\Menu\BaseSalesMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class OrderForm extends BaseAdminComponent
{
    use BaseSalesMenuItems;


    public Order $order;


    public function cancel(): void
    {
        app(OrderStatusService::class)->cancelOrder($this->order);

        $this->alertSuccess(__('pages.orders.cancelSuccess'));

        $this->order->refresh();
    }


    public function complete(): void
    {
        app(OrderStatusService::class)->completeOrder($this->order);

        $this->alertSuccess(__('pages.orders.completeSuccess'));

        $this->order->refresh();
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.sales.orders.form'), title: __('pages.orders.title'));
    }


    public function showCancelButton(): bool
    {
        return match ($this->order->status) {
            OrderStatus::NEW_ORDER,
            OrderStatus::PAYMENT_PENDING,
            OrderStatus::PAYMENT_ON_HOLD => true,
            default => false,
        };
    }


    public function showCompleteButton(): bool
    {
        return match ($this->order->status) {
            OrderStatus::PAYMENT_PAID,
            OrderStatus::NEW_ORDER => true,
            default => false,
        };
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: __('pages.orders.show'),
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.orders.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
