
@extends('layouts.app')

@section('title', 'Choose Technician - ProductLife')

@section('page_title', 'Choose a Technician')

@section(
    'page_subtitle',
    'Select a verified and available technician for your repair request.'
)

@section('content')

<div class="technician-page">

    {{-- Repair Request Summary --}}
    <div class="repair-summary-card">

        <div class="repair-summary-icon">
            <i class="bi bi-tools"></i>
        </div>

        <div class="repair-summary-content">
            <span class="summary-label">REPAIR REQUEST</span>

            <h2>{{ $repairRequest->problem_title }}</h2>

            <p>{{ $repairRequest->problem_description }}</p>

            <div class="summary-meta">
                <span>
                    <i class="bi bi-flag-fill"></i>
                    {{ ucfirst($repairRequest->priority) }} Priority
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    {{ ucfirst($repairRequest->status) }}
                </span>
            </div>
        </div>

        <div class="request-status">
            <span></span>
            {{ ucfirst($repairRequest->status) }}
        </div>

    </div>

    @if($repairRequest->status === 'assigned')
        <div class="alert alert-success technician-alert">
            <i class="bi bi-check-circle-fill"></i>
            A technician has already been assigned to this repair request.
        </div>
    @endif

    {{-- Page Header --}}
    <div class="technician-header">

        <div class="technician-heading-content">
            <span class="section-kicker">
                <i class="bi bi-patch-check-fill"></i>
                VERIFIED TECHNICIANS
            </span>

            <h2>Find the right technician</h2>

            <p>
                Choose from technicians who are currently available
                and verified by ProductLife.
            </p>
        </div>

        <div class="technician-count">
            <div class="count-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <strong>{{ $technicians->count() }}</strong>
                <span>Available Technicians</span>
            </div>
        </div>

    </div>

    {{-- Technician List --}}
    @if($technicians->count())

        <div class="technician-grid">

            @foreach($technicians as $technician)

                <div class="technician-card">

                    <div class="card-top-accent"></div>

                    {{-- Profile --}}
                    <div class="technician-top">

                        <div class="technician-avatar">

                            @if($technician->profile_image)
                                <img
                                    src="{{ asset('storage/' . $technician->profile_image) }}"
                                    alt="{{ $technician->name }}"
                                >
                            @else
                                <span>
                                    {{ strtoupper(substr($technician->name, 0, 1)) }}
                                </span>
                            @endif

                        </div>

                        <div class="verified-badge">
                            <i class="bi bi-patch-check-fill"></i>
                            Verified
                        </div>

                    </div>

                    {{-- Name --}}
                    <div class="technician-info">

                        <h3>{{ $technician->name }}</h3>

                        <div class="specialization">
                            <i class="bi bi-wrench-adjustable-circle-fill"></i>
                            {{ $technician->specialization }}
                        </div>

                    </div>

                    {{-- Rating --}}
                    <div class="rating-row">

                        <div class="rating">

                            @php
                                $rating = (float) ($technician->rating ?? 0);
                                $fullStars = floor($rating);
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $fullStars)
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor

                            <strong>{{ number_format($rating, 1) }}</strong>

                        </div>

                        <span class="available-badge">
                            <span></span>
                            Available
                        </span>

                    </div>

                    {{-- Details --}}
                    <div class="technician-details">

                        <div class="detail-row">
                            <div class="detail-icon experience-icon">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>

                            <div class="detail-content">
                                <span>Experience</span>
                                <strong>{{ $technician->experience }}</strong>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-icon location-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div class="detail-content">
                                <span>Location</span>
                                <strong>{{ $technician->address }}</strong>
                            </div>
                        </div>

                        <div class="detail-row">
                            <div class="detail-icon phone-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div class="detail-content">
                                <span>Phone</span>
                                <strong>{{ $technician->phone }}</strong>
                            </div>
                        </div>

                    </div>

                    {{-- Service Charge --}}
                    <div class="charge-box">

                        <div class="charge-info">
                            <div class="charge-icon">
                                <i class="bi bi-wallet2"></i>
                            </div>

                            <div>
                                <span>Service Charge</span>
                                <small>Estimated technician fee</small>
                            </div>
                        </div>

                        <strong>
                            ₹{{ number_format((float) $technician->service_charge, 2) }}
                        </strong>

                    </div>

                    {{-- Assign --}}
                    @if($repairRequest->status === 'pending')

                        <form
                            action="{{ route('technicians.assign', $repairRequest) }}"
                            method="POST"
                        >
                            @csrf

                            <input
                                type="hidden"
                                name="technician_id"
                                value="{{ $technician->id }}"
                            >

                            <button type="submit" class="assign-btn">
                                <span>Assign Technician</span>
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </button>

                        </form>

                    @else

                        <button type="button" class="assign-btn" disabled>
                            <i class="bi bi-check-circle-fill"></i>
                            Already Assigned
                        </button>

                    @endif

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div class="empty-technicians">

            <div class="empty-icon">
                <i class="bi bi-person-x-fill"></i>
            </div>

            <span class="empty-label">NO MATCHING TECHNICIANS</span>

            <h3>No technicians available</h3>

            <p>
                There are currently no verified and available technicians.
                Please check again later.
            </p>

            <a
                href="{{ route('products.passport', $repairRequest->product_id) }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Product Passport
            </a>

        </div>

    @endif

    {{-- Bottom Navigation --}}
    <div class="bottom-navigation">

        <a
            href="{{ route('products.passport', $repairRequest->product_id) }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Passport
        </a>

    </div>

