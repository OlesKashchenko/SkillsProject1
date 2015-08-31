<footer class="footer">
    <div class="max_width">
        <div class="footer_head">
            <div class="logos">
                <a href="{{Settings::get('footer_alfa_saving', '')}}"><img src="/images/samples/footer_logo_1.png" alt=""/></a>
                <a href="{{Settings::get('footer_alfa_lizing', '')}}"><img src="/images/samples/footer_logo_2.png" alt=""/></a>
                <a href="{{Settings::get('footer_alfa_a_club', '')}}"><img src="/images/samples/footer_logo_3.png" alt=""/></a>
                <a href="{{Settings::get('footer_alfa_jazz', '')}}"><img src="/images/samples/footer_logo_4.png" alt=""/></a>
                <a href="{{Settings::get('footer_maxi', '')}}"><img src="/images/samples/footer_logo_5.png" alt=""/></a>
                <a href="{{Settings::get('footer_ibox', '')}}"><img src="/images/samples/footer_logo_6.png" alt=""/></a>
            </div>
        </div>

        <div class="footer_body">
            @foreach($footerMenu as $menuItems)
                {{--{{dr($menuItems)}}--}}
                <div class="clmn">
                    @foreach($menuItems as $menuItem)
                        <a href="{{geturl($menuItem['url'])}}">{{$menuItem['title']}}</a>
                    @endforeach
                </div>
            @endforeach

            <div class="clmn wide wdth">
                <div class="phone"><b>{{Settings::get('footer_phone_number', '')}}</b><br/>{{__('круглосуточно (бесплатно с моб. по Украине)')}}</div>
            </div>

            <a class="search_link" data-popup="popup_sitemap"><i class="icon icon_search"></i></a>
        </div>

        <div class="footer_footer">
            <div class="copyright">{{Settings::get('footer_copyright_'. App::getLocale(), '')}}</div>
            <a href="{{Settings::get('visualizers', '')}}" target="_blank" class="developer"></a>
            <a href="{{Settings::get('site_vis_a_vis', '')}}" target="_blank" class="agency"></a>
        </div>
    </div>

    <div class="footer_social">
        <a href="{{Settings::get('social_fb', '')}}"><i class="icon icon_fb"></i></a>
        <a href="{{Settings::get('social_vk', '')}}"><i class="icon icon_vk"></i></a>
        <a href="{{Settings::get('social_od', '')}}"><i class="icon icon_od"></i></a>
        <a href="{{Settings::get('social_tw', '')}}"><i class="icon icon_tw"></i></a>
        <a href="{{Settings::get('social_li', '')}}"><i class="icon icon_li"></i></a>
        <a href="{{Settings::get('social_yt', '')}}"><i class="icon icon_yt"></i></a>
        <a href="{{Settings::get('social_gp', '')}}"><i class="icon icon_gp"></i></a>
        <a href="{{Settings::get('social_rs', '')}}"><i class="icon icon_rs"></i></a>
    </div>
</footer>