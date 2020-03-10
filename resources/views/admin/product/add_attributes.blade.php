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
                                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                                    <div class="control-group">
                                        <label class="control-label">Categoria</label>
                                        <label class="control-label"><strong>{{ $category_name }}</strong></label>
                                    </div>
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
                                                <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;"/>
                                                <input required title="Required" type="text" name="size[]" id="size" placeholder="Tamanho" style="width: 120px;"/>
                                                <input required title="Required" type="text" name="price[]" id="price" placeholder="Preço" style="width: 120px;"/>
                                                <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Estoque" style="width: 120px;"/>
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
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span>
                                <h5>Atributos</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form action="{{ url('admin/edit-attributes/' . $productDetails->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>SKU</th>
                                                <th>Tamanho</th>
                                                <th>Preço</th>
                                                <th>Estoque</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productDetails['attributes'] as $attribute)
                                                <tr class="gradeX">
                                                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                                                    <td class="center">{{ $attribute->sku }}</td>
                                                    <td class="center">{{ $attribute->size }}</td>
                                                    <td class="center"><input type="text" name="price[]" value="{{ $attribute->price }}"></td>
                                                    <td class="center"><input type="text" name="stock[]" value="{{ $attribute->stock }}" required></td>
                                                    <td class="center">
                                                        <input type="submit" value="update" class="btn btn-primary btn-mini">
                                                        <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Remover</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
