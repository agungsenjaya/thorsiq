@extends('layouts.index')
@section('content')
<div class="position-relative">
    <div class="d-none d-sm-block">
        <img src="{{ asset('img/hero-1.jpg') }}" alt="" width="100%" class="">
    </div>
    <div class="d-sm-none d-block">
        <div style="height:90vh;background:url({{ asset('img/hero-1.jpg') }});background-size:cover"></div>
    </div>
    <div class="to-center d-flex align-items-center">
    <div class="w-100">
    <section class="space-m">
    <div class="container w-100">
        <div class="row text-center w-100 g-0">
            <div class="col-md-6 offset-md-3">
            <img src="{{ asset('img/logo.png') }}" alt="" width="40%" >
            <p class="h5 my-4 text-primary">“ Fund management company for investors and we invest in many cryptocurrency projects in various fields. We have the best team. “</p>
             <div class="row justify-content-center g-0">
                 <div class="col-md-4 me-0 me-sm-3 mb-sm-0 mb-3">
                     <a href="javascript:void(0)" class="btn btn-primary rounded-pill px-5 w-100">Buy coin</a>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('member.exchange') }}" class="btn btn-outline-primary rounded-pill px-5 w-100">Exchange</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
    </div>
    </div>
</div>
<div class="position-relative">
<div class="d-none d-sm-block">
        <img src="{{ asset('img/hero-2.jpg') }}" alt="" width="100%" class="">
    </div>
    <div class="d-sm-none d-block">
        <div style="height:90vh;background:url({{ asset('img/hero-2.jpg') }});background-size:cover"></div>
    </div>
<section class="space-m to-center">
    <div class="container">
        <div class="row">
        <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <div class="p-4" data-aos="fade-up">
                    <h2 class="text-primary title-2 display-4">What Is <br>Thorsiq Token</h2>
                    <p>THORSIQ provides the necessary place to enter IDO & Dan private sales.

Easy investment management in the cryptocurrency market and creating a financing plan that is profitable for everyone and safe for investors

</p>



        <div class="row">
            <div class="col-md mb-sm-0 mb-3">
            <div class="p-4 bg-dark border-start border-primary">
                <div class="media">
                    <div class="media-body text-primary">
                        <h5 class="lead text-phase">Token Holders</h5>
                        <h3 class="title-2 mb-0 holders">00</h3>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md">
            <div class="p-4 bg-dark-2 border-start border-primary">
                <div class="media">
                    <div class="media-body text-primary">
                        <h5 class="lead text-phase">Circulating Supply</h5>
                        <h3 class="title-2 mb-0 supply">00</h3>
                    </div>
                </div>
            </div>
            </div>
        </div>
        

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
</div>
<section class="space-m bg-dark-trans text-center">
    <div class="container">
        <div class="row">
        <div class="col-md-10 offset-md-1">
        <h2 class="text-primary title-2 text-center mb-4">More Feature Thorsiq Token</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
  <a href="{{ route('member.blog') }}" class="col no-dec">
    <div class="card bg-dark-2 text-white rising" data-aos="fade-up">
      <div class="p-3">
          <i class="bi bi-calendar3 text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Sale forum<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
</a>
<a href="{{ route('member.stacking') }}" class="col no-dec">
    <div class="card bg-dark-2 text-white rising" data-aos="fade-up" data-aos-delay="50">
      <div class="p-3">
          <i class="bi bi-coin text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Stacking<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </a>
  <a href="{{ route('member.investment') }}" class="col no-dec">
    <div class="card bg-dark-2 text-white rising" data-aos="fade-up" data-aos-delay="100">
      <div class="p-3">
      <i class="bi bi-currency-exchange text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Exchange<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
</a>
</div>
        
    </div>
    </div>
    </div>
</section>
<div class="position-relative">
<section class="space-m" style="z-index:1">
    <div class="container">

    <h2 class="text-primary text-center title-2 mb-4">Roadmaps</h2>

    <div class="mb-roadmap-inner" style="overflow-x: hidden">
	<div class="mb-roadmap-block-wrapper left stage-0" style="visibility: visible;" data-aos="fade-right">
		<div class="mb-roadmap-block card">
            <p class="text-primary border-0 text-phase">Phase 1</p>
        <ul class="list-group list-group-flush list-road">
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Launching Website
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Build solid community
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Presale
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Community airdrops
                </div>
            </div>
        </li>
        </ul>
		</div>
	</div>
    <div class="mb-roadmap-block-wrapper right stage-1" style="visibility: visible;" data-aos="fade-left">
		<div class="mb-roadmap-block card">
        <p class="text-primary border-0 text-phase">Phase 2</p>
        <ul class="list-group list-group-flush list-road">
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Pancakeswap
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Active promotion
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Open website pool
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Portofolio investement
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Audit
                </div>
            </div>
        </li>
        </ul>
		</div>
	</div>
    <div class="mb-roadmap-block-wrapper left stage-2" style="visibility: visible;" data-aos="fade-right">
		<div class="mb-roadmap-block card">
        <p class="text-primary border-0 text-phase">Phase 3</p>
        <ul class="list-group list-group-flush list-road">
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    CG & CMC
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Active promotion
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    NFT Launchpad
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    NFT Marketplace
                </div>
            </div>
        </li>
        </ul>
		</div>
	</div>
    <div class="mb-roadmap-block-wrapper right stage-3" style="visibility: visible;" data-aos="fade-left">
		<div class="mb-roadmap-block card">
        <p class="text-primary border-0 text-phase">Phase 4</p>
        <ul class="list-group list-group-flush list-road">
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Massive promotion
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Staking
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="media">
                <i class="bi bi-check-circle-fill me-3 text-primary"></i>
                <div class="media-body">
                    Listing Exchange
                </div>
            </div>
        </li>
        </ul>
		</div>
	</div>
	
