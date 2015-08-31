@if ($tab->t('description'))
    <?php $parts = explode('|', strip_tags($tab->t('description'))); ?>
    <div class="tab">
        <div class="tab_inner">
            @if (isset($parts[0]))
                <div class="tab_half left">
                    <p>{{$parts[0]}}</p>
                </div>
            @endif
            @if (isset($parts[1]))
                <div class="tab_half right">
                    <p>{{$parts[1]}}</p>
                </div>
            @endif

            <div class="clear"></div>
        </div>
    </div>
@endif
