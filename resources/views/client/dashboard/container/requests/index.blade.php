@extends('layouts.user')

@section('client-content')
    <div class="w-full flex items-center justify-between gap-5">
        <div>
            <div class="text-2xl font-extrabold text-theme-main">My Requests & Bookings</div>
            <div class="text-[13px] text-theme-muted mt-1">Track your service bookings and support requests.</div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-[10px] my-4 text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex gap-4 my-6 overflow-x-auto pb-2 custom-scrollbar">
        <a href="{{ route('client.requests.index', ['tab' => 'bookings']) }}" 
            class="px-5 py-2.5 rounded-[10px] text-[13px] font-bold whitespace-nowrap transition-all {{ $activeTab === 'bookings' ? 'bg-theme-primary text-white shadow-md' : 'bg-theme-card border border-theme-border text-theme-muted hover:bg-theme-hover' }}">
            Care Bookings ({{ $stats['total_bookings'] }})
        </a>
        <a href="{{ route('client.requests.index', ['tab' => 'requests']) }}" 
            class="px-5 py-2.5 rounded-[10px] text-[13px] font-bold whitespace-nowrap transition-all {{ $activeTab === 'requests' ? 'bg-theme-primary text-white shadow-md' : 'bg-theme-card border border-theme-border text-theme-muted hover:bg-theme-hover' }}">
            Support Requests ({{ $stats['total_requests'] }})
        </a>
    </div>

    <div class="bg-theme-card rounded-[14px] border border-theme-border overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                @if($activeTab === 'bookings')
                    <thead class="bg-theme-bg border-b border-theme-border">
                        <tr>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Service</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Plan</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Patient</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Amount</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Status</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-theme-border text-theme-main">
                        @forelse ($data as $booking)
                            <tr class="hover:bg-theme-hover transition-colors">
                                <td class="px-6 py-4 font-bold text-[13.5px]">{{ $booking->service->title }}</td>
                                <td class="px-6 py-4 text-[13px] text-theme-muted capitalize">{{ $booking->plan_type }}</td>
                                <td class="px-6 py-4 text-[13px]">{{ $booking->patient_name }}</td>
                                <td class="px-6 py-4 font-bold text-theme-primary">${{ number_format($booking->amount, 2) }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-600' : 'bg-amber-100 text-amber-600' }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right text-[12px] text-theme-muted">{{ $booking->created_at->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-6 py-10 text-center text-theme-muted">No care bookings found.</td></tr>
                        @endforelse
                    </tbody>
                @else
                    <thead class="bg-theme-bg border-b border-theme-border">
                        <tr>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Request Type</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Priority</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Submitted On</th>
                            <th class="px-6 py-3 text-[10.5px] font-bold text-theme-muted uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-theme-border text-theme-main">
                        @forelse ($data as $request)
                            <tr class="hover:bg-theme-hover transition-colors">
                                <td class="px-6 py-4 font-bold text-[13.5px]">{{ $request->type }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $request->priority === 'High' ? 'bg-red-50 text-red-600' : ($request->priority === 'Medium' ? 'bg-amber-50 text-amber-600' : 'bg-green-50 text-green-600') }}">
                                        {{ $request->priority }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-[13px] text-theme-muted">{{ $request->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $request->status === 'Approved' ? 'bg-green-100 text-green-600' : ($request->status === 'Pending' ? 'bg-amber-100 text-amber-600' : 'bg-red-100 text-red-600') }}">
                                        {{ $request->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-10 text-center text-theme-muted">No support requests found.</td></tr>
                        @endforelse
                    </tbody>
                @endif
            </table>
        </div>
        @if ($data->hasPages())
            <div class="px-6 py-4 border-t border-theme-border">
                {{ $data->links() }}
            </div>
        @endif
    </div>
@endsection