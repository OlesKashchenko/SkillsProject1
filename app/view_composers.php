<?php

View::composer('partials.header', function($view) {
    $root = Collector::get('root');
    $current = Collector::get('current');

    $view->with('root', $root)->with('current', $current);
});

View::composer('partials.footer', function($view) {
    $menu = Collector::get('footerMenu');
    $footerMenu = array_chunk($menu, 3);

    $view->with('footerMenu', $footerMenu);
});

View::composer('partials.breadcrumbs', function($view) {
    $breadcrumbs = Collector::get('breadcrumbs');
    $breadcrumbLinks = Collector::get('breadcrumb_links');
    $additionalBreadcrumbLinks = array();
    if ($breadcrumbLinks) {
        foreach ($breadcrumbLinks as $breadcrumbLink) {
            $additionalBreadcrumbLinks[] = array(
                'url'   => $breadcrumbLink->link,
                'title' => $breadcrumbLink->t('title'),
            );

        }
    }

    $view->with('breadcrumbs', $breadcrumbs)->with('additionalBreadcrumbLinks', $additionalBreadcrumbLinks);
});

View::composer('partials.nav_sidebar', function($view) {
    $root = Collector::get('root');
    $current = Collector::get('current');

    $view->with('root', $root)->with('current', $current);
});

View::composer('partials.popups.sitemap', function($view) {
    $root = Collector::get('root');
    $current = Collector::get('current');

    $view->with('root', $root)->with('current', $current);
});

View::composer('partials.popups.apply_form_text', function($view) {
    $oferta = Cache::tags('j_tree')->rememberForever('oferta_'. App::getLocale(), function() {
        return Tree::where('slug', 'oferta')->first();
    });

    $view->with('oferta', $oferta);
});

View::composer(
    [
        'partials.popups.apply_form',
        'partials.popups.new_partner',
        'partials.popups.apply_form_deposit',
        'partials.popups.apply_form_business'
    ],
    function($view) {

    $operatorCodes = explode(',', Settings::get('mobile_operators_codes'));

    $occupations = Cache::tags('occupations')->rememberForever('occupations_'. App::getLocale(), function() {
        return Occupation::active()->get();
    });

    $regions = Cache::tags('regions')->rememberForever('regions_'. App::getLocale(), function() {
        return Region::active()->get();
    });

    $cities = Cache::tags('cities')->rememberForever('cities_region_1_'. App::getLocale(), function() {
        return City::active()->byRegion(1)->get();
    });

    $view->with('occupations', $occupations)
        ->with('operatorCodes', $operatorCodes)
        ->with('regions', $regions)
        ->with('cities', $cities);
});

/*
View::composer('partials.popups.new_partner', function($view) {
    $operatorCodes = explode(',', Settings::get('mobile_operators_codes'));
    $occupations = Occupation::active()->get();
    $view->with('occupations', $occupations)->with('operatorCodes', $operatorCodes);
});
*/

View::composer('partials.main_promo', function($view) {
    $allSliderItems = Cache::tags('slider_items')->rememberForever('slider_items_'. App::getLocale(), function() {
        return SliderItem::main()->active()->get();
    });

    $sliderItems = array();
    foreach ($allSliderItems as $sliderItem) {
        switch ($sliderItem['type']) {
            case 'dynamic_first':
                $sliderItems['dynamic_first'][] = $sliderItem; break;
            case 'dynamic_second':
                $sliderItems['dynamic_second'][] = $sliderItem; break;
            case 'static_first':
                $sliderItems['static_first'] = $sliderItem; break;
            case 'static_second':
                $sliderItems['static_second'] = $sliderItem; break;
            default:
                break;
        }
    }

    $view->with('sliderItems', $sliderItems);
});

View::composer('partials.main_news', function($view) {
    $mainNews = Cache::tags('news', 'news_categories')->rememberForever('main_news_'. App::getLocale(), function() {
        return Tree::with(
            array('news' => function($query) { $query->main()->active()->orderFixed('desc')->desc(); })
        )
            ->main()
            ->active()
            ->get();
    });
    $view->with('mainNews', $mainNews);
});

View::composer('partials.main_achievements', function($view) {
    $idAchievementsSection = Collector::get('idAboutAchievements');
    $tree = Collector::get('root');

    $achievementsPage = Cache::tags('j_tree')->rememberForever('achievements_page_'. App::getLocale(), function() use ($idAchievementsSection) {
        return Tree::active()->where('id', $idAchievementsSection)->first();
    });

    $subTree = Tree::getSubTree($tree, $achievementsPage);

    $treeAchievements = $achievements = null;
    if ($subTree) {
        $treeAchievements = $subTree->children;
    }

    foreach ($treeAchievements as $achievement) {
        if (!$achievement->isActive() || !$achievement->isMain() || !$achievement->children->count()) {
            continue;
        }

        $currentYear = substr(trim($achievement->t('title')), -4);

        foreach ($achievement->children as $item) {
            if (!$item->isActive() || !$item->isMain()) {
                continue;
            }

            if ($currentYear) {
                $achievements[$currentYear][] = $item;
            }
        }
    }

    // $achievements = array_reverse($achievements, true);

    $view->with('achievements', $achievements);
});

