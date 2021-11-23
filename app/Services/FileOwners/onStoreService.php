<?php

namespace App\Services\FileOwners;

use App\Models\User;

class onStoreService
{
    public function fileownerSave($values)
    {
        $fullname = $this->prepareFullname(
            firstname: $values['firstname'],
            middlename: $values['middlename'],
            lastname: $values['lastname']
        );
        $fileowner = array(
            'full_name' => $fullname,
            'email' => $values['email'],
            'phone' => $values['phone'],
            'street_address_one' => $values['street_address_one'],
            'street_address_two' => $values['street_address_two'],
            'state' => $values['state'],
            'country' => $values['country']
        );
        return auth()->user()->fileOwners()->create($fileowner);
    }

    private function prepareFullname($firstname, $middlename = null, $lastname): string
    {
        if ($middlename !== null) {
            return "$firstname $middlename $lastname";
        } else {
            return "$firstname $lastname";
        }
    }
}
