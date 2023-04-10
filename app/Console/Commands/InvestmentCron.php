<?php

namespace App\Console\Commands;

use App\Models\Investment;
use App\Models\Transaction;
use App\Enums\TransactionType;
use Illuminate\Support\Carbon;
use App\Enums\InvestmentStatus;
use Illuminate\Console\Command;
use App\Enums\TransactionStatus;
use App\Mail\InvestmentEndedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvestmentConfirmedMail;
use Illuminate\Console\Scheduling\Event;


class InvestmentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $investments = Investment::latest()->get();
        foreach ($investments as $investment) {
            if ($investment->next_run->lte(now())) {
                if ($investment->status_count == $investment->packages->duration - 1) {
                    if (trim($investment->status->value) == trim(InvestmentStatus::Confirm->value)) {

                        $investment = Investment::findOrFail($investment->id);
                        ++$investment->status_count;
                        $investment->status = InvestmentStatus::End;
                        $investment->update();

                        $deposit = new Transaction;
                        $deposit->user_id = $investment->user_id;
                        $deposit->amount = (($investment->packages->roi / 100) * $investment->amount);
                        $deposit->wallet_name = 'Return of Investment (ROI)';
                        $deposit->status = trim(TransactionStatus::Confirm->value);
                        $deposit->type = trim(TransactionType::Roi->value);
                        $deposit->save();

                        $deposit = new Transaction;
                        $deposit->user_id = $investment->user_id;
                        $deposit->amount = $investment->amount;
                        $deposit->wallet_name = 'Return of Investment (ROI)';
                        $deposit->status = trim(TransactionStatus::Confirm->value);
                        $deposit->type = trim(TransactionType::Returned->value);
                        $deposit->save();

                        Mail::to($investment->users->email)->send(new InvestmentEndedMail($investment));
                    }
                } elseif ($investment->status_count < $investment->packages->duration) {
                    if (trim($investment->status->value) == trim(InvestmentStatus::Confirm->value)) {
                        $investment = Investment::findOrFail($investment->id);
                        $investment->status_count++;
                        $investment->next_run = $investment->next_run->addHours(24);
                        $investment->update();
                    }
                }
            }
        }
    }
}
