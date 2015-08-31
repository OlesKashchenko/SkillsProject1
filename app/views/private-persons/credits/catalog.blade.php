@extends('layouts.default')

@section('wrapper_class')
    page_credit_catalog
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => false])

    <div class="credit_catalog_block">
        @if (isset($credits) && $credits->count())
            @foreach($credits as $credit)
                <div class="credit_catalog_block_item">
                    <div class="credit_catalog_block_item_info">
                        <h3>{{$credit->t('title')}}</h3>

                        <div class="credit_catalog_info">
                            @if ($credit->t('benefits'))
                                <ul>
                                    <?php $benefits = explode(';', $credit->t('benefits')); ?>
                                    @foreach($benefits as $benefit)
                                        <li>{{$benefit}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <a class="btn btn_yellow" href="{{geturl($credit->getUrl())}}"><span>{{__('подробнее')}}</span></a>
                        </div>
                    </div>

                    <img src="{{asset($credit->getImageSource('original', 'preview'))}}" alt="{{$credit->t('title')}}"/>
                </div>
            @endforeach
        @else
            <p>{{__('В данный момент раздел наполняется контентом')}}</p>
        @endif
    </div>
@stop
