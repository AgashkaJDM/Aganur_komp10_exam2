@extends('admin.layout')

@section('title', 'Dashboard')

@section('page_title', 'Overview')

@php
    $fmt = fn ($n) => number_format((float) $n, 2, '.', ' ');

    $statusClass = function (string $status): string {
        return match (strtolower($status)) {
            'pending' => 'badge-pending',
            'delivered', 'completed' => 'badge-delivered',
            'cancelled' => 'badge-cancelled',
            default => 'badge-default',
        };
    };
@endphp

@section('content')
    <p class="text-secondary mb-4" style="max-width: 42rem;">
        City restaurants, customer orders, and money flow in one place — total income, food subtotals, delivery fees, and per-venue breakdown.
    </p>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="label">Total income</div>
                <div class="value text-white">{{ $fmt($stats['income_total']) }} <small class="fs-6 fw-normal text-secondary">TMT</small></div>
                <div class="hint">Sum of all order totals</div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="label">Food subtotal</div>
                <div class="value text-white"
                    style="font-size:1.45rem;">{{ $fmt($stats['food_subtotal']) }} <small class="fs-6 fw-normal text-secondary">TMT</small>
                </div>
                <div class="hint">Menu prices before delivery</div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="label">Delivery (expense)</div>
                <div class="value"
                    style="color: #fbbf24; font-size:1.45rem;">{{ $fmt($stats['expense_delivery']) }} <small class="fs-6 fw-normal text-secondary">TMT</small>
                </div>
                <div class="hint">Delivery fees on orders</div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="label">Net (income − delivery)</div>
                <div class="value"
                    style="color: #4ade80; font-size:1.45rem;">{{ $fmt($stats['net_estimate']) }} <small class="fs-6 fw-normal text-secondary">TMT</small>
                </div>
                <div class="hint">Rough net; tune in accounting</div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="label">Orders</div>
                <div class="value text-white">{{ $stats['order_count'] }}</div>
                <div class="hint">
                    Avg ticket:
                    {{ $stats['order_count'] > 0 ? $fmt($stats['avg_order']) . ' TMT' : '—' }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel h-100">
                <div class="panel-header">Orders by status</div>
                @if ($statusBreakdown->isEmpty())
                    <div class="empty-state py-4">
                        <i class="bi bi-pie-chart d-block"></i>
                        No orders yet — stats will appear here.
                    </div>
                @else
                    <div class="p-3 d-flex flex-wrap gap-2">
                        @foreach ($statusBreakdown as $row)
                            <span class="badge rounded-pill px-3 py-2 {{ $statusClass($row->status) }}">
                                {{ $row->status }} · {{ $row->cnt }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <span>Recent orders</span>
                    <span class="text-secondary small fw-normal">Latest 20</span>
                </div>
                @if ($recentOrders->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-receipt"></i>
                        <p class="mb-0">No customer orders yet. When clients place orders, they show up here with restaurant, totals, and status.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-darkish">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Restaurant</th>
                                    <th>Customer</th>
                                    <th class="text-end">Food</th>
                                    <th class="text-end">Delivery</th>
                                    <th class="text-end">Total</th>
                                    <th>Status</th>
                                    <th>When</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr>
                                        <td class="font-monospace small">{{ $order->code }}</td>
                                        <td>{{ $order->restaurant->name ?? '—' }}</td>
                                        <td>
                                            <div class="fw-medium">{{ $order->name }}</div>
                                            <div class="small text-secondary">{{ $order->phone_number }}</div>
                                        </td>
                                        <td class="text-end">{{ $fmt($order->price) }}</td>
                                        <td class="text-end text-warning">{{ $fmt($order->delivery_price) }}</td>
                                        <td class="text-end fw-semibold">{{ $fmt($order->total_price) }}</td>
                                        <td>
                                            <span
                                                class="badge-status {{ $statusClass($order->status) }}">{{ $order->status }}</span>
                                        </td>
                                        <td class="small text-secondary text-nowrap">{{ $order->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">Every restaurant — income &amp; delivery</div>
                @if ($restaurantRows->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-shop"></i>
                        <p class="mb-0">No restaurants in the database.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-darkish">
                            <thead>
                                <tr>
                                    <th>Restaurant</th>
                                    <th class="text-end">Orders</th>
                                    <th class="text-end">Food subtotal</th>
                                    <th class="text-end">Delivery fees</th>
                                    <th class="text-end">Total income</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurantRows as $r)
                                    <tr>
                                        <td>
                                            <div class="fw-medium">{{ $r->name }}</div>
                                            <div class="small text-secondary">{{ $r->address }}</div>
                                        </td>
                                        <td class="text-end">{{ $r->orders_count }}</td>
                                        <td class="text-end">{{ $fmt($r->orders_sum_price ?? 0) }}</td>
                                        <td class="text-end text-warning">{{ $fmt($r->orders_sum_delivery_price ?? 0) }}</td>
                                        <td class="text-end fw-semibold">{{ $fmt($r->orders_sum_total_price ?? 0) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
