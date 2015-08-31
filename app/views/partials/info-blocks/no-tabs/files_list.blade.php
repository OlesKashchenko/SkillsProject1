@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_restrictions">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>

            <ul class="download_list">
                @foreach($block->children as $file)
                    @if ($file->isActive() && File::exists($file->file))
                        <li>
                            <a href="{{asset($file->file)}}">
                                {{$file->t('title')}}
                                <span class="type">{{File::extension($file->file)}}</span>
                                <span class="size">{{Util::formatSizeUnits(File::size($file->file))}}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif