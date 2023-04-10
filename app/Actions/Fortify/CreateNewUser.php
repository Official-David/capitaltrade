<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferralRegistrationMail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $referrer = User::whereUsername(session()->pull('referrer'))->first();

        generateUserName:
        // $username = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
        // if (User::where('username', $username)->exists()) {
        //     goto generateUserName;
        // }

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max: 255'],
            'last_name' => ['required', 'string', 'max: 255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $input['username'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            
        ]);
        
        $user->assignRole('user');

        if (isset($referrer->id )) {
            $oldUser = User::find($referrer->id);
            $oldUser->email;
            Mail::to($oldUser->email)->send(new ReferralRegistrationMail($oldUser, $user));
        }

        return $user;
    }
}
