@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Categoria</a></div>
            <h1>Categorias</h1>
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
                                <h5>Adicionar categoria</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}"
                                      name="add_category" id="add_category" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Nome</label>
                                        <div class="controls">
                                            <input type="text" name="category_name" id="category_name"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nivel</label>
                                        <div class="controls">
                                            <select name="parent_id" style="width: 220px;">
                                                <option value="0">Categoria Principal</option>
                                                @foreach($levels as $val)
                                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Descrição</label>
                                        <div class="controls">
                                            <textarea name="description" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Url</label>
                                        <div class="controls">
                                            <input type="text" name="url" id="url"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Adicionar Categoria" class="btn btn-success">
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
