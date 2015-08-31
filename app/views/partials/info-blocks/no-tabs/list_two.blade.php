@if ($block->children->count() && $block->isActive())
    <div class="transfer_page_peculiarity">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>
            <table>
                <tbody>
                <tr>
                    @foreach($block->children as $slide)
                        @if ($slide->isActive())
                            <td>
                                <p>{{$slide->t('title')}}</p>
                            </td>
                            @if ($loop->index1 % 3 == 0)
                                </tr>
                                <tr>
                            @endif
                        @endif
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif