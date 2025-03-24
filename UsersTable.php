<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nom', 'Le nom est requis')
            ->notEmptyString('email', 'L\'email est requis')
            ->email('email', false, 'Veuillez fournir un email valide')
            ->notEmptyString('password', 'Le mot de passe est requis');
        
        return $validator;
    }
}
