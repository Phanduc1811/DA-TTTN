
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Vật tư xây dựng</span>
                <h2 class="mb-4">Vật Tư Đang Bán</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($vt as $item)
           
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{url('chi_tiet_vat_tu/')}}/{{$item->MaVT}}" class="img-prod"><img class="img-fluid" style="height: 200px" src="{{ URL::asset('resources/css_js_user/') }}/images/{{$item->Anh}}"
                                alt="Colorlib Template">

                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{url('chi_tiet_vat_tu/')}}/{{$item->MaVT}}">{{$item->TenVT}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span >{{number_format($item->DonGia)}}VNĐ</span>/<span
                                        class="price-sale">{{$item->DVTinh}}</span></p>

                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{url('chi_tiet_vat_tu/')}}/{{$item->MaVT}}"
                                        class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                {{ $vt->links()}}
              </ul>
            </nav>
          </div>
    </div>
</section>