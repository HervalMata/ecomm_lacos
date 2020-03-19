@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Banner</a></div>
            <h1>Banners</h1>
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
                                <h5>Adicionar banner</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-banner') }}"
                                      name="add_banner" id="add_banner" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Imagem</label>
                                        <div class="controls">
                                            <div class="uploader" id="uniform-undefined">
                                                <input type="file" name="image" id="image" size="19" style="opacity: 0;"/>
                                                <span class="filename">Nemhum Arquivo selecionado</span>
                                                <span class="action">Escolher Arquivo</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Titulo</label>
                                        <div class="controls">
                                            <input type="text" name="title" id="title"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Link</label>
                                        <div class="controls">
                                            <input type="text" name="link" id="link"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Ativo</label>
                                        <div class="controls">
                                            <input type="checkbox" name="status" id="status" value="1"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Adicionar Banner" class="btn btn-success">
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
