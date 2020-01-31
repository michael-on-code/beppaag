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

function getAddOrEditUserHTML($edit = false, $user = [], $roles, $uploadPath, $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de création d'un nouvel utilisateur</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Nom de l'utilisateur", $id = 'last_name');
                            echo form_input([
                                'name' => $name = "user[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Prénom(s) de l'utilisateur", $id = 'first_name');
                            echo form_input([
                                'name' => $name = "user[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Email de l'utilisateur", $id = 'email');
                            echo form_input([
                                'name' => $name = "user[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'email',
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Rôle de l'utilisateur", $id = 'role');
                            echo form_dropdown($name = "user[$id]", $roles, set_value($name, maybe_null_or_empty($user, 'role')), [
                                'class' => "select2",
                                'required' => "",
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title = "Attacher photo de l'utilisateur");
                            $file = set_value($name = 'user[user_photo]', maybe_null_or_empty($user, 'user_photo', true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la photo" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => 'user_photo',
                                    'data-target-name' => $name,
                                ],
                                'title' => $title,
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden($name, set_value($name, $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', false, 'auto-upload');
                            echo get_form_error($name);
                            getFieldInfo('Format : JPG | JPEG | PNG Taille Max : 1M');
                            ?>
                        </div>
                        <?php getAllFormButtons($edit, pro_url('users')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {}
                </script>
            </div>
        </div>
    </div>
    <?php
}

function setUserValidation($edit, $userID = '')
{
    $ci =& get_instance();
    if ($user = $ci->input->post('user')) {
        setFormValidationRules([
            [
                'name' => 'user[last_name]',
                'label' => 'Nom',
                'rules' => 'trim|required|max_length[50]'
            ],
            [
                'name' => 'user[first_name]',
                'label' => 'Prénom(s)',
                'rules' => 'trim|required|max_length[50]'
            ],
            [
                'name' => 'user[email]',
                'label' => 'Email',
                'rules' => 'trim|required|max_length[100]' . $edit ? "callback_is_unique_on_update[users.email.$userID]" : 'is_unique[users.email]'
            ],
            [
                'name' => 'user[role]',
                'label' => "Role du nouvel utilisateur",
                'rules' => 'required',
                [
                    'checking_roles', [$ci->user_model, 'checkpoint_do_role_exist']
                ]
            ],
            [
                'name' => 'user[user_photo]',
                'label' => 'Photo de profil',
                'rules' => 'trim'
            ],
        ]);
        if ($ci->form_validation->run()) {
            $roles = getAppropriateUsersRoles(false);
            $user['role'] = maybe_null_or_empty($roles, $user['role']);
            $userGroupsIDs = $ci->user_model->getUserGroupIDsByGroupNames($user['role']);
            unset($user['role']);
            if (!$edit) {
                //insert
                $user['added_by'] = get_current_user_id();
                if ($userData = $ci->user_model->insert($user, $userGroupsIDs)) {
                    $userData = (object)$userData;
                    $data = (object)$user;
                    $siteName = $ci->data['options']['siteName'];
                    $groupArray = $ci->ion_auth->get_users_groups($userData->id)->result();
                    $temp = [];
                    if (!empty($groupArray)) {
                        foreach ($groupArray as $role) {
                            $temp[] = $role->description;
                        }
                    }
                    $fetchedUserData = $ci->ion_auth->user($userData->id)->row();
                    $fetchedUserData->roles = implode(', ', $temp);
                    //send user mail
                    $ci->load->model('cron_model');
                    $activationParams = getActivationMailParams($data, $userData, $siteName);
                    $notificationParams = getUserAddNotificationMailParams($fetchedUserData, "Ajout d'un nouvel utilisateur", "Chers administrateurs,<br><br>
                                    Un nouvel utilisateur vient d'être ajouté à la plateforme");
                    $ci->cron_model->insertBatch([
                        [
                            'title' => "activation",
                            'function_to_call' => 'sendNotifications',
                            'params' => json_encode($activationParams),
                            'starts_at' => date('Y-m-d')
                        ],
                        [
                            'title' => "admin-notification",
                            'function_to_call' => 'sendNotifications',
                            'params' => json_encode($notificationParams),
                            'starts_at' => date('Y-m-d')
                        ]
                    ]);
                    get_success_message("L'utilisateur a été créé avec succès <br> Un mail de confirmation a été envoyé à $userData->email", 10000);
                } else {
                    get_error_message('Oops... Une erreur a été rencontrée');
                }
            } else {
                $user['updated_by'] = get_current_user_id();
                $ci->user_model->update($userID, $user, $userGroupsIDs);
                get_success_message("Utilisateur modifié avec succès");
            }
            pro_redirect('users');
        } else {
            get_error_message();
        }
    }
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
                            'title' => 'Liste publiée',
                            'url' => pro_url('evaluations')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => pro_url('evaluations/add')
                        ],
                        [
                            'title' => 'Brouillon',
                            'url' => pro_url('evaluations/draft')
                        ],[
                            'title' => 'Corbeille',
                            'url' => pro_url('evaluations/trash')
                        ],
                        [
                            'title' => 'Catégorisation',
                            'submenus' => [
                                [
                                    'title' => 'Secteurs',
                                    'url' => pro_url('sectors')
                                ], [
                                    'title' => 'Types',
                                    'url' => pro_url('types')
                                ],
                                [
                                    'title' => 'Thématiques',
                                    'url' => pro_url('thematics')
                                ],
                                [
                                    'title' => 'Temporalités',
                                    'url' => pro_url('temporalities')
                                ],
                                [
                                    'title' => 'Authorités contractantes',
                                    'url' => pro_url('contracting-authorities')
                                ],
                                [
                                    'title' => "Structures/Personnes ayant conduit d'évaluation",
                                    'url' => pro_url('leading-authorities')
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
                            'title' => 'Liste publiée',
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
                            'title' => 'Liste publiée',
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
                /*[
                    'title' => 'Newsletter',
                    'url' => pro_url('newsletter'),
                    'order' => 7,
                    'icon' => 'anticon anticon-idcard',
                ],*/
                [
                    'title' => 'Contenu global',
                    'url' => pro_url('contents'),
                    'order' => 5,
                    'icon' => 'anticon anticon-layout',
                    'submenus' => [

                        [
                            'title' => 'Général',
                            'url' => pro_url('contents')
                        ],
                        [
                            'title' => 'Entête',
                            'url' => pro_url('contents/header')
                        ],
                        [
                            'title' => 'Bannières',
                            'url' => pro_url('contents/banners')
                        ],

                        [
                            'title' => 'Pieds de page',
                            'url' => pro_url('contents/footer')
                        ],
                        [
                            'title' => 'Accueil',
                            'url' => pro_url('contents/home-page')
                        ],/*[
                            'title' => 'Equipe',
                            'url' => pro_url('contents/team')
                        ],*/
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
                /*array(
                    'title' => 'Journal',
                    'url' => pro_url('logs'),
                    'order' => 7,
                    'icon' => 'anticon anticon-audit'
                ),*/

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

function redirect_if_is_banned($to = '')
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

function getAppropriateUsersRoles($onlyKeys = true, $forSelect2 = false)
{

    $roles = [
        'admin' => [
            'admin', 'editor', 'evaluation_moderator', 'recommendation_moderator', 'members'
        ],
        'editor' => [
            'editor', 'evaluation_moderator', 'recommendation_moderator', 'members'
        ],
        'evaluation_moderator' => [
            'evaluation_moderator', 'members'
        ],
        'recommendation_moderator' => [
            'recommendation_moderator', 'members'
        ],
    ];
    if ($onlyKeys) {
        $temp = [];
        if ($forSelect2) {
            $temp[''] = '';
        }
        return array_merge($temp, array_keys($roles));
    }
    return $roles;
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


function getActivationMailParams($data, $userData = [], $siteName)
{
    if (empty($userData)) {
        $userData = $data;
    }
    $mail['title'] = "Finaliser inscription";
    $mail['description'] = "Bonjour Mr/Mme $data->last_name $data->first_name. <br> Vous avez été désignés pour administrer la plateforme de $siteName. <br>
Veuillez finaliser votre inscription en cliquant sur le bouton ci-dessous";
    $mail['btnLabel'] = "Finaliser inscription";
    $mail['btnLink'] = pro_url('login/activate/') . "$userData->id/$userData->activation";
    $mail['destination'] = $userData->email;
    return $mail;
}

function getUserAddNotificationMailParams($userData, $title, $description)
{
    $elements['Nom'] = maybe_null_or_empty($userData, 'last_name');
    $elements['Prénom(s)'] = maybe_null_or_empty($userData, 'first_name');
    $elements['Email'] = maybe_null_or_empty($userData, 'email');
    $elements['Rôle(s)'] = maybe_null_or_empty($userData, 'roles');
    $args['elements'] = $elements;
    $args['title'] = $title;
    $args['description'] = $description;
    $ci=&get_instance();
    $args['destination'] = $ci->option_model->get_option('notificationEmails');
    return $args;
}
