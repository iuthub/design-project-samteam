@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <div class="about_us">
         <div class="contct_info">
            <h1 class="info">About Us</h1>
           <p class="info">SAM shop is an official stockist for all watch brands listed on this website. SAM Shop is a leading retailer of brand name designer watches. </p>
           <h1 class="info">Contact Us</h1>
           <p class="info">Addres of Main Shop: <pre class="info">  Uzbekistan, Tashkent, Koratosh st., 5a</pre> </p>
           <p class="info">Telephone numbers: <pre class="info">  +998916547834<br/>  +998705648799 </pre> </p>

         </div>   
         <div class="map" id="map">
         </div>
        </div>
   </div>
  @section('scripts')
  <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7a-pVRxc_cx00QNTiPWQZW50qxiqZGO0&libraries=places"></script>
  <script src="{{asset('js/mapscript.js')}}"></script>
  <script src="{{url('js/popper.min.js')}}"></script>    
  @endsection
@endsection