@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('images/frontend_images/home/girl1.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('images/frontend_images/home/pricing.png') }}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('images/frontend_images/home/girl2.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('images/frontend_images/home/pricing.png') }}"  class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('images/frontend_images/home/girl3.jpg') }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('images/frontend_images/home/pricing.png') }}" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color: #d7efe5">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <div class="col-sm-3">
                    @include('layouts.frontLayout.front_sidebar')
                </div><!--/category-products-->

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <div class="easyzoom easyzoom--overlay">
                                    <a id="mainImgLarge" href="{{ asset('images/backend_images/product/large/' . $productDetails->image) }}">
                                        <img style="width: 300px;" id="mainImg" src="{{ asset('images/backend_images/product/medium/' . $productDetails->image) }}" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <form name="addToCartForm" id="addToCartForm" action="{{ url('add-cart') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                            <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                            <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                            <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
                            <input type="hidden" name="price" value="{{ $productDetails->price }}">
                        </form>
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $productDetails->product_name }}</h2>
                            <p>Código: {{ $productDetails->product_code }}</p>
                            <p>
                                <select id="selSize" name="size" style="width: 150px;">
                                    <option value="">Selecione</option>
                                    @foreach($productDetails->attributes as $sizes)
                                        <option value="{{ $sizes->$size }}">{{ $sizes->$size }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
									<span id="getPrice">Real ${{ $productDetails->price }}</span>
									<label>Quantidade:</label>
									<input name="quantity" type="text" value="3" />
                                    @if($total_stock > 0)
									    <button type="submit" class="btn btn-fefault cart" id="cartButton">
										    <i class="fa fa-shopping-cart"></i>
										    Adicionar para o carrinho
									    </button>
                                    @endif
								</span>
                            <p><b>Availability:</b><span id="Availability"> @if($total_stock > 0) Em estoque @else Fora de estoque @endif</span></p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">Descrição</a></li>
                                <li><a href="#care" data-toggle="tab">Material</a></li>
                                <li><a href="#delivery" data-toggle="tab">Opções de entrega</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="description">
                                <div class="col-sm-12">
                                    <p>{{ $productDetails->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="care">
                                <div class="col-sm-12">
                                    <p>{{ $productDetails->care }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="description">
                                <div class="col-sm-12">
                                    <p>100% Produtos originais <br> Dinheiro na entrega deve está disponível</p>
                                </div>
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">itens recomendados</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count = 1; ?>
                                @foreach($relatedProducts->chunk(3) as $chunk)
                                <div <?php if($count == 1) { ?> class="item active" <?php } else { ?> class="item" <?php } ?>>
                                    @foreach($chunk as $item)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width: 200px;" src="{{ asset('images/backend_images/product/small/' . $item->image) }}" alt="" />
                                                    <h2>R$ {{ $item->price }}</h2>
                                                    <p>{{ $item->product_name }}</p>
                                                    <a href="{{ url('/product/' .$item->id) }}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar para o carrinho</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <?php $count++; ?>
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                    </div><!--features_items-->

                </div>
    </section>
@endsection
