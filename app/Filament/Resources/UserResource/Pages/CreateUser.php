<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model; // Import Model
use Spatie\Permission\Models\Role; // Import Role

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Tambah User';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function handleRegistration(array $data): Model
    {
        $user = static::getModel()::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if (isset($data['roles'])) {
            $role = Role::find($data['roles']);
            if ($role) {
                $user->assignRole($role);
            }
        }

        return $user;
    }
}
