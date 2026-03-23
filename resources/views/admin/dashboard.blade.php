@extends('layouts.admin', ['title' => 'Admin Dashboard'])

@section('content')
<div class="max-w-7xl mx-auto">
    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                Admin <span class="text-green-600 dark:text-green-400">Dashboard</span>
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium">Welcome back, {{ Auth::user()->name }} </p>
        </div>
        <div>
            <div class="px-4 py-2 bg-white dark:bg-[#272e2d] rounded-full border border-gray-200 dark:border-gray-700 shadow-sm inline-flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">System Live</span>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">

        {{-- Total Products --}}
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total Products</p>
            <p id="productCount" class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $productCount }}</p>
            <a href="{{ route('admin.inventory.index') }}" class="mt-3 inline-flex items-center text-sm font-bold text-green-600 dark:text-green-400 hover:underline">
                View All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Orders --}}
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Orders</p>
            <p id="orderCount" class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $orderCount }}</p>
            <a href="{{ route('orders.index') }}" class="mt-3 inline-flex items-center text-sm font-bold text-blue-600 dark:text-blue-400 hover:underline">
                Manage <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Users --}}
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Users</p>
            <p id="userCount" class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $userCount }}</p>
            <a href="{{ route('allUsers') }}" class="mt-3 inline-flex items-center text-sm font-bold text-purple-600 dark:text-purple-400 hover:underline">
                Directory <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Low Stock --}}
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Low Stock</p>
            <p id="lowStockCount" class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mt-1">{{ $lowStockCount }}</p>
            <a href="{{ route('admin.inventory.index', ['stock_status' => 'low']) }}" class="mt-3 inline-flex items-center text-sm font-bold text-yellow-600 dark:text-yellow-400 hover:underline">
                Restock <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Out of Stock --}}
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Critical Stock</p>
            <p id="outOfStock" class="text-3xl font-bold text-red-600 dark:text-red-400 mt-1">{{ $outOfStockCount }}</p>
            <a href="{{ route('admin.inventory.index', ['stock_status' => 'out']) }}" class="mt-3 inline-flex items-center text-sm font-bold text-red-600 dark:text-red-400 hover:underline">
                Urgent <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    {{-- Activity + Quick Actions Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-10">

        {{-- Recent Inventory Activity --}}
        <div class="lg:col-span-3 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h3 class="font-bold text-gray-800 dark:text-gray-200 text-lg">Recent Inventory Activity</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider bg-gray-50 dark:bg-gray-800/80">
                            <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Date</th>
                            <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Product</th>
                            <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Change</th>
                            <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Type</th>
                            <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">User</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-body" class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentTransactions as $transaction)
                            <tr class="text-sm hover:bg-green-50 dark:hover:bg-green-900/10 transition-colors">
                                <td class="py-4 px-6 text-gray-600 dark:text-gray-400">{{ $transaction->created_at->format('M d, H:i') }}</td>
                                <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">{{ $transaction->product->product_name ?? 'Deleted Product' }}</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold {{ $transaction->quantity_change > 0 ? 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300' : 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300' }}">
                                        {{ $transaction->quantity_change > 0 ? '+' : '' }}{{ $transaction->quantity_change }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-gray-600 dark:text-gray-400">{{ $transaction->user->name ?? 'System' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-gray-500 dark:text-gray-400 italic">No activity yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="lg:col-span-1 flex flex-col gap-6">
            <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden flex-1">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200 text-lg">Quick Actions</h3>
                </div>
                <div class="p-5 space-y-3">
                    <a href="{{ route('admin.inventory.create') }}" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-800/30 hover:bg-green-50 dark:hover:bg-green-900/20 border border-transparent hover:border-green-100 dark:hover:border-green-900/30 transition-all group">
                        <div class="w-9 h-9 bg-green-100 dark:bg-green-900/40 rounded-lg flex items-center justify-center mr-3 group-hover:rotate-12 transition-transform">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-200 text-sm">Add New Product</span>
                    </a>
                    <a href="{{ route('admin.inventory.index') }}" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-800/30 hover:bg-blue-50 dark:hover:bg-blue-900/20 border border-transparent hover:border-blue-100 dark:hover:border-blue-900/30 transition-all group">
                        <div class="w-9 h-9 bg-blue-100 dark:bg-blue-900/40 rounded-lg flex items-center justify-center mr-3 group-hover:rotate-12 transition-transform">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-200 text-sm">Full Inventory</span>
                    </a>
                    <a href="{{ route('orders.index') }}" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-800/30 hover:bg-blue-50 dark:hover:bg-blue-900/20 border border-transparent hover:border-blue-100 dark:hover:border-blue-900/30 transition-all group">
                        <div class="w-9 h-9 bg-blue-100 dark:bg-blue-900/40 rounded-lg flex items-center justify-center mr-3 group-hover:rotate-12 transition-transform">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-200 text-sm">Manage Orders</span>
                    </a>
                    <a href="{{ route('admin.reviews.index') }}" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-800/30 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 border border-transparent hover:border-yellow-100 dark:hover:border-yellow-900/30 transition-all group">
                        <div class="w-9 h-9 bg-yellow-100 dark:bg-yellow-900/40 rounded-lg flex items-center justify-center mr-3 group-hover:rotate-12 transition-transform">
                            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-200 text-sm">Manage Reviews</span>
                    </a>
                    <a href="{{ route('allUsers') }}" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-800/30 hover:bg-purple-50 dark:hover:bg-purple-900/20 border border-transparent hover:border-purple-100 dark:hover:border-purple-900/30 transition-all group">
                        <div class="w-9 h-9 bg-purple-100 dark:bg-purple-900/40 rounded-lg flex items-center justify-center mr-3 group-hover:rotate-12 transition-transform">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <span class="font-bold text-gray-700 dark:text-gray-200 text-sm">Manage Users</span>
                    </a>
                </div>
            </div>

            {{-- Support Card --}}
            <div class="bg-gradient-to-br from-green-600 to-teal-700 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden group">
                <div class="absolute -right-6 -bottom-6 w-28 h-28 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <h4 class="text-base font-bold mb-1 relative z-10">Need Help?</h4>
                <p class="text-green-50 text-xs mb-4 relative z-10">Contact Us</p>
                <a href="{{ url('/contact') }}" class="block w-full py-2 bg-white text-green-700 font-bold rounded-lg text-sm hover:bg-green-50 transition-colors relative z-10 shadow text-center">Get Support</a>
            </div>
        </div>
    </div>

    {{-- Orders Management Table --}}
    <div class="mt-4 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden mb-8">
        <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                Quick Order Management
            </h2>
            <a href="{{ route('orders.index') }}" class="text-sm font-bold text-green-600 dark:text-green-400 hover:underline">View All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider bg-gray-50 dark:bg-gray-800/80">
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Order ID</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">User</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Items</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Total</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Status</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($orders as $order)
                        <tr class="text-sm hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-900 dark:text-white">#{{ $order->order_id }}</td>
                            <td class="py-4 px-6 text-gray-600 dark:text-gray-400">{{ $order->user->name ?? $order->user->full_name ?? 'Guest/Deleted' }}</td>
                            <td class="py-4 px-6 text-gray-600 dark:text-gray-400">
                                <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded-md text-xs font-semibold">
                                    {{ $order->order_items->sum('quantity') }} items
                                </span>
                                <span class="text-xs text-gray-400 ml-1">({{ $order->order_items->count() }} unique)</span>
                            </td>
                            <td class="py-4 px-6 font-extrabold text-green-600 dark:text-green-400">£{{ number_format($order->total_price, 2) }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-600">
                                    {{ ucfirst($order->status->value ?? $order->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 dark:text-gray-400">{{ $order->order_date ? \Carbon\Carbon::parse($order->order_date)->format('M d, Y') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-10 text-center text-gray-500 italic">No orders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-800/30 border-t border-gray-100 dark:border-gray-700">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    {{-- Users Management Table --}}
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden mb-10">
        <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Quick User Management
            </h2>
            <a href="{{ route('allUsers') }}" class="text-sm font-bold text-green-600 dark:text-green-400 hover:underline">Manage All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider bg-gray-50 dark:bg-gray-800/80">
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">User ID</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Name</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Email</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Orders</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700">Reviews</th>
                        <th class="py-3 px-6 border-b border-gray-100 dark:border-gray-700 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="text-sm hover:bg-purple-50 dark:hover:bg-purple-900/10 transition-colors">
                            <td class="py-4 px-6 text-gray-500 dark:text-gray-400">#{{ $user->user_id }}</td>
                            <td class="py-4 px-6 font-bold text-gray-900 dark:text-white">{{ $user->name ?? $user->full_name ?? 'N/A' }}</td>
                            <td class="py-4 px-6 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="py-4 px-6 text-gray-600 dark:text-gray-400 font-semibold">{{ $user->orders_count ?? 0 }}</td>
                            <td class="py-4 px-6 text-gray-600 dark:text-gray-400 font-semibold">{{ $user->reviews_count ?? 0 }}</td>
                            <td class="py-4 px-6 text-right">
                                @if(auth()->id() !== $user->user_id)
                                    <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to ban and delete this user? An email will be sent to them.');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-bold text-red-600 dark:text-red-400 px-3 py-1.5 rounded-lg border border-red-200 dark:border-red-900/50 hover:bg-red-600 hover:text-white dark:hover:bg-red-500 transition-all">Ban / Delete</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic text-sm">Current Admin</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-10 text-center text-gray-500 italic">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-800/30 border-t border-gray-100 dark:border-gray-700">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", () => {
        Pusher.logToConsole = true;

        Echo.private('stock-channel')
            .listen('.stock_event', (event) => {
                document.getElementById("lowStockCount").innerHTML = event.no_of_low_stock;
                document.getElementById("outOfStock").innerHTML = event.no_out_of_stock;
            })
            .listen('.dashboard_event', (event) => {
                if (event.order_count != 0) document.getElementById("orderCount").innerHTML = event.order_count;
                if (event.user_count != 0)  document.getElementById("userCount").innerHTML  = event.user_count;
                if (event.product_count != 0) document.getElementById("productCount").innerHTML = event.product_count;
            })
            .listen('.transaction_event', (event) => {
                console.log('New transaction:', event.transaction);
                const transaction = event.transaction;

                const transactionRow = document.createElement('tr');
                transactionRow.classList.add('text-sm', 'hover:bg-green-50', 'dark:hover:bg-green-900/10', 'transition-colors');

                const changeClass = transaction.quantity_change > 0
                    ? 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300'
                    : 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300';

                transactionRow.innerHTML = `
                    <td class="py-4 px-6 text-gray-600 dark:text-gray-400">${transaction.created_at}</td>
                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">${transaction.product_name}</td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold ${changeClass}">
                            ${transaction.quantity_change > 0 ? '+' : ''}${transaction.quantity_change}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            ${transaction.type.charAt(0).toUpperCase() + transaction.type.slice(1)}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-gray-600 dark:text-gray-400">${transaction.user}</td>
                `;

                const tableBody = document.getElementById('transaction-body');
                tableBody.prepend(transactionRow);

                if (tableBody.children.length > 5) {
                    tableBody.removeChild(tableBody.lastElementChild);
                }
            });
    });
</script>
@endsection
