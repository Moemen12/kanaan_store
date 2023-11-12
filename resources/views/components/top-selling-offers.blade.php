<!-- top-brands -->
<div class="top-brands" id="section2">
    <div class="container">
       <h2>العروض المميزة</h2>
       <div class="grid_3 grid_5">
          <div
             class="bs-example bs-example-tabs"
             role="tabpanel"
             data-example-id="togglable-tabs"
             >
             <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                   <a
                      href="#expeditions"
                      id="expeditions-tab"
                      role="tab"
                      data-toggle="tab"
                      aria-controls="expeditions"
                      aria-expanded="true"
                      >أحدث العروض</a
                      >
                </li>
             </ul>
             <div id="myTabContent" class="tab-content">
                <div
                   role="tabpanel"
                   class="tab-pane fade in active"
                   id="expeditions"
                   aria-labelledby="expeditions-tab"
                   >
                   <div class="agile_top_brands_grids">
                    
                     @forelse ($offer_products as $product)
                     <div class="col-md-4 top_brand_left first-table">
                        <div class="hover14 column">
                           <div
                              class="agile_top_brand_left_grid"
                              >
                              <div
                                 class="agile_top_brand_left_grid_pos"
                                 >
                                 <img
                                    src="images/offer.png"
                                    alt=" "
                                    class="img-responsive"
                                    />
                              </div>
                              <div
                                 class="agile_top_brand_left_grid1"
                                 >
                                 <figure>
                                    <div
                                       class="snipcart-item block"
                                       >
                                       <div
                                          class="snipcart-thumb"
                                          >
                                          <a
                                            
                                             ><img width="200px" height="200px"
                                             alt="{{ $product->name}}"
                                             src="/{{ $product->url_image }}"
                                             /></a>
                                          <p>{{ $product->name}}</p>
                                          <h4>
                                             ${{ $product->price_after_discount }}
                                             <span
                                                >{{ $product->price}}</span
                                                >
                                          </h4>
                                       </div>
                                       <div
                                          class="snipcart-details top_brand_home_details"
                                          >
                                          <a href="{{ route('show',$product->id) }}" class="btn btn-primary" style="display: block;text-transform:uppercase;margin:auto;width:165px;background:#fe9126;border:0;" role="button" data-bs-toggle="button">تفاصيل</a>
                                       </div>
                                    </div>
                                 </figure>
                              </div>
                           </div>
                        </div>
                     </div>
                     @empty
                        <h3 style="text-align: center;">لا تتوفر أي عروض</h3>
                     @endforelse
                      
                      <div class="clearfix"></div>
                   </div>
               
                </div>
              
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- //top-brands -->