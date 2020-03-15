@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Produtos</a></div>
            <h1>Produtos</h1>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-flag-sign"></i></span>
                                <h5>Editar produto</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/edit-product' . $productDetails->id) }}"
                                      name="edit_product" id="edit_product" novalidate="novalidate">
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
                                            <input type="text" name="product_name" value="{{ $productDetails->product_name }}"
                                            id="product_name"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Código</label>
                                        <div class="controls">
                                            <input type="text" name="product_code" value="{{ $productDetails->product_code }}"
                                            id="product_code"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Cor</label>
                                        <div class="controls">
                                            <input type="text" name="product_color" value="{{ $productDetails->product_color }}"
                                            id="product_color"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Descrição</label>
                                        <div class="controls">
                                            <textarea name="description" id="description">{{ $productDetails->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Material</label>
                                        <div class="controls">
                                            <textarea name="care" id="care">{{ $productDetails->care }}</textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Preço</label>
                                        <div class="controls">
                                            <input type="text" name="price" value="{{ $productDetails->price }}"
                                            id="price"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Imagem</label>
                                        <div class="controls">
                                            <div id="uniform-undefined">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="image" id="image"/>
                                                            @if(!empty($productDetails->image))
                                                                <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(!empty($productDetails->image))
                                                                <img style="width: 60px;" src="{{ asset('/images/backend_images/products/small/' . $productDetails->image)}}"> |
                                                                <a href="{{ url('/admin/delete-product-image/' . $productDetails->image) }}">Remover</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Ativo</label>
                                                <div class="controls">
                                                    <input type="checkbox" name="status" id="status" @if($productDetails->status == "1") checked @endif value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Editar produto" class="btn btn-success">
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