</div>

@endsection


@push('styles')
<style>

/* =========================================
   TECHNICIAN PAGE
========================================= */

.technician-page {
    max-width: 1250px;
    margin: 0 auto;
    color: #172554;
}

/* =========================================
   REPAIR SUMMARY
========================================= */

.repair-summary-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px;
    margin-bottom: 32px;
    overflow: hidden;
    border-radius: 23px;
    border: 1px solid #dbe3ff;
    background: linear-gradient(120deg, #ffffff 0%, #eef2ff 55%, #e8faff 100%);
    box-shadow: 0 12px 35px rgba(36, 54, 120, .09);
}

.repair-summary-card::before {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    right: -75px;
    top: -120px;
    border-radius: 50%;
    background: rgba(99, 102, 241, .10);
}

.repair-summary-card::after {
    content: "";
    position: absolute;
    width: 130px;
    height: 130px;
    right: 110px;
    bottom: -100px;
    border-radius: 50%;
    background: rgba(6, 182, 212, .10);
}

.repair-summary-icon {
    position: relative;
    z-index: 1;
    width: 65px;
    height: 65px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 19px;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: #ffffff;
    font-size: 27px;
    box-shadow: 0 9px 20px rgba(79, 70, 229, .25);
}

.repair-summary-content {
    position: relative;
    z-index: 1;
    min-width: 0;
    flex: 1;
}

.summary-label {
    display: inline-block;
    color: #4f46e5;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.3px;
}

.repair-summary-content h2 {
    margin: 5px 0 7px;
    color: #172554;
    font-size: 21px;
    font-weight: 900;
}

.repair-summary-content p {
    margin: 0 0 11px;
    color: #52617e;
    font-size: 12px;
    line-height: 1.65;
    max-width: 700px;
}

.summary-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    color: #475569;
    font-size: 11px;
    font-weight: 750;
}

.summary-meta i {
    margin-right: 4px;
    color: #4f46e5;
}

.request-status {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 13px;
    border-radius: 30px;
    background: #fff7e6;
    border: 1px solid #fde3ad;
    color: #a45b00;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    white-space: nowrap;
}

.request-status span {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #f59e0b;
    box-shadow: 0 0 0 4px rgba(245, 158, 11, .13);
}

.technician-alert {
    border-radius: 13px;
    font-size: 13px;
    font-weight: 650;
    padding: 14px 17px;
    margin-bottom: 25px;
}

/* =========================================
   PAGE HEADER
========================================= */

.technician-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.section-kicker {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #4f46e5;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.1px;
}

.section-kicker i {
    font-size: 14px;
}

.technician-header h2 {
    position: relative;
    margin: 8px 0 6px;
    color: #172554;
    font-size: 27px;
    font-weight: 950;
    letter-spacing: -.6px;
}

.technician-header p {
    margin: 0;
    color: #64748b;
    font-size: 12px;
    line-height: 1.6;
}

