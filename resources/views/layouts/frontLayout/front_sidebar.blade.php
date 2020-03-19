<div class="left-sidebar">
    <h2>Categorias</h2>
    <div class="panel-group category-products" id="accordian"><!--category-products-->
        @foreach($categories as $cat)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
                            <span class="badge pull-right">
                                <i class="fa fa-plus"></i>
                            </span>
                            {{$cat->name}}
                        </a>
                    </h4>
                </div>
            </div>
        @endforeach
    </div><!--/category-products-->
</div>
