@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Carrinho de compras</li>
                </ol>
            </div>
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color: #f2dfd0">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Preço</td>
                        <td class="quantity">Quantidade</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
                        <td class="cart_product">
                            <a style="width: 100px;" href=""><img src="{{ asset('images/backend_images/products/medium/' . $cart->image) }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart->product_name }}</a></h4>
                            <p>Código: {{ $cart->product_code }}</p>
                        </td>
                        <td class="cart_price">
                            <p>R$ {{ $cart->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('/cart/update-quantity/' . $cart->id , '/1') }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
                                @if($cart->quantity > 1)
                                <a class="cart_quantity_down" href="{{ url('/cart/update-quantity/' . $cart->id , '/-1') }}"> - </a>
                                @endif
                            </div>
                        </td>

                        <td class="cart_total">
                            <p class="cart_total_price">R$ {{ $cart->price * $cart->quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('/cart/delete-product/' . $cart->id) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php $total_amount = $total_amount + ($cart->price * $cart->quantity); ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>O que você gostaria de fazer agora?</h3>
                <p>Escolha se você tem um cupom de desconto ou pontos que gostaria de usar ou estimar seu custo de entrega.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <form action="{{ url('cart/apply-coupon') }}" method="post">
                                    {{ csrf_field() }}
                                    <label>Código do Cupom</label>
                                    <input type="text" name="coupon_code">
                                    <input type="submit" value="apply" class="btn btn-default">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            @if(!empty(Session::get('CouponAmount')))
                                <li>Sub Total <span>R$ <?php echo $total_amount; ?></span></li>
                                <li>Desconto Cupom <span>R$ <?php echo Session::get('CouponAmount'); ?></span></li>
                                <li>Total <span>R$ <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
                            @else
                                <li>Total <span>R$ <?php echo $total_amount; ?>></span></li>
                            @endif
                        </ul>
                        <a class="btn btn-default update" href="">Atualize</a>
                        <a class="btn btn-default check_out" href="">Finalizar Compra</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection
