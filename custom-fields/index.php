<?php
if (function_exists('acf_add_local_field_group')) {

    // acf_add_local_field_group(array(
    //     'key' => 'group_1',
    //     'title' => 'My Group',
    //     'fields' => [
    //         create_field_custom('field_text', 'My Field Text'),
    //         create_field_custom('field_image', 'My Field Image', 'image'),
    //         create_field_custom('group', 'My Field Group', 'repeater', [], [
    //             create_field_custom('group_text', 'My Field Text', 'text'),
    //             create_field_custom('group_image', 'My Field Image', 'image'),
    //         ]),
    //     ],
    //     'location' => [
    //         [
    //             [
    //                 'param' => 'options_page', // page_slug
    //                 'operator' => '==',
    //                 'value' => 'footer-settings',
    //             ],
    //         ],
    //     ],
    // ));
    
    acf_add_local_field_group(array(
        'key' => 'footer_settings',
        'title' => 'Opções do Rodapé',
        'fields' => [
            create_field_custom('copyright', 'Copyright', 'text', ['default_value' => 'blank-theme']),
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'footer-settings',
                ],
            ],
        ],
    ));


}
