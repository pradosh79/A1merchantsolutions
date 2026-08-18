@extends('layouts.public')
@section('title', 'Redeem Coupon - '.$advertiser->name)
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <strong>{{ $advertiser->name }}</strong> &mdash; Merchant Redemption
                </div>
                <div class="card-body">
                    <p class="text-muted small">Scan a customer's coupon QR code, or type the code manually, then press Redeem.</p>

                    <div id="qr-reader" style="width:100%; max-width:400px; margin: 0 auto 1rem;"></div>

                    <form id="redeemForm" class="row g-2">
                        <div class="col-8">
                            <input type="text" id="codeInput" class="form-control text-uppercase" placeholder="COUPON CODE" maxlength="32">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary w-100">Redeem</button>
                        </div>
                    </form>

                    <div id="resultBox" class="alert d-none mt-3" role="alert"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    const redeemUrl = @json(route('merchant.redeem', $advertiser_token));
    const csrfToken = @json(csrf_token());
    const resultBox = document.getElementById('resultBox');
    const codeInput = document.getElementById('codeInput');

    function showResult(status, message) {
        resultBox.classList.remove('d-none', 'alert-success', 'alert-danger', 'alert-warning', 'alert-secondary');
        const map = {
            VALID: 'alert-success',
            ALREADY_REDEEMED: 'alert-warning',
            NOT_FOUND: 'alert-secondary',
            EXPIRED: 'alert-danger',
        };
        resultBox.classList.add(map[status] || 'alert-secondary');
        resultBox.innerHTML = `<strong>${status.replace('_', ' ')}</strong><br>${message}`;
    }

    async function redeem(code) {
        try {
            const res = await fetch(redeemUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ code }),
            });
            const data = await res.json();
            showResult(data.status || 'NOT_FOUND', data.message || 'Unknown response.');
        } catch (e) {
            showResult('NOT_FOUND', 'Network error. Please try again.');
        }
    }

    document.getElementById('redeemForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const code = codeInput.value.trim();
        if (!code) return;
        redeem(code);
    });

    // Camera QR scanning (gracefully does nothing if camera unavailable/denied).
    try {
        const html5QrCode = new Html5Qrcode('qr-reader');
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                html5QrCode.start(
                    devices[0].id,
                    { fps: 10, qrbox: 220 },
                    (decodedText) => {
                        codeInput.value = decodedText;
                        redeem(decodedText);
                    },
                    () => {}
                );
            }
        }).catch(() => {});
    } catch (e) {
        // camera not supported in this browser/context - manual input still works
    }
</script>
@endpush
