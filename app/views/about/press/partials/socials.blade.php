<div class="news_social_fixed">
    <div class="news_social_relative">
        <ul class="news_social">
            <li class="news_social_fb">
                <a href="{{ LarShare::facebook(['picture' => asset($item->getImageSource('original', 'image')), 'title' => $item->t('title')])->getUrl() }}" target="_blank">fb</a>
                {{ LarShare::facebook()->getSharedCount() }}
            </li>
            <li class="news_social_vk">
                <a href="{{ LarShare::vk(['image' => asset($item->getImageSource('original', 'image')), 'title' => $item->t('title')])->getUrl() }}" target="_blank">vk</a>
                {{ LarShare::vk()->getSharedCount() }}
            </li>
            <li class="news_social_tw">
                <a href="{{ LarShare::twitter(['text' => $item->t('title')])->getUrl() }}" target="_blank">tw</a>
                {{ LarShare::twitter()->getSharedCount() }}
            </li>
        </ul>
    </div>
</div>