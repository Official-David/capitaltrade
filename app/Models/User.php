<?php

namespace App\Models;

use App\Enums\UserRole;

use App\Enums\UserGender;
use App\Enums\UserStatus;
use App\Models\Transaction;
use App\Enums\TransactionType;
use App\Enums\InvestmentStatus;
use App\Enums\TransactionStatus;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'gender',
        'bio',
        'status',
        'address',
        'avatar',
        'referrer_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => UserStatus::class,
        'gender' => UserGender::class,
        'role' => UserRole::class,
    ];

    protected $appends = [
        'full_name',
        'account_balance',
        'referral_link',
        'active_deposit',
        'total_withdrawal',
        'total_earned',
        'total_deposit',
        'referral_earnings'
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    /**
     * Get the user's account balance.
     *
     * @return string
     */
    public function getAccountBalanceAttribute()
    {
        $deposit = Transaction::where('user_id', $this->id)->whereIn('type', [TransactionType::Deposit, TransactionType::ReferralBonus])->where('status', TransactionStatus::Confirm)->sum('amount');

        $pendingWithdrawal = Transaction::where('user_id', $this->id)->where('type', TransactionType::Withdrawal)->where('status', TransactionStatus::Pending)->sum('amount');
        $withdrawal = Transaction::where('user_id', $this->id)->where('type', TransactionType::Withdrawal)->where('status', TransactionStatus::Confirm)->sum('amount');


        $investment = Transaction::where('user_id', $this->id)->where('type', TransactionType::Investment)->where('status', TransactionStatus::Confirm)->sum('amount');

        $roi = Transaction::where('user_id', $this->id)->whereIn('type', [TransactionType::Roi, TransactionType::Returned])->where('status', TransactionStatus::Confirm)->sum('amount');

        return ($deposit + $roi) - $investment - $pendingWithdrawal - $withdrawal;
    }

    /**
     * Get the user's total earned balance.
     *
     * @return string
     */
    public function getTotalEarnedAttribute()
    {
        return Transaction::where('user_id', $this->id)->whereIn('type', [TransactionType::Roi, TransactionType::ReferralBonus])->where('status', TransactionStatus::Confirm)->sum('amount');
    }

    /**
     * Get the user's total earned balance.
     *
     * @return string
     */
    public function getTotalDepositAttribute()
    {
        return Transaction::where('user_id', $this->id)->where('type', TransactionType::Deposit)->where('status', TransactionStatus::Confirm)->sum('amount');
    }

    /**
     * Get the user's total earned balance.
     *
     * @return string
     */
    public function getReferralEarningsAttribute()
    {
        return Transaction::where('user_id', $this->id)->where('type', TransactionType::ReferralBonus)->where('status', TransactionStatus::Confirm)->sum('amount');
    }

    /**
     * Get the user's active deposit.
     *
     * @return string
     */
    public function getActiveDepositAttribute()
    {
        return Transaction::where('user_id', $this->id)->where('type', TransactionType::Deposit)->where('status', TransactionStatus::Pending)->sum('amount');
    }

    /**
     * Get the user's active deposit.
     *
     * @return string
     */
    public function getTotalWithdrawalAttribute()
    {
        return Transaction::where('user_id', $this->id)->where('type', TransactionType::Withdrawal)->where('status', TransactionStatus::Confirm)->sum('amount');
    }

    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many deposits.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class, 'user_id', 'id');
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->username]);
    }
}
