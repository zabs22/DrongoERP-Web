@php
    $arrow = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-brand-500"><path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" /></svg>';

    // TODO: point these at the real management pages once their routes exist.
    $sections = [
        [
            'title' => 'Projects',
            'body' => 'You can create, view, edit or delete projects from your projects controller page. Some functionalities, such as deleting projects, are only available to administrators.',
            'link' => 'Explore projects page',
            'href' => '#',
            'icon' => 'M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z',
        ],
        [
            'title' => 'Task Management',
            'body' => 'Efficiently create, modify, or remove tasks directly from your DrongoPMA dashboard. Utilize a streamlined approach to task management, ensuring seamless organization and control.',
            'link' => 'Visit Drongo Project Management Assistant',
            'href' => '#',
            'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        [
            'title' => 'Employees',
            'body' => "Establish new user accounts or edit your existing users' profiles with ease. Employ a comprehensive system for managing employee accounts, enabling efficient administration of user privileges and access.",
            'link' => 'Go to employee management page',
            'href' => '#',
            'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z',
        ],
        [
            'title' => 'News Articles',
            'body' => 'Seamlessly create new articles or oversee the management of your current news articles. Navigate to the news articles management page for comprehensive control.',
            'link' => 'Go to news articles management page',
            'href' => '#',
            'icon' => 'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z',
        ],
    ];
@endphp

<div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
    @foreach ($sections as $section)
        <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-900/5">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-brand-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $section['icon'] }}" />
                </svg>
                <h4 class="ms-3 text-lg font-semibold text-gray-900">
                    <a href="{{ $section['href'] }}">{{ $section['title'] }}</a>
                </h4>
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                {{ $section['body'] }}
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ $section['href'] }}" class="inline-flex items-center font-semibold text-brand-600 hover:text-brand-700">
                    {{ $section['link'] }}
                    {!! $arrow !!}
                </a>
            </p>
        </div>
    @endforeach
</div>
