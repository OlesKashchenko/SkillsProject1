
    <div class="investor_reports_tabs js_tabs">
           <div class="investor_reports_tabs_head js_tabs_head">
               @foreach($reporting->children as $year)
                   @if($year->isActive() && $year->children->count() && $loop->first)
                       @foreach($year->children as $reportTabs)
                           @if($reportTabs->isActive() && $reportTabs->children->count())
                               <div class="tab" data-id-tab="{{$reportTabs->t('title')}}">{{$reportTabs->t('title')}}</div>
                           @endif
                       @endforeach
                   @endif
               @endforeach
           </div><!--.investor_reports_tabs_head-->

           <div class="investor_reports_tabs_body js_tabs_body">
           @foreach($reporting->children as $year)
              @if($year->isActive() && $year->children->count() && $loop->first)
                   <div class="tab">
                       <ul>
                           @foreach($year->children as $reportTabs)
                               @if($reportTabs->isActive() && $reportTabs->children->count())
                                   <li> @foreach($year->children as $files)
                                           @if ($files->isActive() && File::exists($files->file))

                                                   <a href="{{asset($files->file)}}" target="_blank">
                                                       {{$files->t('title')}}
                                                       <span class="type">{{File::extension($files->file)}}</span>
                                                       <span class="size">{{Util::formatSizeUnits(File::size($files->file))}}</span>
                                                   </a>

                                           @endif
                                       @endforeach
                                   </li>
                               @endif
                           @endforeach
                       </ul>
                       <a class="show_more" href="">показать все 8 отчетов</a>
                   </div>
               @endif
           @endforeach
           {{--<div class="tab"></div>
               <div class="tab"></div>--}}
           </div><!--.investor_reports_tabs_body-->

       </div><!--.investor_reports_tabs-->