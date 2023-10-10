<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ tokalink::getAdminPrefix() }}" class="app-brand-link">
            <span class=" demo">
                  <img src="{{ config('tokalink.logo_web') ?? '/assets-admin/theme2/img/logo.png' }}" alt="Brand Logo" class="img-fluid">
            </span>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        @php
            $activeRoute = $menu ?? '';
        @endphp
        @foreach (config('tokalink.menu') as $key => $menu)
            @if (count($menu['child']) > 0)
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">{{ $key }}</span>
                  </li>
                  @foreach ($menu['child'] as $key2 => $menu2)
                     @if (count($menu2['child']) > 0)
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon {{ $menu2['icon'] }}"></i>
                                <div data-i18n="{{ $key2 }}">{{ $key2 }}</div>
                            </a>
                            <ul class="menu-sub">
                                 @foreach ($menu2['child'] as $key3 => $menu3)
                                    <li class="menu-item">
                                       <a href="/{{ tokalink::getAdminPrefix() }}/{{ $menu3['route'] }}" class="menu-link">
                                          <div data-i18n="{{ $key3 }}">{{ $key3 }}</div>
                                       </a>
                                    </li>
                                 @endforeach
                            </ul>
                        </li>
                     @else
                        <li class="menu-item {{ $activeRoute == $menu2['route'] ? 'active':'' }}">
                           <a href="/{{ tokalink::getAdminPrefix() }}/{{ $menu2['route'] }}" class="menu-link">
                              <i class="menu-icon {{ $menu2['icon'] }}"></i>
                              <div data-i18n="{{ $key2 }}">{{ $key2 }}</div>
                           </a>
                        </li>
                     @endif
                  @endforeach
            @endif
        @endforeach

        <!-- Apps & Pages -->
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>
        <li class="menu-item">
            <a href="/{{ tokalink::getAdminPrefix() }}/users" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
        </li> --}}

        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-forms"></i>
                <div data-i18n="Setting">Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/{{ tokalink::getAdminPrefix() }}/module" class="menu-link">
                        <div data-i18n="Module">Module</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/{{ tokalink::getAdminPrefix() }}/menu" class="menu-link">
                        <div data-i18n="Menu">Menu</div>
                    </a>
                </li>

            </ul>
        </li> --}}
    </ul>
</aside>
