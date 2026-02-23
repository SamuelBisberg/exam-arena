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

    'accepted' => 'השדה :attribute חייב להיות מאושר.',
    'accepted_if' => 'השדה :attribute חייב להיות מאושר כאשר :other הוא :value.',
    'active_url' => 'השדה :attribute חייב להיות כתובת URL תקינה.',
    'after' => 'השדה :attribute חייב להיות תאריך אחרי :date.',
    'after_or_equal' => 'השדה :attribute חייב להיות תאריך אחרי או שווה ל-:date.',
    'alpha' => 'השדה :attribute חייב להכיל אותיות בלבד.',
    'alpha_dash' => 'השדה :attribute חייב להכיל רק אותיות, מספרים, מקפים וקווים תחתונים.',
    'alpha_num' => 'השדה :attribute חייב להכיל אותיות ומספרים בלבד.',
    'any_of' => 'השדה :attribute אינו תקין.',
    'array' => 'השדה :attribute חייב להיות מערך.',
    'ascii' => 'השדה :attribute חייב להכיל רק תווים אלפאנומריים וסמלים של בית יחיד.',
    'before' => 'השדה :attribute חייב להיות תאריך לפני :date.',
    'before_or_equal' => 'השדה :attribute חייב להיות תאריך לפני או שווה ל-:date.',
    'between' => [
        'array' => 'השדה :attribute חייב להכיל בין :min ל-:max פריטים.',
        'file' => 'השדה :attribute חייב להיות בין :min ל-:max קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות בין :min ל-:max.',
        'string' => 'השדה :attribute חייב להכיל בין :min ל-:max תווים.',
    ],
    'boolean' => 'השדה :attribute חייב להיות true או false.',
    'can' => 'השדה :attribute מכיל ערך לא מורשה.',
    'confirmed' => 'אימות השדה :attribute אינו תואם.',
    'contains' => 'השדה :attribute חייב להכיל ערך נדרש.',
    'current_password' => 'הסיסמה שגויה.',
    'date' => 'השדה :attribute חייב להיות תאריך תקין.',
    'date_equals' => 'השדה :attribute חייב להיות תאריך השווה ל-:date.',
    'date_format' => 'השדה :attribute חייב להתאים לפורמט :format.',
    'decimal' => 'השדה :attribute חייב להכיל :decimal ספרות אחרי הנקודה.',
    'declined' => 'השדה :attribute חייב להידחות.',
    'declined_if' => 'השדה :attribute חייב להידחות כאשר :other הוא :value.',
    'different' => 'השדה :attribute והשדה :other חייבים להיות שונים.',
    'digits' => 'השדה :attribute חייב להכיל :digits ספרות.',
    'digits_between' => 'השדה :attribute חייב להכיל בין :min ל-:max ספרות.',
    'dimensions' => 'לשדה :attribute יש ממדי תמונה לא תקינים.',
    'distinct' => 'השדה :attribute מכיל ערך כפול.',
    'doesnt_contain' => 'The :attribute field must not contain any of the following: :values.',
    'doesnt_end_with' => 'השדה :attribute לא יכול להסתיים באחד מהערכים הבאים: :values.',
    'doesnt_start_with' => 'השדה :attribute לא יכול להתחיל באחד מהערכים הבאים: :values.',
    'email' => 'השדה :attribute חייב להיות כתובת דוא"ל תקינה.',
    'encoding' => 'The :attribute field must be encoded in :encoding.',
    'ends_with' => 'השדה :attribute חייב להסתיים באחד מהערכים הבאים: :values.',
    'enum' => 'הערך שנבחר עבור :attribute אינו תקין.',
    'exists' => 'הערך שנבחר עבור :attribute אינו תקין.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => 'השדה :attribute חייב להיות קובץ.',
    'filled' => 'השדה :attribute חייב להכיל ערך.',
    'gt' => [
        'array' => 'השדה :attribute חייב להכיל יותר מ-:value פריטים.',
        'file' => 'השדה :attribute חייב להיות גדול מ-:value קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות גדול מ-:value.',
        'string' => 'השדה :attribute חייב להכיל יותר מ-:value תווים.',
    ],
    'gte' => [
        'array' => 'השדה :attribute חייב להכיל לפחות :value פריטים.',
        'file' => 'השדה :attribute חייב להיות גדול או שווה ל-:value קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות גדול או שווה ל-:value.',
        'string' => 'השדה :attribute חייב להכיל לפחות :value תווים.',
    ],
    'hex_color' => 'השדה :attribute חייב להיות צבע הקסדצימלי תקין.',
    'image' => 'השדה :attribute חייב להיות תמונה.',
    'in' => 'הערך שנבחר עבור :attribute אינו תקין.',
    'in_array' => 'The :attribute field must exist in :other.',
    'in_array_keys' => 'The :attribute field must contain at least one of the following keys: :values.',
    'integer' => 'השדה :attribute חייב להיות מספר שלם.',
    'ip' => 'השדה :attribute חייב להיות כתובת IP תקינה.',
    'ipv4' => 'השדה :attribute חייב להיות כתובת IPv4 תקינה.',
    'ipv6' => 'השדה :attribute חייב להיות כתובת IPv6 תקינה.',
    'json' => 'השדה :attribute חייב להיות מחרוזת JSON תקינה.',
    'list' => 'השדה :attribute חייב להיות רשימה.',
    'lowercase' => 'השדה :attribute חייב להיות באותיות קטנות.',
    'lt' => [
        'array' => 'השדה :attribute חייב להכיל פחות מ-:value פריטים.',
        'file' => 'השדה :attribute חייב להיות קטן מ-:value קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות קטן מ-:value.',
        'string' => 'השדה :attribute חייב להכיל פחות מ-:value תווים.',
    ],
    'lte' => [
        'array' => 'השדה :attribute לא יכול להכיל יותר מ-:value פריטים.',
        'file' => 'השדה :attribute חייב להיות קטן או שווה ל-:value קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות קטן או שווה ל-:value.',
        'string' => 'השדה :attribute חייב להכיל לכל היותר :value תווים.',
    ],
    'mac_address' => 'השדה :attribute חייב להיות כתובת MAC תקינה.',
    'max' => [
        'array' => 'השדה :attribute לא יכול להכיל יותר מ-:max פריטים.',
        'file' => 'השדה :attribute לא יכול להיות גדול מ-:max קילובייט.',
        'numeric' => 'השדה :attribute לא יכול להיות גדול מ-:max.',
        'string' => 'השדה :attribute לא יכול להכיל יותר מ-:max תווים.',
    ],
    'max_digits' => 'השדה :attribute לא יכול להכיל יותר מ-:max ספרות.',
    'mimes' => 'השדה :attribute חייב להיות קובץ מסוג: :values.',
    'mimetypes' => 'השדה :attribute חייב להיות קובץ מסוג: :values.',
    'min' => [
        'array' => 'השדה :attribute חייב להכיל לפחות :min פריטים.',
        'file' => 'השדה :attribute חייב להיות לפחות :min קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות לפחות :min.',
        'string' => 'השדה :attribute חייב להכיל לפחות :min תווים.',
    ],
    'min_digits' => 'השדה :attribute חייב להכיל לפחות :min ספרות.',
    'missing' => 'השדה :attribute חייב להיות חסר.',
    'missing_if' => 'השדה :attribute חייב להיות חסר כאשר :other הוא :value.',
    'missing_unless' => 'השדה :attribute חייב להיות חסר אלא אם כן :other הוא :value.',
    'missing_with' => 'השדה :attribute חייב להיות חסר כאשר :values קיים.',
    'missing_with_all' => 'השדה :attribute חייב להיות חסר כאשר :values קיימים.',
    'multiple_of' => 'השדה :attribute חייב להיות כפולה של :value.',
    'not_in' => 'הערך שנבחר עבור :attribute אינו תקין.',
    'not_regex' => 'פורמט השדה :attribute אינו תקין.',
    'numeric' => 'השדה :attribute חייב להיות מספר.',
    'password' => [
        'letters' => 'השדה :attribute חייב להכיל לפחות אות אחת.',
        'mixed' => 'השדה :attribute חייב להכיל לפחות אות גדולה אחת ואות קטנה אחת.',
        'numbers' => 'השדה :attribute חייב להכיל לפחות מספר אחד.',
        'symbols' => 'השדה :attribute חייב להכיל לפחות סימן אחד.',
        'uncompromised' => 'ה-:attribute שסופק הופיע בדליפת מידע. נא לבחור :attribute אחר.',
    ],
    'present' => 'השדה :attribute חייב להיות קיים.',
    'present_if' => 'השדה :attribute חייב להיות קיים כאשר :other הוא :value.',
    'present_unless' => 'השדה :attribute חייב להיות קיים אלא אם כן :other הוא :value.',
    'present_with' => 'השדה :attribute חייב להיות קיים כאשר :values קיים.',
    'present_with_all' => 'השדה :attribute חייב להיות קיים כאשר :values קיימים.',
    'prohibited' => 'השדה :attribute אסור.',
    'prohibited_if' => 'השדה :attribute אסור כאשר :other הוא :value.',
    'prohibited_if_accepted' => 'השדה :attribute אסור כאשר :other מאושר.',
    'prohibited_if_declined' => 'השדה :attribute אסור כאשר :other נדחה.',
    'prohibited_unless' => 'השדה :attribute אסור אלא אם כן :other נמצא בתוך :values.',
    'prohibits' => 'השדה :attribute אוסר על :other להיות קיים.',
    'regex' => 'פורמט השדה :attribute אינו תקין.',
    'required' => 'השדה :attribute הוא שדה חובה.',
    'required_array_keys' => 'השדה :attribute חייב להכיל ערכים עבור: :values.',
    'required_if' => 'השדה :attribute הוא שדה חובה כאשר :other הוא :value.',
    'required_if_accepted' => 'השדה :attribute הוא שדה חובה כאשר :other מאושר.',
    'required_if_declined' => 'השדה :attribute הוא שדה חובה כאשר :other נדחה.',
    'required_unless' => 'השדה :attribute הוא שדה חובה אלא אם כן :other נמצא ב-:values.',
    'required_with' => 'השדה :attribute הוא שדה חובה כאשר :values קיים.',
    'required_with_all' => 'השדה :attribute הוא שדה חובה כאשר :values קיימים.',
    'required_without' => 'השדה :attribute הוא שדה חובה כאשר :values אינו קיים.',
    'required_without_all' => 'השדה :attribute הוא שדה חובה כאשר אף אחד מהערכים :values אינו קיים.',
    'same' => 'השדה :attribute חייב להיות זהה ל-:other.',
    'size' => [
        'array' => 'השדה :attribute חייב להכיל :size פריטים.',
        'file' => 'השדה :attribute חייב להיות :size קילובייט.',
        'numeric' => 'השדה :attribute חייב להיות :size.',
        'string' => 'השדה :attribute חייב להכיל :size תווים.',
    ],
    'starts_with' => 'השדה :attribute חייב להתחיל באחד מהערכים הבאים: :values.',
    'string' => 'השדה :attribute חייב להיות מחרוזת.',
    'timezone' => 'השדה :attribute חייב להיות אזור זמן תקין.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'השדה :attribute חייב להיות באותיות גדולות.',
    'url' => 'השדה :attribute חייב להיות כתובת URL תקינה.',
    'ulid' => 'השדה :attribute חייב להיות ULID תקין.',
    'uuid' => 'השדה :attribute חייב להיות UUID תקין.',

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

    'attributes' => [],

];
