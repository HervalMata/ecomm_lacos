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
                                <h5>Adicionar produto</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}"
                                      name="add_product" id="add_product" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Categoria</label>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" style="width: 220px;">
                                                <?php echo $categories_dropdown; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nome</label>
                                        <div class="controls">
                                            <input type="text" name="product_name" id="product_name"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Código</label>
                                        <div class="controls">
                                            <input type="text" name="product_code" id="product_code"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Cor</label>
                                        <div class="controls">
                                            <input type="text" name="product_color" id="product_color"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Descrição</label>
                                        <div class="controls">
                                            <textarea name="description" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Preço</label>
                                        <div class="controls">
                                            <input type="text" name="price" id="price"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Imagem</label>
                                        <div class="controls">
                                            <input type="text" name="image" id="image"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Adicionar produto" class="btn btn-success">
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
