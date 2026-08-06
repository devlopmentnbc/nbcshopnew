@extends('layouts.app')

@section('title', 'My Account & Orders - Nature\'s Beauty Creations')

@section('content')
<div class="rbt-breadcrumb-default ptb--30 bg-color-white border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title mb--6 h3">My Account</h2>
                    <ul class="page-list justify-content-center">
                        <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="icon-right"><i class="fa-regular fa-chevron-right"></i></li>
                        <li class="rbt-breadcrumb-item active">My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rbt-account-area ptb--50 bg-color-extra-two" style="background-color: #f8fafc;">
    <div class="container">
        <!-- User Profile Header Card -->
        <div class="card border-0 shadow-sm rounded-16 mb-4 overflow-hidden">
            <div class="card-body p-4 bg-white">
                <div class="row align-items-center g-4">
                    <div class="col-auto">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle shadow-sm" style="width: 72px; height: 72px; object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 72px; height: 72px; font-size: 28px; font-weight: 700;">
                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <h3 class="mb-1 fw-bold text-dark h4">{{ $user->name }}</h3>
                        <div class="d-flex flex-wrap align-items-center gap-3 text-muted small">
                            <span><i class="fa-regular fa-envelope me-1 text-success"></i>{{ $user->email }}</span>
                            @if($user->phone)
                                <span><i class="fa-regular fa-phone me-1 text-success"></i>{{ $user->phone }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-auto ms-md-auto">
                        <div class="d-flex gap-3 text-center">
                            <div class="px-3 py-2 bg-light rounded-12 border">
                                <div class="h5 mb-0 fw-bold text-success">{{ $ongoingOrders->count() }}</div>
                                <span class="text-muted extra-small" style="font-size: 11px;">Ongoing Orders</span>
                            </div>
                            <div class="px-3 py-2 bg-light rounded-12 border">
                                <div class="h5 mb-0 fw-bold text-dark">{{ $previousOrders->count() }}</div>
                                <span class="text-muted extra-small" style="font-size: 11px;">Past Orders</span>
                            </div>
                            <div class="px-3 py-2 bg-light rounded-12 border">
                                <div class="h5 mb-0 fw-bold text-danger">{{ $user->wishlists()->count() }}</div>
                                <span class="text-muted extra-small" style="font-size: 11px;">Wishlist Items</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                <div class="fw-bold mb-1"><i class="fa-solid fa-triangle-exclamation me-2"></i> Please correct the errors below:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Profile Tabs -->
        <div class="card border-0 shadow-sm rounded-16 overflow-hidden">
            <div class="card-header bg-white border-bottom p-0">
                <ul class="nav nav-tabs nav-justified card-header-tabs m-0 border-0" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active py-3 font-weight-bold text-dark border-0 rounded-0" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                            <i class="fa-regular fa-user me-2 text-success"></i> Profile Details
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-3 font-weight-bold text-dark border-0 rounded-0 position-relative" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing" type="button" role="tab" aria-controls="ongoing" aria-selected="false">
                            <i class="fa-regular fa-clock me-2 text-warning"></i> Ongoing Orders
                            @if($ongoingOrders->count() > 0)
                                <span class="badge bg-warning text-dark rounded-pill ms-2">{{ $ongoingOrders->count() }}</span>
                            @endif
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-3 font-weight-bold text-dark border-0 rounded-0" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">
                            <i class="fa-regular fa-box-check me-2 text-primary"></i> Previous Orders
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4 p-md-5 bg-white">
                <div class="tab-content" id="profileTabsContent">
                    
                    <!-- TAB 1: PROFILE DETAILS -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <h5 class="fw-bold mb-4 text-dark border-bottom pb-2">
                                <i class="fa-regular fa-id-card me-2 text-success"></i>Personal Information
                            </h5>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label fw-bold text-dark small">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-12 py-2" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name" class="form-label fw-bold text-dark small">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-12 py-2" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold text-dark small">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control rounded-12 py-2" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-bold text-dark small">Phone Number</label>
                                    <input type="text" class="form-control rounded-12 py-2" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+94 77 123 4567">
                                </div>
                            </div>

                            <h5 class="fw-bold mb-4 text-dark border-bottom pb-2 pt-3">
                                <i class="fa-regular fa-lock me-2 text-success"></i>Security & Password
                            </h5>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="password" class="form-label fw-bold text-dark small">New Password</label>
                                    <input type="password" class="form-control rounded-12 py-2" id="password" name="password" placeholder="Leave blank to keep current">
                                </div>

                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label fw-bold text-dark small">Confirm New Password</label>
                                    <input type="password" class="form-control rounded-12 py-2" id="password_confirmation" name="password_confirmation" placeholder="Re-enter new password">
                                </div>
                            </div>

                            <div class="text-end pt-3">
                                <button type="submit" class="rbt-btn btn-gradient btn-md px-4">
                                    <i class="fa-regular fa-floppy-disk me-2"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- TAB 2: ONGOING ORDERS -->
                    <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                        <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-2">
                            <h5 class="fw-bold text-dark mb-0">
                                <i class="fa-regular fa-truck-fast me-2 text-warning"></i>Ongoing Orders
                            </h5>
                            <span class="text-muted small">{{ $ongoingOrders->count() }} active order(s)</span>
                        </div>

                        @if($ongoingOrders->isEmpty())
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="fa-regular fa-box-open display-4 text-muted"></i>
                                </div>
                                <h6 class="fw-bold text-dark">No Ongoing Orders</h6>
                                <p class="text-muted small mb-3">You don't have any orders in progress at the moment.</p>
                                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-sm btn-gradient">
                                    <i class="fa-regular fa-bag-shopping me-1"></i> Start Shopping
                                </a>
                            </div>
                        @else
                            <div class="d-flex flex-column gap-3">
                                @foreach($ongoingOrders as $order)
                                    <div class="card border rounded-16 shadow-none overflow-hidden">
                                        <div class="card-header bg-light d-flex flex-wrap align-items-center justify-content-between gap-2 p-3">
                                            <div>
                                                <span class="fw-bold text-dark me-2">Order #{{ $order->order_number }}</span>
                                                <span class="text-muted small">Placed on {{ $order->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                @php
                                                    $statusLower = strtolower($order->status ?? 'pending');
                                                    $badgeClass = match($statusLower) {
                                                        'processing' => 'bg-info text-white',
                                                        'shipped', 'in_transit' => 'bg-primary text-white',
                                                        'on_hold' => 'bg-secondary text-white',
                                                        default => 'bg-warning text-dark',
                                                    };
                                                @endphp
                                                <span class="badge {{ $badgeClass }} px-3 py-2 rounded-pill text-capitalize">
                                                    <i class="fa-regular fa-spinner fa-spin me-1"></i> {{ str_replace('_', ' ', $order->status ?? 'Pending') }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="card-body p-3">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-8">
                                                    <div class="d-flex flex-column gap-2">
                                                        @foreach($order->items as $item)
                                                            <div class="d-flex align-items-center gap-3">
                                                                <img src="{{ $item->image ? asset($item->image) : asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png') }}" 
                                                                     alt="{{ $item->name }}" 
                                                                     class="rounded" style="width: 48px; height: 48px; object-fit: contain; background: #f8fafc; border: 1px solid #e2e8f0;">
                                                                <div>
                                                                    <div class="fw-bold text-dark small">{{ $item->name }}</div>
                                                                    <div class="text-muted extra-small">Qty: {{ $item->quantity }} &times; LKR {{ number_format($item->price_lkr, 2) }}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-end border-top border-md-0 pt-2 pt-md-0">
                                                    <div class="text-muted extra-small">Total Amount</div>
                                                    <div class="h5 fw-bold text-success mb-1">LKR {{ number_format($order->total_lkr, 2) }}</div>
                                                    <div class="badge bg-light text-dark border extra-small">
                                                        {{ strtoupper($order->payment_method ?? 'COD') }} &bull; {{ ucfirst($order->payment_status ?? 'Unpaid') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- TAB 3: PREVIOUS ORDERS -->
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-2">
                            <h5 class="fw-bold text-dark mb-0">
                                <i class="fa-regular fa-history me-2 text-primary"></i>Order History
                            </h5>
                            <span class="text-muted small">{{ $previousOrders->count() }} past order(s)</span>
                        </div>

                        @if($previousOrders->isEmpty())
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="fa-regular fa-receipt display-4 text-muted"></i>
                                </div>
                                <h6 class="fw-bold text-dark">No Previous Orders</h6>
                                <p class="text-muted small mb-3">You don't have any completed or past order history yet.</p>
                                <a href="{{ route('shop') }}" class="rbt-btn rbt-btn-sm btn-gradient">
                                    <i class="fa-regular fa-bag-shopping me-1"></i> Shop Now
                                </a>
                            </div>
                        @else
                            <div class="d-flex flex-column gap-3">
                                @foreach($previousOrders as $order)
                                    <div class="card border rounded-16 shadow-none overflow-hidden">
                                        <div class="card-header bg-light d-flex flex-wrap align-items-center justify-content-between gap-2 p-3">
                                            <div>
                                                <span class="fw-bold text-dark me-2">Order #{{ $order->order_number }}</span>
                                                <span class="text-muted small">Placed on {{ $order->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <div>
                                                @php
                                                    $statusLower = strtolower($order->status ?? '');
                                                    $badgeClass = match($statusLower) {
                                                        'completed', 'delivered' => 'bg-success text-white',
                                                        'cancelled' => 'bg-danger text-white',
                                                        default => 'bg-secondary text-white',
                                                    };
                                                @endphp
                                                <span class="badge {{ $badgeClass }} px-3 py-2 rounded-pill text-capitalize">
                                                    {{ str_replace('_', ' ', $order->status ?? 'Completed') }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="card-body p-3">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-8">
                                                    <div class="d-flex flex-column gap-2">
                                                        @foreach($order->items as $item)
                                                            <div class="d-flex align-items-center gap-3">
                                                                <img src="{{ $item->image ? asset($item->image) : asset('admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png') }}" 
                                                                     alt="{{ $item->name }}" 
                                                                     class="rounded" style="width: 48px; height: 48px; object-fit: contain; background: #f8fafc; border: 1px solid #e2e8f0;">
                                                                <div>
                                                                    <div class="fw-bold text-dark small">{{ $item->name }}</div>
                                                                    <div class="text-muted extra-small">Qty: {{ $item->quantity }} &times; LKR {{ number_format($item->price_lkr, 2) }}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-end border-top border-md-0 pt-2 pt-md-0">
                                                    <div class="text-muted extra-small">Total Paid</div>
                                                    <div class="h5 fw-bold text-dark mb-1">LKR {{ number_format($order->total_lkr, 2) }}</div>
                                                    <a href="{{ route('shop') }}" class="btn btn-sm btn-outline-success rounded-pill px-3 mt-1">
                                                        <i class="fa-regular fa-rotate-right me-1"></i> Reorder
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
