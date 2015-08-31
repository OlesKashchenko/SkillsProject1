<div class="popup popup_side none popup_about_leadership" data-id="{{$leader->id}}">
    <div class="popup_content">
        <div class="leadership_img">
            <img src="{{asset($leader->getImageSource('original', 'preview'))}}">
        </div>
        <div class="leadership_info">
            <h3>{{$leader->t('title')}}</h3>
            <small>{{$leader->t('short_description')}}</small>
            <?php
             $articles = explode('|', $leader->t('description'));
            ?>
            @foreach($articles as $data)
            <div>{{$data}}</div>
            @endforeach
        </div>
    </div>
    <span class="close"></span>
</div>