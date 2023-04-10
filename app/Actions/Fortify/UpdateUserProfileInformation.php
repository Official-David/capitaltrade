<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max: 255'],
            'last_name' => ['required', 'string', 'max: 255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // if (isset($input['avatar'])) {
            //     $path = 'storage/' . $request->input('avatar')->store('avatar', 'public');
            // }
            $user->forceFill([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'email' => $input['email'],
                    'gender' => $input['gender'] ?? Auth::User()->gender,
                    'bio' => $input['bio'] ?? Auth::User()->bio,
                    'phone_number' => $input['phone_number'] ?? Auth::User()->phone_number,
                    'address' => $input['address'] ?? Auth::User()->address,
                    'avatar' => $input['avatar'] ?? Auth::User()->avatar,
                ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                // 'bio' => $input['bio'],
                // 'gender' => $input['gender'],
                // 'status' => $input['status'],
                // 'address' => $input['address'],
                // 'avatar' => $input['avatar'],
                'email_verified_at' => null,
            ])->save();

        $user->sendEmailVerificationNotification();
    }
}
