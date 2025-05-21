@section('title', 'User Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Dashboard
        </h2>
    </x-slot>
    <div class="user-dashboard-container">
        <div class="user-dashboard-card">
            <h3 class="user-dashboard-title">Welcome to your dashboard!</h3>
            <div class="user-dashboard-links">
                <a href="{{ route('credit.form') }}" class="user-dashboard-link">
                    <span class="user-dashboard-icon">📊</span>
                    <div>Calculate iScore</div>
                </a>
                <a href="{{ route('history') }}" class="user-dashboard-link">
                    <span class="user-dashboard-icon">📁</span>
                    <div>Score History</div>
                </a>
                <a href="{{ route('export') }}" class="user-dashboard-link">
                    <span class="user-dashboard-icon">⬇️</span>
                    <div>Export Report</div>
                </a>
                <a href="{{ route('tips') }}" class="user-dashboard-link">
                    <span class="user-dashboard-icon">💡</span>
                    <div>Credit Tips</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

@push('styles')
<style>
.user-dashboard-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
    background: #f7fafc;
}
.user-dashboard-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07);
    padding: 2.5rem 2rem;
    min-width: 340px;
    max-width: 400px;
    width: 100%;
    text-align: center;
}
.user-dashboard-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 2rem;
    color: #2d3748;
}
.user-dashboard-links {
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    justify-content: center;
}
.user-dashboard-link {
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
    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
}
.user-dashboard-link:hover {
    background: #e2e8f0;
    color: #1a202c;
    box-shadow: 0 4px 16px 0 rgba(0,0,0,0.08);
}
.user-dashboard-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}
</style>
@endpush
