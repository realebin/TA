@extends('layout/main')
@section('title','Tambah Daftar Baru')

@section('container')
<div class="container">
<div class="col-10">
            <h1 class="mt-3">Abdimas Wizard</h1>
        </div>
<main>
      <div class="container grey-text text-darken-2">
            <!-- <form method="post" action=""> -->
               <ul class="stepper linear demos" style="list-style-type: none;">
                  <li class="step">
                     <div data-step-label="Insert Your Data" class="step-title waves-effect waves-dark">Step 1</div>
                     <div class="step-content">
                        <div class="row">
                           <div class="input-field col s12">
                           <label for="linear_email">Nama Seminar</label>
                              <input id="nama_seminar" name="nama_seminar" type="text" class="validate" placeholder="Nama Seminar" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required>
                              <!-- <label for="linear_email">Your e-mail</label> -->
                              <!-- <input id="linear_email" name="linear_email" type="email" class="validate" placeholder="Your email" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required> -->
                              <!-- <input id="linear_email" name="linear_email" type="email" class="validate" placeholder="Your email" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required> -->
                              
                           </div>
                           
                        </div>
                        <div class="row">
                           <div class="input-field col s12">
                           <label for="linear_email">E-mail</label>
                              <input id="linear_email" name="linear_email" type="email" class="validate" placeholder="Your email" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required>
                              
                              <!-- <input id="linear_email" name="linear_email" type="email" class="validate" placeholder="Your email" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required> -->
                              <!-- <input id="linear_email" name="linear_email" type="email" class="validate" placeholder="Your email" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" required> -->
                              
                           </div>
                           
                        </div>
                        <div class="step-actions">
                           <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                        </div>
                     </div>
                  </li>
                  <li class="step">
                     <div class="step-title waves-effect waves-dark">Step 2</div>
                     <div class="step-content">
                        <div class="row">
                           <div class="input-field col s12">
                              <input id="linear_password" style=" background: transparent; border: none; border-bottom: 1px solid #000000;" name="linear_password" type="password" class="validate" placeholder="Your password" required>
                           </div>
                        </div>
                        <div class="step-actions">
                           <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                           <button class="waves-effect waves-dark btn blue previous-step">BACK</button>
                        </div>
                     </div>
                  </li>
                  <li class="step">
                     <div class="step-title waves-effect waves-dark">Step 3</div>
                     <div class="step-content">
                        Finish!
                        <div class="step-actions">
                           <button class="waves-effect waves-dark btn blue" type="submit">SUBMIT</button>
                        </div>
                     </div>
                  </li>
               </ul>
               <!-- </form> -->
            </div>

</main>
   

</div>



@endsection