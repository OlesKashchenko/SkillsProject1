@if ($tab->children->count())
    <div class="tab">
        <div class="tab_inner">
            <div class="table_holder">
                <table>
                    <tbody>
                        <tr>
                            @foreach($tab->children as $item)
                                @if ($item->isActive())
                                    <td><p>{{$item->t('title')}}</p></td>

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
            <div class="clear"></div>
        </div>
    </div>
@endif