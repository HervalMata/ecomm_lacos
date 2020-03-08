@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Produtos</a></div>
            <h1>Produtos</h1>
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
                                <h5>Visualizar Produtos</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Categoria</th>
                                            <th>Nome</th>
                                            <th>Código</th>
                                            <th>Cor</th>
                                            <th>Preço</th>
                                            <th>Imagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr class="gradeX">
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->category_name }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->product_color }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    @if(!empty($product->image))
                                                        <img src="{{ asset('/images/backend_images/products/small/' . $product->image) }}" style="width: 60px;">
                                                    @endif
                                                </td>
                                                <td class="center"><a href="#myModal{{ $product->id) }}" class="btn btn-primary btn-mini">Visualizar<a href="{{ url('/admin/edit-product' . $product->id) }}" class="btn btn-primary btn-mini">Editar</a> <a id="delCat" href="{{ url('/admin/delete-product' . $product->id) }}" class="btn btn-danger btn-mini">Excluir</a></td>
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
