<!--Yandex Metrika Code-->
<!--/Yandex Metrika Code-->

{{-- frontend scripts --}}
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/apply_form.js')}}"></script>
<script src="{{asset('js/apply_form_deposit.js')}}"></script>
<script src="{{asset('js/feedbacks.js')}}"></script>
<script>
    App.token = '{{ csrf_token() }}';
</script>

{{-- backend scripts --}}
<script src="{{asset('packages/yaro/jarboe/js/translator.js')}}"></script>
<script>
    App.lang = '{{App::getLocale()}}';

    Translator.lang = '{{App::getLocale()}}';
    Translator.translates = {{json_encode(Collector::get('translates'))}};
</script>
