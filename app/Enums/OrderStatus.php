<?php

namespace App\Enums;


enum OrderStatus: string
{
    /**
     * User / guest cart.
     */
    case CART = 'CART';

    /**
     * Order has been placed by the customer.
     */
    case NEW_ORDER = 'NEW';

    /**
     * Payment is on hold.
     */
    case PAYMENT_ON_HOLD = 'PAYMENT_ON_HOLD';


    /**
     * Payment failed.
     */
    case PAYMENT_FAILED = 'PAYMENT_FAILED';


    /**
     * Payment is pending.
     */
    case PAYMENT_PENDING = 'PAYMENT_PENDING';


    /**
     * Payment has been paid.
     */
    case PAYMENT_PAID = 'PAYMENT_PAID';


    /**
     * Order is completed.
     */
    case COMPLETED = 'COMPLETED';
}