.technician-count {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 195px;
    padding: 13px 17px;
    border-radius: 16px;
    border: 1px solid #dbe3ff;
    background: linear-gradient(135deg, #ffffff, #eef2ff);
    box-shadow: 0 7px 20px rgba(79, 70, 229, .07);
}

.count-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    color: #ffffff;
    background: linear-gradient(135deg, #4f46e5, #2563eb);
    font-size: 19px;
}

.technician-count strong {
    display: block;
    color: #3730a3;
    font-size: 22px;
    font-weight: 950;
    line-height: 1.1;
}

.technician-count span {
    display: block;
    margin-top: 4px;
    color: #64748b;
    font-size: 10px;
    font-weight: 750;
}

/* =========================================
   TECHNICIAN GRID
========================================= */

.technician-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
}

/* =========================================
   TECHNICIAN CARD
========================================= */

.technician-card {
    position: relative;
    min-width: 0;
    padding: 23px;
    overflow: hidden;
    border: 1px solid #e0e7ff;
    border-radius: 22px;
    background: #ffffff;
    box-shadow: 0 9px 28px rgba(30, 41, 90, .07);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.technician-card:hover {
    transform: translateY(-6px);
    border-color: #a5b4fc;
    box-shadow: 0 18px 42px rgba(49, 46, 129, .14);
}

.card-top-accent {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #4f46e5, #7c3aed, #06b6d4);
}

/* =========================================
   PROFILE
========================================= */

.technician-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 17px;
}

.technician-avatar {
    width: 76px;
    height: 76px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border: 3px solid #ffffff;
    border-radius: 22px;
    background: linear-gradient(135deg, #4f46e5, #9333ea);
    color: #ffffff;
    font-size: 28px;
    font-weight: 950;
    box-shadow: 0 5px 15px rgba(79, 70, 229, .23);
}

.technician-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.verified-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 10px;
    border: 1px solid #bbf7d0;
    border-radius: 30px;
    background: #dcfce7;
    color: #166534;
    font-size: 9px;
    font-weight: 900;
}

.verified-badge i {
    font-size: 12px;
}

/* =========================================
   TECHNICIAN INFORMATION
========================================= */

.technician-info h3 {
    margin: 0 0 7px;
    color: #172554;
    font-size: 19px;
    font-weight: 950;
    letter-spacing: -.3px;
    overflow-wrap: anywhere;
}

.specialization {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #5b4acb;
    font-size: 11px;
    font-weight: 800;
}

.specialization i {
    font-size: 14px;
}

/* =========================================
   RATING
========================================= */

.rating-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding: 14px 0;
    margin: 16px 0;
    border-top: 1px solid #edf0ff;
    border-bottom: 1px solid #edf0ff;
}

.rating {
    display: flex;
    align-items: center;
    gap: 3px;
    color: #f59e0b;
    font-size: 12px;
}

.rating strong {
    margin-left: 5px;
    color: #334155;
    font-size: 11px;
    font-weight: 900;
}

.available-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 9px;
    border-radius: 20px;
    background: #dcfce7;
    color: #166534;
    font-size: 9px;
    font-weight: 900;
    white-space: nowrap;
}

.available-badge span {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, .12);
}

/* =========================================
   DETAIL ROWS
========================================= */

.technician-details {
    display: grid;
    gap: 14px;
}

.detail-row {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 0;
}

.detail-icon {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    font-size: 14px;
}

.experience-icon {
    background: #ede9fe;
    color: #6d28d9;
}

.location-icon {
    background: #dbeafe;
    color: #1d4ed8;
}

.phone-icon {
    background: #cffafe;
    color: #0e7490;
}

.detail-content {
    min-width: 0;
    flex: 1;
}

.detail-row span {
    display: block;
    margin-bottom: 3px;
    color: #94a3b8;
    font-size: 9px;
    font-weight: 750;
}

