<?php

return array(

    'caption' => 'Admin caption',
    'logo_url' => asset('packages/yaro/jarboe/img/logo.png'),
    'favicon_url' => asset('packages/yaro/jarboe/img/favicon/favicon.ico'),

    'uri' => '/admin',

    'user_name' => function () {
        return Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name;
    },
    'user_image' => function () {
        return 'https://www.gravatar.com/avatar/' . md5(Sentry::getUser()->email);
    },

    'menu' => array(
        array(
            'title' => function () {
                return __('Главная');
            },
            'icon' => 'home',
            'link' => '/',
            'check' => function () {
                return true;
            }
        ),
        array(
            'title' => function () {
                return __('Структура сайта');
            },
            'icon' => 'navicon',
            'link' => '/tree',
            'check' => function () {
                return true;
            }
        ),
        array(
            'title' => function () {
                return __('Депозиты');
            },
            'icon' => 'navicon',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Продукты');
                    },
                    'link' => '/deposits',
                    'check' => function () {
                        return true;
                    }
                ),
                array(
                    'title' => function () {
                        return __('Заявки');
                    },
                    'link' => '/deposit-applies',
                    'check' => function () {
                        return true;
                    }
                ),
            ),
        ),
        array(
            'title' => function () {
                return __('Кредиты');
            },
            'icon' => 'navicon',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Карты');
                    },
                    'link' => '/cards-credit',
                    'check' => function () {
                        return true;
                    }
                ),
                array(
                    'title' => function () {
                        return __('Категории карт');
                    },
                    'link' => '/cards-categories',
                    'check' => function () {
                        return true;
                    }
                ),
                array(
                    'title' => function () {
                        return __('Бонусные программы');
                    },
                    'link' => '/cards-programs',
                    'check' => function () {
                        return true;
                    }
                ),
            ),
        ),
        array(
            'title' => function () {
                return __('Слайдеры');
            },
            'icon' => 'navicon',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Главная');
                    },
                    'link' => '/main-slider',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('main_slider.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Малому бизнесу');
                    },
                    'link' => '/small-business-slider',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('main_slider.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Корп. бизнесу');
                    },
                    'link' => '/corporate-business-slider',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('main_slider.view');
                    }
                ),
            )
        ),
        array(
            'title' => function() {
                return __('Новости');
            },
            'icon'  => 'navicon',
            'submenu' => array(
                array(
                    'title' =>  function() {
                        return __('Новости');
                    },
                    'link'  => '/news',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('news.view');
                    }
                ),
                array(
                    'title' =>  function() {
                        return __('Категории');
                    },
                    'link'  => '/news-categories',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('news.view');
                    }
                ),
            )
        ),
        array(
            'title' =>  function() {
                return __('Ссылки');
            },
            'icon' => 'navicon',
            'link' => '/breadcrumb-links',
            'check' => function () {
                return Sentry::getUser()->hasAccess('main_slider.view');
            }
        ),
        array(
            'title' => function () {
                return __('Заявки');
            },
            'icon' => 'navicon',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Частным лицам');
                    },
                    'submenu' => array(
                        /*
                        array(
                            'title' => function () {
                                return __('Все');
                            },
                            'link' => '/apply-forms',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        */
                        array(
                            'title' => function () {
                                return __('Наличными');
                            },
                            'link' => '/apply-forms/cash',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Рефинансирование');
                            },
                            'link' => '/apply-forms/refinance',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Потребительский');
                            },
                            'link' => '/apply-forms/consumer',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Депозиты');
                            },
                            'link' => '/apply-forms/deposit',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                    ),
                ),
                array(
                    'title' => function () {
                        return __('Малому бизнесу');
                    },
                    'submenu' => array(
                        array(
                            'title' => function () {
                                return __('Тарифные пакеты');
                            },
                            'link' => '/apply-forms/small-business/rates',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Сервисы удаленного доступа');
                            },
                            'link' => '/apply-forms/small-business/remotes',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Зарплатный проект');
                            },
                            'link' => '/apply-forms/small-business/salary',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Интернет-эквайринг');
                            },
                            'link' => '/apply-forms/small-business/inet-equiring',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Лизинг');
                            },
                            'link' => '/apply-forms/small-business/lizing',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                        array(
                            'title' => function () {
                                return __('Депозиты');
                            },
                            'link' => '/apply-forms/small-business/deposits',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('apply_forms.view');
                            }
                        ),
                    ),
                ),
                array(
                    'title' => function () {
                        return __('Партнерство');
                    },
                    'link' => '/apply-forms-partners',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('apply_forms.view');
                    }
                ),
            )
        ),
        array(
            'title' => function () {
                return __('Обратная связь');
            },
            'icon' => 'navicon',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Вопросы и ответы');
                    },
                    'link' => '/feedback-forms',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('feedback_forms.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Темы заявок');
                    },
                    'link' => '/feedback-themes',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('feedback_forms.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('SMS коды');
                    },
                    'link' => '/feedback-sms-helpers',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('feedback_forms.view');
                    }
                ),
	            array(
		            'title' => function () {
			            return __('Категории вопросов');
		            },
		            'link' => '/feedback-categories',
		            'check' => function () {
			            return Sentry::getUser()->hasAccess('feedback_forms.view');
		            }
	            )
            )
        ),
	    array(
		    'title' => function() {
			    return __('Курсы валют');
		    },
		    'icon'  => 'navicon',
		    'submenu' => array(
			    array(
				    'title' =>  function() {
					    return __('Отделения');
				    },
				    'link'  => '/rates',
				    'check' => function() {
                        return Sentry::getUser()->hasAccess('rates.view');
				    }
			    ),
			    array(
				    'title' =>  function() {
					    return __('Платежные карты');
				    },
				    'link'  => '/rate-cards',
				    'check' => function() {
                        return Sentry::getUser()->hasAccess('rates.view');
				    }
			    ),
		    )
	    ),
        array(
            'title' => function() {
                return __('Карта отделений');
            },
            'icon'  => 'navicon',
            'submenu' => array(
                array(
                    'title' =>  function() {
                        return __('Загрузка отделений');
                    },
                    'link'  => '/offices-import',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('offices.view');
                    }
                ),
                array(
                    'title' =>  function() {
                        return __('Отделения');
                    },
                    'link'  => '/offices',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('offices.view');
                    }
                ),
                array(
                    'title' =>  function() {
                        return __('Города');
                    },
                    'link'  => '/cities',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('offices.view');
                    }
                ),
                array(
                    'title' =>  function() {
                        return __('Области');
                    },
                    'link'  => '/regions',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('offices.view');
                    }
                ),
                array(
                    'title' =>  function() {
                        return __('Регионы');
                    },
                    'link'  => '/areas',
                    'check' => function() {
                        return Sentry::getUser()->hasAccess('offices.view');
                    }
                ),
            )
        ),
        array(
            'title' => function () {
                return __('Упр. пользователями');
            },
            'icon' => 'user',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Пользователи');
                    },
                    'link' => '/tb/users',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('users_groups.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Группы');
                    },
                    'link' => '/tb/groups',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('users_groups.view');
                    }
                )
            )
        ),
        array(
            'title' => function () {
                return __('Упр. подписками');
            },
            'icon' => 'user',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Подписчики');
                    },
                    'link' => '/apply-forms-subscribers',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('users_groups.view');
                    }
                )
            )
        ),
        array(
            'title' => function () {
                return __('Переводы');
            },
            'icon' => 'navicon',
            'link' => '/translates',
            'check' => function () {
                return Sentry::getUser()->hasAccess('translates.view');
            }
        ),
        array(
            'title' => function () {
                return __('Настройки');
            },
            'icon' => 'cog',
            'submenu' => array(
                array(
                    'title' => function () {
                        return __('Общие');
                    },
                    'link' => '/settings',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('settings.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Виды занятости');
                    },
                    'link' => '/occupations',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('settings.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Магазины');
                    },
                    'link' => '/shops',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('settings.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Типы товаров');
                    },
                    'link' => '/products',
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('settings.view');
                    }
                ),
                array(
                    'title' => function () {
                        return __('Калькуляторы');
                    },
                    'check' => function () {
                        return Sentry::getUser()->hasAccess('calculators.view');
                    },
                    'submenu' => array(
                        array(
                            'title' => function () {
                                return __('Кредит');
                            },
                            'link' => '/settings/calculators/cash',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('calculators.view');
                            },
                        ),
                        array(
                            'title' => function () {
                                return __('Рефинансирование');
                            },
                            'link' => '/settings/calculators/refinance',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('calculators.view');
                            },
                        ),
                        array(
                            'title' => function () {
                                return __('Потребительский');
                            },
                            'link' => '/settings/calculators/consumer',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('calculators.view');
                            },
                        ),
                        array(
                            'title' => function () {
                                return __('Депозит');
                            },
                            'link' => '/settings/calculators/deposit',
                            'check' => function () {
                                return Sentry::getUser()->hasAccess('calculators.view');
                            },
                        )
                    )
                )
            )
        ),
    ),
);