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
        //users, that should get email,It can be got from db
        $users = [['email'=>'test@gmail.com', 'name'=> 'test1'],
                  ['email'=>'test+2@gmail.com', 'name'=> 'test2'],
                  ['email'=>'test+3@gmail.com', 'name'=> 'test3']];

        //send emails
        foreach ($users as $user) {
            Mail::to($user['email'])->send(new YourEmailTemplate());
        }

        $this->info('Emails sent successfully!');
    }
}
