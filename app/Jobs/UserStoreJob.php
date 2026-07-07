<?php

namespace App\Jobs;

use App\Mail\User\PasswordMAil;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserStoreJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $password = Str::random(10);
        $this->data['password'] = $password;

        $user = User::create($this->data);
        Mail::to($this->data['email'])->send(new PasswordMAil($password));
        event(new Registered($user));
    }
}
