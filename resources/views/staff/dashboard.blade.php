@extends('staff.layout')
@section('title','Adhimix | Staff Dashboard')
@section('content')
<main role="main" class="homepage">
      <div class="block bigopt">
    <div class="caption opt">
      <div class="valign-wrap">
        <div class="valign">
          <div class="container wow fadeIn" data-wow-delay="0.3s">
            <div class="opt-text">
              <div class="text-wrapper">
                <h2>INTEGRITY <i>•</i> COMMITMENT <i>•</i> CARE</h2>
              </div>
              <div class="text-wrapper">
                <p>
                  Honesty, hard work, discipline, dedication and integrity are the major values continuously developed by PT. Adhimix Precast Indonesia to improve skillful and knowledgeable human resources in achieving productivity.
                </p>
              </div>
            </div>
            <div class="opt-container">
              <div class="row">
                <div class="item">
                  <a href="{{ url('permintaan-dukungan') }}">
                    <div class="icon ani">
                      <img class="o" src="public/assets/img/bg-opt-o.png">
                      <img class="h" src="public/assets/img/bg-opt-h.png">
                    </div>
                    <label>
                     <img src="public/assets/img/lal.png">
                     <p><span>Dukungan</span></p>
                   </label>
                 </a>
               </div>
               <div class="item">
                <a href="{{ url('permintaan-penawaran') }}">
                  <div class="icon ani">
                    <img class="o" src="public/assets/img/bg-opt-o.png">
                    <img class="h" src="public/assets/img/bg-opt-h.png">
                  </div>
                  <label>
                    <img src="public/assets/img/penawaran.png">
                    <p><span>Penawaran</span></p>
                  </label>
                </a>
              </div>
              <div class="item">
                <a href="{{ url('kontrak') }}">
                  <div class="icon ani">
                    <img class="o" src="public/assets/img/bg-opt-o.png">
                    <img class="h" src="public/assets/img/bg-opt-h.png">
                  </div>
                  <label>
                    <img src="public/assets/img/contract.png">
                    <p><span>Kontrak </span></p>
                  </label>
                </a>
              </div>
              <div class="item">
                <a href="{{ url('tracking-truck') }}">
                  <div class="icon ani">
                    <img class="o" src="public/assets/img/bg-opt-o.png">
                    <img class="h" src="public/assets/img/bg-opt-h.png">
                  </div>
                  <label>
                    <img src="public/assets/img/ic-corporate.png">
                    <p><span>Tracking TM</span></p>
                  </label>
                </a>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div> 
  </div>     
</div> 
</main>
@endsection()
