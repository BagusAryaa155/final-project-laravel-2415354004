@props(['active' => ''])

<aside id="sidebar" class="w-64 bg-white border-r border-gray-200 flex flex-col min-h-screen transition-all duration-300">
    <div class="px-4 py-4 flex items-center justify-between sidebar-header">
        <img src="/images/logo.svg" alt="ERP Logo" class="sidebar-logo h-20">
        <button id="sidebar-toggle" class="text-gray-400 hover:text-gray-600">
            <span class="iconify" data-icon="material-symbols:grid-layout-side-outline" style="font-size: 32px;"></span>
        </button>
    </div>

    <nav class="flex-1 px-4 mt-4 space-y-1">
        <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ $active === 'customers' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
            <span class="iconify" data-icon="ic:baseline-people" style="font-size: 24px;"></span>
            <span class="sidebar-label">Customers</span>
        </a>
        <a href="{{ route('services.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ $active === 'services' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
            <span class="iconify" data-icon="mdi:cube" style="font-size: 24px;"></span>
            <span class="sidebar-label">Services</span>
        </a>
        <a href="{{ route('subscriptions.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ $active === 'subscriptions' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
            <span class="iconify" data-icon="material-symbols:note-rounded" style="font-size: 24px;"></span>
            <span class="sidebar-label">Subscription</span>
        </a>
    </nav>

</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {


        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('sidebar-toggle');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
            const header = sidebar.querySelector('.sidebar-header');
            header.classList.toggle('justify-between');
            header.classList.toggle('justify-center');
        });
    });
</script>