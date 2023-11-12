@extends('../layout/admin')


@section('dashboard')
    <div class="home-content">
       <div class="overview-boxes">
          <div class="box">
             <div class="right-side">
                <div class="box-topic">Offered Products</div>
                <div class="number">{{ $totalofferedProducts }}</div>
                <div class="indicator">
                   <i class='bx bx-up-arrow-alt'></i>
                   <span class="text">Up from yesterday</span>
                </div>
             </div>
             <i class='bx bx-cart-alt cart'></i>
          </div>
          <div class="box">
             <div class="right-side">
                <div class="box-topic">Regular Priced Products</div>
                <div class="number">{{ $totalAllProducts }}</div>
                <div class="indicator">
                   <i class='bx bx-up-arrow-alt'></i>
                   <span class="text">Up from yesterday</span>
                </div>
             </div>
             <i class='bx bxs-cart-add cart two' ></i>
          </div>
     
       </div>
    
    
 </section>
@endsection