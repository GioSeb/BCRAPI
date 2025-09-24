<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'El campo :attribute es obligatorio.',
    'digits'   => 'El campo :attribute debe tener :digits dígitos.',
    'numeric'  => 'El campo :attribute debe ser un número.',
    'string'   => 'El campo :attribute debe ser una cadena de texto.',
    'email'    => 'El campo :attribute debe ser una dirección de correo válida.',
    'unique' => 'El :attribute ya existe.',
    'confirmed' => 'La confirmación de la contraseña no coincide.',

        // Reglas para el objeto Password
    'password' => [
        'letters' => 'El campo :attribute debe contener al menos una letra.',
        'mixed' => 'El campo :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El campo :attribute debe contener al menos un número.',
        'symbols' => 'El campo :attribute debe contener al menos un símbolo.',
        'confirmed' => 'La confirmación de la contraseña no coincide.'
    ],

    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'cuit' => 'CUIT/CUIL',
        'password' => 'contraseña',
        'email' => 'correo electrónico',
    ],

];
