@extends('layouts.app')
@section('title', 'Analytics')
@section('content')
    <h2 class="mb-4">Offer Conversion Analytics</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Offer</th><th>Advertiser</th><th>Claims</th><th>Redemptions</th><th>Conversion Rate</th></tr>
                </thead>
                <tbody>
                    @forelse ($offerPerformance as $row)
                        <tr>
                            <td>{{ $row['title'] }}</td>
                            <td>{{ $row['advertiser'] }}</td>
                            <td>{{ $row['claims_count'] }}</td>
                            <td>{{ $row['redemptions_count'] }}</td>
                            <td>
                                <div class="progress" style="height:20px;">
                                    <div class="progress-bar" style="width: {{ $row['conversion_rate'] }}%">{{ $row['conversion_rate'] }}%</div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No data yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
