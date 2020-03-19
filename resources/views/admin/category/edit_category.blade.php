@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Categorias</a></div>
            <h1>Categorias</h1>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-flag-sign"></i></span>
                                <h5>Editar categoria</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/edit-category' . $categoryDetails->id) }}"
                                      name="edit_category" id="edit_category" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Nome</label>
                                        <div class="controls">
                                            <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nivel</label>
                                        <div class="controls">
                                            <select name="parent_id" style="width: 220px;">
                                                <option value="0">Categoria Principal</option>
                                                @foreach($levels as $val)
                                                    <option value="{{ $val->id }}" @if($val->id == $categoryDetails->parent_id) selected @endif>{{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Descrição</label>
                                        <div class="controls">
                                            <textarea name="description" id="description">{{ $categoryDetails->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Url</label>
                                        <div class="controls">
                                            <input type="text" name="url" id="url" value="{{ $categoryDetails->url }}"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Ativo</label>
                                        <div class="controls">
                                            <input type="checkbox" name="status" id="status" value="{{ $categoryDetails->status }}"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Atualizar Categoria" class="btn btn-success">
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
