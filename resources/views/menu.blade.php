@extends("layouts.shop")
@section("content")
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>SHOP</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Menu Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp xếp</span>
                                    <select id="sort" class="selectpicker show-tick form-control" name="sort">
                                        <option data-display="Select">Mặc định</option>
                                        <option value="1">Giá thấp → Giá cao</option>
                                        <option value="2">Giá cao → Giá thấp</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="row category-list">
                                @if($lsProduct!=null)
                                    @foreach($lsProduct as $product)@php
                                        $tagname = "";
                                        foreach($product->tags as $t) {
                                            $tagname .= $t->id." ";
                                        }
                                    @endphp
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 category-grid {{$tagname}}">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                @foreach($product->images as $image)
                                                    <img src="{{asset($image->link)}}" class="img-fluid"
                                                         alt="Image">
                                                @endforeach
                                                <div class="mask-icon">
                                                    <ul>
                                                        <li><a href="{{route('detail', $product->id)}}"
                                                               data-toggle="tooltip"
                                                               data-placement="right"
                                                               title="Xem"><i class="fas fa-eye"></i></a>
                                                        </li>
                                                    </ul>
                                                    <a class="cart" onclick="AddCart({{$product->id}})"
                                                       href="javascript:">Thêm vào giỏ</a>
                                                </div>
                                            </div>
                                            <div class="why-text">
                                                <h4><a href="{{route('detail', $product->id)}}"
                                                       style="color: black">{{$product->name}}</a></h4>
                                                <h5> {{$product->price}} VND</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @elseif($lsProduct==null)
                                    <p>Không có sản phẩm nào trong danh mục này. Vui lòng nhập từ khóa khác.
                                @endif
                            </div>
                            <div class="row">
                                {{--                                <div style="margin: auto">{{$lsProduct->links("pagination::bootstrap-4")}}</div>--}}
                                @if($lsProduct!=null)

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="{{route('menu')}}" method="get" name="search">
                                @csrf
                                <input class="form-control" placeholder="Tìm kiếm..." type="text"
                                       name="name"
                                       value="{{$name}}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Danh Mục</h3>
                            </div>
                            <div class="category-menu list-group list-group-collapse list-group-sm list-group-tree">
                                <button href="" class="active list-group-item list-group-item-action"
                                        data-filter="*">Tất cả <small
                                        class="text-muted"> ({{$product->count()}})</small></button>
                                @foreach($lsTag as $tag)
                                    <button class="list-group-item list-group-item-action"
                                            data-tag_id=".{{$tag->id}}"> {{$tag->name}} <small
                                            class="text-muted"> ({{$tag->products()->count()}})</small></button>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Giá</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <form action="{{route('slideFilter')}}" method="get" name="search">
                                    @csrf
                                    <input type="text" id="amount" readonly
                                           style="border:0; color:#fbb714; font-weight:bold; margin-top: 25px; width: 70%">
                                    <input type="hidden" id="minPrice" name="minPrice">
                                    <input type="hidden" id="maxPrice" name="maxPrice">
                                    <button style="float: right; color: white;margin-top: 15px" class="btn hvr-hover"
                                            type="submit"
                                            onclick="filter()">
                                        Lọc
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu Page -->

    <script type="text/javascript">
        /* ..............................................
       Slider Range
       ................................................. */
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 300000,
                values: [50000, 250000],
                slide: function (event, ui) {
                    $("#amount").val(ui.values[0] + " VND" + " - " + ui.values[1] + " VND");
                }
            });
            $("#amount").val($("#slider-range").slider("values", 0) + " VND" + " - " + $("#slider-range").slider("values", 1) + " VND");
        });

        function filter() {
            $("#minPrice").val($("#slider-range").slider("values", 0));
            $("#maxPrice").val($("#slider-range").slider("values", 1));
        }
    </script>

    <!---Them gio hang --->
    <script>
        function AddCart(id) {
            $.ajax({
                url: 'Add-Cart/' + id,
                type: 'GET',
            }).done(function (response) {
                RenderCart(response);
                alertify.success('Thêm giỏ hàng thành công');
            });
        }

        $("#cart-item-change").on("click", ".close-cart i", function () {
            $.ajax({
                url: 'Delete-Item-Cart/' + $(this).data("id"),
                type: 'GET',
            }).done(function (response) {
                RenderCart(response);
            });
        });

        function RenderCart(response) {
            $("#cart-item-change").empty();
            $("#cart-item-change").html(response);
            $("#total-quantity-show").text($("#total-quantity-cart").val());
        }
    </script>
@endsection
