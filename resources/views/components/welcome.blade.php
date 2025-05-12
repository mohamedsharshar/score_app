<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iScore Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for iScore */
        .iscore-bg {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .score-gauge {
            width: 100%;
            height: 20px;
            background: linear-gradient(to right,
                #ef4444 0%, #ef4444 34%,
                #f97316 34%, #f97316 47%,
                #eab308 47%, #eab308 60%,
                #22c55e 60%, #22c55e 76%,
                #10b981 76%, #10b981 100%);
            border-radius: 5px;
            position: relative;
        }
        .score-marker {
            position: absolute;
            top: -5px;
            width: 4px;
            height: 30px;
            background: #000;
            transform: translateX(-50%);
        }
        .theme-toggle {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .dark .iscore-bg {
            background: linear-gradient(135deg, #1f2937, #4b5563);
        }
        .dark .bg-white {
            background-color: #1f2937;
        }
        .dark .text-gray-900 {
            color: #e5e7eb;
        }
        .dark .text-gray-500 {
            color: #9ca3af;
        }
        .dark .bg-gray-200 {
            background-color: #374151;
        }
        .dark .stroke-gray-400 {
            stroke: #9ca3af;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Header Section -->
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 iscore-bg text-white">
        <div class="flex items-center">
            <!-- Placeholder for iScore Logo -->
            <svg class="h-12 w-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5zm0 0V4m0 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8z" />
            </svg>
            <h1 class="ml-4 text-2xl font-medium">iScore</h1>
        </div>
        <h1 class="mt-8 text-2xl font-medium text-white">
            Welcome to your iScore Dashboard!
        </h1>
        <p class="mt-6 text-gray-200 leading-relaxed">
            iScore is your personal credit score companion, designed to help you understand and improve your financial health. By analyzing key factors like payment history, debt levels, credit history, and account diversity, iScore calculates a comprehensive credit score (0–850) tailored to your financial profile. Track your progress, export reports, and follow expert tips to boost your creditworthiness.
        </p>
        <!-- Theme Toggle -->
        <button id="theme-toggle" class="theme-toggle mt-4 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
            Toggle Dark Mode
        </button>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <!-- Calculate Score Card -->
        <div class="bg-white p-6 rounded-lg shadow card-hover">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zm2.25-4.5h.008v.008H10.5v-.008zm0 2.25h.008v.008H10.5v-.008zm0 2.25h.008v.008H10.5v-.008zm0 2.25h.008v.008H10.5v-.008zm2.25-4.5h.008v.008H12.75v-.008zm0 2.25h.008v.008H12.75v-.008zm0 2.25h.008v.008H12.75v-.008zm0 2.25h.008v.008H12.75v-.008z" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                    Calculate Your iScore
                </h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Input your financial details, such as payment history, debt, and credit age, to calculate your personalized iScore. See how your financial habits impact your credit health.
            </p>
            <p class="mt-4 text-sm">
                <a href="/credit" class="inline-flex items-center font-semibold text-indigo-700">
                    Start Calculating
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
            <!-- Latest Score Gauge -->
            <div class="mt-4">
                <p class="text-sm text-gray-500">Latest iScore: <span id="latest-score">Not calculated</span></p>
                <div class="score-gauge">
                    <div class="score-marker" style="left: 0%;"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>300</span><span>579</span><span>669</span><span>739</span><span>799</span><span>850</span>
                </div>
            </div>
        </div>

        <!-- Score History Card -->
        <div class="bg-white p-6 rounded-lg shadow card-hover">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A2.25 2.25 0 0116.5 7.5h1.125" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                    View Score History
                </h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Track your credit score progress over time with a detailed history of your iScore calculations. Visualize trends and identify areas for improvement.
            </p>
            <p class="mt-4 text-sm">
                <a href="/history" class="inline-flex items-center font-semibold text-indigo-700">
                    Explore History
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>

        <!-- Improvement Tips Card -->
        <div class="bg-white p-6 rounded-lg shadow card-hover">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                    Credit Improvement Tips
                </h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Discover actionable advice to boost your iScore, from maintaining timely payments to optimizing credit utilization and diversifying your credit mix.
            </p>
            <p class="mt-4 text-sm">
                <a href="/tips" class="inline-flex items-center font-semibold text-indigo-700">
                    Read Tips
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>

        <!-- Export Report Card -->
        <div class="bg-white p-6 rounded-lg shadow card-hover">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                    Export Your Report
                </h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Generate a professional PDF report of your latest iScore, including a detailed breakdown of contributing factors and personalized improvement tips.
            </p>
            <p class="mt-4 text-sm">
                <a href="/export" class="inline-flex items-center font-semibold text-indigo-700">
                    Export Now
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>
    </div>

    <script>
        // Theme Toggle Functionality
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            themeToggle.textContent = document.body.classList.contains('dark') ? 'Toggle Light Mode' : 'Toggle Dark Mode';
        });

        // Dynamic Score Gauge Update (Example)
        function updateScoreGauge(score) {
            const marker = document.querySelector('.score-marker');
            const percentage = ((score - 300) / (850 - 300)) * 100;
            marker.style.left = `${percentage}%`;
            document.getElementById('latest-score').textContent = score || 'Not calculated';
        }

        // Example: Update gauge with a sample score (replace with API call)
        // updateScoreGauge(720);
    </script>
</body>
</html>
