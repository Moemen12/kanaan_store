<!-- new -->
<div class="newproducts-w3agile">
    <div class="container">
       <h3>جميع المنتجات</h3>
       <div class="agile_top_brands_grids">
          @forelse ($lastSixProducts as $product)
          <div class="col-md-3 top_brand_left-1 first-table">
            <div class="hover14 column">
               <div class="agile_top_brand_left_grid">
                  <div class="agile_top_brand_left_grid1">
                     <figure>
                        <div class="snipcart-item block">
                           <div class="snipcart-thumb">
                              <a
                                 ><img width="200px" height="250px"
                                 
                                 alt="{{ $product->name }}"
                                 src={{ $product->url_image }}
                                 /></a>
                              <p style="    margin: 0;
                              font-size: 1.5rem;
                              font-weight: 600;">{{ $product->name }}</p>
                              <h4>
                                 ${{ $product->price }}
                              </h4>
                           </div>
                           <div
                              class="snipcart-details top_brand_home_details"
                              >
                              <a href="{{ route('show',$product) }}" class="btn btn-primary" style="display: block;text-transform:uppercase;margin:auto;width:165px;background:#fe9126;border:0;" role="button" data-bs-toggle="button">تفاصيل</a>
                           </div>
                        </div>
                     </figure>
                  </div>
               </div>
            </div>
         </div>
          @empty
              <h3 class="to-hover" style="font-size: x-large;color:#333333">لا تتوفر أي منتجات</h3>
          @endforelse
          <div class="clearfix"></div>
       </div>
    </div>
 </div>
 <!-- //new -->