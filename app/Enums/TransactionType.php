<?php

namespace App\Enums;

enum TransactionType: string
{
    case Deposit = 'deposit';
    case Withdrawal = 'withdrawal';
    case PendingWithdrawal = 'pending withdrawal';
    case Investment = 'investment';
    case Roi = 'roi';
    case Returned = 'returned capital';
    case ReferralBonus = 'referral commission';
}
