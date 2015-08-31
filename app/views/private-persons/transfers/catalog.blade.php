@extends('layouts.default')

@section('wrapper_class')
    page_transfers_catalog
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => false])

    <div class="transfers_catalog_block">
        @foreach($transfers as $transfer)
            <div class="transfers_catalog_block_item">
                <div class="transfers_catalog_block_item_info">
                    <h3>{{$transfer->t('title')}}</h3>

                    <div class="transfers_catalog_info">
                        @if ($transfer->t('benefits'))
                            <ul>
                                <?php $benefits = explode(';', $transfer->t('benefits')); ?>
                                @foreach($benefits as $benefit)
                                    <li>{{$benefit}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <a class="btn btn_yellow" href="{{geturl($transfer->getUrl())}}"><span>{{__('подробнее')}}</span></a>
                    </div>
                </div>

                <img src="{{asset($transfer->getImageSource('original', 'preview'))}}" alt="{{$transfer->t('title')}}"/>
            </div>
        @endforeach
    </div>
@stop