<!--<script>visible_popup = 'popup_send_form'</script>-->
<div class="popup popup_side none popup_send_form">
    <div class="popup_content">
        <h3>Написать сообщение</h3>

        <form class="form form_send_form" action="" method="post">
            <div class="fields_group">
                <div class="field margin-fix">
                    <label>ФИО</label>
                    <div class="input_holder">
                        <input type="text" name="data[name]">
                        <div class="placeholder">Фамилия</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="data[name]">
                        <div class="placeholder">Имя</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="data[name]">
                        <div class="placeholder">Отчество</div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label>Эл. адрес</label>
                <div class="input_holder">
                    <input type="text" name="data[email]">
                </div>
            </div>

            <div class="field field_text">
                <label>Сообщение</label>
                <div class="input_holder">
                    <textarea type="text" name="data[message]"></textarea>
                </div>
            </div>

            <div class="submit btn btn_big btn_red">
                <input type="submit" class="input_btn" value="отправить">
            </div>
        </form>
    </div>
    <span class="close"></span>
</div>