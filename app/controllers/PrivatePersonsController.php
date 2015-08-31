<?php

class PrivatePersonsController extends BaseController
{

    public function showCreditsCatalog()
    {
        $page = $this->node;

        $credits = Cache::tags('j_tree')->rememberForever('credit_products_'. App::getLocale(), function() use ($page) {
            return $page->immediateDescendants()->active()->catalogItems()->get();
        });

        return View::make(
            'private-persons.credits.catalog',
            compact('page', 'credits')
        );
    } // end showCreditsCatalog

    public function showCreditsCardsCatalog()
    {
        $page = $this->node;

        $cards = Cache::tags('j_tree')->rememberForever('credit_cards_'. App::getLocale(), function() use ($page) {
            return $page->immediateDescendants()->with('cardsCategories')->active()->get();
        });

        $cardsCategories = Cache::tags('cards_categories')->rememberForever('cards_categories_'. App::getLocale(), function() {
            return CardCategory::all();
        });

        return View::make(
            'private-persons.credits.catalog_cards',
            compact('page', 'cards', 'cardsCategories')
        );
    } // end showCreditsCardsCatalog

    public function showCreditsConsumer()
    {
        $page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

        return View::make('private-persons.credits.consumer', compact('page', 'blocks'));
    } // end showCreditsConsumer

    public function showCreditsCash()
    {
        $page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

        $calculatorCredit = new CashCalculator();
        $calculatorCredit->setMonthlyIncome(0);
        $calculatorCredit->setCreditAmount(Settings::get('credit_amount_default', 100000));
        $calculatorCredit->setTerm(Settings::get('term_default', 3));

        $calculationsCredit = $calculatorCredit->calculate();

        return View::make('private-persons.credits.cash', compact('page', 'blocks', 'calculationsCredit'));
    } // end showCreditsCash

    public function showCreditsRefinance()
    {
        $page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

        return View::make('private-persons.credits.refinance', compact('page', 'blocks'));
    } // end showCreditsRefinance

    public function showCreditCard()
    {
        $card = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $card);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

        return View::make('private-persons.credits.card', compact('card', 'blocks'));
    } // end showCreditCard

    public function showDepositsCatalog()
    {
        $page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        $calculations = array();

        if ($subTree) {
            $blocks = $subTree->children;

            $depositsContainer = $blocks->filter(function ($block) {
                return $block->slug == 'products';
            });

            if ($depositsContainer->isEmpty()) {
                $deposits = array();
            } else {
                $deposits = $depositsContainer->first()->children;
            }

            $filteredDepositEntities = Cache::tags('deposits')->rememberForever('deposits_default_'. App::getLocale(), function() {
                return Deposit::amountFrom(3000)
                    ->terms(array(0, 3))
                    ->withoutMonthly()
                    ->currency('uah')
                    ->get();
            });

            $filteredDepositEntitiesIds = array();
            foreach ($filteredDepositEntities as $filteredDepositEntity) {
                $filteredDepositEntitiesIds[] = $filteredDepositEntity->id_tb_tree;
            }

            Tree::setDepositsCompared($filteredDepositEntitiesIds);

            $deposits = Tree::filterDepositsByIds($deposits, $filteredDepositEntitiesIds);
            $maxPercents = Deposit::prepareMaxPercents($filteredDepositEntities);
            $depositOptionsGroups = Deposit::prepareData($filteredDepositEntities);

            $calculator = new DepositCalculator();

            $calculator->setDepositAmount(Settings::get('deposit_amount_default', 100000));
            $calculator->setTerm(Settings::get('term_default', 3));
            $calculator->setMonthlyInstallment(0);
            $calculator->setCurrency('uah');
            $calculator->setInterestPaymentType($maxPercents['max_percent_type']);
            $calculator->setInterestPaymentPercent($maxPercents['max_percent']);
            $calculator->setIsMain(false);

            $calculations = $calculator->calculate();
        }

        return View::make(
            'private-persons.deposits.catalog',
            compact('page', 'blocks', 'deposits', 'depositOptionsGroups', 'maxPercents', 'calculations')
        );
    } // end showDepositsCatalog

    public function showTransfersCatalog()
    {
        $page = $this->node;

        $transfers = Cache::tags('j_tree')->rememberForever('credit_transfers_'. App::getLocale(), function() use ($page) {
            return $page->immediateDescendants()->active()->get();
        });

        return View::make('private-persons.transfers.catalog', compact('page', 'transfers'));
    } // end showTransfersCatalog

    public function showTransfer()
    {
        $page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

        return View::make('private-persons.transfers.single', compact('page', 'blocks'));
    } // end showTransfer

	public function formDepositCompare()
	{
		$depositsIds = Tree::getDepositsCompared();

		$html = '';
		if ($depositsIds) {
			$deposits = Tree::whereIn('id', $depositsIds)->active()->get();
            $depositsEntities = Deposit::whereIn('id_tb_tree', $depositsIds)->get();
			$depositsCompared = Deposit::prepareData($depositsEntities);

			$html = View::make(
                'partials.popups.deposits_compare_inner',
                compact('depositsCompared', 'deposits')
            )->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'html'      => $html
			)
		);
	} // end formCardCompare

    public function showBankCardsCatalog()
    {
        $page = $this->node;

        $cards = Cache::tags('j_tree')->rememberForever('credit_packages_'. App::getLocale(), function() use ($page) {
            return $page->immediateDescendants()->with('cardsCategories')->active()->get();
        });

        $cardsCategories = Cache::tags('cards_categories')->rememberForever('cards_categories_'. App::getLocale(), function() {
            return CardCategory::all();
        });

        return View::make(
            'private-persons.bank-card.catalog_cards',
            compact('page', 'cards', 'cardsCategories')

        );
    } // end showBankCardsCatalog
}
