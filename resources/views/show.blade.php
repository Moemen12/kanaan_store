@extends('layout.app')
<style>
    @import url('https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat:300,400,700,800|Open+Sans:300');
 body {
	 background-image: linear-gradient(to right bottom, #b91eda, #a02ae0, #8234e5, #5d3be8, #1241eb);
	 height: 100%;
	 margin: 0;
	 background-repeat: no-repeat;
	 background-attachment: fixed;
}
 main {
	 max-width: 720px;
	 margin: 5% auto;
}
 .card {
	 box-shadow: 0 6px 6px rgba(0, 0, 0, 0.3);
	 transition: 200ms;
	 background: #fff;
}
 .card .card__title {
	 display: flex;
	 align-items: center;
	 padding: 30px 40px;
}
 .card .card__title h3 {
	 flex: 0 1 200px;
	 text-align: right;
	 margin: 0;
	 color: #252525;
	 font-family: sans-serif;
	 font-weight: 600;
	 font-size: 20px;
	 text-transform: uppercase;
}
 .card .card__title .icon {
	 flex: 1 0 10px;
	 background: #fe9126;
	 color: #fff;
	 padding: 10px 10px;
	 transition: 200ms;
}
 .card .card__title .icon > a {
	 color: #fff;
}
 .card .card__title .icon:hover {
	 background: #252525;
}
 .card .card__body {
	 padding: 0 40px;
	 display: flex;
	 flex-flow: row no-wrap;
	 margin-bottom: 25px;
}
 .card .card__body > .half {
	 box-sizing: border-box;
	 padding: 0 15px;
	 flex: 1 0 50%;
}
 .card .card__body .featured_text h1 {
	 margin: 0;
	 padding: 0;
	 font-weight: 800;
	 font-family: "Montserrat", sans-serif;
	 font-size: 64px;
	 line-height: 50px;
	 color: #181e28;
}
 .card .card__body .featured_text p {
	 margin: 0;
	 padding: 0;
}
 .card .card__body .featured_text p.sub {
	 font-family: "Montserrat", sans-serif;
	 font-size: 26px;
	 text-transform: uppercase;
	 color: #686e77;
	 font-weight: 300;
	 margin-bottom: 5px;
}
 .card .card__body .featured_text p.price {
	 font-family: "Fjalla One", sans-serif;
	 color: #252525;
	 font-size: 26px;
}
 .card .card__body .image {
	 padding-top: 15px;
	 width: 100%;
}
 .card .card__body .image img {
	 display: block;
	 max-width: 100%;
	 height: auto;
}
 .card .card__body .description {
	 margin-bottom: 25px;
}
 .card .card__body .description p {
	 margin: 0;
	 font-family: "Open Sans", sans-serif;
	 font-weight: 300;
	 line-height: 27px;
	 font-size: 16px;
	 color: #555;
}
 .card .card__body span.stock {
	 font-family: "Montserrat", sans-serif;
	 font-weight: 600;
	 color: #a1cc16;
}
 .card .card__body .reviews .stars {
	 display: inline-block;
	 list-style: none;
	 padding: 0;
}
 .card .card__body .reviews .stars > li {
	 display: inline-block;
}
 .card .card__body .reviews .stars > li .fa {
	 color: #f7c01b;
}
 .card .card__body .reviews > span {
	 font-family: "Open Sans", sans-serif;
	 font-size: 14px;
	 margin-left: 5px;
	 color: #555;
}
 .card .card__footer {
	 padding: 30px 40px;
	 display: flex;
	 flex-flow: row no-wrap;
	 align-items: center;
	 position: relative;
     justify-content: end
}
 .card .card__footer::before {
	 content: "";
	 position: absolute;
	 display: block;
	 top: 0;
	 left: 40px;
	 width: calc(100% - 40px);
	 height: 3px;
	 background: #115dd8;
	 background: linear-gradient(to right, #115dd8 0%, #115dd8 20%, #ddd 20%, #ddd 100%);
}
 .card .card__footer .recommend {
	 flex: 1 0 10px;
}
 .card .card__footer .recommend p {
	 margin: 0;
	 font-family: "Montserrat", sans-serif;
	 text-transform: uppercase;
	 font-weight: 600;
	 font-size: 14px;
	 color: #555;
}
 .card .card__footer .recommend h3 {
	 margin: 0;
	 font-size: 20px;
	 font-family: "Montserrat", sans-serif;
	 font-weight: 600;
	 text-transform: uppercase;
	 color: #115dd8;
}
 .card .card__footer .action button {
	 cursor: pointer;
	 border: 1px solid #115dd8;
	 padding: 14px 30px;
	 border-radius: 200px;
	 color: #fff;
	 background: #115dd8;
	 font-family: "Open Sans", sans-serif;
	 font-size: 16px;
	 transition: 200ms;
}
 .card .card__footer .action button:hover {
	 background: #fff;
	 color: #115dd8;
}
@media (max-width: 767px) {
        main {
            margin: 10% auto;
        }

        .card .card__body {
            flex-flow: column;
        }

        .card .card__body > .half {
            padding: 0;
            flex: 1 0 100%;
        }

        .card .card__body .featured_text h1 {
            font-size: 36px;
            line-height: 40px;
        }

        .card .card__body .featured_text p.sub,
        .card .card__body .featured_text p.price {
            font-size: 18px;
        }

        .card .card__body .image {
            padding-top: 0;
        }

        .card .card__footer {
            padding: 20px 30px;
        }
    }
</style>
@section('content')
   
<main>
    <div class="card">
        <div class="card__title">
            <div class="icon">
                <a style="display: block" href="{{ route('home') }}"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h3>New products</h3>
        </div>
        <div class="card__body">
            <div class="half">
                <div class="featured_text">
                    <p class="sub">{{ $product->name }}</p>
					<p class="price">${{ $product->price_after_discount === null ? $product->price : $product->price_after_discount }}</p>

                </div>
                <div class="image">
                    <img src="/{{ $product->url_image }}" alt="">
                </div>
            </div>
            <div class="half">
                <div class="description">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
        <div class="card__footer">
            <div class="action">
				<button style="border-color:#fe9126;background:#fe9126" type="button" onclick="openWhatsApp('{{ $product->name }}', '{{ $product->id }}')">Contact Seller</button>
            </div>
        </div>
    </div>
</main>

<script>
    function openWhatsApp(name, id) {
        var url = "http://192.168.1.100/market/" + id; // Replace with the actual base URL
        var message = encodeURIComponent("I'm interested in the product: " + name + ", Check it out: " + url);
        var phoneNumber = "+96181099189"; // Replace with the seller's WhatsApp number
        var whatsappLink = "https://wa.me/" + phoneNumber + "?text=" + message;

        window.open(whatsappLink, "_blank");
    }
</script>



  @endsection