</div>


    </div>
</section>
<div class="to-center justify-content-center d-flex" style="z-index:-2">
    <img src="{{ asset('img/hero-3.jpg') }}" alt="" width="50%">
</div>
</div>
<section class="space-m bg-dark-2">
    <div class="container">
    <h2 class="text-primary title-2 text-center mb-4">Tokenomics</h2>
    <div class="p-3 text-center">
          <i class="bi bi-coin text-primary display-1"></i>
        </div>
        <div class="text-center my-4">
            <p class="text-phase mb-0">Total Supply</p>
            <h1 class="title-2 text-primary">1.000.000.000</h1>
        </div>

        <div class="col-md-8 offset-md-2">
        <div class="card-deck">
  <div class="card bg-dark border-0 border-top border-primary" data-aos="fade-up">
    <div class="card-body">
      <h5 class="card-title title-1 text-primary"><i class="bi bi-coin me-2"></i>Current Tax Buy</h5>
      <ul class="list-group list-group-flush list-road-2">
        <li class="list-group-item">3% to holders</li>
        <li class="list-group-item">3% to funds capital</li>
        <li class="list-group-item">2% marketing</li>
        <li class="list-group-item">1% burn</li>
        <li class="list-group-item">1% team</li>
      </ul>
    </div>
  </div>
  <div class="card bg-dark border-0 border-top border-primary" data-aos="fade-up" data-aos-delay="50">
    <div class="card-body">
      <h5 class="card-title title-1 text-primary"><i class="bi bi-coin me-2"></i>Current Tax Sell</h5>
      <ul class="list-group list-group-flush list-road-2">
        <li class="list-group-item">3% to holders</li>
        <li class="list-group-item">2% to funds capital</li>
        <li class="list-group-item">2% marketing</li>
        <li class="list-group-item">2% burn</li>
        <li class="list-group-item">1% team</li>
        </ul>
    </div>
  </div>
  
</div>
</div>

        

    </div>
</section>
<section class="space-m bg-dark-2">
    <div class="container">
    <h2 class="text-primary title-2 text-center mb-4">Frequently Asked Questions</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">

            <div class="accordion" id="accordionFaq">
            <div class="accordion-item border-dark">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button bg-dark text-white title-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Funding Tools
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFaq">
                <div class="accordion-body bg-dark">Allows investors to sell a small portion of their assets to raise capital and fund growth.  The Company is tokenized through the TIG Protocol and registered on the Platform.  They can buy and sell any number of tokens depending on their current financial situation and cash flow.  Also, the Protocol gives him the opportunity to buy back all the tokens.</div>
                </div>
            </div>
            <div class="accordion-item border-dark">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button bg-dark text-white title-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Global Capital Allocation
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFaq">
                <div class="accordion-body bg-dark">Will offer dozens of VC opportunities at home and abroad without excessive restrictions or expensive transaction fees.  Through TIG, investors can have exposure to early stages across multiple geographies and sectors.  TIG will offer start-ups in immature markets the opportunity to reach their full potential, while potentially providing investors with profitable returns.</div>
                </div>
            </div>
            <div class="accordion-item border-dark">
                <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button bg-dark text-white title-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Retail Investor Access
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFaq">
                <div class="accordion-body bg-dark">Part of the reason TIG exists is to help struggling retail investors access the exclusive world of VC.  With TIG, investors find out the best options available to them through the online Platform.  They selected several startups in Asia as well as globally, directly purchased their tokens from the secondary market within the Platform, and now have a diversified portfolio.  The retail investor completes this miraculous transaction within an hour without having to bother with all the paperwork and legal issues he would have faced otherwise.  They can sell their tokens at any time in the secondary market after getting the return on their investment.</div>
                </div>
            </div>
            <div class="accordion-item border-dark">
                <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button bg-dark text-white title-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Long term investment
                </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFaq">
                <div class="accordion-body bg-dark">Make your funds continue to grow both from the value of TIG assets, to Startup Funding.  The value of TIG will continue to increase from year to year following the number of startups invested, both from investments in the NFT field and various tokens and coins in all blockchain chains.</div>
                </div>
            </div>
            </div>
                
            </div>
        </div>

        <div class="mt-5 d-none">

        <h2 class="text-primary text-center mb-4">Our Partner</h2>

            <div class="row">
                <div class="col-md">
                    <img src="https://dummyimage.com/600x300" alt="" width="100%">
                </div>
                <div class="col-md">
                    <img src="https://dummyimage.com/600x300" alt="" width="100%">
                </div>
                <div class="col-md">
                    <img src="https://dummyimage.com/600x300" alt="" width="100%">
                </div>
                <div class="col-md">
                    <img src="https://dummyimage.com/600x300" alt="" width="100%">
                </div>
            </div>
        </div   >

    </div>
</section>
@endsection
@section('js')
<script>
    // // Get Circulating Supply
    // let a = $('.supply').text();
    // $('.supply').text(a.replace('Balance','').replace('LIGHT','').replace(' ',''));
    // // Get Token Holders
    // let b = $('.holders').text();
    // $('.holders').text(b.replace('addresses',' Address').replace(' ',''));
</script>
@endsection
@section('css')
<style>
    body{
        background-color: #010101;
        color: #fff;
    }
</style>
@endsection