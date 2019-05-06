@extends('admin.layout')
@section('title',$data['title'])
@section('content')
<main role="main" class="homepage">
  <div class="block bigopt">
    <div class="caption opt">
      <div class="valign-wrap">
        <div class="valign">
          <div class="container wow fadeIn" data-wow-delay="0.3s">
            <div class="row">
              <div class="col-md-12">
                <div class="opt-container">
                  <div class="row">
                    <div class="item">
                      <a href="{{ url('staff-management') }}">
                        <div class="icon ani" >
                          <img class="o" src="public/assets/img/bg-opt-o.png">
                          <img class="h" src="public/assets/img/bg-opt-h.png">
                        </div>
                        <label>
                         <img src="public/assets/img/lal.png">
                         <p><span>Staff</span></p>
                       </label>
                     </a>
                   </div>
                   <div class="item" >
                    <a href="{{ url('company-setting') }}">
                      <div class="icon ani">
                        <img class="o" src="public/assets/img/bg-opt-o.png">
                        <img class="h" src="public/assets/img/bg-opt-h.png">
                      </div>
                      <label>
                       <img src="public/assets/img/lal2.png">
                       <p><span>Perusahaan</span></p>
                     </label>
                   </a>
                 </div>
                 <div class="col-md-6">
                  <div class="opt-text" style="text-align: left; margin-left: 30px;margin-top: 0px;">
                    <div class="text-wrapper">
                      <h2>INTEGRITY <i>•</i> COMMITMENT <i>•</i> CARE</h2>
                    </div>
                    <div class="text-wrapper">
                      <p>
                        Honesty, hard work, discipline, dedication and integrity are the major values continuously developed by PT. Adhimix Precast Indonesia to improve skillful and knowledgeable human resources in achieving productivity.
                      </p>
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
</div> 

</main><!-- /.container --> 
@endsection