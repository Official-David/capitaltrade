<?php

namespace App\Enums;

enum TransactionStatus:string
{ case Pending = 'pending';
    case Confirm = 'confirmed';
    case Decline = 'declined';
}
