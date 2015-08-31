<!--<script>visible_popup = 'popup_atms'</script>-->
<div class="popup popup_side none popup_atms">
    <div class="popup_content">
        <div class="atms_block">
            <h3>Отделения и банкоматы</h3>
            <form class="form" action="" method="post">
                <div class="field field_search">
                    <div class="input_holder">
                        <div class="placeholder">Город, улица, станция метро</div>
                        <input type="text" name="data[search]">
                        <a class="extended_search" href="">Расширенный поиск</a>
                    </div>
                </div>

                <div class="submit">
                    <input type="submit" class="btn" value="">
                </div>
                <div class="clear"></div>

                <div class="atms_filters js_tabs">
                    <div class="atms_filters_tabs_head js_tabs_head">
                        <div class="tab">Отделения</div>
                        <div class="tab">Банкоматы</div>
                    </div>
                    <div class="atms_filter_tabs js_tabs_body">
                        <div class="tab">
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Свободная касса</label>
                                </div>
                            </div>
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Условия для бизнеса</label>
                                </div>
                            </div>
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Персональный менеджер</label>
                                </div>
                            </div>
                        </div><!--.tab-->

                        <div class="tab">
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Внести	деньги</label>
                                </div>
                            </div>
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Получить деньги</label>
                                </div>
                            </div>
                        </div><!--.tab-->
                    </div><!--.atms_filter_tabs-->
                </div><!--.atms_filters-->
            </form>

            <script>
                //markersJSONArray = '[{"id":"1","html":"\u0410\u0440\u0442\u0435\u043c\u0430 \u0432\u0443\u043b 3","lat":"37.504675","lng":"47.943569"},{"id":"8","html":"\u0421\u0456\u0440\u0433\u043e \u0432\u0443\u043b 6","lat":"38.581675","lng":"48.522412"},{"id":"9","html":"\u041b\u0435\u043d\u0456\u043d\u0430 \u0432\u0443\u043b 57","lat":"38.834362","lng":"48.465934"},{"id":"10","html":"\u0421\u0430\u0440\u043c\u0430\u0442\u0441\u044c\u043a\u0430 \u0432\u0443\u043b 34","lat":"38.844048","lng":"48.461416"},{"id":"11","html":"\u041b\u0438\u043f\u043e\u0432\u0435\u043d\u043a\u043e \u0432\u0443\u043b 6","lat":"38.812573","lng":"48.473448"},{"id":"12","html":"\u0427\u0430\u043f\u0430\u0454\u0432\u0430 \u0432\u0443\u043b 64","lat":"38.786466","lng":"48.459086"},{"id":"13","html":"\u041c\u0435\u0442\u0430\u043b\u0443\u0440\u0433\u0456\u0432 \u043f\u0440 43","lat":"38.840801","lng":"48.472052"},{"id":"14","html":"\u0413\u043e\u0440\u044c\u043a\u043e\u0433\u043e \u0432\u0443\u043b 49","lat":"38.798427","lng":"48.467862"},{"id":"15","html":"\u0427\u0430\u0439\u043a\u043e\u0432\u0441\u044c\u043a\u043e\u0433\u043e \u0432\u0443\u043b 24","lat":"38.820307","lng":"48.489191"},{"id":"16","html":"\u041b\u0438\u043f\u043e\u0432\u0435\u043d\u043a\u043e \u0432\u0443\u043b 11","lat":"38.816449","lng":"48.472259"},{"id":"17","html":"\u0424\u0440\u0443\u043d\u0437\u0435 \u0432\u0443\u043b 54","lat":"38.805671","lng":"48.468857"},{"id":"18","html":"\u041b\u0435\u043d\u0456\u043d\u0433\u0440\u0430\u0434\u0441\u044c\u043a\u0430 \u0432\u0443\u043b 56","lat":"38.804069","lng":"48.474424"},{"id":"19","html":"\u0413\u043c\u0438\u0440\u0456 \u0432\u0443\u043b 18 \u0432","lat":"38.832781","lng":"48.469409"},{"id":"20","html":"\u041a\u0456\u0440\u043e\u0432\u0430 \u0432\u0443\u043b 17","lat":"38.796337","lng":"48.469305"}]';
            </script>
            <div class="atm_map_holder">
                <div class="atm_map" id="map-canvas"></div>
            </div>
        </div><!--.atms_block-->
    </div>
    <span class="close"></span>
</div><!--.popup_atms-->