    @php
        $page = request()->segment(1);
    @endphp



    <nav class="shadow-md h-screen overflow-y-auto relative w-80">
        <h1 class="text-3xl w-max p-5 my-12 font-extrabold text-primary text-center">LES BIAR BISA</h1>
        <div class="pr-5 flex flex-col gap-4 menu-sidebar">
            <a class="item-nav {{ $page == 'dashboard' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('dashboard.index') }}">
                <img src="{{ $page == 'dashboard' ? asset('assets/icon/home-light.png') : asset('assets/icon/home-dark.png') }}"
                    alt="images">
                <p class="text-base">DASHBOARD</p>
            </a>
            {{ route('dashboard.index') }}
            <a class="item-nav {{ $page == 'mycourse' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('mycourse.index') }}">
                <img src="{{ $page == 'mycourse' ? asset('assets/icon/course-light.png') : asset('assets/icon/course-dark.png') }}"
                    alt="images">
                <p class="text-base">MY COURSE</p>
            </a>
            <a class="item-nav {{ $page == 'schedule' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('schedule.index') }}">
                <img src="{{ $page == 'schedule' ? asset('assets/icon/schedule-light.png') : asset('assets/icon/schedule-dark.png') }}"
                    alt="images">
                <p class="text-base">SCHEDULE</p>
            </a>
            <a class="item-nav {{ $page == 'assignment' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('assignment.index') }}">
                <img src="{{ $page == 'assignment' ? asset('assets/icon/assignment-light.png') : asset('assets/icon/assignment-dark.png') }}"
                    alt="images">
                <p class="text-base">ASSIGNMENT</p>
            </a>
            <a class="item-nav {{ $page == 'payment' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('payment.index') }}">
                <img src="{{ $page == 'payment' ? asset('assets/icon/payment-light.png') : asset('assets/icon/payment-dark.png') }}"
                    alt="images">
                <p class="text-base">PAYMENT</p>
            </a>
            <a class="item-nav {{ $page == 'logout' ? 'text-white bg-primary' : 'text-primary' }}"
                href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/icon/logout.png') }}" alt="images">
                <p class="text-base">LOGOUT</p>
            </a>
        </div>
    </nav>