.detail-row strong {
    display: block;
    overflow: hidden;
    color: #334155;
    font-size: 11px;
    font-weight: 850;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* =========================================
   SERVICE CHARGE
========================================= */

.charge-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 14px;
    margin: 19px 0 14px;
    border: 1px solid #c7f0df;
    border-radius: 14px;
    background: linear-gradient(110deg, #ecfdf5, #f0fdfa);
}

.charge-info {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}

.charge-icon {
    width: 37px;
    height: 37px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #059669;
    color: #ffffff;
    font-size: 15px;
}

.charge-box span {
    display: block;
    color: #065f46;
    font-size: 10px;
    font-weight: 900;
}

.charge-box small {
    display: block;
    margin-top: 3px;
    color: #64748b;
    font-size: 8px;
}

.charge-box > strong {
    color: #047857;
    font-size: 16px;
    font-weight: 950;
    white-space: nowrap;
}

/* =========================================
   ASSIGN BUTTON
========================================= */

.assign-btn {
    width: 100%;
    min-height: 47px;
    padding: 10px 15px;
    border: 0;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    background: linear-gradient(110deg, #4f46e5, #7c3aed);
    color: #ffffff;
    font-size: 11px;
    font-weight: 900;
    cursor: pointer;
    box-shadow: 0 7px 17px rgba(79, 70, 229, .22);
    transition: all .22s ease;
}

.assign-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    background: linear-gradient(110deg, #3730a3, #6d28d9);
    box-shadow: 0 11px 22px rgba(79, 70, 229, .30);
}

.assign-btn i {
    font-size: 15px;
}

.assign-btn:disabled {
    background: #64748b;
    box-shadow: none;
    cursor: not-allowed;
    opacity: .8;
}

/* =========================================
   EMPTY STATE
========================================= */

.empty-technicians {
    padding: 60px 25px;
    border: 1px solid #e0e7ff;
    border-radius: 23px;
    background: linear-gradient(145deg, #ffffff, #f5f7ff);
    box-shadow: 0 10px 30px rgba(30, 41, 90, .06);
    text-align: center;
}

.empty-icon {
    width: 76px;
    height: 76px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    border-radius: 23px;
    background: linear-gradient(135deg, #4f46e5, #9333ea);
    color: #ffffff;
    font-size: 30px;
    box-shadow: 0 9px 22px rgba(79, 70, 229, .22);
}

.empty-label {
    display: inline-block;
    margin-bottom: 9px;
    color: #6d28d9;
    font-size: 10px;
    font-weight: 950;
    letter-spacing: 1.2px;
}

.empty-technicians h3 {
    margin: 0 0 9px;
    color: #172554;
    font-size: 21px;
    font-weight: 950;
}

.empty-technicians p {
    max-width: 450px;
    margin: 0 auto 23px;
    color: #64748b;
    font-size: 12px;
    line-height: 1.7;
}

/* =========================================
   NAVIGATION
========================================= */

.bottom-navigation {
    margin-top: 27px;
}

.back-btn {
    min-height: 43px;
    padding: 0 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: 1px solid #c7d2fe;
    border-radius: 11px;
    background: #eef2ff;
    color: #3730a3;
    font-size: 11px;
    font-weight: 900;
    text-decoration: none;
    transition: all .2s ease;
}

.back-btn:hover {
    transform: translateY(-2px);
    border-color: #818cf8;
    background: #4f46e5;
    color: #ffffff;
    box-shadow: 0 7px 17px rgba(79, 70, 229, .18);
}

/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 1100px) {

    .technician-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 760px) {

    .repair-summary-card {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .request-status {
        margin-left: 85px;
    }

    .technician-header {
        align-items: flex-start;
    }

    .technician-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .technician-card {
        padding: 18px;
    }

}

@media (max-width: 580px) {

    .repair-summary-card {
        gap: 13px;
        padding: 18px;
        border-radius: 18px;
    }

    .repair-summary-icon {
        width: 49px;
        height: 49px;
        border-radius: 14px;
        font-size: 21px;
    }

    .repair-summary-content {
        flex-basis: calc(100% - 65px);
    }

    .repair-summary-content h2 {
        font-size: 17px;
    }

    .repair-summary-content p {
        font-size: 11px;
    }

    .request-status {
        margin-left: 0;
    }

    .technician-header {
        display: block;
    }

    .technician-header h2 {
        font-size: 23px;
    }

    .technician-count {
        display: inline-flex;
        margin-top: 15px;
    }

    .technician-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .technician-card {
        padding: 21px;
    }

}

@media (max-width: 380px) {

    .technician-card {
        padding: 17px;
    }

    .technician-info h3 {
        font-size: 17px;
    }

    .charge-box {
        padding: 11px;
    }

    .charge-box > strong {
        font-size: 14px;
    }

    .summary-meta {
        gap: 9px;
    }

}

</style>
@endpush
