<div>
       <div>
           <a href="{{ route('user.service.index') }}" class="btn  {{ request()->routeIs('user.service.index') ?  "btn-primary" :"btn-secondary" }} btn-sm">@lang('Manage Services')</a>
       
        <a href="{{ route('user.software.index') }}" class="btn  {{ request()->routeIs('user.software.index') ?  "btn-primary" :"btn-secondary" }} btn-sm">@lang('Manage Product')</a>
   
        <a href="{{ route('user.blog') }}" class="btn  {{ request()->routeIs('user.blog') ?  "btn-primary" :"btn-secondary" }} btn-sm">@lang('Manage Blogs')</a>

        <a href="{{ route('user.job.index') }}" class="btn  {{ request()->routeIs('user.job.index') ?  "btn-primary" :"btn-secondary" }} btn-sm">@lang('Manage Job')</a>
    </div>
    
 </div>