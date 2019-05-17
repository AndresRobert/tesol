<?
App::uses('AppModel', 'Model');

class Registration extends AppModel {
    public $validate = array(
        'first_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A name is required'
            )
        ),
        'last_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A surname is required'
            )
        ),
        'country' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A country of origin is required'
            )
        ),
        'id_number' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An ID number is required (RUT, Passport, DNI, etc.)'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An email is required'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email has already been taken.'
            )
        ),
        'occupation' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An occupation is required'
            )
        ),
        'organization' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An organization is required'
            )
        )
    );
}