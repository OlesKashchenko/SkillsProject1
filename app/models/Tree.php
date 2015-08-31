<?php


class Tree extends Yaro\Jarboe\Tree
{

    use \Yaro\Jarboe\Helpers\Traits\ImageTrait;
    use TranslateTrait;


    public function newsCategories()
    {
        return $this->belongsToMany('NewsCategory', 'news_categories2tb_tree', 'id_node', 'id_category');
    }

    public function news()
    {
        return $this->hasMany('News', 'id_catalog', 'id');
    } // end news

    public function card()
    {
        return $this->hasOne('CardCredit', 'id_catalog', 'id');
    }

	public function deposit()
	{
		return $this->hasMany('Deposit', 'id_tb_tree', 'id');
	}

    public function cardsCategories()
    {
        return $this->belongsToMany('CardCategory', 'cards2cards_categories', 'id_card', 'id_category');
    }

    public function cardsPrograms()
    {
        return $this->belongsToMany('CardProgram', 'cards2cards_programs', 'id_card', 'id_program');
    }

    public static function getFirstDepthNodes()
    {
        return Tree::where('depth', '1')->get();
    } // end getFirstDepthNodes

    public static function getSubTree($tree, $node, &$isOk = false)
    {
        foreach ($tree as $current) {
            if ($current->id == $node->id) {
                $isOk = true;
                return $current;
            } else {
                $result = Tree::getSubTree($current->children, $node, $isOk);
                if ($isOk) {
                    return $result;
                }
            }
        }
    } // end getSubTree

    public function isMainMenu()
    {
        return $this->is_main_menu == 1;
    } // end isMainMenu

    public function isFixedMain()
    {
        return $this->is_fixed_main == 1;
    } // end isFixedMain

    public function isTopMenu()
    {
        return $this->is_top_menu == 1;
    } // end isTopMenu

    public function isFooterMenu()
    {
        return $this->is_footer_menu == 1;
    } // end isFooterMenu

    public function isMainMenuLink()
    {
        return $this->is_main_menu_link == 1;
    } // end isMainMenuLink

    public function isMain()
    {
        return $this->is_show_main == 1;
    } // end isMain

    public function getCustomLink()
    {
        return trim($this->link) ? trim($this->link) : false;
    } // end isCustomLink

    public function getIsPayPass()
    {
        return $this->is_pay_pass;
    } // end getIsPayPass

    public function getIsChip()
    {
        return $this->is_chip;
    } // end getIsChip

    public function scopeCatalogItems($query)
    {
        return $query->where('is_hide_catalog', 0);
    } // end scopeCatalogItems

    public function scopeActive($query)
    {
        return $query->where('is_active', 'like', '%'. App::getLocale() .'%');
    } // end scopeActive

    public function scopeMain($query)
    {
        return $query->where('is_show_main', 1);
    } // end scopeMain

    public function scopeOrderFixed($query)
    {
        return $query->orderBy('is_fixed_main', 'desc');
    } // end scopeOrderFixed


    // Cards

    public static function getCardsCompared()
    {
        $cookie = Cookie::get('alfa_cards_compare');

        return $cookie ? : array();
    } // end getComparedCards

    public static function setCardsCompared($idCards = array())
    {
        if ($idCards) {
            Cookie::queue('alfa_cards_compare', $idCards, Settings::get('cookie_save_time', 10080));
        } else {
            Cookie::queue('alfa_cards_compare', array(), -1);
        }
    } // end setCardsCompared

    public static function addCardToCompare($id)
    {
        $cardsIds = self::getCardsCompared();

        if (!in_array($id, $cardsIds)) {
            $cardsIds[] = $id;

            self::setCardsCompared($cardsIds);
        }

        return $cardsIds;
    } // end addCardToCompare

    public static function removeCardFromCompare($id)
    {
        $cardsIds = self::getCardsCompared();

        if (in_array($id, $cardsIds)) {
            $cardsIds = array_diff($cardsIds, array($id));

            self::setCardsCompared($cardsIds);
        }

        return $cardsIds;
    } // end removeCardFromCompare

    // end Cards


	// Deposits

	public static function getDepositsCompared()
	{
        return Session::get('alfa_deposits_compare', array());
	} // end getDepositsCompared

	public static function setDepositsCompared($depositsIds = array())
	{
        if ($depositsIds) {
            $depositsIds = array_unique($depositsIds);
        }

        Session::put('alfa_deposits_compare', $depositsIds);
	} // end setDepositsCompared

    public static function filterDepositsByIds($deposits, $ids)
    {
        if (!$ids) {
            return $deposits;
        }

        $deposits = $deposits->filter(function ($deposit) use ($ids) {
            return in_array($deposit->id, $ids);
        });

        return $deposits;
    } // end filterDepositsByIds

	//end Deposits
}
