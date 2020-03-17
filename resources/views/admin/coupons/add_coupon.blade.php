@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Cupom</a></div>
            <h1>Cupons</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-flag-sign"></i></span>
                                <h5>Adicionar Cupom</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/add-coupon') }}"
                                      name="add_coupon" id="add_coupon" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Tipo de Pagamento</label>
                                        <div class="controls">
                                            <select name="amount_type" id="amount_type" style="width: 220px;">
                                                <option value="Percentage">Percentagem</option>
                                                <option value="Fixed">Fixo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Código</label>
                                        <div class="controls">
                                            <input type="text" name="coupon_code" id="coupon_code" maxlength="15" minlength="5" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Pagamento</label>
                                        <div class="controls">
                                            <input type="text" name="amount" id="amount" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Data de Expiração</label>
                                        <div class="controls">
                                            <input type="text" name="expiry_date" id="expiry_date" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Ativo</label>
                                        <div class="controls">
                                            <input type="checkbox" name="status" id="status" value="1">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Adicionar Cupom" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
