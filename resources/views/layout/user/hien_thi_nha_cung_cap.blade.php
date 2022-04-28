<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Nhà cung cấp </span>
                <h2 class="mb-4">Các nhà cung ứng </h2>
                <p>Những nhà cung ứng và Sản xuất hàng đầu đang họp tác</p>
            </div>
            @foreach ($nsx as $item)
            <div class="col-sm ftco-animate">
                <a href="{{url('chi_tiet_nha_san_xuat/')}}/{{$item->MaNSX}}" class="partner"><img style="height: 100px, width=150px" src="{{ URL::asset('resources/css_js_user/') }}/images/{{$item->Anh}}" class="img-fluid"

                        alt="Colorlib Template"></a>
            </div>
            @endforeach
           
        </div>
    </div>
</section>