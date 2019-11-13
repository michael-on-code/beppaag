<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 29/01/2018
 * Time: 13:56
 */
defined('BASEPATH') OR exit('No direct script access allowed');

function get_current_user_id()
{
    $ci = &get_instance();
    return $ci->ion_auth->user()->row()->id;
}

function getUserPhotoUrl($picFileName = '')
{
    if ($picFileName == '') {
        $CI = &get_instance();
        return base_url("uploads/") . maybe_null_or_empty($CI->data['options'], 'siteDefaultAvatar');
    }
    return base_url("uploads/$picFileName");
}

function get_user_menu($user_groups)
{
    if (!empty($user_groups)) {
        $temp = array();
        foreach ($user_groups as $group) {
            $temp[] = (get_menu_by_group($group->name));
        }
        $menuss = array();
        if (!empty($temp)) {
            foreach ($temp as $menus) {
                foreach ($menus as $menu) {
                    $menuss[] = $menu;
                }
            }
        }
        $menus = array();
        for ($i = 1; $i < 11; $i++) {
            foreach ($menuss as $menu) {
                if ($menu['order'] == $i)
                    $menus[] = $menu;
            }
        }
        return $menus;
    }
}

function getUserRolesInString(array $userRoles)
{
    $temp = [];
    if (!empty($userRoles)) {
        foreach ($userRoles as $role) {
            $temp[] = maybe_null_or_empty($role, 'description');
        }
    }
    return implode(', ', $temp);
}

function get_menu_by_group($group)
{
    //$ci = &get_instance();
    $ci = &get_instance();
    switch ($group) {
        case 'evaluation_moderator':
            return [
                [
                    'title' => 'Evaluations',
                    'url' => pro_url('evaluations'),
                    'order' => 4,
                    'icon' => 'anticon anticon-database',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => pro_url('evaluations')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => pro_url('evaluations/add')
                        ],
                        [
                            'title' => 'Corbeille',
                            'url' => pro_url('evaluations/trash')
                        ],
                        [
                            'title' => 'Catégorisation',
                            'submenus' => [
                                [
                                    'title' => 'Secteurs',
                                    'url' => pro_url('evaluations/sector')
                                ],
                                [
                                    'title' => 'Thématiques',
                                    'url' => pro_url('evaluations/thematic')
                                ],
                                [
                                    'title' => 'Temporalités',
                                    'url' => pro_url('evaluations/temporality')
                                ],
                                [
                                    'title' => 'Authorités contractantes',
                                    'url' => pro_url('evaluations/contracting-authorities')
                                ],

                            ]
                        ],
                    ]
                ],
            ];
            break;
        case 'recommendation_moderator':
            return [];
            break;
        case 'editor':
            return [
                [
                    'title' => 'Articles',
                    'url' => pro_url('posts'),
                    'order' => 2,
                    'icon' => 'anticon anticon-read',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => pro_url('posts'),
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => pro_url('posts/add'),
                        ],
                        [
                            'title' => 'Corbeille',
                            'url' => pro_url('posts/trash'),
                        ],
                        [
                            'title' => 'Catégories',
                            'submenus' => [
                                [
                                    'title' => 'Liste',
                                    'url' => pro_url('posts/categories'),
                                ],
                                [
                                    'title' => 'Ajouter',
                                    'url' => pro_url('posts/categories/add'),
                                ]
                            ]
                        ],
                        [
                            'title' => 'Etiquettes',
                            'submenus' => [
                                [
                                    'title' => 'Liste',
                                    'url' => pro_url('posts/tags'),
                                ],
                                [
                                    'title' => 'Ajouter',
                                    'url' => pro_url('posts/tags/add'),
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    'title' => 'Evènements',
                    'url' => pro_url('events'),
                    'order' => 3,
                    'icon' => 'anticon anticon-calendar',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => pro_url('events'),
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => pro_url('events/add'),
                        ],
                        [
                            'title' => 'Corbeille',
                            'url' => pro_url('events/trash'),
                        ],
                        [
                            'title' => 'Catégories',
                            'submenus' => [
                                [
                                    'title' => 'Liste',
                                    'url' => pro_url('events/categories'),
                                ],
                                [
                                    'title' => 'Ajouter',
                                    'url' => pro_url('events/categories/add'),
                                ]
                            ]
                        ],
                        [
                            'title' => 'Etiquettes',
                            'submenus' => [
                                [
                                    'title' => 'Liste',
                                    'url' => pro_url('events/tags'),
                                ],
                                [
                                    'title' => 'Ajouter',
                                    'url' => pro_url('events/tags/add'),
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    'title' => 'Newsletter',
                    'url' => pro_url('newsletter'),
                    'order' => 7,
                    'icon' => 'anticon anticon-idcard',
                ],
                [
                    'title' => 'Contenu global',
                    'url' => pro_url('contents'),
                    'order' => 5,
                    'icon' => 'anticon anticon-layout',
                    'submenus' => [
                        [
                            'title' => 'Entête',
                            'url' => pro_url('contents/header')
                        ],
                        [
                            'title' => 'Pieds de page',
                            'url' => pro_url('contents/footer')
                        ],
                        [
                            'title' => 'Accueil',
                            'url' => pro_url('contents/home-page')
                        ],
                        [
                            'title' => 'Contact',
                            'url' => pro_url('contents/contact-page')
                        ],
                    ]
                ]
            ];
            break;
        case 'admin':
            return array(
                array(
                    'title' => 'Paramètres',
                    'url' => pro_url('settings'),
                    'order' => 9,
                    'icon' => 'anticon anticon-setting'
                ),
                array(
                    'title' => 'Journal',
                    'url' => pro_url('logs'),
                    'order' => 7,
                    'icon' => 'anticon anticon-audit'
                ),

                array(
                    'url' => pro_url('users'),
                    'title' => 'Utilisateurs',
                    'order' => 6,
                    'icon' => 'anticon anticon-team',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => pro_url('users')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => pro_url('users/add')
                        ],
                    ]
                ),

            );
            break;
        default://or member
            return array(
                array(
                    'title' => 'Mon compte',
                    'url' => pro_url('account'),
                    'order' => 8,
                    'icon' => 'anticon anticon-user'
                ), array(
                    'title' => 'Déconnexion',
                    'url' => pro_url('logout'),
                    'order' => 10,
                    'icon' => 'anticon anticon-poweroff'
                ),
                array(
                    'url' => pro_url('dashboard'),
                    'title' => 'Tableau de bord',
                    'order' => 1,
                    'icon' => 'anticon anticon-dashboard'
                ),
            );
    }
}

