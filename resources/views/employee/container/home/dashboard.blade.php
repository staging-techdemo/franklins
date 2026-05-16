@extends('layouts.employee')

@section('employee-content')
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-slate-800">Welcome, {{ Auth::user()->name }}! 👋</h1>
        <p class="text-slate-500 text-[13.5px] mt-1">Here's your work overview for today.</p>
    </div>

    @if(!$employeeRecord && $application)
        {{-- Application Status for Candidates --}}
        <div class="bg-white rounded-[14px] border-2 border-dashed border-theme-primary/20 p-8 text-center mb-8 shadow-sm">
            <div class="w-20 h-20 bg-theme-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-theme-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-2">Application Under Review</h2>
            <p class="text-slate-500 text-[14px] max-w-md mx-auto mb-6">
                Thank you for applying to Franklin's Forever Care! Your application is currently in the 
                <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-700 font-bold uppercase text-[10px]">{{ $application->status }}</span> 
                phase. Our HR team will notify you via email once a decision is made.
            </p>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-lg text-[12px] font-bold text-slate-600 border border-slate-100">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4l3 3" /></svg>
                Submitted: {{ $application->created_at->diffForHumans() }}
            </div>
        </div>
    @endif

    @if($employeeRecord)
        {{-- Active Employee Dashboard --}}
        <div class="bg-[#7c3aed] rounded-[14px] p-8 text-white flex items-center gap-6 mb-8 shadow-lg shadow-purple-200">
            <div class="w-20 h-20 rounded-full bg-white/20 border-4 border-white/30 flex items-center justify-center text-3xl font-extrabold">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div>
                <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                <p class="text-purple-100 text-[14px] mt-1">
                    {{ $employeeRecord->type }} · ID: {{ $employeeRecord->agent_custom_id }}
                </p>
            </div>
        </div>

        <div class="grid sm:grid-cols-1 xm:grid-cols-1 grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-[14px] p-6 border border-slate-200 shadow-sm">
                <div class="text-slate-400 text-[12px] font-bold uppercase tracking-widest mb-1">Assigned Clients</div>
                <div class="text-3xl font-extrabold text-slate-800">{{ $stats['total_clients'] }}</div>
                <div class="mt-4 flex items-center gap-2 text-green-600 text-[12px] font-bold">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> {{ $stats['active_cases'] }} Active Duty
                </div>
            </div>

            <div class="bg-white rounded-[14px] p-6 border border-slate-200 shadow-sm">
                <div class="text-slate-400 text-[12px] font-bold uppercase tracking-widest mb-1">Client Requests</div>
                <div class="text-3xl font-extrabold text-slate-800">{{ $stats['total_requests'] }}</div>
                <div class="mt-4 text-amber-500 text-[12px] font-bold uppercase tracking-wide">Pending Action</div>
            </div>

            <div class="bg-white rounded-[14px] p-6 border border-slate-200 shadow-sm">
                <div class="text-slate-400 text-[12px] font-bold uppercase tracking-widest mb-1">Attendance Rating</div>
                <div class="text-3xl font-extrabold text-slate-800">{{ $employeeRecord->rating }}/5.0</div>
                <div class="mt-4 text-slate-400 text-[12px] font-medium">Based on 30 day history</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Weekly Attendance Placeholder --}}
            <div class="bg-white rounded-[14px] border border-slate-200 p-6 shadow-sm">
                <h3 class="text-[15px] font-extrabold text-slate-800 mb-6">Weekly Attendance Log</h3>
                <div class="grid grid-cols-7 gap-3">
                    @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                        <div class="text-center">
                            <div class="text-[10px] font-bold text-slate-400 uppercase mb-2">{{ $day }}</div>
                            <div class="w-full h-12 rounded-lg bg-slate-50 flex items-center justify-center border border-slate-100 {{ in_array($day, ['Mon', 'Tue', 'Wed', 'Thu']) ? 'bg-green-50 border-green-100 text-green-600' : '' }}">
                                @if(in_array($day, ['Mon', 'Tue', 'Wed', 'Thu']))
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                @else
                                    <span class="text-[10px] font-bold text-slate-300">OFF</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Recent Activity Placeholder --}}
            <div class="bg-white rounded-[14px] border border-slate-200 p-6 shadow-sm">
                <h3 class="text-[15px] font-extrabold text-slate-800 mb-6">Recent Activity</h3>
                <div class="space-y-6">
                    <div class="text-center py-4 text-slate-400 text-[13.5px]">
                        No recent updates from your assigned clients.
                    </div>
                </div>
            </div>
        </div>
    @elseif(!$application)
        {{-- No application and not an employee --}}
        <div class="bg-white rounded-[14px] border border-slate-200 p-12 text-center shadow-sm">
            <h2 class="text-xl font-bold text-slate-800 mb-2">Become a PCA Specialist</h2>
            <p class="text-slate-500 mb-8 max-w-md mx-auto">Join our team of professional care providers. Fill out our career application form to get started.</p>
            <a href="{{ route('career.index') }}" class="px-8 py-3 bg-theme-primary text-white rounded-lg font-bold shadow-lg">Apply Now</a>
        </div>
    @endif
@endsection