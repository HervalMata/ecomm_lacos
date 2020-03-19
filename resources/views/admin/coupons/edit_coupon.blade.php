@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Cupons</a></div>
            <h1>Cupons</h1>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-flag-sign"></i></span>
                                <h5>Editar Cupom</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/edit-coupon' . $couponDetails->id) }}"
                                      name="edit_coupon" id="edit_coupon" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Categoria</label>
                                        <div class="controls">
                                            <select name="amount_type" id="amount_type" style="width: 220px;">
                                                <option @if($couponDetails->amount_type == "Percentage") selected @endif value="Percentage">Percentagem</option>
                                                <option @if($couponDetails->amount_type == "Fixed") selected @endif value="Fixed">Fixo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Código</label>
                                        <div class="controls">
                                            <input type="text" name="coupon_code" value="{{ $couponDetails->coupon_code }}"
                                            id="coupon_code" maxlength="15" minlength="5" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Pagamento</label>
                                        <div class="controls">
                                            <input type="text" name="amount" value="{{ $couponDetails->amount }}"
                                            id="amount" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Data de Expiração</label>
                                        <div class="controls">
                                            <input type="text" name="expiry_date" value="{{ $couponDetails->expiry_date }}"
                                            id="expiry_date" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                         <label class="control-label">Ativo</label>
                                         <div class="controls">
                                              <input type="checkbox" name="status" id="status" @if($couponDetails->status == "1") checked @endif value="1">
                                         </div>
                                     </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Editar Cupon" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--end-main-container-part-->
@endsection
