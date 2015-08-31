'use strict';

var Calculator =
{

    settings:            null,
    currency:           'uah',
    deposit_page_url:   'private-persons/deposits',
	doneTypingInterval:  500,


    init: function()
    {
        if (jQuery('form#calculator_refinance').length) {
            Calculator.calculateRefinance();
            Calculator.initRefinanceEvents();
        }

        if (jQuery('form#calculator_consumer').length) {
            Calculator.calculateConsumer();
            Calculator.initConsumerEvents();
        }

        if (jQuery('form#calculator_cash').length) {
            Calculator.calculateCash();
            Calculator.initCashEvents();
        }

        if (jQuery('form#calculator_deposit').length) {
            Calculator.calculateDeposit();
            Calculator.initDepositEvents();
        }

        if ($('.custom_select_icons').length) {
            Calculator.initCardFilterEvents();
        }
    }, // end init

    initCardFilterEvents: function()
    {
        Calculator.initCardFilterProgramChange();
        Calculator.initCardFilterCheckboxChange();
    }, // end initCardFilterEvents

    initCardFilterProgramChange: function()
    {
        $('.custom_select_icons').ddslick({
            onSelected: function(data) {

                Calculator.filterCards();

                data.selectedItem.closest('.js_tabs').find('.js_tabs_head .tab.act').click();
            }
        });
    }, // end initCardFilterProgramChange

    initCardFilterCheckboxChange: function()
    {
        $('.field_secure .custom_checkbox').click(function() {
            Calculator.filterCards();
        });
    }, // end initCardFilterIsPayPassChange

    filterCards: function()
    {
        var idCategory  = parseInt($('.dd-selected-value').val()),
            listItems   = $('.brand_list li'),
            isCategoryOk,isPayPassOk, isChipOk;

        var payPassAvailables = [1];
        if (!$('input[name="is_pay_pass"]').is(':checked')) {
            payPassAvailables.push(0);
        }

        var chipAvailables = [1];
        if (!$('input[name="is_chip"]').is(':checked')) {
            chipAvailables.push(0);
        }

        listItems.each(function(i, el) {
            isCategoryOk    = ($(el).data('category').split(',').indexOf("" + idCategory) > -1) ? true : false;
            isPayPassOk     = (payPassAvailables.indexOf($(el).data('is_pay_pass')) > -1) ? true : false;
            isChipOk        = (chipAvailables.indexOf($(el).data('is_chip')) > -1) ? true : false;

            if (isCategoryOk && isPayPassOk && isChipOk) {
                $(el).removeClass('none');
            } else {
                $(el).addClass('none');
            }
        });
    }, // end filterCards

    initRefinanceEvents: function()
    {
        var monthlyPaymentInput         = jQuery('input[name="monthly_payment"]', '#calculator_refinance'),
            monthsLeftInput             = jQuery('input[name="months_left"]', '#calculator_refinance'),
            costLeftInput               = jQuery('input[name="cost_left"]', '#calculator_refinance'),
            isCardSwitcher              = jQuery('.field_credit_type .custom_switcher', '#calculator_refinance'),
            isInsLossJobCheckboxHolder  = jQuery('input[name="is_insurance_loss_job"]', '#calculator_refinance').parent(),
            isInsAccidentCheckboxHolder = jQuery('input[name="is_insurance_accident"]', '#calculator_refinance').parent();

        monthlyPaymentInput.mouseout(function() {
            Calculator.checkMonthlyPaymentInterval();

            jQuery('input[name="monthly_fee"]', '#apply_form_credit').val(
                monthlyPaymentInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        monthlyPaymentInput.next().click(function() {
            jQuery('input[name="monthly_fee"]', '#apply_form_credit').val(
                monthlyPaymentInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        monthsLeftInput.mouseout(function() {
            Calculator.checkMonthsLeftInterval();

            jQuery('input[name="left_to_repay_months"]', '#apply_form_credit').val(
                monthsLeftInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        monthsLeftInput.next().click(function() {
            jQuery('input[name="left_to_repay_months"]', '#apply_form_credit').val(
                monthsLeftInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        costLeftInput.mouseout(function() {
            Calculator.checkCostLeftInterval();

            jQuery('input[name="left_to_repay_money"]', '#apply_form_credit').val(
                costLeftInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        costLeftInput.next().click(function() {
            jQuery('input[name="left_to_repay_money"]', '#apply_form_credit').val(
                costLeftInput.val().trim()
            );

            Calculator.calculateRefinance();
        });

        isCardSwitcher.click(function() {
            jQuery('input[name="credit_type"]', '#apply_form_credit').val(
                isCardSwitcher.hasClass('checked') ? 'card' : 'simple'
            );
        });

        isInsLossJobCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_loss_job"]', '#apply_form_credit').val(
                isInsLossJobCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });

        isInsAccidentCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_accident"]', '#apply_form_credit').val(
                isInsAccidentCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });
    }, // end initConsumerEvents

    checkMonthlyPaymentInterval: function()
    {
        var monthlyPaymentInput = jQuery('input[name="monthly_payment"]', '#calculator_refinance');

        if (parseInt(monthlyPaymentInput.val().trim()) < parseInt(Calculator.settings['refinance']['monthly_payment_min'])) {
            monthlyPaymentInput.val(Calculator.settings['refinance']['monthly_payment_min']);
        } else if (parseInt(monthlyPaymentInput.val().trim()) > parseInt(Calculator.settings['refinance']['monthly_payment_max'])) {
            monthlyPaymentInput.val(Calculator.settings['refinance']['monthly_payment_max']);
        }
    }, // end checkMonthlyPaymentInterval

    checkMonthsLeftInterval: function()
    {
        var monthsLeftInput = jQuery('input[name="months_left"]', '#calculator_refinance');

        if (parseInt(monthsLeftInput.val().trim()) < parseInt(Calculator.settings['refinance']['left_repay_months_min'])) {
            monthsLeftInput.val(Calculator.settings['refinance']['left_repay_months_min']);
        } else if (parseInt(monthsLeftInput.val().trim()) > parseInt(Calculator.settings['refinance']['left_repay_months_max'])) {
            monthsLeftInput.val(Calculator.settings['refinance']['left_repay_months_max']);
        }
    }, // end checkMonthsLeftInterval

    checkCostLeftInterval: function()
    {
        var costLeftInput = jQuery('input[name="cost_left"]', '#calculator_refinance');

        if (parseInt(costLeftInput.val().trim()) < parseInt(Calculator.settings['refinance']['left_repay_money_min'])) {
            costLeftInput.val(Calculator.settings['refinance']['left_repay_money_min']);
        } else if (parseInt(costLeftInput.val().trim()) > parseInt(Calculator.settings['refinance']['left_repay_money_max'])) {
            costLeftInput.val(Calculator.settings['refinance']['left_repay_money_max']);
        }
    }, // end checkCostLeftInterval

    calculateRefinance: function()
    {
        // get apply form data
        var monthlyPayment  = jQuery('input[name="monthly_payment"]', '#calculator_refinance').val().trim(),
            monthsLeft      = jQuery('input[name="months_left"]', '#calculator_refinance').val().trim(),
            costLeft        = jQuery('input[name="cost_left"]', '#calculator_refinance').val().trim(),
            isCard          = jQuery('.field_credit_type .custom_switcher').hasClass('checked') ? 1 : 0;

        // if some required data doesn't exists
        if (!monthlyPayment || !monthsLeft || !costLeft) {
            return false;
        }

        // send apply form register request
        jQuery.ajax({
            url:        '/calculator/refinance',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       {
                monthly_payment:    monthlyPayment,
                months_left:        monthsLeft,
                cost_left:          costLeft,
                is_card:            isCard
            },
            success:    function(response) {
                if (response.status) {
                    jQuery('form#calculator_refinance #refinance_calculator_table').replaceWith(response.html);
                } else {
                    // todo: fuck :(
                }
            }
        });
    }, // end calculateRefinance

    initConsumerEvents: function()
    {
        var productPriceInput           = jQuery('input[name="product_price"]', '#calculator_consumer'),
            creditTermInput             = jQuery('input[name="credit_term"]', '#calculator_consumer'),
            citySelect                  = jQuery('select[name="city_select"]', '#calculator_consumer'),
            shopSelect                  = jQuery('select[name="shop_select"]', '#calculator_consumer'),
            productSelect               = jQuery('select[name="product_type_select"]', '#calculator_consumer'),
            isInsLossJobCheckboxHolder  = jQuery('input[name="is_insurance_loss_job"]', '#calculator_consumer').parent(),
            isInsAccidentCheckboxHolder = jQuery('input[name="is_insurance_accident"]', '#calculator_consumer').parent();

        productPriceInput.mouseout(function() {
            Calculator.checkProductPriceInterval();

            jQuery('input[name="product_price"]', '#apply_form_credit').val(
                productPriceInput.val().trim()
            );

            Calculator.calculateConsumer();
        });

        productPriceInput.next().click(function() {
            jQuery('input[name="product_price"]', '#apply_form_credit').val(
                productPriceInput.val().trim()
            );

            Calculator.calculateConsumer();
        });

        creditTermInput.mouseout(function() {
            Calculator.checkCreditTermInterval();

            jQuery('input[name="credit_term"]', '#apply_form_credit').val(
                creditTermInput.val().trim()
            );

            Calculator.calculateConsumer();
        });

        creditTermInput.next().click(function() {
            jQuery('input[name="credit_term"]', '#apply_form_credit').val(
                creditTermInput.val().trim()
            );

            Calculator.calculateConsumer();
        });

        citySelect.change(function() {
            jQuery('input[name="id_city"]', '#apply_form_credit').val(
                citySelect.val().trim()
            );
        });

        shopSelect.change(function() {
            jQuery('input[name="id_shop"]', '#apply_form_credit').val(
                shopSelect.val().trim()
            );
        });

        productSelect.change(function() {
            jQuery('input[name="id_product_type"]', '#apply_form_credit').val(
                productSelect.val().trim()
            );
        });

        isInsLossJobCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_loss_job"]', '#apply_form_credit').val(
                isInsLossJobCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });

        isInsAccidentCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_accident"]', '#apply_form_credit').val(
                isInsAccidentCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });
    }, // end initConsumerEvents

    checkProductPriceInterval: function()
    {
        var productPriceInput = jQuery('input[name="product_price"]', '#calculator_consumer');

        if (parseInt(productPriceInput.val().trim()) < parseInt(Calculator.settings['consumer']['product_price_min'])) {
            productPriceInput.val(Calculator.settings['consumer']['product_price_min']);
        } else if (parseInt(productPriceInput.val().trim()) > parseInt(Calculator.settings['consumer']['product_price_max'])) {
            productPriceInput.val(Calculator.settings['consumer']['product_price_max']);
        }
    }, // end checkProductPriceInterval

    checkCreditTermInterval: function()
    {
        var creditTermInput = jQuery('input[name="credit_term"]', '#calculator_consumer');

        if (parseInt(creditTermInput.val().trim()) < parseInt(Calculator.settings['consumer']['credit_term_min'])) {
            creditTermInput.val(Calculator.settings['consumer']['credit_term_min']);
        } else if (parseInt(creditTermInput.val().trim()) > parseInt(Calculator.settings['consumer']['credit_term_max'])) {
            creditTermInput.val(Calculator.settings['consumer']['credit_term_max']);
        }
    }, // end checkProductPriceInterval

    calculateConsumer: function()
    {
        // get apply form data
        var productPrice    = jQuery('input[name="product_price"]', '#calculator_consumer').val().trim(),
            creditTerm      = jQuery('input[name="credit_term"]', '#calculator_consumer').val().trim();

        // if some required data doesn't exists
        if (!productPrice || !creditTerm) {
            return false;
        }

        // send apply form register request
        jQuery.ajax({
            url:        '/calculator/consumer',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       {
                product_price:  productPrice,
                credit_term:    creditTerm
            },
            success:    function(response) {
                if (response.status) {
                    jQuery('form#calculator_consumer #consumer_calculator_table').replaceWith(response.html);
                } else {
                    // todo: fcuk :(
                }
            }
        });
    }, // end calculateConsumer

    initCashEvents: function()
    {
        var monthlyIncomeInput          = jQuery('input[name="monthly_income"]', '#calculator_cash'),
            creditAmountInput           = jQuery('input[name="credit_amount"]', '#calculator_cash'),
            termInput                   = jQuery('input[name="term"]', '#calculator_cash'),
            isInsLossJobCheckboxHolder  = jQuery('input[name="is_insurance_loss_job"]', '#calculator_cash').parent(),
            isInsAccidentCheckboxHolder = jQuery('input[name="is_insurance_accident"]', '#calculator_cash').parent(),
	        monthlyIncomeTypingTimer, termTypingTimer, amountTypingTimer;

	    monthlyIncomeInput.on('keyup', function () {
		    clearTimeout(monthlyIncomeTypingTimer);
		    monthlyIncomeTypingTimer = setTimeout(function() {
			    Calculator.checkMonthlyIncomeInterval();

			    jQuery('input[name="monthly_income"]', '#apply_form_credit').val(
				    monthlyIncomeInput.val().trim()
			    );

			    Calculator.calculateCash();

		    }, Calculator.doneTypingInterval);
	    });

	    monthlyIncomeInput.on('keydown', function () {
		    clearTimeout(monthlyIncomeTypingTimer);
	    });


        monthlyIncomeInput.next().find('a').click(function() {
            jQuery('input[name="monthly_income"]', '#apply_form_credit').val(
                monthlyIncomeInput.val().trim()
            );

            Calculator.calculateCash();
        });

	    creditAmountInput.on('keyup', function () {
		    clearTimeout(amountTypingTimer);
		    amountTypingTimer = setTimeout(function() {
			    Calculator.checkCreditAmountInterval();

			    jQuery('input[name="credit_amount"]', '#apply_form_credit').val(
				    creditAmountInput.val().trim()
			    );

			    Calculator.calculateCash();

		    }, Calculator.doneTypingInterval);
	    });

	    monthlyIncomeInput.on('keydown', function () {
		    clearTimeout(amountTypingTimer);
	    });

        creditAmountInput.next().find('a').click(function() {
            jQuery('input[name="credit_amount"]', '#apply_form_credit').val(
                creditAmountInput.val().trim()
            );

            Calculator.calculateCash();
        });

	    termInput.on('keyup', function() {
		    clearTimeout(termTypingTimer);
		    termTypingTimer = setTimeout(function() {
			    Calculator.checkTermInterval();

			    jQuery('input[name="term"]', '#apply_form_credit').val(
				    termInput.val().trim()
			    );

			    Calculator.calculateCash();

		    }, Calculator.doneTypingInterval);
	    });

	    termInput.on('keydown', function () {
		    clearTimeout(termTypingTimer);
	    });

        termInput.next().find('a').click(function() {
            jQuery('input[name="term"]', '#apply_form_credit').val(
                termInput.val().trim()
            );

            Calculator.calculateCash();
        });

        isInsLossJobCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_loss_job"]', '#apply_form_credit').val(
                isInsLossJobCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });

        isInsAccidentCheckboxHolder.click(function() {
            jQuery('input[name="is_insurance_accident"]', '#apply_form_credit').val(
                isInsAccidentCheckboxHolder.hasClass('checked') ? 1 : 0
            );
        });
    }, // end initCashEvents

    checkMonthlyIncomeInterval: function()
    {
        var monthlyIncomeInput = jQuery('input[name="monthly_income"]', '#calculator_cash');

        if (parseInt(monthlyIncomeInput.val().trim()) < parseInt(Calculator.settings['cash']['monthly_income_min'])) {
            monthlyIncomeInput.val(Calculator.settings['cash']['monthly_income_min']);
        } else if (parseInt(monthlyIncomeInput.val().trim()) > parseInt(Calculator.settings['cash']['monthly_income_max'])) {
            monthlyIncomeInput.val(Calculator.settings['cash']['monthly_income_max']);
        }
    }, // end checkMonthlyIncomeInterval

    checkCreditAmountInterval: function()
    {
        var creditAmountInput = jQuery('input[name="credit_amount"]', '#calculator_cash');

        if (parseInt(creditAmountInput.val().trim()) < parseInt(Calculator.settings['cash']['credit_amount_min'])) {
            creditAmountInput.val(Calculator.settings['cash']['credit_amount_min']);
        } else if (parseInt(creditAmountInput.val().trim()) > parseInt(Calculator.settings['cash']['credit_amount_max'])) {
            creditAmountInput.val(Calculator.settings['cash']['credit_amount_max']);
        }
    }, // end checkCreditAmountInterval

    checkTermInterval: function()
    {
        var termInput = jQuery('input[name="term"]', '#calculator_cash');

        if (parseInt(termInput.val().trim()) < parseInt(Calculator.settings['cash']['term_min'])) {
            termInput.val(Calculator.settings['cash']['term_min']);
        } else if (parseInt(termInput.val().trim()) > parseInt(Calculator.settings['cash']['term_max'])) {
            termInput.val(Calculator.settings['cash']['term_max']);
        }
    }, // end checkTermInterval

    calculateCash: function()
    {
        // get apply form data
        var creditAmount    = jQuery('input[name="credit_amount"]', '#calculator_cash').val().trim(),
            term            = jQuery('input[name="term"]', '#calculator_cash').val().trim();

		    if (!creditAmount || !term) {
			    return false;
		    }

        // send apply form register request
        jQuery.ajax({
            url:        '/calculator/cash',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       {
	            credit_amount: creditAmount,
	            term: term
            },
            success:    function(response) {
                if (response.status) {
                    jQuery('form#calculator_cash #cash_calculator_table').replaceWith(response.html);
                } else {
                    // todo: fuck :(
                }
            }
        });
    }, // end calculateCash

    initDepositEvents: function()
    {
        var depositAmountInput          = jQuery('input[name="deposit_amount"]', '#calculator_deposit'),
            termInput                   = jQuery('input[name="term"]', '#calculator_deposit'),
            monthlyInstallmentInput     = jQuery('input[name="monthly_installment"]', '#calculator_deposit'),
            currencySelect              = jQuery('select[name="currency"]', '#calculator_deposit'),
            isMain                      = jQuery('form#calculator_deposit').data('is-main'),
            amountTypingTimer, termTypingTimer, monthlyTypingTimer;

	    depositAmountInput.on('keyup', function () {
            clearTimeout(amountTypingTimer);
            amountTypingTimer = setTimeout(function() {
                Calculator.checkDepositAmountInterval();

                jQuery('input[name="deposit_amount"]', '#apply_form_deposit').val(
                    depositAmountInput.val().trim()
                );

                if (!isMain) {
                    Calculator.getInterestPayments();
                }

                setTimeout(Calculator.calculateDeposit(), 500);

            }, Calculator.doneTypingInterval);
	    });

        depositAmountInput.on('keydown', function () {
            clearTimeout(amountTypingTimer);
        });

        depositAmountInput.next().find('a').click(function() {
            jQuery('input[name="deposit_amount"]', '#apply_form_deposit').val(
                depositAmountInput.val().trim()
            );

            if (!isMain) {
                Calculator.getInterestPayments();
            }

            setTimeout(Calculator.calculateDeposit(), 500);
        });

        termInput.on('keyup', function() {
            clearTimeout(termTypingTimer);
            termTypingTimer = setTimeout(function() {
                Calculator.checkDepositTermInterval();

                jQuery('input[name="term"]', '#apply_form_deposit').val(termInput.val().trim());
                jQuery('.form_apply_deposit_page.page_2 .info_panel .months_count').html(termInput.val().trim());

                if (!isMain) {
                    Calculator.getInterestPayments();
                }

                setTimeout(Calculator.calculateDeposit(), 500);

            }, Calculator.doneTypingInterval);
        });

        termInput.on('keydown', function () {
            clearTimeout(termTypingTimer);
        });

        termInput.next().find('a').click(function() {
            jQuery('input[name="term"]', '#apply_form_deposit').val(termInput.val().trim());
            jQuery('.form_apply_deposit_page.page_2 .info_panel .months_count').html(termInput.val().trim());

            if (!isMain) {
                Calculator.getInterestPayments();
            }

            setTimeout(Calculator.calculateDeposit(), 500);
        });

        monthlyInstallmentInput.on('keyup', function() {
            clearTimeout(monthlyTypingTimer);
            monthlyTypingTimer = setTimeout(function() {
                Calculator.checkMonthlyInstallmentInterval();

                jQuery('input[name="monthly_installment"]', '#apply_form_deposit').val(
                    monthlyInstallmentInput.val().trim()
                );

                if (!isMain) {
                    Calculator.getInterestPayments();
                }

                setTimeout(Calculator.calculateDeposit(), 500);

            }, Calculator.doneTypingInterval);
        });

        monthlyInstallmentInput.on('keydown', function () {
            clearTimeout(monthlyTypingTimer);
        });

        monthlyInstallmentInput.next().find('a').click(function() {
            jQuery('input[name="monthly_installment"]', '#apply_form_deposit').val(
                monthlyInstallmentInput.val().trim()
            );

            if (!isMain) {
                Calculator.getInterestPayments();
            }

            setTimeout(Calculator.calculateDeposit(), 500);
        });

        currencySelect.change(function() {
            jQuery('input[name="currency"]', '#apply_form_deposit').val(
                currencySelect.val()
            );

            Calculator.currency = currencySelect.val();

            depositAmountInput.next().data('min', parseInt(Calculator.settings['deposit']['deposit_amount_min_' + Calculator.currency]));
            depositAmountInput.next().data('max', parseInt(Calculator.settings['deposit']['deposit_amount_max_' + Calculator.currency]));
            monthlyInstallmentInput.next().data('min', parseInt(Calculator.settings['deposit']['monthly_installment_min_' + Calculator.currency]));
            monthlyInstallmentInput.next().data('max', parseInt(Calculator.settings['deposit']['monthly_installment_max_' + Calculator.currency]));

            initCalculatorsHelpers();

            Calculator.checkDepositAmountInterval();
            Calculator.checkMonthlyInstallmentInterval();

            if (!isMain) {
                Calculator.getInterestPayments();
            }

            setTimeout(Calculator.calculateDeposit(), 500);
        });

        Calculator.initInterestButtonsChange();
    }, // end initDepositEvents

    initInterestButtonsChange: function()
    {
        var interestPaymentButtons = jQuery('.field_redemption .radio_button');

        interestPaymentButtons.not(".none_checked").click(function() {

            interestPaymentButtons.removeClass('checked');
            jQuery(this).addClass('checked');

            jQuery('input[name="interest_payment_percent"]', '#apply_form_deposit').val(
                jQuery(this).find('input[type="radio"]').data('percent')
            );

            jQuery('input[name="interest_payment_type"]', '#apply_form_deposit').val(
                jQuery(this).find('input[type="radio"]').data('type')
            );

            Calculator.calculateDeposit();
        });
    }, // end initInterestButtonsChange

    checkDepositAmountInterval: function()
    {
        var depositAmountInput = jQuery('input[name="deposit_amount"]', '#calculator_deposit');

        if (parseInt(depositAmountInput.val().trim()) < parseInt(Calculator.settings['deposit']['deposit_amount_min_' + Calculator.currency])) {
            depositAmountInput.val(Calculator.settings['deposit']['deposit_amount_min_' + Calculator.currency]);
        } else if (parseInt(depositAmountInput.val().trim()) > parseInt(Calculator.settings['deposit']['deposit_amount_max_' + Calculator.currency])) {
            depositAmountInput.val(Calculator.settings['deposit']['deposit_amount_max_' + Calculator.currency]);
        }
    }, // end checkDepositAmountInterval

    checkDepositTermInterval: function()
    {
        var termInput = jQuery('input[name="term"]', '#calculator_deposit');

        if (parseInt(termInput.val().trim()) < parseInt(Calculator.settings['deposit']['term_min'])) {
            termInput.val(Calculator.settings['deposit']['term_min']);
        } else if (parseInt(termInput.val().trim()) > parseInt(Calculator.settings['deposit']['term_max'])) {
            termInput.val(Calculator.settings['deposit']['term_max']);
        }
    }, // end checkDepositTermInterval

    checkMonthlyInstallmentInterval: function()
    {
        var monthlyInstallmentInput = jQuery('input[name="monthly_installment"]', '#calculator_deposit');

        if (parseInt(monthlyInstallmentInput.val().trim()) < parseInt(Calculator.settings['deposit']['monthly_installment_min_' + Calculator.currency])) {
            monthlyInstallmentInput.val(Calculator.settings['deposit']['monthly_installment_min_' + Calculator.currency]);
        } else if (parseInt(monthlyInstallmentInput.val().trim()) > parseInt(Calculator.settings['deposit']['monthly_installment_max_' + Calculator.currency])) {
            monthlyInstallmentInput.val(Calculator.settings['deposit']['monthly_installment_max_' + Calculator.currency]);
        }
    }, // end checkMonthlyInstallmentInterval

    getInterestPayments: function()
    {
        var depositAmount           = jQuery('input[name="deposit_amount"]', '#apply_form_deposit').val().trim(),
            term                    = jQuery('input[name="term"]', '#apply_form_deposit').val().trim(),
            monthlyInstallment      = jQuery('input[name="monthly_installment"]', '#apply_form_deposit').val().trim(),
            currency                = jQuery('input[name="currency"]', '#apply_form_deposit').val();

        if (!depositAmount || !term || !currency) {
            return false;
        }

        jQuery.ajax({
            url:        '/calculator/get-deposit-interest',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       {
                deposit_amount:         depositAmount,
                term:                   term,
                monthly_installment:    monthlyInstallment,
                currency:               currency
            },
            success:    function(response) {
                if (response.status) {
                    jQuery('form#calculator_deposit .field_redemption').replaceWith(response.html);

                    jQuery('input[name="interest_payment_percent"]', '#apply_form_deposit').val(response.max_percent);
                    jQuery('input[name="interest_payment_type"]', '#apply_form_deposit').val(response.max_percent_type);

                    Calculator.initInterestButtonsChange();
                } else {
                    // todo: fuck :(
                }
            }
        });
    }, // end getInterestsPayments

    calculateDeposit: function()
    {
        // get apply form data
        var depositAmount           = jQuery('input[name="deposit_amount"]', '#apply_form_deposit').val().trim(),
            term                    = jQuery('input[name="term"]', '#apply_form_deposit').val().trim(),
            monthlyInstallment      = jQuery('input[name="monthly_installment"]', '#apply_form_deposit').val().trim(),
            currency                = jQuery('input[name="currency"]', '#apply_form_deposit').val(),
            interestPaymentType     = jQuery('input[name="interest_payment_type"]', '#apply_form_deposit').val(),
            interestPaymentPercent  = jQuery('input[name="interest_payment_percent"]', '#apply_form_deposit').val();

        // calculator on the main page
        // if some required data doesn't exists
        var isMain = jQuery('form#calculator_deposit').data('is-main'),
            data = {};

        if (isMain) {
            if (!depositAmount || !term || !currency) {
                return false;
            }

            data = {
                deposit_amount:         depositAmount,
                term:                   term,
                monthly_installment:    monthlyInstallment,
                currency:               currency,
                is_main:                1
            };

        } else {
            if (!depositAmount || !term || !currency || !interestPaymentType) {
                return false;
            }

            data = {
                deposit_amount:             depositAmount,
                term:                       term,
                monthly_installment:        monthlyInstallment,
                currency:                   currency,
                interest_payment_type:      interestPaymentType,
                interest_payment_percent:   interestPaymentPercent,
                is_main:                    0
            };
        }

        // send apply form register request
        jQuery.ajax({
            url:        '/calculator/deposit',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       data,
            success:    function(response) {
                if (response.status) {
                    jQuery('form#calculator_deposit #deposit_calculator_table').replaceWith(response.html);
                    jQuery('form#calculator_deposit .profit span.sum').html(response.result + ' ' + Translator.t(response.currency));
                    jQuery('.form_apply_deposit_page.page_2 .info_panel .amount').html(response.sum + ' ' + Translator.t(Calculator.currency));

                    var isMain = jQuery('form#calculator_deposit').data('is-main');
                    if (!isMain) {
                        jQuery('.deposit_page_intro .half_right').html(response.slider_html);

                        initDepositIntro();
                        initDepositDragSlider();
                        initDepositTabsSliders();
                        initPopups();

                        ApplyDepositForm.bind();
                    }
                } else {
                    // todo: fuck :(
                }
            }
        });
    }, // end calculateDeposit

    toDepositPage: function()
    {
        var depositAmount       = jQuery('input[name="deposit_amount"]', '#calculator_deposit').val().trim(),
            term                = jQuery('input[name="term"]', '#calculator_deposit').val().trim(),
            monthlyInstallment  = jQuery('input[name="monthly_installment"]', '#calculator_deposit').val().trim(),
            currency            = jQuery('select[name="currency"]', '#calculator_deposit').val();

        var preparedParams = jQuery.param({
            'deposit_amount':       encodeURIComponent(depositAmount),
            'term':                 encodeURIComponent(term),
            'monthly_installment':  encodeURIComponent(monthlyInstallment),
            'currency':             encodeURIComponent(currency)
        });

        window.location = Calculator.deposit_page_url + '?' + preparedParams;
    }
};

jQuery(document).ready(function() {
    Calculator.init();
});
