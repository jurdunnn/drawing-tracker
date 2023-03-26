<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldGuestAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:guests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean accounts, delete guest accounts which are over a day old.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $guests = User::where('guest', true)->get()->filter(function ($user) {
            return Carbon::parse($user->created_at)->addDay() < now();
        });

        $guests->each(function ($guest) {
            $this->info("Deleting {$guest->name}");

            $guest->delete();
        });

        return Command::SUCCESS;
    }
}
