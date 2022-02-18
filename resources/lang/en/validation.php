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

    'accepted'             => 'o :attribute must be accepted.',
    'active_url'           => 'o :attribute is not a valid URL.',
    'after'                => 'o :attribute must be a date after :date.',
    'after_or_equal'       => 'o :attribute must be a date after or equal to :date.',
    'alpha'                => 'o :attribute may only contain letters.',
    'alpha_dash'           => 'o :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'o :attribute may only contain letters and numbers.',
    'array'                => 'o :attribute deve ser um array.',
    'before'               => 'o :attribute must be a date before :date.',
    'before_or_equal'      => 'o :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'o :attribute must be between :min and :max.',
        'file'    => 'o :attribute must be between :min and :max kilobytes.',
        'string'  => 'o :attribute must be between :min and :max characters.',
        'array'   => 'o :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'o :attribute campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'o :attribute confirmação não corresponde.',
    'date'                 => 'o :attribute não é uma data válida.',
    'date_format'          => 'o :attribute does not match the format :format.',
    'different'            => 'o :attribute and :other must be different.',
    'digits'               => 'o :attribute deve ser: dígitos dígitos.',
    'digits_between'       => 'o :attribute must be between :min and :max digits.',
    'dimensions'           => 'o :attribute has invalid image dimensions.',
    'distinct'             => 'o :attribute field has a duplicate value.',
    'email'                => 'o :attribute Deve ser um endereço de e-mail válido.',
    'exists'               => 'o selected :attribute is invalid.',
    'file'                 => 'o :attribute deve ser um arquivo.',
    'filled'               => 'o :attribute field must have a value.',
    'image'                => 'o :attribute deve ser uma imagem.',
    'in'                   => 'o selected :attribute é inválido.',
    'in_array'             => 'o :attribute field does not exist in :other.',
    'integer'              => 'o :attribute deve ser um inteiro.',
    'ip'                   => 'o :attribute must be a valid IP address.',
    'ipv4'                 => 'o :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'o :attribute must be a valid IPv6 address.',
    'json'                 => 'o :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'o :attribute não pode ser maior que :max.',
        'file'    => 'o :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'o :attribute não pode ser maior que :max characters.',
        'array'   => 'o :attribute pode não ter mais do que :max items.',
    ],
    'mimes'                => 'o :attribute deve ser um arquivo de type: :values.',
    'mimetypes'            => 'o :attribute deve ser um arquivo de type: :values.',
    'min'                  => [
        'numeric' => 'o :attribute deve ser pelo menos :min.',
        'file'    => 'o :attribute deve ser pelo menos :min kilobytes.',
        'string'  => 'o :attribute deve ser pelo menos :min characters.',
        'array'   => 'o :attribute deve ser pelo menos :min items.',
    ],
    'not_in'               => 'o selected :attribute is invalid.',
    'numeric'              => 'o :attribute deve ser um número.',
    'present'              => 'o :attribute field must be present.',
    'regex'                => 'o :attribute format is invalid.',
    'required'             => 'o :attribute campo é obrigatório.',
    'required_if'          => 'o :attribute field is required when :other is :value.',
    'required_unless'      => 'o :attribute field is required unless :other is in :values.',
    'required_with'        => 'o :attribute field is required when :values is present.',
    'required_with_all'    => 'o :attribute field is required when :values is present.',
    'required_without'     => 'o :attribute field is required when :values is not present.',
    'required_without_all' => 'o :attribute field is required when none of :values are present.',
    'same'                 => 'o :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'o :attribute must be :size.',
        'file'    => 'o :attribute must be :size kilobytes.',
        'string'  => 'o :attribute must be :size characters.',
        'array'   => 'o :attribute must contain :size items.',
    ],
    'string'               => 'o :attribute deve ser uma string.',
    'timezone'             => 'o :attribute must be a valid zone.',
    'unique'               => 'o :attribute já foi tomada.',
    'uploaded'             => 'o :attribute não foi possível fazer o upload.',
    'url'                  => 'o :attribute format is invalid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
