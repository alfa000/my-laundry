<?php

namespace App\Actions\Fortify;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => $this->passwordRules(),
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required'],
            'no_hp' => ['required'],
            'alamat' => ['required'],
        ])->validate();

        $user =  DB::transaction(function () use($input){
            $user = User::create([
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
                'nama' => $input['nama'],
                'peran' => 'pelanggan',
                'jenis_kelamin' => $input['jenis_kelamin'],
            ]);

            Pelanggan::create([
                'no_hp' => $input['no_hp'],
                'alamat' => $input['alamat'],
                'id_user' => $user->id_user,
            ]);

            return $user;
        });

        return $user;
    }
}
