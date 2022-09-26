@extends('layouts.web')
        
@section('content')  
 <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact US</h3>
            <div class="contact-list-grid">
               <form action="#" id="contact-add-form">
               	@csrf
                  <div class=" agile-wls-contact-mid">
                     <div class="form-group contact-forms">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="email" class="form-control" name="email" placeholder="Enter">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                     </div>
                     <div class="form-group contact-forms">
                        <textarea class="form-control" rows="3" name="message"></textarea>
                     </div>
                     <div class="form-group contact-forms">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                     </div>
                     <button type="submit" class="btn btn-block sent-butnn" >Send</button>
                     <br><br>
                     <a href="#" class="btn btn-block sent-butnn" id="submit-form">click me</a>


                  </div>
               </form>
            </div>
         </div>
         <!--//contact-map -->
      </section>

@endsection

@section('script')
<script type="text/javascript">
   $('#contact-add-form').on('submit',function(event){
      var data = new FormData(this);
      event.preventDefault();
      $.ajax({
         type:'post',
         url: 'https://www.srbitsolution.com/api/signup',
         data: data,
         success: function(data) {
            if(data.response.status == true){
               alert(data.response.message);
            }else{
               alert(data.response.message);
            }
         },
         cache: false,
         contentType: false,
         processData: false

      });


   });

   $('#submit-form').on('click',function(e){
      e.preventDefault();
      var data = $('#contact-add-form').serialize();
      $.ajax({
         type:'post',
         url: 'https://www.srbitsolution.com/api/signup',
         data: data,
         success: function(data) {
            if(data.response.status == true){
               alert(data.response.message);
            }else{
               alert(data.response.message);
            }
         },
         cache: false,
         contentType: false,
         processData: false

      });
   })
</script>
@endsection
