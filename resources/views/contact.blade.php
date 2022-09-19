@extends('layouts.web')
        
@section('content')  
 <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact US</h3>
            <div class="contact-list-grid">
               <form action="{{url('contact-add')}}" method="post">
               	@csrf
                  <div class=" agile-wls-contact-mid">
                     <div class="form-group contact-forms">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="email" class="form-control" placeholder="Enter">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="text" class="form-control" placeholder="Phone" name="number">
                     </div>
                     <div class="form-group contact-forms">
                        <textarea class="form-control" rows="3"></textarea>
                     </div>
                     <button type="submit" class="btn btn-block sent-butnn">Send</button>
                  </div>
               </form>
            </div>
         </div>
         <!--//contact-map -->
      </section>

@endsection

