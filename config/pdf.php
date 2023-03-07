<?php

return [
    'mode'                     => '',
    'format'                   => 'A4',
    'default_font_size'        => '12',
    'default_font'             => 'dejavu sans',
    'margin_left'              => 10,
    'margin_right'             => 10,
    'margin_top'               => 10,
    'margin_bottom'            => 10,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'sans-serif',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => '',
    'custom_font_data' => [
            'dejavusans' => [
                'R' => [
                    'cw' => [
                        32 => 220, 33 => 259, 34 => 327, 35 => 600, 36 => 491, 37 => 786, 38 => 654, 39 => 181, 40 => 340, 41 => 340, 42 => 425, 43 => 600, 44 => 220, 45 => 327, 46 => 220, 47 => 327, 48 => 491, 49 => 491, 50 => 491, 51 => 491, 52 => 491, 53 => 491, 54 => 491, 55 => 491, 56 => 491, 57 => 491, 58 => 220, 59 => 220, 60 => 600, 61 => 600, 62 => 600, 63 => 409, 64 => 764, 65 => 582, 66 => 582, 67 => 618, 68 => 655, 69 => 546, 70 => 509, 71 => 655, 72 => 673, 73 => 273, 74 => 491, 75 => 582, 76 => 491, 77 => 800, 78 => 673, 79 => 691, 80 => 582, 81 => 691, 82 => 618, 83 => 509, 84 => 582, 85 => 673, 86 => 582, 87 => 800, 88 => 582, 89 => 582, 90 => 546, 91 => 340, 92 => 327, 93 => 340, 94 => 600, 95 => 491, 96 => 220, 97 => 491, 98 => 546, 99 => 455, 100 => 546, 101 => 491, 102 => 327, 103 => 546, 104 => 546, 105 => 245, 106 => 245, 107 => 491, 108 => 245, 109 => 800, 110 => 546, 111 => 546, 112 => 546, 113 => 546, 114 => 364, 115 => 455, 116 => 327, 117 => 546, 118 => 491, 119 => 727, 120 => 491, 121 => 491, 122 => 455, 123 => 360, 124 => 220, 125 => 360, 126 => 600, 160 => 220, 161 => 259, 162 => 491, 163 => 491, 164 => 600, 165 => 491, 166 => 220, 167 => 491, 168 => 220, 169 => 764,
                    ]
                ]
            ]
    ],
    'auto_language_detection'  => true,
    'temp_dir'                 => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
    'pdfa'                     => true,
    'pdfaauto'                 => true,
    'use_active_forms'         => false,
];
