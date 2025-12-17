<?php

declare(strict_types=1);

$options = [
    'components/form' => [
        [
            'section_title' => 'Qobrix Campaign',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[campaign_id]',
                    'id' => 'campaign_id',
                    'type' => 'text',
                    'label' => 'Campaign Qobrix ID',
                    'default' => '',
                ],
            ],
        ],
        [
            'section_title' => 'Intro',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[intro_title]',
                    'id' => 'intro_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Thank you for meeting with us at RealtyON',
                ],
                [
                    'name' => 'options[intro_description]',
                    'id' => 'intro_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => 'We hope you found valuable insights. If you have any questions or need further assistance, feel free to reach out. We’re here to help you find your perfect property!',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Form Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[personal_information_label]',
                    'id' => 'personal_information_label',
                    'type' => 'text',
                    'label' => 'Personal Information Label',
                    'default' => 'Personal Information',
                    'group_width' => 'full',
                ],
                [
                    'name' => 'options[contact_first_name]',
                    'id' => 'contact_first_name',
                    'type' => 'text',
                    'label' => 'First Name Label',
                    'default' => 'Contact First Name',
                ],
                [
                    'name' => 'options[contact_last_name]',
                    'id' => 'contact_last_name',
                    'type' => 'text',
                    'label' => 'Last Name Label',
                    'default' => 'Contact Last Name',
                ],
                [
                    'name' => 'options[contact_email]',
                    'id' => 'contact_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'Contact Email',
                ],
                [
                    'name' => 'options[contact_phone]',
                    'id' => 'contact_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Contact Mobile Phone',
                ],
                [
                    'name' => 'options[contact_city]',
                    'id' => 'contact_city',
                    'type' => 'text',
                    'label' => 'City Label',
                    'default' => 'Contact City',
                ],
                [
                    'name' => 'options[contact_country]',
                    'id' => 'contact_country',
                    'type' => 'text',
                    'label' => 'Country Label',
                    'default' => 'Contact Country',
                ],
                [
                    'name' => 'options[contact_job]',
                    'id' => 'contact_job',
                    'type' => 'text',
                    'label' => 'Job Title Label',
                    'default' => 'Job Title',
                ],
                [
                    'name' => 'options[organisation_name]',
                    'id' => 'organisation_name',
                    'type' => 'text',
                    'label' => 'Organisation Name Label',
                    'default' => 'Organisation Company Name',
                ],
                [
                    'name' => 'options[organisation_website]',
                    'id' => 'organisation_website',
                    'type' => 'text',
                    'label' => 'Organisation Website Label',
                    'default' => 'Organisation Website URL',
                ],
                [
                    'name' => 'options[identity]',
                    'id' => 'identity',
                    'type' => 'text',
                    'label' => 'Identity Label',
                    'default' => 'Are you a:',
                ],
                [
                    'name' => 'options[interest]',
                    'id' => 'interest',
                    'type' => 'text',
                    'label' => 'Interest Label',
                    'default' => 'What Are You Interested In:',
                ],
                [
                    'name' => 'options[contact_btn]',
                    'id' => 'contact_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Submit',
                ],
            ],
        ],
        [
            'section_title' => 'Custom Questions',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[custom_question_label]',
                    'id' => 'custom_question_label',
                    'type' => 'text',
                    'label' => 'Custom Question Label',
                    'default' => 'Additional Information',
                    'group_width' => 'full',
                ],
                [
                    'name' => 'question_list',
                    'type' => 'array',
                    'label' => 'Question List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[question_list][question_title]',
                            'id' => 'question_title',
                            'type' => 'text',
                            'label' => 'Question',
                            'default' => '',
                        ],
                    ],
                    'display_fields' => [
                        'question_title' => 'Title',
                    ],
                ],
            ],
        ],
    ],
];
