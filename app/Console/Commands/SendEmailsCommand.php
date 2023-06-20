<?php

namespace App\Console\Commands;

use App\Mail\YourEmailTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = [];

        foreach ($users as $user) {
            Mail::to($user['email'])->send(new YourEmailTemplate());
        }

        $this->info('Emails sent successfully!');
    }
}
