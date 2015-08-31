@if ($reporting->isActive () && $reporting->children->count())
    <div class="investor_reports">
        <div class="max_width">
            <h2>{{$reporting->t('title')}}</h2>
            <div class="select_holder mini_red">
                <select class="custom_select year_select" onchange="App.initChangeYear();">
                    @foreach($reporting->children as $year)
                        @if($year->isActive() && $year->children->count() )
                            <option value="{{$year->t('title')}}" data-id-year="{{$year->id}}" class="value_select">{{$year->t('title')}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="clear"></div>

            @foreach($reporting->children as $year)
                 @if($year->isActive() && $year->children->count())
                    <div class="investor_reports_tabs js_tabs" id="{{$year['title']}}" {{!$loop->first ? "style = 'display: none'" : ""}} data-id-year="{{$year->id}}" data-autoheight="true">
                        <div class="investor_reports_tabs_head js_tabs_head">
                              @foreach($year->children as $reportTab)
                                  @if($reportTab->isActive() && $reportTab->children->count())
                                      <div class="tab" data-id-tab="{{$reportTab->t('title')}}">{{$reportTab->t('title')}}</div>
                                  @endif
                              @endforeach
                        </div>

                          <div class="investor_reports_tabs_body js_tabs_body">
                              @foreach($year->children as $reportTab)
                                 @if($reportTab->isActive() && $reportTab->children->count())
                                      <div class="tab" style="display: block">
                                          <div class="tab_inner">
                                              <ul>
                                                  @foreach($reportTab->children as $file)
                                                      @if ($file->isActive() && File::exists($file->file))
                                                          <li>
                                                              <a href="{{asset($file->file)}}" target="_blank">
                                                                  {{$file->t('title')}}
                                                                  <span class="type">{{File::extension($file->file)}}</span>
                                                                  <span class="size">{{Util::formatSizeUnits(File::size($file->file))}}</span>
                                                              </a>
                                                          </li>
                                                      @endif
                                                  @endforeach
                                              </ul>
                                              @if($reportTab->children->count() > 2)
                                                  <a class="show_more" href="#">{{__('показать все ')}}{{$reportTab->children->count()}}{{__(' отчетов')}} </a>
                                              @endif

                                              <div class="clear"></div>
                                          </div>
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                      </div>
                @endif
            @endforeach
        </div>
    </div>
@endif

@section('custom_scripts')
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                jQuery('.investor_reports_tabs_body').css('height', '450px');
            }, 100);
        });
    </script>
@stop
