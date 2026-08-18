@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-primary h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Today's Claims</div>
                    <div class="fs-2 fw-bold">{{ $widgets['todays_claims'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-success h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Today's Redemptions</div>
                    <div class="fs-2 fw-bold">{{ $widgets['todays_redemptions'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-info h-100">
                <div class="card-body">
                    <div class="text-uppercase small">QR Scans Today</div>
                    <div class="fs-2 fw-bold">{{ $widgets['todays_qr_scans'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-warning h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Taps Today</div>
                    <div class="fs-2 fw-bold">{{ $widgets['todays_taps'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">Top Advertisers (by claims)</div>
                <ul class="list-group list-group-flush">
                    @forelse ($widgets['top_advertisers'] as $advertiser)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $advertiser->name }}</span>
                            <span class="badge bg-primary rounded-pill">{{ $advertiser->claims_count }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No data yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">Offer Performance</div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr><th>Offer</th><th>Claims</th><th>Redemptions</th><th>Conv.</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($widgets['offer_performance'] as $row)
                                <tr>
                                    <td>{{ $row['title'] }}</td>
                                    <td>{{ $row['claims_count'] }}</td>
                                    <td>{{ $row['redemptions_count'] }}</td>
                                    <td>{{ $row['conversion_rate'] }}%</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-muted">No offers yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Last 14 Days &mdash; Claims / Redemptions / QR Scans</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm text-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">Metric</th>
                                    @foreach (array_keys($widgets['claims_series']) as $day)
                                        <th>{{ \Illuminate\Support\Carbon::parse($day)->format('M j') }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start fw-semibold">Claims</td>
                                    @foreach ($widgets['claims_series'] as $count)
                                        <td>{{ $count }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="text-start fw-semibold">Redemptions</td>
                                    @foreach ($widgets['redemptions_series'] as $count)
                                        <td>{{ $count }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="text-start fw-semibold">QR Scans</td>
                                    @foreach ($widgets['qr_scans_series'] as $count)
                                        <td>{{ $count }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
