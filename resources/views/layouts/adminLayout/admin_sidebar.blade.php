<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Categorias</span><span class="label label-important">2</span> </a>
            <ul>
                <li><a href="{{ url('/admin/add-category') }}">Adicionar Categoria</a> </li>
                <li><a href="{{ url('/admin/view-categories') }}">Visualizar Categorias</a> </li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Produtos</span><span class="label label-important">2</span> </a>
            <ul>
                <li><a href="{{ url('/admin/add-product') }}">Adicionar Produto</a> </li>
                <li><a href="{{ url('/admin/view-products') }}">Visualizar Produtos</a> </li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Cupons</span><span class="label label-important">3</span> </a>
            <ul>
                <li><a href="{{ url('/admin/add-coupon') }}">Adicionar Cupom</a> </li>
                <li><a href="{{ url('/admin/view-coupons') }}">Visualizar Cupons</a> </li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i><span>Banners</span><span class="label label-important">4</span> </a>
            <ul>
                <li><a href="{{ url('/admin/add-banner') }}">Adicionar Banner</a> </li>
                <li><a href="{{ url('/admin/view-banners') }}">Visualizar Banners</a> </li>
            </ul>
        </li>
    </ul>
</div>
