<?php

namespace App\Enums;

enum InvestmentStatus: string
{
    case Pending = 'pending';
    case Confirm = 'confirmed';
    case Decline = 'declined';
    case End = 'ended';
}
