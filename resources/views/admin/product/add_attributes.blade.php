@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Produto</a></div>
            <h1>Atributos do Produtos</h1>
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
                                <h5>Adicionar atributos dos produto</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-attribute' . $productDetails->id) }}"
                                      name="add_attribute" id="add_attribute" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Nome</label>
                                        <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Código</label>
                                        <label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Cor</label>
                                        <label class="control-label"><strong>{{ $productDetails->product_color }}</strong></label>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"></label>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;"/>
                                                <input type="text" name="size[]" id="size" placeholder="Tamanho" style="width: 120px;"/>
                                                <input type="text" name="price[]" id="price" placeholder="Preço" style="width: 120px;"/>
                                                <input type="text" name="stock[]" id="stock" placeholder="Estoque" style="width: 120px;"/>
                                                <a href="javascript:void(0);" class="add_button" title="Adicionar Campo">Adicionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Adicionar atributos do produto" class="btn btn-success">
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
