@section('title', 'Admin Dashboard')
<x-app-layout>
    <x-slot name="header">
        <div id="admin-navbar">
            <span id="admin-navbar-title">Admin Dashboard</span>
        </div>
    </x-slot>
    <div id="admin-dashboard-main">
        <div id="admin-dashboard-card">
            <h3 id="admin-dashboard-title">Admin Management Options</h3>
            <div id="admin-dashboard-links">
                <a href="{{ route('banks.index') }}" class="admin-dashboard-link">
                    <span class="admin-dashboard-icon">🏦</span>
                    <div>Manage Banks</div>
                </a>
                <a href="{{ route('users.index') }}" class="admin-dashboard-link">
                    <span class="admin-dashboard-icon">👤</span>
                    <div>Manage Users</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

@push('styles')
<style>
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f7fafc;
}
#admin-navbar {
    width: 100%;
    background: #fff;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.2rem 2.5rem 1.2rem 2.5rem;
    border-bottom: 1px solid #e2e8f0;
}
#admin-navbar-title {
    font-size: 2rem;
    color: #2d3748;
    font-weight: bold;
    letter-spacing: 1px;
}
#admin-dashboard-main {
    min-height: 70vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f7fafc;
}
#admin-dashboard-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07);
    padding: 2.5rem 2rem;
    min-width: 340px;
    max-width: 400px;
    width: 100%;
    text-align: center;
    animation: fadeInCard 1s cubic-bezier(.4,0,.2,1);
}
#admin-dashboard-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 2rem;
    color: #2d3748;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px #e3e8f0;
    animation: fadeInTitle 1.2s cubic-bezier(.4,0,.2,1);
}
#admin-dashboard-links {
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    justify-content: center;
}
.admin-dashboard-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #f1f5f9;
    border-radius: 12px;
    padding: 1.2rem 1.5rem;
    min-width: 120px;
    text-decoration: none;
    color: #2d3748;
    font-weight: 500;
    font-size: 1rem;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
    transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.2s;
    animation: fadeInLink 1.2s cubic-bezier(.4,0,.2,1);
}
.admin-dashboard-link:hover {
    background: #e2e8f0;
    color: #1a202c;
    box-shadow: 0 4px 16px 0 rgba(0,0,0,0.08);
    transform: translateY(-4px) scale(1.04);
}
.admin-dashboard-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    filter: drop-shadow(0 2px 6px #e0e7ef);
    animation: iconBounce 1.1s cubic-bezier(.4,0,.2,1);
}
@keyframes fadeInCard {
    0% { opacity: 0; transform: scale(0.95) translateY(30px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
}
@keyframes fadeInTitle {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInLink {
    0% { opacity: 0; transform: translateY(20px) scale(0.95); }
    100% { opacity: 1; transform: translateY(0) scale(1); }
}
@keyframes iconBounce {
    0% { transform: scale(0.8); }
    60% { transform: scale(1.15); }
    100% { transform: scale(1); }
}
</style>
@endpush

@push('scripts')
@endpush
