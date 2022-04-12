@model WatchStore.Models.MProduct
@{
    ViewBag.Title = @Model.Name;
    Layout = "~/Views/Shared/_LayoutSite.cshtml";
}
@Html.Partial("_Nofit")
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="bstore-breadcrumb">
                    <a href="~/">Trang Chủ<span><i class="fa fa-caret-right"></i> </span> </a>
                    <span> @Model.Name</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="main-content-background">
                       <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                        <div class="single-product-view">
                            <div class="tab-content">
                                <div class="tab-pane active" id="thumbnail_1">
                                    <div class="single-product-image">
                                        <img src="~/Public/library/product/@Model.Image" alt="@Model.Name" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="~/Public/library/product/@Model.Image" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                        <div class="single-product-descirption">
                            <div class="single-product-top">
                                <div class="single-product-left">
                                    <h3><span style="color: #141313">@Model.Name</span></h3>
                                    @for (int i = 1; i <= 5; i++)
                                    {
                                        if (i <= Model.ProRate)
                                        {
                                            <span class="fa fa-star checked"></span>
                                        }
                                        else
                                        {
                                            <span class="fa fa-star"></span>
                                        }
                                    }
                                    <p>Sản phẩm có sẵn: <span>@Model.Quantity</span></p>
                                </div>
                                <div class="single-product-condition">
                                   

                                    <div class="single-product-price">

                                        @if (Model.Discount == 1)
                                        {
                                            <h4>Giá hot: <span style="color:#d63031">@String.Format("{0:0,0₫}", Model.ProPrice)</span></h4>
                                            <h4>Giá cũ: <del>@String.Format("{0:0,0₫}", Model.Price)</del></h4>

                                        }
                                        else
                                        {
                                            <br />

                                            <h4><span style="color: #DA5353">@String.Format("{0:0,0₫}", Model.Price)</span></h4>
                                        }


                                    </div>
                                </div>

                            </div>
                         

                            @*<div class="single-product-review-box">

                                <div class="read-reviews">

                                </div>
                                <div class="write-review">

                                </div>
                            </div>*@
                         
                            
                            <div class="single-product-desc">
                                <p>@Html.Raw(Model.Detail)</p>
                            </div>
                            <div class="single-product-quantity">
                                <p class="small-title">Số lượng</p>
                                <div class="cart-quantity">
                                    <div class="cart">
                                        <div class="dec qtybutton" onclick="Tru();">-</div>
                                        <input class="cart-plus-minus sing-pro-qty" type="number" id="qtyDpt" name="" value="1" min="1">
                                        <div class="inc qtybutton" style="float:left;" onclick="Cong();">+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-add-cart">
                                <button class="add-cart-text" id="buy-btn" data-id="@Model.ID" title="Thêm vào giỏ hàng" href="#">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#home" class="tab-comment">Chi Tiết</a></li>
                            <li><a data-toggle="pill" href="#menu1" class="tab-comment">Đánh Giá</a></li>
                            <li><a data-toggle="pill" href="#menu2" class="tab-comment">Bình luận</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="tab-pane active" id="moreinfo">
                                    <div class="tab-description">
                                        <p>@Html.Raw(Model.Description)</p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="tab-rating">
                                    <ul>
                                        @foreach (var item in ViewBag.Rates)
                                        {
                                            <li>
                                                <div class="d-flex-at">
                                                    <div class="star">
                                                        @for (int i = 1; i <= 5; i++)
                                                        {
                                                            if (i <= item.Rate)
                                                            {
                                                                <span class="fa fa-star checked"></span>
                                                            }
                                                            else
                                                            {
                                                                <span class="fa fa-star"></span>
                                                            }
                                                        }
                                                    </div> 
                                                    <p>@item.CreateAt</p>
                                                </div>
                                               
                                                <p>Khách hàng <span>@item.UName : @item.Comment</span></p>
                                              

                                            </li>
                                        }

                                    </ul>
                                    <label for="rate">Đánh giá:</label>
                                    <input id="rate" type="number" min="0" max="5" step="1" value="5" /><span class="fa fa-star checked"></span>
                                    <br />
                                    <textarea id="cmt" rows="5" cols="100"></textarea>
                                    <br />
                                    <button class="add-cart-text" id="btnRate" data-id="@Model.ID" title="Gửi" href="#">Gửi</button>
                                </div>
                              

                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="fb-comments" data-href="@Request.Url.GetLeftPart(UriPartial.Path)" data-width="100%" data-numposts=""></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="left-title-area">
                            <h2 class="left-title">Sản phẩm cùng danh mục</h2>
                        </div>
                    </div>
                    <div class="related-product-area featured-products-area">
                        <div class="col-sm-12">
                            <div class=" row">
                                <div class="related-product">
                                    @foreach (var item in ViewBag.listother)
                                    {
                                        <div class="item">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="~/@item.Slug"><img src="~/Public/library/product/@item.Image" alt="@item.Name" /></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="customar-comments-box">
                                                    
                                                        @*<div class="review-box">
                                                                <span>1 Review(s)</span>
                                                            </div>*@
                                                    </div>
                                                    <a href="@item.Slug">@item.Name</a>
                                                    <div class="price-box">
                                                        <span class="price">@String.Format("{0:0,0₫}", item.ProPrice)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-product-right-sidebar">
                    <h2 class="left-title">Sản phẩm vừa nhập về</h2>
                    <ul>
                        @foreach (var item in ViewBag.news)
                        {
                            <li>
                                <a href="~/@item.Slug" class="product-sidebar-flex">
                                    <img src="~/Public/library/product/@item.Image" width="80px;" alt="@item.Name" />
                                    <div class="r-sidebar-pro-content">
                                        <h5>@item.Name</h5>

                                        <h2 style="color:#d63031;">@String.Format("{0:0,0₫}", item.ProPrice)</h2>
                                        <h3><del>@String.Format("{0:0,0₫}", item.Price)</del></h3>
                                        <p>@item.MetaDesc</p>
                                    </div>
                                </a>
                                
                            </li>
                        }

                    </ul>
                </div>
               
            </div>
        </div>
    </div>
</section>

<script>
   

    function Cong() {
        const num = parseInt($('#qtyDpt').val());
        if (num < 99) {
            $('#qtyDpt').val(num + 1);
        }
    }
    function Tru() {
        const num = parseInt($('#qtyDpt').val());
        if (num > 1) {
            $('#qtyDpt').val(num - 1);
        }
    }
</script>