function redirect_if_not_logged_in($to = 'login')
{
    $CI = &get_instance();
    if (!$CI->ion_auth->logged_in()) {
        get_info_message('Veuillez vous authentifier');
        pro_redirect($to);
    }

}

function redirect_if_is_banned($to = '/')
{
    $CI = &get_instance();
    //var_dump($CI->data['user']);exit;
    if ($CI->data['user']->active == 2) {
        $CI->ion_auth->logout();
        get_error_message("Vous avez été banni. <br> Veuillez contacter l'administrateur");
        pro_redirect($to);
    } elseif ($CI->data['user']->active == 0) {
        $CI->ion_auth->logout();
        get_error_message("Veuillez finaliser votre inscription à la plateforme avant de vous logger");
        pro_redirect($to);
    }

}


function redirect_if_logged_in($to = 'dashboard')
{
    $CI = &get_instance();
    if ($CI->ion_auth->logged_in()) {
        pro_redirect($to);
    }
}

function redirect_if_user_cannot($group_name, $redirect = 'dashboard')
{
    if (!user_can($group_name)) {
        get_warning_message();
        pro_redirect($redirect);
    }
}


function getCountries()
{
    return array(
        //'' => '',
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, the Democratic Republic of the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'Ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.s.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );
}


function sendActivationMail($data, $userData = [], $siteName)
{
    if (empty($userData)) {
        $userData = $data;
    }
    $mail['title'] = "Finaliser inscription";
    $mail['message'] = "Bonjour Mr/Mme $data->last_name $data->first_name. <br> Vous avez été désignés pour administrer la plateforme de $siteName. 
Veuillez finaliser votre inscription en cliquant sur le bouton ci-dessous";
    $mail['btnLabel'] = "Finaliser inscription";
    $mail['btnLink'] = site_url('login/activate/') . "$userData->id/$userData->activation";
    $mail['destination'] = $userData->email;
    sendMail($siteName . ' <no-reply@akasigroup.com>', $mail);
}

function sendUserAddNotificationMail($userData, $title, $description)
{
    $title = 'AKASI-ABE Notification : ' . $title;
    $elements['Nom'] = maybe_null_or_empty($userData, 'last_name');
    $elements['Prénom(s)'] = maybe_null_or_empty($userData, 'first_name');
    $elements['Email'] = maybe_null_or_empty($userData, 'email');
    $elements['Rôle(s)'] = maybe_null_or_empty($userData, 'roles');
    $args['elements'] = $elements;
    $args['title'] = $title;
    $args['description'] = $description;
    notificationMailSender($args);
}