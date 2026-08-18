@extends('layouts.app')
@section('title', 'Send Newsletter')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Send Newsletter</h2>
        <a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.newsletter.send') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Subject <span class="text-danger">*</span></label>
                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea name="body" rows="10" class="form-control" required
                              placeholder="Write your message. Basic HTML is allowed (e.g. <b>bold</b>, <a href='...'>links</a>).">{{ old('body') }}</textarea>
                    <div class="form-text">HTML is allowed. An unsubscribe link is added to the footer automatically.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Send to</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipients" id="rcpt-all" value="all"
                               @checked(old('recipients', 'all') === 'all')>
                        <label class="form-check-label" for="rcpt-all">
                            All subscribed addresses ({{ $subscribedCount }})
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipients" id="rcpt-test" value="test"
                               @checked(old('recipients') === 'test')>
                        <label class="form-check-label" for="rcpt-test">Send a test to one address</label>
                    </div>
                    <input type="email" name="test_email" class="form-control mt-2" style="max-width:360px"
                           placeholder="you@example.com" value="{{ old('test_email') }}">
                </div>

                <button type="submit" class="btn btn-brand-orange"
                        onclick="return confirm('Send this email now?');">
                    <i class="bi bi-send"></i> Send
                </button>
                <a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <p class="text-muted small mt-3">
        Emails are sent immediately through your configured SMTP account. Gmail free accounts allow roughly 500
        messages per day — for larger lists, use a dedicated sending service.
    </p>
@endsection
