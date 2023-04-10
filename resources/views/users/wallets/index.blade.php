@extends('users.layouts.app')
@section('title', 'Add Wallet')
@section('pagecss')
@endsection
@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Wallets</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">All Available Wallets</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-body">
                            <div class="text-end p-4 pb-0">
                                <a href="{{ route('wallet.create') }}" class="btn btn-primary">
                                    <i class="ti ti-plus f-18"></i> Add Wallet
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th class="text-end">#</th>
                                            <th>Wallet Name</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($wallets as $key => $wallet)
                                            <tr>
                                                <td class="text-end">{{ ++$key }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ url($wallet->qr_code) }}" alt="user-image"
                                                                class="wid-40 rounded">
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-muted f-12 mb-0">{{ $wallet->name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $wallet->wallet_address }}</td>
                                                <td><span
                                                        class="badge bg-light-success  f-12 text-capitalize">{{ $wallet->status }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <ul class="list-inline me-auto mb-0">
                                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                            title="View">
                                                            <a href="#"
                                                                class="avtar avtar-xs btn-link-secondary btn-pc-default"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cust-modal{{ $key }}">
                                                                <i class="ti ti-eye f-18"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                            title="Edit">
                                                            <a href="{{ route('wallet.edit', $wallet->id) }}"
                                                                class="avtar avtar-xs btn-link-success btn-pc-default">
                                                                <i class="ti ti-edit-circle f-18"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                            title="Delete">
                                                            <form action="{{ route('wallet.destroy', $wallet->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="avtar avtar-xs btn-link-danger btn-pc-default show_confirm">
                                                                <i class="ti ti-trash f-18"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <div class="modal fade" id="cust-modal{{ $key }}"
                                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                                    <div
                                                        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-0 pb-0">
                                                                <h5 class="mb-0">{{ $wallet->name }}</h5>
                                                                <a href="#"
                                                                    class="avtar avtar-s btn-link-danger btn-pc-default"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="ti ti-x f-20"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-4">
                                                                        <div class="bg-light rounded position-relative">
                                                                            <div class="text-center">
                                                                                <div
                                                                                    class="chat-avtar d-inline-flex mx-auto">
                                                                                    <img class="img-fluid rounded"
                                                                                        src="{{ url($wallet->qr_code) }}"
                                                                                        alt="{{ $wallet->name }} QR Code">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <p class="text-muted text-center">
                                                                            {{ $wallet->wallet_address }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
@endsection

@section('pagejs')

    <!-- [Page Specific JS] start -->
    <script src="../assets/js/plugins/simple-datatables.js"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 5
        });
    </script>
    <!-- [Page Specific JS] end -->

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this wallet!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                        swal("Deleted!", "Your wallet has been deleted.", "success");
                    } else {
                        swal("Cancelled", "Your wallet is safe :)", "error");
                    }
                });
        });
    </script>
@endsection