View::composer('investor.partials.submenu', function($view) {
    $menuItems = Collector::get('flatRoot');
    foreach ($menuItems as $index => $item) {
        if ($item->parent_id != 15 || $item->id == 807 ) { //delete from left menu - Information blocks id = 807
            unset($menuItems[$index]);
        }
    }
    $view->with('menuItems', $menuItems);
});

View::composer('investor.partials.next_page', function($view) {
    $menuItems = Collector::get('flatRoot');
    foreach ($menuItems as $index => $item) {
        if ($item->parent_id != 15) {
            unset($menuItems[$index]);
        }
    }

    $menuItems = $menuItems->values();

    $nextPage = null;
    $firsPage = null;
    foreach ($menuItems as $index => $item) {
        if (($item->getUrl() == Request::path()) && isset($menuItems[$index + 1])) {
            $nextPage = $menuItems[$index + 1];
        } else {
            $firstPage = $menuItems[0];
        }
    }

    $view->with('nextPage', $nextPage)->with('firstPage', $firstPage);
});

View::composer('about.partials.submenu', function($view) {
	$menuItems = Collector::get('flatRoot');
	foreach ($menuItems as $index => $item) {
		if ($item->parent_id != 14 || $item->is_side_menu != 1) {
			unset($menuItems[$index]);
		}
	}

	$view->with('menuItems', $menuItems);
});

View::composer('about.partials.next_page', function($view) {
	$menuItems = Collector::get('flatRoot');
	foreach ($menuItems as $index => $item) {
		if ($item->parent_id != 14 && $item->is_side_menu != 1) {
			unset($menuItems[$index]);
		}
	}

	$menuItems = $menuItems->values();

	$nextPage = null;
    $firstPage = null;
	foreach ($menuItems as $index => $item) {
		if (($item->getUrl() == Request::path()) && isset($menuItems[$index + 1])) {
			$nextPage = $menuItems[$index + 1];
		} else {
            $firstPage = $menuItems[0];
        }
	}
	$view->with('nextPage', $nextPage)->with('firstPage', $firstPage);
});

View::composer('partials.cards_compare', function($view) {
    if (!Request::ajax()) {
        $cardsIds = Tree::getCardsCompared();

        $cardsCompared = null;
        if ($cardsIds) {
            $cardsCompared = Tree::with('card')->whereIn('id', $cardsIds)->active()->get();
        }
        $view->with('cardsCompared', $cardsCompared);
    }
});

View::composer('partials.calculators.consumer', function($view) {
    $cities = Cache::tags('cities')->rememberForever('cities_'. App::getLocale(), function() {
        return City::active()->get();
    });

    $shops = Cache::tags('shops')->rememberForever('shops_'. App::getLocale(), function() {
        return Shop::active()->get();
    });

    $products = Cache::tags('products')->rememberForever('products_'. App::getLocale(), function() {
        return Product::active()->get();
    });

    $view->with('cities', $cities)->with('shops', $shops)->with('products', $products);
});

View::composer('partials.calculators.cards', function($view) {

    $programs = Cache::tags('j_tree', 'cards_programs')->rememberForever('privates_cards_programs_'. App::getLocale(), function() {
        return CardProgram::active()->get();
    });

    $cards = Cache::tags('j_tree', 'cards')->rememberForever('privates_cards_'. App::getLocale(), function() {
        $cardsCatalog = Tree::find(Collector::get('idCardsCatalog'));
        return $cardsCatalog->immediateDescendants()
            ->with('cardsPrograms')
            ->active()
            ->get();
    });

    $view->with('programs', $programs)->with('cards', $cards);
});

View::composer('partials.calculators.want_multiply', function($view) {
    $calculatorDeposit = new DepositCalculator();

    $calculatorDeposit->setDepositAmount(Settings::get('deposit_amount_default', 100000));
    $calculatorDeposit->setTerm(Settings::get('term_default', 3));
    $calculatorDeposit->setMonthlyInstallment(0);
    $calculatorDeposit->setCurrency('uah');
    $calculatorDeposit->setIsMain(true);

    $calculations = $calculatorDeposit->calculate();

    $view->with('calculations', $calculations);
});
