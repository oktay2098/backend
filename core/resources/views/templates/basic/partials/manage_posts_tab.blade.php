<div>
    <a href="{{  route('user.service.index') }}" class="btn {{ request()->routeIs('user.service.index') ? "btn-green" : "btn-blue" }} rounded">@lang('Manage Services')</a>
    <a href="{{  route('user.software.index') }}" class="btn {{ request()->routeIs('user.software.index') ? "btn-green" : "btn-blue" }} rounded">@lang('Manage Product')</a>
    <a href="{{  route('user.blog') }}" class="btn {{ request()->routeIs('user.blog') ? "btn-green" : "btn-blue" }} rounded">@lang('Manage Blogs')</a>
    <a href="{{  route('user.job.index') }}" class="btn {{ request()->routeIs('user.job.index') ? "btn-green" : "btn-blue" }} rounded">@lang('Manage Job')</a>
  </div>