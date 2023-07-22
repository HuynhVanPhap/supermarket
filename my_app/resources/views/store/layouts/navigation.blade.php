<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                    data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home.page') }}" class="act">{{ __('Home') }}</a></li>
                    <!-- Mega Menu -->
                    @if (!blank($navigation))
                        @foreach ($navigation as $rootCategory)
                            <li class="dropdown">
                                <a href="{{ route('category.page', $rootCategory->slug) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $rootCategory->name }}<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                {{-- <h6>Tea &amp; Coeffe</h6> --}}
                                                @foreach ($rootCategory->categories as $category)
                                                    <li><a href="{{ route('category.page', $category->slug) }}">{{ $category->name  }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </ul>
                            </li>
                        @endforeach
                    @endif
                    <li><a href="contact.html">{{ __('Contact') }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
