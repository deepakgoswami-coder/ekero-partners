@extends('leader.layouts.main')

@section('title', 'Dashboard')
<style>
/* Modern Glassmorphism Dashboard */
:root {
    --glass-bg: rgba(255, 255, 255, 0.25);
    --glass-border: rgba(255, 255, 255, 0.18);
    --glass-shadow:0 3px 14px 0 rgb(31 38 135 / 16%);
    --glass-blur: blur(10px);
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
    --danger-gradient: linear-gradient(135deg, #ed213a 0%, #93291e 100%);
}

.glass-card {
    background: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    border: 1px solid var(--glass-border);
    border-radius: 8px;
    box-shadow: var(--glass-shadow);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    position: relative;
}
.stat-card {
    /* height: 100%; */
    padding: 2rem;
}

.stat-left-border {
    position: relative;
}
.stat-left-border::after {
    content: '';
    position: absolute;
    left: 0;
    top: 20%;
    bottom: 20%;
    width: 4px;
    border-radius: 0 2px 2px 0;
}

.stat-primary::after { background: var(--primary-gradient); }
.stat-success::after { background: var(--success-gradient); }
.stat-warning::after { background: var(--warning-gradient); }
.stat-danger::after { background: var(--danger-gradient); }

.stat-icon {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

.stat-primary .stat-icon { background: var(--primary-gradient); }
.stat-success .stat-icon { background: var(--success-gradient); }
.stat-warning .stat-icon { background: var(--warning-gradient); }
.stat-danger .stat-icon { background: var(--danger-gradient); }

.stat-value {
        font-size: clamp(2rem, 5vw, 2rem);
    font-weight: 600;
    background: linear-gradient(135deg, #fff 0%, #f8fafc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: #000000;
    background-clip: text;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1rem;
    color: rgba(255,255,255,0.9);
    font-weight: 600;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-trend {
    font-size: 0.85rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    backdrop-filter: blur(10px);
}

.trend-up {
    background: rgba(40, 199, 111, 0.2);
    color: #10b981;
    border: 1px solid rgba(40, 199, 111, 0.3);
}
.trend-down {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
}

.chart-card {
    margin-bottom: 2rem;
}

.chart-card-header {
    padding: 2rem 2.5rem 1.5rem;
}

.chart-card-title {
        font-size: 1.5rem;
    font-weight: 600;
    background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 0.8) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: #000000;
    background-clip: text;
    margin: 0 0 0.5rem 0;
}

.chart-card-subtitle {
    color: rgba(0, 0, 0, 0.8);
    font-size: 1rem;
    margin: 0;
}

.chart-container {
    padding: 0 2rem 2rem;
    background: rgba(255,255,255,0.1);
    border-radius: 20px;
    margin: 0 1rem;
}

.modern-welcome {
    background: var(--primary-gradient);
    margin-bottom: 2rem;
    padding: 1.9rem 0;
}

.welcome-title.gradient-text {
    font-size: clamp(2rem, 5vw, 2rem);
    font-weight: 600;
    background: linear-gradient(135deg, #fff 0%, rgba(255,255,255,0.9) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

.welcome-subtitle {
    font-size: 1.25rem;
    color: rgba(255,255,255,0.95);
    font-weight: 400;
    margin: 0;
}

.quick-action-btn {
        display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 2rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 7px;
    text-decoration: none;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    margin-right: 10px;
    width: max-content;
    float: inline-end;
}

.quick-action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.quick-action-btn:hover::before {
    left: 100%;
}

.quick-action-btn:hover {
    transform: translateY(-4px) scale(1.02);
    background: rgba(255,255,255,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.dashboard-stats { margin-bottom: 2.5rem; }

@media (max-width: 992px) {
    .glass-card:hover { transform: none; }
    .quick-actions { flex-direction: column; gap: 1rem; }
}

@media (max-width: 768px) {
    .modern-welcome { margin: 1rem; border-radius: 20px; }
    .stat-card { padding: 1.5rem 1rem; }
    .chart-container { margin: 0 0.5rem; padding: 1rem; }
}
</style>

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- Welcome Banner (UNCHANGED structure) -->
            <div class="welcome-banner modern-welcome glass-card">
                <div class="container-fluid">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-8 col-md-7">
                            <div class="welcome-content">
                                <h1 class="welcome-title gradient-text">
                                    Welcome back, {{ $leader->name }} 👋
                                </h1>
                                <p class="welcome-subtitle">
                                    Manage your group and track contributions efficiently with real-time insights.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="quick-actions-wrapper">
                                <div class="quick-actions">
                                    <a href="{{ route('leader.group') }}" class="quick-action-btn group-btn mb-1">
                                        <i data-feather="users"></i>
                                        <span>My Group</span>
                                    </a>
                                    <a href="{{ route('leader.contribution') }}" class="quick-action-btn contribution-btn">
                                        <i data-feather="dollar-sign"></i>
                                        <span>Contributions</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards (UNCHANGED data structure) -->
            <section id="dashboard-ecommerce">
                <div class="dashboard-stats">
                    <div class="row g-4">
                        <!-- Group Members -->
                        <div class="col-lg-3 col-md-6">
                            <div class="glass-card stat-card stat-primary stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div class="w-fit">
                                            <div class="stat-value">{{ $groupMember ?? '0' }}</div>
                                            <div class="stat-label">Total Group Members</div>
                                            <div class="stat-trend trend-up">
                                                <i data-feather="trending-up"></i> Active
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Contributions (UNCHANGED) -->
                        <div class="col-lg-3 col-md-6">
                            <div class="glass-card stat-card stat-success stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div>
                                            <div class="stat-value">
                                                @isset($totalTarget)
                                                    {{ $totalTarget }}
                                                @else
                                                    0
                                                @endisset
                                            </div>
                                            <div class="stat-label">Target Amt</div>
                                            <div class="stat-trend trend-up">
                                                <i data-feather="trending-up"></i>For Each Week
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Group Contribution (UNCHANGED) -->
                        <div class="col-lg-3 col-md-6">
                            <div class="glass-card stat-card stat-warning stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div>
                                            <div class="stat-value">{{ $contribution ?? '0' }}</div>
                                            <div class="stat-label">Group Contribution</div>
                                            <div class="stat-trend trend-up">
                                                <i data-feather="calendar"></i>All Time Contribution
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Annual Target (UNCHANGED logic) -->
                        <div class="col-lg-3 col-md-6">
                            <div class="glass-card stat-card stat-danger stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div>
                                            <div class="stat-value">
                                                @isset($totalTarget)
                                                    {{ $totalTarget * 52 }}
                                                @else
                                                    0
                                                @endisset
                                            </div>
                                            <div class="stat-label">Target Amt</div>
                                            <div class="stat-trend trend-up">
                                                <i data-feather="trending-up"></i> For 52 Groups / Week
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Start Date (UNCHANGED) -->
                        <div class="col-lg-4 col-md-6">
                            <div class="glass-card stat-card stat-success stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div>
                                            @if($portalSet)
                                                <div class="stat-value">{{ $portalSet->start_date ? \Carbon\Carbon::parse($portalSet->start_date)->format('d M , y') : 'N/A' }}</div>
                                            @endif
                                            <div class="stat-label">Start Date</div>
                                            <div class="stat-trend trend-up">
                                                <i data-feather="calendar"></i> Portal Start
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Date (UNCHANGED) -->
                        <div class="col-lg-4 col-md-6">
                            <div class="glass-card stat-card stat-danger stat-left-border">
                                <div class="card-body stat-card p-0">
                                    <div class="d-flex justify-content-between h-auto">
                                        <div>
                                            @if($portalSet)
                                                <div class="stat-value">{{ $portalSet->end_date ? \Carbon\Carbon::parse($portalSet->end_date)->format('d M , y') : 'N/A' }}</div>
                                            @endif
                                            <div class="stat-label">End Date</div>
                                            <div class="stat-trend trend-down">
                                                <i data-feather="calendar"></i> Portal End
                                            </div>
                                        </div>
                                        <div class="stat-icon">
                                            <i data-feather="calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="glass-card chart-card">
                            <div class="chart-card-header">
                                <h5 class="chart-card-title">Contribution Trends</h5>
                                <p class="chart-card-subtitle">Weekly contribution performance overview</p>
                            </div>
                            <div class="chart-container">
                                <canvas id="contributionTrendsChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="glass-card chart-card">
                            <div class="chart-card-header">
                                <h5 class="chart-card-title">Member Status</h5>
                                <p class="chart-card-subtitle">Active vs pending members distribution</p>
                            </div>
                            <div class="chart-container">
                                <canvas id="memberDistributionChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const colors = {
    primary: '#7367f0',
    success: '#28c76f',
    warning: '#ff9f43',
    danger: '#ea5455',
    info: '#00cfe8'
};

// Contribution Trends Chart - Dynamic Data
const contributionCtx = document.getElementById('contributionTrendsChart');
if (contributionCtx) {
    new Chart(contributionCtx.getContext('2d'), {
        type: 'line',
        data: {
            labels: @json($weekLabels), // Dynamic week labels
            datasets: [{
                label: 'Weekly Contributions',
                data: @json($weeklyContributions), // Dynamic contribution data
                borderColor: colors.primary,
                backgroundColor: 'rgba(115, 103, 240, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: colors.primary,
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Contributions: $${context.parsed.y.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Member Distribution Chart - Dynamic Data
const memberCtx = document.getElementById('memberDistributionChart');
if (memberCtx) {
    new Chart(memberCtx.getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Active Members', 'Pending Activation', 'Completed Payout'],
            datasets: [{
                data: [
                    {{ $memberDistribution['active'] ?? 0 }},
                    {{ $memberDistribution['pending'] ?? 0 }},
                    {{ $memberDistribution['completed'] ?? 0 }}
                ],
                backgroundColor: [
                    colors.success,
                    colors.warning,
                    colors.info
                ],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

// Group Progress Chart (Additional chart)
const progressCtx = document.getElementById('groupProgressChart');
if (progressCtx) {
    new Chart(progressCtx.getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Target Progress'],
            datasets: [{
                label: 'Current Amount',
                data: [{{ $contribution ?? 0 }}],
                backgroundColor: colors.success,
                borderRadius: 8,
                barPercentage: 0.3
            }, {
                label: 'Remaining Target',
                data: [{{ max(0, ($totalTarget ?? 0) - $contribution) }}],
                backgroundColor: colors.light,
                borderRadius: 8,
                barPercentage: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: $${context.parsed.x.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    stacked: true,
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                },
                y: {
                    stacked: true,
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Add animation to stat cards
const statCards = document.querySelectorAll('.stat-card');
statCards.forEach((card, index) => {
    card.style.animationDelay = `${index * 0.1}s`;
});
</script>

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@endsection