@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Cuponss</a></div>
            <h1>Cupons</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-flag-sign"></i></span>
                                <h5>Visualizar Cupons</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Código</th>
                                            <th>Pagamento</th>
                                            <th>Tipo de Pagamento</th>
                                            <th>Data de Expiração</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coupons as $coupon)
                                            <tr class="gradeX">
                                                <td>{{ $coupon->id }}</td>
                                                <td>{{ $coupon->coupon_code }}</td>
                                                <td>{{ $coupon->amount }}</td>
                                                <td>{{ $coupon->amount_type }}</td>
                                                <td>{{ $coupon->expire_date }}</td>
                                                <td>
                                                    @if($coupon->status == 1) Ativo @else Inativo @endif
                                                </td>
                                                <td class="center">
                                                    <a href="{{ url('/admin/edit-coupon/' . $coupon->id) }}" class="btn btn-primary btn-mini">Editar</a>
                                                    <a id="delCoupon" rel="{{ $coupon->id }}" rel1="delete-coupon" href="javascript:" deleteRecord class="btn btn-danger btn-mini">Excluir</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--end-main-container-part-->
@endsection
