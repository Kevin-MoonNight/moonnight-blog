<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['verified'] = !is_null($data['email_verified_at']);

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['verified']) {
            if (is_null($data['email_verified_at'])) {
                $data['email_verified_at'] = now();
            }
        } else {
            $data['email_verified_at'] = null;
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
