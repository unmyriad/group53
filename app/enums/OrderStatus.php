<?php

namespace App\enums;

enum OrderStatus:string
{
    case Pending = "pending";
    case Packed = "packed";

    case Shipped = "shipped";

    case Delivered = "delivered";
}
